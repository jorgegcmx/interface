
<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}


include_once 'classe.php';
$usu1 = new classe();

$cedula= 0;

$datos=$usu1->get_grup($cedula);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Periodos</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/bootstrap-table.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

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
				<a class="navbar-brand" href="../index.php"><span>Sistema</span>escolar</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Usuario<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><a href="../../Login/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['login']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Buscar">
			</div>
		</form>
				<?php
include_once '../menu/menu.php';
?>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Tus Grupos</li>
			</ol>
		</div><!--/.row-->
	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
					<div class="panel-heading"></div>
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th>Tus Grupos</th>
						        <th>Opciones</th>
								
						    </tr>
						    </thead>
							 <tbody>

                            <?php
	
        while($fila = $datos->fetchObject()){

		?>
                                    <tr>
                                      
                                        <td><?php echo "$fila->grupo"; 
										echo "_de_$fila->fechainicio";
										echo "_a_$fila->fechatermino";?></td>
										 <td> <form action="index.php" method="GET"> 
										  <input type="hidden" value="<?php echo $fila->idgrupos?>" name="id">
										  <input type="hidden" value="<?php 
										  echo "$fila->grupo"; 
										  echo "_de_$fila->fechainicio";
										  echo "_a_$fila->fechatermino";?>" name="grupo">
										  <button type="submit" class="btn btn-primary">Mostar Alumnos</button>
										 </form></td>
									</tr>
							 <?php
							 
                             }
                             ?>
          
         </tbody>
		 
						</table>
					</div>
				</div>
			</div>
			
			   <div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Apartado para agregar la Calificación</div>
					<div class="panel-body">
					
 <form role="form" action="agregar.php" method="POST">                      
	 <?php


  
     include_once 'classe.php';
        $usu = new classe();
		
   if(isset($_GET['id']) and isset($_GET['grupo']) ){
      $id=$_GET['id'];
	  $grupo=$_GET['grupo'];
	 echo"<label>Grupo</label>
	 <input value='".$id."' class='form-control' type='hidden' readonly='readonly' name='grupos_idgrupos' required >
	 <input value='".$grupo."' class='form-control' type='text' readonly='readonly'  required >";
     $alumno = $usu->get_alum($id);
	
	  echo"<div class='form-group'>";
     echo"<label>Alumnos</label>	
      <select class='form-control' name='alumnos_idalumnos' required>";
	
	  echo"<option value''></option>";
	  
	  while($filas = $alumno->fetchObject()){ 
      $idgrupos=$filas->idgrupos;
      
			echo"<option value='".$filas->idalumnos."'>".$filas->nombrealumno."</option>";		
	      	
		    }
		 echo"<select>";
		 
	} echo"</div>";                   
	                   echo"<label>	Materia</label>	
			            <select class='form-control' name='materias_idmaterias' required>
						";
						include_once 'classe.php';
                        $mat = new classe();

                        $cedula= $_SESSION['cedula'];
                  
                        $datoss=$mat->get_mat($idgrupos);
						echo"<option value''></option>";

						while($filass = $datoss->fetchObject()){
						
						echo"<option value='".$filass->idmaterias."'>".$filass->materia."</option>";
						}
                        echo"<select>";
			
?>		
						<div class="form-group">
									<label>Calificación</label>
									<input class="form-control" name="calificacion" type="number" required>
								</div>
									<div class="form-group">
									<label>Parcial</label>
									<select  name="parcial_idparcial" required class="form-control">
										<option value="" ></option>
                                       	<?php 
										$parcial = new Classe();
	                                    $fil = $parcial->get_parcial();
										
										while($dat=$fil->fetchObject()){ ?>
		                                 <option value="<?php echo $dat->idparcial; ?>"><?php echo "$dat->parcialcol";?></option>
                                         <?php } ?>
									</select>
								</div>
			<button type="submit" class="btn btn-primary">Guardar</button>
			          </form>	
        </div>
      </div>
    </div>
    </div><!--/.row-->	
		
		
		
	</div><!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
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
