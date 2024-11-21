<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Ingredients extends Component
{
    use WithFileUploads;
    
    public $name;
    public $image;
    public $prix_unitaire;

    public function submit()
    {
        $ingredients = $allIngredients = Ingredient::all()->pluck('name')->toArray();
        // dump($ingredients, in_array($this->name, $allIngredients));
        if(in_array($this->name, $allIngredients)){
            session()->flash('error', "L'ingrédient '" . $this->name . "' est déjà existant !");
            $this->reset();
        }else{
            DB::Transaction(function () {
                $this->validate([
                    'name' => 'required|string|max:255',
                    'image' => 'nullable|image',
                    'prix_unitaire' => 'required|numeric',
                ]);
    
                
                Ingredient::create([
                    'name' => $this->name,
                    'image' => $this->image,
                    'prix_unitaire' => $this->prix_unitaire,
                    'created_by' => auth()->check() ? auth()->id() : null,
                ]);
            });
    
            session()->flash('message', 'Ingrédient créé avec succès !');
            $this->reset();
        }
    }


    public function render()
    {
        return view('livewire.ingredients');
    }
}
