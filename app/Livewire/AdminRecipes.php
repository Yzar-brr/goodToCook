<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;
use App\Models\User;
use Livewire\WithFileUploads;

class AdminRecipes extends Component
{
    use WithFileUploads;
    public $recipes;
    public $showModal = false;
    public $editing = [];

    public function approve($id){
        $recipe = Recipe::find($id);
        $recipe->confirmed = !$recipe->confirmed;
        $recipe->save();
    }

    public function openModal($id){
        $this->editing = Recipe::find($id)->toArray();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->editing = [];
    }

    public function save()
    {
        $this->validate([
            'editing.name' => 'required|string|max:255',
            'editing.description' => 'required|string',
            'editing.confirmed' => 'required|boolean',
            'editing.consigne' => 'required|string',
            'editing.image' => 'image|max:2048',
        ]);

        $imagePath = $this->editing['image']->store('images', 'public');

        $recipe = Recipe::find($this->editing['id']);
        $recipe->update([
            'name' => $this->editing['name'],
            'description' => $this->editing['description'],
            'consigne' => $this->editing['consigne'],
            'image' => strval($imagePath),
        ]);
        $this->closeModal();
        $this->recipes = Recipe::all();
    }

    public function render()
    {
        $this->recipes = Recipe::all()->sortByDesc('confirmed');
        foreach ($this->recipes as $recipe) {
            isset($recipe->created_by) ? $recipe->created_by = User::find($recipe->created_by)->name : $recipe->created_by = 'Utilisateur inconnu';
        }

        return view('livewire.admin-recipes');
    }
}