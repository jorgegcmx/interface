<?php
include_once 'CalsseCalificaciones.php';
$usu1 = new CalsseCalificaciones();

$id = null;
$alumnos_idalumnos = $_POST['alumnos_idalumnos'];
$grupos_idgrupos = $_POST['grupos_idgrupos'];
$materias_idmaterias = $_POST['materias_idmaterias'];
$calificacion = $_POST['calificacion'];
$parcial_idparcial = $_POST['parcial_idparcial'];
$periodosescolares_idperiodos = $_POST['periodosescolares_idperiodos'];

if ($parcial_idparcial == 1) {
    $parcial = 'P';
} elseif ($parcial_idparcial == 2) {
    $parcial = 'P';
} elseif ($parcial_idparcial == 3) {
    $parcial = 'P';
} elseif ($parcial_idparcial == 4) {
    $parcial = 'E';
}

$com = $usu1->comprobarcalificacion($alumnos_idalumnos, $grupos_idgrupos, $materias_idmaterias, $parcial_idparcial, $periodosescolares_idperiodos);

if ($com == true) {

    echo '<script type="text/javascript">
			     alert("Error ya Existe Calificacion");
				 setTimeout("window.history.go(-1)",100);
				 </script>';

} else {

    $usu1->set_cali($id, $alumnos_idalumnos, $grupos_idgrupos, $materias_idmaterias, $calificacion, $parcial, $parcial_idparcial, $periodosescolares_idperiodos);
    $sql = $usu1->add_cali();

    echo '<script type="text/javascript">
alert("Calificacion Guardada Exitosamente");
setTimeout("window.history.go(-1)",100);
</script>';
}
