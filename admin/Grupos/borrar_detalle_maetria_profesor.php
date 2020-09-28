<?php
$id = $_GET['id'];
echo $id;
include_once 'Classe.php';
$usu1 = new Classe();

$usu1->del_mat_profesor($id);

//header("Location:tabla.php");
echo '<script type="text/javascript">
	alert("Registro Eliminado");
	setTimeout("window.history.go(-1)",100);
	</script>';