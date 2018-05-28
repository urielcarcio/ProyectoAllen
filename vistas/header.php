
<?php
if(isset($_SESSION['admin'])){?>
    <h2 class="panel">Panel admin</h2>
    <h2 class="titulo">Boutique Allen</h2>
  <?php
}else{
  ?>
  <div class="quita">


  <img src="/img/allen.png" alt="logo" class="animated fadeInDownBig">
  <h2 class="animated lightSpeedIn">Boutique Allen</h2>
  <div id="buscar">
      <form method="post" action="/controlador/buscar.php">
          <input type="text" placeholder="Buscar productos" id="clave" name="clave" class="clave"/>
          <input type="submit" value=" " id="search" />
      </form>
  </div>
</div>
  <?php
}
 ?>
