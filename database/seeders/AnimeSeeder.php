<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animes = [
            [
                'title' => 'Attack on Titan',
                'content' => 'Humanity lives inside cities surrounded by enormous walls due to the Titans, gigantic humanoid creatures who devour humans seemingly without reason.',
                'cover_image' => 'https://cdn.myanimelist.net/images/anime/10/47347.jpg',
                'release_date' => '2013-04-07',
                'genre' => 'Action, Drama, Fantasy',
                'rating' => 9.0,
                'episodes' => 25,
                'studio' => 'Wit Studio',
                'status' => 'completed',
                'synopsis' => 'Centuries ago, mankind was slaughtered to near extinction by monstrous humanoid creatures called Titans, forcing humans to hide in fear behind enormous concentric walls.',
                'published' => true,
            ],
            [
                'title' => 'Death Note',
                'content' => 'A high school student discovers a supernatural notebook that allows him to kill anyone by writing the victim\'s name while picturing their face.',
                'cover_image' => 'https://cdn.myanimelist.net/images/anime/9/9453.jpg',
                'release_date' => '2006-10-03',
                'genre' => 'Psychological Thriller, Supernatural',
                'rating' => 8.7,
                'episodes' => 37,
                'studio' => 'Madhouse',
                'status' => 'completed',
                'synopsis' => 'A high school student discovers a supernatural notebook that allows him to kill anyone by writing the victim\'s name while picturing their face.',
                'published' => true,
            ],
            [
                'title' => 'One Piece',
                'content' => 'Follows the adventures of Monkey D. Luffy and his pirate crew in order to find the greatest treasure ever left by the legendary Pirate, Gold Roger.',
                'cover_image' => 'https://cdn.myanimelist.net/images/anime/6/73245.jpg',
                'release_date' => '1999-10-20',
                'genre' => 'Action, Adventure, Comedy',
                'rating' => 8.7,
                'episodes' => 1000,
                'studio' => 'Toei Animation',
                'status' => 'ongoing',
                'synopsis' => 'Follows the adventures of Monkey D. Luffy and his pirate crew in order to find the greatest treasure ever left by the legendary Pirate, Gold Roger.',
                'published' => true,
            ],
            [
                'title' => 'My Hero Academia',
                'content' => 'A superhero-loving boy without any powers is determined to enroll in a prestigious hero academy and learn what it really means to be a hero.',
                'cover_image' => 'https://cdn.myanimelist.net/images/anime/10/78745.jpg',
                'release_date' => '2016-04-03',
                'genre' => 'Action, Comedy',
                'rating' => 8.4,
                'episodes' => 13,
                'studio' => 'Bones',
                'status' => 'completed',
                'synopsis' => 'A superhero-loving boy without any powers is determined to enroll in a prestigious hero academy and learn what it really means to be a hero.',
                'published' => true,
            ],
        ];

        foreach ($animes as $anime) {
            Anime::create($anime);
        }

        // Create some watchlist entries for the first user
        $user = User::first();
        if ($user) {
            $animeIds = Anime::pluck('id')->toArray();
            $statuses = ['watching', 'completed', 'plan_to_watch', 'dropped'];
            
            foreach (array_slice($animeIds, 0, 3) as $index => $animeId) {
                $user->watchlists()->create([
                    'anime_id' => $animeId,
                    'status' => $statuses[$index],
                    'episodes_watched' => rand(1, 12)
                ]);
            }
        }
    }
}
