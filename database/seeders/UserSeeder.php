<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name" => "Admin",
                "email" => "admin@akurblog.com",
                "email_verified_at" => Carbon::now(),
                "password" => bcrypt("admin1234"),
                "role" => "admin",
            ],
        ]);
    }
}
