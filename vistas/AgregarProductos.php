<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
}
 ?>
 <html>
 <head>
   <title>Boutique Allen:. Panel Administrador</title>
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="icon" href="/img/allen.png"/>
   <link rel="stylesheet" href="/css/admin.css" type="text/css"/>
   <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
   <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
   <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
   <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
 </head>
 <body>
     <header>
       <?php
       include 'header.php';
       ?>
     </header>
     <section class="container">
       <?php
         include 'aside.php';
       ?>
       <section class="main">
         <h1>Agregar un Nuevo Producto</h1>
         <form method="post" action="../controlador/altaproducto.php" enctype="multipart/form-data">
           <div class="registro">
             <div class="form">
               <label>Nombre del producto:</label>
               <input type="text" name="nombre" placeholder="Nombre del producto"><br><br>
               <label>Descripci&oacute;n:</label>
               <input type="text" name="descripcion" placeholder="Escriba una descripcion"><br><br>
               <label>Precio:</label>
               <input type="text" name="precio" placeholder="Introduzca su precio"><br><br>
               <label>Cantidad de productos:</label>
               <input type="number" name="cantidad" value="1" style="width:60px;"><br><br>
               <label>Imagen:</label>
               <input name="file" type="file">
             </div>
             <div class="form">
               <label>Sexo:</label>
               Femenino
               <input type="radio" name="rbSexo" value="Mujer" onClick="opcion(1);"/>
               Masculino
              <input type="radio" name="rbSexo" value="Hombre" onClick="opcion(2);"/>
              Ni&ntilde;os
              <input type="radio" name="rbSexo" value="Niño" onClick="opcion(3);"/><br><br>
               <label>Tipo de producto:</label>
               <select class="" name="tipo">
                 <option id="opcion0">Escoja una opcion</option>
                 <option style="display:none;" id="opcion1"></option>
                 <option style="display:none;" id="opcion2"></option>
                 <option style="display:none;" id="opcion3"></option>
                 <option style="display:none;" id="opcion4"></option>
                 <option style="display:none;" id="opcion5"></option>
                 <option style="display:none;" id="opcion6"></option>
                 <option style="display:none;" id="opcion7"></option>
                 <option style="display:none;" id="opcion8"></option>
               </select><br><br>
               <label>Talla:</label>
               <input type="text" name="talla" placeholder="Ingrese la talla"><br><br>
               <label>Color:</label>
               <input type="text" name="color" placeholder="Ingrese el color"><br><br>
             </div>
           </div>
              <input type="submit" name="accion" value="Agregar" id="boton">
              <?php
              if(isset($_GET['ok'])){
                echo '<br><center><h4>Registro exitoso</h4></center>';
              }else if(isset($_GET['error'])){
                echo '<br><center><h4>Faltan datos</h4></center>';
              }
               ?>
         </form>
       </section>
       <script src="/js/jquery-1.9.1.min.js"></script>
      <script src="/js/tipos.js"></script>
   </section>
 </body>
 </html>
