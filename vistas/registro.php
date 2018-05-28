<?php session_start(); ?>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Boutique Allen :. Registrar usuario</title>
        <link rel="icon" href="/img/allen.png"/>
        <link rel="stylesheet" href="/css/style.css" type="text/css"/>
        <link rel="stylesheet" href="/css/menu.css" type="text/css"/>
        <link rel="stylesheet" href="/css/fuentes.css" type="text/css"/>
        <link rel="stylesheet" href="/css/icons.css" type="text/css"/>
        <script src="/js/validaciones.js"></script>
        <style>
          .main{
            width: 100%;
          }
          .menu_bar {
            display: none;
          }
          @media screen and (max-width:1020px){

          .main .registro{
            width: 90%;
            margin: 5px;
            padding: 0;
          }
          .main .registro .form{
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
          <form method="post" class="registro">
            <div class="form">
              <label>Nombre:</label>
              <input type="text" name="nombre" placeholder="ingrese su nombre" onkeypress="nombres();" class="registro2"/><br><br>
              <label>Apellidos:</label>
              <input type="text" name="apellidos" placeholder="ingrese sus apellidos" onkeypress="nombres();" class="registro2"/><br><br>
              <label>Direcci&oacute;n:</label>
              <input type="text" name="dir" placeholder="Su direccion" class="registro2"/><br><br>
              <label>Fecha de nacimiento:</label>
              <input type="text" maxlength="10" placeholder="aaaa-mm-dd" class="registro2" name="txtfecha" onkeyup="fecha(txtfecha);" id="fecha1" /><br><br>
              <label>Telefono:</label>
              <input type="text" name="cel" placeholder="Telefono" class="registro2" onkeypress="numeros();"/><br>
            </div>
            <div class="form">
              <label>Correo electronico:</label>
              <input type="email" name="email" id="e-mail" onkeyup="correo(email,'e-mail');" class="registro2" /><br><br>
              <label>Cuenta PayPal:</label>
              <input type="email" name="pago" id="e-mail1" onkeyup="correo(pago,'e-mail1');" class="registro2" /><br><br>
              <label>Contrase&ntilde;a:</label>
              <input type="password" name="pass1" placeholder="contraseña" class="registro2"/><br><br>
              <label>Confirmar contrase&ntilde;a:</label>
              <input type="password" name="pass2" placeholder="contraseña" class="registro2"/><br><br>
            </div><br>
            <br><br><div class="" style="width:100%;">
              <?php
              if(isset($_POST['registrarme']))
                require($_SERVER['DOCUMENT_ROOT']."/controlador/validarCampos.php");
              ?>
            </div><br>
            <input type="submit" name="registrarme" value="Registrar" id="boton"/><br><br>
          </form>
        </section>
        <?php
          include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
        ?>
    </body>
</html>
