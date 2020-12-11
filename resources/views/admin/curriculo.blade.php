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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> {{ $data->areainteressenome }} 
                                            @if ($data->experiencia!="")
                                            | {{ $data->experiencia }}
                                            @endif
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>{{ $data->criado_em->format("d/m/Y") }}
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{$data->cidadenome}}
                                        </li>
                                        <li class="contacts-block__item">
                                            <a href="mailto:{{$user->email}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$user->email}}</a>
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{ $data->telefone }}
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
