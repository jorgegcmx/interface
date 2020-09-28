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

    public function set_user($id, $nombre, $password, $privilegios_idprivilegios)
    {

        $this->ID = $id;
        $this->nombre = $nombre;
        $this->$password = $passwords;
        $this->privilegios_idprivilegios = $privilegios_idprivilegios;

    }

    public function login_user($usuario, $contrasena)
    {
        try {
            $sql = "SELECT * FROM alumnos WHERE matricula = ? and password= ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $usuario);
            $consulta->bindParam(2, $contrasena);
            $consulta->execute();
            $this->con = null;
            //Si existeel usuario
            if ($consulta->rowCount() == 1) {

                $fila = $consulta->fetch();
                $_SESSION['matricula'] = $fila['matricula'];
                $_SESSION['idalumnos'] = $fila['idalumnos'];
                $_SESSION['nombrealumno'] = $fila['nombrealumno'];
                $_SESSION['apellidosalumno']=$fila['apellidosalumno'];

                return true;
            } else {
                return false;

            }

        } catch (PDOException $e) {
            print "Error: " . $e->Message();
        }
    }

} /*cierra clase*/
