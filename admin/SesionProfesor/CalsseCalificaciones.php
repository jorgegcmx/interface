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
    private $parcial;
	private $parcial_idparcial;

    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
   public function set_cali($id,$alumnos_idalumnos,$grpos_idgrupos,$materias_idmaterias,$calificacion,$parcial,$parcial_idparcial){
    $this->idcalificaciones= $id;
	  $this->alumnos_idalumnos= $alumnos_idalumnos;
    $this->grpos_idgrupos= $grpos_idgrupos;
	 $this->materias_idmaterias = $materias_idmaterias;
	 $this->calificacion = $calificacion;
	 $this->parcial = $parcial;
	 $this->parcial_idparcial = $parcial_idparcial;
 
    }

  
  
     public function add_cali(){
        try{
             if($this->idcalificaciones== null){
                 
        $sql= "INSERT INTO calificaciones VALUES(0,?,?,?,?,?,?)";
                 
    }else{
        $sql = "UPDATE  calificaciones"
		. " SET alumnos_idalumnos = ?,"
		. " grpos_idgrupos = ?,"
		. " materias_idmaterias= ?,"
		. " calificacion= ?,"
		. " parcial= ?,"
		. " parcial= ?"
		
		." WHERE idcalificaciones =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->alumnos_idalumnos);
            $consulta->bindparam(2,$this->grpos_idgrupos);
			$consulta->bindparam(3,$this->materias_idmaterias);
			$consulta->bindparam(4,$this->calificacion);
			$consulta->bindparam(5,$this->parcial);
			$consulta->bindparam(6,$this->parcial_idparcial);
          
    
                        
            if($this->idcalificaciones !=null){
                $consulta->bindparam(7, $this->idcalificaciones);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
	
	
	public function del_cali($id){
      try{
          $sql = "DELETE FROM calificaciones WHERE idcalificaciones = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
 public function comprobarregistro($alumnos_idalumnos,$grupos_idgrupos)

     {
     try{

     $sql = "SELECT * FROM  alumnos_tiene_grupos WHERE alumnos_idalumnos= ? AND grupos_idgrupos = ? ";

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
  public function comprobarcalificacion($alumnos_idalumnos,$grupos_idgrupos,$materias_idmaterias,$parcial)

     {
     try{

     $sql = "SELECT * FROM  calificaciones WHERE alumnos_idalumnos= ? AND grupos_idgrupos = ? AND materias_idmaterias= ? AND parcial_idparcial= ? ";

     $consulta = $this->con->prepare($sql);
	  $consulta->bindParam(1, $alumnos_idalumnos);
     $consulta->bindParam(2, $grupos_idgrupos);
     $consulta->bindParam(3, $materias_idmaterias);
	 $consulta->bindParam(4, $parcial);
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