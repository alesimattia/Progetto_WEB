<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro - Shop</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!--================ Header + Navbar =================-->
    <header class="header_area">
        <div class="main_menu">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light fixed">   <!-- eventualemte non trasparente style="background-color: #fff;-->
                <div class="container">
                    <a class="navbar-brand logo_h" href="index.html"><img src="img/home/main_logo.png"></a>  <!-- LOGO OTTIMO, NON CAMBIARE-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Catalogo</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contatti</a></li>
                        </ul>

                        <ul class="nav-shop">
                            <li class="nav-item"><a class="button button-header" href="#">Registrati</a></li>
                            <li class="nav-item"><a class="button button-header" href="#">Accedi</a></li>
                        </ul>

                    </div>
                </div>
            </nav>
            <!--Fine elementi Navbar-->
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <main class="site-main">

        <!-- ================ Banner centrale ================= -->
        <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="offer__content text-center">
                            <h3>I migliori prodotti per le tue esigenze</h3>
                            <h4>Il catalogo più grande d'Italia</h4>
                            <p>Scopri i nostri sconti</p>
                            <a class="button button--active mt-3 mt-xl-4" href="#">Acquista ora</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--================   CORPO PRINCIPALE  =================-->
        <main class="site-main section-margin">
            <h2>Contenuto Qui </h2>
        </main>

        <!--================ Start footer Area  =================-->
        <footer class="footer">
            <div class="footer-area">
                <div class="container">
                    <div class="row section_gap">
                        <div class="col-lg-3 col-md-6 col-sm-6 modfooter">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title large_title">Mission aziendale</h4>
                                <p>
                                    Electro fornisce da sempre i migliori prodotti mantendo la qualità alta e prezzi competitivi.
                                </p>
                                <p>
                                    La cura del cliente è sempre al centro del nostro progetto. Con Electro verrai seguto attentamente dalla scelta del prodotto all'acquisto in sicurezza.
                                </p>
                            </div>
                        </div>
                        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">I nostri social</h4>
                                <ul class="list">
                                    <li><a href="#"><img src="img/icon/fb.ico" class="navico"></a></li>
                                    <li><a href="#"><img src="img/icon/ig.ico" class="navico"></a></li>
                                    <li><a href="#"><img src="img/icon/tw.ico" class="navico"></a></li>
                                    <li><a href="#"><img src="img/icon/yt.ico" class="navico"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">I nostri contatti</h4>
                                <div class="ml-40">
                                    <p class="sm-head">
                                        <span class="fa fa-location-arrow"></span> Sede
                                    </p>
                                    <p>Via Brecce Bianche 12, 60131 Ancona</p>

                                    <p class="sm-head">
                                        <span class="fa fa-phone"></span> Telefono
                                    </p>
                                    <p>
                                        +123 456 7890
                                        <br> +123 456 7890
                                    </p>

                                    <p class="sm-head">
                                        <span class="fa fa-envelope"></span> Email
                                    </p>
                                    <p>
                                        S1234567@studenti.univpm.it
                                        <br> S8765432@studenti.univpm.it
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

</body>

</html>
