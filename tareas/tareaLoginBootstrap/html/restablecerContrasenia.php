<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Restablecer contraseña</title>
</head>

<body>

  <?php  
    if(isset($_GET['status'])){
      $mensaje = "";
      $claseAlerta = "danger";
      if ($_GET['status'] == 'error') {
        $mensaje = "Hubo un error al enviar el correo por favor intentar de nuevo más tarde";
      } elseif($_GET['status'] == 'enviado'){
        $mensaje = "Si ha suministrado una cuenta válida, le llegará un correo con instrucciones para restablecer su contraseña";
        $claseAlerta = "success";
      }

      ?>

        <div class="alert alert-<?php echo $claseAlerta?> alert-dismissible fade show mensaje-alerta2" role="alert">
          <?php echo $mensaje?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <?php

    }
  ?>

  <div class="imagen-fondo"> </div>
  <div class="contenedor">
    <div class="login-contenedor contenedor-restablecer-contrasenia">
      <h3 class="titulo">Restablecer contraseña</h3>
      <div class="row">
        <form action="../archivosPHP/enviarCorreo.php" class="row" method="post">
          <div class="form-group col-sm-12 input-formulario">
            <label for="correoRestablecer">Correo electrónico de la cuenta</label>
            <input type="text" name="email" class="form-control" id="correoRestablecer" placeholder="Correo electrónico"
              aria-describedby="emailHelp">
            <small id="correoError" class="form-text text-muted mensaje-error">Se debe ingresar un correo válido</small>
          </div>
          <div class="col-sm-12">
            
            <button name="submit" id="restablecerBtn" type="submit"
              class="btn btn-primary btn-block">Enviar
              solicitud</button>

            <a href="../login.php" class="btn btn-secondary btn-block">Volver</a>
          </div>
        </form>
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
  <script src="../js/restablecer.js"></script>
</body>

</html>