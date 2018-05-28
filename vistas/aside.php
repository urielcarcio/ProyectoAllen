<?php
$admin=$_SESSION['admin'];
 ?>
<aside id="panel">
  <div class="admin">
    <img src="/img/user.png">
    <h3>Admin. <?php echo $admin[0]['nombre']; ?></h3>
  </div>
  <ul>
    <li><a href="/vistas/administrador.php" class="icon-home icono"> Home</a></li>
    <li><a href="/vistas/tabproductos.php?n=0" class=" icon-eye icono"> Ver productos</a></li>
    <li><a href="/vistas/AgregarProductos.php" class="icon-plus icono"> Agregar productos</a></li>
    <li><a href="/controlador/verificar.php?salir=0" class=" icon-exit icono"> Salir</a></li>
  </ul>
</aside>
