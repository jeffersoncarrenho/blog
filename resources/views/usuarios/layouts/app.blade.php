<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <ul class="list-group">
                <li class="list-group-item"><h4 class="text-center">Menu</h4></li>
                @if(Auth::user()->level>=0)
                <!--<li class="list-group-item text-center">Usuário: Leitor</li>-->
                <li class="list-group-item"> <a href="{!! url('/painel/configuracoes') !!}">-> Configurações</a> </li>
                @endif
                @if(Auth::user()->level>=1)
                <!--<li class="list-group-item text-center">Usuário: Revisor</li>-->
                <li class="list-group-item text-center"><h4>Posts</h4></li>
                <li class="list-group-item"> <a href="{!! url('/painel/tags') !!}">-> Tags</a> </li>
                <li class="list-group-item"> <a href="{!! url('/painel/categorias') !!}">-> Categorias</a> </li>

                @endif
                @if(Auth::user()->level>=2)
                 <li class="list-group-item text-center"><h4>Usuários</h4></li>
                 <li class="list-group-item"> <a href="{!! url('/painel/criar-usuario') !!}">-> Criar Usuário</a> </li>
                 <li class="list-group-item"><a href="{!! url('/painel/listar-usuarios') !!}">-> Listar Usuários</a> </li>
                 <li class="list-group-item text-center"><h4>Uplaod</h4></li>
                 <li class="list-group-item"> <a href="{!! url('/painel/upload-arquivos') !!}">-> Arquivos</a> </li>
                 @endif
              </ul>
            </div>

            <div class="col-md-9">
              @yield('content')
            </div>
          </div>

        </div>

    </div>
</body>
</html>
