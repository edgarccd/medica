<x-guest-layout>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-floating mb-3">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus
                    autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <!-- Email Address -->
            <div class="form-floating mb-3">
                <x-input-label for="email" :value="__('Correo')" />
                <x-text-input id="email" type="email" class="form-control" name="email" :value="old('email')" required
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="form-floating mb-3">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div class="form-floating mb-3">
                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                <x-text-input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>
            <br>
                <x-primary-button>
                    {{ __('Registrar') }}
                </x-primary-button>        
        </form>
</x-guest-layout>
