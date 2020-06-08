@extends('layouts.user')

@section('title', 'Profilo')

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner" id="edit_form">
        <h3>Modifica informazioni profilo</h3>

        @if($utente->ruolo == 'user')
            {{ Form::open(['route' => 'editProfilo.store', 'class' => 'row login_form', 'id'=>'register_form']) }}
        @else
            {{ Form::open(['route' => 'modificaStaff.store', 'class' => 'row login_form', 'id'=>'register_form']) }}
        @endif

        @csrf
            <fieldset class="registra-box-campi">
                <div class="col-md-12 form-group">

                    @if($utente->ruolo == 'staff')
                        {{ Form::text('username', $utente->username, ['class' => 'form-control', 'id' => 'username','placeholder'=>'Username']) }}
                        @if($errors->first('username'))
                        <ul class="error">
                            @foreach($errors->get('username') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    @endif

                    {{ Form::password('password', ['class' => 'form-control', 'id' => 'password','placeholder'=>'Password']) }}
                            @if($errors->first('password'))
                            <ul class="error">
                                @foreach($errors->get('password') as $message)
                                <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password-confirm','placeholder'=>'Conferma password']) }}


                    {{ Form::text('nome', $utente->nome, ['class' => 'form-control', 'id' => 'name','placeholder'=>'Nome']) }}
                    @if($errors->first('name'))
                    <ul class="error">
                        @foreach($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif

                    {{ Form::text('cognome', $utente->cognome, ['class' => 'form-control', 'id' => 'Cognome','placeholder'=>'Cognome']) }}
                    @if($errors->first('cognome'))
                    <ul class="error">
                        @foreach($errors->get('cognome') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif

                    @if($utente->ruolo =='user')
                    {{ Form::text('residenza', $utente->residenza, ['class' => 'form-control', 'id' => 'Luogo_residenza','placeholder'=>'Luogo di residenza']) }}
              
                    {{ Form::date('dataNascita', $utente->dataNascita, ['class' => 'form-control', 'id' => 'Data_di_nascita']) }}

                    {{ Form::label('occupazione', 'Scegli occupazione', ['class' => 'lista-opzioni']) }}
                    {{ Form::select('occupazione', $lista_occupaz , $utente->occupazione, ['class' => 'select_box','id' => 'occupazione']) }}
                    @endif

                    <!--per ritrovare la tupla in fase di update con un nuovo username-->
                    {{ Form::hidden('oldUsername', $utente->username) }}
                </div>
            </fieldset>

            <div class="col-md-12 form-group">
                {{ Form::submit('MODIFICA', ['class' => 'submit button-register w-100 ']) }}
            </div>

        {{ Form::close() }}        
    </div>
</div>
@endsection
