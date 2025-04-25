<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Home extends Component
{
    public $ingredients;
    public $recipes;
    public $recipesIngredients = [];
    public $researchRecipe = '';
    public $principalRecipe;    
    public $search = '';
    public $vegetarian = false;
    public $favoritesOnly = false;
    public $recettes_favorites = [];
    

    public function render()
{
    // Récupération des recettes favorites de l'utilisateur
    $this->recettes_favorites = DB::table('recipes_favoris')
        ->where('user_id', auth()->user()->id)
        ->pluck('recipe_id')
        ->toArray();

    // Recette principale (dernière confirmée avec image)
    $this->principalRecipe = Recipe::where('confirmed', 1)
        ->whereNotNull('image')
        ->orderByDesc('id')
        ->first();

    // Construction de la requête de base
    $query = Recipe::query()->where('confirmed', 1);

    // Si recherche par nom
    if (!empty($this->researchRecipe)) {
        $query->where('name', 'like', '%' . $this->researchRecipe . '%');
    }

    // Si filtre favoris activé
    if ($this->favoritesOnly) {
        $query->whereIn('id', $this->recettes_favorites);
    }

    // Si filtre végétarien activé
    if ($this->vegetarian) {
        $query->whereDoesntHave('ingredients', function ($q) {
            $q->where('vege_option', 0); // contient un ingrédient non végé = rejeté
        })->whereHas('ingredients', function ($q) {
            $q->where('vege_option', 1); // contient au moins un ingrédient végé
        });
    }

    // Exécution finale de la requête
    $this->recipes = $query->orderByDesc('id')->get();

    // Autres données utiles pour la vue
    $this->ingredients = Ingredient::pluck('name', 'id')->toArray();

    $this->recipesIngredients = Recipe::with('ingredients')->get()->map(function ($recipe) {
        return $recipe->ingredients->pluck('id')->toArray();
    });

    return view('livewire.home');
}
    public function favorite(int $userId, int $recipeId)
    {
        // Vérifie si la ligne existe déjà dans la pivot
        $exists = DB::table('recipes_favoris')
                    ->where('user_id',   $userId)
                    ->where('recipe_id', $recipeId)
                    ->exists();

        if ($exists) {
            // Si déjà en favori → on supprime la ligne
            DB::table('recipes_favoris')
            ->where('user_id',   $userId)
            ->where('recipe_id', $recipeId)
            ->delete();
        } else {
            // Sinon → on insère la ligne
            DB::table('recipes_favoris')->insert([
                'user_id'    => $userId,
                'recipe_id'  => $recipeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    // public function favoriteToggle()
    // {
    //     $this->favoritesOnly = !$this->favoritesOnly;
    //     $this->render();
    // }
}
