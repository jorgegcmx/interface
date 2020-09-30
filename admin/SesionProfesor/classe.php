<?php
require_once '../conexion/Conexion.php';
class classe
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

    public function get_grup($cedula)
    {
        try
        {
            $sql = " select * from profesores
    join profesores_tiene_materias on profesores_tiene_materias.profesores_idprofesores=profesores.idprofesores
    join materias on materias.idmaterias=profesores_tiene_materias.materias_idmaterias
    join grupos on grupos.idgrupos=profesores_tiene_materias.grupos_idgrupos
    join alumnos_tiene_grupos on alumnos_tiene_grupos.grupos_idgrupos=grupos.idgrupos
    join periodosescolares on periodosescolares.idperiodos= alumnos_tiene_grupos.periodosescolares_idperiodos
    where cedula = ? and stus='1' group by idgrupos";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $cedula);
            $consulta->execute();
           if ($consulta->rowCount() >= 1) {
                return $consulta;
            } else {
                return $consulta;            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function get_grup_notas($idgrupo,$idperiodo)
    {
        try
        {
            $sql = " select * from alumnos
            join alumnos_tiene_grupos on alumnos_tiene_grupos.alumnos_idalumnos=alumnos.idalumnos    
            join periodosescolares on periodosescolares.idperiodos= alumnos_tiene_grupos.periodosescolares_idperiodos
            where alumnos_tiene_grupos.grupos_idgrupos= ? and periodosescolares.idperiodos= ?  and stus='1' ";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idgrupo);
            $consulta->bindParam(2, $idperiodo);
            $consulta->execute();
           if ($consulta->rowCount() > 1) {
                return $consulta;
            } else {
                return $consulta;            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }


    public function get_alum($idgrupos)
    {
        try
        {
            $sql = " select distinct alumnos.*,grupos.* from grupos
  	join alumnos_tiene_grupos on alumnos_tiene_grupos.grupos_idgrupos=grupos.idgrupos
	join alumnos on alumnos.idalumnos=alumnos_tiene_grupos.alumnos_idalumnos
    join periodosescolares on periodosescolares.idperiodos= alumnos_tiene_grupos.periodosescolares_idperiodos
     where idgrupos
	 = ? and stus='1'";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $idgrupos);
            $consulta->execute();
            if ($consulta->rowCount() == 1) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }

    public function get_mat($cedula, $idgrupos)
    {
        try
        {
            $sql = "select * from grupos
    join profesores_tiene_materias on profesores_tiene_materias.grupos_idgrupos=grupos.idgrupos
    join materias on materias.idmaterias=profesores_tiene_materias.materias_idmaterias
    join profesores on profesores.idprofesores=profesores_tiene_materias.profesores_idprofesores
    where cedula= ? and idgrupos= ?";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $cedula);
            $consulta->bindParam(2, $idgrupos);
            $consulta->execute();

            if ($consulta->rowCount() == 1) {
                return $consulta;
            } else {
                return $consulta;
            }
        } catch (PDOExeption $e) {
            print "Error: " . $e->getMessage();
        }
    }
    public function get_parcial()
    {
        try
        {
            $sql = "SELECT * FROM parcial";
            $consulta = $this->con->prepare($sql);
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
                return $consulta;
            } //fin else
        } catch (PDOExeption $e) {
            print "Error:" . $e->getmessage();
        }
    }

    public function get_periodos_id($id)
    {
        try
        {
            $sql = "SELECT * FROM periodosescolares where idperiodos= ?  and stus=1";

            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $id);
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


    public function update_nota($nota,$id){
        try{
            $sql = "UPDATE calificaciones SET calificacion = ? WHERE idcalificaciones = ?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1, $nota);
            $consulta->bindParam(2, $id);            
            $consulta->execute();
            $this->con = null;
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
        }
    }

} //cierra clase
