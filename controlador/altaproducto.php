<?php
include $_SERVER['DOCUMENT_ROOT'].'/modelo/ObtProducto.php';
if(empty($_POST['nombre']) || empty($_POST['rbSexo']) || empty($_POST['descripcion']) || empty($_POST['precio'])
   || empty($_POST['talla']) || empty($_POST['color']) || $_POST['tipo'] =="Escoja una opcion"){
  header("Location: AgregarProductos.php?error=faltan_datos");
}else{
  $nom = $_POST['nombre'];
  $des = $_POST['descripcion'];
  $pre = $_POST['precio'];
  $can = $_POST['cantidad'];
  $sex = $_POST['rbSexo'];
  $tip = $_POST['tipo'];
  $tal = $_POST['talla'];
  $col = $_POST['color'];
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);
  $imagen="";
  if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))){
    //Verificamos que sea una imagen
    if ($_FILES["file"]["error"] > 0){
      //verificamos que venga algo en el input file
      echo "Error numero: " . $_FILES["file"]["error"] . "<br>";
    }else{
      //subimos la imagen

      $imagen="/img/productos/".$_FILES["file"]["name"];
      if(file_exists("/img/productos/".$_FILES["file"]["name"])){
          echo $_FILES["file"]["name"] . " Ya existe. ";
        }else{
          move_uploaded_file($_FILES["file"]["tmp_name"],
          "/img/productos/".$_FILES["file"]["name"]);
          echo $imagen;
          $InPro=new ObtProductos();
          if($InPro->Insertar($nom,$des,$pre,$can,$sex,$tip,$tal,$col,$imagen)==-1){
            echo 'No se modifico';
          }else {
            header("Location: ../vistas/tabProductos.php");
          }
      }
    }
  }else{
   echo "Formato no soportado";
  }
}
 ?>
