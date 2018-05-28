<?php
session_start();
include '../modelo/ObtProducto.php';
		$arreglo=$_SESSION['carrito'];
    $arreglo2=$_SESSION['usuario'];
		$producto=$_SESSION['producto'];
    $total=0;
		$fecha=date("Y-m-d");
		$status="Acreditando pago";
		//$Compra=new ObtProductos();
		$idCompra=contador();
		//$NuevaCantidad=0;
		$tabla='<table border="1" style="width:500px;border-collapse: collapse;">
			<tr>
			<th style="border-bottom:solid 2px rgb(68, 69, 70);text-align: center;">Nombre</th>
			<th style="border-bottom:solid 2px rgb(68, 69, 70);text-align: center;">Cantidad</th>
			<th style="border-bottom:solid 2px rgb(68, 69, 70);text-align: center;">Precio</th>
			<th style="border-bottom:solid 2px rgb(68, 69, 70);text-align: center;">Subtotal</th>
			</tr>';
		for($i=0;$i<count($arreglo);$i++){
			$tipo="";
			$sexo="";
			$NuevaCantidad=0;
			for ($x=0; $x < count($producto); $x++) {
				if($arreglo[$i]['id']==$producto[$x]['id']){
					$tipo=$producto[$x]['tipo'];
					$sexo=$producto[$x]['sexo'];
					$NuevaCantidad=$producto[$x]['cantidad']-$arreglo[$i]['elementos'];
					if($NuevaCantidad<0)
					  $NuevaCantidad=0;
				}
			}
			$Compra=new ObtProductos();
			$nResultado = $Compra->Compras($idCompra,$arreglo2[0]['id'],$arreglo[$i]['id'],$fecha,$arreglo[$i]['elementos'],$status);
		  $Compra->modificar($arreglo[0]['id'],$arreglo[0]['id'],$arreglo[$i]['nombre'],$arreglo[$i]['descri'],$tipo,$arreglo[$i]['talla'],$arreglo[$i]['precio'],$NuevaCantidad,$sexo,$arreglo[$i]['color']);
			$tabla=$tabla.'<tr>
				<td style="text-align: center;">'.$arreglo[$i]['nombre'].'</td>
				<td style="text-align: center;">'.$arreglo[$i]['elementos'].'</td>
				<td style="text-align: center;">$ '.$arreglo[$i]['precio'].' MXN</td>
				<td style="text-align: center;">$ '.$arreglo[$i]['elementos']*$arreglo[$i]['precio'].' MXN</td>
				</tr>
			';
			$total=$total+($arreglo[$i]['elementos']*$arreglo[$i]['precio']);
			unset($_SESSION['carrito']);
		}

		$tabla=$tabla.'</table>';
		//echo $tabla;
	  $nombre=$arreglo2[0]['nombre'];
		$apellido=$arreglo2[0]['apellidos'];
		$direccion=$arreglo2[0]['direccion'];
		$fecha=date("d-m-Y");
		$hora=date("H:i:s");
		$asunto="Compra en Boutique Allen";
		$desde="www.allen.esy.es";
		$correo="joanan96@gmail.com";
		$cuenta=$arreglo2[0]['paypal'];

		$comentario='
			<div style="
				border:1px solid #d6d2d2;
				border-radius:5px;
				padding:10px;
				width:800px;
				heigth:300px;
			">
			<center>
				<img src="https://www.hublot.com/images/ImagesBoutiques/cannes_1.jpg" width="300px" heigth="250px">
				<h1>Muchas gracias por comprar en Boutique de Allen</h1>
			</center>
			<p>Hola '.$nombre.' '.$apellido.' muchas gracias por comprar aquí te mando los detalles de tu compra y este pedido sera enviado a la direccion '.$direccion.' para cuelquier duda contactanos en agumone419@gmail.com, este es tu cuenta Paypal '.$cuenta.' la cual verificaremos cuando se haya depositado el pago.</p>
			<p>Lista de Artículos<br>
				<center>'.$tabla.'</center>
				<br>
				Total del pago es: $ '.$total.' MXN

			</p>
			</div>

		';
    $comentario2='
      <div style="
        border:1px solid #d6d2d2;
        border-radius:5px;
        padding:10px;
        width:800px;
        heigth:300px;
      ">
      <center>
        <img src="https://www.hublot.com/images/ImagesBoutiques/cannes_1.jpg" width="300px" heigth="250px">
        <h1>Compra comenzada</h1>
      </center>
      <p>Se a comenzado un compra Online, este pendiente de la acreditacion del pago desde la cuenta del usuario '.$nombre.' '.$apellido.' el cual es propietario de la cuenta de Paypal '.$cuenta.'</p>
      <p>Lista de Artículos<br>
        <center>'.$tabla.'</center>
        <br>
        Total del pago es: $ '.$total.' MXN

      </p>
      </div>

    ';
		//echo $comentario;
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-type: text/html; charset=utf8\r\n";
		$headers.="From: pelicanoe419@gmail.com\r\n";
		$headers .= "Cc: agumone419@gmail.com\r\n";
    mail("agumone419@gmail.com",$asunto,$comentario2,$headers);
		mail($correo,$asunto,$comentario,$headers);

		//unset($_SESSION['carrito']);
		//header("Location: ../pagina-web/carrito.php");
		function contador()
	  {
	      $archivo = "idCompra.txt"; //el archivo que contiene en numero
	      $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
	      if($f)
	      {
	          $contador = fread($f, filesize($archivo)); //leemos el archivo
	          $contador = $contador + 1; //sumamos +1 al contador
	          fclose($f);
	      }
	      $f = fopen($archivo, "w+");
	      if($f)
	      {
	          fwrite($f, $contador);
	          fclose($f);
	      }
	      return $contador;
	  }
?>
