<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/modelo/ObtProducto.php';
 ?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Boutique Allen :. Productos</title>
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
    <style>
    .main{
      width: 75%;
    }
    .menu_bar {
      display: none;
    }
    @media screen and (max-width:1020px){
      header .quita {
      display: none;
    }
  }
    </style>
</head>
  <body>
    <header>
      <?php
      include $_SERVER['DOCUMENT_ROOT'].'/vistas/header.php';
      include $_SERVER['DOCUMENT_ROOT'].'/vistas/menu.php';
       ?>
    </header>

  <section class="main">
    <?php
    if(!empty($_GET["tipo"]) && !empty($_GET["sexo"])){
      $ObtPro=new ObtProductos();
      if($ObtPro->ObtenerTodos()){
        if(isset($_SESSION["producto"])){
          $productos=$_SESSION["producto"];
          for ($i=0; $i <count($productos) ; $i++) {
            if($productos[$i]['cantidad']!=0){
            if($_GET['sexo']=="men"){
              if($_GET['tipo']=="pantalon" && $productos[$i]['sexo']=="Hombre" && $productos[$i]['tipo']=="Pantalon"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="camisa" && $productos[$i]['sexo']=="Hombre" && ($productos[$i]['tipo']=="Camisa" || $productos[$i]['tipo']=="Blusa")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="interior" && $productos[$i]['sexo']=="Hombre" && ($productos[$i]['tipo']=="Calcetin" || $productos[$i]['tipo']=="Calzon")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="Tennis" && $productos[$i]['sexo']=="Hombre" && $productos[$i]['tipo']=="Tennis"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="sweater" && $productos[$i]['sexo']=="Hombre" && $productos[$i]['tipo']=="Sweater"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="short" && $productos[$i]['sexo']=="Hombre" && ($productos[$i]['tipo']=="ShortBermuda" || $productos[$i]['tipo']=="Short")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="gorra" && $productos[$i]['sexo']=="Hombre" && $productos[$i]['tipo']=="Gorra"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="cartera" && $productos[$i]['sexo']=="Hombre" && $productos[$i]['tipo']=="Billetera")
                imprimir($productos,$i);
            }else if($_GET['sexo']=="woman"){
              if($_GET['tipo']=="camisa" && $productos[$i]['sexo']=="Mujer" && ($productos[$i]['tipo']=="Camisa" || $productos[$i]['tipo']=="Blusa")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="short" && $productos[$i]['sexo']=="Mujer" && ($productos[$i]['tipo']=="ShortBermuda" || $productos[$i]['tipo']=="Short")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="chamarra" && $productos[$i]['sexo']=="Mujer" && ($productos[$i]['tipo']=="Chamarra" || $productos[$i]['tipo']=="Sudadera")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="bolso" && $productos[$i]['sexo']=="Mujer" && $productos[$i]['tipo']=="Bolsa"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="legging" && $productos[$i]['sexo']=="Mujer" && $productos[$i]['tipo']=="Legging"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="falda" && $productos[$i]['sexo']=="Mujer" && ($productos[$i]['tipo']=="Falda" || $productos[$i]['tipo']=="Vestido")){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="locion" && $productos[$i]['sexo']=="Mujer" && $productos[$i]['tipo']=="Locion"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="malla" && $productos[$i]['sexo']=="Mujer" && ($productos[$i]['tipo']=="Mallas" || $productos[$i]['tipo']=="Mayas")){
                imprimir($productos,$i);
              }
            }else if($_GET['sexo']=="children"){
              if($_GET['tipo']=="camisa" && $productos[$i]['sexo']=="Niño" && $productos[$i]['tipo']=="Blusa"){
                imprimir($productos,$i);
              }else if($_GET['tipo']=="pijama" && $productos[$i]['sexo']=="Niño" && $productos[$i]['tipo']=="Pijama"){
                imprimir($productos,$i);
              }
            }
          }
          }
        }
      }
    }else{
      header ("Location: ../index.php");
    }
     ?>
  </section>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
  <?php
  function imprimir($productos,$i){
    ?>
    <article class="categoria1">
      <div class="articulo">
        <a href="DetalleProdu.php?id=<?php echo $productos[$i]['id']; ?>"><img src="<?php echo $productos[$i]['img'];?>" /></a>
      </div>
      <h3><a href="DetalleProdu.php?id=<?php echo $productos[$i]['id']; ?>"><?php echo $productos[$i]['producto'];?></a></h3>
      <p>Color: <?php echo $productos[$i]['color'];?></p>
      <p>Precio: $<?php echo $productos[$i]['precio'];?> MX</p>
    </article>
    <?php
  }
   ?>
</html>
