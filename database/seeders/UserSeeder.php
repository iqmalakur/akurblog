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

        $users = [
            [
                "name" => "Admin",
                "email" => "admin@akurblog.com",
                "email_verified_at" => $now,
                "password" => Hash::make("admin1234"),
                "role" => "admin",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Ahmad Fauzi",
                "email" => "ahmad.fauzi@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Siti Nur Aisyah",
                "email" => "siti.aisyah@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Muhammad Rizky",
                "email" => "m.rizky@yahoo.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Dewi Lestari",
                "email" => "dewi.lestari@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Rian Pratama",
                "email" => "rian.pratama@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Putri Ananda",
                "email" => "putri.ananda@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Fajar Hidayat",
                "email" => "fajar.hidayat@yahoo.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Nabila Zahra",
                "email" => "nabila.zahra@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Andi Saputra",
                "email" => "andi.saputra@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name" => "Intan Permata",
                "email" => "intan.permata@gmail.com",
                "email_verified_at" => $now,
                "password" => Hash::make("user1234"),
                "role" => "user",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
