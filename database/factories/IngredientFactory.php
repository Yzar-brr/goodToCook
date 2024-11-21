<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Définition de l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'image' => null,
            'prix_unitaire' => $this->faker->randomFloat(2, 0.5, 20),
            'created_by' => 1,
            'confirmed' => '1',
        ];
    }
}