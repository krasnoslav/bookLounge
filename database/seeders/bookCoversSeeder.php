<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bookCoversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookCovers')->insert(
            [
                [
                    'id' => 1,
                    'bookCover' => 'Твердый переплет',
                ],
                [
                    'id' => 2,
                    'bookCover' => 'Мягкий переплет',
                ],
            ]
        );
    }
}
