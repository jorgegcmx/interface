<?php
include_once 'Classe.php';
$usu1 = new Classe();
$grupo = $_POST['grupo'];
$fechainicio= $_POST['fechainicio'];
$fechatermino = $_POST['fechatermino'];
$tipodegrupo_idtipodegrupo = $_POST['tipodegrupo_idtipodegrupo'];
$diasdeclase= $_POST['diasdeclase'];
$totalmaterias= $_POST['nummaterias'];


if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}
    

$usu1->set_gru($id,$grupo,$fechainicio,$fechatermino,$tipodegrupo_idtipodegrupo,$diasdeclase,$totalmaterias);
$sql =$usu1->add_gru();
//header("Location:tabla.php");
echo '<script type="text/javascript">
	alert("Grupo Guardado con exito!");
	setTimeout("window.history.go(-2)",100);
	</script>';

    
