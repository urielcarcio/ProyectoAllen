<?php
    session_start();
    include "../modelo/conexion.php";
    $pass=$_POST['password'];
    $user=$_POST['user'];
    if(isset($_GET['salir'])){
      unset($_SESSION['usuario']);
      unset($_SESSION['admin']);
      header("Location: ../vistas/login.php");
    } else if(!empty($pass)&&!empty($user)){
        $sQuery = "SELECT * FROM usuarios WHERE email ='".$user."' AND password = '".$pass."'";
        $Conn=new conexion();
        if($Conn->conectar()){
             $arrRS = $Conn->ejecutarConsulta($sQuery);
             if ($arrRS != null){
                  $arreglo[]=array('nombre'=>$arrRS[0][1],'apellidos'=>$arrRS[0][2],'direccion'=>$arrRS[0][4],'telefono'=>$arrRS[0][5],
                  'email'=>$arrRS[0][6],'paypal'=>$arrRS[0][8],'id'=>$arrRS[0][0]);
                  $_SESSION['usuario']=$arreglo;
                  $Conn->desconectar();
                  header("Location: ../vistas/historial.php");
             }else if($arrRS == null) {
                  $sQuery = "SELECT * FROM adminsitradores WHERE email ='".$user."' AND password = '".$pass."'";
                  $arrRS = $Conn->ejecutarConsulta($sQuery);
                  $Conn->desconectar();
                  if ($arrRS != null){
                       $arreglo[]=array('nombre'=>$arrRS[0][1],'apellidos'=>$arrRS[0][2],'email'=>$arrRS[0][4]);
                       $_SESSION['admin']=$arreglo;
                       header("Location: ../vistas/administrador.php");
                  }else{
                       header("Location: ../vistas/login.php?error=datos no validos");
                  }
            }
        }
    }else{
      header("Location: ../vistas/login.php?error=No se introdujo datos");
    }
 ?>
