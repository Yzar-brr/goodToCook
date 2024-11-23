<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;

class AdminIngredients extends Component
{
    public $ingredients;

    public function delete($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
    }

    public function approved($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->confirmed = !$ingredient->confirmed;
        $ingredient->save();

        $recipeswithThisIngredient = $ingredient->recipes;

        foreach ($recipeswithThisIngredient as $recipe) {
            $recipe->confirmed = '0';
            $recipe->save();
        }
    }

    public function render()
    {
        $this->ingredients = Ingredient::all();

        return view('livewire.admin-ingredients');
    }
}
