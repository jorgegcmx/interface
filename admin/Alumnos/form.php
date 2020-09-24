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
        $datos = $usu1->get_formalum($id);
        $fila = $datos->fetchObject();
    }
    include_once 'Classe.php';		
	$estatus = new Classe();
	$filas = $estatus->get_estatus();
	
	$estatuss = new Classe();
	$filass = $estatuss->get_tipo();
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
<link href="../lib/jquery-ui.css" rel="stylesheet">
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
				<a class="navbar-brand" href="../index.php"><span>Unidad de Educación Especial "Claudio Neira Garzón</a>
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
				<h1 class="page-header">Nuevo Alumno</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<div class="col-md-6">
						<form role="form" method="POST" action="agregar.php" enctype="multipart/form-data"> 
                         <?php if(isset($id)){ echo "<input type='hidden' value='$fila->idalumnos' name='id'>"; }?>  
                         <?php if(isset($id)){ echo "<input type='hidden' value='$fila->password' name='password'>"; }?> 
                        <div class="form-group">
                            <label>Nº DE MATRÍCULA:</label>
                            <input type="number" name="matricula" class="form-control" min="1" required value="<?php  if(isset($id))
                            {echo  $fila->matricula;} ?>">
                        </div>

                        <div class="form-group">
                            <label>APELLIDOS:</label>
                            <input type="text" name="apellidosalumno" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->apellidosalumno ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>NOMBRES:</label>
                            <input type="text" name="nombresalumnos" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->nombrealumno ;} ?>">
                        </div>


                        <div class="form-group">
                            <label>Nº DE CÉDULA:</label>
                            <input type="text" name="cedulaalumno" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->cedulaalumno ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>Nº CARNET DEL CONADIS:</label>
                            <input type="text" name="carnetconadis" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->carnetconadis ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>DISCAPACIDAD:</label>
                            <input type="text" name="discapacidad" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->discapacidad ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>PORCENTAJE DE DISCAPACIDAD:</label>
                            <input type="text" name="porcentajediscapacidad" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->porcentajediscapacidad ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>REPRESENTANTE LEGAL:</label>
                            <input type="text" name="representante" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->representante ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>Nº CÉDULA:</label>
                            <input type="text" name="cedularepresentante" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->cedularepresentante ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>DIRECCIÓN DEL DOMICILIO:</label>
                            <input type="text" name="domicilio" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->domicilio ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>TELÉFONO CONVENCIONAL:</label>
                            <input type="tel" name="tlfconvencional" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->tlfconvencional ;} ?>">
                        </div>

                         <div class="form-group">
                            <label>TELÉFONO CELULAR:</label>
                            <input type="tel" name="tlfcelular" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->tlfcelular ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>CORREO ELECTRÓNICO:</label>
                            <input type="email" name="email" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->email ;} ?>">
                        </div>

                        <div class="form-group">
                            <label>CÓDIGO DE LUZ:</label>
                            <input type="text" name="codigoluz" class="form-control" required value="<?php  if(isset($id))
                            {echo  $fila->codigoluz ;} ?>">
                        </div>
						<div class="form-group">
									<label>TIPO:</label>
									<select  name="tipodegrupo_idtipodegrupo" class="form-control">
										 <option ></option>
                                       	<?php while($data=$filass->fetchObject()){ ?>		
	                                   <option value="<?php echo $data->idtipodegrupo; ?>" <?php if(isset($id)){if ($fila->id_tipo_alumno == $data->idtipodegrupo){?>selected<?php }} ?>><?php echo $data->tipodegrupo; ?></option>
                                         <?php } ?>
									</select>
						</div>
                        <button type="submit" value="subir" name="subir" class="btn btn-primary">Guardar</button>
                    </form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
<script src="../lib/external/jquery/jquery.js"></script>
  <script src="../lib/jquery-ui.js"></script>
	<script>


$( "#reuno" ).datepicker({	
 
	dateFormat:'yy-mm-dd',	
	
});

$( "#redos" ).datepicker({

	dateFormat:'yy-mm-dd',	
	
});

</script>

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
