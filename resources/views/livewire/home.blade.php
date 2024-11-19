<div>
    <div class="flex flex-col">
        <div class="flex flex- w-full bg-red-600 h-12 justify-end align-center">
            @if (Auth::check())
                <a class="text-white p-4 cursor-pointer" href='{{route("login")}}'>Log In</a>
                <a class="text-white p-4 cursor-pointer" href='{{route("register")}}'>Register</a>
            @else
            <a class="text-white p-4 cursor-pointer" href='{{route("login")}}'>Log In</a>
                <a class="text-white p-4 cursor-pointer" href='{{route("register")}}'>Register</a>
                
            @endif
        </div>
        <div class="flex">


             <div class="flex flex-row">
                <span href='/profile'>Log In</span>
                <span>Register</span>
             </div>
            <div class="flex flex-row justify-center items-center">

                <livewire:recipes />
            </div>


        </div>
    </div>
</div>
