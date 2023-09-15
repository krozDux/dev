<?php
include('../config.php');
if (!empty($_POST['btnregistrar'])) {
    if (!empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['nombres']) and !empty($_POST['apellidos'])) {
        $email = $_POST['email'];
        $imagen = $_FILES['imagen']['name'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $nombres = strtoupper($nombres);
        $apellidos = strtoupper($apellidos);
        // Verificar el formato del correo electrónico
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Verificar que el nombre y apellido no contengan caracteres especiales
            if (preg_match('/^[A-Za-z\s]+$/', $nombres) && preg_match('/^[A-Za-z\s]+$/', $apellidos)) {
                // Verificar que la contraseña cumple con los criterios
                if (preg_match('/^(?=.*[A-Z])(?=.*[.!@#$%^&*])(?=.{8,})/', $password)) {
                    // Verificar que las contraseñas coincidan
                    if ($password === $password2) {
                        // Comprobar si el correo ya está registrado
                        $consulta_email = "SELECT * FROM usuarios WHERE email = '$email'";
                        $resultado_email = mysqli_query($con, $consulta_email);
                        if (mysqli_num_rows($resultado_email) == 0) {
                            if (isset($imagen) and $imagen!=""){
                                    $tipo = $_FILES['imagen']['type'];
                                    $temp = $_FILES['imagen']['tmp_name'];
                                    
                                    // $extension = pathinfo($imagen,PATHINFO_EXTENSION);
                                    // $imagenid = $rename.'.'.$extension;
                                if (!((strpos($tipo, 'jpeg')) or (strpos($tipo, 'jpg')) or (strpos($tipo, 'png')))){
                                    echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-header">
                                        <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                                        <strong class="me-auto">Alerta</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                    <div class="toast-body">
                                        Solo se permiten archivos con extensión jpeg, jpg o png.
                                    </div>
                                </div>';
                                }else {
                                    $hashedPassword = hash('sha256', $password);
                                    $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`imagen`,`rol`,`metodoLogin`,`estado`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','$imagen','invitado','email','1')";
                                    $resultado = mysqli_query($con, $consulta);
                                    $id_usuario = mysqli_insert_id($con);
                                    $nuevo_nombre_imagen = $id_usuario . '.' . $extension;
                                    $ruta_imagen = '../assets/media/avatars/' . $nuevo_nombre_imagen;
                                    move_uploaded_file($temp, $ruta_imagen);
                                    $consulta33 = "UPDATE `usuarios` SET `imagen`='$nuevo_nombre_imagen' where id='$id_usuario'";
                                    $resultado2 = mysqli_query($con, $consulta33);
                                    header("location: index.php");
                                }
                            }else {
                                $hashedPassword = hash('sha256', $password);
                                $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`imagen`,`rol`,`metodoLogin`,`estado`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','blank.png','invitado','email','1')";
                                $resultado = mysqli_query($con, $consulta);
                                header("location: index.php");
                            }
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
?>