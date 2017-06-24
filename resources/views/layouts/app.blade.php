<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Auto-Części') }}</title>

    <!-- Styles  WYŁĄCZONE KŁÓCI SIE Z bootstrap
    <link href="/css/app.css" rel="stylesheet">
    -->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
    <!-- Geolocation map-->
    <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0jTWQuzNuUMCk9PliypqAX8kkx0QYQmU">
    </script>
    
    <!-- Set our location -->
    @if (isset($location))
    <script src="/js/geolocation.js"></script>
    
    <script type="text/javascript">
        getLocation();
    </script>
    @endif
   
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.1.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script> 
    
    <style>
        .navbar{
            background-color: #F0F8FF;
            color: #fff;
        }
        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: #696969 !important;
            background-color: #fff !important;
        }
    </style>
        
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>  
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" >
                        {{ config('app.name', 'Laravel') }}
                            </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">  
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <form class="navbar-form navbar-left" role="search" method="post" action="{{route('adspost')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="searching" name="searching" type="text" class="form-control">
                            </div> 
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span> Szukaj
                                </button>
			</form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Logowanie</a></li>
                            <li><a href="{{ url('/register') }}">Rejestracja</a></li>
                        @else
                            <li>
                                <a href="{{ route('ads') }}">
                                    Wszystkie ogłoszenia
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    
                                    <li>
                                        <a href="{{ route('newadform') }}">
                                            Dodaj ogłoszenie
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('myads') }}">
                                            Moje ogłoszenia
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('changepassword') }}">
                                            Zmień hasło
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Wyloguj
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    
        <footer class="footer">
            <div class="container text-center">
                    <a href="#top" title="Początek strony">
                        <span class="glyphicon glyphicon-chevron-up"></span>
                    </a>
                     <p class="text-muted">Wróć na górę</p>
            </div>
        </footer>
    </div>

</body>
</html>
