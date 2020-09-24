<?php
include_once 'Classe.php';
$usu1 = new Classe();
$materia = $_POST['materia'];
$tipo=$_POST['tipodegrupo_idtipodegrupo'];



if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}
    

$usu1->set_mat($id,$materia,$tipo);
$sql =$usu1->add_mat();
//header("Location:tabla.php");
echo '<script type="text/javascript">
	alert("Registro Guardado con exito!");
	setTimeout("window.history.go(-2)",100);
	</script>';

    
