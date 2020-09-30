<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
    private $idgrupos;
    private $grupo;
    private $fechainicio;
    private $fechatermino;
    private $tipodegrupo_idtipodegrupo;
    private $diasdeclase;
    private $totalmaterias;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_gru($id, $grupo, $fechainicio, $fechatermino, $tipodegrupo_idtipodegrupo, $diasdeclase, $totalmaterias)
    {
        $this->idgrupos = $id;
        $this->grupo = $grupo;
        $this->fechainicio = $fechainicio;
        $this->fechatermino = $fechatermino;
        $this->tipodegrupo_idtipodegrupo = $tipodegrupo_idtipodegrupo;
        $this->diasdeclase = $diasdeclase;
        $this->totalmaterias = $totalmaterias;

    }

    public function get_gru($id = null)
    {
        try
        {
            $sql = "SELECT * FROM grupos join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo";
            if ($id != null) {
                $sql .= " WHERE idgrupos =?";

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

    public function add_gru()
    {
        try {
            if ($this->idgrupos == null) {

                $sql = "INSERT INTO grupos VALUES(0,?,?,?,?,?,?)";

            } else {
                $sql = "UPDATE  grupos"
                    . " SET grupo = ?,"
                    . " fechainicio = ?,"
                    . " fechatermino= ?,"
                    . " tipodegrupo_idtipodegrupo= ?,"
                    . " diasdeclase= ?,"
                    . " totalmaterias= ?"

                    . " WHERE idgrupos =?";
            }

            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1, $this->grupo);
            $consulta->bindparam(2, $this->fechainicio);
            $consulta->bindparam(3, $this->fechatermino);
            $consulta->bindparam(4, $this->tipodegrupo_idtipodegrupo);
            $consulta->bindparam(5, $this->diasdeclase);
            $consulta->bindparam(6, $this->totalmaterias);

            if ($this->idgrupos != null) {
                $consulta->bindparam(7, $this->idgrupos);
            }
            $consulta->execute();
            return $sql;
            $this->con = null;

        } catch (PDOEception $ex) {
            print "Error:" . $e->getMessage();
        }
    }

    public function del_gru($id)
    {
        try {
            $sql = "DELETE FROM grupos WHERE idgrupos = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function del_mat_profesor($id)
    {
        try {
            $sql = "DELETE FROM profesores_tiene_materias WHERE iddetalle_p_m = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
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

    public function get_mat()
    {
        try
        {
            $sql = "SELECT * FROM materias";

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

    public function get_pro()
    {
        try
        {
            $sql = "SELECT * FROM profesores";

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

    public function get_lista($idgrupo)
    {
        try
        {
            $sql = " SELECT distinct alumnos.*,grupos_idgrupos from alumnos
            join alumnos_tiene_grupos on alumnos_tiene_grupos.alumnos_idalumnos=alumnos.idalumnos
            where grupos_idgrupos = ?  ";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idgrupo);
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

    public function get_mat_por_tipo($idgrupo)
    {
        try
        {
            $sql = "SELECT * FROM materias inner join  profesores_tiene_materias
           on profesores_tiene_materias.materias_idmaterias=materias.idmaterias
           inner join profesores on profesores.idprofesores=profesores_tiene_materias.profesores_idprofesores
    where 	grupos_idgrupos = ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idgrupo);
            $consulta->execute();

            if ($consulta->rowCount() > 0) {
                return $consulta;
            } else {
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_mat_tipo($idtipo)
    {
        try
        {
            $sql = "SELECT * FROM materias where id_tipo= ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idtipo);
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

    public function get_pro_tipo($idtipo)
    {
        try
        {
            $sql = "SELECT * FROM profesores where id_tipo_profe =?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idtipo);
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
} //cierra clase
