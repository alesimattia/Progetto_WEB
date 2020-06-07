@extends('layouts.staff')

@section('title', 'Aggiungi categoria')

@section('main')

<div class="section-intro">
    
    <h2><span class="section-intro__style">Inserisci Categoria e/o Sottocategoria </span></h2>  

</div>

<section class="login_box_area section-margin" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner add_prodotto">   
                    
                    @if($Conferma==1)
                    <h6 class="alert"> Hai aggiunto una nuova categoria</h6>
                    <br>
                    @endif
                    
                    <h4>Inserisci una nuova categoria per i prodotti</h4>

                        <fieldset class="registra-box-campi">
                            
                            {{ Form::open(array('route' => 'aggiungiCategoria.store', 'id' => 'addcat', 'class' => 'row login_form')) }}

                                <div class="col-md-12 form-group">
                                    {{ Form::text('nomeCat', '', ['class' => 'form-control','id' => 'nomeCat','placeholder'=>'Nome Categoria'])  }}
            
                                    {{ Form::submit('Aggiungi Categoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                                </div>
                            {{ Form::close() }}
                        
                        </fieldset> 
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner add_prodotto">
                    
                    @if($Conferma==2)
                    <h6 class="alert">Hai aggiunto una nuova sottocategoria</h6>
                    <br>
                    @endif
                    
                    <h4>Inserisci una nuova sottocategoria per i prodotti</h4>    
        
                        <fieldset class="registra-box-campi">
                            
                            {{ Form::open(array('route' => 'aggiungiSub.store', 'id' => 'addsubcat', 'class' => 'row login_form')) }}

                                <div class="col-md-12 form-group">
                                
                                    {{ Form::text('nomeSubCat', '', ['class' => 'form-control','id' => 'nomeSubCat','placeholder'=>'Nome Sottocategoria'])  }}
                 
                                    {{ Form::label('mainCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                                    {{ Form::select('mainCat' , $Cats, '', ['class' => 'select','id' => 'mainCat']) }}
                
                                    {{ Form::submit('Aggiungi Sottocategoria', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
                                </div>
                            {{ Form::close() }}
                        
                        </fieldset>
                </div>
            </div>
        </div>
    </div>   
</section>
@endsection
