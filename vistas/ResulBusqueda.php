<?php
session_start();
 ?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Boutique Allen :. Categoria hombres</title>
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
    <style>
    .main{
      width: 68%;
    }
    .main h1{
      display: block;
      font-family:letra4;
      font-size:28px;
      font-weight: 100;
      margin: auto;
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
         include 'header.php';
         include 'menu.php';
       ?>
    </header>

  <section class="main">
    <?php
     if(isset($_SESSION["busqueda"])){
       if(isset($_GET['error'])){
         echo "<h1>No hubo coincidencias</h1>";
       }else{
       $productos=$_SESSION["busqueda"];
       for ($i=0; $i < count($productos) ; $i++) {
         ?>
         <article class="categoria1">
           <div class="articulo">
             <a href="/vistas/DetalleProdu.php?id=<?php echo $productos[$i]['id']; ?>"><img src="<?php echo $productos[$i]['img'];?>" /></a>
           </div>
           <h3><a href="/vistas/DetalleProdu.php?id=<?php echo $productos[$i]['id']; ?>"><?php echo $productos[$i]['producto'];?></a></h3>
           <p>Sexo: <?php echo $productos[$i]['sexo'];?></p>
           <p>Color: <?php echo $productos[$i]['color'];?></p>
           <p>Precio: $<?php echo $productos[$i]['precio'];?> MX</p>
         </article>
         <?php
       }
     }
   }elseif (isset($_GET['error'])){
     echo "<h1>No hubo coincidencias</h1>";
   }else{
       ?>
       <h1>Debes ingresar algo a buscar</h1>
       <?php
     }
     ?>
  </section>
  <?php
  include 'pie.php';
   ?>
  </body>
</html>
