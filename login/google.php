<?php
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
$nombre = $user_info['given_name'];
$apellido = $user_info['family_name'];
$email = $user_info['email'];

echo $nombre;
echo $apellido;
?>