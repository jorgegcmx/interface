<?php
session_start();

include_once 'Usuario.php';

//clase objeto = new clase()
//instanciar objeto de la clase de usuario
$usu1 = new Usuario();

$username = $_POST['username'];
$password = $_POST['password'];

$usuario = $usu1->login_user($username, $password);

if ($usuario == 'administradorr') {

    $_SESSION['login'] = $_POST['username'];
    $_SESSION['privilegios'] = 'administrador';
    header("Location: ../admin/index.php");

} else {

    echo '<script type="text/javascript">
			     alert("Usuario o Contraseña Incorrectos");
				 window.location.href="../index.php";
				 </script>';

}
