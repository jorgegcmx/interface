<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
	private $idperiodos;
    private $periodoescolar;
	private $anio;
	private $stus;

    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
    public function set_p($id,$periodoescolar,$anio,$stus){
    $this->idperiodos = $id;
	  $this->periodoescolar = $periodoescolar;
	   $this->anio = $anio;
	    $this->stus = $stus;
    }
   
    
    public function get_p($id = null)
    {
        try
        {
    $sql = "SELECT * FROM periodosescolares";
        
        if($id != null){
        $sql .= " WHERE idperiodos =?";
            
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
    
    public function add_p(){
        try{
             if($this->idperiodos == null){
                 
        $sql= "INSERT INTO periodosescolares VALUES(0,?,?,?)";
                 
    }else{
        $sql = "UPDATE periodosescolares "
		. " SET periodoescolar = ?,"
		. " anio = ?,"
		. " stus= ?"
		." WHERE idperiodos =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->periodoescolar);
			$consulta->bindparam(2,$this->anio);
			$consulta->bindparam(3,$this->stus);
       
            if($this->idperiodos !=null){
                $consulta->bindparam(4, $this->idperiodos);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
		
	public function del_p($id){
      try{
          $sql = "DELETE FROM periodosescolares WHERE idperiodos = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
 
  public function comprobar($stus)

     {
     try{

     $sql = "SELECT * FROM  periodosescolares WHERE stus = ? ";

     $consulta = $this->con->prepare($sql);
     $consulta->bindParam(1, $stus);
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