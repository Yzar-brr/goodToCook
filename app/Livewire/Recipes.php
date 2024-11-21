<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\RecipeContient;
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
                $e = RecipeContient::create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $key,
                ]);
                dd($e->recipe()->attach($recipe->id));
            $e->recipe()->attach($recipe->id);
            $e->ingredient()->attach($key);
            }
        });
        $this->reset();
        session()->flash('message', 'Recette créée avec succès !');
    }

    public function render()
    {
        if($this->ingredientResearch != ''){
            $this->allIngredients = Ingredient::where('name', 'like', '%'.$this->ingredientResearch.'%')->get();
        }else{
            $this->allIngredients = Ingredient::all();
        }

        // foreach ($this->allIngredients as $key => $ingredient) {
            // foreach ($ingredient as $ingredientId => $value) {

            //    dump($ingredient);
            // }
            
        // }
        return view('livewire.recipes');
    }
}
