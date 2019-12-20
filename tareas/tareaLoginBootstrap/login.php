<?php 
  session_start();
  /*$_SESSION['email'] = "";
  $_SESSION['nombre'] = "";
  $_SESSION['apellidos'] = "";
  $_SESSION['telefono'] = "";
  $_SESSION['fechaNacimiento'] = "";
  $_SESSION['nombreUsuario'] = "";
  $_SESSION['contrasena'] = "";*/
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
  <title>Login</title>
</head>

<body>

<?php 
    if(isset($_GET['msj'])){
      $mensaje = "";
      if($_GET['msj'] == "camposVacios"){
        $mensaje = "Por favor no dejar campos vacíos";
      } elseif($_GET['msj'] == "emailExistente"){
        $mensaje = "Email ya se encuentra registrado";
      } elseif($_GET['msj'] == "contrasenaFormato"){
        $mensaje = "La nueva contraseña debe tener al menos 8 caracteres con minúsculas, mayúsculas y números";
      } elseif($_GET['msj'] == "identificadorExistente"){
        $mensaje = "El identificador de usuario no esta disponible";
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

  <div class="contenedor">
    <div class="login-contenedor">
      <div class="panel-izq" id="panel-izq">
        <img src="/img/winter_bg2.jpg" alt="imagen fondo de invierno">
      </div>
      <div class="panel-der" id="panel-der">
        <div class="row cambio-tipo-login">
          <div class="col-sm-12">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-login active">
                <input type="radio" name="options" id="btn-login" checked> Iniciar sesión
              </label>
              <label class="btn btn-registro">
                <input type="radio" name="options" id="btn-registro"> Registrarse
              </label>
            </div>
          </div>
        </div>
        <div class="formularios row">
          <div class="formulario-login col-sm-12">
            <div class="row">
              <div class="col-sm-12 grupo">
                <h5>Inicio de sesión</h5>
              </div>
            </div>
            <!-- <div class="input-formulario">
              <small id="correoError" class="form-text text-muted mensaje-error-sin-flecha">Verificar
                credenciales</small>
            </div> -->
            <?php
              if(isset($_GET['error'])){
                $error = "";
                if($_GET['error'] == 'camposVacios'){
                  $error = "Se dejaron campo vacíos";
                } elseif ($_GET['error'] == 'credenciales'){
                  $error = "Credenciales incorrectas";
                }
            ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
              <?php echo "$error"?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
              }
            ?>
            
            
            <form action="/tareas/tareaLoginBootstrap/archivosPHP/validacionLogin.php" method="post">
              <div class="form-group input-formulario">
                <label for="email-login">Correo electrónico o nombre de usuario</label>
                <input type="text" name="email-login" class="form-control" placeholder="Correo electrónico o nombre de usuario" id="email-login"
                  aria-describedby="emailHelp"
                  value="<?php 
                    if(isset($_SESSION['email-login'])){
                      echo $_SESSION['email-login'];
                    } else {
                      echo "";
                    }
                  ?>">

                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
              <div class="form-group">
                <label for="password-login">Contraseña</label>
                <input type="password" name="password-login" class="form-control" id="password-login" placeholder="Contraseña">
              </div>
              <div class="olvido-contrasenia">
                <a href="./html/restablecerContrasenia.php" class="">¿Olvidó su contraseña?</a>
              </div>
              <button name="submit" id="ingresarBtn-login" type="submit"
                class="btn btn-primary btn-block btn-ingresar">Ingresar</button>
                <!-- onclick="validarLogin(event)"  -->
            </form>
          </div>

          <!-- Formulario de registro -->
          <div class="formulario-registro col-sm-12">
            <div class="row">
              <div class="col-sm-12 grupo">
                <h5>Registro</h5>
              </div>
            </div>
            <form action="/tareas/tareaLoginBootstrap/archivosPHP/registroUsuario.php" method="post">
              <div class="row">
                <div class="form-group col-sm-4">
                  <label for="nombreRegistro" class="label-formulario">Nombre</label>
                  <input name="nombre-registro" type="text" class="form-control inputRegistro" placeholder="Nombre" id="nombreRegistro"
                    aria-describedby="emailHelp" value="<?php
                      if(isset($_SESSION['nombre-registro'])){
                        echo $_SESSION['nombre-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
                <div class="form-group col-sm-4">
                  <label for="apellidoRegistro" class="label-formulario">Apellido</label>
                  <input name="apellidos-registro" type="text" class="form-control inputRegistro" placeholder="Apellido" id="apellidoRegistro"
                    aria-describedby="emailHelp" value="<?php
                      if(isset($_SESSION['apellidos-registro'])){
                        echo $_SESSION['apellidos-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
                <div class="form-group col-sm-4">
                  <label for="fechaNacimiento" class="label-formulario">Fecha de nacimiento</label>
                  <input name="fechaNacimiento-registro" type="date" class="form-control inputRegistro" id="fechaNacimiento"
                    aria-describedby="emailHelp" value="<?php
                      if(isset($_SESSION['fechaNacimiento-registro'])){
                        echo $_SESSION['fechaNacimiento-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="indentificacion" class="label-formulario">Indentificación para login</label>
                  <input  name="nombreUsuario-registro" type="text" class="form-control inputRegistro" placeholder="Identificación" id="identificacion"
                    aria-describedby="emailHelp" value="<?php
                      if(isset($_SESSION['nombreUsuario-registro'])){
                        echo $_SESSION['nombreUsuario-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
                <div class="form-group col-sm-6 input-formulario">
                  <label for="contraseniaRegistro" class="label-formulario">Contraseña</label>
                  <input  name="contrasena-registro" type="password" class="form-control inputRegistro" placeholder="Contraseña"
                    id="contraseniaRegistro" aria-describedby="emailHelp">
                  <small id="passwordError" class="form-text text-muted mensaje-error">Min. 8 caracteres con mayúsculas,
                    minúsculas y números</small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                  <label for="correoRegistro" class="label-formulario">Correo electrónico</label>
                  <input  name="email-registro" type="email" class="form-control inputRegistro" id="correoRegistro"
                    placeholder="Correo electrónico" value="<?php 
                      if(isset($_SESSION['email-registro'])){
                        echo $_SESSION['email-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
                <div class="form-group col-sm-6">
                  <label for="telefono" class="label-formulario">Teléfono</label>
                  <input name="telefono-registro" type="tel" pattern="[0-9]{4}-[0-9]{4}" placeholder="8888-8888"
                    class="form-control inputRegistro" id="telefono" aria-describedby="emailHelp" value="<?php
                      if(isset($_SESSION['telefono-registro'])){
                        echo $_SESSION['telefono-registro'];
                      } else {
                        echo "";
                      }
                    ?>">
                </div>
              </div>
              <button type="submit" name="submit-registro"
                class="btn btn-primary btn-block btn-ingresar">Registrarse</button>
            </form>
          </div>
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
  <script src="./js/login.js"></script>
</body>

</html>