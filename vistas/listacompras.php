<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/controlador/carrito.php';
?>
<html>
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
      width: 75%;
      background: #FBFCFC;
      display: block;
      margin: 60px auto;
      box-shadow: 0px 0px 5px 1px rgb(0,0,0);
      border-radius: 5px;
      min-height: 284px;
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
    #boton{width: 80px;}
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
    <form action="/controlador/modificarlista.php" method="post">
      <input type="hidden" name="txtOpe">
      <input type="hidden" name="txtClave">
      <?php
         if(isset($_SESSION['carrito'])){
         $datos=$_SESSION['carrito'];
         if(isset($datos[0]) ){
      ?>
         <table>
           <tr>
             <th></th>
             <th>Producto</th>
             <th id="descrip">Descripcion</th>
             <th>Cantidad</th>
             <th>Precio</th>
             <th>Talla</th>
             <th>Color</th>
             <th class="cdelete"></th>
           </tr>
         <?php
         for($i=0;$i<count($datos);$i++){
           if(isset($datos[$i])){
         ?>
              <tr>
                <td class="articulo"><img src="<?php echo $datos[$i]['imagen'];?>" /></td>
                <td><p><?php echo $datos[$i]['nombre'];?></p></td>
                <td id="descrip"><p><?php echo $datos[$i]['descri'];?></p></td>
                <td>
                  <div id="b">
                    <div class="menos"><input type="Submit" value="-" onClick="txtClave.value=<?php echo $datos[$i]['id'];?>; txtOpe.value='r'"/></div>
                    <p><?php echo $datos[$i]['elementos'];?>
                    <div class="mas"><input type="Submit" value="+" onClick="txtClave.value=<?php echo $datos[$i]['id'];?>; txtOpe.value='m'"/></div>
                  </div>
                </td>
                <td><p>$ <?php echo $datos[$i]['precio'];?> MX</p></td>
                <td><p><?php echo $datos[$i]['talla'];?></p></td>
                <td><p><?php echo $datos[$i]['color'];?> </p></td>
                <td><input class="delete" type="Submit" value=" " onClick="txtClave.value=<?php echo $datos[$i]['id'];?>; txtOpe.value='d'"/></td>
              </tr>
           <?php
            }
         }  ?>
               </table>
               <h2 id="boton"><a href="/controlador/confirLista.php">Comprar</a></h2><?php
             }else
             echo '<center><h3>Est&aacute; vacia tu lista de compras</h3></center>';
      }else
         echo '<center><h3>No has a&ntilde;adido ningun producto</h3></center>';
       ?>
    </form>
  </section>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
</html>
