<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $watchlist = $user->watchlists()
            ->with('anime')
            ->latest()
            ->take(5)
            ->get();
            
        $recentAnimes = Anime::where('published', true)
            ->latest()
            ->take(6)
            ->get();
            
        $watchingAnimes = $user->animes()
            ->wherePivot('status', 'watching')
            ->latest()
            ->take(4)
            ->get();
            
        return view('dashboard', compact('watchlist', 'recentAnimes', 'watchingAnimes'));
    }
}
