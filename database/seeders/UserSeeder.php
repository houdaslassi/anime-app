<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create test users
        $users = [
            [
                'name' => 'Anime Fan',
                'email' => 'anime.fan@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Manga Reader',
                'email' => 'manga.reader@example.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);

            // Get some random anime IDs
            $animeIds = Anime::pluck('id')->toArray();
            
            // Create watchlist entries
            $watchlistData = [
                [
                    'anime_id' => $animeIds[0],
                    'status' => 'watching',
                    'episodes_watched' => 15
                ],
                [
                    'anime_id' => $animeIds[1],
                    'status' => 'completed',
                    'episodes_watched' => 37
                ],
                [
                    'anime_id' => $animeIds[2],
                    'status' => 'plan_to_watch',
                    'episodes_watched' => 0
                ]
            ];

            foreach ($watchlistData as $watchlist) {
                $user->watchlists()->create($watchlist);
            }

            // Create reviews
            $reviewsData = [
                [
                    'anime_id' => $animeIds[0],
                    'rating' => 5,
                    'content' => 'This anime is absolutely amazing! The story and animation are incredible.'
                ],
                [
                    'anime_id' => $animeIds[1],
                    'rating' => 4,
                    'content' => 'A brilliant series with great character development.'
                ]
            ];

            foreach ($reviewsData as $review) {
                $user->reviews()->create($review);
            }
        }
    }
}
