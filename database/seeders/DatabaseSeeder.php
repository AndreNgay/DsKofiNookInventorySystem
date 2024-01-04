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
            'username' => 'a',
            'password' => Hash::make('aaaaaaaa'),
            'role' => 'admin',

            'name' => 'admin',

            'email' => 'a@a',   
            'contact_number' => '',
            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_number' => '',
            'profile_made' => true,
        ]);

        User::create([
            'username' => 'e',
            'password' => Hash::make('eeeeeeee'),
            'role' => 'employee',

            'name' => 'employee',


            'email' => 'e@e',   
            'contact_number' => '',
            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_number' => '',
            'profile_made' => true,
        ]);

        User::create([
            'username' => 'o',
            'password' => Hash::make('oooooooo'),
            'role' => 'owner',

            'name' => 'owner',


            'email' => 'o@o',   
            'contact_number' => '',
            'emergency_contact_name' => '',
            'emergency_contact_relation' => '',
            'emergency_contact_number' => '',
            'profile_made' => true,
        ]);

        // CATEGORIES
        Category::create([
            'category_name' => 'Canned',
            'description' => 'Ingredient contained in Cans. Example: Condensed Milk, Evaporated Milk, etc.',
        ]);
        Category::create([
            'category_name' => 'Bottled/Jarred',
            'description' => 'Ingredient contained in Cans. Example: Condensed Milk, Evaporated Milk, etc.',
        ]);
        Category::create([
            'category_name' => 'Bagged',
            'description' => 'Ingredient contained in Bags. Example Flour, Sugar, Cocoa Powder, Coffee Granules, etc.',
        ]);
        Category::create([
            'category_name' => 'Liquid Cartoned',
            'description' => 'Ingredient contained in Cans. Example: Condensed Milk, Evaporated Milk, etc.',
        ]);
        Category::create([
            'category_name' => 'Boxed (Dry)',
            'description' => 'Ingredient contained in Boxes. Cereals, Fruit Juices, etc.',
        ]);
        Category::create([
            'category_name' => 'Boxed (Per Piece)',
            'description' => 'Ingredient contained in Boxes. Cereals, Fruit Juices, etc.',
        ]);
        Category::create([
            'category_name' => 'Container',
            'description' => 'Plastic Cups, Straws, Plastic Bags, etc.',
        ]);

        // UNITS
        //1-canned
        Unit::create([
            'category_id' => 1,
            'unit_name' => 'Mililiters',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);        
        Unit::create([
            'category_id' => 1,
            'unit_name' => 'Liters',
            'unit_conversion' => 1000,
            'default_unit' => false
        ]);        

        //2-bottled/jarred
        Unit::create([
            'category_id' => 2,
            'unit_name' => 'Mililiters',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);        
        Unit::create([
            'category_id' => 2,
            'unit_name' => 'Liters',
            'unit_conversion' => 1000,
            'default_unit' => false
        ]);   

        //3-bagged
        Unit::create([
            'category_id' => 3,
            'unit_name' => 'grams',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);        
        Unit::create([
            'category_id' => 3,
            'unit_name' => 'Kilograms',
            'unit_conversion' => 1000,
            'default_unit' => false
        ]);

        //4-liquid cartoned
        Unit::create([
            'category_id' => 4,
            'unit_name' => 'Mililiters',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);        
        Unit::create([
            'category_id' => 4,
            'unit_name' => 'Liters',
            'unit_conversion' => 1000,
            'default_unit' => false
        ]);

        //5-boxed dry
        Unit::create([
            'category_id' => 5,
            'unit_name' => 'grams',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);        
        Unit::create([
            'category_id' => 5,
            'unit_name' => 'Kilograms',
            'unit_conversion' => 1000,
            'default_unit' => false
        ]);

        //6-boxed per piece
        Unit::create([
            'category_id' => 6,
            'unit_name' => 'Pieces',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);

        //7-container
        Unit::create([
            'category_id' => 7,
            'unit_name' => 'Pieces',
            'unit_conversion' => 1,
            'default_unit' => true
        ]);
    }
}
