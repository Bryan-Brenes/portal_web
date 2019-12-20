<?php 
  session_start();
  include_once 'database.php';

  if(isset($_POST['submit-registro'])){
    $nombre = $_POST['nombre-registro'];
    $apellidos = $_POST['apellidos-registro'];
    $fechaNacimiento = $_POST['fechaNacimiento-registro'];
    $nombreUsuario = $_POST['nombreUsuario-registro'];
    $contrasena = $_POST['contrasena-registro'];
    $email = $_POST['email-registro'];
    $telefono = $_POST['telefono-registro'];

    // verificar que los campos obligatorios no esten vacíos
    if (empty($nombre) || empty($apellidos) || empty($fechaNacimiento) || empty($nombreUsuario) || empty($contrasena) || empty($email) || empty($telefono)){
      header("Location: ../login.php?msj=camposVacios");
      exit();
    }

    echo $fechaNacimiento;

    $_SESSION['nombre-registro'] = $nombre;
    $_SESSION['apellidos-registro'] = $apellidos;
    $_SESSION['fechaNacimiento-registro'] = $fechaNacimiento;
    $_SESSION['nombreUsuario-registro'] = $nombreUsuario;
    $_SESSION['email-registro'] = $email;
    $_SESSION['telefono-registro'] = $telefono;

    $db = new Database();

    if($db->verificarSiEmailExiste($email)){
      header("Location: ../login.php?msj=emailExistente");
      exit();
    }

    if($db->verificarSiNombreUsuarioExiste($nombreUsuario)){
      header("Location: ../login.php?msj=identificadorExistente");
      exit();
    }

    // validar que la contraseña nueva tenga el formato correcto
    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $contrasena)){
      header("Location: ../login.php?msj=contrasenaFormato");
      exit();
    }

    $db->registerUser($nombre, $apellidos, $fechaNacimiento, $nombreUsuario, $contrasena, $email, $telefono);
    $_SESSION['email'] = $email;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $apellidos;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['fechaNacimiento'] = $fechaNacimiento;
    $_SESSION['nombreUsuario'] = $nombreUsuario;
    $_SESSION['contrasena'] = $contrasena;

    header("Location: ../html/pantallaPrincipal.php");
    exit();


  }
?>