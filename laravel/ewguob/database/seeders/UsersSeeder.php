<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ravi Kumar',
            'email' => 'ravi.kumar@example.com',
            'password' => bcrypt('password'),
        ]);
        
        User::create([
            'name' => 'Priya Sharma',
            'email' => 'priya.sharma@example.com',
            'password' => bcrypt('password'),
        ]);
        
        User::create([
            'name' => 'Vikram Singh',
            'email' => 'vikram.singh@example.com',
            'password' => bcrypt('password'),
        ]);
        
        User::create([
            'name' => 'Ananya Patel',
            'email' => 'ananya.patel@example.com',
            'password' => bcrypt('password'),
        ]);
        
        User::create([
            'name' => 'Aditya Gupta',
            'email' => 'aditya.gupta@example.com',
            'password' => bcrypt('password'),
        ]);

    }
}
