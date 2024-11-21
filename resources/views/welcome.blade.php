<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div x-data="{ activeComponent: 'home' }" class="flex min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500">
        <div class="flex fixed w-full top-0 h-16 z-30 p-6 justify-between bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 items-center">
            <!-- Menu de navigation -->
            <div>
                <div class="flex flex-row w-full h-12 items-center justify-between">
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition"
                        @click="activeComponent = 'home'">Home</a>
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition"
                        @click="activeComponent = 'recipes'">Créer une recette</a>
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition"
                        @click="activeComponent = 'ingredients'">Créer un ingrédient</a>
                </div>
            </div>
                <livewire:welcome.navigation />
        </div>
        


        <!-- Contenu principal -->
        <div class="m-6 p-4 w-full">
            <div>
                <!-- Section Home -->
                <div x-show="activeComponent === 'home'" x-transition>
                    <div class="py-12">
                        <div class="mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    {{ __("You're logged in!") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Recettes -->
                <div x-show="activeComponent === 'recipes'" x-transition>
                    <div class="py-12">
                        <div class=" mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <livewire:recipes />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Ingrédients -->
                <div x-show="activeComponent === 'ingredients'" x-transition>
                    <div class="py-12">
                        <div class=" mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <livewire:ingredients />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</body>

</html>