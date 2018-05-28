<?php
include 'conexion.php';
if(isset($_SESSION['user'])){
  $usu=$_SESSION['user'];
  $nAfectados=-1;
    $conn=new conexion();
  if ($conn->conectar()){
  $sQuery ="INSERT INTO usuarios (nombre, apellidos, password, direccion, telefono, email, fechanacimiento, cuentapaypal)
   VALUES ('".$usu[0]['nombre']."','".$usu[0]['apellidos']."','".$usu[0]['contra']."',
    '".$usu[0]['direccion']."','".$usu[0]['telefono']."','".$usu[0]['email']."','".$usu[0]['fecha']."','".$usu[0]['paypal']."')";
  $nAfectados = $conn->ejecutarComando($sQuery);
  $conn->desconectar();
  }
  unset($_SESSION['user']);
  //header("Location: ../index.php");
}
 ?>
