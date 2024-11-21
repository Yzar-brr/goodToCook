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
    
    public $search = '';

    public function render()
    {
        $this->ingredients = Ingredient::all()->pluck('name', 'id')->toArray();
;        $this->recipes = Recipe::all()->pluck('name', 'id')->toArray();
        $this->recipesIngredients = Recipe::all()->map(function($recipe){
            return $recipe->ingredients->pluck('id')->toArray();
        });
        // dump($this->ingredients, $this->recipes);
        return view('livewire.home');
    }
}
