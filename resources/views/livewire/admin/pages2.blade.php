<div class="py-4">
    <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-shite border-b border-secondary flex min-h-full overflow-hidden"
                 x-data="{ active: '1' }">
                <aside class="max-w-xs w-72 bg-headerBg text-headerText min-h-full p-6 flex flex-col items-start justify-start">
                    @foreach($pages as $index => $page)
                        <x-admin.sidebar-button x-on:click="active='{{ $page->id }}'">
                            {{ $page->name }}
                        </x-admin.sidebar-button>
                    @endforeach
                </aside>
                @foreach($pages as $index => $page)
                    <x-admin.pages-form :page="$page" :index="$index" />
                @endforeach
            </div>
        </div>
    </div>
</div>
