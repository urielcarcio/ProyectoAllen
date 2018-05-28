<?php
  session_start();
  include '../modelo/ObtProducto.php';
  $ObtPro=new ObtProductos();
  $ObtPro->ObtenerTodos();
  $palabra=$_POST['clave'];
  $pa=explode(" ",$palabra);
  $num=count($pa);
  $Encontro=null;
  $productos=$_SESSION['producto'];
  for ($i=0; $i < $num; $i++) {
    $aux=null;
    $n=0;
    for ($j=0; $j < count($productos); $j++) {
      if(($pa[$i]=="dama" || $pa[$i]=="mujer" || $pa[$i]=="damas" || $pa[$i]=="mujeres") && ($productos[$j]['sexo']=="Mujer")){
        $aux[$n]=$productos[$j];
        if($num==1)
          $Encontro[$i]=true;
        else
          $Encontro[$i]=false;
        $n++;
      }else if(($pa[$i]=="caballero" || $pa[$i]=="caballeros" || $pa[$i]=="hombre" || $pa[$i]=="hombres") && ($productos[$j]['sexo']=="Hombre")){
        $aux[$n]=$productos[$j];
        if($num==1)
          $Encontro[$i]=true;
        else
          $Encontro[$i]=false;
        $n++;
      }else if(($pa[$i]=="niño" || $pa[$i]=="niños") && ($productos[$j]['sexo']=="Niño")){
        $aux[$n]=$productos[$j];
        if($num==1)
          $Encontro[$i]=true;
        else
          $Encontro[$i]=false;
        $n++;
      }else if(($pa[$i]=="niña" || $pa[$i]=="niñas") && ($productos[$j]['sexo']=="Niña")){
        $aux[$n]=$productos[$j];
        if($num==1)
          $Encontro[$i]=true;
        else
          $Encontro[$i]=false;
        $n++;
      }else if(($pa[$i]=="blusa"|| $pa[$i]=="camisa" || $pa[$i]=="blusas" || $pa[$i]=="camisas") && ($productos[$j]['tipo']=="Blusa" || $productos[$j]['tipo']=="Camisa")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="bolsa" || $pa[$i]=="bolsas" || $pa[$i]=="bolsos" || $pa[$i]=="bolso") && ($productos[$j]['tipo']=="Bolsa")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="chamarra" || $pa[$i]=="chamarras") && ($productos[$j]['tipo']=="Chamarra")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="sudadera" || $pa[$i]=="sudaderas") && ($productos[$j]['tipo']=="Sudadera")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="falda" || $pa[$i]=="faldas") && ($productos[$j]['tipo']=="Falda")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="vestido" || $pa[$i]=="vestidos") && ($productos[$j]['tipo']=="Vestido")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="legging" || $pa[$i]=="leggings") && ($productos[$j]['tipo']=="Legging")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="locion" || $pa[$i]=="lociones") && ($productos[$j]['tipo']=="Locion")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="mallas" || $pa[$i]=="malla") && ($productos[$j]['tipo']=="Mallas")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="short" || $pa[$i]=="shorts") && ($productos[$j]['tipo']=="Short" || $productos[$j]['tipo']=="ShortBermuda")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="bleizer" || $pa[$i]=="bleizers") && ($productos[$j]['tipo']=="Bleizer")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="calcetines" || $pa[$i]=="calcetin") && ($productos[$j]['tipo']=="Calcetin")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="calzon" || $pa[$i]=="calzones") && ($productos[$j]['tipo']=="Calzon")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="gorra" || $pa[$i]=="gorras") && ($productos[$j]['tipo']=="Gorra")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="jumper" || $pa[$i]=="jumpers") && ($productos[$j]['tipo']=="Jumper")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="pantalon" || $pa[$i]=="pantalones") && ($productos[$j]['tipo']=="Pantalon")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="sweater" || $pa[$i]=="sweaters") && ($productos[$j]['tipo']=="Sweater")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }else if(($pa[$i]=="pijama" || $pa[$i]=="pijamas") && ($productos[$j]['tipo']=="Pijama")){
        $aux[$n]=$productos[$j];
        $Encontro[$i]=true;
        $n++;
      }
      if(($j==(count($productos)-1) ) && empty($aux)){
        $Encontro[$i]=false;
        $aux=$productos;
      }
    }
    unset($productos);
    $productos=$aux;
    unset($aux);
  }

if(ValidarArray($Encontro)){
  $_SESSION['busqueda']=$productos;
  header("Location: ../vistas/ResulBusqueda.php");
}else{
  header("Location: ../vistas/ResulBusqueda.php?error=no coincidencias");
}

  function ValidarArray($array){
    $nu=count($array);
    echo $nu;
    $n=0;
    $ban=true;
    for ($i=0; $i < count($array) ; $i++) {
      if(!$array[$i]){
        $n++;
      }
      if($n == $nu )
        $ban=false;
    }
    return $ban;
  }
?>
