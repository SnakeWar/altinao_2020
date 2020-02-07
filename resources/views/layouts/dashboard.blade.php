<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Campeonato Altinão</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="http://localhost/images/favicon.png" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="http://127.0.0.1:8000/admin/css/style.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg" id="sidebar-nav">
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <a href="#" id="sidebarCollapse">Menu</a>
                </li>
            </ul>

            <ul class="nav justify-content-end">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: #1b1e21">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="sidebar-custom">
    <ul class="nav flex-column">
        <li class="nav-link"><a class="btn botaohover" href="{{ URL::to('home') }}">Dashboard</a>
        <li class="nav-link"><a class="btn botaohover" href="{{ URL::to('games') }}">View All Games</a></li>
        <li class="nav-link"><a class="btn botaohover" href="{{ URL::to('players') }}">View All Players</a></li>
        <li class="nav-link"><a class="btn botaohover" href="{{ URL::to('teams') }}">View All Teams</a></li>
        <li class="nav-link"><a class="btn botaohover" href="{{ URL::to('table') }}">View Table</a>

    </ul>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('js/new-age.min.js')}}"></script>



</body>
</html>
