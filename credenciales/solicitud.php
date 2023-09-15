<!DOCTYPE html>
<html lang="es">
	<?php include_once '../assets/vista/credenciales/head-solicitud.php'?>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="../../demo14/dist/index.html" class="mb-12">
						<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
					</a>
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" method="POST" id="kt_password_reset_form">
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Recuperar credenciales</h1>
								<div class="text-gray-400 fw-bold fs-4">Ingresa el correo de tu cuenta para recuperar tu contraseña.</div>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
								<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
							<div class="d-flex flex-wrap justify-content-center pb-lg-0">
							<button type="submit" name="btncredenciales" class="btn btn-lg btn-primary fw-bolder me-4" value="credenciales" >Enviar</button>
							<a href="../login/index.php" class="btn btn-lg btn-light-primary fw-bolder">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "assets/";</script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="assets/js/custom/authentication/password-reset/password-reset.js"></script>
	</body>
</html>