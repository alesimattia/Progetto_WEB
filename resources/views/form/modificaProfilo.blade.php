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
                    {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name','placeholder'=>'Nome', 'onfocus'=>"this.placeholder=''",'onblur'=>"this.placeholder='Nome'"]) }}
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

            <fieldset class="registra-box-campi">
                <div class="col-md-12 form-group">
                    {{ Form::text('password', '', ['class' => 'form-control','id' => 'password','placeholder'=>'Nuova Password'])  }}
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
            </fieldset>

            <div class="col-md-12 form-group">
                {{ Form::submit('REGISTRATI', ['class' => 'submit button-register w-100 ' ,'style'=>'color:white']) }}
            </div>

        {{ Form::close() }}
        <!--form method="post" class="row login_form" action="#/" id="register_form">
            <fielset class="registra-box-campi">
            <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nuovo Username">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nuova Password">
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Conferma Password">
                    <input type="text" class="form-control" id="residenza" name="residenza" placeholder="Nuova residenza?">
                    <label class="lista-opzioni" for="occupation">Cambiato lavoro?</label>
                    <select id="occupation" name="Occupazione" size="1">
                        <option>Disoccupato</option>
                        <option selected>Operaio</option>
                        <option>Impiegato</option>
                        <option>Studente</option>
                    </select>
            </div>
            </fielset>
            <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="button button-register w-100">Modifica</button>
            </div>

        </form-->
    </div>
</div>
@endsection
