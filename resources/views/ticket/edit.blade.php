<x-app-layout>
    <div class="text-white min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class="text-white text-lg font-bold">Update support ticket</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
        
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus value="{{ $ticket->title }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
        
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea id="description" placeholder="Add description" name="description" class="block mt-1" value="{{ $ticket->description }}" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    @if ($ticket->attachment)
                        <a href="{{ '/storage/' . $ticket->attachment }}" target="_blank" class="mt-2 px-2 py-1 hover:underline">View Attachment</a>
                    @endif
                </div>

                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input type="file" name="attachment" id="attachment" class="block mt-1"/>
                    <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>