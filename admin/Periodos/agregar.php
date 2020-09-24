<?php
include_once 'Classe.php';
$usu1 = new Classe();
echo $periodoescolar = $_POST['periodoescolar'];
echo $anio = $_POST['anio'];
echo $stus = $_POST['stus'];



if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}
 
$che = $usu1->comprobar($stus);

if ($che == true) {


 echo'<script type="text/javascript">
alert("Error Cerrar el Ciclo Anterior");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
}else{ 

$usu1->set_p($id,$periodoescolar,$anio,$stus);
$sql =$usu1->add_p();
header("Location:tabla.php");

    
 }