<div>
    <div class="p-6 text-gray-900">
        <div class="flex flex-col">
            <div class="flex w-full">
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">id</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">name</div>
                <div class="flex w-1/4 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">email</div>
                <div class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center">role</div>
            </div>

            <div class="flex flex-col">
                @foreach($users as $user)
                    <div class="flex flex-row w-full rounded-md my-2">
                        <div class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center">{{ $user->id }}</div>
                        <div class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center">{{ $user->name }}</div>
                        <div class="flex w-1/4 h-8 bg-white  rounded-sm m-2 px-4 justify-center items-center">{{ $user->email }}</div>
                        <div class="flex w-32 h-8  bg-white rounded-sm m-2 px-4 justify-center items-center">{{ $user->role }}</div>
                        <div wire:click='promote({{$user->id}})' class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Promote</div>
                        <div wire:click='demote({{$user->id}})' class="flex w-32 h-8 bg-gray-200 rounded-sm m-2 px-4 justify-center items-center cursor-pointer">Demote</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
