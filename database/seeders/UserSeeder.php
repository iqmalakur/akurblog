<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('users')->insert([
            [
                "name" => "Admin",
                "email" => "admin@akurblog.com",
                "email_verified_at" => $now,
                "password" => Hash::make("admin1234"),
                "role" => "admin",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
