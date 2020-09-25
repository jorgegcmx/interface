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
		<?php if (isset($_GET['error'])) {?>
			<div align="center">
                <div class="w3-panel w3-red">
                  <h3 style="color:white">Error la contraseña no concide, intenta nuevamente!</h3>                 
             </div>
             </div>
           <?php }?>			
			<div class="login-panel panel panel-default">
				<div class="panel-heading" align="center">Recupera tu Contrasena</div>				 
				<div class="panel-body">
					<form role="form"  action="update.php" method="post">
                       <?php if(isset($_GET['email'])){ echo "<input  name='id' type='hidden' value='".$_GET['email']."' >";}?>
						
							<div class="form-group">
                                <label for="message-text" class="control-label">Ingresa tu nueva contraseña</label>
								<input class="form-control" required  name="password1" type="password" >
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Confirma tu contraseña</label>
								<input class="form-control" required name="password2" type="password" >
							</div>
								<button type="submit" name="btnfiltrar" class="btn btn-primary">Actualizar contraseña</button>			
						
					</form>
				</div>
			</div>			
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
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
