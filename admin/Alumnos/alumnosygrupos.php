<?php
include_once 'Classeregistro.php';
$usu1 = new Classeregistro();

$alumnos_idalumnos = $_POST['alumnos_idalumnos'];
$grupos_idgrupos = $_POST['grupos_idgrupos'];
$periodosescolares_idperiodos = $_POST['periodosescolares_idperiodos'];

if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = null;
}

$che = $usu1->comprobarche($alumnos_idalumnos, $grupos_idgrupos);

if ($che == true) {

    echo '<script type="text/javascript">
alert("El Alumno ya Curso anteriormente el Grupo");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
} else {

    if ($che == false) {

        $periodo = $usu1->comprobarperiodo($alumnos_idalumnos, $periodosescolares_idperiodos);

        if ($periodo == true) {

            echo '<script type="text/javascript">
			     alert(" Error el Alumno ya fue registrado en un Grupo con el mismo Periodo Escolar");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
        } else {

            if ($periodo == false) {

                $alumno = $usu1->comprobar($alumnos_idalumnos, $grupos_idgrupos, $periodosescolares_idperiodos);

                if ($alumno == true) {

                    echo '<script type="text/javascript">
			     alert("El Alumno ya fue registrado a este Grupo");
				 setTimeout("window.history.go(-1)",100);
				 </script>';
                } else {

                    if ($alumno == false) {
                        $usu1->set_alumygrupo($id, $alumnos_idalumnos, $grupos_idgrupos, $periodosescolares_idperiodos);
                        $sql = $usu1->add_alumygrupo();
                        echo '<script type="text/javascript">
			     alert("Registo Exitoso");
				 setTimeout("window.history.go(-2)",100);
				 </script>';
                    }

                }
            }

        }

    }

}
