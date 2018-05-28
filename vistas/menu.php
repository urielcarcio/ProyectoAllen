<body>
  <head>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
      <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    $(document).ready(main);
    var contador=1;
    function main(){
      $('.menu_bar').click(function(){
        if(contador==1){
          $('nav').animate({
            left:'0'
          });
          contador=0;
        }else{
          contador=1;
          $('nav').animate({
            left:'-100%'
          });
        }
      });
    };

    </script>
  </head>
  <style>
  @media screen and (max-width: 1020px){
    header {
      height: 60px;
    }
    nav  {
      width: 45%;
      height: 90%;
      margin: 0;
      position: fixed;
      z-index: 100;
    }
  nav ul li {
      display: block;
      float: none;
      border-bottom: 1px solid rgb(40, 55, 71);
    }
    ul .menu1 {
      width: 80%;
      height: 100%;
      margin: 0;
      position: fixed;
      }
    .menu_bar{
      display: block;
      width: 100%;
      background: #ccc;

    }
    .menu_bar .bt-menu{
      display: block;
      padding: 20px;
      background: rgb(40, 55, 71);
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      font-size: 25px;
      -webkit-box-sizing:border-box;
      -moz-box-sizing:border-box;
      box-sizing:border-box;
    }
    .menu_bar span{
      float: right;
      font-size: 20px;
    }
  }
  </style>
<div class="menu_bar">
  <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
</div>
    <nav>
        <ul class="menu1">
          <li><a href="/">Inicio</a></li>
            <li><a href="/vistas/novedades.php">Novedades</a></li>
            <li><a href="/vistas/categorias.php?tipo=men">Hombres</a></li>
            <li><a href="/vistas/categorias.php?tipo=woman">Mujeres</a></li>
            <li><a href="/vistas/categorias.php?tipo=children">Niños</a></li>

        <?php
           if (isset($_SESSION['usuario'])){
             $usu=$_SESSION['usuario'];
        ?>
        <li><a href="#"><?php echo $usu[0]['nombre']; ?></a>
          <ul>
            <li><a href="/controlador/verificar?salir=0">Salir</a></li>
          </ul>
        </li>
        <li><a href="/vistas/historial.php">Compras</a></li>
        <li><a class="icon-cart" href="listacompras.php"></a></li>
        <?php
      }else{?>
        <li><a href="/vistas/login.php">Ingresa</a></li>
        <li><a href="/vistas/registro.php">Registrar</a></li>
        <li><a class="icon-cart" href="listacompras.php"></a></li>
      <?php
        }
      ?>
      </ul>
    </nav>
  </body>
