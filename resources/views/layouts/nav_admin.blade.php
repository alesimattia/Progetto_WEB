<header class="header_area">
    <div class="main_menu">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('index') }}"><img src="img/home/main_logo.png"></a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="catalogo.html">Catalogo</a></li>                           
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Gestisci prodotti</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('nuovoProdotto') }}">Inserisci prodotti</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Modifica prodotti</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Cancella prodotti</a></li>                                  
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Gestisci Staff</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="#">Inserisci utente staff</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Modifica staff</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Cancella utente staff</a></li>                                  
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Elimina profilo Cliente</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Modifica profilo</a></li>
                    </ul>
    
                    <ul class="nav-shop">
                        <li class="nav-item">
                            <a class="button button-header" href="#">
                                <img src="./img/icon/login.png" style="height: 20px">&nbsp;Logout
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
        <!--Fine elementi Navbar-->
    </div>
</header>
