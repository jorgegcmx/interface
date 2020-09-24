<?php
include_once 'CalsseCalificaciones.php';
$usu1 = new CalsseCalificaciones();

 $id= null;
 $alumnos_idalumnos = $_POST['alumnos_idalumnos'];
 $grupos_idgrupos = $_POST['grupos_idgrupos'];
 $materias_idmaterias = $_POST['materias_idmaterias'];
 $calificacion = $_POST['calificacion'];
 $parcial = 0;
 $parcial_idparcial = $_POST['parcial_idparcial'];
 
 
$com= $usu1->comprobarcalificacion($alumnos_idalumnos,$grupos_idgrupos,$materias_idmaterias,$parcial_idparcial);

if ($com == true) {


echo'<script type="text/javascript">
			     alert("Error ya Existe Calificacion");
				 setTimeout("window.history.go(-1)",100);
				 </script>'; 

 
}else{
	
$usu1->set_cali($id,$alumnos_idalumnos,$grupos_idgrupos,$materias_idmaterias,$calificacion,$parcial,$parcial_idparcial);
$sql =$usu1->add_cali();
 echo'<script type="text/javascript">
			     alert("Calificacion Guardada Exitosamente");
				 setTimeout("window.history.go(-1)",100);
				 </script>'; 
	}


 ?>
