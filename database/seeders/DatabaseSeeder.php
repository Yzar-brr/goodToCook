<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeContient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $user = User::first();

        $ingredient1 = Ingredient::create([
            'name' => 'Tomate',
            'image' => null,
            'prix_unitaire' => 2,
            'created_by' => $user->id
        ]);

        $ingredient2 = Ingredient::create([
            'name' => 'Ail',
            'image' => null,
            'prix_unitaire' => 1,
            'created_by' => $user->id
        ]);

        $recipe1 = Recipe::create([
            'name' => 'Sauce tomate',
            'description' => 'Une sauce tomate simple et rapide.',
            'temps' => 30,
            'consigne' => 'Faire revenir l\'ail, ajouter la tomate, laisser mijoter.',
            'created_by' => $user->id
        ]);

        $recipe2 = Recipe::create([
            'name' => 'Spaghetti',
            'description' => 'Des spaghetti classiques avec sauce tomate.',
            'temps' => 40,
            'consigne' => 'Cuire les spaghetti, préparer la sauce tomate.',
            'created_by' => $user->id
        ]);

        $recipe1->ingredients()->attach([$ingredient1->id, $ingredient2->id]);
        $recipe2->ingredients()->attach([$ingredient1->id]);
    }
}
