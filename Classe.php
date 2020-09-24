<?php
require_once 'admin/conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $id;
    private $password;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

   

    public function add_password($password,$email)
    {
        try {
            
            $sql = "UPDATE users SET password = ? WHERE md5(nombre) =? ";                 
            
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $password);
            $consulta->bindparam(2, $email);          

            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    
    public function add_password_profesor($password,$email)
    {
        try {
            
            $sql = "UPDATE profesores SET password = ? WHERE md5(emailp) =? ";                 
            
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $password);
            $consulta->bindparam(2, $email);          

            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function add_password_alumno($password,$email)
    {
        try {
            
            $sql = "UPDATE alumnos SET password = ? WHERE md5(email) =? ";                 
            
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $password);
            $consulta->bindparam(2, $email);          

            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }



    public function get_admin($correo)
    {
        try
        {
            $sql = "SELECT * FROM users where nombre = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $correo);
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_profesor($correo)
    {
        try
        {
            $sql = "SELECT * FROM profesores where emailp = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $correo);
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_alumno($correo)
    {
        try
        {
            $sql = "SELECT * FROM alumnos where email = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $correo);
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

} //cierra clase
