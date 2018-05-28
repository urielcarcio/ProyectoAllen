<?php
if(isset($_SESSION['producto']) && isset($_GET['id'])){
  $producto=$_SESSION['producto'];
  if(isset($_SESSION['carrito'])){
    $arreglo=$_SESSION['carrito'];
    $encontro=false;
    for ($i=0; $i <count($arreglo) ; $i++) {
      if($_GET['id']==$arreglo[$i]['id']){
        $can=$arreglo[$i]['cantidad'];
        if($arreglo[$i]['elementos']<$can){
           $arreglo[$i]['elementos']=$arreglo[$i]['elementos']+1;
         }else{
           $arreglo[$i]['elementos']=$can;
         }
        $_SESSION['carrito']=$arreglo;
        $encontro=true;
        break;
      }
    }
    if(!$encontro){
      for ($i=0; $i < count($producto); $i++) {
        if($producto[$i]['id']==$_GET['id']){
          $datosnuevos= array('id'=>$_GET['id'],'nombre'=>$producto[$i]['producto'],'precio'=>$producto[$i]['precio'],'descri'=>$producto[$i]['desc'],'cantidad'=>$producto[$i]['cantidad'],
          'talla'=>$producto[$i]['talla'],'color'=>$producto[$i]['color'],'imagen'=>$producto[$i]['img'],'elementos'=>1);
          array_push($arreglo, $datosnuevos);
          $_SESSION['carrito']=$arreglo;
          break;
        }
      }
    }
  }else{
    for($i=0;$i<count($producto);$i++){
      if($producto[$i]['id']==$_GET['id']){
        $arreglo[]= array('id'=>$_GET['id'],'nombre'=>$producto[$i]['producto'],'precio'=>$producto[$i]['precio'],'descri'=>$producto[$i]['desc'],'cantidad'=>$producto[$i]['cantidad'],
        'talla'=>$producto[$i]['talla'],'color'=>$producto[$i]['color'],'imagen'=>$producto[$i]['img'],'elementos'=>1);
        $_SESSION['carrito']=$arreglo;
        break;
      }
    }
  }
}
?>
