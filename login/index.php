<?php require_once('auth.php') ?>
<?php require_once('vendor/autoload.php') ?>
<?php
$clientID = "899232069625-i9nb4pl8gp7upnteihjosea4r7p362ds.apps.googleusercontent.com";
$secret = "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";

// Google API Client
$gclient = new Google_Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/test_login/login.php');


$gclient->addScope('email');
$gclient->addScope('profile');

if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google_Service_Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];

        header('location: ./');
        exit;
    }
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