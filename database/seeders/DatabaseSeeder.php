<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Créer un utilisateur
        if(User::where('email', 'admin')->count() == 0){
            User::create([
                'name' => 'John Doe2',
                'email' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('root'),
            ]);
        }
        if(Ingredient::where('name', 'factory_item')->count() == 0){
            Ingredient::factory(1)->create();
        }
        if(Recipe::where('name', 'factory_item')->count() == 0){
            Recipe::factory(1)->create();
        }
    }
}
