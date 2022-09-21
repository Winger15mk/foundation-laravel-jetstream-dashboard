<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 dark:border-r dark:border-slate-700">
    <div class="flex flex-col flex-grow pt-5 bg-blue-700 dark-bg overflow-y-auto">
        {{-- app home icon --}}
        <a href="{{ route('dashboard') }}">
            <div class="flex items-center flex-shrink-0 px-4">
                <img class="h-8 w-auto"
                     src="https://tailwindui.com/img/logos/workflow-mark.svg?color=blue&shade=300" alt="Workflow">
            </div>
        </a>
        {{-- sidebar links content --}}
        <div class="mt-5 flex-1 flex flex-col">
            <nav class="flex-1 px-2 pb-4 space-y-1">
                <x-navigation.side.sidebar_content/>
            </nav>
        </div>
    </div>
</div>
