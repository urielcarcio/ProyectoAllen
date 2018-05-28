<?php
include '../modelo/ObtProducto.php';
session_start();
$sErr=""; $sOpe = ""; $sCve = "";
$oPersHosp = new ObtProductos();
//echo $_POST["id1"];

		/*Verifica datos de captura mínimos*/
		if (isset($_GET["txtClave"]) && !empty($_GET["txtClave"]) && isset($_GET["txtOpe"]) && !empty($_GET["txtOpe"])){
      $sOpe = $_GET["txtOpe"];
      $sCve = $_GET["txtClave"];


			try{
        if ($sOpe == 'b'){
          $id=$_GET["txtClave"];
					$nResultado = $oPersHosp->borrar($id);
				}else{
          if(isset($_GET["id1"]) && isset($_GET['producto']) && isset($_GET['descri']) && isset($_GET['tipo']) && isset($_GET['talla'])){
            $id=$_GET["id1"];
            $pro=$_GET['producto'];
            $des=$_GET['descri'];
            $tipo=$_GET['tipo'];
            $talla=$_GET['talla'];
            $precio=$_GET['precio'];
            $cat=$_GET['cantidad'];
            $sexo=$_GET['sexo'];
            $color=$_GET['color'];
  					$nResultado = $oPersHosp->modificar($sCve,$id,$pro,$des,$tipo,$talla,$precio,$cat,$sexo,$color);
          }

				}if ($nResultado != 1){
					$sError = "Error en bd";
				}
			}catch(Exception $e){
				//Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
				error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
		}
		else{
			$sErr = "Faltan datos";
		}
	if ($sErr == "")
		header("Location: ../vistas/tabProductos.php");
	else
		header("Location: ../vistas/tabProductos.php?error=".$sErr);
	exit();
?>
