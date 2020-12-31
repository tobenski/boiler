<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Firstname -->
            <div>
                <x-label for="firstname" :value="__('Fornavn')" />
                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
                @error('firstname') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Lastname -->
            <div>
                <x-label for="lastname" :value="__('Efternavn')" />
                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required />
                @error('lastname') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                @error('email') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Company -->
            <div class="mt-4">
                <x-label for="company" :value="__('Evt. Firma')" />
                <x-input id="company" class="block mt-1 w-full" type="text" name="comapny" :value="old('company')" />
                @error('company') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- CVR -->
            <div class="mt-4">
                <x-label for="cvr" :value="__('Evt. CVR nummer')" />
                <x-input id="cvr" class="block mt-1 w-full" type="text" name="cvr" :value="old('cvr')" />
                @error('cvr') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Telefonnummer')" />
                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" />
                @error('phone') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Adresse')" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                @error('address') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Zip -->
            <div class="mt-4">
                <x-label for="zip" :value="__('Postnummer')" />
                <x-input id="zip" class="block mt-1 w-full" type="tel" name="zip" :value="old('zip')" />
                @error('zip') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- City -->
            <div class="mt-4">
                <x-label for="city" :value="__('By')" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                @error('city') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Country -->
            <div class="mt-4">
                <x-label for="country" :value="__('Land')" />
                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" />
                @error('country') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            @error('password') <span class="text-xs text-red italic">{{ $message }}</span>@enderror
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            @error('password_confirmation') <span class="text-xs text-red italic">{{ $message }}</span>@enderror

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
