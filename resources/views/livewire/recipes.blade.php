<div x-data="{ ingredientShow: false }">
    <div class="flex w-full rounded-md shadow p-4">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Proposer une recette</h2>

            @if (session()->has('message'))
                <div class="alert alert-success text-green-600 mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="submit" class="flex flex-col space-y-4">
                <!-- Nom de la recette -->
                <div class="form-group flex flex-col">
                    <label for="name" class="font-medium">Nom de la recette</label>
                    <input type="text" id="name" wire:model.live="name" class="border rounded p-2" />
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="form-group flex flex-col">
                    <label for="description" class="font-medium">Description</label>
                    <textarea id="description" wire:model.live="description" class="border rounded p-2"></textarea>
                    @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Temps de préparation -->
                <div class="form-group flex flex-col">
                    <label for="temps" class="font-medium">Temps de préparation (en minutes)</label>
                    <input type="number" id="temps" wire:model.live="temps" class="border rounded p-2" />
                    @error('temps') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Consignes -->
                <div class="form-group flex flex-col">
                    <label for="consigne" class="font-medium">Consignes</label>
                    <textarea id="consigne" wire:model.live="consigne" class="border rounded p-2"></textarea>
                    @error('consigne') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Image de la recette -->
                <div class="form-group flex flex-col">
                    <label for="image" class="font-medium">Image de la recette</label>
                    <input type="file" id="image" wire:model.live="image" class="border rounded p-2" accept="image/*" />
                    @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Ingrédients -->
                <div class="form-group flex flex-col p-4 bg-gray-100 rounded">
                    <label class="font-semibold mb-2">Ingrédients</label>

                    <div class="flex items-center space-x-4 mb-4">
                        <input
                            type="text"
                            placeholder="Rechercher un ingrédient..."
                            wire:model.live="ingredientResearch"
                            class="flex-1 h-8 px-2 border rounded"
                        />
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only" @click="ingredientShow = !ingredientShow" />
                            <div
                                class="w-11 h-6 bg-gray-300 rounded-full relative transition-all duration-200"
                                :class="ingredientShow ? 'bg-blue-600' : ''"
                            >
                                <span
                                    class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-200"
                                    :class="ingredientShow ? 'translate-x-5' : ''"
                                ></span>
                            </div>
                            <span class="ml-2 text-sm">Afficher tous</span>
                        </label>
                    </div>

                    <!-- Tags sélectionnés -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($ingredient as $id => $selected)
                            @if($selected)
                                @php $ing = $allIngredients->firstWhere('id', $id); @endphp
                                @if($ing)
                                    <span class="flex items-center bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full text-sm">
                                        {{ $ing->name }}
                                        <button
                                            type="button"
                                            wire:click="ingredient.{{ $id }} = false"
                                            class="ml-1 focus:outline-none"
                                        >
                                            ✕
                                        </button>
                                    </span>
                                @endif
                            @endif
                        @endforeach
                    </div>

                    <!-- Grille d'ingrédients filtrée par le backend -->
                    <div x-show="ingredientShow || ingredientResearch" x-transition class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                        @foreach ($allIngredients as $ing)
                            <label
                                for="ingredient-{{ $ing->id }}"
                                class="cursor-pointer select-none flex items-center justify-center px-3 py-1 rounded-full border transition-colors duration-150
                                    {{ ($ingredient[$ing->id] ?? false)
                                        ? 'bg-blue-600 text-white border-blue-600'
                                        : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-100' }}"
                            >
                                <input
                                    type="checkbox"
                                    id="ingredient-{{ $ing->id }}"
                                    wire:model.live="ingredient.{{ $ing->id }}"
                                    class="hidden"
                                />
                                {{ $ing->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="bg-blue-600 text-white py-2 rounded">Soumettre la recette</button>
            </form>
        </div>
    </div>
</div>
