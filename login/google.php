<?php
include('../config.php');
$code = $_GET['code'];
$client_id = '833124074295-5iapbj307eadklgospfaug97dinfpvvk.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'https://dev.pkroz.net/login/google.php';

$url = 'https://accounts.google.com/o/oauth2/token';
$post_data = [
  'code' => $code,
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => $redirect_uri,
  'grant_type' => 'authorization_code'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$access_token = $data['access_token'];

$user_info_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token;
$user_info = json_decode(file_get_contents($user_info_url), true);

// Ahora, puedes acceder a la información del usuario de forma separada, por ejemplo:
$google_id = $user_info['id'];
$nombres = $user_info['given_name'];
$apellidos = $user_info['family_name'];
$email = $user_info['email'];
$consulta_email = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado_email = mysqli_query($con, $consulta_email);
  if (mysqli_num_rows($resultado_email) == 0) {
    $password = 'Google1234.';
    $hashedPassword = hash('sha256', $password);
    $consulta = "INSERT usuarios (`email`,`pass`,`nombres`,`apellidos`,`imagen`,`rol`,`metodoLogin`) VALUES ('$email','$hashedPassword','$nombres','$apellidos','blank.png','invitado','google')";
    $resultado = mysqli_query($con, $consulta);
    session_start();
    $_SESSION['email'] = $email;
    header("location:../panel/index.php");
                        }
                          else {
                            session_start();
            $_SESSION['email'] = $email;
            header("location:../panel/index.php");
                        }
?>

<!DOCTYPE html>
<html lang="es">
	<?php include_once '../assets/vista/login/head-login.php'?>
	<body id="kt_body" class="bg-body">
	<?php include_once '../assets/vista/login/body-login.php'?>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
	</body>
	</html>