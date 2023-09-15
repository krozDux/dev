<?php include '../assets/controlador/registro.php'?>
<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" >
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="../../demo14/dist/index.html" class="mb-12">
						<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
					</a>
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" method="POST" enctype="multipart/form-data">
							<div class="mb-5 text-center">
								<h1 class="text-dark mb-3">Crear una cuenta</h1>
								<div class="text-gray-400 fw-bold fs-4">Ya tienes una cuenta?
								<a href="login/index.php" class="link-primary fw-bolder">Iniciar sesión</a></div>
							</div>
							<a href="https://accounts.google.com/o/oauth2/auth?client_id=833124074295-5iapbj307eadklgospfaug97dinfpvvk.apps.googleusercontent.com&redirect_uri=https://dev.pkroz.net/login/google.php&response_type=code&scope=openid%20email%20profile" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
							<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Registrarse con Google</a>
						
							<div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2">ó</span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div>
							<div class="fv-row mb-4">
								<label class="d-block fw-bold fs-6 mb-5">Avatar</label>
								<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/avatars/blank.png')">
								<div class="image-input-wrapper w-125px h-125px" id="imagen" style="background-image: url(assets/media/avatars/blank.png);"></div>
									<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
										<i class="bi bi-pencil-fill fs-7"></i>
										<input type="file" name="imagen" accept=".png, .jpg, .jpeg" />
									</label>
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
										<i class="bi bi-x fs-2"></i>
									</span>
									<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
										<i class="bi bi-x fs-2"></i>
									</span>
								</div>
								<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
							</div>
							<div class="row fv-row mb-7">
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">Nombres</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="nombres" value="<?php echo isset($_POST['nombres']) ? $_POST['nombres'] : ''; ?>"/>
								</div>
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6">Apellidos</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="apellidos" value="<?php echo isset($_POST['apellidos']) ? $_POST['apellidos'] : ''; ?>"/>
								</div>
							</div>
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6">Correo electrónico</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/>
							</div>
							<div class="mb-10 fv-row">
								<div class="mb-1">
									<label class="form-label fw-bolder text-dark fs-6">Contraseña</label>
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"/>
									</div>
								</div>
								<div class="text-muted">Usa 8 o más caracteres, debe tener una mayúscula y un símbolo.</div>
							</div>
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6">Repetir contraseña</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password2" value="<?php echo isset($_POST['password2']) ? $_POST['password2'] : ''; ?>"/>
							</div>
							<div class="text-center">
								<button type="submit" name="btnregistrar" class="btn btn-lg btn-primary" value="registrar">Registrarse</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		