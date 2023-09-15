<?php
include('../config.php');
if (!empty($_POST['btningresar'])){
    if (!empty($_POST['email']) and !empty($_POST['password']) ){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = hash('sha256', $password);
        // Utilizar una consulta preparada
        $sql = "SELECT * FROM `usuarios` WHERE email = ? AND pass = ? AND estado = 1";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $total = mysqli_stmt_num_rows($stmt);
 
        if ($total >= 1){
            session_start();
            $_SESSION['email'] = $email;
            header("location:../panel/index.php");
        } else{
            echo ' <div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                    <strong class="me-auto">Alerta</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Credenciales incorrectas.
                </div>
            </div> ';
        }
        mysqli_stmt_close($stmt);
        
    }else{
        echo ' <div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                <strong class="me-auto">Alerta</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Digitar correo electrónico y contraseña.
            </div>
        </div> ';
    }
}
?>