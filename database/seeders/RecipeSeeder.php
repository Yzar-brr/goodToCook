<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Créer des ingrédients
        Ingredient::create([
            'name' => 'Tomate',
            'image' => 'tomato.jpg',
            'prix_unitaire' => 1.5,
            'created_by' => User::first()->id,
        ]);

        Ingredient::create([
            'name' => 'Poulet',
            'image' => 'chicken.jpg',
            'prix_unitaire' => 5.0,
            'created_by' => User::first()->id,
        ]);

        
        // // Créer des recettes
        // $recipe1 = Recipe::create([
        //     'name' => 'Salade de Tomates',
        //     'description' => 'Une salade fraîche avec des tomates et du basilic.',
        //     'created_by' => User::first()->id,
        //     'temps' => 10,
        // ]);

        // $recipe2 = Recipe::create([
        //     'name' => 'Poulet Grillé',
        //     'description' => 'Poulet grillé avec des épices.',
        //     'created_by' => 1,
        //     'temps' => 10,
        // ]);

        // $tomato = Ingredient::where('name', 'Tomate')->first();
        // $chicken = Ingredient::where('name', 'Poulet')->first();

        // $recipe1->ingredient()->attach($tomato->id); // Ajouter tomate à la recette de salade
        // $recipe2->ingredient()->attach($chicken->id); // Ajouter poulet à la recette de poulet grillé

    }
}