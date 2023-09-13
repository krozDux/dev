<?php
include('../config.php');
if (!empty($_POST['btneditar'])) {
    if (!empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['nombres']) and !empty($_POST['apellidos'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $nombres = strtoupper($nombres);
        $apellidos = strtoupper($apellidos);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (preg_match('/^(?=.*[A-Z])(?=.*[.!@#$%^&*])(?=.{8,})/', $password)) {
                    // Verificar que las contraseñas coincidan
                    if ($password === $password2) {
                        // Comprobar si el correo ya está registrado
                        $consulta_email = "SELECT * FROM usuarios WHERE email = '$email'";
                        $resultado_email = mysqli_query($con, $consulta_email);

                        if (mysqli_num_rows($resultado_email) == 0) {
                            // El correo no está registrado, procede a insertar el nuevo usuario
                            $hashedPassword = hash('sha256', $password);
                            $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`imagen`,`rol`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','blank.png','usuario')";
                            $resultado = mysqli_query($con, $consulta);
                            header("location: index.php");
                        } else {
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
                        }
                    } else {
                        echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                            <strong class="me-auto">Alerta</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Las contraseñas no coinciden.
                        </div>
                    </div>';
                    }
                } else {
                    echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                        <strong class="me-auto">Alerta</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        La contraseña debe tener al menos una letra mayúscula, un símbolo y un mínimo de 8 caracteres.
                    </div>
                </div>';
                }
            } else {
                echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                    <strong class="me-auto">Alerta</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    El nombre y apellido solo deben contener letras y espacios.
                </div>
            </div>';
            }
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                <strong class="me-auto">Alerta</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                El formato del correo electrónico no es válido.
            </div>
        </div>';
        }
    } else {
        echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
            <strong class="me-auto">Alerta</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Por favor, completa todos los campos.
        </div>
    </div>';
    }
}


if (!empty($_POST['btneliminar'])) {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta2 = "DELETE FROM usuarios WHERE id = '$id'";
        $resultado2 = mysqli_query($con, $consulta2);
        header("location: index.php");
}}


if (!empty($_POST['btnreset'])) {
    if (!empty($_POST['resetId']) and !empty($_POST['resetPass'])) {
        $resetId = $_POST['resetId'];
        $resetPass = $_POST['resetPass'];
        $hashedPassword2 = hash('sha256', $resetPass);
        $consulta3 = "UPDATE `usuarios` SET `pass`='$hashedPassword2' where id='$resetId'";
        $resultado3 = mysqli_query($con, $consulta3);

        $fecha = date('Y-m-d H:i:s');
        echo $fecha;
        echo $nombres;
        echo $resetId;
        $consulta4 = "INSERT `resetPasswords` (`reset`,`fecha`,`idUsuario`) VALUES ('$nombres $apellidos','$fecha','$resetId')";
        $resultado4 = mysqli_query($con, $consulta4);
        header("location: index.php");
}}
?>