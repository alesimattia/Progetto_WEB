@extends('layouts.staff')

@section('title', 'Modifica Catalogo')

@section('main')

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
                            <th scope="col">
                                <!--checkBox-->
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset ($prodotti)
                        @foreach ($prodotti as $prodotto)
                        <tr> 
                            <td>
                                <div class="media">
                                    <div >
                                        @if($prodotto->foto == 'dummy.jpg' )
                                            <img  src="{{ URL::asset('/img/home/dummy.jpg') }}">
                                        @else
                                            <img  src="{{ URL::asset('/img/'. $prodotto->nomeCat .'/'. $prodotto->nomeSubCat .'/'. $prodotto->foto) }}">
                                        @endif
                                    </div>
                                    <div class="media-body" style="width: 100px">
                                        <p>{{ $prodotto->descBreve }}</p>
                                    </div>
                                </div>
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
                                <h5>$720.00</h5>
                            </td>
                            <td>
                                <input type="checkbox" id=" " name="{{ $prodotto->nome }}" value="{{ $prodotto->id }}">
                            </td>  
                        </tr>
                        @endforeach
                        @endisset
                        <!------------end product------------>
                        <tr class="bottom_button">
                            <td></td><td></td><td></td>
                            <td>
                                <div class="cupon_text">
                                    <a class="primary-btn ml2" href="#">Elimina selezionati</a>
                                </div>
                            </td>
                        </tr>
                
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
@endsection