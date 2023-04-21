<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function update(Request $request, Watchlist $watchlist)
    {
        $this->authorize('update', $watchlist);

        $validated = $request->validate([
            'status' => 'required|in:watching,completed,plan_to_watch,dropped',
            'episodes_watched' => 'required|integer|min:0'
        ]);

        $watchlist->update($validated);

        return back()->with('success', 'Watchlist updated successfully!');
    }

    public function store(Request $request, Anime $anime)
    {
        $validated = $request->validate([
            'status' => 'required|in:watching,completed,plan_to_watch,dropped',
            'episodes_watched' => 'required|integer|min:0'
        ]);

        $watchlist = $anime->watchlists()->create([
            'user_id' => Auth::id(),
            'status' => $validated['status'],
            'episodes_watched' => $validated['episodes_watched']
        ]);

        return back()->with('success', 'Added to your watchlist!');
    }

    public function destroy(Watchlist $watchlist)
    {
        $this->authorize('delete', $watchlist);
        
        $watchlist->delete();

        return back()->with('success', 'Removed from your watchlist.');
    }
} 