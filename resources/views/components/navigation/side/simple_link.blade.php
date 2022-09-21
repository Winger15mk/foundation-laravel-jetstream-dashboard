@props(['active','icon' => 'home'])

<a {{ $attributes }} @class([
        'group flex items-center px-2 py-2 text-base font-medium rounded-md',
        'hover:bg-blue-600 dark-sidebar-link text-blue-100' => ! $active,
        'dark-bg-secondary text-white' => $active
])>
    <x-dynamic-component :component="'icons.'.$icon"/>
    {{ $slot }}
</a>
