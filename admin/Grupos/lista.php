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
			<table class="table">
			<thead>
			<th>Nombre</th>	            
			</thead>
			<tbody>
            <?php
            while($fila = $datos->fetchObject()){
            ?>			
			<tr>
			<td style="width:250px;"><?php echo $fila->nombrealumno; ?> <?php echo $fila->apellidosalumno; ?></td>
		    </tr>
			
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