<?php 
  session_start();
  include 'database.php';

  if(isset($_POST['submit']) == true){

    $email = $_POST["email-login"];
    $password = $_POST["password-login"];

    $_SESSION['email-login'] = $email;

    if(empty($email) || empty($password)){
      header("Location: ../login.php?error=camposVacios");
      exit();
    }

    

    $db = new Database();
    $res = $db->getUser($email);
    $pass = $res['contrasena'];
    if ($pass == $password){
      $_SESSION['email'] = $res['email'];
      $_SESSION['nombre'] = $res['nombre'];
      $_SESSION['apellidos'] = $res['apellidos'];
      $_SESSION['telefono'] = $res['telefono'];
      $_SESSION['fechaNacimiento'] = $res['fechaNacimiento'];
      $_SESSION['nombreUsuario'] = $res['nombreUsuario'];
      $_SESSION['contrasena'] = $res['contrasena'];
      //var_dump($_SESSION);

      $_SESSION['email-login'] = "";
      header("Location: ../html/pantallaPrincipal.php");
      exit();
    } else {
      header("Location: ../login.php?error=credenciales");
      exit();
    }

    # header("Location: ../html/pantallaPrincipal.php");
  }
?>