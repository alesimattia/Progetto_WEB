@extends('layouts.staff')

@section('title', 'Area Staff')

@section('main')
<div class="col-12">
    <div class="login_form_inner register_form_inner">
    <h3>Aggiungi Prodotto</h3>
    <p>Utilizza questa form per inserire un nuovo prodotto nel Catalogo</p>

    <fielset class="registra-box-campi">
                
            {{ Form::open(array('route' => 'nuovoProdotto.store', 'id' => 'addproduct', 'files' => true, 'class' => 'row login_form')) }}
            <div class="col-md-12 form-group">
                {{ Form::text('nome', '', ['class' => 'form-control','id' => 'nomeprodotto','placeholder'=>'Nome prodotto'])  }}
                @if ($errors->first('nome'))
                <ul class="error">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-12 form-group">
                {{ Form::label('subCat', 'Categoria', ['class' => 'lista-opzioni']) }}
                {{ Form::select('subCat', $cats, '', ['class' => '','id' => 'subCat']) }}
            </div>

            <div class="col-md-12 form-group">
                <!--{{ Form::file('foto', ['class' => 'form-control','id' => 'fotoprodotto','placeholder'=>'Immagine'])  }}-->
                {{ Form::label('foto', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('foto', ['class' => 'input', 'id' => 'image']) }}
                @if ($errors->first('foto'))
                <ul class="error">
                    @foreach ($errors->get('foto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-12 form-group">
                {{ Form::text('descBreve', '', ['class' => 'form-control','id' => 'descBreve','placeholder'=>'Descrizione breve'])  }}               
                @if ($errors->first('descBreve'))
                <ul class="error">
                    @foreach ($errors->get('descBreve') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-12 form-group">
                {{ Form::text('prezzo', '', ['class' => 'form-control','id' => 'prezzo','placeholder'=>'Prezzo'])  }}              
                @if ($errors->first('prezzo'))
                <ul class="error">
                    @foreach ($errors->get('prezzo') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-12 form-group">
                {{ Form::text('percSconto', '', ['class' => 'form-control','id' => 'percSconto','placeholder'=>'Sconto (%)'])  }}
                @if ($errors->first('percSconto'))
                <ul class="error">
                    @foreach ($errors->get('percSconto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-12 form-group">
                {{ Form::label('discounted', 'In Sconto', ['class' => 'label-input']) }}
                {{ Form::select('discounted', ['1' => 'Si', '0' => 'No'], 1, ['class' => 'input','id' => 'discounted']) }}
            </div>

            <div class="col-md-12 form-group">
                {{ Form::label('descEstesa', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descEstesa', '', ['class' => 'input', 'id' => 'descLong', 'rows' => 2]) }}
                @if ($errors->first('descEstesa'))
                <ul class="error">
                    @foreach ($errors->get('descEstesa') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="col-md-12 form-group">                
                {{ Form::submit('Aggiungi Prodotto', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>
            
            {{ Form::close() }}
        
    </fielset>
    </div>
</div>
@endsection


