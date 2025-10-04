<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ["name" => "Teknologi"],
            ["name" => "Pendidikan"],
            ["name" => "Gaya Hidup"],
            ["name" => "Karier"],
            ["name" => "Bisnis"],
            ["name" => "Inspirasi"],
            ["name" => "Opini"],
            ["name" => "Berita"],
            ["name" => "Tren"],
            ["name" => "Kesehatan"],
        ]);
    }
}
