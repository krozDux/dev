<?php
$correo = file_get_contents("p_solicitud.php");
$correo = str_replace("{{url}}",$gola,$correo);
echo $correo;