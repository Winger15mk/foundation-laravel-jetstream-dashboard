<x-app-layout>
    {{-- header title --}}
    <x-slot name="header">
        {{ __('Notifications') }}
    </x-slot>
    <livewire:notification-table/>
</x-app-layout>
