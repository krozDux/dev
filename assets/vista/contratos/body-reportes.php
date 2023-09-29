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
                            <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Reportes</h1>
                        </div>
                    </div>
                    <div class="row g-5 g-lg-10">
	                            <div class="col-xl-6 mb-5 mb-xl-10">
	                                <div class="card h-xl-100">
	                                    <div class="card-header border-0 pt-5">
	                                        <h3 class="card-title align-items-start flex-column">
	                                            <span class="card-label fw-bolder fs-3 mb-1">Files</span>
	                                            <span class="text-muted mt-1 fw-bold fs-7">Over 100 pending files</span>
	                                        </h3>
	                                    </div>
	                                    <div class="card h-md-100">
	                                        <div class="table-responsive">
                                                <div id="chart_div" style="height: 400px;"></div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-xl-6 mb-5 mb-xl-10">
                                    <div class="card h-xl-100">
	                                    <div class="card-header border-0 pt-5">
	                                        <h3 class="card-title align-items-start flex-column">
	                                            <span class="card-label fw-bolder fs-3 mb-1">Files</span>
	                                            <span class="text-muted mt-1 fw-bold fs-7">Over 100 pending files</span>
	                                        </h3>
	                                    </div>
	                                    <div class="card h-md-100">
	                                        <div class="table-responsive">
                                                <div id="columnchart_material" style="height: 400px;"></div>
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
<?php } else{
header("location: ../panel/index.php");
} ?>