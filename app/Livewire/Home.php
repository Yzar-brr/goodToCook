<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Home extends Component
{
    public $ingredients;
    public $recipes;
    public $recipesIngredients = [];
    public $researchRecipe = '';
    public $principalRecipe;    
    public $search = '';
    public $vegetarian = false;
    

    public function render()
    {
        // Fetch IDs of ingredients with 'vege_option' set to 1
    $recette_vege = Ingredient::where('vege_option', 1)->get();
    $recette_vege = $recette_vege->pluck('id')->toArray();

    // Query recipes that have ingredients with the vege_option condition
    $recette_vege = Recipe::whereHas('ingredients', function($query) use ($recette_vege) {
        // Specify which 'id' column to refer to (ingredient's id)
        $query->whereIn('ingredient.id', $recette_vege);
    })->get();

        $this->principalRecipe = Recipe::where('confirmed', 1)->where('image', '!=', null)->orderBy('id', 'desc')->first() ?? null;
        if($this->researchRecipe != ''){
            $this->recipes = Recipe::where('name', 'like', '%'.$this->researchRecipe.'%')->get()->whereIn('confirmed', 1);
            if($this->vegetarian){
                $this->recipes = $this->recipes->filter(function($recipe) {
                    $ingredientIds = $recipe->ingredients->pluck('vege_option')->toArray();
                    return !in_array(0, $ingredientIds) && in_array(1, $ingredientIds);
                });
            }
        }else{
            $this->recipes = Recipe::all()->whereIn('confirmed', 1)->sortByDesc('id');
            if($this->vegetarian){
                $this->recipes = $this->recipes->filter(function($recipe) {
                    $ingredientIds = $recipe->ingredients->pluck('vege_option')->toArray();
                    return !in_array(0, $ingredientIds) && in_array(1, $ingredientIds);
                });
            }
        }
        $this->ingredients = Ingredient::all()->pluck('name', 'id')->toArray();
        $this->recipesIngredients = Recipe::all()->map(function($recipe){
            return $recipe->ingredients->pluck('id')->toArray();
        });
        return view('livewire.home');
    }
    public function favorite(int $userId, int $recipeId)
    {
        // Vérifie si la ligne existe déjà dans la pivot
        $exists = DB::table('recipes_favoris')
                    ->where('user_id',   $userId)
                    ->where('recipe_id', $recipeId)
                    ->exists();

        if ($exists) {
            // Si déjà en favori → on supprime la ligne
            DB::table('recipes_favoris')
            ->where('user_id',   $userId)
            ->where('recipe_id', $recipeId)
            ->delete();
        } else {
            // Sinon → on insère la ligne
            DB::table('recipes_favoris')->insert([
                'user_id'    => $userId,
                'recipe_id'  => $recipeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
