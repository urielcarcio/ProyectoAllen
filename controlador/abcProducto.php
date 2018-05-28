<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: ../vistas/login.php");
}
include_once("../modelo/ObtProducto.php");
$ObtP=new ObtProductos();
$bCampoEditable = false; $bLlaveEditable=false;
$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Borrar";
if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
  isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
  $sOpe = $_POST["txtOpe"];
  $sCve = $_POST["txtClave"];
  if ($sOpe != 'a'){

    try{
      if (!$ObtP->buscar($sCve)){
        $sError = "Personal Hospitalario no existe";
      }
    }catch(Exception $e){
      error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
      $sErr = "Error en base de datos, comunicarse con el administrador";
    }
  }
  if ($sOpe == 'a'){
    $bCampoEditable = true;
    $bLlaveEditable = true;
    $sNomBoton ="Agregar";
  }
  else if ($sOpe == 'm'){
    $bCampoEditable = true; //la llave no es editable por omisión
    $sNomBoton ="Modificar";
  }
  //Si fue borrado, nada es editable y es el valor por omisión
}
$pro=$_SESSION['producto'];
 ?>
<html lang="es">
  <head>
    <title>Boutique Allen:. Panel Administrador</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <style>
    .main{
      padding-top: 30px;
    }
      .registro{
        margin: auto;
        width: 80%;
      }
    </style>
  </head>
  <body>
    <header>
      <?php
      include $_SERVER['DOCUMENT_ROOT'].'/vistas/header.php';
      ?>
    </header>
    <section class="container">
      <?php
        include $_SERVER['DOCUMENT_ROOT'].'/vistas/aside.php';
      ?>
      <section class="main">
        <form method="get" action="/controlador/resABC.php" name="abcPH">
          <h1>Producto a <?php echo $sNomBoton;?></h1>
          <input type="hidden" name="txtOpe" value="<?php echo $sOpe;?>">
  				<input type="hidden" name="txtClave" value="<?php echo $sCve;?>"/>
          <div class="registro">
            <div class="form">
              clave
              <input type="text" name="id1" value="<?php echo $pro[0]['id'];?>" <?php echo ($bCampoEditable==true?'':' disabled ');?>/>
      				<br/><br/>
      				Nombre
      				<input type="text" name="producto" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['pro'];?>"/>
      				<br/><br/>
      				Descripcion:
      				<input type="text" name="descri" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['des'];?>"/>
      				<br/><br/>
              Tipo
      				<select name="tipo" <?php echo ($bCampoEditable==true?'':' disabled ');?>>
                <option id="opcion1"><?php echo $pro[0]['tipo'];?></option>
                <option style="display:none;" id="opcion0">Escoja una opcion</option>
                <option style="display:none;" id="opcion2"></option>
                <option style="display:none;" id="opcion3"></option>
                <option style="display:none;" id="opcion4"></option>
                <option style="display:none;" id="opcion5"></option>
                <option style="display:none;" id="opcion6"></option>
                <option style="display:none;" id="opcion7"></option>
                <option style="display:none;" id="opcion8"></option>
      				</select>
      				<br/><br/>
              Talla
              <input type="text" name="talla" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['talla'];?>"/>
      				<br/><br/>
            </div>
            <div class="form">
              Precio
      				<input type="text" name="precio" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['pre'];?>"/>
      				<br/><br/>
      				Cantidad
      				<input type="text" name="cantidad" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['can'];?>"/>
      				<br/><br/>
      				Sexo
      				<input type="radio" name="sexo" value="Mujer" onClick="opcion(1);"
      					<?php echo ($bCampoEditable==true?'':' disabled ');?> <?php echo ($pro[0]['sexo']=='Mujer'?'checked="true"':'');?>/>Mujer
      				<input type="radio" name="sexo" value="Hombre" onClick="opcion(2);"
      					<?php echo ($bCampoEditable==true?'':' disabled ');?> <?php echo ($pro[0]['sexo']=='Hombre'?'checked="true"':'');?>/>Hombre
              <input type="radio" name="sexo" value="Niño" onClick="opcion(3);"
        				<?php echo ($bCampoEditable==true?'':' disabled ');?> <?php echo ($pro[0]['sexo']=='Niño'?'checked="true"':'');?>/>Niño
      				<br/><br/>
              Color
              <input type="text" name="color" <?php echo ($bCampoEditable==true?'':' disabled ');?> value="<?php echo $pro[0]['color'];?>"/>
      				<br/><br/>
            </div>
          </div>
  				<input class="boton" type ="submit" value="<?php echo $sNomBoton;?>"/>
  				<input class="boton" type="submit" name="Submit" value="Cancelar" onClick="abcPH.action='../vistas/tabProductos.php';">
           <div style="width:100px;height:10px;clear: both;"></div>
  			</form>
        <script src="/js/tipos.js"></script>
      </section>
    </section>
  </body>
</html>
