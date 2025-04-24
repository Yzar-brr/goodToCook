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
    public array $ingredients;
    public $ingredient = [];
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
            'ingredient' => 'required|array|min:1', // On exige qu'au moins un ingrédient soit sélectionné
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

        // Association des ingrédients sélectionnés à la recette
        foreach ($this->ingredient as $ingredientId) {
            $recipe->ingredients()->attach($ingredientId);
        }
    });

    // Réinitialisation des données
    $this->reset();
    session()->flash('message', 'Recette créée avec succès !');
    $this->reset('image');
    session()->flash('image_message', 'Image chargée avec succès.');
}

// Méthode pour afficher les ingrédients dans la vue
public function render()
{
    // Recherche des ingrédients en fonction de l'entrée
    if($this->ingredientResearch != '') {
        $this->allIngredients = Ingredient::where('name', 'like', '%' . $this->ingredientResearch . '%')
            ->where('confirmed', '=', 1) // Assurez-vous que l'ingrédient est confirmé
            ->get();
    } else {
        // Si aucun mot-clé n'est saisi, afficher tous les ingrédients confirmés
        $this->allIngredients = Ingredient::where('confirmed', '=', 1)->get();
    }

    // Retourner la vue de la recette
    return view('livewire.recipes');
}
}