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
    
    public function set_cali($id,$alumnos_idalumnos,$grpos_idgrupos,$materias_idmaterias,$calificacion){
    $this->idcalificaciones= $id;
	  $this->alumnos_idalumnos= $alumnos_idalumnos;
    $this->grpos_idgrupos= $grpos_idgrupos;
	 $this->materias_idmaterias = $materias_idmaterias;
	 $this->calificacion = $calificacion;
 
    }
/*
 
 public function get_buscali($matricula)
    {
        try
        {
    $sql = "SELECT *, 
    GROUP_CONCAT(materia,' Promedio: ',calificacion,'  ') materias, SUM(calificacion)AS finall
    FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos LIKE '%$matricula'
    GROUP BY  grupos_idgrupos
    HAVING COUNT(alumnos_idalumnos)>0 ";
        
        $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $iten);
    
     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
	
        return $consulta;  

      }else {
        return $consulta;  
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}
  
  public function get_mat($matricula)
    {
        try
        {
    $sql = "SELECT *
    FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos LIKE '%$matricula'
     ";
        
        $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $iten);
    
     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
	
        return $consulta;  

      }else {
        return $consulta;  
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}*/
	
	 public function get_b($matricula)
    {
        try
        {
    $sql = "SELECT *
    FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos LIKE '%$matricula' 
    GROUP BY  grupos_idgrupos";
        
        $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $iten);
    
     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
	
        return $consulta;  

      }else {
        return $consulta;  
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}
	 public function get_2($matricula,$idgrupos)
    {
        try
        {
    $sql = "SELECT *, 
    GROUP_CONCAT('Parcial-',parcial_idparcial,' Promedio= ',calificacion,'  ') parciales, SUM(calificacion/3)AS Finall
    FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos = ? and idgrupos = ?
    GROUP BY  materias_idmaterias ";
        
      $consulta = $this->con->prepare($sql);
      $consulta->bindParam(1, $matricula);
	  $consulta->bindParam(2, $idgrupos);
    
     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
	
        return $consulta;  

      }else {
        return $consulta;  
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}
	 
}//cierra clase