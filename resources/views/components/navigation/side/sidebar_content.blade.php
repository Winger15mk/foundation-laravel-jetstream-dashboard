{{-- dashboard home link --}}
<x-navigation.side.simple_link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" icon="home">
    {{ __('Dashboard') }}
</x-navigation.side.simple_link>

@php
    $sellingMenu = [
        'General'   =>  'dashboard',
        'Users'     =>  'dashboard',
        'Dropdown'   =>  [
            'Sub 1' =>  'dashboard',
            'Sub 2' =>  'dashboard',
            'Sub 3' =>  'dashboard',
            'Sub 4' =>  'dashboard'
        ]
    ];
@endphp

<x-navigation.side.nested_links href="{{ route('dashboard') }}"
                                :active="request()->routeIs('dashboard')"
                                :menuData="$sellingMenu"
                                icon="cog"
                                identifier="settings"
>
    {{ __('Settings') }}
</x-navigation.side.nested_links>
