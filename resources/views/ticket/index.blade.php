<x-app-layout>
    <section class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="font-bold text-xl">Support Tickets </h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex items-center justify-between mb-4">
                <p class="font-bold text-xl">Your Support Tickets</p>
                <a href="{{ route('ticket.create') }}" class="whitespace-nowrap">
                    <x-primary-button>
                        <i class="fas fa-plus mr-2" style="margin-right: 0.25rem;"></i> Create New Ticket
                    </x-primary-button>
                </a>
            </div>

            @forelse ($tickets as $ticket)
                <div class="flex items-center justify-between py-2">
                    <div class="flex-grow">
                        <a href="{{ route('ticket.show', $ticket->id) }}">
                            {{ $ticket->title }}
                        </a> 
                    </div>
                    <div>{{ $ticket->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p class="text-white">You don't have any support ticket yet.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>