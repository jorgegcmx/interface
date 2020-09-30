<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idalumnos;
    private $matricula;
    private $apellidosalumno;
    private $nombresalumnos;
    private $password;
    private $cedulaalumno;
    private $carnetconadis;
    private $discapacidad;
    private $porcentajediscapacidad;
    private $representante;
    private $cedularepresentante;
    private $domicilio;
    private $tlfconvencional;
    private $tlfcelular;
    private $email;
    private $codigoluz;
    private $estatus_idestatus; 
    private $id_tipo_alumno;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_alum($id, $matricula, $apellidosalumno, $nombresalumnos, $password, $cedulaalumno, $carnetconadis, $discapacidad, $porcentajediscapacidad,
        $representante, $cedularepresentante, $domicilio, $tlfconvencional, $tlfcelular, $email, $codigoluz,$estatus_idestatus,$id_tipo_alumno) {
        $this->idalumnos = $id;
        $this->matricula = $matricula;
        $this->apellidosalumno = $apellidosalumno;
        $this->nombresalumnos = $nombresalumnos;
        $this->password = $password;
        $this->cedulaalumno = $cedulaalumno;
        $this->carnetconadis = $carnetconadis;
        $this->discapacidad = $discapacidad;
        $this->porcentajediscapacidad = $porcentajediscapacidad;
        $this->representante = $representante;
        $this->cedularepresentante = $cedularepresentante;
        $this->domicilio = $domicilio;
        $this->tlfconvencional = $tlfconvencional;
        $this->tlfcelular = $tlfcelular;
        $this->email = $email;
        $this->codigoluz = $codigoluz;
        $this->estatus_idestatus = $estatus_idestatus;
        $this->id_tipo_alumno = $id_tipo_alumno;

    }

    public function get_alum($id = null)
    {
        try
        {
            $sql = "SELECT * FROM alumnos 
            /*LEFT JOIN estatus on estatus.idestatus=alumnos.estatus_idestatus 
            LEFT JOIN tipodegrupo on tipodegrupo.idtipodegrupo=alumnos.id_tipo_alumno
            LEFT JOIN alumnos_tiene_grupos on alumnos_tiene_grupos.alumnos_idalumnos=alumnos.idalumnos
            LEFT JOIN grupos on grupos.idgrupos=alumnos_tiene_grupos.grupos_idgrupos*/
            ";

            if ($id != null) {
                $sql .= " WHERE idalumnos =?";

            }

            $consulta = $this->con->prepare($sql);

            if ($id != null) {
                $consulta->bindParam(1, $id);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }


    public function get_alum_tipo($id = null)
    {
        try
        {
            $sql = "  SELECT * FROM alumnos 
           /* LEFT JOIN estatus on estatus.idestatus=alumnos.estatus_idestatus 
            LEFT JOIN tipodegrupo on tipodegrupo.idtipodegrupo=alumnos.id_tipo_alumno
            LEFT JOIN alumnos_tiene_grupos on alumnos_tiene_grupos.alumnos_idalumnos=alumnos.idalumnos
            LEFT JOIN grupos on grupos.idgrupos=alumnos_tiene_grupos.grupos_idgrupos*/
          ";

            if ($id != null) {
                $sql .= " WHERE id_tipo_alumno =? ";
            }

            $consulta = $this->con->prepare($sql);

            if ($id != null) {
                $consulta->bindParam(1, $id);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }
    public function get_formalum($id = null)
    {
        try
        {
            $sql = "SELECT * FROM alumnos 
            join estatus on estatus.idestatus=alumnos.estatus_idestatus
            join tipodegrupo on tipodegrupo.idtipodegrupo=alumnos.id_tipo_alumno
            ";

            if ($id != null) {
                $sql .= " WHERE idalumnos =?";

            }

            $consulta = $this->con->prepare($sql);

            if ($id != null) {
                $consulta->bindParam(1, $id);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }
    public function add_alum()
    {
        try {
            if ($this->idalumnos == null) {
                $sql = "INSERT INTO alumnos VALUES(0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  alumnos"
                    . " SET matricula = ?,"
                    . " apellidosalumno = ?,"
                    . " nombrealumno = ?,"
                    . " password = ?,"
                    . " cedulaalumno = ?,"
                    . " carnetconadis = ?,"
                    . " discapacidad = ?,"
                    . " porcentajediscapacidad = ?,"
                    . " representante = ?,"
                    . " cedularepresentante = ?,"
                    . " domicilio = ?,"
                    . " tlfconvencional = ?,"
                    . " tlfcelular = ?,"
                    . " email = ?,"
                    . " codigoluz = ?,"
                    . " estatus_idestatus = ?,"
                    . " id_tipo_alumno = ?"
                    . " WHERE idalumnos =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->matricula);
            $consulta->bindparam(2, $this->apellidosalumno);
            $consulta->bindparam(3, $this->nombresalumnos);
            $consulta->bindparam(4, $this->password);
            $consulta->bindparam(5, $this->cedulaalumno);
            $consulta->bindparam(6, $this->carnetconadis);
            $consulta->bindparam(7, $this->discapacidad);
            $consulta->bindparam(8, $this->porcentajediscapacidad);
            $consulta->bindparam(9, $this->representante);
            $consulta->bindparam(10, $this->cedularepresentante);
            $consulta->bindparam(11, $this->domicilio);
            $consulta->bindparam(12, $this->tlfconvencional);
            $consulta->bindparam(13, $this->tlfcelular);
            $consulta->bindparam(14, $this->email);
            $consulta->bindparam(15, $this->codigoluz);
            $consulta->bindparam(16, $this->estatus_idestatus);
            $consulta->bindparam(17, $this->id_tipo_alumno);

            if ($this->idalumnos != null) {
                $consulta->bindparam(18, $this->idalumnos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_alum($id)
    {
        try {
            $sql = "DELETE FROM alumnos WHERE idalumnos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function del_detalle($id)
    {
        try {
            $sql = "DELETE FROM alumnos_tiene_grupos WHERE iddetalle_a_g = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function get_estatus()
    {
        try
        {
            $sql = "SELECT * FROM estatus";

            $consulta = $this->con->prepare($sql);

            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }
    public function get_gru_tipo($id = null)
    {
        try
        {
            $sql = "SELECT * FROM grupos join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo";
            if ($id != null) {
                $sql .= " WHERE idtipodegrupo =?";

            }

            $consulta = $this->con->prepare($sql);

            if ($id != null) {
                $consulta->bindParam(1, $id);
            }
            $consulta->execute();
            $this->con = null;

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }


    public function get_periodos()
    {
        try
        {
            $sql = "SELECT * FROM periodosescolares where stus=1";

            $consulta = $this->con->prepare($sql);

            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }
    public function comprobar($matricula)
    {
        try {

            $sql = "SELECT * FROM  alumnos WHERE matricula= ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $matricula);

            $consulta->execute();

                 //SI EXISTE EL USUARIO

            if ($consulta->rowCount() == 1) {
                return true;

            } else {
                return false;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function get_tipo()
    {
        try
        {
            $sql = "SELECT * FROM tipodegrupo";

            $consulta = $this->con->prepare($sql);

            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return false;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_historial($id)
    {
        try {

            $sql = "SELECT * FROM alumnos 
            join alumnos_tiene_grupos on alumnos_tiene_grupos.alumnos_idalumnos=alumnos.idalumnos
            join grupos on grupos.idgrupos=alumnos_tiene_grupos.grupos_idgrupos
            join periodosescolares on periodosescolares.idperiodos=alumnos_tiene_grupos.periodosescolares_idperiodos
            where idalumnos = ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();


            if ($consulta->rowCount() >= 1) {
                return $consulta;

            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }
} //cierra clase
