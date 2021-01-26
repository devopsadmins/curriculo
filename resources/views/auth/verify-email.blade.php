<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <div class="container">
            <x-jet-validation-errors class="mb-12" />

            <div class="mb-4 text-sm text-gray-600">
                <p>Seu primeiro passo para colocação profissional foi dado!</p>

                <p>Antes de continuar, é necessário verificar seu endereço de e-mail. Entre no e-mail registrado e clique no link que enviamos. Não esqueça de verificar sua caixa de spam (pode ter ido pra lá)!</p>

                <p>Não chegou? Clique em:</p>
            </div>

            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Um novo link de verificação foi enviado ao seu endereço de email.') }}
            </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button type="submit"  class="ml-4 btn-wine">
                            {{ __('Reenviar e-mail de verificação') }}
                        </x-jet-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="flex items-center justify-end mt-4 ">
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 btn-wine">
                            {{ __('Logout') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
