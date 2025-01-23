<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'La fattoria degli animali',
                'description' => "La fattoria degli animali è un romanzo allegorico di George Orwell pubblicato per la prima volta il 17 agosto 1945. Secondo Orwell, il libro riflette sugli eventi che portarono alla Rivoluzione russa e successivamente all'era staliniana dell'Unione Sovietica.",
                'pages' => 141,
                'image' => null,
                'author_id' => 3,
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
