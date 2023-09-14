<div class="d-flex flex-column flex-root">
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
			<a href="index" class="mb-12">
				<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
			</a>
			<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form method="POST" enctype="multipart/form-data"/ class="form w-100">
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Iniciar sesión</h1>
								<div class="text-gray-400 fw-bold fs-4 mb-5">Nuevo por aquí?
								<a href="login/registro.php" class="link-primary fw-bolder">Crear una cuenta</a></div>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Correo</label>
								<input class="form-control form-control-lg form-control-solid" type="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
								<div class="fv-plugins-message-container"></div>
							</div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
									<a href="../../demo14/dist/authentication/layouts/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
								</div>
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" minlength="8" required />
								<div class="fv-plugins-message-container"></div>
							</div>
							<div class="text-center">
							<button type="submit" name="btningresar" class="btn btn-lg btn-primary w-100 mb-5" value="ingresar" >Ingresar</button>
								
								<div class="text-center text-muted text-uppercase fw-bolder mb-5">ó</div>
								<a href="https://accounts.google.com/o/oauth2/auth?client_id=833124074295-5iapbj307eadklgospfaug97dinfpvvk.apps.googleusercontent.com&redirect_uri=https://dev.pkroz.net/login/index.php&response_type=code&scope=openid%20email%20profile" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Iniciar sesión con Google</a>
								<!-- <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
								<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a> -->
							</div>
						</form>
			</div>
		</div>
		<?php include '../assets/controlador/login.php'?>
	</div>
</div>
