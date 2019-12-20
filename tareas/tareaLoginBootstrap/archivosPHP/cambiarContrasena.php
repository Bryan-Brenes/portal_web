
<?php 
  session_start();
  include_once 'database.php';

  if (isset($_POST['submit-cambio-contrasena'])) {
    $contrasenaActual = $_POST['contrasenaActual'];
    $contrasenaNueva = $_POST['contrasenaNueva'];
    $contrasenaNueva_reescrita = $_POST['contrasenaNueva_reescrita'];

    // validar que no haya campos vacíos
    if (empty($contrasenaActual) || empty($contrasenaNueva) || empty($contrasenaNueva_reescrita)) {
      header("Location: ../html/pantallaPrincipal.php?msj=camposVacios");
      exit();
    }

    // validar que la contraseña actual sea correcta
    if($contrasenaActual !== $_SESSION['contrasena']){
      header("Location: ../html/pantallaPrincipal.php?msj=contrasenaEquivocada");
      exit();
    }

    // validar que la contraseña nueva tenga el formato correcto
    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $contrasenaNueva)){
      header("Location: ../html/pantallaPrincipal.php?msj=formatoErroneo");
      exit();
    }

    // validar que la contraseña nueva sea reescrita correctamente
    if($contrasenaNueva !== $contrasenaNueva_reescrita){
      header("Location: ../html/pantallaPrincipal.php?msj=contrasenasDistintas");
      exit();
    }

    // todo en orden con el formulario
    $db = new  Database();
    $db->cambiarContrasenaUsuario($_SESSION['email'], $contrasenaNueva);
    header("Location: ../html/pantallaPrincipal.php?msj=exito");
    exit();

  }
?>