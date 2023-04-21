<?php

namespace App\Policies;

use App\Models\Watchlist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WatchlistPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Watchlist $watchlist)
    {
        return $user->id === $watchlist->user_id;
    }

    public function delete(User $user, Watchlist $watchlist)
    {
        return $user->id === $watchlist->user_id;
    }
} 