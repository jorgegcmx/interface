<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once '../conexion/Conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        include_once 'Classe.php';
        $usu1 = new Classe();
        $datos = $usu1->get_gru($id);
        $fila = $datos->fetchObject();
    }
	include_once 'Classe.php';
	
	$estatus = new Classe();
	$filas = $estatus->get_tipo();
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nuevo</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="../js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="../js/html5shiv.js"></script>
<script src="../js/respond.min.js"></script>
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
				<h1 class="page-header">Nuevo Grupos</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="agregar.php"	>	
                               <?php if(isset($id)){ echo "<input type='hidden' value='$fila->idgrupos' name='id'>"; }?>							
								<div class="form-group">
									<label>Grupo</label>
									<input type="text" name="grupo" class="form-control" required value="<?php  if(isset($id)){echo  $fila->grupo;} ?>">
								</div>
																
								<div class="form-group">								
									<input type="hidden" name="fechainicio" class="form-control" required value="<?php  if(isset($id)){echo  $fila->fechainicio;}else{ echo "11:43";} ?>">
								</div>
								
								<div class="form-group">							
									<input type="hidden" name="fechatermino" class="form-control" required value="<?php  if(isset($id)){echo  $fila->fechatermino;}else{ echo "11:43";} ?>">
								</div>
						
								<div class="form-group">							
									<input type="hidden" name="diasdeclase" class="form-control" required value="<?php  if(isset($id)){echo  $fila->diasdeclase;}else{ echo "0";} ?>">
								</div>
								<div class="form-group">
									<label></label>
									<input type="hidden" name="nummaterias" class="form-control" required value="<?php  if(isset($id)){echo  $fila->totalmaterias;}else{echo "1";} ?>">
								</div>
								<div class="form-group">
									<label>Tipo:</label>
									<select  name="tipodegrupo_idtipodegrupo" class="form-control">
										 <option ></option>
                                       	<?php while($data=$filas->fetchObject()){ ?>		
	                                   <option value="<?php echo $data->idtipodegrupo; ?>" <?php if(isset($id)){if ($fila->tipodegrupo_idtipodegrupo == $data->idtipodegrupo){?>selected<?php }} ?>><?php echo $data->tipodegrupo; ?></option>
                                         <?php } ?>
									</select>
								</div>							
														
								<button type="submit" class="btn btn-primary">Guardar</button>
								
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
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
