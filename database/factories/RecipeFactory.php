<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Ingredient;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $ingredients;


    public function definition(): array
    {
        $this->ingredients = Ingredient::where('confirmed', 1)->get();


        $this->run();
        
        return [
            'name' => 'factory_item',
            'description' => 'factory_item',
            'temps' => $this->faker->numberBetween(10, 120),
            'consigne' => 'factory_item',
            'created_by' => User::first()->id ?? 1,
            'confirmed' => 0,
            'image' => null,
        ];
    }

    
    public function run(){
        $recipes = [
            "Salade César",
            "Poulet Tikka Massala",
            "Lasagnes végétariennes",
            "Soupe de potiron",
            "Quiche lorraine",
            "Ratatouille",
            "Tarte aux pommes",
            "Spaghetti Carbonara",
            "Curry de légumes",
            "Poulet rôti",
            "Gâteau au chocolat",
            "Croque-monsieur",
            "Omelette au fromage",
            "Risotto aux champignons",
            "Crêpes sucrées"
        ];
        $descriptions = [
            "Une salade avec laitue romaine, croûtons et sauce crémeuse.",
            "Poulet mariné aux épices servi dans une sauce crémeuse.",
            "Pâtes alternées avec légumes et sauce tomate.",
            "Soupe crémeuse au potiron, idéale pour l'hiver.",
            "Tarte salée avec lardons et crème fraîche.",
            "Plat de légumes méditerranéens mijotés.",
            "Dessert classique avec une pâte croustillante et des pommes.",
            "Pâtes avec une sauce à base d'œufs et de pancetta.",
            "Plat végétarien avec une sauce curry parfumée.",
            "Poulet tendre rôti avec des herbes.",
            "Gâteau moelleux et fondant au chocolat.",
            "Sandwich chaud avec jambon et fromage fondu.",
            "Omelette simple et savoureuse avec du fromage.",
            "Plat crémeux de riz avec des champignons.",
            "Dessert léger et sucré avec garnitures au choix."
        ];
        $consignes = [
            "Mélanger la laitue, les croûtons et le parmesan, puis ajouter la sauce César avant de servir.",
            "Faire mariner le poulet dans du yaourt et des épices, cuire et mélanger avec la sauce tomate crémeuse.",
            "Alterner des couches de pâtes, de légumes et de sauce tomate dans un plat, puis cuire au four.",
            "Couper le potiron en morceaux, cuire avec des oignons, mixer et ajouter de la crème.",
            "Préparer une pâte, y ajouter une garniture à base de lardons, d'œufs et de crème, puis cuire au four.",
            "Faire revenir les légumes (aubergines, courgettes, tomates) avec de l'huile d'olive et des herbes.",
            "Étaler une pâte, y disposer des pommes coupées, saupoudrer de sucre et cuire au four.",
            "Cuire les pâtes, préparer une sauce avec œufs, fromage et pancetta, puis mélanger le tout.",
            "Faire mijoter des légumes (pommes de terre, carottes, pois) avec du lait de coco et des épices.",
            "Assaisonner le poulet, le rôtir au four et l’arroser régulièrement de son jus.",
            "Mélanger beurre, chocolat fondu, œufs, sucre et farine, puis cuire au four.",
            "Assembler du pain de mie, du jambon et du fromage, puis griller ou cuire au four.",
            "Battre des œufs, les assaisonner, ajouter du fromage râpé et cuire dans une poêle.",
            "Faire revenir du riz dans du bouillon chaud en ajoutant progressivement des champignons.",
            "Préparer une pâte à crêpes, la cuire en fine couche dans une poêle, puis garnir selon vos goûts."
        ];

        for($i = 0; $i < count($recipes); $i++){
            $this->createRecipe($recipes[$i], $descriptions[$i], $consignes[$i]);
        }
    }

    public function createRecipe($name, $description, $consigne){
        $recipe = new Recipe();
        $recipe->name = $name;
        $recipe->description = $description;
        $recipe->temps = $this->faker->numberBetween(10, 120);
        $recipe->consigne = $consigne;
        $recipe->created_by = User::first()->id ?? 1;
        $recipe->confirmed = 1;
        $recipe->image = null;
        $recipe->save();

        $selectedIngredients = $this->ingredients->random(3);
        foreach ($selectedIngredients as $ingredient) {
            $recipe->ingredients()->attach($ingredient->id);
        }
    }
}
