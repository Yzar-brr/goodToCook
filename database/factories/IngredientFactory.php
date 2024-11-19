<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Utilisation d'un mot aléatoire pour le nom
            'image' => null, // Ici, on n'utilise pas d'image, mais tu peux ajouter une logique pour générer une image factice
            'prix_unitaire' => $this->faker->randomFloat(2, 1, 100), // Générer un prix unitaire aléatoire entre 1 et 100, avec 2 décimales
        ];
    }
}