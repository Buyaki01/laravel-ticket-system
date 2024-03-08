
<x-app-layout>
    <section class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="font-bold text-xl">Support Tickets </h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            @forelse ($tickets as $ticket)
                <div class="flex items-center justify-between py-2">
                    <div class="flex-grow">{{ $ticket->title }}</div>
                    <div>{{ $ticket->created_at->diffForHumans() }}</div>
                </div>
            @empty
                <p class="text-white">You don't have any support ticket yet.</p>
            @endforelse
        </div>
    </section>
</x-app-layout>