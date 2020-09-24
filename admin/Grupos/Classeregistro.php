<?php
require_once '../conexion/Conexion.php';
class Classeregistro
{
    private static $instancia;
    private $con;
	private $iddetalle_p_m;
    private $profesores_idprofesores;
	private $materias_idmaterias;
    private $grupos_idgrupos;
	
    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
    public function set_grupomateriaprofesor($id,$profesores_idprofesores,$materias_idmaterias,$grupos_idgrupos){
    $this->iddetalle_p_m = $id;
	  $this->profesores_idprofesores = $profesores_idprofesores;
    $this->materias_idmaterias = $materias_idmaterias;
	 $this->grupos_idgrupos = $grupos_idgrupos;

	

	  
    }
   
    
    public function get_grupomateriaprofesor($id = null)
    {
        try
        {
    $sql = "SELECT * FROM profesores_tiene_materias";
        
        if($id != null){
        $sql .= " WHERE iddetalle_p_m =?";
            
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
    
    public function add_grupomateriaprofesor(){
        try{
             if($this->iddetalle_p_m == null){
                 
        $sql= "INSERT INTO profesores_tiene_materias VALUES(0,?,?,?)";
                 
    }else{
        $sql = "UPDATE  profesores_tiene_materias"
		. " SET profesores_idprofesores  = ?,"
		. " materias_idmaterias= ?,"
		. " grupos_idgrupos= ?"
			
		." WHERE iddetalle_p_m =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->profesores_idprofesores);
            $consulta->bindparam(2,$this->materias_idmaterias);
			$consulta->bindparam(3,$this->grupos_idgrupos);
            

    
                        
            if($this->iddetalle_p_m !=null){
                $consulta->bindparam(4, $this->iddetalle_p_m);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
	
	
	public function del_grupomateriaprofesor($id){
      try{
          $sql = "DELETE FROM grupos WHERE idgrupos = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
  
   public function comprobar($materias_idmaterias,$grupos_idgrupos)

     {
     try{

     $sql = "SELECT * FROM  profesores_tiene_materias WHERE materias_idmaterias = ? AND grupos_idgrupos = ? ";

     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $materias_idmaterias);
     $consulta->bindParam(2, $grupos_idgrupos);
     $consulta->execute();

//SI EXISTE EL USUARIO

if($consulta->rowCount() == 1){
return true;

      }else {
        return false;
      }
		}catch(PDOExeption $e){
			print "Error: " .$e->getMessage();
		}
	}
 
}//cierra clase