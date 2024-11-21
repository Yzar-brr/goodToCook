<div class="w-1/3">
    <div class="flex flex-row w-full h-12 items-center justify-end">

    @auth
        <a href="{{ url('/dashboard') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Log in</a>
        <a href="{{ route('register') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Register</a>
    @endauth
    </div>
</div>