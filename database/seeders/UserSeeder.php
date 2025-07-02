<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Klvst3r',
            'email' => 'klvst3r@email.com',
            'password' => '$2y$12$RX3SQD1Y.UhVZw4WvzpXYupCk8v0/84mqZIylTZ1zS3EOvGWTX9vu', // hash real
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
