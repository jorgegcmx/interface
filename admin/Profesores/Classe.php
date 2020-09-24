<?php
require_once '../conexion/Conexion.php';
class Classe
{
    private static $instancia;
    private $con;
	private $idprofesores;
    private $cedula;
	private $nombreprofesor;
    private $direccionp;
	private $telefonop;
    private $password;
    private $id_tipo_profe;
    private $apellidoprofesor;
    private $emailp;
    		
    
    public function __construct()
    {
     $this->con = Conexion::singleton_conexion();   
    }
    
    public function set_pro($id,$cedula,$nombreprofesor,$direccionp,$telefonop,$password,$id_tipo_profe, $apellidoprofesor,$emailp){
     $this->idprofesores = $id;
	 $this->cedula = $cedula;
     $this->nombreprofesor = $nombreprofesor;
	 $this->direccionp = $direccionp;
	 $this->telefonop = $telefonop;
	 $this->password= $password;
     $this->id_tipo_profe= $id_tipo_profe;
     $this->apellidoprofesor= $apellidoprofesor;
     $this->emailp= $emailp;		  
    }
   
    
    public function get_pro($id = null)
    {
        try
        {
    $sql = "SELECT * FROM profesores inner join tipodegrupo on tipodegrupo.idtipodegrupo=profesores.id_tipo_profe";
        
        if($id != null){
        $sql .= " WHERE idprofesores =?";
            
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

      
  public function get_pro_tipo($id = null)
  {
      try
      {
     $sql = "SELECT * FROM profesores inner join tipodegrupo on tipodegrupo.idtipodegrupo=profesores.id_tipo_profe";
      
      if($id != null){
      $sql .= " WHERE id_tipo_profe =?";
          
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
    
    public function add_pro(){
        try{
             if($this->idprofesores == null){
                 
        $sql= "INSERT INTO profesores VALUES(0,?,?,?,?,?,?,?,?)";
                 
    }else{
        $sql = "UPDATE  profesores"
		. " SET cedula = ?,"
		. " nombreprofesor = ?,"
		. " direccionp= ?,"
		. " telefonop= ?,"
        . " password= ?,"
        . " id_tipo_profe= ?,"
        . " apellidoprofesor= ?,"
        . " emailp= ?"	
		." WHERE idprofesores =?";
    }
	        
            $consulta = $this->con->prepare($sql);
            $consulta->bindparam(1,$this->cedula);
            $consulta->bindparam(2,$this->nombreprofesor);
			$consulta->bindparam(3,$this->direccionp);
            $consulta->bindparam(4,$this->telefonop);
            $consulta->bindparam(5,$this->password);
            $consulta->bindparam(6,$this->id_tipo_profe);
            $consulta->bindparam(7,$this->apellidoprofesor);
            $consulta->bindparam(8,$this->emailp);  
                        
            if($this->idprofesores !=null){
                $consulta->bindparam(9, $this->idprofesores);
            }
            $consulta->execute();
			return $sql;
            $this->con = null;
            
        } catch (PDOEception $ex){
        print "Error:" . $e->getMessage();
        }
    }
	
	
	public function del_pro($id){
      try{
          $sql = "DELETE FROM profesores WHERE idprofesores = ?";
          $consulta = $this->con->prepare($sql);
          $consulta->bindParam(1, $id);
          $consulta->execute();
          $this->con = null;
      } catch (PDOException $e) {
          print "Error: " . $e->getMessage();
      }
  }
 
 	  public function get_g_m($filtro)
    {
        try
        {
    $sql = "select idgrupos,idprofesores,cedula,nombreprofesor,grupo,fechainicio,fechatermino,diasdeclase,materia from profesores 
    join profesores_tiene_materias on profesores_tiene_materias.profesores_idprofesores=profesores.idprofesores
    join materias on materias.idmaterias=profesores_tiene_materias.materias_idmaterias
    join grupos on grupos.idgrupos=profesores_tiene_materias.grupos_idgrupos
    where cedula = ? group by idgrupos";
        
       
        
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
 
   public function get_periodos()
    {
        try
        {
     $sql = "SELECT * FROM periodosescolares where stus=1";
        
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
   public function get_gru($id = null)
    {
        try
        {
    $sql = "select idgrupos,idprofesores,cedula,nombreprofesor,grupo,fechainicio,fechatermino,diasdeclase,materia from profesores 
    join profesores_tiene_materias on profesores_tiene_materias.profesores_idprofesores=profesores.idprofesores
    join materias on materias.idmaterias=profesores_tiene_materias.materias_idmaterias
    join grupos on grupos.idgrupos=profesores_tiene_materias.grupos_idgrupos";
        
        if($id != null){
        $sql .= " WHERE idgrupos =?";
            
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
      
	  public function get_mat($id = null)
    {
        try
        {
    $sql = "SELECT * FROM materias";
        
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
    public function verificar($profesores_idprofesores,$grupos_idgrupos,$materias_idmaterias)

     {
     try{

     $sql = "SELECT * FROM  profesores_tiene_materias WHERE profesores_idprofesores= ? AND grupos_idgrupos = ? AND materias_idmaterias= ? ";

     $consulta = $this->con->prepare($sql);
	  $consulta->bindParam(1, $profesores_idprofesores);
     $consulta->bindParam(2, $grupos_idgrupos);
     $consulta->bindParam(3, $materias_idmaterias);
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
?>