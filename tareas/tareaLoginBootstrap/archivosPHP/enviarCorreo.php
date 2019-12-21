<?php

  include_once 'database.php';
  require_once '../../../phpMailer/PHPMailerAutoload.php';


  // -----------------------------------------------
  //isset($_POST['submit'])

  if (isset($_POST['submit'])) {

    $email = $_POST['email'];

    $db = new Database();
    if(!$db->verificarSiEmailExiste($email)){
      header("Location: ../html/restablecerContrasenia.php?status=enviado");
      exit();
    }

    $clave = claveTemporal();

    $mail = new PHPMailer;
    //echo !extension_loaded('openssl')?"Not Available":"Available<br>";
  
    // Enable verbose debug output
    
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'introweb.verano2019@gmail.com';                 // SMTP username
    $mail->Password = 'introweb2019';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    
    $mail->setFrom('introweb.verano2019@gmail.com');
    $mail->addAddress($email);     // Add a recipient
    
    
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Restablecimiento de contraseña';
    $mail->Body    = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
      <style type="text/css">
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: "Montserrat", sans-serif;
        }
        .contenedor{
          background-color: #2c3e50;
      height: 500px;
      width: 100%;
      padding-top: 20px;
      position: relative;
        }
        
        .correo{
          margin: 0 auto;
      background-color: white;
      width: 80%;
      padding: 5%;
      border-radius: 10px;
        }
        .header{
          color: #606060;
          margin-bottom: 5%;
          display: flex;
        }
        .header h3{
          display: inline;
        }
        .header span{
          align-content: center;
          padding: 5px;
          margin-right: 5px;
        }
        
        .header span i{
          align-content: center;
          font-size: 40px;
          line-height: 40px;
        }
        .body-content{
          text-align: center;
          margin-bottom: 5%;
        }
        .body-content p{
          margin: 2%;
        }
        .body-content hr{
          color: red;
        }
        .linea{
          width: 100%;
          height: 1px;
          background-color: #c8c8c8;
        }
        
        .mensaje{
          padding: 3% 0;
        }
        
        .mensaje-pequeno{
          text-align: center;
          font-size: 10px;
          color: #b0b0b0;
        }
      </style>
      </head>
    <body>
      
      <div class="contenedor">
        <div class="correo">
          <div class="header">
            <span><i class="fas fa-lock-open"></i></span>
            <h3>Parece que has olvidado tu contraseña, no se te preocupes te hemos generado una temporal!</h3>
          </div>
          <div class="body-content">
            <div class="linea"></div>
            <p>'.$clave.'</p>
            <div class="linea"></div>
            <p class="mensaje">Accede a tu cuenta con esta contraseña y asegurate de cambiarla por una nueva. Esto lo puede hacer desde el menú de configuraciones al presionar tu nombre en la esquina superior derecha</p>
          </div>
          <div class="footer">
             <p class="mensaje-pequeno">Si no has solicitado un cambio de contraseña omite el mensaje</p>
          </div>
        </div>
        
      </div>
    </body>
    </html>
    ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.-----<br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        
        header("Location: ../html/restablecerContrasenia.php?status=error");
        exit();
    } else {
        echo 'Message has been sent';
        $db->cambiarContrasenaUsuario($email, $clave);
        header("Location: ../html/restablecerContrasenia.php?status=enviado");
        exit();
    }
  }
  // -----------------------------------------------


  function claveTemporal(){
    $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890");
    $tamano = 8;

    $clave = "";
    for ($i=0; $i < $tamano; $i++) { 
      $indice = rand(0, count($caracteres) - 1);
      $clave = $clave . $caracteres[$indice];
    }
    return $clave;
  }
?>