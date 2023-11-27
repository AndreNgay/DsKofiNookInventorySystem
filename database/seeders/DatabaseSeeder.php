<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Unit;
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

        Category::create([
            'category_name' => 'Liquid',
            'description' => '',
        ]);
        
        Category::create([
            'category_name' => 'Dry Ingredient',
            'description' => '',
        ]);
        Category::create([
            'category_name' => 'Count',
            'description' => '',
        ]);

        Unit::create([
            'category_id' => 1,
            'unit_name' => 'Mililiters',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);
        Unit::create([
            'category_id' => 2,
            'unit_name' => 'Grams',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);
        Unit::create([
            'category_id' => 3,
            'unit_name' => 'Pieces',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);

    }
}
