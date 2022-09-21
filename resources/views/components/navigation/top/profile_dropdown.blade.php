<div
    x-data="{ profileDropdownOpen: false }"
    class="ml-3 relative">
    <div>
        <button @click="profileDropdownOpen = !profileDropdownOpen" type="button"
                class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open profile menu</span>
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user()->profile_photo_path)
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                     class="rounded-full h-8 w-8">
            @else
                <img class="h-8 w-8 rounded-full"
                     src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                     alt="Profile Image"
                >
            @endif
        </button>
    </div>
    {{-- profile dropdown content --}}
    <div
        x-cloak
        x-show="profileDropdownOpen"
        @click.outside="profileDropdownOpen = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-xl py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none text-gray-700 dark:border-2 dark-bg dark-text dark-border dark-border"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
        tabindex="-1">
        <div class="px-4 py-2 border-b border-gray-200 dark-border overflow-hidden">
            <span class="text-sm font-bold">{{ Auth::user()->name }}</span>
            <span class="text-xs font-medium">{{ Auth::user()->email }}</span>
        </div>
        <div class="px-4 py-2 space-y-2">
            <a href="{{ route('profile.show') }}" class="block text-sm"
               role="menuitem" tabindex="-1" id="user-menu-item-0">Edit Profile</a>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a @click.prevent="$root.submit();" href="{{ route('logout') }}"
                   class="block text-sm" role="menuitem" tabindex="-1"
                   id="user-menu-item-2">Sign Out</a>
            </form>
        </div>
    </div>
</div>
