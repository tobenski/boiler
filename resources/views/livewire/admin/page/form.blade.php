<article x-show="active == '{{ $page->id }}'"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform"
    x-transition:enter-end="opacity-100 transform"
    x-cloak
    class="p-8 w-full"
    wire:key='page-field-{{ $page->id }}'>
    <x-auth-session-status class="mb-4" :status="session('success')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent='submit' method="POST">
        @csrf
        <div class="mb-6">
            <x-label for="page.name" :value="__('Page Name')" />

            <input type="text" wire:model="page.name"
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            @error('page.name') <span class="text-xs italic text-danger">{{ $message }}</span>@enderror
        </div>


        <div class="flex items-center justify-end">

            <x-button class="ml-3">
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
    <a href="{{ route('admin.pages.media') . '?page_id=' . $page->id }}">Go To Media</a>
</article>

<!-- <div>


    <form method="POST" wire:submit.prevent="submit">

        <x-media-library-collection
            name="albums"
            :model="$page"
            collection="album"
        />

        <button type="submit">Submit</button>
    </form>
</div>
-->
