<?php
include_once 'Classe.php';
$usu1 = new Classe();

 $matricula=$_POST['matricula'];
 $id_alumno=$_POST['id_alumno'];
 $nombre = $_FILES['archivo']['name'];
 $tipo = $_FILES['archivo']['type'];
 $tamanio = $_FILES['archivo']['size'];
 $ruta = $_FILES['archivo']['tmp_name'];
 $carpeta = $_POST['carpeta'];

 $dir = 'archivos/';
 $name =  $matricula.'_'. $nombre; 
 $destino =  $dir.''.$name;

 if ($nombre != "") {
    if (copy($ruta,$destino)) {

     $usu1->set_file($id, $id_alumno, $destino);
     $sql = $usu1->add_file();
     header("Location:tabla.php");

       } else {
       echo "error";
 }

} 