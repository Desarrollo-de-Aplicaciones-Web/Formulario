<?php

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Apellido: " . $apellido . "<br>Correo: " . $correo .  
"<br>Asunto: " . $asunto . "<br>Mensaje:" . $mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Como se comporta a medida que creamos el correo. desactivado en 0
    $mail->isSMTP();                                            // Protocolo que usamos para enviar SMTP
    $mail->Host       = 'smtp.gmail.com';                    // El servidor del servicio que voy a usar
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ucedoestefi@gmail.com';                     // SMTP usuario que vamos a usar
    $mail->Password   = 'N1ghtm@r3';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ucedoestefi@gmail.com', $nombre);          //Quien lo manda, desde mi correo,usuario
    $mail->addAddress('ucedoestefi@gmail.com');              // A quien se va a enviar el correo

    // Content
    $mail->isHTML(true);                                                    // Permite HTML
    $mail->Subject = 'Asunto Estoy enviando un correo';                    //Aasunto
    $mail->Body    = $body;                                    //Pongo la variable body, el cuerpo del msj
    
    $mail->send();
    echo '<script>
        alert("El mensaje se envio correctamente");
        window.history.go(-1);
        </script>';                          //El -1 es para que regrese a la pagina
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}