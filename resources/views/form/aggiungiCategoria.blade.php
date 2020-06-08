@extends('layouts.staff')

@section('title', 'Aggiungi categoria')

@section('main')

<h2 class="mb-5"><span class="section-intro__style">Aggiungi&nbsp; Categoria / Sottocategoria </span></h2>  

@isset($confirm)
    <h4 class="messaggio" > {{ $confirm }}</h4>
@endisset

<div class="container">
    <div class="row container">
        
        <div class="col-lg-6">
            <div class="login_form_inner register_form_inner add_prodotto">   
                
                <h4>Nuova categoria per i prodotti</h4>
                    <fieldset class="registra-box-campi">
                        {{ Form::open(array('route' => 'aggiungiCategoria.store', 'id' => 'addcat', 'class' => 'row login_form')) }}

                        <div class="col-md-12 form-group mt-5">
                            {{ Form::text('nomeCat', '', ['class' => 'form-control','id' => 'nomeCat','placeholder'=>'Nome'])  }}
                            @if($errors->first('nomeCat'))
                                <ul class="error">
                                @foreach($errors->get('nomeCat') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                                </ul>
                            @endif
    
                            {{ Form::submit('Aggiungi Categoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                        {{ Form::close() }}
                    </fieldset> 
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="login_form_inner register_form_inner add_prodotto">

                <h4>Nuova sottocategoria per i prodotti</h4>    

                    <fieldset class="registra-box-campi">
                        {{ Form::open(array('route' => 'aggiungiSub.store', 'id' => 'addsubcat', 'class' => 'row login_form')) }}
                        
                        <div class="col-md-12 form-group">
                            {{ Form::text('nomeSubCat', '', ['class' => 'form-control','id' => 'nomeSubCat','placeholder'=>'Nome'])  }}
                                @if($errors->first('nomeSubCat'))
                                    <ul class="error">
                                        @foreach($errors->get('nomeSubCat') as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            
                            {{ Form::label('mainCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                            {{ Form::select('mainCat' , $cats, '', ['class' => 'select','id' => 'mainCat']) }}
        
                            {{ Form::submit('Aggiungi Sottocategoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                        </div>

                        {{ Form::close() }}
                    </fieldset>
            </div>
        </div>
    </div>
</div>   
@endsection
