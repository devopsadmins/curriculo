<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Currículo Grupo Ello RH') }}</title>
        <link href="/theme/assets/css/loader.css" rel="stylesheet" type="text/css" />
        <script src="/theme/assets/js/loader.js"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="/theme/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
        <link href="/theme/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="/theme/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />

        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="/theme/plugins/table/datatable/datatables.css">
        <link rel="stylesheet" type="text/css" href="/theme/plugins/table/datatable/dt-global_style.css">
        <link href="/theme/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="/theme/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="/theme/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

        <link rel="icon" href="/img/flaticon-180x180.png" />
        @yield("css")

        <link rel="stylesheet" type="text/css" href="/curriculo.css">
    </head>
    <body>
        <!-- BEGIN LOADER -->
        <div id="load_screen"> <div class="loader"> <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div></div></div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        <div class="header-container fixed-top">
            <header class="header navbar navbar-expand-sm">

                <ul class="navbar-item theme-brand flex-row  text-center">

                    <a href="/admin">
                        <img src="/img/logo.png" height="50px" style="height: 50px; margin-right: 20px">
                    </a>


                </ul>

                <!--                <ul class="navbar-item flex-row ml-md-0 ml-auto">
                                    <li class="nav-item align-self-center search-animated">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        <form class="form-inline search-full form-inline search" role="search">
                                            <div class="search-bar">
                                                <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                                            </div>
                                        </form>
                                    </li>
                                </ul>-->

                <ul class="navbar-item flex-row ml-md-auto">

                    <li class="nav-item dropdown user-profile-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </a>
                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="">
                                <div  class="dropdown-item"><a href="#">{{ Auth::user()->name }}</a></div>
                                <div class="dropdown-item">
                                    <a  href="{{ route('profile.show') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{ __('Perfil') }}</a>
                                </div>
                                <div class="dropdown-item">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
    this.closest('form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>{{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN NAVBAR  -->
        <div class="sub-header-container">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

                <ul class="navbar-nav flex-row">
                    <li>
                        <div class="page-header">



                        </div>
                    </li>
                </ul>

            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">

            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">

                <nav id="sidebar">
                    <div class="shadow-bottom"></div>
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span>Painel Principal</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                                <li class="active">
                                    <a href="{{ route('curriculos') }}" :active="request()->routeIs('curriculos')">
                                        {{ __('Ver currículos') }}
                                    </a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                    <!-- <div class="shadow-bottom"></div> -->

                </nav>

            </div>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            {{$slot}}
            <!--  END CONTENT AREA  -->

        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="/theme/assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="/theme/bootstrap/js/popper.min.js"></script>
        <script src="/theme/bootstrap/js/bootstrap.min.js"></script>
        <script src="/theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="/theme/assets/js/app.js"></script>
        <script>
$(document).ready(function () {
    App.init();
});
function insercao() {
    alert("entrando");
    var html = `
                       <div class="col-lg-12 col-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>INSERÇÃO</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area vertical-line-pill">
                                    
                                        <div class="row mb-4 mt-3">
                                            <div class="col-sm-3 col-12">
                                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto" id="v-line-pills-tab" role="tablist" aria-orientation="vertical">
                                                  <a class="nav-link active mb-3" id="v-line-pills-home-tab" data-toggle="pill" href="#v-line-pills-home" role="tab" aria-controls="v-line-pills-home" aria-selected="true">Home</a>
                                                  <a class="nav-link mb-3  text-center" id="v-line-pills-profile-tab" data-toggle="pill" href="#v-line-pills-profile" role="tab" aria-controls="v-line-pills-profile" aria-selected="false">Profile</a>
                                                  <a class="nav-link mb-3  text-center" id="v-line-pills-messages-tab" data-toggle="pill" href="#v-line-pills-messages" role="tab" aria-controls="v-line-pills-messages" aria-selected="false">Messages</a>
                                                  <a class="nav-link  text-center" id="v-line-pills-settings-tab" data-toggle="pill" href="#v-line-pills-settings" role="tab" aria-controls="v-line-pills-settings" aria-selected="false">Settings</a>
                                                </div>
                                            </div>

                                            <div class="col-sm-9 col-12">
                                                <div class="tab-content" id="v-line-pills-tabContent">
                                                  <div class="tab-pane fade show active" id="v-line-pills-home" role="tabpanel" aria-labelledby="v-line-pills-home-tab">
                                                    <h4 class="mb-4">We move your world!</h4>
                                                    <p class="mb-4">
                                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                                                    </p>

                                                    <p>
                                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                    </p>                                            
                                                  </div>
                                                  <div class="tab-pane fade" id="v-line-pills-profile" role="tabpanel" aria-labelledby="v-line-pills-profile-tab">

                                                    <div class="media">
                                                        <img class="mr-3 rounded-circle" src="/theme/assets/img/90x90.jpg" alt="Generic placeholder image">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">Media heading</h5>
                                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                                        </div>
                                                    </div>

                                                  </div>
                                                  <div class="tab-pane fade" id="v-line-pills-messages" role="tabpanel" aria-labelledby="v-line-pills-messages-tab">
                                                    <p class="dropcap  dc-outline-primary">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                  </div>
                                                  <div class="tab-pane fade" id="v-line-pills-settings" role="tabpanel" aria-labelledby="v-line-pills-settings-tab">
                                                    <blockquote class="blockquote">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                    </blockquote>
                                                  </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                `;

    $('#idmaster').html(html);
}
        </script>
        <script src="/theme/assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="/theme/plugins/apex/apexcharts.min.js"></script>


        <script src="/theme/plugins/highlight/highlight.pack.js"></script>
        <script src="/theme/assets/js/custom.js"></script>
        <script src="/theme/plugins/sweetalerts/sweetalert2.min.js"></script>
        <script src="/theme/plugins/sweetalerts/custom-sweetalert.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        @yield("scripts")
    </body>
</html>