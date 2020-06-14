@extends('layouts.public')

@section('title', 'Catalogo')

@section('scripts')
    @parent
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/functions.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
    $(function () {
        
        $("div.box_prodotto").on('click', function (event) {
            var id = $(this).next().attr('codiceProdotto');
            var rotta = "{{ route('descEstesa') }}";
            getDescEstesa(id, rotta);
        });
    });
    </script>
@endsection

@csrf
@section('main')

<div class="container container_base" style="text-align:center">

    <h2><span class="section-intro__style">Catalogo</span></h2>

    <div class="search">
        {{ Form::open(['route' => 'cerca', 'class' => 'form-inline my-2 my-lg-0', 'style' =>'float:right;' ]) }} @csrf
        {{ Form::text('prodotto','', ['class' => 'form-control mr-sm-2', 'id' => 'prodotto', 'placeholder'=>'Prodotto']) }}
        {{ Form::submit('Cerca', ['class' => 'btn btn-outline-success my-2 my-sm-0']) }}
    </div>

    @isset($mainCats)
    <nav class="navbar navbar-expand-md  bg-light" style="clear: both">
        @foreach ($mainCats as $categoria)
            <ul class="navbar-nav span4 category_block" >
                <li class="nav-item">
                    <a  class=" main_category"  href="{{ route('catalogo/{categoria}', [$categoria->nomeCat] ) }}">{{ $categoria->nomeCat }}</a>    <!-- in origine "span" (solo questo elemento)-->
                </li>
                @isset ($subCats)
                    @foreach ($subCats as $sottocategoria)
                        @if ($categoria->id == $sottocategoria->mainCat)
                            <li class=" nav-item sub_category">
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
                            @if($prodotto->foto == 'dummy.jpg' )
                                <img class="card-img" src="{{ URL::asset('/img/home/dummy.jpg') }}">
                            @else
                                <img class="card-img" src="{{ URL::asset('/img/'. $prodotto->nomeCat .'/'. $prodotto->nomeSubCat .'/'. $prodotto->foto) }}">
                            @endif
                            <div class="card-product__imgOverlay">
                                @include('helpers/productPrice')
                                <p>{{ $prodotto->descBreve }}</p>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <h4 class="card-product__title">{{ $prodotto->nome }}</h4>
                            @can('showDiscount')
                                <p class="card-product__price">€{{ number_format($prodotto->getPrezzo(), 2, ',', '.') }}</p>
                            @else
                                <p class="card-product__price">€{{ $prodotto->prezzo }}</p>
                            @endcan
                        </div>
                    <!--/a-->
                </div>
            </div>
            <meta codiceProdotto="{{ $prodotto->idProdotto }}" />
        @endforeach                                    
        @endisset
    </div>                  <!--oggetto a cui viene inviato il contenuto da paginare-->
    @include ('helpers.paginator', ['paginator' => $prodotti])

    @section('desc')    @endsection
</div>
@endsection
