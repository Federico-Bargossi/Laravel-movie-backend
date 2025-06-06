<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = ['Azione', 'Commedia', 'Drammatico', 'Horror', 'Fantasy', 'Thriller', 'Documentario'];

        foreach ($genres as $name) {
            Genre::firstOrCreate(['name' => $name]);
        }
    }
}
