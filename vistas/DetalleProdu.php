<?php
 session_start();
 ?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Boutique Allen :. Detalles Producto</title>
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
    <style>

  .menu_bar {
    display: none;
  }
    .main{
      width: 75%;
      background: #F2F3F4;
      margin: 60px auto;
      box-shadow: 0px 0px 5px 1px rgb(0,0,0);
      border-radius: 5px;
    }
    .imagen{
      width: 250px;
      height: 225px;
      border: 2px solid rgb(184, 205, 98);
    }
    .imagen img{width: 100%;height: 100%;}
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
    #boton a{
      color: rgb(247, 252, 254);
      text-decoration: none;
    }
    @media screen and (max-width:1020px){
    header .quita {
    display: none;
  }
  .main .imagen img{
    width: 100%;
    max-height: 225px;
    height: auto;
  }
  .main .tabla1 {
    width: 100%;
    height: auto;
    margin top : 30px;
    padding: 0px;
  }
  .main .tabla1 th,td{
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
    if(isset($_SESSION["producto"])){
      $productos=$_SESSION["producto"];
        for($f=0;$f<count($productos);$f++){
          if($productos[$f]['id']==$_GET['id']){
         ?>
         <div class="imagen">
           <img src="<?php echo $productos[$f]['img'];?>" />
         </div>
         <table class="tabla1">
           <tr>
             <th>Producto</th>
             <th id="descrip">Descripcion</th>
             <th>Precio</th>
             <th>Talla</th>
             <th>Color</th>
           </tr>
           <tr>
             <td><p><?php echo $productos[$f]['producto'];?></p></td>
             <td id="descrip"><p><?php echo $productos[$f]['desc'];?></p></td>
             <td><p>$ <?php echo $productos[$f]['precio'];?> MX</p></td>
             <td><p><?php echo $productos[$f]['talla'];?></p></td>
             <td><p><?php echo $productos[$f]['color'];?></p></td>
           </tr>
         </table>
         <h2 id="boton"><a href="listacompras.php?id=<?php echo $productos[$f]['id'];?>">+ A&ntilde;adir a lista compras</a></h2>
  <?php
       }
     }
   }
  ?>
  </section>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
</html>
