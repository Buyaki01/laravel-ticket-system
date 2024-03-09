<x-app-layout>
    <section class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="font-bold text-3xl mb-6">{{ $ticket->title }}</h1>

        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-col mb-4">
                <p class="mb-4 text-xl text-bold break-words text-wrap">{{ $ticket->description }}</p>
                <div class="flex items-center justify-between text-sm">
                    <p>Created: {{ $ticket->created_at->diffForHumans() }}</p>

                    @if ($ticket->attachment)
                        <a href="{{ '/storage/' . $ticket->attachment }}" target="_blank" class="no-underline hover:underline">View Attachment</a>
                    @endif
                </div>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ route('ticket.edit', $ticket->id) }}">
                        <x-primary-button>
                            <i class="fas fa-edit" style="margin-right: 0.25rem;"></i> Edit
                        </x-primary-button>
                    </a>
    
                    <form method="post" action="{{ route('ticket.destroy', $ticket->id) }}">
                        @method('delete')
                        @csrf
    
                        <x-danger-button>
                            <i class="fas fa-trash-alt" style="margin-right: 0.25rem;"></i> Delete
                        </x-danger-button>
                    </form>
                </div>

                @if (auth()->user()->isAdmin)
                    <div class="flex items-center gap-4">
                        <form method="POST" action="{{ route('ticket.update', $ticket->id) }}">
                            @csrf
                            @method('patch')

                            <input type="hidden" name="status" value="resolved" />
                            <x-primary-button>
                                <i class="fas fa-check" style="margin-right: 0.25rem;"></i> Resolved
                            </x-primary-button>
                        </form>

                        <form method="POST" action="{{ route('ticket.update', $ticket->id) }}">
                            @csrf
                            @method('patch')

                            <input type="hidden" name="status" value="rejected" />
                            <x-danger-button>
                                <i class="fas fa-times" style="margin-right: 0.25rem;"></i> Rejected
                            </x-danger-button>
                        </form>
                    </div>
                @else
                    <p class="text-white text-lg font-bold">Status: {{ $ticket->status }}</p>
                @endif
            </div>

        </div>
    </section>
</x-app-layout>