<article class="p-8 w-full">
        <x-auth-session-status class="mb-4" :status="session('success')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.page.update', $page->id) }}">
            @csrf
            @method('put')
            <x-tobenski-input :model="$page" attr="name" title="{{ __('Page Name') }}" class="block mt-1 w-full" />
            <x-tobenski-input :model="$page" attr="slug" title="{{ __('Page Slug') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="description" title="{{ __('Page Description') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="short_description" rows="5" title="{{ __('Short Description') }}" class="block mt-1 w-full" />
            <x-tobenski-input :model="$page" attr="keywords" title="{{ __('Keywords (comma seperated)') }}" class="block mt-1 w-full" />
            <x-tobenski-input :model="$page" attr="header_1" title="{{ __('First Header') }}" class="block mt-1 w-full" />
            <x-tobenski-input :model="$page" attr="header_2" title="{{ __('Second Header') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="content_1" title="{{ __('Content 1') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="content_2" title="{{ __('Content 2') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="content_3" title="{{ __('Content 3') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="content_4" title="{{ __('Content 4') }}" class="block mt-1 w-full" />
            <x-tobenski-textarea :model="$page" attr="notes" title="{{ __('Page Notes') }}" class="block mt-1 w-full" />
            <x-tobenski-input :model="$page" attr="online" title="{{ __('Online') }}" type="checkbox" class="block mt-1 w-8 h-8" />
            <x-tobenski-input :model="$page" attr="order" title="{{ __('Order Key') }}" type="tel" class="block mt-1 w-auto" />
            <x-tobenski-select :model="$page" attr="parent_id" title="{{ __('Parent') }}" :collection="\App\Models\Page::where('parent_id', null)->get()" class="block mt-1 wauto" />

            <div class="flex items-center justify-end">

                <x-button class="ml-3">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.page.image.store', $page->id) }}">
            @csrf
            <div class="flex flex-col items-start justify-start w-full">
                <h2>Page Picture:</h2>
                {{ $page->getFirstMedia('page') ? $page->getFirstMedia('page')->img()->attributes(['class' => 'w-1/5 my-4']) : '' }}
                <x-media-library-attachment name="pagePicture" class="w-full" rules="max:102400" />
            </div>
            <div class="flex items-center justify-end">

                <x-button class="ml-3">
                    {{ __('Gem Billede') }}
                </x-button>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.page.album.store', $page->id) }}">
            @csrf
            <div class="flex flex-col items-start justify-start">
                <h2>Page Album:</h2>
                <div class="flex items-center justify-between w-full">
                    @foreach($page->getMedia('album') as $media)
                        {{ $media->img()->attributes(['class' => 'w-1/5 my-4 border-2 border-black']) }}
                    @endforeach
                </div>
                <x-media-library-attachment name="album" class="w-full" rules="max:102400" multiple />
            </div>
            <div class="flex items-center justify-end">

                <x-button class="ml-3">
                    {{ __('Gem Billede(r)') }}
                </x-button>
            </div>
        </form>
</article>
