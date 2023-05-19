
<header>
    <a href="{{route('home')}}" class="logo">Site de blog</a>
    <form class="form-inline my-2 my-lg-0" action="{{ route('home') }}" method="GET">
        <input class="form-control mr-sm-2" style="width: 200px; margin: 0 auto;" type="search" name="keyword" placeholder="Rechercher" aria-label="Rechercher">
    </form>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navigation">
        <li>
            <a href="{{route('home')}}">Accueil</a>
        </li>
        <li>
            <select class="nav-select">
                <option>-- sélectionnez une catégorie --</option>
                {{-- @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach --}}
            </select>
        </li>
        @auth
        <li> 
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        @else
        <li>
            <a href="{{ route('login') }}">Se connecter</a>
        </li>
        <li>
            <a href="{{ route('register') }}">S'inscrire</a>
        </li>
        @endauth
    </ul>
</header>
<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 4px 100px;
        z-index: 10000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.5s;
    }

    header.sticky {
        background: #fff;
        padding: 10px 100px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
    }

    header.sticky .logo {
        color: #111;
    }

    header .logo {
        color: #6100ff;
        font-weight: 500;
        font-size: 1.5em;
        text-decoration: none;
    }

    header .navigation {
        position: relative;
        display: flex;
    }

    header .navigation li {
        list-style: none;
        margin-left: 30px;
    }

    header .navigation li a {
        text-decoration: none;
        color: #260064;
        font-weight: 300;
    }

    header.sticky .navigation li a {
        color: #111;
    }

    header .navigation li a:hover {
        color: #6100ff;
    }

    /* Style the select element */
    .nav-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: transparent;
        border: none;
        padding: 5px;
        font-size: 14px;
        color: #260064;
        font-weight: 300;
    }

    /* Style the select arrow */
    .nav-select::after {
        content: '\25BE';
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        color: #260064;
    }

    /* Style the select options */
    .nav-select option {
        color: #260064;
        background-color: #fff;
    }
</style>

<script>
    window.addEventListener('scroll', function () {
        var header = document.querySelector('header');
        header.classList.toggle('sticky', window.scrollY > 0);
    });

</script>
