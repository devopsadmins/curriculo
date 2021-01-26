<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Everton Lima">
        <meta name="generator" content="Laravel">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Currículo Grupo Ello RH') }}</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="icon" href="/img/flaticon-180x180.png" />
        <!-- Bootstrap core CSS -->
        <link rel='stylesheet' id='oceanwp-google-font-poppins-css'  href='//fonts.googleapis.com/css?family=Poppins%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900%2C100i%2C200i%2C300i%2C400i%2C500i%2C600i%2C700i%2C800i%2C900i&#038;subset=latin&#038;display=swap&#038;ver=5.6' type='text/css' media='all' />
        <link href="/css/product.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            body {
            font-family: "Poppins",Arial,sans-serif;
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="product.css" rel="stylesheet">
    </head>
    <body>
        <nav class="site-header sticky-top py-1">
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2" href="#" aria-label="Product">
                    <img src="/img/logo.png" height="62px">
                </a>

                <a class="py-2 d-none d-md-inline-block" href="//grupoellorh.com.br/">HOME</a>
                <a class="py-2 d-none d-md-inline-block" href="//grupoellorh.com.br/sobre">SOBRE</a>
                <a class="py-2 d-none d-md-inline-block" href="//grupoellorh.com.br/servicos">SERVIÇOS</a>
                <a class="py-2 d-none d-md-inline-block" href="//grupoellorh.com.br/contato">CONTATO</a>
                <a class="py-2 d-none d-md-inline-block" href="/curriculo">SEU CURRÍCULO</a>


            </div>
        </nav>

        <div class="min-h-screen bg-gray-100">


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script><!-- comment -->
        <script src="/theme/plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
        <script>
$("#cpf").inputmask("999.999.999-99");
$("#cpf").on('change', function () {
    $("#register_btn").prop('disabled', true);

    if (!validarCPF($(this).val())) {
        $("#cpf_error").html("CPF Inválido!");
    } else {
        $("#cpf_error").html("");
    }

})
$("#termos_aceite").on('click', function () {
    var termos = $("#termos_aceite").prop("checked");
    if (termos && validarCPF($("#cpf").val())) {
        $("#register_btn").prop('disabled', false);
        $("#register_btn").toggleClass("btn-wine");
        $("#cpf_error").html("");
    } else {
        $("#termos_error").html("Não é possivel se cadastrar sem aceitar os termos.");
        $("#register_btn").toggleClass("btn-wine");
        $("#register_btn").prop('disabled', true);
    }
})




function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '')
        return false;
    // Elimina CPFs invalidos conhecidos	
    if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
        return false;
    // Valida 1o digito	
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito	
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}
        </script>
</html>