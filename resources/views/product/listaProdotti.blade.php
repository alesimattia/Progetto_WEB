@extends('layouts.staff')

@section('title', 'Modifica Catalogo')

@section('main')
<h2 style="text-align: center; padding-bottom: 3%;"><span class="section-intro__style">Lista dei prodotti</span></h2>
<section class="cart_area">
    
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Prodotto</th>
                            <th scope="col">Prezzo intero</th>
                            <th scope="col">Sconto</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col" style="align-items: center">Seleziona</th>
                        </tr>
                    </thead>
                    @isset ($prodotti)
                    <tbody>
                        
                            {{ Form::open(array('route' => 'eliminaProdotto', 'id' => 'deleteProduct', 'files' => true, 'class' => 'row login_form')) }}
                            @csrf
                            
                            @foreach ($prodotti as $prodotto)
                            <tr> 
                                <td>
                                    <a href="{{ route('modificaProdotto/{id}', [$prodotto->id]) }}">
                                        <div class="media">
                                            <div >
                                                @if($prodotto->foto == 'dummy.jpg' )
                                                    <img class="miniatura" src="{{ URL::asset('/img/home/dummy.jpg') }}">
                                                @else
                                                    <img  class="miniatura" src="{{ URL::asset('/img/'. $prodotto->getMainCat() .'/'.  $prodotto->getSubCat() .'/'. $prodotto->foto) }}">
                                                @endif
                                            </div>
                                            <div class="media-body" style="width: 100px">
                                                <p>{{ $prodotto->descBreve }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <h5>{{ $prodotto->prezzo }}€</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <p>{{ $prodotto->percSconto }}%</p>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $prodotto->getPrezzo() }}</h5>
                                </td>
                                <td>
                                    {{ Form::checkbox('selezionati[]', $prodotto->id) }}
                                </td>  
                            </tr>
                            @endforeach
                        <!------------end product------------>
                        <tr class="bottom_button">
                            <td></td><td></td><td></td>
                            <td>
                                <div class="cupon_text">
                                    {{ Form::submit('Elimina selezionati', ['class' => 'submit button-register w-100']) }}
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                    @endisset
                </table>
                @include ('helpers.paginator', ['paginator' => $prodotti])
            </div>
        </div>
    </div>
</section>
@endsection