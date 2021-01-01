<article x-show="activeSetting == 'general'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform"
        x-transition:enter-end="opacity-100 transform"
        x-cloak
        class="p-8 w-full">
        <x-auth-session-status class="mb-4" :status="session('success')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form wire:submit.prevent='submitGeneral'>
            @csrf
            <div class="mb-6">
                <x-label for="general.site_name" :value="__('Site Name')" />

                <x-input id="general.site_name"
                         wire:model='general.site_name'
                         class="block mt-1 w-full"
                         type="text"
                         name="general.site_name" />
            </div>
            <div class="mb-6">
                <x-label for="general.aws_access_key_id" :value="__('AWS Access Key ID')" />

                <x-input id="general.aws_access_key_id"
                         wire:model='general.aws_access_key_id'
                         class="block mt-1 w-full"
                         type="text"
                         name="general.aws_access_key_id" />
            </div>
            <div class="mb-6">
                <x-label for="general.aws_secret_access_key" :value="__('AWS Secret Access Key')" />

                <x-input id="general.aws_secret_access_key"
                         wire:model='general.aws_secret_access_key'
                         class="block mt-1 w-full"
                         type="text"
                         name="general.aws_secret_access_key" />
            </div>
            <div class="mb-6">
                <x-label for="general.aws_default_region" :value="__('AWS Default Region')" />

                <x-input id="general.aws_default_region"
                         wire:model='general.aws_default_region'
                         class="block mt-1 w-full"
                         type="text"
                         name="general.aws_default_region" />
            </div>
            <div class="mb-6">
                <x-label for="general.aws_bucket" :value="__('AWS Bucket Name')" />

                <x-input id="general.aws_bucket"
                         wire:model='general.aws_bucket'
                         class="block mt-1 w-full"
                         type="text"
                         name="general.aws_bucket" />
            </div>
            <div class="flex items-center justify-end">

                <x-button class="ml-3">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>

</article>
