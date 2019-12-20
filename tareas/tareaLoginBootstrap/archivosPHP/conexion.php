<?php 
  class ConexionBD {
    private $servername = 'localhost';
    private $username = "bryan";
    private $password = "mysql";
    private $database = "ControlUsuarios";
    private $conn;

    public function __construct(){
      $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
      if(!$this->conn){
        die("No se pudo conectar a la base de datos");
      }
    }

    public function ejecutar($query){
      return $this->conn->query($query);
    }
  }
?>
