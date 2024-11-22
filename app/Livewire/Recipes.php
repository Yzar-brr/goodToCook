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
    public array $ingredients;
    public $ingredient = [];
    public $allIngredients;
    public string $ingredientResearch = '';

    public function submit()
    {
        DB::Transaction(function () {
            $this->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'temps' => 'required|integer',
                'consigne' => 'nullable|string',
                'ingredient' => 'required|array|min:1',
            ]);
            
            $recipe = Recipe::create([
                'name' => $this->name,
                'description' => $this->description,
                'temps' => $this->temps,
                'consigne' => $this->consigne,
                'created_by' => auth()->check() ? auth()->id() : null,
            ]);
            foreach ($this->ingredient as $key => $value) {
                $recipe->ingredients()->attach($key);
            }
        });
        $this->reset();
        session()->flash('message', 'Recette créée avec succès !');
    }

    public function render()
    {
        if($this->ingredientResearch != ''){
            $this->allIngredients = Ingredient::where('name', 'like', '%'.$this->ingredientResearch.'%')->where('cofirmed', '=', '1')->get();
        }else{
            $this->allIngredients = Ingredient::all()->whereIn('confirmed', 1);
        }

        return view('livewire.recipes');
    }
}
