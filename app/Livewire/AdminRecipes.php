<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Collection;

class AdminRecipes extends Component
{
    public $recipes;

    public function approved($idRecipe){
        $recipe = Recipe::find($idRecipe);
        $ingredients = $recipe->ingredients->pluck('confirmed')->toArray();
        $e = 'test';
        if(in_array(0, $ingredients)){
            return;
        }else{
            $recipe->confirmed = !$recipe->confirmed;
        }
        $recipe->save();
    }

    public function render()
    {
        $this->recipes = Recipe::all();
        // dd($this->recipes);
        return view('livewire.admin-recipes');
    }
}
