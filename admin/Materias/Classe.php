<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
	private $idmaterias;
    private $materia;
    private $tipo;

    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
    public function set_mat($id,$materia,$tipo){
      $this->idmaterias = $id;
      $this->materia = $materia;
      $this->id_tipo = $tipo;	  
    }
   
    
    public function get_mat($id = null)
    {
        try
        {
    $sql = "SELECT * FROM materias inner join tipodegrupo on tipodegrupo.idtipodegrupo=materias.id_tipo";
        
        if($id != null){
        $sql .= " WHERE idmaterias =?";
            
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

  public function get_mat_tipo($id = null)
  {
      try
      {
  $sql = "SELECT * FROM materias inner join tipodegrupo on tipodegrupo.idtipodegrupo=materias.id_tipo";
      
      if($id != null){
      $sql .= " WHERE id_tipo =?";
          
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
    
    public function add_mat(){
        try{
             if($this->idmaterias == null){
                 
        $sql= "INSERT INTO materias VALUES(0,?,?)";
                 
    }else{
        $sql = "UPDATE  materias"
        . " SET materia = ?,"
        . "id_tipo = ?"	
		." WHERE idmaterias =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->materia);
            $consulta->bindparam(2,$this->id_tipo);
       
            if($this->idmaterias !=null){
                $consulta->bindparam(3, $this->idmaterias);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
	
	
	public function del_mat($id){
      try{
          $sql = "DELETE FROM materias WHERE idmaterias = ?";
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