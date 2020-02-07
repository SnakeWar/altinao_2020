<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Campeonato Altinão 2017-2018, realizado no Campo Altinão, Canguaretama-RN">
    <meta name="author" content="SnakeWar">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Campeonato Altinão 2017-2018</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Custom fonts for this template -->

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="icon" href="http://localhost/images/favicon.png" />

    <!-- Plugin CSS -->


    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

</head>

<body id="page-top">
        <main>
            @yield('content')
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{asset('js/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{asset('js/new-age.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
