<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electro - Catalogo</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- ================ CATALOGO ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <h2 style="text-align: center; padding-bottom: 50px;"><span class="section-intro__style">Catalogo</span></h2>

            <nav class="navbar navbar-expand-md  bg-light">

                <ul class="navbar-nav span4" style="float: left; padding-left: 100px; margin: auto;width: 50%;">
                    <li style="text-align: center; padding-bottom: 15px; padding-right: 15px;" class="nav-item">
                        <a onclick="filterSelection('all')" href="#" class="section-intro__style" style=" text-align: center;">Computer</a>    <!-- in origine "span" (solo questo elemento)-->
                    </li>
                    <li style="text-align: center;" class="active nav-item ">
                        <a onclick="filterSelection('hp')" style="color: #384aeb;" class="nav-link" data-toggle="tab" href="#">HP</a>
                    </li>
                    <li style="text-align: center" class="nav-item">
                        <a onclick="filterSelection('asus')" style="color: #384aeb;" class="nav-link" href="#" data-toggle="tab">Asus</a>
                    </li>
                    <li style="text-align: center" class="nav-item">
                        <a style="color: #384aeb;" class="nav-link" data-toggle="tab" href="#tab1">Lenovo</a>
                    </li>
                </ul>
                <ul class="navbar-nav span4" style="float: left; padding-left: 100px; margin: auto;width: 50%;">
                    <li style="text-align: center; padding-bottom: 15px; padding-right: 15px;" class="nav-item">
                        <a class="section-intro__style" style=" text-align: center;">Monitor</a>
                    </li>
                    <li style="text-align: center;" class="active nav-item ">
                        <a onclick="filterSelection('m_20')" style="color: #384aeb;" href="#" class="nav-link">20"</a>
                    </li>
                    <li style="text-align: center" class="nav-item">
                        <a style="color: #384aeb;" class="nav-link" data-toggle="tab" href="#tab1">24"</a>
                    </li>
                </ul>

            </nav>

            <div class="row">

                <!--Prodotto base-->
                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv m_20">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/monitor/20 (1).jpg">
                                <i class="card-product__imgOverlay" style="color: black" ;>
                                    <p>Prezzo non scontato + perc</p>
                                    <p>Descrizione breve</p>
                                </i> 
                        </div>
                        <div class="card-body">
                            <p>Accessories</p>
                            <h4 class="card-product__title"><a href="single-product.html">Acer Af-20</a></h4>
                            <p class="card-product__price">€80.00</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv m_20">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/monitor/20 (2).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Monitor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Lenovo 20X</a></h4>
                            <p class="card-product__price">€150.00</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv m_20">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/monitor/20 (3).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Monitor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Samsung Led-11</a></h4>
                            <p class="card-product__price">$140.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv asus"" data-filter="asus">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/desktop/pc (1).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Desktop</p>
                            <h4 class="card-product__title"><a href="single-product.html">Thinkpad 2020</a></h4>
                            <p class="card-product__price">€550.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv m_20">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/monitor/20 (4).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Decor</p>
                            <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv m_20">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/monitor/20 (5).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Accessories</p>
                            <h4 class="card-product__title"><a href="single-product.html">Man Office Bag</a></h4>
                            <p class="card-product__price">$150.00</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv asus">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/desktop/pc (3).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Desktop</p>
                            <h4 class="card-product__title"><a href="single-product.html">Corsair MX3</a></h4>
                            <p class="card-product__price">1000.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3 filterDiv hp>
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/desktop/pc (4).jpg" alt="">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <button><i class="ti-search"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-shopping-cart"></i></button>
                                </li>
                                <li>
                                    <button><i class="ti-heart"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p>Desktop</p>
                            <h4 class="card-product__title"><a href="single-product.html">Acer A1f</a></h4>
                            <p class="card-product__price">€400.00</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="./filterScript.js"></script>
</body>

</html>