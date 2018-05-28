<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: login.php");
}
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

      </section>
    </section>
  </body>
</html>
