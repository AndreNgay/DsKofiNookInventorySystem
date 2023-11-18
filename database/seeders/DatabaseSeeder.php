<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'e',
            'password' => Hash::make('eeeeeeee'),
            'role' => 'employee',
    
            'name' => 'employee',
            'address' => '',
    
            'email' => 'e@e',
            'contact_number' => '',
            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_number' => '',
        ]);

        User::create([
            'username' => 'o',
            'password' => Hash::make('oooooooo'),
            'role' => 'owner',
    
            'name' => 'owner',
            'address' => '',
    
            'email' => 'o@o',
            'contact_number' => '',
            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_number' => '',
        ]);
    }
}
