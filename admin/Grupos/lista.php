<?php
	
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}
	include_once 'Classe.php';
    $usu1 = new Classe();
	$idgrupo =$_GET['idgrupo'];
	$nombregrupo =$_GET['nombregrupo'];
    $datos=$usu1->get_lista($idgrupo);	
?>
<!DOCTYPE html>
<html lang="es">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista</title>

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
                    <a href="../../Login/logout.php"><svg class="glyph stroked cancel"<?php echo $_SESSION['login']; ?>><use xlink:href="#stroked-cancel"></use></svg>Cerrar Sesion</a>
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
		<?php
		include_once '../menu/menu.php';
		?>

	</div><!--/.sidebar-->		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<div class="row">
			<div class="col-lg-12">
		 <input type="button" value="Imprimir" class="btn btn-info" onclick="window.print()">
			</div>
		</div><!--/.row-->			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">lista Grupo <b><?php echo $nombregrupo; ?></b></div>
			         <div class="panel-body">

			     <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
					 <thead>
						<th>Nombre</th>	            
					</thead>
					<tbody>
					<?php
					while($fila = $datos->fetchObject()){
					?>			
					   <tr>
						<td style="width:250px;"><a href="#" data-toggle="modal" data-target="#<?php echo $fila->idalumnos; ?>"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a> <?php echo $fila->nombrealumno; ?>  <?php echo $fila->apellidosalumno; ?></td>
					  </tr>	
					         <!--Historial-->
					         <div class="modal fade" id="<?php echo $fila->idalumnos; ?>" tabindex="-1" role="dialog" aria-labelledby="Alumno">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">                                  
                                          <div class="modal-header">
                                          <a  class="modal-title" style="color:black" ><?php echo $fila->nombrealumno." ".$fila->apellidosalumno; ?></a>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>                                          
                                          </div>                                          
                                            <div class="modal-body">
											<ul class="list-group">

											<li class="list-group-item d-flex justify-content-between align-items-center">
											     Nº DE MATRÍCULA:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->matricula; ?></span>
											</li>

											<li class="list-group-item d-flex justify-content-between align-items-center">
											    APELLIDOS:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->apellidosalumno; ?> </span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											     NOMBRES:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->nombrealumno; ?> </span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											    Nº DE CÉDULA:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->cedulaalumno; ?> </span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											    Nº CARNET DEL CONADIS:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->carnetconadis; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											     DISCAPACIDAD:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->discapacidad; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											    PORCENTAJE DE DISCAPACIDAD:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->porcentajediscapacidad; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
											    REPRESENTANTE LEGAL:
												<span class="badge badge-primary badge-pill" style="background:White; color:black"><?php echo $fila->representante; ?></span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="title" style="">Nº CÉDULA:</span>
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->cedularepresentante; ?> </span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                DIRECCIÓN DEL DOMICILIO:                                                
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->domicilio; ?> </span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                            TELÉFONO CONVENCIONAL:                                                
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->tlfconvencional; ?> </span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                TELÉFONO CELULAR:                                                
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->tlfcelular; ?> </span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                CORREO ELECTRÓNICO:                                                
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->email; ?> </span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                CÓDIGO DE LUZ:                                                
                                                <span class="badge badge-primary badge-pill" style="background:White; color:black"> <?php echo $fila->codigoluz; ?> </span>
                                            </li>
											</ul>
                                     


                                           

											</div>
                                        </div>
                                      </div>
                                </div>
                            <!--Historial-->
					  		
					<?php
					}
					?>
					</tbody>
				 </table>

                  </div>
			   </div>
			</div>
		</div><!--/.row-->
		
		
	</div><!--/.main-->
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
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