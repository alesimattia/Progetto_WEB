function scriviErrore(elemErrors,iid) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    /*for (var i = 0; i < elemErrors.length; i++){
        $(input[id=$iid]>ul.error>li).each(function(){
            if(this.alt == elemErrors[i]){
                return;
            }
        })
    }*/

    /*$(input[id=$iid]>ul.error).remove();*/
    var out = '<ul class="error">';
    for (var i = 0; i < elemErrors.length; i++) {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul>';
    return out;
}


function validaCampo(id, actionUrl, formId) {

    var formElems;

    function addFormToken() {
        var tokenVal = $("#" + formId + " input[name=_token]").val();
        formElems.append('_token', tokenVal);
    }


    function sendAjaxReq() {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formElems,    //l'informazione da inviare al server
            dataType: "json",
            error: function (risposta) {    //associa alla proprietà error una funzione di callback da attivare se la risposta è di tipo errore
                if (risposta.status === 422) {     //codice errore validazione
                    var errorMessage = JSON.parse(risposta.responseText);
                    $("#" + id).parent().find('.errors').html(' ');     //cancella i messaggi per l'elemento validato
                    $("#" + id).after(scriviErrore(errorMessage[id],id));   //estrae da tutti i messaggi di errore quelli associati all'elemento
                }
            },
            contentType: false,     //lascia l' enctype=multipart/form-Data
            processData: false      //non formatta in modo diverso la struttura del dato
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");

    if (elem.attr('type') === 'file') {     // elemento input 'type=file' valorizzato
        if (elem.val() !== '')
            inputVal = elem.get(0).files[0];        //recupera ciò che è valorizzato
        else
            inputVal = new File([""], "");  //assegna la proprietà ma vuota
    } 
    else
        inputVal = elem.val();

    formElems = new FormData();
    formElems.append(id, inputVal);
    addFormToken();
    sendAjaxReq();

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
                var errorMessage = JSON.parse(data.responseText);
                $.each(errorMessage, function (id) {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(scriviErrore(errorMessage[id]));
                });
            }
        },
        success: function (data) {
            window.location.replace(data.redirect);     /** Redirige in base a cosa è memorizzato nell'oggetto json del response object del metodo (invocato POST)*/ 
        },
        contentType: false,
        processData: false
    });
}
