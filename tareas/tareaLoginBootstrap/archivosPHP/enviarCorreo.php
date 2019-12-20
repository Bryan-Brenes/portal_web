<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

  // use \phpMailer\src\PHPMailer;
  // use \phpMailer\src\SMTP;
  // use \phpMailer\src\Exception;

  // Load Composer's autoloader
  //require 'vendor/autoload.php';
  require_once '../../../phpMailer/PHPMailerAutoload.php';
  

  //isset($_GET['submit-reset'])
  //if (true) {
    

    // Instantiation and passing `true` enables exceptions
   /* $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username = 'introweb.verano2019@gmail.com';
    $mail->Password = 'introweb2019';
    $mail->SetFrom = 'introweb.verano2019@gmail.com';
    $mail->Subject = 'Restablecimiento de contraseñas';
    $mail->Body = 'Hola!!!!!! :3';

    $mail->AddAddress('ljazminsc205@gmail.com');

    //$mail->Send();
    if(!$mail->send()) {
      echo 'Message could not be sent.<br>';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }*/
  //}


  // -----------------------------------------------
  $mail = new PHPMailer;
  echo !extension_loaded('openssl')?"Not Available":"Available<br>";

// Enable verbose debug output


$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'introweb.verano2019@gmail.com';                 // SMTP username
$mail->Password = 'introweb2019';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
// $mail->SMTPOptions = array(
//   'ssl' => array(
//       'verify_peer' => false,
//       'verify_peer_name' => false,
//       'allow_self_signed' => true
//   )
// );                                  // TCP port to connect to

$mail->setFrom('introweb.verano2019@gmail.com');
$mail->addAddress('ljazminsc205@gmail.com');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Restablecimiento de contraseña';
$mail->Body    = 'Preciosa! :3';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.-----<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
  // -----------------------------------------------


?>