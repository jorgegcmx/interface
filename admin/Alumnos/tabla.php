
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../../index.php");
}

include_once 'Classe.php';
$usu1 = new Classe();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $datos = $usu1->get_alum_tipo($id);
} else {
    $datos = $usu1->get_alum(null);
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alumnos</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/bootstrap-table.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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

		<br>
		<div class="row">
			<div class="col-lg-12">
				<a type="button" href="form.php" class="btn btn-primary">Nuevo Registro</a>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alumnos Registrados</div>
					<div class="panel-body">
						<table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
							    <th></th>
						    </tr>
						    </thead>
							 <tbody>

							 <?php
                             while ($fila = $datos->fetchObject()) {
                              ?>
                                    <tr>
                                        <td>
                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="#" data-toggle="modal" data-target="#<?php echo $fila->idalumnos; ?>" class="btn btn-primary btn-xs ask"  ><i class="fa fa-eye"></i > Historial</a></span>
                                            
                                            
                                            </div>
                                       
                                            <div class="card-view">
                                                <span class="title" style="">Nº DE MATRÍCULA:</span>
                                                <span class="value"> <?php echo $fila->matricula; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">APELLIDOS:</span>
                                                <span class="value"><?php echo $fila->apellidosalumno; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">NOMBRES:</span>
                                                <span class="value"><?php echo $fila->nombrealumno; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">Nº DE CÉDULA:</span>
                                                <span classclass="value"> <?php echo $fila->cedulaalumno; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">Nº CARNET DEL CONADIS:
                                                </span>
                                                <span class="value"> <?php echo $fila->carnetconadis; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">DISCAPACIDAD:</span>
                                                <span class="value"> <?php echo $fila->discapacidad; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">PORCENTAJE DE DISCAPACIDAD:</span>
                                                <span class="value"> <?php echo $fila->porcentajediscapacidad; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">REPRESENTANTE LEGAL:
                                                </span>
                                                <span class="value"> <?php echo $fila->representante; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">Nº CÉDULA:</span>
                                                <span class="value"> <?php echo $fila->cedularepresentante; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">DIRECCIÓN DEL DOMICILIO:
                                                </span>
                                                <span class="value"> <?php echo $fila->domicilio; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">TELÉFONO CONVENCIONAL:
                                                </span>
                                                <span class="value"> <?php echo $fila->tlfconvencional; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">TELÉFONO CELULAR:
                                                </span>
                                                <span class="value"> <?php echo $fila->tlfcelular; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">CORREO ELECTRÓNICO:
                                                </span>
                                                <span class="value"> <?php echo $fila->email; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style="">CÓDIGO DE LUZ:
                                                </span>
                                                <span class="value"> <?php echo $fila->codigoluz; ?> </span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="formalumnogrupo.php?id=<?php echo $fila->idalumnos; ?>&tipogrupo=<?php echo $_GET['id'];?>" class="btn btn-primary btn-xs"> Asignar Grupo -></a></span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="archivos/archivo.pdf" class="btn btn-success btn-md" target="_BLANK"> <i ></i>Carta de Compromiso</a></span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="form.php?id=<?php echo $fila->idalumnos; ?> " class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i> Editar</a></span>
                                            </div>                                            

                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="notas.php?id=<?php echo $fila->idalumnos; ?>&matricula=<?php echo $fila->matricula; ?>&nombre=<?php echo $fila->nombrealumno.''. $fila->apellidosalumno; ?>" class="btn btn-info btn-xs" ><i class="fa fa-eye"></i > Notas</a></span>
                                            </div>

                                            <div class="card-view">
                                                <span class="title" style=""></span>
                                                <span><a href="borrar.php?id=<?php echo $fila->idalumnos; ?>" class="btn btn-danger btn-xs ask" id="confirmacion" ><i class="fa fa-trash-o"></i > Borrar</a></span>
                                            </div>

                                        </td>                                
                                    </tr>

                                        <!--Historial-->
                                    <div class="modal fade" id="<?php echo $fila->idalumnos; ?>" tabindex="-1" role="dialog" aria-labelledby="Alumno">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">                                  
                                          <div class="modal-header">
                                          <a  class="modal-title" style="color:black" ><?php echo $fila->nombrealumno; echo $fila->apellidosalumno; ?></a>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>                                          
                                          </div>                                          
                                            <div class="modal-body">
                                               <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a  class="modal-title" style="color:black" ></a>    
                                                </li>
                                                <?php
                                                  $grupos = new Classe();
                                                  $grupo = $grupos->get_historial($fila->idalumnos);
                                                   while ($fil = $grupo->fetchObject()) {
                                                  ?>                                                 
                                                     <li class="list-group-item d-flex justify-content-between align-items-center"><b>GRUPO: <?php echo $fil->grupo; ?> </b><?php echo $fil->periodoescolar; echo $fil->anio; ?> <a href="borrar_detalle.php?id=<?php echo $fil->iddetalle_a_g; ?>"  id="confirmacion"> <i class="fa fa-trash" aria-hidden="true"></i></a> </li>
                                                                                           
                                               	<?php }?>
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
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/bootstrap-table.js"></script>
    <script src="../js/confirm.js"></script>
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
