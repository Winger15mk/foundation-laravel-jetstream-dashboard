@props(['level' => 1])

<a
    {{ $attributes }}
    @class([
        'group w-full flex items-center pr-2 py-2 text-base font-medium text-blue-100 rounded-md hover:bg-blue-600 dark-sidebar-link cursor-pointer',
        'pl-12' => $level == 1,
        'pl-16' => $level == 2
    ])
>
    {{ $slot }}
</a>
