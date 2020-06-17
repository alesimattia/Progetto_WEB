/*------------------------- VALIDAZIONE ------------------------------*/

function scriviErrore(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errore">';
    for (var i = 0; i < elemErrors.length; i++) 
        out += '<li>' + elemErrors[i] + '</li>';
    out += '</ul>';
    return out;
}


/** Il campo password e la sua conferma vanno trattati in modo particolare 
 *  per verificare la contemporanea presenza dello stesso valore nei campi */
function validaPassword(id){

    var password = $("#password").val();
    var conferma = $("#password_confirmation").val();


    if( id == 'password' ){
        if ( password.length < 8 ){
            $("#" + id).next().find("li").parent().remove();
            $("#" + id).after(scriviErrore(['La password deve essere > 8 caratteri']));
        }
        else $("#" + id).next().find("li").parent().remove();
    }
    else if( id == 'password_confirmation' ){
            if( conferma!=password ){
                $("#" + id).next().find("li").parent().remove();
                $("#" + id).after(scriviErrore(['Le password non corrispondono']));
            }
            else  $("#" + id).next().find("li").parent().remove();
    }
}


function validaUsername(idCampo){
    /** Recupera una lista di username, per verificare se ciò che è stato inserito è già esistente */

    var rotta = $("#rottaValidaUsername").attr('value');
    var oldUsername = $("#oldUsername").attr('value');
    var nuovoUsername = $("#"+idCampo).val();
    
    $.ajax({
        type: 'POST',
        url: rotta,
        dataType: 'json',
        headers:{ 'X-CSRF-TOKEN': $('[name="_token"]').val() },

        success: function (utenti) {

            if(nuovoUsername == oldUsername)   /** Ha lasciato il vecchio username (non modificato) */
                $("#" + idCampo).next().find("li").parent().remove();
            else 
            if( utenti.includes(nuovoUsername) ){
                $("#" + idCampo).next().find("li").parent().remove();
                $("#" + idCampo).after(scriviErrore(['Username già presente']) );
            }
            else 
            if (nuovoUsername.length < 8){
                $("#" + idCampo).next().find("li").parent().remove();
                $("#" + idCampo).after(scriviErrore(['Username deve essere > 8 caratteri']) );
            }
            else
                $("#" + idCampo).next().find("li").parent().remove();       /**Ha inserito uno username unico ma prima no */
        },

        cache: false,
        contentType: false,
        processData: false
    });
}


function validaCampo(id, actionUrl, formId) {

    /** Se è il campo di inserimento dello username , password (o conferma) interrompe 
     *  il meccanismo di validazione Ajax solo per i suddetti campi */
    switch (id){
        case "username":
            validaUsername(id);
            break;

        case "password":
            validaPassword(id);
            break;
        case "password_confirmation":
            validaPassword(id);
            break;

        default :       /** altrimenti non era un campo username nè password -> campo gestito con tecnica Ajax*/
 
        var elem = $("#" + formId + " :input[name=" + id + "]");
        if (elem.attr('type') === 'file') {     // elemento di input type=file valorizzato
            if (elem.val() !== '')
                inputVal = elem.get(0).files[0];
            else
                inputVal = new File([""], "");
        }
        else  inputVal = elem.val();  // elemento di input type != file
        
        formElems = new FormData();
        formElems.append(id, inputVal);
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);

        $.ajax({
                type: 'POST',
                url: actionUrl,
                data: formElems,
                dataType: "json",
                error: function (data) {
                    if (data.status === 422) {
                        var errMsgs = JSON.parse(data.responseText);
                        $("#" + id).next().find("li").parent().remove();
                        $("#" + id).after(scriviErrore(errMsgs[id]));
                    }
                },
                cache: false,
                contentType: false,     //lascia l' enctype=multipart/form-Data
                processData: false      //non ri-formatta in modo diverso la struttura del dato
            });
    }
}


function validaForm(actionUrl, formId) {

    var form = new FormData(document.getElementById(formId));

    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: form,
        dataType: "json",
        error: function (data) {
            if (data.status === 422) {
                var errMsgs = data.responseText;
                $.each(errMsgs, function (id) {
                    $("#" + id).next().find("li").parent().remove();
                    $("#" + id).after(scriviErrore(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

/*--------------------- DESCRIZIONE ESTESA AJAX ------------------------------*/

function stampaDesc(titolo, prezzo, testo){
    var righe = testo.split('\n');
    var out = '<div class="container descrizione" id="box_desc"> <div class="subscribe text-center">';
            out += ' <div class="titolo_desc">'+titolo+"&nbsp; - &nbsp; Listino: € "+prezzo+'</div>';
                out += '<ul>';
    for(var i = 0;i < righe.length;i++)
                    out +='<li>'+ righe[i] + '</li>';
                out += '</ul>';
        out += '</div></div>';
    return out;
}


function getDescEstesa(idProdotto, rotta){

    var dato = new FormData();
    dato.append('id', idProdotto);

    $.ajax({
        type: 'POST',
        url: rotta,
        data:  dato,        
        dataType: 'json',
        headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            $("div#box_desc").remove();     /** File Json con campi 'nome' : 'val' --> no parsing */
            $("div.container_base").append(stampaDesc(data['nome'], 
                                                      data['prezzo'],
                                                      data['descEstesa'] )
            );
        },

        cache: false,
        contentType: false,
        processData: false
    });


}


/*------------------------- SLIDESHOW nella HOME ------------------------------*/
function slideshowAuto() {

    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    for (i = 0; i < slides.length; i++)
        slides[i].style.display = "none";  
    slideIndex++;
    if (slideIndex > slides.length)
        slideIndex = 1
    for (i = 0; i < dots.length; i++)
        dots[i].className = dots[i].className.replace(" active", "");

    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(slideshowAuto, 4000);
}

function showSlides(n) {

    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    if (n > slides.length)
        slideIndex = 1 
    if (n < 1)
        slideIndex = slides.length
    for (i = 0; i < slides.length; i++)
        slides[i].style.display = "none";  

    for (i = 0; i < dots.length; i++)
        dots[i].className = dots[i].className.replace(" active", "");

    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}
