<div>
    @if($unreadNotifications->count() > 0)
        <x-general.card>
            <x-general.table>
                <x-slot:head>
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Message
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Created
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <x-icons.inbox_arrow class="h-6 w-6 cursor-pointer" wire:click="clearUnreadNotifications"/>
                            <span class="sr-only">Mark as read</span>
                        </th>
                    </tr>
                </x-slot:head>
                <x-slot:body>
                    @forelse($unreadNotifications as $notification)
                        <tr>
                            <td class="items-center px-3">
                                <x-icons.chat class="m-auto"/>
                            </td>
                            <td class="px-3 py-4 text-sm">
                                {{-- allow for html rendering in notification messages --}}
                                <div>{!! $notification->data['message'] !!}</div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <span
                    class="inline-flex rounded-full bg-green-100 dark-bg-secondary px-2 text-xs font-semibold leading-5 text-green-800 dark-text">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
                            </td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <div
                                    wire:click="markAsRead('{{ $notification->id }}')"
                                    class="cursor-pointer">
                                    <x-icons.inbox class="h-6 w-6"/>
                                </div>
                            </td>
                        </tr>
                    @empty
                        NO
                    @endforelse
                </x-slot:body>
            </x-general.table>
        </x-general.card>
        {{-- pagination links --}}
        <div class="mt-5">
            {{ $unreadNotifications->links() }}
        </div>
    @else
        <div
            class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 dark-border p-12 text-center text-gray-400 dark-text-secondary"
        >
            <x-icons.inbox class="mx-auto h-8 w-8"/>
            <span class="mt-2 block">
                No unread notifications
            </span>
        </div>
    @endif
</div>
