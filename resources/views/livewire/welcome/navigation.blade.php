<div class="fixed top-0 right-0 p-6 z-10 flex space-x-4 w-64 h-16">
    @auth
        <a href="{{ url('/dashboard') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Dashboard</a>
    @else
        <a href="{{ route('login') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Log in</a>
        <a href="{{ route('register') }}" class="text-gray-200 p-4 cursor-pointer hover:text-white transition" wire:navigate>Register</a>
    @endauth
</div>