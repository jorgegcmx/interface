<?php

require_once '../admin/conexion/Conexion.php';

class Usuario
{

    private static $instancia;

    private $con;

    private $id;

    private $nombre;

    private $password;

    private $privilegios_idprivilegios;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function login_user($cedula, $contrasena)
    {
        try {
            $sql = "SELECT * FROM profesores WHERE cedula = ? and password= ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $cedula);
            $consulta->bindParam(2, $contrasena);
            $consulta->execute();
            $this->con = null;
            //Si existeel usuario
            if ($consulta->rowCount() == 1) {

                $fila = $consulta->fetch();
                $_SESSION['cedula'] = $fila['cedula'];
                $_SESSION['idprofesores'] = $fila['idprofesores'];
                $_SESSION['nombreprofesor'] = $fila['nombreprofesor'];

                return true;
            } else {
                return false;

            }

        } catch (PDOException $e) {
            print "Error: " . $e->Message();
        }
    }

} /*cierra clase*/
