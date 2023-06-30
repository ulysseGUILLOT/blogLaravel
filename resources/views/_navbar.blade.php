@php
    $routeName = request()->route()->getName();
@endphp

<nav class="navbar navbar-expand-lg bg-navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{ asset('img/logoPiment.png') }}" height="80" alt="logo Piment">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-medium @if($routeName === 'home') active"
                       aria-current="page @endif " href="{{ route('home') }}">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Ma liste de piments
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Voir tous</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Habanero</a></li>
                        <li><a class="dropdown-item" href="#">Jalapeno</a></li>
                        <li><a class="dropdown-item" href="#">Carolina Reaper</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium @if($routeName === 'blog.recettes') active"
                       aria-current="page @endif " href="#">Recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium @if(str_starts_with($routeName, 'blog.')) active"
                       aria-current="page @endif " href="{{ route('blog.index') }}">Blog</a>
                </li>
            </ul>
            <div class="navbar-nav mas-auto mb-2 mb-lg-0">

                @auth()
                <div class="btn-group">
                    <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Mon compte
                    </button>
                    <ul class="dropdown-menu">
                        <li><p class="dropdown-item disabled">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="">Mes likes</a></li>
                        <li><a class="dropdown-item" href="">Paramètres</a></li>
                        <li>
                            <form action="{{ route('auth.logout') }}" method="post">
                                @method("delete")
                                @csrf
                                <button class="dropdown-item">
                                    <strong class="text-danger">Se déconnecter</strong>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

                @guest()
                    <a class="btn btn-custom" href="{{ route('auth.login') }}">Connexion</a>
                @endguest
            </div>
        </div>
    </div>
</nav>
