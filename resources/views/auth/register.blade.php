<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Type Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Tipo')" />
            <select name="rol" id="rol" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">--Seleccionar Rol--</option>
                <option value="1">Solicitar empleo</option>
                <option value="2">Publicar empleo</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Repetir Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <x-link
                :href=" route('login')"
            >
                ¿Ya tienes una cuenta?

            </x-link>
            <x-link
                :href="route('password.request')"
            >
                ¿Olvidaste tu Password?
            </x-link>

        </div>
        <x-primary-button class="w-full justify-center bg-red-500">
            {{ __('Crear Cuenta') }}
        </x-primary-button>
    </form>
</x-guest-layout>