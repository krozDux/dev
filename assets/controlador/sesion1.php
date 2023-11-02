<?php
if (!empty($_POST['btningresar'])) {
    $_SESSION['email'] = $email;
    header('Location: ../panel/index.php');
    exit();
}
?>