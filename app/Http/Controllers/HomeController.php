<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use App\Models\Vote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with contestants
     */
    public function index()
    {
        // Get active contestants in random order for home page
        $contestants = Contestant::active()->get()->shuffle();

        // Check if user has already voted
        $hasVoted = $this->checkIfUserVoted();

        return view('pages.home', compact('contestants', 'hasVoted'));
    }

    /**
     * Display the results page
     */
    public function results()
    {
        // Get contestants ordered by votes (highest first)
        $contestants = Contestant::active()
            ->orderByVotes('desc')
            ->get();

        // Get total votes
        $totalVotes = Vote::count();

        return view('pages.results', compact('contestants', 'totalVotes'));
    }

    /**
     * Check if user has already voted
     */
    private function checkIfUserVoted()
    {
        // Check cookie first
        if (request()->cookie('has_voted')) {
            return true;
        }

        // Check by IP address
        $ip = request()->ip();
        if (Vote::hasVotedByIp($ip)) {
            return true;
        }

        return false;
    }
}