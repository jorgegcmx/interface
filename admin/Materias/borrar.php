<?php
$id = $_GET['id'];
echo $id;
include_once 'Classe.php';
$usu1 = new Classe();

$usu1->del_mat($id);

header("Location:tabla.php");
