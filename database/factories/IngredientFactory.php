<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\User;
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
        $this->run();
        return [
            'name' => 'factory_item',
            'image' => null,
            'prix_unitaire' => $this->faker->randomFloat(2, 0.5, 20),
            'created_by' => User::first()->id ?? 1, 
            'confirmed' => 0,
        ];
    }

    public function run()
    {
        $ingredients = [
            "Tomates",
            "Pommes de terre",
            "Carottes",
            "Oignons",
            "Ail",
            "Poulet",
            "Saumon",
            "Thon",
            "Riz",
            "Pâtes",
            "Quinoa",
            "Lentilles",
            "Pois chiches",
            "Épinards",
            "Brocoli",
            "Courgettes",
            "Aubergines",
            "Champignons",
            "Poivrons",
            "Concombre",
            "Avocat",
            "Œufs",
            "Fromage cheddar",
            "Yaourt nature",
            "Lait",
            "Noix",
            "Amandes",
            "Graines de chia",
            "Graines de tournesol",
            "Pain complet",
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create([
                'name' => $ingredient,
                'image' => null,
                'prix_unitaire' => fake()->randomFloat(2, 0.5, 20),
                'created_by' => User::first()->id ?? 1,
                'confirmed' => 1,
            ]);
        }
    }
}
