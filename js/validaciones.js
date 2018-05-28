function nombres() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}


function numeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57))
  event.returnValue = false;
}

function fecha(campo){
    if (campo.value.match(/^\d{4}\-\d{2}\-\d{2}$/) ){
       document.getElementById("fecha1").style.border = "solid 1px #03a9f4";
      // return true;
    }else{
       document.getElementById("fecha1").style.border = "solid 1px #f40202";
       //return false;
    }
}

function correo(campo,id){
    if (campo.value.match(/^[a-zA-z0-9]+@[a-zA-z0-9]+.[a-z]+$/) )
       document.getElementById(id).style.border = "solid 1px #03a9f4";
    else
       document.getElementById(id).style.border = "solid 1px #f40202";
}
