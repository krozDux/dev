<?php
if (!empty($_POST['btningresar'])) {
    session_start();
    $_SESSION['email'] = $email;
    header('Location: ../panel/index.php');
    exit();
}
?>