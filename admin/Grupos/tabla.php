
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:../../index.php");
}

include_once 'Classe.php';
$usu1 = new Classe();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $datos = $usu1->get_gru_tipo($id);
} else {
    $datos = $usu1->get_gru(null);
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Grupos</title>

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
					<div class="panel-heading"><h2> Grupos Registrados- <?php if ($id == 1) {echo "Discapacidad Visual";} else {echo "Discapacidad Auditiva";}?></h2></div>
					<div class="panel-body">
					   <ul class="nav menu">
					        <?php
                              while ($fila = $datos->fetchObject()) {
                               ?>
                              <li>
								   <a href="#" class="grados" data-toggle="modal" data-target="#<?php echo $fila->idgrupos; ?>">
									  <svg class="gradosmatricula">
										  <use xlink:href="#stroked-pencil"/>
										</svg>
										<?php echo $fila->grupo; ?>
									</a>
									<div align="center">
									<a href="form.php?id=<?php echo $fila->idgrupos; ?> ">Editar</a>
									<a href="borrar.php?id=<?php echo $fila->idgrupos; ?>" >Borrar</a>
									</div>										
									  <!--ALUMNO-->
                                     <div class="modal fade" id="<?php echo $fila->idgrupos; ?>" tabindex="-1" role="dialog" aria-labelledby="Alumno">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">                                  
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                            <h4 align="center">
											  <a  class="modal-title" style="color:black" >Materias/Profesor</a>
											  <br>
											  <a href="formmaterias.php?id=<?php echo $fila->idgrupos; ?>&idtipo=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-xs" >+ Agregar materias y asignar profesor</a>
											  <br>
											  <a href="lista.php?idgrupo=<?php echo $fila->idgrupos; ?>&nombregrupo=<?php echo $fila->grupo; ?>" class="btn btn-primary btn-xs" >Alumnos registrados</a>
                                            </h4>
                                          </div>
                                           <div class="modal-body">
										          <?php
                                                  $usu2 = new Classe();
                                                  $datoss = $usu2->get_mat_por_tipo($fila->idgrupos);
                                                   while ($filas = $datoss->fetchObject()) {
                                                  ?>
												   <h6 align="center"> <b>Meteria :</b><?php echo $filas->materia; ?> / <b>Profesor :</b> <?php echo $filas->nombreprofesor; ?> <br>  </h6>
													<?php }?>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!--FIN ALUMNO-->
								</li>
							  <?php }?>
					        </ul>					 
						 
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
