<header class="header_area">
    <div class="main_menu">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed">   <!-- eventualemte non trasparente style="background-color: #fff;-->
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('index') }}"><img src="{{ URL::asset('/img/home/main_logo.png') }}"></a>  <!-- LOGO OTTIMO, NON CAMBIARE-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contatti</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('user') }}">Area Utente</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item">
                            <a class="button button-header" href="{{ route('register') }}">
                                <img src="{{ URL::asset('/img/icon/register.png') }}" style="height: 20px">&nbsp; Registrati
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="button button-header" href="{{ route('login') }}">
                                <img src="{{ URL::asset('/img/icon/login.png') }}" style="height: 20px">&nbsp; Accedi
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!--Fine elementi Navbar-->
    </div>
</header>