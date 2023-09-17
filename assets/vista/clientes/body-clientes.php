<?php include '../assets/controlador/clientes.php'?>
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

                <?php include_once 'menu-clientes.php'?>

                <div class="d-flex flex-column flex-column-fluid container-fluid">
                    <div class="toolbar mb-2 mb-lg-2" id="kt_toolbar">
                        <div class="page-title d-flex flex-column me-3 mb-1">
                            <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Clientes</h1>
                        </div>
                    </div>
                    <div class="content flex-column-fluid" id="kt_content">
                        <div class="card">
                            <div class="card-body py-4">
                                <?php include_once 'tabla-clientes.php'?>
                            </div>
                        </div>
                    </div>
                    <div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
                        <?php include_once 'footer-clientes.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Editar Usuario</h2>
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
                        <div class="fv-row mb-4">
                            <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                style="background-image: url('assets/media/avatars/blank.png')">
                                <div class="image-input-wrapper w-125px h-125px" id="editImagen"
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
                        <div class="fv-row mb-4">
                            <label class="fw-bold fs-6 mb-2">Nombres completos</label>
                            <input type="text" name="editId" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="editId" hidden />
                            <input type="text" name="editNombre" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="editNombres" disabled />
                        </div>
                        <div class="fv-row mb-4">
                            <label class="required fw-bold fs-6 mb-2">Email</label>
                            <input type="email" name="editEmail" class="form-control form-control-solid mb-3 mb-lg-0"
                                id="editEmail" />
                        </div>
                        <div class="fv-row mb-4">
                            <label class="required fw-bold fs-6 mb-2">Rol</label>
                            <select class="form-select form-select-solid" name="editRol" id="editRol" tabindex="-1"
                                aria-hidden="true" required>
                                <option selected value="">Seleccionar un rol</option>
                                <option id="admin" value="admin">Administrador</option>
                                <option id="proveedor" value="proveedor">Proveedor</option>
                                <option id="cliente" value="cliente">Cliente</option>
                                <option id="usuario" value="usuario">Usuario</option>
                                <option id="invitado" value="invitado">Invitado</option>
                            </select>
                        </div>
                        <div class="fv-row mb-4">
                            <label class="required fw-bold fs-6 mb-2">Número</label>
                            <input type="text" name="editNumero"
                                class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="editNumero" />
                        </div>
                        <div class="fv-row mb-4">
                            <label class="required fw-bold fs-6 mb-2">Direccion</label>
                            <input type="text" name="editDireccion"
                                class="form-control form-control-solid mb-3 mb-lg-0 col-m-2" id="editDireccion" />
                        </div>
                    </div>
                    <div class="text-center pt-6">


                        <button class="btn btn-light me-3 modal-close">Cancelar</button>
                        <button type="submit" class="btn btn-success" name="btneditar" value="editarU">
                            <span class="indicator-label">Guardar</span>
                        </button>
                    </div>
                </form>
                <div class="text-center pt-6">
                    <form id="kt_modal_reset_user_form" class="form" method="POST" enctype="multipart/form-data">
                        <input type="text" id="resetId" name="resetId"
                            class="form-control form-control-solid mb-0 mb-lg-0" hidden />
                        <input type="text" id="resetNombres" name="resetNombres"
                            class="form-control form-control-solid mb-0 mb-lg-0" hidden />
                        <input type="password" value="User1234." name="resetPass"
                            class="form-control form-control-solid mb-0 mb-lg-0" hidden />
                        <button type="submit" class="btn btn-primary" name="btnreset" value="resetU">
                            <span class="indicator-label">Resetear password</span>
                        </button>
                        <p class="mt-2"> Se reiniciara el password a "User1234."</p>
                    </form>
                </div>
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
                                <div class="image-input-wrapper w-125px h-125px" id="editImagen"
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
                                <label class="form-label fw-bolder text-dark fs-6">Nombres</label>
                                <input type="text" name="crearNombres"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearNombres" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Apellidos</label>
                                <input type="text" name="crearApellidos"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearApellidos" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Número</label>
                                <input type="text" name="crearNumero"
                                    class="form-control form-control-solid mb-3 mb-lg-0" id="crearNumero" required />
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Direccion</label>
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