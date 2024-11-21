<div>
    <div class="flex w-full rounded-md shadow p-4">
        <div class="container">
            <h2>Proposer un ingrédient</h2>

            <!-- Affichage des messages de succès -->
            @if (session()->has('message'))
                <div class="alert alert-success text-green-600">
                    {{ session('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger text-red-600">
                    {{ session('error') }}
                </div>
                @endif

            <form wire:submit.prevent="submit" class="flex flex-col space-y-4">
                <div class="form-group flex flex-col">
                    <label for="name">Nom de l'ingrédient</label>
                    <input type="text" class="form-control" id="name" wire:model.live="name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group flex flex-col">
                    <label for="description">Sélectionnez une image</label>
                    <input type="file" class="form-control" id="image" wire:model.live="image">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex flex-col">
                    <label for="temps">Prix (€)</label>
                    <input type="number" class="form-control" id="temps" wire:model.live="prix_unitaire" required>
                    @error('temps')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Soumettre la demande</button>
            </form>
        </div>
    </div>
</div>
