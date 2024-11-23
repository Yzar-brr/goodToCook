<div>
    <div class="p-6 text-gray-900">
        <div class="flex flex-col">
            <div class="flex w-full">
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">id</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">name</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">created_by</div>
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">approved?</div>
            </div>

            <div class="flex flex-col">
                @foreach($ingredients as $ingredient)
                    <div class="flex flex-row w-full rounded-md @if($ingredient->confirmed) bg-green-200 @else bg-red-200 @endif my-2">
                        <div class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center">{{ $ingredient->id }}</div>
                        <div class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center">{{ $ingredient->name }}</div>
                        <div class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center">{{ $ingredient->created_by }}</div>
                        <div class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center">{{ $ingredient->confirmed }}</div>
                        <div wire:click='approved({{$ingredient->id}})' class="flex w-32 h-8 bg-green-400 text-white rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Aprrove</div>
                        <div wire:click='delete({{$ingredient->id}})' class="flex w-32 h-8 bg-red-400 text-white rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Delete</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
