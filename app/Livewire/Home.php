<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\Recipe;


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
        
        if($this->researchRecipe != ''){
            $this->recipes = Recipe::where('name', 'like', '%'.$this->researchRecipe.'%')->get();
        }else{
            $this->recipes = Recipe::all();
        }
        $this->ingredients = Ingredient::all()->pluck('name', 'id')->toArray();
        $this->recipesIngredients = Recipe::all()->map(function($recipe){
            return $recipe->ingredients->pluck('id')->toArray();
        });

        // Recette à l'affiche

        $e = Recipe::select('id')->get()->toArray();
        foreach($e as $key => $value){
            dump($value);
            // $this->principalRecipe = Recipe::find($value['id']);
        };
        return view('livewire.home');
    }
}
