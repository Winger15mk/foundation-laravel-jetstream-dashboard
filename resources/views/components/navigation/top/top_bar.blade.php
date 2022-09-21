<div
    class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow-md dark-bg dark:border-b dark:border-slate-700">
    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
            class="px-4 border-r border-gray-200 dark:border-slate-700 text-gray-500 dark-text focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        {{-- open mobile menu icon --}}
        <x-icons.open_menu class="h-6 w-6"/>
    </button>
    <div class="flex-1 px-4 flex justify-between">
        <div class="flex-1 flex">
            @if(config('view.dashboard_search_enabled'))
                <form class="w-full flex md:ml-0" action="#" method="GET">
                    <label for="search-field" class="sr-only">Search</label>
                    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pointer-events-none dark-text"
                        >
                            <x-icons.search class="h-5 w-5"/>
                        </div>
                        <input id="search-field"
                               class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 dark-placeholder focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm dark-bg dark-text"
                               placeholder="Search"
                               type="search"
                               name="search"
                        >
                    </div>
                </form>
            @endif
        </div>
        <div class="ml-4 flex items-center md:ml-6">
            {{-- dark mode switcher --}}
            <x-navigation.top.dark_switcher/>
            {{-- notifications dropdown --}}
            @if(!request()->routeIs('notifications'))
                <livewire:notifications-dropdown/>
            @else
                <div class="ml-3 p-1 rounded-full">
                    <x-icons.bell class="text-gray-300 dark-text-secondary"/>
                </div>
            @endif
            {{-- profile dropdown --}}
            <x-navigation.top.profile_dropdown/>
        </div>
    </div>
</div>
