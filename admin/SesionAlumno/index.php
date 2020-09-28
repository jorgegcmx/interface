
<?php
session_start();
if(!isset($_SESSION['matricula'])){
  header("Location:../../index.php");
}

//include_once 'classe.php';
//$usu1 = new classe();

$matricula=	$_SESSION['idalumnos'];

//$datos=$usu1->get_b($matricula);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sesión Alumno</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/bootstrap-table.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>


<script>
function printlayer(layer)
{
	var generator = window.open(",'name,");
	var layertext = document.getElementById(layer);
	generator.document.write(layertext.innerHTML.replace("Print Me"));	
	generator.document.close();
	generator.print();
	generator.close();
	
}
</script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../index.php">Unidad de Educación Especial "Claudio Neira Garzón</a>
				<ul class="user-menu">
				<li class="dropdown pull-right">
				<a href="../../LoginAlumno/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['matricula']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a>
						<ul class="dropdown-menu" role="menu">							
							<li></li>
						</ul>
					</li>				
				</ul>
			</div>							
		</div><!-- /.container-fluid -->
	</nav>		

	<!--div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<br>
    <br>
    <div class="form-group">
			<img class="logo" src="../../front/img/logo.png"></img>			        
	 </div>		 
	</div-->
  <!--/.sidebar-->	
	
<!--div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"-->	
  <div class="row">
			<div class="col-lg-12">
      <div class="panel panel-default">	
           <div class="panel-body">
             <div align="center">
	            <button type="button" class="btn btn-info"  onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Boleta</button>
            </div>
                  <h4>	Matricula: <?php echo $_SESSION['matricula']; ?>  </h4>
		              <h4> Alumno: <?php echo $_SESSION['nombrealumno'];?> <?php echo $_SESSION['apellidosalumno'];?> </h4>	
           </div>
        </div>
      </div>
    </div>
	<div class="row">		                  
   <?php
   $Gene1=0;
   $Gene2=0;
   $Gene3=0;
   $Gene4=0;
   $Gene5=0;
   $Gene6=0;
   $Gene7=0;
   $Gene8=0;
   $Gene9=0;
   $Gene10=0;
   include_once 'CalsseCalificaciones.php';
   $ciclo = new CalsseCalificaciones();
   $cicl=$ciclo->get_ciclo($matricula);
   while($ci = $cicl->fetchObject()){ 
    ?>
			<div class="col-lg-5">
				<div class="panel panel-default">	
 	       	<div class="panel-body">   
                <?php        
                 $ci->idperiodos;
                 echo "<h6>".$ci->periodoescolar." DEL AÑO ".$ci->anio."</h6>";
                 $grupo = new CalsseCalificaciones();
                 $grup=$grupo->get_grupo($matricula,$ci->idperiodos);
                 while($g = $grup->fetchObject()){  
                 ?>
                 <b><?php echo $g->grupo;  ?></b>
                 
                  <table>
                  <?php
                  $SUMA_PROMEDIO=0;
                  $items_asignaturas=0;
                  $usu1 = new CalsseCalificaciones();
                  $datos=$usu1->get_buscali($matricula,$g->idgrupos);  
                  ?>
                    <!---------------------------------HEADER DE LA TABLA------------------------------------->                
                   <tr>
                     <th style="font-size: x-small;"><small>ASIGNATURAS</small></th>
                      <?php  
                      $parcial = new CalsseCalificaciones();
                      $par=$parcial->get_parcial(null);
                       while($p = $par->fetchObject()){  
                      ?>
                     <th style="text-align:center; font-size: x-small;"><small><?php echo $p->parcialcol; ?></small></th>
                      <?php  } ?>
                     <th style="text-align:center; font-size: x-small;"> <small>PROMEDIO 80%</small></th>
                     <?php 
                      $examen = new CalsseCalificaciones();
                      $exa=$examen->get_examen(null);
                       while($e = $exa->fetchObject()){  
                      ?>
                       <th style="text-align:center; font-size: x-small;"><small><?php echo $e->parcialcol; ?></small></th>
                      <?php  } ?> 
                      <th style="text-align:center; font-size: x-small;"><small>PROMEDIO EXAMEN 20%</small></th>
                      <th style="text-align:center; font-size: x-small;"><small>PROMEDIO</small></th>
                     </tr>
                     <!----------------------------------------------------------------------------------->
                     <!---------------------------------DETALLE------------------------------------->
                      <?php  
                      $verificamateria=0;
                      $pro1=0;
                      $pro2=0;
                      $pro3=0;
                      $pro4=0;
                      $pro5=0;
                      $pro6=0;
                      $pro7=0;
                      $pro8=0;
                      $pro9=0;
                      $pro10=0;
                     
                      while($fila = $datos->fetchObject()){
                      $verificamateria= $verificamateria+1;
                      ?>
                     <tr>
                     <td style="font-size: x-small;"><small><?php echo $fila->materia;  ?></small> </td>
                     <?php                      
                     $parcia = new CalsseCalificaciones();
                     $pa=$parcia->get_parcial(null);
                     while($pu = $pa->fetchObject()){
                       ?>
                       <?php if( $pu->idparcial==1){  ?>                     
                       <td style="text-align:center; font-weight:bold;">
				               <?php                       
                       $calificacion = new CalsseCalificaciones(); 
                       $cali=$calificacion->get_calificacion( $fila->idmaterias,$pu->idparcial,$fila->alumnos_idalumnos,$ci->idperiodos);	 
                        while($c = $cali->fetchObject()){
                        echo $c->calificacion;
                         } ?>
                        </td>
                       <?php   }  ?>
                       <?php if( $pu->idparcial==2){  ?>                     
                       <td style="text-align:center; font-weight:bold;">
				               <?php                       
                       $calificacion = new CalsseCalificaciones(); 
                       $cali=$calificacion->get_calificacion( $fila->idmaterias,$pu->idparcial,$fila->alumnos_idalumnos,$ci->idperiodos);	 
                        while($c = $cali->fetchObject()){
                        echo $c->calificacion;
                         } ?>
                        </td>

                       <?php   }  ?>
                       <?php if( $pu->idparcial==3){  ?>                     
                       <td style="text-align:center; font-weight:bold;">
				               <?php                      
                        $calificacion = new CalsseCalificaciones(); 
                        $cali=$calificacion->get_calificacion( $fila->idmaterias,$pu->idparcial,$fila->alumnos_idalumnos,$ci->idperiodos);	 
                        while($c = $cali->fetchObject()){
                        echo $c->calificacion;
                         } ?>
                        </td>
                        <?php   }  ?>
                       
                         <?php
                             } 
                          ?>
                         <td style="text-align:center; font-weight:bold;">
                         <?php
                         $PROMEDIOpARCIAL=0;
                         $final= new CalsseCalificaciones(); 
                         $fin=$final->get_final( $fila->idmaterias,$fila->alumnos_idalumnos,$g->idgrupos,$ci->idperiodos);	 
                          while($fi = $fin->fetchObject()){  
                            echo  $PROMEDIOpARCIAL= round($fi->finall, 2);                       
                          } 	
                         ?>
                         </td>

                         <?php
                         $examen = new CalsseCalificaciones();
                         $exa=$examen->get_examen(null);
                          while($e = $exa->fetchObject()){  
                         ?>
                          <td style="text-align:center; font-weight:bold;">                           
                           <?php  
                            $EXAMEN=0;                          
                            $calificacion = new CalsseCalificaciones(); 
                            $cali=$calificacion->get_calificacion( $fila->idmaterias,$e->idparcial,$fila->alumnos_idalumnos,$ci->idperiodos);	 
                            while($c = $cali->fetchObject()){
                            echo $c->calificacion;
                            $EXAMEN=$c->calificacion;
                             }                           
                           ?>                          
                          </td>
                          <td style="text-align:center; font-weight:bold;">                           
                           <?php                            
                             echo $EXAMEN*0.20;                           
                           ?>                          
                          </td>
                          <td style="text-align:center; font-weight:bold;">                          
                           <?php                              
                            $items_asignaturas=$items_asignaturas+1; 
                            $SUMA_PROMEDIO=$SUMA_PROMEDIO+($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             echo ($EXAMEN*0.20 + $PROMEDIOpARCIAL);                         
                            
                             if($verificamateria==1){
                                $pro1=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==2){
                                $pro2=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==3){
                                $pro3=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==4){
                                $pro4=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==5){
                                $pro5=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==6){
                                $pro6=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==7){
                               $pro7=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==8){
                                $pro8=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==9){
                               $pro9=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }
                             if($verificamateria==10){
                               $pro10=($EXAMEN*0.20 + $PROMEDIOpARCIAL);
                             }                             
                             ?>                          
                          </td>                         
                        <?php  } ?>
                       </tr>
                    <!----------------------------------------------------------------------------------->
           <?php
            }
           ?>
                   <tr style="text-align:center; font-weight:bold;">
                   <td colspan="6"></td>
                   <td >SUMA</td>
                   <td ><?php echo $SUMA_PROMEDIO ?></td>
                   </tr>
                   <tr style="text-align:center; font-weight:bold;">
                   <td colspan="6"></td>
                   <td >PROMEDIO</td>
                   <td ><?php echo ($SUMA_PROMEDIO/$items_asignaturas) ?></td>
                   </tr>
      </table> 

  <?php                 
    $Gene1=$Gene1+$pro1;
    $Gene2=$Gene2+$pro2;
    $Gene3=$Gene3+$pro3;
    $Gene4=$Gene4+$pro4;
    $Gene5=$Gene5+$pro5;
    $Gene6=$Gene6+$pro6;
    $Gene7=$Gene7+$pro7;
    $Gene8=$Gene8+$pro8;
    $Gene9=$Gene9+$pro9;
    $Gene10=$Gene10+$pro10;
     }
   ?>
      </div>
	  </div>
</div>
<?php   }   ?>

<div class="col-lg-2">
		<div class="panel panel-default">	
 	     <div class="panel-body">
        <h6>PROMEDIO TOTAL QUIMESTRE</h6>
        <b>Inicial</b>
      <table> 
      <tr>
      <th style="font-size: x-small;">------ -------------</th>
      </tr>
       
      <?php  if( $Gene1!=0){?>
        <tr>
          <th> <?php echo $Gene1/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene2!=0){?>
        <tr>
          <th> <?php echo $Gene2/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene3!=0){?>
        <tr>
          <th> <?php echo $Gene3/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene4!=0){?>
        <tr>
          <th> <?php echo $Gene4/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene5!=0){?>
        <tr>
          <th> <?php echo $Gene5/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene6!=0){?>
        <tr>
          <th> <?php echo $Gene6/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene7!=0){?>
        <tr>
          <th> <?php echo $Gene7/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene8!=0){?>
        <tr>
          <th> <?php echo $Gene8/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene9!=0){?>
        <tr>
          <th> <?php echo $Gene9/2; ?></th>
        </tr>
      <?php } ?>
      <?php  if( $Gene10!=0){?>
        <tr>
          <th> <?php echo $Gene10/2; ?></th>
        </tr>
      <?php } ?>         
   </table>
	</div>
	</div>
	</div>
	</div><!--/.row-->	
	<!--/div--><!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>	
	<script src="../js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
