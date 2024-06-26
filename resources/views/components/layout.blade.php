<!doctype html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SkillConnect</title>

    <!--CSS-->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="css/body.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/registro.css" rel="stylesheet">
    <link href="css/head.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/perfill.css" rel="stylesheet">
    <link href="css/anuncios.css" rel="stylesheet">
    <link href="css/publicar.css" rel="stylesheet">
    <link href="css/editar.css" rel="stylesheet">
    <link href="css/ver.css" rel="stylesheet">
    <link href="css/valoracione.css" rel="stylesheet">
    <link href="css/valorar.css" rel="stylesheet">
    <link href="css/success.css" rel="stylesheet">
    <!-- iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/f0d12fad38.js" crossorigin="anonymous"></script>

</head>
<x-header />

<body>
    @if (session()->has('success'))
        <div class="success" id="success">
            <p><i class="fa-solid fa-check"></i></p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <section class="fondo">
        {{ $slot }}
    </section>

    <!--Scripts-->
    <script src="{{ asset('js/success-message.js') }}"></script>
    <script src="{{ asset('js/habilidades.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
</body>
