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
    where cedula LIKE '%$cedula' and stus='1' group by idgrupos";
        
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
  public function get_alum($idgrupos)
    {
        try
        {
    $sql = " select * from grupos
  	join alumnos_tiene_grupos on alumnos_tiene_grupos.grupos_idgrupos=grupos.idgrupos
	join alumnos on alumnos.idalumnos=alumnos_tiene_grupos.alumnos_idalumnos
    join periodosescolares on periodosescolares.idperiodos= alumnos_tiene_grupos.periodosescolares_idperiodos where idgrupos
	LIKE '%$idgrupos' and stus='1'";
        
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
	
	  public function get_mat($cedula,$idgrupos)
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
   public function get_parcial()
    {
        try
        {
     $sql = "SELECT * FROM parcial";
        
        $consulta = $this->con->prepare($sql);
       
         $consulta->execute();
       
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
            return false;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
	
}//cierra clase