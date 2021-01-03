<div class="py-4">
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-secondary flex min-h-full overflow-hidden"
                 x-data="{activeSetting: @entangle('activeSetting')}">
                <aside class="max-w-xs w-72 bg-headerBg text-headerText min-h-full p-6 flex flex-col items-start justify-start">
                    <button x-on:click="activeSetting='general'">General Settings</button>
                    <button x-on:click="activeSetting='mail'">Mail Settings</button>
                </aside>
                @include('livewire.admin.settings.general')
                @include('livewire.admin.settings.mail')
            </div>
        </div>
    </div>
</div>
