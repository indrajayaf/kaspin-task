<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;
use App\Models\Level;
use App\Models\Reimburse;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        Level::create([
            'level' => 'Directur'
        ]);
        
        Level::create([
            'level' => 'Finance'
        ]);
        
        Level::create([
            'level' => 'Staff'
        ]);

        Status::create([
            'status' => 'Pending'
        ]);

        Status::create([
            'status' => 'Accepted'
        ]);

        Status::create([
            'status' => 'Declined'
        ]);

        Status::create([
            'status' => 'Paid'
        ]);

        User::create([
            'name' => 'Admin Directur Utama',
            'level_id' => 1,
            'nip' => '1111',
            'username' => 'admin',
            'email' => 'admin@noemail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Admin Finance Utama',
            'level_id' => 2,
            'nip' => '2222',
            'username' => 'adminfinance',
            'email' => 'adminfinance@noemail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Staff Utama',
            'level_id' => 3,
            'nip' => '3333',
            'username' => 'staffutama',
            'email' => 'staffutama@noemail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();

        Reimburse::factory(30)->create();
    }
}
