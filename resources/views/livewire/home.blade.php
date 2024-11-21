
<div x-data="{ activeComponent: null }">

    

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