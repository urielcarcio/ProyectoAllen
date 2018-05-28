<?php
		$nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dir=$_POST['dir'];
    $fechanaci=$_POST['txtfecha'];
    $email=$_POST['email'];
    $cuentapago=$_POST['pago'];
    $telefono=$_POST['cel'];
    $pass=$_POST['pass1'];
    $rpass=$_POST['pass2'];
	$reqlen= strlen($nombre) * strlen($apellidos) * strlen($pass) * strlen($rpass) * strlen($email) * strlen($dir)
  * strlen($fechanaci)* strlen($cuentapago)* strlen($telefono) ;
	if ($reqlen > 0) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)&& filter_var($cuentapago, FILTER_VALIDATE_EMAIL)){
      if(validateDate($fechanaci, 'Y-m-d')){
        if ($pass === $rpass) {
          $arreglo[]=array('nombre'=>$nombre,'apellidos'=>$apellidos,'direccion'=>$dir,'telefono'=>$telefono,
        'email'=>$email,'paypal'=>$cuentapago,'fecha'=>$fechanaci,'contra'=>$pass);
        $_SESSION['user']=$arreglo;
        require '../modelo/introUser.php';
        }else{
          echo '<center><h5>Por favor, introduzca dos contrase&ntilde;as identicas.</h5></center><br>';
        }
      }else{
        echo '<center><h5>La fecha no tiene formato valido.</h5></center>';
      }

    }
	} else {
		echo '<center><h5>Por favor, rellene todos los campos requeridos.</h5></center>';
	}

  function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d;
}
?>
