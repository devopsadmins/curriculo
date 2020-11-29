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
                                        {{ __('Ver Curriculos') }}
                                    </h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                <form method="get" action="{{route('admin.users')}}" class="form-horizontal">
                                    <div class="widget-content widget-content-area row">
                                        @csrf
                                        <div class="col-3">
                                            <select class="form-control  basic" id="select_area">
                                                <option selected="selected" value="0">Selecione a Área de Interesse</option>
                                                @foreach($dados->areas as $dado)
                                                <option value="{{$dado->idareainteresse}}">{{$dado->areainteressenome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <select class="form-control  basic" id="select_escolaridade">>
                                                <option selected="selected" value="0">Selecione a Escolaridade</option>
                                                @foreach($dados->escolaridade as $dado)
                                                <option value="{{$dado->idescolaridade}}">{{$dado->escolaridadenome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">

                                            <select class="form-control  basic"  id="select_idioma">>
                                                <option selected="selected" value="0">Selecione o Idioma</option>
                                                @foreach($dados->idiomas as $dado)
                                                <option value="{{$dado->ididioma}}">{{$dado->idiomanome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">

                                            <select class="form-control  basic"  id="select_cidade">>
                                                <option selected="selected" value="0">Selecione a Cidade</option>
                                                @foreach($dados->cidades as $dado)
                                                <option value="{{$dado->idcidade}}">{{$dado->cidadenome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" type="button" id="btn_filtrar_curriculo">Filtrar</button>
                                        </div>

                                    </div>
                                </form>
                                <table class="table table-bordered data-table" id="admin-users">
                                    <thead>
                                        <tr>
                                            <th width="50">No</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Cidade</th>
                                            <th>Escolaridade</th>
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
    </div>

    @section('scripts')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/theme/plugins/table/datatable/datatables.js"></script>
    <script type="text/javascript">
$(function () {

    $("#btn_filtrar_curriculo").on('click', function () {
        var area = $("#select_area option:selected").val();
        var escola = $("#select_escolaridade option:selected").val();
        var idioma = $("#select_idioma option:selected").val();
        var cidade = $("#select_cidade option:selected").val();
        dataTable(area, escola, idioma, cidade);
    });
    function dataTable(area, escola, idioma, cidade) {
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
                    _token: _token
                }
            },
            searching: false,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nome', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'telefone', name: 'telefone'},
                {data: 'cidadenome', name: 'cidadenome'},
                {data: 'escolaridadenome', name: 'escolaridadenome'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    dataTable();
});


    </script>
    @endsection
</x-bi-layout>
