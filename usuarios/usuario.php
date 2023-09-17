
<!DOCTYPE html>
<?php  if ($session_rol == "admin") { ?>
<html lang="es">
	<?php include_once '../assets/controlador/sesion.php'?>
	<?php include_once '../assets/vista/usuarios/head-usuarios.php'?>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<?php include_once '../assets/vista/usuarios/body-usuario.php'?>
		<script>var hostUrl = "assets/";</script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	</body>
</html>
<?php } else{
header("location: ../panel/index.php");
} ?>