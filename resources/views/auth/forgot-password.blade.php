<x-guest-layout>
    <x-jet-authentication-card>

        <div class="container">
            <x-slot name="logo">

            </x-slot>
            <h2>Esqueceu a senha?</h2>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Esqueceu a senha? Sem problemas! Digite seu email que enviaremos um link para que possa configurar uma nova senha!') }}
            </div>

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="btn-wine">
                        {{ __('Envie link de reset de senha') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
