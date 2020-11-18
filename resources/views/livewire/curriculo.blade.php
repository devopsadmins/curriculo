<x-jet-form-section submit="/curriculo">
    <x-slot name="title">
        {{ __('Currículo') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Mantenha seus dados atualizados para melhor exposição do seu currículo)') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-12 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Telefone') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" value="{{$this->dados->telefone}}"  autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cidade" value="{{ __('Cidade') }}" />
            <select name="" id="" class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="0">Selecione</option>
                @foreach($this->cidade as $row)
                <option value="{{ $row->idcidade }}">{{ $row->cidadenome }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="cidade" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4" id="cidade_outra">
            <x-jet-label for="cidade_nome" value="{{ __('Cidade Nome') }}" />
            <x-jet-input name="cidade_nome" id="cidade_nome" type="text" class="mt-1 block w-full" value="{{$this->dados->cidade_nome}}" />
            <x-jet-input-error for="cidade_nome" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="idade" value="{{ __('Idade') }}" />
            <select name="idade" id="idade" class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="0">Selecione a faixa de idade</option>
                <option>18-25</option>
                <option>26-30</option>
                <option>31-35</option>
                <option>36-40</option>
                <option>41-50</option>
                <option>51-60</option>
                <option>60+</option>
            </select>
            <x-jet-input-error for="idade" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="area_interesse" value="{{ __('Área de Interesse') }}" />
            <select name="area_interesse" id="area_interesse" class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="0">Selecione</option>
                @foreach($this->interesse as $row)
                <option value="{{ $row->idareainteresse }}">{{ $row->areainteressenome }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="area_interesse" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="area_interesse_experiencia" value="{{ __('Experiência na área de interesse') }}" />
            <select name="area_interesse_experiencia" id="area_interesse_experiencia" class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="0">Selecione a faixa de idade</option>
                <option>Até 1 ano</option>
                <option>De 1 a 2 anos</option>
                <option>De 2 a 5 anos</option>
                <option>Mais de 5 anos</option>
            </select>
            <x-jet-input-error for="area_interesse_experiencia" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="escolaridade" value="{{ __('Escolaridade') }}" />
            <select name="escolaridade" id="escolaridade" class="form-select rounded-md shadow-sm mt-1 block w-full">
                <option value="0">Selecione a escolaridade</option>
                @foreach($this->escolaridade as $row)
                <option value="{{ $row->idescolaridade }}">{{ $row->escolaridadenome }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="escolaridade" class="mt-2" />
        </div>
        <div class="col-span-4 sm:col-span-4">
            <x-jet-label for="idioma" value="{{ __('Idiomas') }}" />
            @foreach($this->idioma as $row) 
            <input type="checkbox" name="idioma" value="{{ $row->ididiomanome }}">{{ $row->idiomanome }}<br>
            @foreach($this->idiomanivel as $row)
            <blockquote>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="idiomanivel" value="{{ $row->idnivelidioma }}">{{ $row->nivelidioma }}<br></blockquote> 
            @endforeach
            @endforeach
            <x-jet-input-error for="idioma" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4" id="idioma_outra">
            <x-jet-label for="idioma_outra" value="{{ __('Outro Idioma') }}" />
            <x-jet-input name="idioma_outra" id="idioma_outra" type="text" class="mt-1 block w-full" value="{{$this->dados->idioma_nome}}" />
            <x-jet-input-error for="idioma_outra" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4" id="curriculo">
            <x-jet-label for="curriculo" value="{{ __('Currículo') }}" />
            <input type="file" wire:model="curriculo" x-ref="curriculo"/>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvo.') }}
        </x-jet-action-message>
        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
