<?php
$dominio="http://unidadeducativaclaudioneiragarzon.esy.es/";

include_once 'Classe.php';
$usu1 = new Classe();
$usu2 = new Classe();
$usu3 = new Classe();

if (isset($_POST['btnfiltrar'])) {
    $correo = trim($_POST['correo']);

    $datos = $usu1->get_admin($correo);
    /*Si es administrador */
    if ($datos == false) {
           /*Si es Profesor */
        $datos_prof = $usu2->get_profesor($correo);
        if ($datos_prof == false) {
                /*Si es Alumno */
            $datos_alum = $usu3->get_alumno($correo);
            if ($datos_alum == false) {
				
            } else {
                while ($alum = $datos_alum->fetchObject()) {
                    $email = $alum->email;
                }
            }

        } else {
            while ($prof = $datos_prof->fetchObject()) {
                $email = $prof->emailp;
            }
        }

    } else {
        while ($fila = $datos->fetchObject()) {
            $email = $fila->nombre;
        }
    }

if($email!=''){
	$contenido = $dominio."updatepassword.php?email=".md5($email);
    mail($email, "clic en el siguiente enlace para restabecer la contraseña", $contenido);
          header("Location:formrecuperar.php?ok");     
}else{
	header("Location:formrecuperar.php?error");   
}   
}