<div>
    <!-- Contenu principal -->
    <div class="p-6 text-gray-900">
        <!-- Table des recettes -->
        <div class="flex flex-col">
            <!-- Headers -->
            <div class="flex w-full">
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">id</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">name</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">created_by</div>
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">approved?</div>
            </div>

            <!-- Liste des recettes -->
            <div class="flex flex-col">
                @foreach($recipes as $recipe)
                    <div class="flex flex-row w-full rounded-md my-2">
                        <input type="text" value="{{ $recipe->id }}" placeholder="{{ $recipe->id }}" class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4" disabled>
                        <input type="text" value="{{ $recipe->name }}" placeholder="{{ $recipe->name }}" class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4" disabled>
                        <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4">{{ $recipe->created_by }}</div>
                        <div class="flex w-32 h-8 rounded-sm m-2 px-4 justify-center items-center @if($recipe->confirmed) bg-green-200 @else bg-red-200 @endif">
                            @if($recipe->confirmed) Oui @else Non @endif
                        </div>
                        <div wire:click="approve({{$recipe->id}})" class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Approuver</div>
                        <div wire:click="openModal({{$recipe->id}})" class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Modifier</div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-xl font-semibold mb-4">Modifier la recette</h2>
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="name" wire:model="editing.name" class="mt-1 p-2 w-full border rounded-md">
                        @error('editing.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" id="name" wire:model="editing.description" class="mt-1 p-2 w-full border rounded-md">
                        @error('editing.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Temps</label>
                        <input type="text" id="name" wire:model="editing.temps" class="mt-1 p-2 w-full border rounded-md">
                        @error('editing.temps') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Consigne</label>
                        <input type="text" id="name" wire:model="editing.consigne" class="mt-1 p-2 w-full border rounded-md">
                        @error('editing.consigne') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <input type="file" wire:model="editing.image" class="mt-1 p-2 w-full border rounded-md">
                    </div>


                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal" class="mr-2 px-4 py-2 bg-gray-300 rounded-md">Annuler</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
