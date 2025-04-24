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
    

    public function render()
    {
        $this->principalRecipe = Recipe::where('confirmed', 1)->where('image', '!=', null)->orderBy('id', 'desc')->first() ?? null;
        if($this->researchRecipe != ''){
            $this->recipes = Recipe::where('name', 'like', '%'.$this->researchRecipe.'%')->get()->whereIn('confirmed', 1);
        }else{
            $this->recipes = Recipe::all()->whereIn('confirmed', 1);
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
