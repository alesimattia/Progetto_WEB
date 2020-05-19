@extends('layouts.public')

@section('title', 'Catalogo')

@section('main')

<section class="section-margin calc-60px">
    <div class="container">
        <h2 style="text-align: center; padding-bottom: 3%;"><span class="section-intro__style">Catalogo</span></h2>

        <nav class="navbar navbar-expand-md  bg-light">
            <ul class="navbar-nav span4 category_block" >
                <li class="nav-item">
                    <a  class=" main_category">Computer</a>    <!-- in origine "span" (solo questo elemento)-->
                </li>
                <li class="active nav-item sub_category">
                    <a class="nav-link" href="#">Desktop</a>
                </li>
                <li class="active nav-item sub_category">
                    <a class="nav-link" href="#">Notebook</a>
                </li>
            </ul>

            <ul class="navbar-nav span4 category_block" >
                <li class="nav-item">
                    <a  class=" main_category">Computer</a>    <!-- in origine "span" (solo questo elemento)-->
                </li>
                <li class="active nav-item sub_category">
                    <a class="nav-link" href="#">Desktop</a>
                </li>
                <li class="active nav-item sub_category">
                    <a class="nav-link" href="#">Notebook</a>
                </li>
            </ul>
        </nav>
        


        <div class="row">
            {{--@isset($prodotti)
                @foreach($prodotti) --}}
                <!--Prodotto base-->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{ URL::asset('/img/monitor/20/20 (1).jpg') }}">
                                <i class="card-product__imgOverlay" style="color: black" ;>
                                    <p>Prezzo non scontato + perc</p>
                                    <p>Descrizione breve</p>
                                </i> 
                        </div>
                        <div class="card-body">
                            
                            <h4 class="card-product__title"><a href="single-product.html">Acer Af-20</a></h4>
                            <p class="card-product__price">€80.00</p>
                        </div>
                    </div>
                </div>
                {{--@endforeach
                                        <!--oggetto a cui viene inviato il contenuto da paginare-->
                @include('pagination.paginator', ['paginator' => $prodotti])
            @endisset--}}

            <!-- PRODOTTO ORIGINALE-->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="card-img" src="img/monitor/20/20 (2).jpg" alt="">
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
                        <h4 class="card-product__title"><a >Lenovo 20X</a></h4>
                        <p class="card-product__price">€150.00</p>
                    </div>
                </div>
            </div>

        </div>
                                   
    </div>
</section>
@endsection