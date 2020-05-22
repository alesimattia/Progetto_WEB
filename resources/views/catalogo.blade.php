@extends('layouts.public')

@section('title', 'Catalogo')

@section('main')


    <div class="container">
        <h2 style="text-align: center; padding-bottom: 3%;"><span class="section-intro__style">Catalogo</span></h2>
        @isset($mainCats)
            <nav class="navbar navbar-expand-md  bg-light">
                @foreach ($mainCats as $categoria)
                    <ul class="navbar-nav span4 category_block" >
                        <li class="nav-item">
                            <a  class=" main_category"  href="{{ route('catalogo/{categoria}', [$categoria->nomeCat] ) }}">{{ $categoria->nomeCat }}</a>    <!-- in origine "span" (solo questo elemento)-->
                        </li>
                        @isset ($subCats)
                            @foreach ($subCats as $sottocategoria)
                                @if ($categoria->id == $sottocategoria->mainCat)
                                    <li class="active nav-item sub_category">
                                        <a class="nav-link" href="{{ route('catalogo/{categoria}', [$sottocategoria->nomeSubCat] ) }}">{{ $sottocategoria->nomeSubCat }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endisset
                    </ul>
                @endforeach
            </nav>
        @endisset

        <div class="row">
            @isset ($prodotti)
            @foreach ($prodotti as $prodotto)
                <!--Prodotto base-->
                <div class="col-md-6 col-lg-4 col-xl-3 box_prodotto">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{ URL::asset('/img/'. $prodotto->nomeCat .'/'. $prodotto->nomeSubCat .'/'. $prodotto->foto) }}">
                            <div class="card-product__imgOverlay">
                                @if($prodotto->percSconto>0)
                                    <p>Sconto &nbsp;{{ $prodotto->percSconto }}%</p><br>
                                @endif
                                <p>{{ $prodotto->descBreve }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-product__title"><a href="single-product.html">{{ $prodotto->nome }}</a></h4>
                            <p class="card-product__price">€ {{ $prodotto->prezzo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach                                    
            @endisset
        </div>                  <!--oggetto a cui viene inviato il contenuto da paginare-->
        @include ('pagination.paginator', ['paginator' => $prodotti])
    </div>
@endsection
