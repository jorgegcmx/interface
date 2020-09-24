<?php
include_once 'Classeregistro.php';
$usu1 = new Classeregistro();

$profesores_idprofesores= $_POST['profesores_idprofesores'];
$materias_idmaterias = $_POST['materias_idmaterias'];
$grupos_idgrupos = $_POST['grupos_idgrupos'];

if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
	$id= null;
}

$alumno = $usu1->comprobar($materias_idmaterias,$grupos_idgrupos);

if ($alumno == true) {


 echo'<script type="text/javascript">
			     alert("la Materia ya ha sido Registrada");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
}else{

 if ($alumno == FALSE)
   {
$usu1->set_grupomateriaprofesor($id,$profesores_idprofesores,$materias_idmaterias,$grupos_idgrupos);
$sql =$usu1->add_grupomateriaprofesor();   
 echo'<script type="text/javascript">
			     alert("Registo Exitoso");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
	   }

	    }

 ?>