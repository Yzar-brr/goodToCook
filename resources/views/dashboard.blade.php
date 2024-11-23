<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col w-full">
                        <div class="flex w-full justify-center text-gray-800 text-xl p-4">
                            <label for="recipe">Mes recettes</label>
                        </div>
                        <div class="flex flex-row w-full">



                            <div class="flex flex-col w-1/2 items-center">
                                <label for="title" class="p-1 bg-green-300 rounded-md">En ligne</label>
                                <div class="flex flex-row w-full p-4">
                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Nom</label>
                                    </div>

                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Aperçu</label>
                                    </div>

                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Crée le</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                    <livewire:client-recipe-online />
                                </div>
                            </div>



                            <div class="flex flex-col w-1/2 items-center">
                                <label for="title" class="p-1 bg-red-300 rounded-md">En attente d'approbation</label>
                                <div class="flex flex-row w-full p-4">
                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Nom</label>
                                    </div>

                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Aperçu</label>
                                    </div>

                                    <div class="flex justify-center w-1/3">
                                        <label for="name">Crée le</label>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full">
                                    <livewire:client-recipe-pending />
                                </div>
                            </div>



                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>