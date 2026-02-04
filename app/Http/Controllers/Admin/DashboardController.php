<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contestant;
use App\Models\Vote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_contestants' => Contestant::count(),
            'active_contestants' => Contestant::active()->count(),
            'total_votes' => Vote::count(),
            'recent_votes' => Vote::with('contestant')
                ->orderBy('voted_at', 'desc')
                ->limit(10)
                ->get(),
            'top_contestants' => Contestant::active()
                ->orderByVotes('desc')
                ->limit(5)
                ->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display all votes
     */
    public function votes()
    {
        $votes = Vote::with('contestant')
            ->orderBy('voted_at', 'desc')
            ->paginate(20);

        return view('admin.votes', compact('votes'));
    }
}