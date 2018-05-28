<?php
session_start();
if(isset($_SESSION['usuario'])){
  if(!isset($_SESSION['carrito']))
     header("Location: ../vistas/historial.php");
}else{
  header("Location: ../vistas/login.php?Error=Acceso denegado");
}
 ?>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Boutique Allen :. Carrito de compras</title>
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>

    <style>
    .menu_bar {
  display: none;
}
    .main{
      position: relative;
      width: 75%;
      background: #FBFCFC;
      margin: 60px auto;
      box-shadow: 0px 0px 5px 1px rgb(0,0,0);
      border-radius: 5px;
      padding-bottom: 70px;
      min-height: 270px;
    }
    table{
      margin: auto;
      border-collapse: collapse;
    }
    table th, table td{
      text-align: center;
      padding: 8px;
      width: 100px;
      box-sizing:border-box;
    }
    #descrip{
      width: 200px;
    }
    th{
      border-bottom:solid 2px rgb(68, 69, 70);
    }
    fieldset{
      padding:15px;
      box-sizing:border-box;"
      display: block;
      margin:20px auto;
      width: 95%;
    }
    #boton{
      position: absolute;
      right: 60px;
      bottom: 10px;
      display: inline-block;
      margin: 10px auto;
    }
    #boton a{
      text-align: center;
      color: rgb(247, 252, 254);
      text-decoration: none;
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
    $aux=0;
       $datos=$_SESSION['carrito'];
    ?>
       <fieldset>
         <legend>Productos a pagar</legend>
       <table>
         <tr>
           <th>Producto</th>
           <th id="descrip">Descripcion</th>
           <th>Cantidad</th>
           <th>Precio</th>
           <th>Talla</th>
           <th>Color</th>
           <th>Sub total</th>
         </tr>
       <?php
       for($i=0;$i<count($datos);$i++){
         if(isset($datos[$i]) && $datos[$i]['elementos']!=0){
       ?>
            <tr>
              <td><p><?php echo $datos[$i]['nombre'];?></p></td>
              <td id="descrip"><p><?php echo $datos[$i]['descri'];?></p></td>
              <td><p><?php echo $datos[$i]['elementos'];?></td>
              <td><p>$ <?php echo $datos[$i]['precio'];?> MX</p></td>
              <td><p><?php echo $datos[$i]['talla'];?></p></td>
              <td><p><?php echo $datos[$i]['color'];?></p></td>
              <td>$
                <?php
                $total=$datos[$i]['precio']*$datos[$i]['elementos'];
                $aux=$total+$aux;
                echo $total;
                ?> MX
              </td>
            </tr>
         <?php
          }
       }  ?>
             </table>
             <center><h2>Total a pagar: $<?php echo $aux;?> MX</h2></center>
           </fieldset>
           <fieldset>
             <legend>Datos para entrega personal</legend>
             <br><p>* Presente identificacion para recoger su producto</p>
             <?php
             $datos=$_SESSION['usuario'];
              ?>
             <table>
                       <tr>
                           <td>Nombre:</td>
                           <td><?php echo $datos[0]['nombre'];?></td>
                       </tr>
                       <tr>
                           <td>Apellidos:</td>
                           <td><?php echo $datos[0]['apellidos'];?></td>
                       </tr>
                       <tr>
                           <td>Correo electronico:</td>
                           <td><?php echo $datos[0]['email'];?></td>
                       </tr>
          </table>
           </fieldset>
           <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="upload" value="1">
              <input type="hidden" name="business" value="pelicanoe419@gmail.com">
              <input type="hidden" name="currency_code" value="MXN">
                <?php
                //https://www.paypal.com/cgi-bin/webscr
                $datos=$_SESSION['carrito'];
                   for($i=0;$i<count($datos);$i++){
                ?>
               <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['nombre'];?>">
           	<input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['precio'];?>">
               <input	type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['elementos'];?>">
                    <?php
           	         }
                    ?>
                    <input type="submit" value="Comprar" id="boton">
              </form>
  </section>
  <script src="/js/jquery-1.9.1.min.js"></script>
  <script src="/js/notificaciones.js"></script>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
</html>
