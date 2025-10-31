<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bookGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookGenres')->insert(
            [
                [
                    'id' => 1,
                    'bookGenre' => 'Фантастика',
                ],
                [
                    'id' => 2,
                    'bookGenre' => 'Классика',
                ],
                [
                    'id' => 3,
                    'bookGenre' => 'Детективы',
                ],
                [
                    'id' => 4,
                    'bookGenre' => 'Психология',
                ],
                [
                    'id' => 5,
                    'bookGenre' => 'Философия',
                ],
            ]
        );
    }
}
