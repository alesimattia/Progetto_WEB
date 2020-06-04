@extends('layouts.staff')

@section('title', 'Area Staff')

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner">
    <h3>Modifica Prodotto</h3>
    <p>Utilizza questa form per modificare un prodotto nel Catalogo</p>

    <fieldset class="registra-box-campi">
                
            {{ Form::open(array('route' => 'updateProdotto', 'id' => 'addproduct', 'files' => true, 'class' => 'row login_form')) }}
            @csrf
            <div class="col-md-12 form-group">
                {{ Form::text('nome', $prodotto->nome , ['class' => 'form-control','id' => 'nomeprodotto','placeholder'=>'Nome prodotto'])  }}
                
                {{ Form::label('subCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                {{ Form::select('subCat', $subCats, '', ['class' => '','id' => 'subCat']) }}<br>
                
                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}<br>
                {{ Form::file('foto', ['class' => 'input', 'id' => 'image']) }}
                

                {{ Form::text('descBreve', $prodotto->descBreve, ['class' => 'form-control','id' => 'descBreve','placeholder'=>'Descrizione breve'])  }}               

                {{ Form::text('prezzo', $prodotto->prezzo, ['class' => 'form-control','id' => 'prezzo','placeholder'=>'Prezzo'])  }}              


                {{ Form::text('percSconto', $prodotto->percSconto, ['class' => 'form-control','id' => 'percSconto','placeholder'=>'Sconto (%)'])  }}
               

                {{ Form::label('descEstesa', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descEstesa', $prodotto->descEstesa, ['class' => 'input', 'id' => 'descLong', 'rows' => 3]) }}

                {{ Form::hidden('id', $prodotto->id) }}
            </div>
            
            <div class="col-md-12 form-group">                
                {{ Form::submit('Conferma modifica', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>
            
            {{ Form::close() }}
        
    </fieldset>
    </div>
</div>
@endsection


