<?php
  include 'conexion.php';
  class ObtProductos{

    function ObtenerTodos(){
      $arrRS=null;
      $bRet = false;
      $oAccesoDatos=new conexion();
      $oAccesoDatos->conectar();
      $sQuery = " SELECT id_producto, producto, descripcion, precio,cantidad,tipo,genero,talla,color,img FROM productos";
      $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
      $oAccesoDatos->desconectar();
      if ($arrRS){
        for($i=0;$i<count($arrRS);$i++){
          $productos[$i]=array('id'=>$arrRS[$i][0],'producto'=>$arrRS[$i][1],'desc'=>$arrRS[$i][2],'precio'=>$arrRS[$i][3]
        ,'cantidad'=>$arrRS[$i][4],'tipo'=>$arrRS[$i][5],'sexo'=>$arrRS[$i][6],'talla'=>$arrRS[$i][7],'color'=>$arrRS[$i][8],'img'=>$arrRS[$i][9]);
        }
        $_SESSION['producto']=$productos;
        $bRet = true;
      }
      return $bRet;
    }

    function insertar($nom,$des,$pre,$can,$sex,$tip,$tal,$col,$imagen){
    $oAccesoDatos=new conexion();
    $sQuery="";
    $nAfectados=-1;
        if ($oAccesoDatos->conectar()){
    			$sQuery="INSERT INTO productos(producto,descripcion,precio,cantidad,tipo,genero,talla,color,img,adminsitradoresid_administrador)
          VALUES ('".$nom."','".$des."','".$pre."','".$can."','".$tip."','".$sex."','".$tal."','".$col."','".$imagen."','2')";
          $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
          $oAccesoDatos->desconectar();
        }

      return $nAfectados;
    }

    function buscar($id){
  	$oAccesoDatos=new conexion();
  	$sQuery="";
  	$arrRS=null;
  	$bRet = false;

  			if ($oAccesoDatos->conectar()){
  		 		$sQuery = " SELECT * FROM productos
  							WHERE id_producto = ".$id;
  				$arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
  				$oAccesoDatos->desconectar();
  				if ($arrRS){
            $productos[]=array('id'=>$arrRS[0][0],'pro'=>$arrRS[0][1],'des'=>$arrRS[0][2],'pre'=>$arrRS[0][3],'can'=>$arrRS[0][4],
          'tipo'=>$arrRS[0][5],'sexo'=>$arrRS[0][6],'talla'=>$arrRS[0][7],'color'=>$arrRS[0][8]);
          $_SESSION['producto']=$productos;
  					$bRet = true;
  				}
  		}
  		return $bRet;
  	}

    function borrar($id){
  	$oAccesoDatos=new conexion();
  	$sQuery="";
  	$nAfectados=-1;

  			if ($oAccesoDatos->conectar()){
          $sQuery = "DELETE FROM compras WHERE productosid_producto = ".$id;
          $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
  		 		$sQuery = "DELETE FROM productos WHERE id_producto = ".$id;
  				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
  				$oAccesoDatos->desconectar();
  			}
  		return $nAfectados;
  	}

    function modificar($ida,$id,$pro,$des,$tipo,$talla,$precio,$cat,$sexo,$color){
  	$oAccesoDatos=new conexion();
    echo $color;
  	$sQuery="";
  	$nAfectados=-1;
  		if ($id=="" OR $pro == "" OR $des == "" OR $tipo == "" OR $talla=="" OR $precio=="" OR $cat==-1 OR $sexo=="" OR $color=="")
  			throw new Exception("ObtProductos->modificar(): faltan datos");
  		else{
  			if ($oAccesoDatos->conectar()){
  		 		$sQuery = "UPDATE productos SET id_producto= '".$id."',producto= '".$pro."',
  					descripcion='".$des."',precio = '".$precio."',cantidad = '".$cat."',
  					tipo = '".$tipo."',genero = '".$sexo."',talla = '".$talla."',color = '".$color."' WHERE id_producto = ".$id;
  				$nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
  				$oAccesoDatos->desconectar();
  			}
  		}
  		return $nAfectados;
  	}

    function Compras($idCompra,$idUsuario,$idPro,$fecha,$can,$stado){
    $oAccesoDatos=new conexion();
    $sQuery="";
    $nAfectados=-1;
        if ($oAccesoDatos->conectar()){
    			$sQuery="INSERT INTO compras(idCompra, idUsuario, idProducto, fecha, catidad, estado)
          VALUES ('".$idCompra."','".$idUsuario."','".$idPro."','".$fecha."','".$can."','".$stado."');";
          $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
          $oAccesoDatos->desconectar();
        }
//"INSERT INTO compras(idCompra, idUsuario, idProducto, fecha, catidad, estado)
//VALUES ('".$idCompra."','".$idUsuario."','".$idPro."','".$fecha."','".$can."','".$stado."');";
      return $nAfectados;
    }

  }

 ?>
