<?php
include('../config.php');
if (!empty($_POST['btningresar'])) {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha256', $password);

        // Utilizar una consulta preparada
        $sql = "SELECT * FROM `usuarios` WHERE email = ? AND pass = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $total = mysqli_stmt_num_rows($stmt);

        if ($total >= 1) {
            // Verificar el estado de la cuenta
            $sql = "SELECT estado FROM `usuarios` WHERE email = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $estado);
            mysqli_stmt_fetch($stmt);

            if ($estado == '2') {
                echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                        Su cuenta está desactivada.
                    </div>
                </div> ';
            } else {
                $_SESSION['email'] = $email;
            }
            if (!isset($_SESSION['email'])) {
                header('Location: ../login/index.php');
            } else {
                session_start();
                $session_email = $_SESSION['email'];
                $sqlUser= ("SELECT * FROM `usuarios` where email = '$session_email'");
                $queryUser = mysqli_query($con, $sqlUser);
                while ($dataUser = mysqli_fetch_array($queryUser)) {
                    $session_id = $dataUser['id']; 
                    $session_nombres = $dataUser['nombres']; 
                    $session_apellidos = $dataUser['apellidos'];
                    $session_imagen = $dataUser['imagen'];
                    $session_rol = $dataUser['rol'];
                }
                header("location:../panel/index.php");
            }
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                    Credenciales incorrectas.
                </div>
            </div> ';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-danger">
                        <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                        <strong class="me-auto text-white">Alerta</strong>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                Digitar correo electrónico y contraseña.
            </div>
        </div> ';
    }
}
?>