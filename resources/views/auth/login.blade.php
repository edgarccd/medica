<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
        @csrf
        <br>
        <!-- Email Address -->
        <div class="form-floating mb-3">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="form-control" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <br>
        <div>
            @if (Route::has('password.request'))
                <a class="form-text" href="{{ route('password.request') }}">
                    {{ __('') }}
                </a>
            @endif
            &nbsp; &nbsp; &nbsp;
            <x-primary-button>
                {{ __('Ingresar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
