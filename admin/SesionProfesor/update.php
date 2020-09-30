<?php
include_once 'classe.php';
$usu1 = new classe();
$nota = $_POST['nota'];



if(isset($_POST['id'])){
    $id = $_POST['id'];

    $sql =$usu1->update_nota($nota,$id);
   
    echo '<script type="text/javascript">
        alert("Registro Actualizado con exito!");
        setTimeout("window.history.go(-1)",100);
        </script>';

}
    

