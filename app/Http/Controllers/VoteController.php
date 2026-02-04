<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VoteController extends Controller
{
    /**
     * Submit a vote
     */
    public function store(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'contestant_id' => 'required|exists:contestants,id',
                'voter_name' => 'required|string|max:255',
                'voter_email' => 'required|email|max:255',
                'voter_phone' => 'required|string|max:20',
            ]);

            // Check if user has already voted
            $ip = $request->ip();
            $email = $validated['voter_email'];

            // Check cookie
            if ($request->cookie('has_voted')) {
                return response()->json([
                    'success' => false,
                    'message' => 'لقد قمت بالتصويت من قبل'
                ], 403);
            }

            // Check by IP
            if (Vote::hasVotedByIp($ip)) {
                return response()->json([
                    'success' => false,
                    'message' => 'لقد قمت بالتصويت من قبل من هذا الجهاز'
                ], 403);
            }

            // Check by email
            if (Vote::hasVotedByEmail($email)) {
                return response()->json([
                    'success' => false,
                    'message' => 'لقد قمت بالتصويت من قبل باستخدام هذا البريد الإلكتروني'
                ], 403);
            }

            // Use transaction to ensure data integrity
            DB::beginTransaction();

            try {
                // Create vote
                $vote = Vote::create([
                    'contestant_id' => $validated['contestant_id'],
                    'voter_name' => $validated['voter_name'],
                    'voter_email' => $validated['voter_email'],
                    'voter_phone' => $validated['voter_phone'],
                    'ip_address' => $ip,
                    'user_agent' => $request->userAgent(),
                    'voted_at' => now()
                ]);

                // Increment contestant votes
                $contestant = Contestant::findOrFail($validated['contestant_id']);
                $contestant->incrementVotes();

                DB::commit();

                // Set cookie for 30 days
                $cookie = Cookie::make('has_voted', 'true', 43200); // 30 days

                return response()->json([
                    'success' => true,
                    'message' => 'تم تسجيل تصويتك بنجاح',
                    'contestant_name' => $contestant->name
                ])->cookie($cookie);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'البيانات المدخلة غير صحيحة',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تسجيل التصويت. يرجى المحاولة مرة أخرى'
            ], 500);
        }
    }

    /**
     * Check if user can vote
     */
    public function checkVoteStatus(Request $request)
    {
        $canVote = !$this->hasUserVoted($request);

        return response()->json([
            'can_vote' => $canVote,
            'message' => $canVote ? 'يمكنك التصويت' : 'لقد قمت بالتصويت من قبل'
        ]);
    }

    /**
     * Check if user has voted
     */
    private function hasUserVoted(Request $request)
    {
        // Check cookie
        if ($request->cookie('has_voted')) {
            return true;
        }

        // Check by IP
        $ip = $request->ip();
        if (Vote::hasVotedByIp($ip)) {
            return true;
        }

        return false;
    }
}