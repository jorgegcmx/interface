<?php
require_once '../conexion/Conexion.php';
class CalsseCalificaciones
{
    private static $instancia;
    private $con;
    private $idcalificaciones;
    private $alumnos_idalumnos;
    private $grupos_idgrupos;
    private $materias_idmaterias;
    private $calificacion;

    public function __construct()
    {
        $this->con = Conexion::singleton_conexion();
    }

    public function set_cali($id, $alumnos_idalumnos, $grpos_idgrupos, $materias_idmaterias, $calificacion)
    {
        $this->idcalificaciones = $id;
        $this->alumnos_idalumnos = $alumnos_idalumnos;
        $this->grpos_idgrupos = $grpos_idgrupos;
        $this->materias_idmaterias = $materias_idmaterias;
        $this->calificacion = $calificacion;

    }

    public function get_parcial($id = null)
    {
        try
        {
            $sql = " SELECT * from parcial WHERE tipo_bloque=1 ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
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

    public function get_examen($id = null)
    {
        try
        {
            $sql = " SELECT * from parcial WHERE tipo_bloque=2 ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
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

    public function get_ciclo($id)
    {
        try
        {
            $sql = "SELECT * FROM periodosescolares inner join alumnos_tiene_grupos 
            on alumnos_tiene_grupos.periodosescolares_idperiodos=periodosescolares.idperiodos
             where   alumnos_tiene_grupos.alumnos_idalumnos = ?
            ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
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


    public function get_grupo($filtro,$id)
    {
        try
        {
            $sql = "SELECT *  FROM grupos  
            join alumnos_tiene_grupos on alumnos_tiene_grupos.grupos_idgrupos=grupos.idgrupos
            join alumnos on alumnos.idalumnos=alumnos_tiene_grupos.alumnos_idalumnos
            where idalumnos = ? and periodosescolares_idperiodos = ?
            ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $filtro);
            $consulta->bindParam(2, $id);
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


    public function get_buscali($filtro, $idgrupos)
    {
        try
        {
            $sql = "SELECT *  FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	          join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	          join materias on materias.idmaterias=calificaciones.materias_idmaterias
              join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos = ? and idgrupos = ?
	          GROUP BY  materias_idmaterias
              ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $filtro);
            $consulta->bindParam(2, $idgrupos);

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

    public function get_calificacion($idmateria, $idparcial, $alumnos_idalumnos,$idciclo)
    {
        try
        {
            $sql = "SELECT *  FROM calificaciones  where  materias_idmaterias = ? 
               and parcial_idparcial = ? 
               and alumnos_idalumnos = ? 
               and ciclo = ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idmateria);
            $consulta->bindParam(2, $idparcial);
            $consulta->bindParam(3, $alumnos_idalumnos);
            $consulta->bindParam(4, $idciclo);

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

    public function get_final($idmateria, $alumnos_idalumnos, $grupos_idgrupos,$idciclo)
    {
        try
        {
            $sql = "SELECT *, ((sum(calificacion)*0.80)/3) as finall  FROM calificaciones  
            where parcial='P' 
            and materias_idmaterias = ? 
            and alumnos_idalumnos = ? 
            and grupos_idgrupos = ?
            and ciclo = ? ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idmateria);
            $consulta->bindParam(2, $alumnos_idalumnos);
            $consulta->bindParam(3, $grupos_idgrupos);
            $consulta->bindParam(4, $idciclo);
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

    

} //cierra clase
