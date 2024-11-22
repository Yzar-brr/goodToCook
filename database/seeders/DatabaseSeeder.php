<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;
use Carbon\Factory;
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
        
        
        $user = User::first();

        Ingredient::factory(30)->create();

    }
}
