<?php
session_start();
$sOpe =$_POST["txtOpe"];
$id =$_POST["txtClave"];
$datos=$_SESSION['carrito'];
for($i=0;$i<count($datos);$i++){
  if($datos[$i]['id']==$id){
    $n=$datos[$i]['cantidad'];
    if($sOpe=="m"){
          if($datos[$i]['elementos']+1<$n){
            $datos[$i]['elementos']=$datos[$i]['elementos']+1;
          }else{
            $datos[$i]['elementos']=$n;
          }
    }else if($sOpe=="r"){
      if($datos[$i]['elementos']>0){
          $datos[$i]['elementos']=$datos[$i]['elementos']-1;
      }else {
          $datos[$i]['elementos']=0;
      }
    }else{
          unset($datos[$i]);
          $datos = array_values($datos);
    }
  }
}
$_SESSION['carrito']=$datos;
header ('Location: ../vistas/listacompras.php');
?>
