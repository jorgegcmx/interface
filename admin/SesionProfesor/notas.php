<?php
session_start();
if (!isset($_SESSION['cedula'])) {
    header("Location:../../index.php");
}

include_once 'classe.php';

$cedula = $_SESSION['cedula'];
$idgrupo = $_GET['id'];
$periodosescolares_idperiodos = $_GET['periodosescolares_idperiodos'];
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sesión Profesor</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/datepicker3.css" rel="stylesheet">
  <link href="../css/bootstrap-table.css" rel="stylesheet">
  <link href="../css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!--Icons-->
  <script src="../js/lumino.glyphs.js"></script>


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
            <a href="../../Login/logout.php"><svg class="glyph stroked cancel" <?php echo $_SESSION['cedula']; ?>>
                <use xlink:href="#stroked-cancel"></use>
              </svg>Cerrar Sesion</a>
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
  </div>
  <!--/.sidebar-->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i>Inicio</a>
            <div class="panel-heading">
              <h2>Grupo:<?php echo $_GET['grupo']; ?></h2>
            <?php 
            $estatus = new Classe();
            $filass = $estatus->get_periodos_id($periodosescolares_idperiodos);
            while($data=$filass->fetchObject()){ ?>
            <h3><?php echo $data->periodoescolar."-".$data->anio;?></h3>             
            </div>    

             <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true"
              data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
              data-sort-order="desc">
              <thead>
                <tr>
                  <th>Alumnos</th>
                       <?php
                        $parcial = new Classe();
                        $fil = $parcial->get_parcial();
                        while ($dat = $fil->fetchObject()) {?>
                        <th><?php echo $dat->parcialcol; ?></th>
                       <?php }?>                
                </tr>
                </thead>
                <tbody>
                <?php
                 $usu1 = new Classe();
                 $datos = $usu1->get_grup_notas($idgrupo,$data->idperiodos);
                 while ($fila = $datos->fetchObject()) {                    
                 ?>
                  <tr>
                    <td><b><?php echo $fila->nombrealumno." ".$fila->apellidosalumno; ?></b></td>
                    <?php
                        $parcial = new Classe();
                        $fil = $parcial->get_parcial();
                        while ($dat = $fil->fetchObject()) {?>
                        <td>
                            <div>             
                              <?php 
                              $mat = new classe();	
                              $datoss = $mat->get_mat($cedula, $idgrupo);                            
                              while ($materia = $datoss->fetchObject()) {
                                  ?>                                 
                                  <small><?php echo $materia->materia; ?>                               
                                    <?php                       
                                    $calificacion = new classe(); 
                                    $cali=$calificacion->get_calificacion($materia->idmaterias,$dat->idparcial,$fila->idalumnos,$data->idperiodos);	 
                                    while($c = $cali->fetchObject()){                                   
                                    ?>
                                    <b><a href="#" data-toggle="modal" data-target="#<?php echo $c->idcalificaciones; ?>">(<?php echo $c->calificacion; ?>)</a></b>
                                      <!--edita calificacion-->
                                      <div class="modal fade" id="<?php echo $c->idcalificaciones; ?>" tabindex="-1" role="dialog" aria-labelledby="Alumno">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">                                  
                                          <div class="modal-header">
                                          <a  class="modal-title" style="color:black" ><?php echo $materia->materia; ?></a>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>                                          
                                          </div>                                          
                                            <div class="modal-body">
                                            <form class="form-inline" action="update.php" method="POST">   
                                            <input type="hidden" name="id" value="<?php echo $c->idcalificaciones; ?>">                                         
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="inputPassword2" class="sr-only"></label>
                                                <input type="number" step="any" class="form-control" name="nota" value="<?php echo $c->calificacion; ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                                            </form>	
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!--edita calificacion-->
                                    <?php  }    ?>
                                  </small><br>
                               <?php }?>  
                             </div> 
                        </td>
                       <?php }?>                    
                   </tr>
                 <?php  }  ?>
              </tbody>
            </table>           

             <?php } ?>
          </div>
        </div>
      </div>      
    </div>
    <!--/.row-->

  </div>
  <!--/.main-->

  <script src="../js/jquery-1.11.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/chart.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/bootstrap-table.js"></script>
  <script>
    !function ($) {
      $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
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