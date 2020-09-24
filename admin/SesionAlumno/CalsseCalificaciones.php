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
    
    public function set_cali($id,$alumnos_idalumnos,$grpos_idgrupos,$materias_idmaterias,$calificacion){
    $this->idcalificaciones= $id;
	  $this->alumnos_idalumnos= $alumnos_idalumnos;
    $this->grpos_idgrupos= $grpos_idgrupos;
	 $this->materias_idmaterias = $materias_idmaterias;
	 $this->calificacion = $calificacion;
 
    }
       public function get_parcial($id = null)
    {
        try
        {
    $sql = " SELECT * from parcial ;
";
        
        if($id != null){
        $sql .= " WHERE idparcial =?";
            
        }
        
        $consulta = $this->con->prepare($sql);
        
        if($id != null){
        $consulta->bindParam(1,$id);
        }
    $consulta->execute();
        $this->con = null;
        
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
            return $consulta;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
  
   public function get_grupo($filtro)
    {
        try
        {
    $sql = "SELECT *  FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos like ?
	GROUP BY  grupos_idgrupos
    ";
        
        $consulta = $this->con->prepare($sql);
        
    
        $consulta->bindParam(1, $filtro);
      
        
        $consulta->execute();
        $this->con = null;
        
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
           return $consulta; 
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
 
 public function get_buscali($filtro,$idgrupos)
    {
        try
        {
    $sql = "SELECT *  FROM calificaciones join alumnos on alumnos.idalumnos=calificaciones.alumnos_idalumnos
	join grupos on grupos.idgrupos=calificaciones.grupos_idgrupos
	join materias on materias.idmaterias=calificaciones.materias_idmaterias
    join tipodegrupo on tipodegrupo.idtipodegrupo=grupos.tipodegrupo_idtipodegrupo where idalumnos like ? and idgrupos like ?
	GROUP BY  materias_idmaterias
    ";
        
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1, $filtro);
		$consulta->bindParam(2, $idgrupos);
      
        
        $consulta->execute();
        $this->con = null;
        
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
           return $consulta; 
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
  
   public function get_calificacion($idmateria,$idparcial,$alumnos_idalumnos)
    {
        try
        {
    $sql = "SELECT *  FROM calificaciones  where  materias_idmaterias like ? and parcial_idparcial like ? and alumnos_idalumnos like ?";
        
        $consulta = $this->con->prepare($sql);
        
    
        $consulta->bindParam(1, $idmateria);
		$consulta->bindParam(2, $idparcial);
		$consulta->bindParam(3, $alumnos_idalumnos);
      
        
        $consulta->execute();
        $this->con = null;
        
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
         return $consulta;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
  
   public function get_final($idmateria,$alumnos_idalumnos,$grupos_idgrupos)
    {
        try
        {
    $sql = "SELECT *, sum(calificacion) as finall  FROM calificaciones  where  materias_idmaterias like ? and alumnos_idalumnos like ? and grupos_idgrupos like ? ";
        
        $consulta = $this->con->prepare($sql);
            
        $consulta->bindParam(1, $idmateria);
		$consulta->bindParam(2, $alumnos_idalumnos);
		$consulta->bindParam(3, $grupos_idgrupos);
      
        
        $consulta->execute();
        $this->con = null;
        
        if($consulta->rowCount() > 0){
         return $consulta;   
        }else{
         return $consulta;
        }//fin else
        }catch(PDOExeption $e){
            print "Error:" . $e->getmessage();
        }
  }
  

 
}//cierra clase