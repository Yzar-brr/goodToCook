<div class="">
    @foreach($recipes as $recipe)
        <div class="flex flex-row w-full p-4 rounded-md bg-red-100 my-2">
            <div class="flex justify-center w-1/3">
                <p>{{ $recipe->name }}</p>
            </div>
            <div class="flex justify-center w-1/3">
                <button class="flex w-1/2 h-8 rounded-md bg-blue-600 text-white justify-center items-center cursor-pointer">
                    <span>Voir</span>
                </button>
            </div>
            <div class="flex justify-center w-1/3">
                <p>@isset($recipe->created_at){{$recipe->created_at->format('d/m/Y')}}@else{{'x'}}@endisset</p>
            </div>
        </div>
        @endforeach
</div>
