<div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
    <div
        x-cloak
        x-show="mobileMenuOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
    <div
        x-cloak
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-0 flex z-40">
        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 bg-blue-700 dark-bg">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    {{-- cross close mobile menu --}}
                    <x-icons.cross class="h-6 w-6 text-white dark-text"/>
                </button>
            </div>
            <a href="{{ route('dashboard') }}">
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto"
                         src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blue&shade=300"
                         alt="Workflow">
                </div>
            </a>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                    <x-navigation.side.sidebar_content/>
                </nav>
            </div>

        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            {{-- dummy element to force sidebar to shrink to fit close icon --}}
        </div>
    </div>
</div>
