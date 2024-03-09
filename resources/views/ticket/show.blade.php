<x-app-layout>
    <section class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="font-bold text-3xl mb-6">{{ $ticket->title }}</h1>

        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-col">
                <p class="mb-4 text-xl text-bold text-wrap">{{ $ticket->description }}</p>

                <div class="flex items-center justify-between text-sm">
                    <p>Created: {{ $ticket->created_at->diffForHumans() }}</p>

                    @if ($ticket->attachment)
                        <a href="{{ '/storage/' . $ticket->attachment }}" target="_blank" class="mt-2 px-2 py-1 hover:underline">View Attachment</a>
                    @endif
                </div>
            </div>

            <div class="mt-4 flex items-center gap-4">
                <x-primary-button>
                    <i class="fas fa-edit"></i> Edit
                </x-primary-button>

                <form method="post" action="{{ route('ticket.destroy', $ticket->id) }}">
                    @method('delete')
                    @csrf

                    <x-danger-button>
                        <i class="fas fa-trash-alt"></i> Delete
                    </x-danger-button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>