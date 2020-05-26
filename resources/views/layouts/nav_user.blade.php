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
                        <li class="nav-item active"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a></li>   <!--CATALOGO_GUEST-->
                        <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Contatti</a></li>               
                        <li class="nav-item"><a class="nav-link" href="{{ route('modificaProfilo') }}">Modifica profilo</a></li>
                    </ul>
                    
                    <ul class="nav-shop">
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
