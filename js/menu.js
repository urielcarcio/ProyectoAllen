var c=0;
$(document).ready(function(){
  $('.icon-menu').click(function(){
    if(c==1){
      c=0;
      $("#menu2").hide(1000);
    }else{
      c=1;
      $("#menu2").show(1000);
    }
  });

});
window.onload = function() {
  document.onkeyup = muestraInformacion;
  document.onkeypress = muestraInformacion;
  document.onkeydown = muestraInformacion;
}
function muestraInformacion(elEvento) {
  var evento = window.event || elEvento;
 if(evento.keyCode==13){
   if(c==1){
     c=0;
     $("#menu2").hide(1000);
   }else{
     c=1;
     $("#menu2").show(1000);
   }
 }

}
