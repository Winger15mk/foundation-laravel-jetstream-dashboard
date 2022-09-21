@props(['identifier','icon','menuData'])

<div x-data="{ {{ $identifier }}MenuOpen: false }" class="space-y-1">
    <button
        @click="{{ $identifier }}MenuOpen = !{{ $identifier }}MenuOpen"
        type="button"
        class="hover:bg-blue-600 dark-sidebar-link text-blue-100 group w-full flex items-center pl-2 pr-1 py-2 text-left text-base font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        aria-controls="sub-menu-1" aria-expanded="false">
        {{-- parent link menu icon --}}
        <x-dynamic-component :component="'icons.'.$icon"/>
        <span class="flex-1">{{ $slot }}</span>
        <x-navigation.side.arrow_icon ::class="{{ $identifier }}MenuOpen ? 'rotate-90' : ''"/>
    </button>
    {{-- expandable link section, show/hide based on state --}}
    <div
        x-cloak
        x-show="{{ $identifier }}MenuOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="space-y-1" id="{{ $identifier }}-menu"
    >
        {{-- loop menu link array --}}
        @foreach( $menuData as $key => $data )
            @if( is_array( $data ) )
                <div x-data="{ {{ $identifier . $key }}MenuOpen: false }">
                    <x-navigation.side.sub_link
                        @click="{{ $identifier . $key }}MenuOpen = !{{ $identifier . $key }}MenuOpen">

                        <span class="">{{ $key }}</span>

                        <x-navigation.side.arrow_icon ::class="{{ $identifier . $key }}MenuOpen ? 'rotate-90' : ''"/>
                    </x-navigation.side.sub_link>
                    <div
                        x-cloak
                        x-show="{{ $identifier . $key }}MenuOpen"
                        x-transition:enter="transition-opacity ease-linear duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-linear duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="space-y-1" id="{{ $identifier . $key }}-menu"
                    >
                        @foreach( $data as $subKey => $subValue )
                            <x-navigation.side.sub_link
                                href="{{ route($subValue) }}"
                                level="2">{{ $subKey }}
                            </x-navigation.side.sub_link>
                        @endforeach
                    </div>
                </div>
            @else
                <x-navigation.side.sub_link href="{{ route($data) }}">{{ $key }}</x-navigation.side.sub_link>
            @endif
        @endforeach
    </div>
</div>
