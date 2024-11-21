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
        <div class="relative sm:flex sm:items-center min-h-screen items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="flex fixed top-0 p-6 z-10 flex space-x-4 h-16">
                <div class="flex flex-row w-full h-12 items-center justify-between">
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition" @click="activeComponent = 'home'">Home</a>
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition" @click="activeComponent = 'recipes'">Créer une recette</a>
                    <a class="text-gray-200 p-4 cursor-pointer hover:text-white transition" @click="activeComponent = 'ingredients'">Créer un ingrédient</a>
                </div>
            </div>
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <div class="flex w-5/6 bg-white rounded-md">
            
            </div>
        </div>
    </body>
</html>
