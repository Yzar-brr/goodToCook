<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Recipes extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $temps;
    public $consigne;
    public $image;

    public $ingredient = []; // [id => true/false]
    public $ingredientQuantities = []; // [id => ['quantity' => ..., 'unit' => ...]]
    public $allIngredients;
    public string $ingredientResearch = '';

    // Soumission du formulaire
    public function submit()
    {
        DB::transaction(function () {
            // Validation des champs
            $this->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'temps' => 'required|integer',
                'consigne' => 'nullable|string',
                'image' => 'required|image|max:2048',
                'ingredient' => 'required|array|min:1',
            ]);

            // Sauvegarde de l'image
            $imagePath = $this->image->store('images', 'public');

            // Création de la recette
            $recipe = Recipe::create([
                'name' => $this->name,
                'description' => $this->description,
                'temps' => $this->temps,
                'consigne' => $this->consigne,
                'image' => $imagePath,
                'created_by' => auth()->check() ? auth()->id() : null,
            ]);

            // Association des ingrédients avec quantité et unité
            foreach ($this->ingredient as $ingredientId => $selected) {
                if ($selected && isset($this->ingredientQuantities[$ingredientId])) {
                    $data = $this->ingredientQuantities[$ingredientId];

                    $recipe->ingredients()->attach($ingredientId, [
                        'quantity' => $data['quantity'] ?? null,
                        'unite' => $data['unit'] ?? null,
                        'created_at' => now(),
                    ]);
                }
            }
        });

        // Réinitialisation des données
        $this->reset();
        session()->flash('message', 'Recette créée avec succès !');
        $this->reset('image');
        session()->flash('image_message', 'Image chargée avec succès.');
    }

    // Mise à jour d'un ingrédient : on peut nettoyer les quantités
    public function updatedIngredient($value, $key)
    {
        if (!$value) {
            unset($this->ingredientQuantities[$key]);
        }
    }

    // Chargement des ingrédients avec recherche
    public function render()
    {
        $query = Ingredient::query()
            ->where('confirmed', 1);

        if (!empty($this->ingredientResearch)) {
            $query->where('name', 'like', '%' . $this->ingredientResearch . '%');
        }

        $this->allIngredients = $query->get();

        return view('livewire.recipes');
    }


}