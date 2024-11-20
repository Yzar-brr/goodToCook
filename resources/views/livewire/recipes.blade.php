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
        
            <form wire:submit.prevent="submit" class="flex">
                <div class="form-group">
                    <label for="name">Nom de la recette</label>
                    <input type="text" class="form-control" id="name" wire:model.live="name" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" wire:model.live="description"></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
                <div class="form-group">
                    <label for="temps">Temps de préparation (en minutes)</label>
                    <input type="number" class="form-control" id="temps" wire:model.live="temps" required>
                    @error('temps') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
                <div class="form-group">
                    <label for="consigne">Consignes</label>
                    <textarea class="form-control" id="consigne" wire:model.live="consigne"></textarea>
                    @error('consigne') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
                <div class="form-group">
                    <label for="ingredients">Ingrédients</label>
                    <select class="" id="ingredients">
                        @foreach ($allIngredients as $ingredient)
                            <option wire:model.live="ingredients.{{$ingredient->id}}" value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                        @endforeach
                    </select>
                    @error('ingredients') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
                <button type="submit" class="btn btn-primary">Soumettre la recette</button>
            </form>
        </div>
    </div>
</div>