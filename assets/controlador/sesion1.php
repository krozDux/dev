<?php
if (!empty($_POST['btningresar'])) {
    session_start();
    $_SESSION['email'] = $session_email;
    header('Location: ../panel/index.php');
    exit();
}
?>