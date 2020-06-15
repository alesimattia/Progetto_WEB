<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">   <!--sostituisce eventualmente il trattino con l'underscore-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro - @yield('title', 'Shop')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @section('link')
        @show
    @section('scripts')
        @show
</head>

<body>
    @include('layouts/navbar')
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
                            <a class="button button--active mt-3 mt-xl-4" href="{{ route('catalogo') }}">Acquista ora</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--================   CORPO PRINCIPALE  =================-->
        <main class="site-main section-margin">
            @yield('main')
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
                        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 footer_margin">
                            <div class="single-footer-widget tp_widgets">
                                <h4 class="footer_title">I nostri social</h4>
                                <ul class="list">
                                    <li><img src="{{asset('img/icon/fb.png')}}" class="navico"></li>
                                    <li><img src="{{asset('img/icon/tw.png')}}" class="navico"></li>
                                    <li><img src="{{asset('img/icon/yt.png')}}" class="navico"></li>
                                </ul>
                            </div>
                        </div>

                        <div class="offset-lg-1 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-widget tp_widgets footer_margin">
                                <h4 class="footer_title">I nostri contatti</h4>
                                <div class="ml-40">
                                    <p class="sm-head footer_contatti">
                                        <span class="fa"></span> Sede
                                    </p>
                                    <p style="text-align: right;">Via Brecce Bianche 12, 60131 Ancona</p>
                                    <p class="sm-head footer_contatti">
                                        <span class="fa "></span> Telefono
                                    </p>
                                    <p style="text-align: right;">
                                        +123 456 7890<br>
                                        +123 456 7890
                                    </p>
                                    <p class="sm-head footer_contatti">
                                        <span class="fa"></span> Email
                                    </p>
                                    <p style="text-align: right;">
                                        S1234567@studenti.univpm.it<br>
                                        S8765432@studenti.univpm.it
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
