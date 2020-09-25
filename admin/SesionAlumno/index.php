
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
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<br>
    <br>
    <div class="form-group">
			<img class="logo" src="../../front/img/logo.png"></img>			        
	 </div>
	 <div align="center">
	 <input type="button" value="Imprimir" class="btn btn-primary" onclick="window.print()">
     </div>		 
	</div><!--/.sidebar-->		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body">		
					<h3>
						Matricula:<?php echo $_SESSION['matricula']; ?> 
					</h3>
					  <h3>
					   Alumno:<?php echo $_SESSION['nombrealumno'];?>
			    	</h3>			

   <?php
   include_once 'CalsseCalificaciones.php';
   $ciclo = new CalsseCalificaciones();
   $cicl=$ciclo->get_ciclo($matricula);
   while($ci = $cicl->fetchObject()){ 
        
     $ci->idperiodos;
    echo "<h4>".$ci->periodoescolar." DEL AÑO ".$ci->anio."</h4>";

    $grupo = new CalsseCalificaciones();
    $grup=$grupo->get_grupo($matricula,$ci->idperiodos);
    while($g = $grup->fetchObject()){  
    ?>
    <table class="table">
    <tr>
    <th></th>
    <th></th>
    </tr>
    <tr>
    <td> <b><?php echo $g->grupo;  ?></b> </td>
             <td>
              <table class="table">
              <?php
            
              $usu1 = new CalsseCalificaciones();
              $datos=$usu1->get_buscali($matricula,$g->idgrupos);  
              ?>
                <!---------------------------------HEADER DE LA TABLA------------------------------------->
                   <tr>
                     <th>ASIGNATURAS</th>
                   <?php  
                      $parcial = new CalsseCalificaciones();
                      $par=$parcial->get_parcial(null);
                       while($p = $par->fetchObject()){  
                      ?>
                       <th style="text-align:center;"><?php echo $p->parcialcol; ?></th>
                      <?php  } ?>

                     <th style="text-align:center;">PROMEDIO 80%</th>

                     <?php 
                      $examen = new CalsseCalificaciones();
                      $exa=$examen->get_examen(null);
                       while($e = $exa->fetchObject()){  
                      ?>
                       <th style="text-align:center;"><?php echo $e->parcialcol; ?></th>
                      <?php  } ?>     

                      <th style="text-align:center;">PROMEDIO EXAMEN 20%</th>
                      <th style="text-align:center;">PROMEDIO</th>
                     </tr>
                     <!----------------------------------------------------------------------------------->
                     <!---------------------------------DETALLE------------------------------------->
                      <?php
                        while($fila = $datos->fetchObject()){
                      ?>
                     <tr>
                     <td><?php echo $fila->materia;  ?></td>
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
                             echo ($EXAMEN*0.20+ $PROMEDIOpARCIAL  )                        
                           ?>                          
                          </td>
                        <?php  } ?>                       

                   </tr>
                          <!----------------------------------------------------------------------------------->
           <?php
          }
        ?>
      </table>
    </td>
  </tr>
  </table>
  <?php
    }
   ?>
<?php   }   ?>
   

	</div>
	</div>
	</div>
	</div><!--/.row-->	
	</div><!--/.main-->

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
