<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/tareas/tareaLoginBootstrap/css/estilos.css">
  <title>Principal</title>
</head>

<body>

  <?php 
    if(isset($_GET['msj'])){
      $mensaje = "";
      if($_GET['msj'] == "camposVacios"){
        $mensaje = "Por favor no dejar campos vacíos";
      } elseif($_GET['msj'] == "contrasenaEquivocada"){
        $mensaje = "Contraseña actual incorrecta";
      } elseif($_GET['msj'] == "formatoErroneo"){
        $mensaje = "La nueva contraseña debe tener al menos 8 caracteres con minúsculas, mayúsculas y números";
      } elseif($_GET['msj'] == "contrasenasDistintas"){
        $mensaje = "Las contraseñas no son iguales";
      } elseif($_GET['msj'] == "exito"){
        $mensaje = "Contraseña cambiada";
      }
      ?>
        <div class="alert alert-info alert-dismissible fade show mensaje-alerta" role="alert">
          <?php echo $mensaje?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php
    }
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil</a>
        </li>
      </ul>
    </div>
    <div class="nombreUsuario" id="nombreUsuario">
      <img class="foto-perfil" src="/img/default-user.png" alt="foto-perfil">
      <span>
      <?php 
        if (isset($_SESSION['nombre']) && isset($_SESSION['apellidos'])) {
          echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'];
        }
      ?>
      </span>
      <div class="menu-usuario" id="menuUsuario">
        <a href="#" id="menuBtn" class="item-menu" data-toggle="modal" data-target="#cambioContrasenia">Cambiar
          contraseña</a>
        <a href="../login.php" class="item-menu salirBtn">Salir</a>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="cambioContrasenia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../archivosPHP/cambiarContrasena.php" method="post">

            <div class="form-group">
              <label class="text-light" for="contraseniaCambio">Contraseña actual</label>
              <input name="contrasenaActual" type="password" class="form-control" id="contraseniaCambio">
              <div class="collapse" id="contraseniaActualError">
                <div class="card card-body text-light">
                  Constraseña incorrecta
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-light" for="contraseniaCambio2">Contraseña nueva</label>
              <input name="contrasenaNueva" type="password" class="form-control" id="contraseniaCambio2">
              <div class="collapse" id="contraseniaNuevaError">
                <div class="card card-body text-light">
                  Mínimo 8 caracteres con minúsculas, mayúsculas y números.
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-light" for="contraseniaCambio3">Reescriba contraseña</label>
              <input name="contrasenaNueva_reescrita" type="password" class="form-control" id="contraseniaCambio3">
              <div class="collapse" id="contraseniaNuevaError2">
                <div class="card card-body text-light">
                  Constraseñas no coinciden
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button name="submit-cambio-contrasena" type="submit" class="btn btn-primary">Cambiar</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="../js/pantallaPrincipal.js"></script>
</body>

</html>