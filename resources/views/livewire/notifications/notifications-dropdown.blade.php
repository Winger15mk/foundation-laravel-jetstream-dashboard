<div
    x-data="{ notificationsDropdownOpen: false }"
    class="ml-3 relative">
    <div>
        <button
            @click="notificationsDropdownOpen = !notificationsDropdownOpen"
            type="button"
            class="p-1 rounded-full text-gray-500 dark-text">
            <span class="sr-only">View notifications</span>
            {{-- bell icon --}}
            <span class="flex h-6 w-6">
                {{-- pulse when have notifications --}}
                @if($unreadNotifications->count() > 0)
                    <span
                        class="animate-ping-slow absolute inline-flex h-3 w-3 right-0 rounded-full bg-blue-500"
                    ></span>
                @endif
                <span>
                    <x-icons.bell/>
                </span>
            </span>
        </button>
    </div>
    {{-- notifications dropdown content --}}
    <div
        x-cloak
        x-show="notificationsDropdownOpen"
        @click.outside="notificationsDropdownOpen = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-72 sm:w-96 rounded-md shadow-lg py-1 bg-gray-100 text-black dark-bg-secondary dark-text focus:outline-none border-2 dark-border"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="dropdown-notifications"
        tabindex="-1"
    >
        <div>
            @if($unreadNotifications->count() > 0)
                <div class="p-2 text-left font-medium text-base flex items-center align-middle">
                <span class="pl-2">
                    Notifications
                    {{-- total notification count --}}
                    <span
                        class="ml-1 inline-flex rounded-full bg-blue-500 dark-bg px-2 text-xs font-semibold leading-5 text-white dark-text">
                        {{ $unreadNotifications->count() }}
                    </span>
                </span>
                    @if($unreadNotifications->count() > 0)
                        <span class="flex-1 items-right text-right pr-2 text-xs text-blue-500 dark-text cursor-pointer"
                              wire:click="clearUnreadNotifications">
                            Clear all unread
                        </span>
                    @endif
                </div>
                {{-- notifications content --}}
                <div
                    class="bg-white dark-bg text-sm text-gray-900 max-h-96 overflow-y-scroll scrollbar-thin scrollbar-thumb-gray-100 dark-scrollbar dark-scrollbar-track divide-y-2 dark-divide">
                    {{-- loop unread notifications --}}
                    @forelse($unreadNotifications->take(50) as $notification)
                        <div class="flex items-center justify-center p-2 py-4">
                            <div class="p-3 dark-text">
                                <x-icons.chat/>
                            </div>
                            <div class="ml-2 flex-1 dark-text">
                                {{-- allow for html rendering in notification messages --}}
                                <div>{!! $notification->data['message'] !!}</div>
                                <div class="text-xs text-blue-500 pt-2 font-semibold dark-text-secondary">
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div class="p-4 mr-2 cursor-pointer dark-text"
                                 wire:click="markAsRead('{{ $notification->id }}')"
                            >
                                <x-icons.inbox class="h-6 w-6"/>
                            </div>
                        </div>
                    @empty
                        <div class="py-10 px-2 text-center text-gray-400">
                            No unread notifications
                        </div>
                    @endforelse
                </div>
                {{-- view all notifications --}}
                <div class="text-center">
                    <a href="{{ route('notifications') }}" class="p-2 flex items-center justify-center text-sm">
                        <x-icons.eye/>
                        <span class="ml-2 font-medium">View All</span>
                    </a>
                </div>
            @else
                <div class="p-4 text-gray-500 dark-text">
                    <x-icons.inbox class="h-8 w-8 mx-auto"/>
                    <div class="mt-2 block text-center">
                        No unread notifications
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
