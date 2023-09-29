<?php  if ($session_rol != "invitado" and $session_rol != "cliente" and $session_rol != "proveedor" ) {?>
<?php
include('../config.php');
$sql14 = ("SELECT u.id, u.nombres, u.apellidos, c.fechaInicio, c.fechaFin, c.observacion, c.recomendacion, c.idUsuario FROM usuarios AS u INNER JOIN contratos AS c ON u.id = c.idUsuario WHERE c.fechaFin = (SELECT MAX(fechaFin) FROM contratos WHERE fechaFin < CURDATE() AND idUsuario = c.idUsuario) AND NOT EXISTS (SELECT 1 FROM contratos WHERE idUsuario = c.idUsuario AND id != c.id)");
$query14 = mysqli_query($con, $sql14);
?>
<?php include '../assets/controlador/contratos.php'?>
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div id="kt_header" class="header">
                <div class="container-fluid d-flex flex-stack">
                    <div class="d-flex align-items-center me-5">
                        <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3"
                            id="kt_aside_toggle">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        <a href="panel/index.php">
                            <img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-25px h-lg-30px" />
                        </a>
                    </div>
                    <div class="d-flex align-items-center flex-shrink-0">
                        <div class="d-flex align-items-center ms-1">
                            <div class="btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-30px h-30px h-40px w-40px"
                                id="kt_activities_toggle">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="currentColor" />
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5"
                                            fill="currentColor" />
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="currentColor" />
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <?php include_once '../assets/controlador/header.php'?>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid">

                <?php include_once 'menu-contratos.php'?>

                <div class="d-flex flex-column flex-column-fluid container-fluid">
                    <div class="toolbar mb-2 mb-lg-2" id="kt_toolbar">
                        <div class="page-title d-flex flex-column me-3 mb-1">
                            <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Contratos</h1>
                        </div>
                    </div>
                    <div class="content flex-column-fluid" id="kt_content">
                    <div class="col-xl-6 mb-5 mb-xl-10">
	                                <!--begin::Tables Widget 3-->
	                                <div class="card h-xl-100">
	                                    <!--begin::Header-->
	                                    <div class="card-header border-0 pt-5">
	                                        <h3 class="card-title align-items-start flex-column">
	                                            <span class="card-label fw-bolder fs-3 mb-1">Files</span>
	                                            <span class="text-muted mt-1 fw-bold fs-7">Over 100 pending files</span>
	                                        </h3>
	                                    </div>
	                                    <div class="card-body py-3">
	                                        <div id="chart_div" style="width: 900px; height: 500px;">
	                                            fa
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
                    </div>
                    <div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
                        <?php include_once 'footer-contratos.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_new_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Registrar contrato</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary modal-close" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-4">
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="row fv-row mb-4">
                            <div class="col-xl-12">
                                <label class="required fw-bold fs-6 mb-2">Seleccionar trabajador</label>
                                <select class="form-select form-select-solid" name="newNombre" id="newNombres" tabindex="-1"
                                aria-hidden="true" required>
                                <option selected value="">Seleccionar</option>
                                <?php  while ($dataUsuario14 = mysqli_fetch_array($query14)) { ?>
                                <option value="<?php echo ($dataUsuario14['idUsuario']);?>"><?php echo ($dataUsuario14['nombres']);?> <?php echo ($dataUsuario14['apellidos']);?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-6">
                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btnnew" value="newU">
                            <span class="indicator-label">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_reg_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Registrar contrato</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary modal-close" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-4">
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Nombres completos</label>
                                <input type="text" name="regId" class="form-control form-control-solid mb-3 mb-lg-0" id="regId" hidden />
                                <input type="text" name="regNombre" class="form-control form-control-solid mb-3 mb-lg-0" id="regNombres" disabled />
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Rol</label>
                                <input type="text" name="regRol"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="regRol" disabled/>
                            </div>
                        </div>
                        <div class="fv-row mb-4">
                            <label class="fw-bold fs-6 mb-2">Email</label>
                            <input type="email" name="regEmail" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="regEmail" disabled />
                        </div>
                        <div class="fv-row mb-4">
                            <label class="fw-bold fs-6 mb-2">Número</label>
                            <input type="text" name="regNumero"
                                class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="regNumero" disabled />
                        </div>
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Fecha Inicio</label>
                                <input type="date" name="regFechaInicio"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="regFechaInicio" />
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Fecha Fin</label>
                                <input type="date" name="regFechaFin"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="regFechaFin" />
                            </div>
                        </div>
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Observación</label>
                                <input type="text" name="regObservacion" class="form-control form-control-solid mb-3 mb-lg-0" id="regObservacion"/>
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Recomendación</label>
                                <input type="text" name="regRecomendacion" class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="regRecomendacion"/>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-6">
                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btnreg" value="regU">
                            <span class="indicator-label">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_view_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Ver contrato</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary modal-close" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-4">
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Nombres completos</label>
                                <input type="text" name="viewNombre" class="form-control form-control-solid mb-3 mb-lg-0" id="viewNombres" disabled />
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Rol</label>
                                <input type="text" name="viewRol"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="viewRol" disabled/>
                            </div>
                        </div>
                        <div class="fv-row mb-4">
                            <label class="fw-bold fs-6 mb-2">Email</label>
                            <input type="email" name="viewEmail" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="viewEmail" disabled />
                        </div>
                        <div class="fv-row mb-4">
                            <label class="fw-bold fs-6 mb-2">Número</label>
                            <input type="text" name="viewNumero"
                                class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="viewNumero" disabled />
                        </div>
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Fecha Inicio</label>
                                <input type="date" name="viewFechaInicio"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="viewFechaInicio" disabled/>
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Fecha Fin</label>
                                <input type="date" name="viewFechaFin"
                                    class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="viewFechaFin" disabled/>
                            </div>
                        </div>
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Observación</label>
                                <input type="text" name="viewObservacion" class="form-control form-control-solid mb-3 mb-lg-0" id="viewObservacion" disabled/>
                            </div>
                            <div class="col-xl-6">
                                <label class="required fw-bold fs-6 mb-2">Recomendación</label>
                                <input type="text" name="viewRecomendacion" class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="viewRecomendacion" disabled/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_remove_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Eliminar usuario</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary modal-close" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="kt_modal_remove_user_form p-0" class="form" method="POST" enctype="multipart/form-data">
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Nombres y apellidos</label>
                        <input type="text" name="id" class="form-control form-control-solid mb-3 mb-lg-0" id="delId"
                            hidden />
                        <input type="text" name="nombrescompletos" class="form-control form-control-solid mb-3 mb-lg-0"
                            id="delNombres" disabled />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="fw-bold fs-6 mb-2">Rol</label>
                        <input type="text" name="rol" class="form-control form-control-solid mb-3 mb-lg-0" id="delRol"
                            disabled />
                    </div>
                    <p>Seguro quieres eliminar esta cuenta? </p>
                    <div class="text-center pt-15">
                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btneliminar" value="eliminar">
                            <span class="indicator-label">Aceptar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Registrar Usuario</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary modal-close" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-4">
                            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                style="background-image: url('assets/media/avatars/blank.png')">
                                <div class="image-input-wrapper w-125px h-125px" id="regImagen"
                                    style="background-image: url(assets/media/avatars/blank.png);"></div>
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar imagen">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="imagen" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                            </div>
                            <div class="form-text">Archivos permitidos: png, jpg, jpeg.</div>
                        </div>
                        <div class="row fv-row mb-4">
                            <div class="col-xl-6">
                                <label class="required form-label fw-bold mb-2 fs-6">Nombres</label>
                                <input type="text" name="crearNombres"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearNombres" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="required form-label fw-bold mb-2 fs-6">Apellidos</label>
                                <input type="text" name="crearApellidos"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearApellidos" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="required form-label fw-bold mb-2 fs-6">Número</label>
                                <input type="text" name="crearNumero"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearNumero" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="required form-label fw-bold mb-2 fs-6">Dirección</label>
                                <input type="text" name="crearDireccion"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearDireccion" required />
                            </div>
                        </div>
                        <div class="fv-row mb-4">
                            <label class="required fw-bold fs-6 mb-2">Email</label>
                            <input type="email" name="crearEmail" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="crearEmail" required />
                            <input type="text" name="crearPassword" value="User1234."
                                class="form-control form-control-solid mb-3 mb-lg-0" id="crearPassword" hidden />
                        </div>
                    </div>
                    <div class="text-center pt-6">


                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btncrear" value="crearU">
                            <span class="indicator-label">Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } else{
header("location: ../panel/index.php");
} ?>