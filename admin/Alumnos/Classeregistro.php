<?php
require_once '../conexion/Conexion.php';
class Classeregistro
{
    private static $instancia;
    private $con;
	private $iddetalle_a_g;
    private $alumnos_idalumnos;
	private $grupos_idgrupos;
	private $periodosescolares_idperiodos;

  
	
    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
    public function set_alumygrupo($id,$alumnos_idalumnos,$grupos_idgrupos,$periodosescolares_idperiodos){
    $this->iddetalle_a_g = $id;
	 $this->alumnos_idalumnos = $alumnos_idalumnos;
	 $this->grupos_idgrupos = $grupos_idgrupos;
    $this->periodosescolares_idperiodos = $periodosescolares_idperiodos;
	

	  
    }
   
    
    public function get_alumygrupo($id = null)
    {
        try
        {
    $sql = "SELECT * FROM alumnos_tiene_grupos";
        
        if($id != null){
        $sql .= " WHERE iddetalle_a_g =?";
            
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
    
    public function add_alumygrupo(){
        try{
             if($this->iddetalle_a_g == null){
                 
        $sql= "INSERT INTO alumnos_tiene_grupos VALUES(0,?,?,?)";
                 
    }else{
        $sql = "UPDATE  alumnos_tiene_grupos"
		. " SET alumnos_idalumnos  = ?,"
		. " grupos_idgrupos= ?,"
		. " periodosescolares_idperiodos= ?"
			
		." WHERE iddetalle_a_g =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->alumnos_idalumnos);
      		$consulta->bindparam(2,$this->grupos_idgrupos);
            $consulta->bindparam(3,$this->periodosescolares_idperiodos);

    
                        
            if($this->iddetalle_a_g !=null){
                $consulta->bindparam(4, $this->iddetalle_a_g);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
	
	
	public function del_alumygrupo($id){
      try{
          $sql = "DELETE FROM alumnos_tiene_grupos WHERE iddetalle_a_g = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
  
     public function comprobarche($alumnos_idalumnos,$grupos_idgrupos)

     {
     try{

     $sql = "SELECT * FROM  alumnos_tiene_grupos WHERE alumnos_idalumnos = ? AND grupos_idgrupos = ? ";

     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $alumnos_idalumnos);
    
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
	
   public function comprobarperiodo($alumnos_idalumnos,$periodosescolares_idperiodos)

     {
     try{

     $sql = "SELECT * FROM  alumnos_tiene_grupos WHERE alumnos_idalumnos = ? AND periodosescolares_idperiodos = ? ";

     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $alumnos_idalumnos);
    
	 $consulta->bindParam(2, $periodosescolares_idperiodos);
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
	
   public function comprobar($alumnos_idalumnos,$grupos_idgrupos,$periodosescolares_idperiodos)

     {
     try{

     $sql = "SELECT * FROM  alumnos_tiene_grupos WHERE alumnos_idalumnos = ? AND grupos_idgrupos = ? AND periodosescolares_idperiodos = ? ";

     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $alumnos_idalumnos);
     $consulta->bindParam(2, $grupos_idgrupos);
	 $consulta->bindParam(3, $periodosescolares_idperiodos);
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