<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <x-slot:title>Login</x-slot:title>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email form-control form-control-sm" class="mt-1" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="mt-1 "
                            type="password"
                            name="password"
                          class="form-control form-control-sm"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-3">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="form-check-input rounded-0" name="remember">
                <span class="">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-3">

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="mt-3">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
