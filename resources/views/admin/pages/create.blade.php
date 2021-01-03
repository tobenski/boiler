<x-admin-layout>
    <x-slot name="header">
        Create New Page
    </x-slot>
    <div class="py-4">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-shite border-b border-secondary flex min-h-full overflow-hidden">
                    <aside class="max-w-xs w-72 bg-headerBg text-headerText min-h-full p-6 flex flex-col items-start justify-start">
                        @foreach($pages as $index => $p)
                            <x-admin.sidebar-button href="{{ route('admin.page.edit', $p->id) }}">
                                {{ $p->name }}
                            </x-admin.sidebar-button>
                        @endforeach
                    </aside>
                    <article class="p-8 w-full">
                        <x-auth-session-status class="mb-4" :status="session('success')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('admin.page.store') }}">
                            @csrf
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
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
