var inicio=function () {
  $("#formulario").submit(function(evento){
    $.get('./correo.php',function(e){
      //alert("");
    }).fail(function(){
        evento.preventDefault();
    });
  });

}
$(document).on('ready',inicio);
