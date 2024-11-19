<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Recipes extends Component
{
    public $name;
    public $description;
    public $temps;
    public $consigne;
    public $ingredients = [];
    public $allIngredients;

    public function submit()
    {
        $e = $this->ingredients;
        dd($e);
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'temps' => 'required|integer',
            'consigne' => 'nullable|string',
            'ingredients' => 'required|array|min:1',
        ]);
        // dd($this->name, $this->description, $this->temps, $this->consigne, $this->ingredients);
        DB::Transaction(function () {
            $recipe = Recipe::create([
                'name' => $this->name,
                'description' => $this->description,
                'temps' => $this->temps,
                'consigne' => $this->consigne,
                'created_by' => auth()->check() ? auth()->id() : null,
            ]);

            foreach ($this->ingredients as $ingredientId) {
                dd($recipe->ingredients()->attach($ingredientId));
            }
        });
        $this->reset();
        session()->flash('message', 'Recette créée avec succès !');
    }

    public function render()
    {
        $this->allIngredients = Ingredient::all();
        
        return view('livewire.recipes');
    }
}
