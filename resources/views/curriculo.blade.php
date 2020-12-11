<x-bi-layout>
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                                        {{ __('Editar Currículo') }}
                                    </h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                <div class="widget-content widget-content-area">
                                    <form action="{{route("curriculo.update")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label for="telefone" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Telefone</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input id="telefone" type="text" name="telefone" class="form-control" value="{{$dados->telefone}}"  autocomplete="telefone" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="whatsapp" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">WhatsApp</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input id="whatsapp" type="text" name="whatsapp" class="form-control" value="{{$dados->whatsapp}}"  autocomplete="whatsapp" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="pcd" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">PCD</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <label class="new-control new-radio radio-info">
                                                    <input type="radio" class="new-control-input" name="pcd" id="pcd">
                                                    <span class="new-control-indicator"></span>Sim
                                                </label>
                                                <label class="new-control new-radio radio-info">
                                                    <input type="radio" class="new-control-input" name="pcd" id="pcd">
                                                    <span class="new-control-indicator"></span>Não
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="estagio" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Estágio</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <label class="new-control new-radio radio-info">
                                                    <input type="radio" class="new-control-input" name="estagio" id="estagio">
                                                    <span class="new-control-indicator"></span>Sim
                                                </label>
                                                <label class="new-control new-radio radio-info">
                                                    <input type="radio" class="new-control-input" name="estagio" id="estagio">
                                                    <span class="new-control-indicator"></span>Não
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="cnh" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">CNH</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <div class="n-chk">
                                                    <?php
                                                    $letras = ["A", 'B', 'C', 'D', 'E'];
                                                    ?>
                                                    @foreach($letras as $letra)

                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" class="new-control-input" name="cnh[]">
                                                        <span class="new-control-indicator"></span>{{ $letra }}                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label for="telefone" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Cidade') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <select name="cidade" id="cidade" class="form-control">
                                                    <option value="0">Selecione</option>
                                                    @foreach($cidade as $row)
                                                    <option value="{{ $row->idcidade }}" 
                                                            @if ($dados->cidade_id == $row->idcidade)
                                                        selected="selected"
                                                        @endif
                                                        >{{ $row->cidadenome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4" id="id_cidade_nome" style="display: none">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Cidade Nome') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input name="cidade_nome" id="cidade_nome" type="text" class="form-control" value="{{$dados->cidade_nome}}" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="nascimento">{{ __('Data Nascimento') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input id="nascimento" type="text" class="form-control" placeholder="" name="nascimento">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="area_interesse">{{ __('Área de Interesse') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <select name="area_interesse" id="area_interesse" class="form-control">
                                                    <option value="0">Selecione a área de interesse</option>
                                                    @foreach($interesse as $row)
                                                    <option value="{{ $row->idareainteresse }}" @if ($dados->areainteresse_id == $row->idareainteresse)
                                                        selected="selected"
                                                        @endif>{{ $row->areainteressenome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4"  id="area_interesse_outra" style="display: none">
                                            <label for="area_interesse_nome" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Outra Área Interesse') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input id="area_interesse_nome" type="text" name="area_interesse_nome" class="form-control" value="{{$dados->areainteressenome}}" />
                                            </div>
                                        </div>



                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="area_interesse_experiencia">{{ __('Experiência na Área de Interesse ') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <select name="area_interesse_experiencia" id="area_interesse_experiencia" class="form-control">
                                                    <option value="0">Selecione a experiência</option>
                                                    <option @if ($dados->experiencia == 'Até 1 ano')
                                                        selected="selected"
                                                        @endif>Até 1 ano</option>
                                                    <option @if ($dados->experiencia == 'De 1 a 2 anos')
                                                        selected="selected"
                                                        @endif>De 1 a 2 anos</option>
                                                    <option @if ($dados->experiencia == 'De 2 a 5 anos')
                                                        selected="selected"
                                                        @endif>De 2 a 5 anos</option>
                                                    <option @if ($dados->experiencia == 'Mais de 5 anos')
                                                        selected="selected"
                                                        @endif>Mais de 5 anos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4"  id="area_interesse_outra">
                                            <label for="pretensao" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Pretenção Salarial') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input id="pretensao" type="text" name="pretensao" class="form-control" value="{{$dados->pretensao}}" /> Ultimo Salário + Benefícios
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="for="escolaridade" >{{ __('Escolaridade') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <select name="escolaridade" id="escolaridade" class="form-control">
                                                    <option value="0">Selecione a escolaridade</option>
                                                    @foreach($escolaridade as $row)
                                                    <option value="{{ $row->idescolaridade }}" @if ($dados->escolaridade_id == $row->idescolaridade)
                                                        selected="selected"
                                                        @endif>{{ $row->escolaridadenome }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="widget-content widget-content-area">
                                            <div class="row">
                                                <label class="col-form-label col-xl-2 col-sm-3 col-sm-2 pt-0">Selecione o idioma</label>
                                                @foreach($idioma as $row) 
                                                <div class="col-xl-2 col-lg-2 col-sm-2">
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-outline-default">
                                                            <input type="checkbox" class="new-control-input" name="idioma[]" value="{{ $row->ididioma }}" id="idioma_{{ $row->ididioma }}"
                                                                   @foreach($cur_idiomas as $cur) 

                                                                   @if ($cur->idioma_id == $row->ididioma)
                                                            checked
                                                            @endif
                                                            @endforeach

                                                            >
                                                            <span class="new-control-indicator"></span>{{ $row->idiomanome }}
                                                        </label>
                                                        @foreach($idiomanivel as $row2)

                                                        <div class="col-xl-2 col-lg-2 col-sm-2">
                                                            <div class="n-chk">
                                                                <label class="new-control new-radio radio-primary">

                                                                    <input type="radio" class="new-control-input idioma_nivel" name="idiomanivel_{{ $row->ididioma }}" value="{{ $row2->idnivelidioma }}"

                                                                           @foreach($cur_idiomas as $cur) 

                                                                           @if ($cur->idioma_id == $row->ididioma)
                                                                    @if ($cur->nivel_id == $row2->idnivelidioma)
                                                                    checked
                                                                    @endif
                                                                    @endif
                                                                    @endforeach

                                                                    >
                                                                    <span class="new-control-indicator"></span>{{ $row2->nivelidioma }}
                                                                </label>
                                                            </div>
                                                        </div>

                                                        @endforeach
                                                    </div>

                                                </div>

                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4" id="idioma_outra">
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <label for="idioma_outra"  class="col-xl-2 col-sm-3 col-sm-2 col-form-label">{{ __('Outro Idioma') }}</label>
                                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                                    <input name="idioma_outra" id="idioma_outra" type="text" class="form-control" value="{{$dados->idioma_nome}}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="curriculo" >{{ __('Currículo') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <input type="file" class="form-control-file" name="curriculo" id="curriculo"/>
                                            </div>
                                        </div>
                                        @if ($dados->curriculo!="")
                                        <div class="form-group row mb-4">
                                            <label class="col-xl-2 col-sm-3 col-sm-2 col-form-label" for="curriculo" >{{ __('Currículo Atual') }}</label>
                                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                                <a href="/storage/{{$dados->curriculo}}" target="_blank">Veja aqui</a>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary mt-3">Gravar</button>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @section('scripts')
    <script src="/theme/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
    <script src="/theme/plugins/input-mask/input-mask.js"></script>
    <script>

$("#cidade").on('change', function () {
    if ($("#cidade option:selected").text() == "Outro") {
        $("#id_cidade_nome").show('slow');
    } else {
        $("#id_cidade_nome").hide('slow');
    }
})
$("#area_interesse").on('change', function () {
    if ($("#area_interesse option:selected").text() == "Outra") {
        $("#area_interesse_outra").show('slow');
    } else {
        $("#area_interesse_outra").hide('slow');
    }
})

$(".idioma_nivel").on('change', function () {
    var name = $(this).attr('name').replace("idiomanivel_", "");
    $("#idioma_" + name).attr("checked", true);
})
function flashMessage(message, type) {
    swal({
        title: 'Currículo',
        text: message,
        type: type,
        padding: '2em'
    })
}
$("#nascimento").inputmask("99/99/9999");
    </script>
    @if ($message = Session::get('success'))
    <script>
        flashMessage('{{$message}}', 'success')
    </script>
    @endif
    @if ($message = Session::get('error'))
    <script>
        flashMessage('{{$message}}', 'error')
    </script>                                    
    @endif

    @endsection
</x-bi-layout>
