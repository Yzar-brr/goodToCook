<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\RecipeContient;
class ClientRecipeOnline extends Component
{
    public $clientRecipesID = [];
    public $recipes;
    public $ingredients = [];

    public function render()
    {
        $this->clientRecipesID = Recipe::where('confirmed', 1)->whereIn('created_by', [auth()->user()->id])->pluck('id')->toArray();
        $this->ingredients = RecipeContient::where('recipe_id', $this->clientRecipesID)->get();
        $this->recipes = Recipe::where('confirmed', 1)->where('created_by', auth()->user()->id)->get();
        return view('livewire.client-recipe-online');
    }
}
