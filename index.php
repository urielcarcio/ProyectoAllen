<?php
session_start();
 ?>
<html lang="es">
  <head>
    <title>Boutique Allen:. Inicio</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <link rel="icon" href="img/allen.png"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/fuentes.css" type="text/css"/>
    <link rel="stylesheet" href="css/icons.css" type="text/css"/>
    <link rel="stylesheet" href="css/Animate.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css"/>
    <link rel="stylesheet" href="css/slide.css">
    <style>
      .main{
        width: 75%;
      }
      .menu_bar {
      display: none;
    }
    /*Articulo */
    @media screen and (max-width:1020px){
      #contenedor{
        width: 100%;
        padding:0px;
        margin: 0px;
      }
      #contenedor .main{
        width: 100%;

     }
    #contenedor .main .dos{
      width: 100%;
      height: auto;
      margin: 5px;
      padding: 0px;
    }
    #contenedor .main  .dos article h2{
      font-size: large;
    }
    #contenedor .main  .dos article p{
    font-size: x-small;
    }
    #contenedor .main  .dos article {
    padding: 15px;
    }

    #contenedor .main .container  {
      display: none;
    }
    /* Aside1 */
    #contenedor aside {
        width: 90%;
        height: auto;
        margin : 15px;
        padding: 5px;

      }
      #contenedor aside  h1{
        font-size: x-large;
      }
      #contenedor aside  h2{
      font-size: x-small;
      }
      #contenedor aside .pago {
      width: 100%;
      height: 200;
      }
      header .quita  {
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
    <div id="contenedor">
    <?php
      include $_SERVER['DOCUMENT_ROOT'].'/vistas/aside1.php';
     ?>
    <section class="main">
      <article class="container">
         <div class="slidesjs-wraper">
            <div class="slides">
                <img src="/img/Allen3.jpeg" />
                <img src="/img/Allen4.jpeg" />
                <img src="/img/Allen1.jpeg" />
                <img src="/img/Allen2.jpeg" />
            </div>
        </div>
        <script src="/js/jquery-1.9.1.min.js"></script>
        <script src="/js/jquery.slides.js"></script>
        <script>
           $(function() {
           $(".slides").slidesjs({
             play: {
             active: true,
             auto: true,
             interval: 4000,
             swap: true
                       }
                  });
              });
        </script>
      </article>
      <section class="dos">
        <article>
          <h2>Mision</h2>
          <p>Atender las necesidades de moda y del vestir de la sociedad, proporcionando a sus clientes productos de calidad, a sus accionistas una rentabilidad creciente y sostenible y a sus empleados la posibilidad de desarrollar sus competencias profesionales.</p>
        </article>
        <article>
          <h2>Visi&oacute;n</h2>
          <p>Ser una empresa de referencia, líder en distribución de moda, en continuo crecimiento, con presencia en el mercado, que se distinga por proporcionar una calidad de atención y servicio excelente a sus clientes.</p>
        </article>
      </section>

    </section>
   </div>
    <?php  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php'; ?>
  </body>
</html>
