<?php
session_start();
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
    .main{
      width: 68%;
    }
    .menu_bar {
    display: none;
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
    if($_GET['tipo']=="men"){
      ?>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/hp.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=pantalon&sexo=men">Pantalones</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/hc.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=camisa&sexo=men">Camisas</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/hi.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=interior&sexo=men">Ropa Interior</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/hz.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=Tennis&sexo=men">Tennis</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/Sweater hombre.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=sweater&sexo=men">Sweater</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/Short.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=short&sexo=men">Short</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/gorra.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=gorra&sexo=men">Gorras</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/44712A45.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=cartera&sexo=men">Carteras</a></h3>
      </article>
      <?php
    }else if($_GET['tipo']=="woman"){
      ?>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/mc.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=camisa&sexo=woman">Camisas</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/short-mujer.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=short&sexo=woman">Short</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/mu-chamarra.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=chamarra&sexo=woman">Chamaras</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/mu-bolso.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=bolso&sexo=woman">Bolsas</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/mu-Legging.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=legging&sexo=woman">Legging</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/1.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=falda&sexo=woman">Faldas</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/perfumes1.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=locion&sexo=woman">Lociones</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/mu-Legging.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=malla&sexo=woman">Mallas deportivas</a></h3>
      </article>
      <?php
    }else{
      ?>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/hc.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=camisa&sexo=children">Camisas</a></h3>
      </article>
      <article class="categoria">
        <div class="articulo">
          <img src="/img/nic3b1aaa-pijama.png" alt="">
        </div>
        <h3><a href="productos.php?tipo=pijama&sexo=children">Pijama</a></h3>
      </article>
      <?php
    }
    ?>

  </section>
  <?php
  include $_SERVER['DOCUMENT_ROOT'].'/vistas/pie.php';
   ?>
  </body>
</html>
