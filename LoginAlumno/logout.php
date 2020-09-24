<?php

session_start();

unset($_SESSION['login']);

$_SESSION = array();

session_destroy();

echo '<script type="text/javascript">
			     alert("Su Sesion Ha Finalizado");
				 window.location.href="../index.php";
				 </script>';
