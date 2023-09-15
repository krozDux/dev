<?php
include('../config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (!empty($_POST['btncredenciales'])) {
    if (!empty($_POST['email'])) {
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
                }
        }
    }
}