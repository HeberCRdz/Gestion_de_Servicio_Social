function evaluarNumeroEntero(evt){
    var keyCode = (evt.which) ? evt.which : evt.keyCode;

    if(keyCode >= 48 && keyCode <= 57)
    {
        return true;
    }
    return false;
}

function evaluarNumeroDecimal(evt){
    var keyCode = (evt.which) ? evt.which : evt.keyCode;

    if(keyCode == 46){
        if(evt.target.value.includes(".")){
            return false;
        }
        return true;
    }

    if(keyCode >= 48 && keyCode <= 57)
    {
        return true;
    }
    return false;
}
