<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function show(Anime $anime)
    {
        return view('anime.show', [
            'anime' => $anime->load('reviews.user')
        ]);
    }
} 