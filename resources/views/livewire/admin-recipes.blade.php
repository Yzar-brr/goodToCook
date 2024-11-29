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
                @foreach($recipes as $recipe)
                    <div class="flex flex-row w-full rounded-md my-2">
                        <input type="text" value="{{ $recipe->id }}" placeholder="{{ $recipe->id }}" class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center bg-gray-200" disabled>
                        <input type="text" value="{{ $recipe->name }}" placeholder="{{ $recipe->name }}" class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center bg-gray-200" disabled >
                        <div type="text" class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center bg-gray-200">{{ $this->getUserName($recipe->created_by) }}</div>
                        <div type="text" class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center @if($recipe->confirmed) bg-green-200 @else bg-red-200 @endif">@if($recipe->confirmed) Oui @else Non @endif</div>
                        <div wire:click='approved({{$recipe->id}})' class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Approuver</div>
                        <div wire:click="modify({{$recipe->id}})" class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Modifier</div>
                        <div wire:click="$dispatch('openModal', { recipe: {{ json_encode($recipe) }} })" class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Voir</div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>