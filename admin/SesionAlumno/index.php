
<?php
session_start();
if(!isset($_SESSION['matricula'])){
  header("Location:../../index.php");
}

include_once 'classe.php';
$usu1 = new classe();

$matricula=	$_SESSION['idalumnos'];

$datos=$usu1->get_b($matricula);

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

			
<table table data-toggle="table">
    <tr>
    <th></th>
    <th></th>
    </tr>
   <?php
   include_once 'CalsseCalificaciones.php';
   $grupo = new CalsseCalificaciones();
   $grup=$grupo->get_grupo($matricula);
   while($g = $grup->fetchObject()){  
  ?>
  <tr>
    <td> <b><?php echo $g->grupo;  ?></b> </td>
    <td>
         <table table data-toggle="table">
              <?php
              include_once 'CalsseCalificaciones.php';
              $usu1 = new CalsseCalificaciones();
              $datos=$usu1->get_buscali($matricula,$g->idgrupos);  
              ?>
              <tr>
                <th>Materias</th>
                   <?php  
                      $parcial = new CalsseCalificaciones();
                      $par=$parcial->get_parcial(null);
                       while($p = $par->fetchObject()){  
                      ?>
                <th style="text-align:center;"><?php echo $p->parcialcol; ?></th>
                      <?php  } ?>
                <th>Final</th>
               </tr>
                      <?php
                        while($fila = $datos->fetchObject()){
                      ?>
                     <tr>
                     <td><?php echo "$fila->materia";  ?></td>

                     <?php 
                     $parcia = new CalsseCalificaciones();
                     $pa=$parcia->get_parcial(null);
                     while($pu = $pa->fetchObject()){
                                       
                     ?>
                     <td style="text-align:center;">
				       <?php
                       $pu->idparcial;
                       $fila->idmaterias;
                       $uno=0;
                       $dos=0;
                       $tres=0;
                       $final=0;
                       $calificacion = new CalsseCalificaciones(); 
                       $cali=$calificacion->get_calificacion( $fila->idmaterias,$pu->idparcial,$fila->alumnos_idalumnos);	 
                        while($c = $cali->fetchObject()){
                        echo $c->calificacion;
                         } ?>
                     </td>

                          <?php
                             } 
                           ?>
     <td>
     <?php
     $final= new CalsseCalificaciones(); 
     $fin=$final->get_final( $fila->idmaterias,$fila->alumnos_idalumnos,$g->idgrupos);	 
      while($fi = $fin->fetchObject()){  
      echo number_format($fi->finall/3);                       
      } 	
     ?>
     </td>
      </tr>
        <?php
          }
        ?>
      </table>
    </td>
  </tr>
  <?php
    }
   ?>
</table>
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
