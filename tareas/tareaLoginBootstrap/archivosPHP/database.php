<?php 
  include_once 'conexion.php';
  class Database {

    # obtener usuario dado un email o identificador de usuario
    # retorna nombre, apellidos y contraseña
    public function getUser($email){
      $db = new ConexionBD();
      $resultados = $db->ejecutar("select nombre, apellidos, contrasena, email, nombreUsuario, telefono, fechaNacimiento from Usuarios where email='" . $email . "' or nombreUsuario='" . $email . "'");
      if($resultados->num_rows > 0){
        return $resultados->fetch_assoc();
        /*while($row = $resultados->fetch_assoc()){
          return $row["contrasena"];
        }*/
      } else {
        return "";
      }
    }

    public function cambiarContrasenaUsuario($email, $nueva){
      $sql_query = "update Usuarios set contrasena='". $nueva ."' where email='" . $email . "';";
      $db = new ConexionBD();
      $res = $db->ejecutar($sql_query);
    }

    public function verificarSiEmailExiste($email){
      $db = new ConexionBD();
      $resultados = $db->ejecutar("select nombre from Usuarios where email='" . $email . "'");
      if($resultados->num_rows > 0){
        return true;
      } else {
        return false;
      }
    }

    public function verificarSiNombreUsuarioExiste($nombreUsuario){
      $db = new ConexionBD();
      $resultados = $db->ejecutar("select nombre from Usuarios where nombreUsuario='" . $nombreUsuario . "'");
      if($resultados->num_rows > 0){
        return true;
      } else {
        return false;
      }
    }

    public function registerUser($nombre, $apellidos, $fechaNac, $ident, $pass, $email, $tel){
      $sql_query = "insert into Usuarios (email, nombre, apellidos, telefono, nombreUsuario, fechaNacimiento, contrasena) values ('".$email."','".$nombre."','".$apellidos. "','".$tel."', '".$ident."', '".$fechaNac."', '".$pass."')";
      $db = new ConexionBD();
      $db->ejecutar($sql_query);
    }
  }
?>