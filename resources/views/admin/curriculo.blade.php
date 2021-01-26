@section("css")
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="/theme/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
<!--  END CUSTOM STYLE FILE  -->
@endsection
<x-bi-layout>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-spacing">
                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">Curriculo</h3>
                                <!--                                <a href="/admin" class="mt-2 warning confirm" style="height: 35px;"> Tornar Admin </a>-->
                                @if ($user->current_team_id!=1)
                                <button class="mr-2 btn btn-primary warning confirm">Tornar Admin</button>
                                @else
                                <button class="mr-2 btn btn-warning warning confirm">Tirar Admin</button>
                                @endif
                            </div>
                            <div class="text-center user-info">
                                <img class="h-8 w-8 rounded-full object-cover " src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" height="90px"/>

                                <p class="">{{ $user->name }}</p>
                            </div>
                            <div class="user-info-list">
                                <div class="">
                                    <ul class="contacts-block list-unstyled">
                                        <li class="contacts-block__item">
                                            <i class="far fa-mug-hot fa-2x"></i> {{ $data->areainteressenome }} | {{ $data->areainteresse_nome }} 
                                            @if ($data->experiencia!="")
                                            | {{ $data->experiencia }}
                                            @endif
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="far fa-calendar-alt fa-2x"></i>   {{ $data->criado_em->format("d/m/Y") }}
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="far fa-city fa-2x"></i> {{$data->cidadenome}} | {{$data->cidade_nome}}
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="far fa-at fa-2x"></i><a href="mailto:{{$user->email}}"> {{$user->email}}</a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="far fa-phone fa-2x"></i>  <a href="tel:{{ str_replace("-","",str_replace(".","",str_replace(")","",str_replace("(",'',str_replace(" ",'',$data->telefone))))) }}" target="_blank">{{ $data->telefone }}</a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="fab fa-whatsapp fa-2x"></i> <a href="https://api.whatsapp.com/send/?phone=+55{{ str_replace("-","",str_replace(".","",str_replace(")","",str_replace("(",'',str_replace(" ",'',$data->whatsapp))))) }}" target="_blank">{{ $data->whatsapp }}</a>
                                        </li>

                                    </ul>
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                    <div class="skills layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Outros</h3>
                            <div class="">
                                @php
                                $datan = str_replace("/", "-", $data->nascimento);
                                $dataNascimento = date('Y-m-d', strtotime($datan));
                                $date = new DateTime($dataNascimento );
                                $interval = $date->diff( new DateTime( date('Y-m-d') ) );
                                @endphp
                                <i class="fas fa-pager fa-2x"></i> Idade: {{$interval->format( '%Y anos' )}} ({{ $data->nascimento }})
                            </div>
                            <div class="">
                               <i class="fas fa-universal-access fa-2x"></i> PCD: @if ($data->PCD)
                                Sim
                                @endif
                            </div>
                            <div class="">
                                <i class="fas fa-bug fa-2x"></i> Estágio:@if ($data->estagio)
                                Sim
                                @endif
                            </div>
                            <div class="">
                                @php 
                                $cnhs = explode(",",$data->cnh)

                                @endphp
                                <i class="fas fa-car fa-2x"></i> CNH: @foreach($cnhs as $cnh)
                                {{ $cnh }}
                                @endforeach
                            </div>
                            <div class="">
                                <i class="far fa-money-bill-alt fa-2x"></i> Pretensão: {{ $data->pretensao }}
                            </div>
                        </div>
                    </div>

                    <div class="skills layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Idiomas</h3>

                            @foreach($idiomas as $idioma)
                            <div class="progress br-30">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ 20 * $idioma->nivel_id }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="progress-title"><span>{{$idioma->idiomanome}}</span> <span>{{$idioma->nivelidioma}}</span> </div></div>
                            </div>
                            @endforeach 
                            @if (isset($data->idioma_nome))
                            <div class="">
                                Outros idiomas : {{$data->idioma_nome}}
                            </div>
                            @endif

                        </div>
                    </div>

                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">Currículo</h3>
                            <p>{{$data->obs}} </p>

                            <div class="bio-skill-box">

                                <div class="row">

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                        @if ($data->curriculo!="")
                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Download currículo</h5>
                                                <a href="/storage/{{$data->curriculo}}" target="_blank">Clique para Download</a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="d-flex b-skills">
                                            <div>
                                                Sem Upload de currículo
                                            </div>
                                        </div>
                                        @endif
                                    </div>



                                </div>

                            </div>

                        </div>                                
                    </div>

                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        $('.warning.confirm').on('click', function () {
            swal({
                title: 'Tem certeza?',
                text: "Você elevará a permissão deste usuário a 'Administrador'",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Admin',
                cancelButtonText: 'Cancelar',
                padding: '2em',
            }).then(function (result) {
                if (result.value) {
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route("admin.upperAdmin",$data->users)}}',
                        type: "POST",
                        data: {
                            _token: _token,
                        },
                        success: function () {
                            swal({
                                title: 'Admin!',
                                text: 'Perfil subiu para nível admin!',
                                type: 'success',
                                timer: 2000,
                                onClose: function () {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            })
        })
        $('.btn-warning.warning.confirm').on('click', function () {
            swal({
                title: 'Tem certeza?',
                text: "Você rebaixará a permissão deste usuário a 'Usuário'",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Usuário',
                cancelButtonText: 'Cancelar',
                padding: '2em',
            }).then(function (result) {
                if (result.value) {
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route("admin.upperAdmin",$data->users)}}',
                        type: "POST",
                        data: {
                            _token: _token,
                        },
                        success: function () {
                            swal({
                                title: 'Usuário!',
                                text: 'Perfil desceu para nível Usuário!',
                                type: 'success',
                                timer: 2000,
                                onClose: function () {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            })
        })
    </script>
    @endsection
</x-bi-layout>
