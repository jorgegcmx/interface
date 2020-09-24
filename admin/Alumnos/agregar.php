<?php
include_once 'Classe.php';
$usu1 = new Classe();
$matricula = $_POST['matricula'];
$apellidosalumno = $_POST['apellidosalumno'];
$nombresalumnos = $_POST['nombresalumnos'];
$cedulaalumno = $_POST['cedulaalumno'];
$carnetconadis = $_POST['carnetconadis'];
$discapacidad = $_POST['discapacidad'];
$porcentajediscapacidad = $_POST['porcentajediscapacidad'];
$representante = $_POST['representante'];
$cedularepresentante = $_POST['cedularepresentante'];
$domicilio = $_POST['domicilio'];
$tlfconvencional = $_POST['tlfconvencional'];
$tlfcelular = $_POST['tlfcelular'];
$email = $_POST['email'];
$codigoluz = $_POST['codigoluz'];
$tipodegrupo_idtipodegrupo = $_POST['tipodegrupo_idtipodegrupo'];


if (isset($_POST['id'])) {
    $password = $_POST['password'];
    $id = $_POST['id'];
    $usu1->set_alum($id, $matricula, $apellidosalumno, $nombresalumnos, $password, $cedulaalumno, $carnetconadis, $discapacidad, $porcentajediscapacidad,
            $representante, $cedularepresentante, $domicilio, $tlfconvencional, $tlfcelular, $email, $codigoluz, 1, $tipodegrupo_idtipodegrupo);
        $sql = $usu1->add_alum();
        echo '<script type="text/javascript">
        alert("registro exitoso!");
        setTimeout("window.history.go(-2)",100);
        </script>';
} else {
    $id = null;
    $password = $_POST['email'];
    $com = $usu1->comprobar($matricula);
    if ($com == true) {
        echo '<script type="text/javascript">
	alert("Error ya Existe la Matricula");
	setTimeout("window.history.go(-1)",100);
	</script>';
    } else {

        $usu1->set_alum($id, $matricula, $apellidosalumno, $nombresalumnos, $password, $cedulaalumno, $carnetconadis, $discapacidad, $porcentajediscapacidad,
            $representante, $cedularepresentante, $domicilio, $tlfconvencional, $tlfcelular, $email, $codigoluz, 1, $tipodegrupo_idtipodegrupo);
        $sql = $usu1->add_alum();
        //header("Location:tabla.php");
        echo '<script type="text/javascript">
	alert("Registro Guardado con exito!");
	setTimeout("window.history.go(-2)",100);
	</script>';
    }

}
