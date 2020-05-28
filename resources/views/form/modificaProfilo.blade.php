@extends('layouts.user')

@section('title', 'Profilo')

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner" id="edit_form">
        <h3>Modifica informazioni profilo</h3>
        {{ Form::open(array('route' => 'register', 'class' => 'row login_form', 'id'=>'register_form')) }}
        @csrf
            <fielset class="registra-box-campi">
                <div class="col-md-12 form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder'=>'Password']) }}
                                    @if($errors->first('password'))
                                    <ul class="error">
                                        @foreach($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                        @endif
                    {{ Form::text('password', '', ['class' => 'form-control','id' => 'password','placeholder'=>'Conferma Password'] )}}
                        @if($errors->first('password'))
                        <ul class="error">
                            @foreach($errors->get('password') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif

                </div>
                <div class="col-md-12 form-group">
                    {{ Form::text('nome', '', ['class' => 'form-control', 'id' => 'name','placeholder'=>'Nome']) }}
                    @if($errors->first('name'))
                    <ul class="error">
                        @foreach($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::text('cognome', '', ['class' => 'form-control', 'id' => 'Cognome','placeholder'=>'Cognome']) }}
                    @if($errors->first('cognome'))
                    <ul class="error">
                        @foreach($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::text('residenza', '', ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza']) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::date('dataNascita', '', ['class' => 'form-control', 'id' => 'Data_di_nascita']) }}

                </div>
                <div class="col-md-12 form-group" >
                    {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}
                    {{ Form::select('occupazione',array('studente','operaio','impiegato','disoccupato') , '', ['class' => '','id' => 'occupation']) }}
                </div>
            </fielset>
            <div class="col-md-12 form-group">
                {{ Form::submit('MODIFICA', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>

        {{ Form::close() }}        
    </div>
</div>
@endsection
