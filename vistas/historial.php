<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location: login.php?erro=no_has_iniciado_sesion");
}
include $_SERVER['DOCUMENT_ROOT'].'/modelo/ObtProducto.php';
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
    body{
      background:#E5E7E9;
    }
    .main{
      min-height: 410px;
      width: 68%;
    }
    .menu_bar {
      display: none;
    }
    @media screen and (max-width:1020px){
      header .quita {
      display: none;
    }
    .main{
      width: 90%;
      margin: 5px;
      padding: 0;
    }
    .main .compra h2{
      font-size: large;
    }
    .main .compra #articulo1 .articulo1 p{
      font-size: small;
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
    $ObtPro=new conexion();
    $ObtPro->conectar();
    $sQuery="SELECT idCompra,idUsuario,fecha,id_producto,producto,descripcion,precio,catidad,color,talla,img,estado,genero FROM compras
    inner join productos as a on a.id_producto=compras.idProducto and compras.idUsuario=".$usu[0]['id']." ORDER BY fecha DESC";
    $input=$ObtPro->ejecutarConsulta($sQuery);
    $ObtPro->desconectar();
       for ($i=0; $i < count($input) ; $i++) {
         $n=$i;
         $pago=0;
         ?>
         <article class="compra">
         <h2>Estado de compra: <?php echo $input[$n][11]; ?></h2>
         <h2>Fecha de la compra: <?php echo $input[$n][2]; ?></h2>
         <?php
         while($n <count($input) && $input[$i][0]==$input[$n][0]){
           ?>
           <div id="articulo1">
           <div class="articulo">
             <img src=" <?php echo $input[$n][10];?>"/></a>
           </div>
           <div class="articulo1">
           <p>Producto: <?php echo $input[$n][4]; ?></p>
           <p>Sexo: <?php echo $input[$n][12]; ?></p>
           <p>Precio: $<?php echo $input[$n][6]; ?> MXN</p>
           <p>Cantidad: <?php echo $input[$n][7]; ?></p>
           </div>
         </div>
           <?php
           $pago=$pago + ($input[$n][6] * $input[$n][7]);
           $n++;
         }
         ?>
         <div style="width:100px;height:10px;clear: both;"></div>
         <center><p>Total pagado: $<?php echo $pago;?> MXN</p></center>
         <?php
         $i=$n-1;
         ?>
       </article><?php
       }
     ?>
  </section>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
</html>
