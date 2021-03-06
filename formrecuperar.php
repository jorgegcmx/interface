<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/datepicker3.css" rel="stylesheet">
<link href="admin/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="js/lumino.glyphs.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body >
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<?php if (isset($_GET['ok'])) {?>
              <div align="center">
                <div class="w3-panel w3-green">
                  <h3 style="color:white">Se envio un email para restablecer tu contraseña!</h3>
                   <p style="color:white">Revisa tu email</p>
             </div>
             </div>
           <?php }elseif(isset($_GET['error'])){?>
			<div align="center">
                <div class="w3-panel w3-red">
                  <h3 style="color:white">Error el email no se encuentra registradoe en el sistema</h3>                 
             </div>
             </div>
			<?php }?>
			<div class="login-panel panel panel-default">			
				<div class="panel-heading" align="center">Ingresa tú email para recuperar contraseña</div>				 
				<div class="panel-body">
					<form  action="envio.php" method="post">			
							<div class="form-group">
								<input class="form-control" placeholder="email" name="correo" type="text" >
							</div>
							<button type="submit" name="btnfiltrar" class="btn btn-primary">Recuperar contraseña</button>		
						
					</form>
				</div>
			</div>
			
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-table.js"></script>
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
