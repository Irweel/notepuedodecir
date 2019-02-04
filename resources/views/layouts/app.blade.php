<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        #formulario{
            margin-right: 30px;
            margin-left: 30px;
            border:1px black solid;
            padding: 10px;
            border-radius: 10px;
            background: grey;
        }
        #formulario #texto{
            margin-left: 10px;
            border-radius: 5px;
            height: 40px;
            width: 170px;
            border:1px solid #181818;
            padding-left: 15px;
        }
       
        #formulario #buscar{
            height: 40px;
            border-radius: 5px;
            margin-right: 10px;
            background: lightgrey;
            padding-left: 30px;
            padding-right: 30px;
            border-color: #181818;
            color: black;
        }
        #formulario #buscar:hover{
            opacity: 0.8;
            color: #fff;
            border-color: #fff;
        }


        #info{
            border:1px black solid;
            border-radius: 10px;
            background: grey;
            padding-top: 17px;
            height: 60px;
        }
        #info a{
            padding: 15px;
            text-decoration: none;
            font:13px verdana;
            color: #fff;
        }
        #info a:hover{
            text-decoration: underline;
        }
        #img{
            border: 1px solid black;
            padding: 7px;
            border-radius: 10px;
            background: grey;
        }
        #nav{
            background:rgb(53,58,63);
            border: 1px solid black;
            padding-top: 15px;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        #log,#reg{
            color: #fff;
        }
        #log:hover,#reg:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" id="nav">
            <div class="container">
                <a id="img" href="{{ url('/home') }}">
                    <img src="/images/logo_trueque.png" width="100">
                </a>


                <form method="POST" id="formulario" action="/home/">
                    {{ csrf_field() }}
                    <input type="text" name="texto" id="texto" placeholder="Buscar...">
                    
                    <input type="submit" name="buscar" value="Buscar" id="buscar">
                </form>




                <div id="info">
                    @if(Auth::id() == '')
                        <a href="{{ route('login') }}">Perfil</a>
                        <a href="{{ route('login') }}">Inventario</a>
                        <a href="{{ route('login') }}">Intercambio</a>
                    
                    @else
                        <a href="/perfil/{{Auth::id()}}">Perfil</a>
                        <a href="/inventario/{{Auth::id()}}">Inventario</a>
                        <a href="/intercambio/{{Auth::id()}}">Intercambio</a>
                    @endif
                </div>







                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" id="log">{{ __('Log-In') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" id="reg">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log-out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
