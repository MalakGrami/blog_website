<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom CSS -->
    @vite(['resources/sass/app.scss'])
    @vite(['resources/css/app.css'])
</head>
<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-default navbar-fixed-top">

        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Basculer la navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Site de blog</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home')}}">Accueil</a></li>
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Catégorie 1</a></li>
                            <li><a href="#">Catégorie 2</a></li>
                            <li><a href="#">Catégorie 3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-3 my-lg-0">
                          <input class="form-control mr-sm-2 w-100 w-sm-auto" style="width: 300px;"type="search" placeholder="Rechercher" aria-label="Rechercher">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
                      </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @auth
                   

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                
                                Se déconnecter
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
