
<?php
session_start();
if(!isset($_SESSION['login'])){
  header("Location:../../index.php");
}

include_once 'Classe.php';
$usu1 = new Classe();
$datos = $usu1->get_p(null);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quimestres</title>

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
				<a type="button" href="form.php" class="btn btn-primary">Nuevo Quimestre</a>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"> <h2>Listado de Quimestres</h2></div>
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th></th>
						        							
						    </tr>
						    </thead>
							 <tbody>

                             <?php
                             while($fila = $datos->fetchObject()){
                             ?>
                                    <tr>
                                        <td>
										
										<div class="card-view">
												<span class="title" style="">Quimestre</span>
												<span><?php echo $fila->periodoescolar; ?></span>
										</div>
										<div class="card-view">
												<span class="title" style="">Año</span>
												<span><?php echo $fila->anio; ?></span>
										</div>

										<div class="card-view">
												<span class="title" style="">Estatus</span>
												<span><?php if($fila->stus==1){echo "Activo" ;}else{echo "Cerrado" ;}  ?></span>
										</div>
										<div class="card-view">
												<span class="title" style=""></span>
												<span><a href="formedit.php?id=<?php echo $fila->idperiodos; ?> " class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i> Editar</a></span>
										</div>
										<div class="card-view">
												<span class="title" style=""></span>
												<span><a href="borrar.php?id=<?php echo $fila->idperiodos; ?>" class="btn btn-danger btn-xs" id="confirmacion"><i class="fa fa-trash-o"></i> Borrar</a></span>
										</div>
									    </td>                                   
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
