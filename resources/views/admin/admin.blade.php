<x-bi-layout>
    @section('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/theme/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="/theme/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/theme/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/theme/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="/theme/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
    <link href="/theme/plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
    @endsection
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Ver Curriculos') }}
                        </h4>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <form method="get" action="{{route('admin.users')}}" class="form-horizontal">
                        <div class="widget-content widget-content-area row">
                            @csrf
                            <div class="col-12 mt-2">
                                <select class="form-control  basic" id="select_area" >
                                    <option selected="selected" value="0">Selecione a Área de Interesse</option>
                                    @foreach($dados->areas as $dado)
                                    <option value="{{$dado->idareainteresse}}">{{$dado->areainteressenome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">
                                <select class="form-control  basic" id="select_escolaridade">>
                                    <option selected="selected" value="0">Selecione a Escolaridade</option>
                                    @foreach($dados->escolaridade as $dado)
                                    <option value="{{$dado->idescolaridade}}">{{$dado->escolaridadenome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">

                                <select class="form-control  basic"  id="select_idioma">>
                                    <option selected="selected" value="0">Selecione o Idioma</option>
                                    @foreach($dados->idiomas as $dado)
                                    <option value="{{$dado->ididioma}}">{{$dado->idiomanome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-2">

                                <select class="form-control  basic"  id="select_cidade">>
                                    <option selected="selected" value="0">Selecione a Cidade</option>
                                    @foreach($dados->cidades as $dado)
                                    <option value="{{$dado->idcidade}}">{{$dado->cidadenome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 mt-2">
                                <label>
                                    PCD:
                                </label>
                                <label class="switch s-icons s-outline s-outline-primary mr-2">
                                    <input type="checkbox" id="pcd" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-2 mt-2">
                            </div>
                            <div class="col-2 mt-2">
                                <label>
                                    Estágio:
                                </label>
                                <label class="switch s-icons s-outline s-outline-primary mr-2">
                                    <input type="checkbox" id="estagio" value="1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <label>CNH</label>
                                    <?php
                                    $letras = ["A", 'B', 'C', 'D', 'E'];
                                    ?>
                                    @foreach($letras as $letra)
                                    <div class="col-lg-2 col-md-2">
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input" name="cnh[]" id="cnh_{{$letra}}" value="{{$letra}}">
                                                <span class="new-control-indicator"></span>{{ $letra }}
                                            </label>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        Pretenção Salarial
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label>Valor Mínimo</label>
                                        <input type="number" min="0" name="min" id="min" value="0">
                                    </div>
                                    <div class="col-6 mt-2">
                                        <label>Valor Máximo</label>
                                        <input type="number" min="0" name="max" id="max" value="15000">
                                    </div>
                                    <!--                                    <div class="col-12 mt-2">
                                                                            <div class="container">
                                                                                <div id="pretecao" name="pretecao"></div>
                                                                                <br/>
                                                                            </div>
                                                                        </div>-->
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button class="btn btn-primary" type="button" id="btn_filtrar_curriculo">Filtrar</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">

                    <div class="widget-content widget-content-area">
                        <div class="col-xl-8 col-lg-8 col-md-12 mb-12">
                            <table class="table table-bordered data-table" id="admin-users">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Cidade</th>
                                        <th>Área</th>
                                        <th width="100px">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/theme/plugins/table/datatable/datatables.js"></script>
    <script src="/theme/plugins/noUiSlider/nouislider.min.js"></script>
    <script type="text/javascript">
$(function () {

    $("#btn_filtrar_curriculo").on('click', function () {
        dataTable();
    });



    function dataTable() {
        var area = $("#select_area option:selected").val();
        var escola = $("#select_escolaridade option:selected").val();
        var idioma = $("#select_idioma option:selected").val();
        var cidade = $("#select_cidade option:selected").val();
        var min = $("#mim").val() == undefined ? 0 : $("#mim").val();
        var max = $("#max").val();
        var pcd = $("#pcd:checked").val() == undefined ? 0 : 1;
        var estagio = $("#estagio:checked").val() == undefined ? 0 : 1;
        var cnh = "";
        $('input[name="cnh[]"]:checked').each(function (e) {
            cnh = cnh + $(this).val() + ",";
        });
        //   var tr = html5Slider.noUiSlider.get();
        $('#admin-users').DataTable().clear().destroy();
        var _token = $('meta[name="csrf-token"]').attr('content');
        var table = $('#admin-users').DataTable({
            processing: true,
            serverSide: true,
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            },
            ajax: {
                url: "{{ route('admin.users') }}",
                type: "POST",
                data: {
                    area: area,
                    escola: escola,
                    idioma: idioma,
                    cidade: cidade,
                    pcd: pcd,
                    estagio: estagio,
                    cnh: cnh,
//                    pretencao_min: tr[0],
//                    pretencao_max: tr[1],
                    pretencao_min: min,
                    pretencao_max: max,
                    _token: _token,

                }
            },
            searching: false,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nome', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'telefone', name: 'telefone'},
                {data: 'cidadenome', name: 'cidadenome'},
                {data: 'areainteressenome', name: 'areainteressenome'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    dataTable();
});

//var html5Slider = document.getElementById('pretecao');
//
//noUiSlider.create(html5Slider, {
//    start: [0, 99999],
//    connect: true,
//    tooltips: true,
//    range: {
//        'min': 0,
//        'max': 99999
//    }
//});

    </script>
    @endsection
</x-bi-layout>
