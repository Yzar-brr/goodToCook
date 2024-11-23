<div>
    <div class="flex flex-col p-4">


        <div class="flex flex-col p-4 w-full items-end">


            <div class="flex flex-col w-64">
                <div>
                    <small for="small-input" class="mb-2 text-sm font-medium text-gray-400 dark:text-gray-900 ">Rechercher une recette</small>
                    <input wire:model.live='researchRecipe' type="text" id="small-input" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder='Rechercher une recette'>
                </div>
            </div>


            <div class="flex w-full p-4 bg-red-600 h-12">
                <div>
                    Lorem ipsum dolor sit amet
                </div>
            </div>


        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($recipes as $recipe)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                <div class="overflow-hidden	h-52 w-full">
                    <img class="w-full h-52 object-cover" src="{{ asset('images/' . $recipe->image) }}" alt="{{ $recipe->description }}">
                </div>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-gray-900 dark:text-white">{{ $recipe->name }}</div>
                    <p class="text-gray-700 dark:text-gray-400 text-base">
                        {{-- @dump($recipe->image) --}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>