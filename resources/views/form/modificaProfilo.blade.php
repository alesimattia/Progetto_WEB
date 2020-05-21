@extends('layouts.user') 

@section('title', 'Profilo')

@section('main')

<div class="col-12">
    <div class="login_form_inner register_form_inner" id="edit_form">
        <h3>Modifica informazioni profilo</h3>
        <form class="row login_form" action="#/" id="register_form">
            <fielset class="registra-box-campi">
            <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nuovo Username">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nuova Password">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Conferma Password">
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
            
        </form>
    </div>
</div>
@endsection