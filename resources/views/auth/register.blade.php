<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <div class="container">
            <x-jet-validation-errors class="mb-12" />
            <h2>Cadastre-se</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4"> 
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                    
                </div>
                <div class="mt-4">  
                    <x-jet-label for="cpf" value="{{ __('CPF') }}" />
                    <x-jet-input id="cpf" class="block mt-1 w-full form-control" type="text" name="cpf" :value="old('cpf')" required />
                    <label id="cpf_error" class="alert-danger"></label>
                </div>       

                <div class="mt-4">     
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                </div> 

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <input type="checkbox" id="termos_aceite" >
                   Li e aceito os <a href="//grupoellorh.com.br/termo-de-uso-20210126/" target="_blank" >termos de uso</a>
                    <label id="termos_error" class="alert-danger"></label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        Ja Registrado?
                    </a>

                    <div class="flex items-center justify-end mt-4">
                        <button class="ml-4 " id="register_btn" disabled >
                            {{ __('Register') }}
                        </button>
                    </div>
            </form>
        </div>
    </x-jet-authentication-card>

</x-guest-layout>
