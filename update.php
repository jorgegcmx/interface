

<?php
include_once 'Classe.php';
$usu1 = new Classe();
$usu2 = new Classe();
$usu3 = new Classe();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);

    if ($password1 == $password2) {

         $password1 = md5($password1); 
          
         $usu1->add_password($password1,$id);
         $usu2->add_password_profesor($password1,$id);
         $usu3->add_password_alumno($password1,$id);
         header("Location:index.php?password=ok");
    } else {
        echo '<script type="text/javascript">
        alert("Error las contraseñas no conciden, intenta nuevamente!");
        setTimeout("window.history.go(-1)",100);
        </script>'; 
        }
}
?>
