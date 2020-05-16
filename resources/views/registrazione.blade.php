@extends('layouts.public')
@section('title', 'Registrazione')
    
    <section class="login_box_area section-margin" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img ">
                        <div class="hover">
                            <h4 style="margin-bottom: 10%;">Hai già un account?</h4>
                            <a class="button button-account" href="login.html">Accedi ora</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <h3>Crea il tuo account</h3>
                        <form class="row login_form" action="#/" id="register_form">
                            <fielset class="registra-box-campi">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nome'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="Cognome" name="surname" placeholder="Cognome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cognome'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="Luogo_residenza" name="residenza" placeholder="Luogo di residenza" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Luogo di residenza'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="date" class="form-control" id="Data_di_nascita" name="Datanascita">
                                </div>   
                                <div class="col-md-12 form-group" >
                                    <label class="lista-opzioni" for="occupation">Scegli occupazione</label>
                                        <select id="occupation" name="Occupazione" size="1">
                                            <option>Disoccupato</option>
                                            <option selected>Operaio</option>
                                            <option>Impiegato</option>
                                            <option>Studente</option>
                                        </select>
                                </div>  
                            </fielset>    

                            <fieldset class="registra-box-campi">
                               <legend>Dati di accesso</legend>
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                </div>
                            </fieldset>
                            
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-register w-100">Registrati</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>