<x-app-layout>
    <section class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="font-bold text-xl">{{ $ticket->title }}</h1>

        <div class="flex justify-between w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <p>{{ $ticket->description }}</p>

            <p>{{ $ticket->created_at->diffForHumans() }}</p>

            @if($ticket->attachment)
                <p>Attachment</p>
            @endif
        </div>
    </section>
</x-app-layout>