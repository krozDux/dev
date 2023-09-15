<?php
include('../config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if (!empty($_POST['btncredenciales'])) {
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $consulta_email = "SELECT * FROM usuarios WHERE email = '$email'";
                $resultado_email = mysqli_query($con, $consulta_email);
                if (mysqli_num_rows($resultado_email) == 0) {
                    // El correo no está registrado, procede a insertar el nuevo usuario
                    echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                        <strong class="me-auto">Alerta</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        El correo electrónico ya está registrado. Por favor, elija otro correo.
                    </div>
                    </div>';
                } else {
                    $token = bin2hex(random_bytes(16));
                    $timestamp = date('Y-m-d H:i:s');
                    $consulta = "INSERT INTO solicitudes_reseteo (email, token, created_at) VALUES ('$email', '$token', '$timestamp')";
                    mysqli_query($con, $consulta);
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.tital.email';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'carlos@nsconcepcion.edu.pe';                     //SMTP username
                        $mail->Password   = 'Carloshack1.';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('carlos@nsconcepcion.edu.pe', 'Sistema WEB');
                        $mail->addAddress('krozfix@gmail.com', 'Carlos Andres');     //Add a recipient
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Titulo';
                        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
        }
    }
}