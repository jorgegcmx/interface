<!DOCTYPE html>
<html lang="es">

<head>
  <title>Sistema escolar</title>
  <link rel="icon" href="fronts/img/logo.icon">
  <meta charset="utf-8">
  <!-- CSS -->

  <link href="fronts/css/bootstrap.min.css" rel="stylesheet" />
  <link href="fronts/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
  <link href="fronts/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

  <!-- SALTAR SECCIONES -->
  <section>
    <div id="enlaces">
      <ul>
        <a id="SaltaMP" href="#menu">Saltar al menu principal</a>
        <a id="SaltaSI" href="#main-slider">Saltar a la seccion de imagenes</a>
      </ul>
    </div>
  </section>
  <!-- FIN SALTAR SECCIONES -->

  <!-- TITULO -->
  <header>

    <?php if (isset($_GET['password'])) {?>
      <div align="center">
      <div class="w3-panel w3-green">
      <h3>Actualización de contraseña exitosa!</h3>
      <p>Ahora puedes inicias sesión.</p>
       </div>
       </div>
     <?php }?>

    <h1 class="Titulo">

      Unidad de Educación Especial <br />"Claudio Neira Garzón"
    </h1>
  </header>
  <!--FIN TITULO -->

  <!--MENU DE USUARIOS -->
  <nav class="mainnav">
    <div id="menu" class="container">
      <h2 class="screen-reader-text">Menu principal</h2>
      <ul>
        <a id="alumno" href="front/#" class="btn ubutia-btn" data-toggle="modal" data-target="#SeccionAlumnos">Alumnos
        </a>
        <a id="profesor" href="front/#" class="btn ubutia-btn" data-toggle="modal"
          data-target="#SeccionProfesores">Profesores</a>
        <a id="administrador" href="front/#" class="btn ubutia-btn" data-toggle="modal"
          data-target="#SeccionAdministrador">Administrador</a>
      </ul>
    </div>
  </nav>
  <!--FIN MENU DE USUARIOS -->

  <!-- SLIDER -->
  <section>
    <div class="container">
      <div id="main-slider" class="main-slider flexslider">
        <ul class="slides">
          <li>
            <img src="front/img/matricula.jpg" alt="Sistema de Matriculas" />
            <div class="flex-caption">
              <h3>Sistema de Matriculas</h3>
              <p>Maneja la informacion de matriculas</p>
            </div>
          </li>
          <li>
            <img src="front/img/notas.jpg" alt="Sistema de registro y visualizacion de calificaciones" />
            <div class="flex-caption">
              <h3>Sistema de registro y visualizacion de calificaciones</h3>
              <p>Los profesores pueden ingresar calificaciones y los alumnos consutar</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  <!--FIN SLIDER-->

   <!--ALUMNO-->
   <div class="modal fade" id="SeccionAlumnos" tabindex="-1" role="dialog" aria-labelledby="Alumno">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4>
            <a  class="modal-title" id="Alumno">Inicia Sesion Como Alumno</a>
          </h4>
        </div>

        <div class="modal-body">
          <form action="LoginAlumno/login.php" method="POST">
            <div class="form-group">
              <label input="text" for="recipient-alum" class="control-label">Matricula:</label>
              <input type="text" id="recipient-alum" class="form-control" name="usuario" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Contraseña:</label>
              <input type="password" id="message-text" class="form-control" name="password" required>
            </div>
            <div class="modal-footer">
              <a href="formrecuperar.php">Recuperar Contraseña</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" name="validar" class="btn btn-primary">OK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--FIN ALUMNO-->

  <!--PROFESOR-->
  <div class="modal fade" id="SeccionProfesores" tabindex="-1" role="dialog" aria-labelledby="Profesor">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4>
            <a  class="modal-title" id="Profesor">Inicia Sesion Como Profesor</a>
          </h4>
        </div>

        <div class="modal-body">
          <form action="LoginProfesor/login.php" method="POST">
            <div class="form-group">
              <label input="text" for="recipient-prof" class="control-label">Cedula:</label>
              <input type="text" id="recipient-prof" class="form-control" name="usuario" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Contraseña:</label>
              <input type="password" id="message-text" class="form-control" name="password" required>
            </div>
            <div class="modal-footer">
              <a href="formrecuperar.php">Recuperar Contraseña</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" name="validar" class="btn btn-primary">OK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--FIN PROFESOR-->

  <!--ADMINISTRADOR-->
  <div class="modal fade" id="SeccionAdministrador" tabindex="-1" role="dialog" aria-labelledby="Administrador">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4>
            <a  class="modal-title" id="eAdministrador">Inicia Sesion Como Administrador</a>
          </h4>
        </div>

          <div class="modal-body">
           <form action="Login/login.php" method="POST">
            <div class="form-group">
              <label input="text" for="recipient-admin" class="control-label">Usuario:</label>
              <input type="text" id="recipient-admin" class="form-control" name="username" required>
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Contraseña:</label>
              <input type="password" id="message-text" class="form-control" name="password" required>
            </div>

            <!--RECUPERAR CONTRASEÑA-->
            <div class="modal-footer">
              <a href="formrecuperar.php">Recuperar Contraseña</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">OK</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <!--FIN ADMINISTRADOR-->
  <!--ADMINISTRADOR-->

  <!-- JAVASCRIPT -->
  <script src="fronts/js/jquery.min.js"></script>
  <script src="fronts/js/bootstrap.min.js"></script>
  <script src="fronts/plugins/flexslider/jquery.flexslider-min.js"></script>
  <script src="fronts/plugins/flexslider/flexslider.config.js"></script>
  <!-- FIN JAVASCRIPT -->

</body>

</html>