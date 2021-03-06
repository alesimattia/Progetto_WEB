<header class="header_area">
    <div class="main_menu">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light fixed">   <!-- eventualemte non trasparente style="background-color: #fff;-->
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('index') }}"><img src="{{ URL::asset('/img/home/main_logo.png') }}"></a>  <!-- LOGO OTTIMO, NON CAMBIARE-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        @endguest
                        @can('isUser')
                        <li class="nav-item "><a class="nav-link" href="{{ route('user') }}">Home</a></li>
                        @endcan
                        @can('isStaff')
                        <li class="nav-item "><a class="nav-link" href="{{ route('staff') }}">Home</a></li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item "><a class="nav-link" href="{{ route('admin')}}">Home</a></li>
                        @endcan

                        <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a></li>

                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ URL::asset('documentazione.pdf') }}">Documentazione</a></li>
                        @endguest
                        @can('isUser')
                        <li class="nav-item"><a class="nav-link" href="{{ route('editProfilo') }}">Modifica profilo</a></li>
                        @endcan
                        @can('isStaff')
                        <li class="nav-item submenu dropdown">
                            <span class="nav-link dropdown-toggle">Gestisci prodotti</span>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('nuovoProdotto')}}">Inserisci prodotto</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('listaProdotti') }}">Modifica Catalogo</a></li>
                            </ul>
                          
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('aggiungiCategoria') }}">Gestisci categorie</a></li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('listaUtenti/{ruolo}', ['user']) }}">Elimina Clienti</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('listaUtenti/{ruolo}', ['staff']) }}">Gestisci Staff</a></li>
                        @endcan
                    </ul>


                    <ul class="nav-shop">
                        @guest
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
                        @endguest
                        @auth
                            <li>
                                <a href="" class="button button-header" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <img src="{{ URL::asset('img/icon/login.png') }}" style="height: 20px">&nbsp; Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endauth
                    </ul>

                </div>
            </div>
        </nav>
        <!--Fine elementi Navbar-->
    </div>
</header>
