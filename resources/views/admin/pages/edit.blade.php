<x-admin-layout>
    <x-slot name="header">
        Edit page: {{ $page->name }}
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
                        <x-admin.sidebar-button href="{{ route('admin.page.create') }}" class="border-t border-white w-full">
                            {{ __('Create New Page') }}
                        </x-admin.sidebar-button>
                    </aside>
                    <x-admin.pages-form :page="$page" />
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
