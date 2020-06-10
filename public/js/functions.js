function scriviErrore(elemErrors) {
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    var out = '<ul class="errore">';
   
    for (var i = 0; i < elemErrors.length; i++) 
        out += '<li>' + elemErrors[i] + '</li>';

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
            data: formElems,
            dataType: "json",
            error: function (data) {
                if (data.status === 422) {
                    var errMsgs = JSON.parse(data.responseText);
                    $("#" + id).next().find("li").parent().remove();
                    $("#" + id).after(scriviErrore(errMsgs[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var elem = $("#" + formId + " :input[name=" + id + "]");
    if (elem.attr('type') === 'file') {
    // elemento di input type=file valorizzato
        if (elem.val() !== '')
            inputVal = elem.get(0).files[0];
        else
            inputVal = new File([""], "");
    }
    else 
        // elemento di input type != file
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

function stampaDesc(testo){
    var out = '<div class="">';
   
    for (var i = 0; i < elemErrors.length; i++) 
        out += '<li>' + elemErrors[i] + '</li>';

    out += '</ul>';
    return out;
}

function getDescEstesa(/*idProdotto,*/rotta){
    
    $.ajax({
        type: 'POST',
        url: rotta,
        data:{ _method: 'PUT',
            idProdotto : idProdotto,
        },
        dataType: "json",
        headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

        success: function (data) {
            var descrizione = JSON.parse(data.responseText);
            $("div.paginator").after("<p>PROVA</p>");
        },
        error: function (data) {
            if (data.status === 500) {
                var descrizione = JSON.parse(data.responseText);
                    $("div.paginator").after("<p>"+data.responseText+"</p>");

            }
        },
        contentType: false,
        processData: false
    });

}


