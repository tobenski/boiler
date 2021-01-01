<article x-show="activeSetting == 'mail'"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform"
        x-transition:enter-end="opacity-100 transform"
        x-cloak
        class="p-8 w-full">
        <x-auth-session-status class="mb-4" :status="session('success')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form wire:submit.prevent='submitMail'>
            @csrf
            <div class="mb-6">
                <x-label for="mail.mailer" :value="__('Mailer')" />

                <x-input id="mail.mailer"
                         wire:model='mail.mailer'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.mailer" />
            </div>
            <div class="mb-6">
                <x-label for="mail.host" :value="__('Host')" />

                <x-input id="mail.host"
                         wire:model='mail.host'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.host" />
            </div>
            <div class="mb-6">
                <x-label for="mail.port" :value="__('Port')" />

                <x-input id="mail.port"
                         wire:model='mail.port'
                         class="block mt-1 w-full"
                         type="tel"
                         name="mail.port" />
            </div>
            <div class="mb-6">
                <x-label for="mail.username" :value="__('Username')" />

                <x-input id="mail.username"
                         wire:model='mail.username'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.username" />
            </div>
            <div class="mb-6">
                <x-label for="mail.password" :value="__('Password')" />

                <x-input id="mail.password"
                         wire:model='mail.password'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.password" />
            </div>
            <div class="mb-6">
                <x-label for="mail.encryption" :value="__('Encryption')" />

                <x-input id="mail.encryption"
                         wire:model='mail.encryption'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.encryption" />
            </div>
            <div class="mb-6">
                <x-label for="mail.from_address" :value="__('From Address')" />

                <x-input id="mail.from_address"
                         wire:model='mail.from_address'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.from_address" />
            </div>
            <div class="mb-6">
                <x-label for="mail.from_name" :value="__('From Name')" />

                <x-input id="mail.from_name"
                         wire:model='mail.from_name'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.from_name" />
            </div>
            <div class="mb-6">
                <x-label for="mail.reply_to_address" :value="__('Reply To Address')" />

                <x-input id="mail.reply_to_address"
                         wire:model='mail.reply_to_address'
                         class="block mt-1 w-full"
                         type="text"
                         name="mail.reply_to_address" />
            </div>
            <div class="flex items-center justify-end">

                <x-button class="ml-3">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>

</article>
