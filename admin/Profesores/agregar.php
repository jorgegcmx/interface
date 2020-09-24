<?php
include_once 'Classe.php';
$usu1 = new Classe();
 $cedula = $_POST['cedula'];
 $nombreprofesor = $_POST['nombreprofesor'];
 $direccionp = $_POST['direccionp'];
 $telefonop = $_POST['telefonop'];

 $tipo = $_POST['tipodegrupo_idtipodegrupo'];
 $apellidoprofesor = $_POST['apellidoprofesor'];
 $emailp = $_POST['emailp'];



if(isset($_POST['id'])){
	$id = $_POST['id'];
	$password = $_POST['password'];
}else{
	$id= null;
	$password = $_POST['emailp'];
}
    

$usu1->set_pro($id,$cedula,$nombreprofesor,$direccionp,$telefonop,$password,$tipo,$apellidoprofesor,$emailp);
$sql =$usu1->add_pro();
//header("Location:tabla.php");
echo '<script type="text/javascript">
	alert("Registro Guardado con exito!");
	setTimeout("window.history.go(-2)",100);
	</script>';
    
?>