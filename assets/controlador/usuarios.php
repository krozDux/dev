<?php
include('../config.php');

if (!empty($_POST['btneliminar'])) {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta2 = "UPDATE `usuarios` SET `estado`='2' where id='$id'";
        $resultado2 = mysqli_query($con, $consulta2);
        header("location: index.php");
}}


if (!empty($_POST['btnreset'])) {
    if (!empty($_POST['resetId']) and !empty($_POST['resetPass']) and !empty($_POST['resetNombres'])) {
        $resetId = $_POST['resetId'];
        $resetPass = $_POST['resetPass'];
        $resetNombres = $_POST['resetNombres'];
        $hashedPassword2 = hash('sha256', $resetPass);
        $fecha = date('Y-m-d H:i:s');
        $consulta4 = "INSERT `resetPasswords` (`usuarioSolicitante`,`fecha`,`idReset`,`nombreReset`) VALUES ('$nombres $apellidos','$fecha','$resetId','$resetNombres')";
        $resultado4 = mysqli_query($con, $consulta4);
        $consulta3 = "UPDATE `usuarios` SET `pass`='$hashedPassword2' where id='$resetId'";
        $resultado3 = mysqli_query($con, $consulta3);
        header("location: index.php");
}}

if (!empty($_POST['btneditar'])) {
    if (!empty($_POST['editId'])) {
        $editId = $_POST['editId'];
        $editRol = $_POST['editRol'];
        $editNumero = $_POST['editNumero'];
        $imagen = $_FILES['imagen']['name'];
        if (isset($imagen) and $imagen!=""){
            $tipo = $_FILES['imagen']['type'];
            $temp = $_FILES['imagen']['tmp_name'];
            $extension = pathinfo($imagen,PATHINFO_EXTENSION);
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
            $nuevo_nombre_imagen = $editId . '.' . $extension;
            $ruta_imagen = '../assets/media/avatars/' . $nuevo_nombre_imagen;
            move_uploaded_file($temp, $ruta_imagen);
            $consulta4 = "UPDATE `usuarios` SET `rol`='$editRol', `numero`='$editNumero', `imagen`='$nuevo_nombre_imagen' where id='$editId'";
            $resultado4 = mysqli_query($con, $consulta4);
            header("location: index.php");
        }
    }else {
            $consulta5 = "UPDATE `usuarios` SET `rol`='$editRol', `numero`='$editNumero' where id='$editId'";
            $resultado5 = mysqli_query($con, $consulta5);
            header("location: index.php");
    }
}
}

if (!empty($_POST['btncrear'])) {
    if (!empty($_POST['crearEmail']) and !empty($_POST['crearNombres']) and !empty($_POST['crearApellidos']) and !empty($_POST['crearPassword'])) {
        $imagen = $_FILES['imagen']['name'];
        $email = $_POST['crearEmail'];
        $nombres = $_POST['crearNombres'];
        $apellidos = $_POST['crearApellidos'];
        $numero = $_POST['crearNumero'];
        $password = $_POST['crearPassword'];
        $rol = $_POST['crearRol'];
        $nombres = strtoupper($nombres);
        $apellidos = strtoupper($apellidos);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (preg_match('/^[A-Za-z\s]+$/', $nombres) && preg_match('/^[A-Za-z\s]+$/', $apellidos)) {
                $consulta_email = "SELECT * FROM usuarios WHERE email = '$email'";
                $resultado_email = mysqli_query($con, $consulta_email);
                if (mysqli_num_rows($resultado_email) == 0) {
                    if (isset($imagen) and $imagen!=""){
                        $tipo = $_FILES['imagen']['type'];
                        $temp = $_FILES['imagen']['tmp_name'];
                        $extension = pathinfo($imagen,PATHINFO_EXTENSION);
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
                        } else{
                            $hashedPassword = hash('sha256', $password);
                            $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`numero`,`imagen`,`rol`,`metodoLogin`,`estado`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','$numero','$imagen','invitado','email','1')";
                            $resultado = mysqli_query($con, $consulta);
                            $id_usuario = mysqli_insert_id($con);
                            $nuevo_nombre_imagen = $id_usuario . '.' . $extension;
                            $ruta_imagen = '../assets/media/avatars/' . $nuevo_nombre_imagen;
                            move_uploaded_file($temp, $ruta_imagen);
                            $consulta33 = "UPDATE `usuarios` SET `imagen`='$nuevo_nombre_imagen' where id='$id_usuario'";
                            $resultado2 = mysqli_query($con, $consulta33);
                            header("location: index.php");
                        }
                    } else{
                        $hashedPassword = hash('sha256', $password);
                        $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`numero`,`imagen`,`rol`,`metodoLogin`,`estado`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','$numero','blank.png','invitado','email','1')";
                        $resultado = mysqli_query($con, $consulta);
                        header("location: index.php");
                    }
                }else{
                    echo '<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <form class="form" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                        <div class="fv-row mb-4">
                                            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url("assets/media/avatars/blank.png")">
                                                <div class="image-input-wrapper w-125px h-125px" id="editImagen" style="background-image: url(assets/media/avatars/blank.png);"></div>
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <input type="file" name="imagen" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                </label>
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span> 
                                            </div>
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                        </div>
                                        <div class="row fv-row mb-4">
                                            <div class="col-xl-4">
                                                <label class="form-label fw-bolder text-dark fs-6">Nombres</label>
                                                <input type="text" name="crearNombres" class="form-control form-control-solid mb-3 mb-lg-0" id="crearNombres" required/>
                                            </div>
                                            <div class="col-xl-4">
                                                <label class="form-label fw-bolder text-dark fs-6">Apellidos</label>
                                                <input type="text" name="crearApellidos" class="form-control form-control-solid mb-3 mb-lg-0" id="crearApellidos" required/>
                                            </div>
                                            <div class="col-xl-4">
                                                <label class="form-label fw-bolder text-dark fs-6">Número</label>
                                                <input type="text" name="crearNumero" class="form-control form-control-solid mb-3 mb-lg-0" id="crearNumero" required/>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-4">
                                            <label class="required fw-bold fs-6 mb-2">Email</label>
                                            <input type="email" name="crearEmail" class="form-control form-control-solid mb-3 mb-lg-0" id="crearEmail" required/>
                                            <input type="text" name="crearPassword" value="User1234." class="form-control form-control-solid mb-3 mb-lg-0" id="crearPassword" hidden/>
                                        </div>
                                        <div class="fv-row mb-4">
                                            <label class="required fw-bold fs-6 mb-2">Rol</label>
                                            <select class="form-select form-select-solid" name="crearRol" id="crearRol" tabindex="-1" aria-hidden="true" required>
                                                <option selected value="">Seleccionar un rol</option>
                                                <option id="admin" value="admin">Administrador</option>
                                                <option id="proveedor" value="proveedor">Proveedor</option>
                                                <option id="cliente" value="cliente">Cliente</option>
                                                <option id="usuario" value="usuario">Usuario</option>
                                                <option id="invitado" value="invitado">Invitado</option>
                                            </select>
                                        </div>
                                        <div class="fv-row mb-4">
                                            <label class="required fw-bold fs-6 mb-2">Número</label>
                                            <input type="text" name="crearNumero" class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="crearNumero" required/>
                                        </div>
                                    </div>
                                    <div class="text-center pt-6">
                                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                                    <button type="submit" class="btn btn-success" name="btncrear" value="crearU">
                                        <span class="indicator-label">Guardar</span>
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
            $(".modal-close").on("click", function() {
                $("#kt_modal_add_user").modal("hide");
            });
            </script>
                ';
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
                            El nombre y apellido solo deben contener letras y espacios.
                        </div>
                    </div>';
            }
        } else{
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
    }else{
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