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


/** Il campo password e la sua conferma vanno trattati in modo particolare */
function validaPassword(id){

    function passwordMatches() {
        var password = $("#password").val();
        var conferma = $("#password-confirm").val();

        if (password != conferma) 
            return false;
        else return true;
    }


    if( id == 'password' ){
        var inserito = $("#password").val();
        if ( inserito.length < 8 ){
            $("#" + id).next().find("li").parent().remove();
            $("#" + id).after(scriviErrore(['La password deve essere > 8 caratteri']));
        }
        else $("#" + id).next().find("li").parent().remove();
        
        return true;
    }
    else if( id == 'password-confirm' ){
            if(! passwordMatches() ){
                $("#" + id).next().find("li").parent().remove();
                $("#" + id).after(scriviErrore(['La password non corrisponde']));
            }
            else  $("#" + id).next().find("li").parent().remove();
        return true;
    }
}


function validaCampo(id, actionUrl, formId) {

    /** Se è il campo di inserimento password (o conferma) interrompe il meccanismo
        di validazione Ajax solo per i suddetti campi */
    if( validaPassword(id) ) return;

    /** altrimenti non era un campo password -> campo gestito con tecnica Ajax*/
    else{

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
                var errMsgs = JSON.parse(data.responseText);
                $.each(errMsgs, function (id) {
                    $("#" + id).next().find("li").parent().remove();
                    $("#" + id).after(scriviErrore(errMsgs[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);
        },
        contentType: false,
        processData: false
    });
}

/*--------------------- DESCRIZIONE ESTESA AJAX ------------------------------*/

function stampaDesc(titolo, prezzo, testo){
    var righe = testo.split('\n');
    var out = '<div class="container descrizione" id="box_desc"> <div class="subscribe text-center">';
            out += ' <div class="titolo_desc">'+titolo+"&nbsp; - &nbsp; € "+prezzo+'</div>';
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
