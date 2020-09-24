
<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: ../admin/index.php");
}

if (isset($_POST["validar"]) and ($_POST['usuario']) /*and ($_POST ['contrasena'])*/) {
    $matricula = ($_POST['usuario']);

    $contrasena = ($_POST['password']);

    include_once 'Usuario.php';
    $usu1 = new Usuario();

    $usuario = $usu1->login_user($matricula, $contrasena);

    if ($usuario == true) {

        header("Location:../admin/SesionAlumno/index.php");
    }
    if ($usuario == false) {echo '<script type="text/javascript">
			     alert(" La Matricula o contraseña incorrectos");
				 window.location.href="../index.php";
				 </script>';

    }
}
?>