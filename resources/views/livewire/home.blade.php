
<div x-data="{ activeComponent: null }">

    <div class="flex flex-col">
        <div class="flex flex-row w-full bg-red-600 h-12 items-center justify-between">
            @if (Auth::check() && Auth::user()->role == 'admin')
                <div class="flex flex-row">
                    <a class="text-gray-200 p-4 cursor-pointer flex justify-end hover:text-white transition"
                    @click="activeComponent = 'home'">Home</a>
                    <a class="text-gray-200 p-4 cursor-pointer flex justify-end hover:text-white transition"
                    @click="activeComponent = 'recipes'">Créer une recette</a>
                    <a class="text-gray-200 p-4 cursor-pointer flex justify-end hover:text-white transition"
                    @click="activeComponent = 'ingredients'">Créer un ingrédient</a>
                </div>
                <a class="text-white p-4 cursor-pointer flex justify-end" href='{{ route('dashboard') }}'>Panel</a>
            @elseif(Auth::check() && !Auth::user()->role == 'admin')
                <a class="text-white p-4 cursor-pointer" href='{{ route('profile') }}'>Profile</a>
            @endif
        </div>
    </div>

    <!-- Affichage des vues dynamique -->

    <div class="flex p-4">
        <div class="flex flex-col justify-center w-full">

            <div x-show="activeComponent === 'home'" x-transition>
                <h2 class="text-xl font-semibold mb-4">Home</h2>
            </div>

            <div x-show="activeComponent === 'recipes'" x-transition>
                <h2 class="text-xl font-semibold mb-4">Recettes</h2>
                <livewire:recipes />
            </div>

            <div x-show="activeComponent === 'ingredients'" x-transition>
                <h2 class="text-xl font-semibold mb-4">Ingrédients</h2>
                <livewire:ingredients />
            </div>

        </div>
    </div>
</div>