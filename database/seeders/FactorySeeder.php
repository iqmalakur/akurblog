<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->hasPosts(2)
            ->create();
    }
}
