<?php

namespace App\Livewire;

use App\Models\Ingredient;
use Livewire\Component;
use App\Models\RecipeContient;
class ModalComponent extends Component
{
    public $isOpen = false;
    protected $listeners = ['openModal' => 'openModal'];
    public $recipe;
    public $recipeContientIngredients;
    public $ingredients = [];

    public function mount()
{
    // Listen for the openModal event to open the modal.
}

    public function openModal($recipe)
    {
        $this->recipe = $recipe ?? null;
        $this->isOpen = true;
        $this->recipe['consigne'] = explode(', ',$this->recipe['consigne']);
        $this->recipeContientIngredients = RecipeContient::where('recipe_id', $this->recipe['id'])->get()->pluck('ingredient_id')->toArray();
        // dd($this->recipeContientIngredients);
        $this->ingredients = Ingredient::whereIn('id', $this->recipeContientIngredients)->get();

        foreach ($this->ingredients as $ingredient) {
            $ingredient->quantite = RecipeContient::where('recipe_id', $this->recipe['id'])->where('ingredient_id', $ingredient->id)->first()->quantity;
            $ingredient->unite = RecipeContient::where('recipe_id', $this->recipe['id'])->where('ingredient_id', $ingredient->id)->first()->unite;
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modal-component');
    }
}