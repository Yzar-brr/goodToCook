<div>
    <div class="flex w-full rounded-md shadow p-4">
        <div class="container">
            <h2>Proposer une recette</h2>

            <!-- Affichage des messages de succès -->
            @if (session()->has('message'))
                <div class="alert alert-success text-green-600">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submit" class="flex flex-col space-y-4">
                <div class="form-group flex flex-col">
                    <label for="name">Nom de la recette</label>
                    <input type="text" class="form-control" id="name" wire:model.live="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex flex-col">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" wire:model.live="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="temps">Temps de préparation (en minutes)</label>
                    <input type="number" class="form-control" id="temps" wire:model.live="temps">
                    @error('temps')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="consigne">Consignes</label>
                    <textarea class="form-control" id="consigne" wire:model.live="consigne"></textarea>
                    @error('consigne')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group flex flex-col p-4 bg-gray-200 rounded-sm">
                    <label for="ingredient">Ingrédients</label>
                    <small for="researchIngredient">Rechercher un ingrédient</small>
                    <input type="text" placeholder="Effectuer une recherche" class="w-64 h-8" wire:model.live='ingredientResearch'>

                    @foreach ($allIngredients as $ingredient)
                        <div class="flex flex-row mx-1 h-6 items-center">
                            <input class="flex justify-center items-center" type="checkbox" wire:model.live="ingredient.{{ $ingredient->id }}" id="ingredient-id-{{ $ingredient->id }}" />
                            <label class="flex justify-center items-center ml-2" for="ingredient-id-{{ $ingredient->id }}">{{ $ingredient->name }}</label>
                        </div>
                    @endforeach

                    <small class="text-gray-500">Ajoutez des ingrédients en cochant les cases.</small>
                    @error('ingredient')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="image">Sélectionnez une image</label>
                    <input type="file" class="form-control" id="image" wire:model.live="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if (session()->has('image_message'))
                        <div class="alert alert-success text-green-600">
                            {{ session('image_message') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Soumettre la recette</button>
            </form>
        </div>
    </div>
</div>
