<?php session_start(); ?>
<html lang="es">
  <head>
    <title>Boutique Allen:. Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="/img/allen.png"/>
    <link rel="stylesheet" href="/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="/css/Animate.css" type="text/css"/>
    <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
    <style >
.menu_bar {
  display: none;
}
@media screen and (max-width:1020px){
  header .quita {
  display: none;
}
.main .login{
  width: 90%;
  height: auto;
  margin : 15px;
  padding: 5px;

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
          <section class="login">
            <form action="/controlador/verificar.php" method="post">
              <label>Correo electronico:</label><br>
              <input type="e-mail" name="user" placeholder="email" class="input"><br><br>
              <label>Contrase&ntilde;a:</label><br>
              <input type="password" name="password" placeholder="contraseña" class="input"><br><br>
              <?php
              if(isset($_GET['error'])){
                echo '<center><p>E-mail o contraseña invalidos</p></center><br>';
              }
              ?>
              <input type="submit" name="" value="Iniciar" id="boton">
            </form><br><br>
            <a href="registro.php">Crear usuario</a>
          </section>
        </section>
        <?php
        include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
        ?>
    </body>
</html>
