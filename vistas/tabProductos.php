<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
}
include_once($_SERVER['DOCUMENT_ROOT'].'/modelo/ObtProducto.php');
$ObtP=new ObtProductos();
$ObtP->ObtenerTodos();
if(isset($_GET['n']) && $_GET['n']>0)
  $n=$_GET['n'];
else
  $n=0;
$productos = $_SESSION['producto'];
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
      #boton{
        display: inline-flex;
        padding:2px 4px;
        font-size: 20px;
      }
      #img a{
        color:#3498DB;
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
        <h1>Lista de productos</h1>
        <form id="form" name="formTablaGral" method="post" action="/controlador/abcProducto.php">
  				<input type="hidden" name="txtClave">
  				<input type="hidden" name="txtOpe">
          <?php
          $s=count($productos);
            ?>
  				<table >
            <tr>
  						<th>Clave</th>
  						<th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Talla</th>
              <th>Color</th>
              <th>Genero</th>
              <th>Imagen</th>
  						<th>Operaci&oacute;n</th>
  					</tr>
            <?php
             for ($i=$n; $i < 20+$n ; $i++) {
               if(isset($productos[$i]['id'])){
               ?>
               <tr>
     						<td><?php echo $productos[$i]['id'];?></td>
     						<td><?php echo $productos[$i]['producto'];?></td>
                 <td>$<?php echo $productos[$i]['precio'];?> MXN</td>
                 <td><?php echo $productos[$i]['cantidad'];?></td>
                 <td><?php echo $productos[$i]['talla'];?></td>
                 <td><?php echo $productos[$i]['color'];?></td>
                 <td><?php echo $productos[$i]['sexo'];?></td>
                 <td id="img"><a href="<?php echo $productos[$i]['img'];?>" target="_blank">Dar clic</a></td>
                 <td>
     							<input id="boton" type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $productos[$i]['id'];?>; txtOpe.value='m'">
     							<input id="boton" type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $productos[$i]['id'];?>; txtOpe.value='b'">
     						</td>
     					</tr>
              <?php
               }
             }
             ?>
          </table>
          <a  class="boton icon-arrow-right2" href="tabproductos.php?n=<?php echo $n=(($n=$n+20)<$s)? $n:$n=$n-20 ;?>"></a>
          <a class="boton icon-arrow-left2" href="tabproductos.php?n=<?php echo $n=(($n=$n-40)>=0)? $n:$n=$n+20 ;?>"></a>
          <div style="width:100px;height:10px;clear: both;"></div>
        </form>
      </section>
    </section>
  </body>
</html>
