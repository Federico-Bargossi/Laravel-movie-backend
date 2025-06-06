<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $genres = Genre::all();

        for ($i = 0; $i < 20; $i++) {
            $film = Film::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'release_date' => $faker->date(),
            ]);

            // Associa da 1 a 3 generi casuali
            $film->genres()->attach($genres->random(rand(1, 3))->pluck('id'));
        }
    }
}
