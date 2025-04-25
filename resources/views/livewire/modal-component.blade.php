<div
    x-data="{ open: @entangle('isOpen') }"
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title" role="dialog" aria-modal="true"
>
    <div class="flex items-end justify-center min-h-screen p-4 text-center sm:block sm:p-0">
        <!-- Modal overlay -->
        <div class="fixed inset-0 transition-opacity
        bg-gray-500 bg-opacity-75" @click="open = false"></div>

        <!-- Modal content -->
        @isset($recipe)
        <div class="inline-block overflow-hidden text-left
        align-bottom transition-all transform bg-white rounded-lg
        shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <!-- Your modal content goes here -->
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900"
                        id="modal-title">
                            Recette
                        </h3>
                        <div class="mt-2">
                            <h4>
                                {{$this->recipe['name']}}
                            </h4>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 w-full">
                                {{-- {{}} --}}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 w-full">
                                Temps de préparation : {{$this->recipe['temps']}} min
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 w-full">
                                <h3>Consgines :</h3>
                                @foreach($this->recipe['consigne'] as $consigne)
                                <li>{{$consigne}}</li>
                                @endforeach
                            </p>
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 w-full">
                                <h3>Ingredients :</h3>
                                @foreach($this->ingredients as $ingredient)
                                <li>{{$ingredient['name']}} - {{$ingredient['quantite']}} {{$ingredient['unite']}}</li>
                                @endforeach
                            </p>
                        </div>
                        {{-- <div class="mt-2">
                            <p class="text-sm text-gray-500 w-full">
                                <img class="w-full h-52 object-cover" src="{{ asset('images/' . $recipe['image']) }}" alt="{{ $recipe['description'] }}">
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endisset
            <!-- Modal footer -->
            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex
            sm:flex-row-reverse">
                <button type="button" @click="open = false" class="w-full px-4 py-2 mt-3 font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
                <!-- Additional buttons -->
            </div>
        </div>
    </div>
</div>