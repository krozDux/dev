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
                            <div class="card h-xl-100">
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Files</span>
                                        <span class="text-muted mt-1 fw-bold fs-7">Over 100 pending files</span>
                                    </h3>
                                </div>
                                <div class="card-body py-3 h-300">
                                    <div id="chart_div" style="height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5 g-lg-10">
	                            <!--begin::Col-->
	                            <div class="col-xl-6 mb-5 mb-xl-10">
	                                <!--begin::Tables Widget 3-->
	                                <div class="card h-xl-100">
	                                    <!--begin::Header-->
	                                    <div class="card-header border-0 pt-5">
	                                        <h3 class="card-title align-items-start flex-column">
	                                            <span class="card-label fw-bolder fs-3 mb-1">Files</span>
	                                            <span class="text-muted mt-1 fw-bold fs-7">Over 100 pending files</span>
	                                        </h3>
	                                        <div class="card-toolbar">
	                                            <!--begin::Menu-->
	                                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
	                                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
	                                                <span class="svg-icon svg-icon-2">
	                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
	                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor"></rect>
	                                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
	                                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
	                                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3"></rect>
	                                                        </g>
	                                                    </svg>
	                                                </span>
	                                                <!--end::Svg Icon-->
	                                            </button>
	                                            <!--begin::Menu 3-->
	                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
	                                                <!--begin::Heading-->
	                                                <div class="menu-item px-3">
	                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
	                                                        Payments</div>
	                                                </div>
	                                                <!--end::Heading-->
	                                                <!--begin::Menu item-->
	                                                <div class="menu-item px-3">
	                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
	                                                </div>
	                                                <!--end::Menu item-->
	                                                <!--begin::Menu item-->
	                                                <div class="menu-item px-3">
	                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
	                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target name for future usage and reference" aria-label="Specify a target name for future usage and reference"></i></a>
	                                                </div>
	                                                <!--end::Menu item-->
	                                                <!--begin::Menu item-->
	                                                <div class="menu-item px-3">
	                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
	                                                </div>
	                                                <!--end::Menu item-->
	                                                <!--begin::Menu item-->
	                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
	                                                    <a href="#" class="menu-link px-3">
	                                                        <span class="menu-title">Subscription</span>
	                                                        <span class="menu-arrow"></span>
	                                                    </a>
	                                                    <!--begin::Menu sub-->
	                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
	                                                        <!--begin::Menu item-->
	                                                        <div class="menu-item px-3">
	                                                            <a href="#" class="menu-link px-3">Plans</a>
	                                                        </div>
	                                                        <!--end::Menu item-->
	                                                        <!--begin::Menu item-->
	                                                        <div class="menu-item px-3">
	                                                            <a href="#" class="menu-link px-3">Billing</a>
	                                                        </div>
	                                                        <!--end::Menu item-->
	                                                        <!--begin::Menu item-->
	                                                        <div class="menu-item px-3">
	                                                            <a href="#" class="menu-link px-3">Statements</a>
	                                                        </div>
	                                                        <!--end::Menu item-->
	                                                        <!--begin::Menu separator-->
	                                                        <div class="separator my-2"></div>
	                                                        <!--end::Menu separator-->
	                                                        <!--begin::Menu item-->
	                                                        <div class="menu-item px-3">
	                                                            <div class="menu-content px-3">
	                                                                <!--begin::Switch-->
	                                                                <label class="form-check form-switch form-check-custom form-check-solid">
	                                                                    <!--begin::Input-->
	                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
	                                                                    <!--end::Input-->
	                                                                    <!--end::Label-->
	                                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
	                                                                    <!--end::Label-->
	                                                                </label>
	                                                                <!--end::Switch-->
	                                                            </div>
	                                                        </div>
	                                                        <!--end::Menu item-->
	                                                    </div>
	                                                    <!--end::Menu sub-->
	                                                </div>
	                                                <!--end::Menu item-->
	                                                <!--begin::Menu item-->
	                                                <div class="menu-item px-3 my-1">
	                                                    <a href="#" class="menu-link px-3">Settings</a>
	                                                </div>
	                                                <!--end::Menu item-->
	                                            </div>
	                                            <!--end::Menu 3-->
	                                            <!--end::Menu-->
	                                        </div>
	                                    </div>
	                                    <!--end::Header-->
	                                    <!--begin::Body-->
	                                    <div class="card-body py-3">
	                                        <!--begin::Table container-->
	                                        <div class="table-responsive">
	                                            <!--begin::Table-->
	                                            <table class="table align-middle gs-0 gy-3">
	                                                <!--begin::Table head-->
	                                                <thead>
	                                                    <tr>
	                                                        <th class="p-0 w-50px"></th>
	                                                        <th class="p-0 min-w-150px"></th>
	                                                        <th class="p-0 min-w-140px"></th>
	                                                        <th class="p-0 min-w-120px"></th>
	                                                        <th class="p-0 min-w-40px"></th>
	                                                    </tr>
	                                                </thead>
	                                                <!--end::Table head-->
	                                                <!--begin::Table body-->
	                                                <tbody>
	                                                    <tr>
	                                                        <td>
	                                                            <div class="symbol symbol-50px me-2">
	                                                                <span class="symbol-label bg-light-success">
	                                                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
	                                                                    <span class="svg-icon svg-icon-2x svg-icon-success">
	                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor"></path>
	                                                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor"></path>
	                                                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor"></path>
	                                                                        </svg>
	                                                                    </span>
	                                                                    <!--end::Svg Icon-->
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                        <td>
	                                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Top
	                                                                Authors</a>
	                                                        </td>
	                                                        <td class="text-end text-muted fw-bold">ReactJs, HTML</td>
	                                                        <td class="text-end text-muted fw-bold">4600 Users</td>
	                                                        <td class="text-end text-dark fw-bolder fs-6 pe-0">5.4MB</td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td>
	                                                            <div class="symbol symbol-50px me-2">
	                                                                <span class="symbol-label bg-light-danger">
	                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
	                                                                    <span class="svg-icon svg-icon-2x svg-icon-danger">
	                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
	                                                                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
	                                                                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
	                                                                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
	                                                                        </svg>
	                                                                    </span>
	                                                                    <!--end::Svg Icon-->
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                        <td>
	                                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
	                                                                Authors</a>
	                                                        </td>
	                                                        <td class="text-end text-muted fw-bold">Python, MySQL</td>
	                                                        <td class="text-end text-muted fw-bold">7200 Users</td>
	                                                        <td class="text-end text-dark fw-bolder fs-6 pe-0">2.8MB</td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td>
	                                                            <div class="symbol symbol-50px me-2">
	                                                                <span class="symbol-label bg-light-info">
	                                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
	                                                                    <span class="svg-icon svg-icon-2x svg-icon-info">
	                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                            <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor"></path>
	                                                                            <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor"></path>
	                                                                        </svg>
	                                                                    </span>
	                                                                    <!--end::Svg Icon-->
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                        <td>
	                                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New
	                                                                Users</a>
	                                                        </td>
	                                                        <td class="text-end text-muted fw-bold">Laravel, Metronic</td>
	                                                        <td class="text-end text-muted fw-bold">890 Users</td>
	                                                        <td class="text-end text-dark fw-bolder fs-6 pe-0">1.5MB</td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td>
	                                                            <div class="symbol symbol-50px me-2">
	                                                                <span class="symbol-label bg-light-warning">
	                                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
	                                                                    <span class="svg-icon svg-icon-2x svg-icon-warning">
	                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"></path>
	                                                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"></path>
	                                                                        </svg>
	                                                                    </span>
	                                                                    <!--end::Svg Icon-->
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                        <td>
	                                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
	                                                                Customers</a>
	                                                        </td>
	                                                        <td class="text-end text-muted fw-bold">AngularJS, C#</td>
	                                                        <td class="text-end text-muted fw-bold">4600 Users</td>
	                                                        <td class="text-end text-dark fw-bolder fs-6 pe-0">5.4MB</td>
	                                                    </tr>
	                                                    <tr>
	                                                        <td>
	                                                            <div class="symbol symbol-50px me-2">
	                                                                <span class="symbol-label bg-light-primary">
	                                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
	                                                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
	                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                            <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="currentColor"></path>
	                                                                            <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="currentColor"></path>
	                                                                        </svg>
	                                                                    </span>
	                                                                    <!--end::Svg Icon-->
	                                                                </span>
	                                                            </div>
	                                                        </td>
	                                                        <td>
	                                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
	                                                                Customers</a>
	                                                        </td>
	                                                        <td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
	                                                        <td class="text-end text-muted fw-bold">354 Users</td>
	                                                        <td class="text-end text-dark fw-bolder fs-6 pe-0">500KB</td>
	                                                    </tr>
	                                                </tbody>
	                                                <!--end::Table body-->
	                                            </table>
	                                            <!--end::Table-->
	                                        </div>
	                                        <!--end::Table container-->
	                                    </div>
	                                    <!--begin::Body-->
	                                </div>
	                                <!--end::Tables Widget 3-->
	                            </div>
	                            <!--end::Col-->
	                            <!--begin::Col-->
	                            <div class="col-xl-6 mb-5 mb-xl-10">
	                                <!--begin::Table Widget 6-->
	                                <div class="card h-xl-100">
	                                    <!--begin::Header-->
	                                    <div class="card-header border-0 pt-5">
	                                        <h3 class="card-title align-items-start flex-column">
	                                            <span class="card-label fw-bolder fs-3 mb-1">Authors Earnings</span>
	                                            <span class="text-muted mt-1 fw-bold fs-7">More than 400 new authors</span>
	                                        </h3>
	                                        <div class="card-toolbar">
	                                            <ul class="nav">
	                                                <li class="nav-item">
	                                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_6_tab_1">Month</a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1" data-bs-toggle="tab" href="#kt_table_widget_6_tab_2">Week</a>
	                                                </li>
	                                                <li class="nav-item">
	                                                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 active" data-bs-toggle="tab" href="#kt_table_widget_6_tab_3">Day</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                    <!--end::Header-->
	                                    <!--begin::Body-->
	                                    <div class="card-body py-3">
	                                        <div class="tab-content">
	                                            <!--begin::Tap pane-->
	                                            <div class="tab-pane fade" id="kt_table_widget_6_tab_1">
	                                                <!--begin::Table container-->
	                                                <div class="table-responsive">
	                                                    <!--begin::Table-->
	                                                    <table class="table align-middle gs-0 gy-3">
	                                                        <!--begin::Table head-->
	                                                        <thead>
	                                                            <tr>
	                                                                <th class="p-0 w-50px"></th>
	                                                                <th class="p-0 min-w-150px"></th>
	                                                                <th class="p-0 min-w-140px"></th>
	                                                                <th class="p-0 min-w-120px"></th>
	                                                            </tr>
	                                                        </thead>
	                                                        <!--end::Table head-->
	                                                        <!--begin::Table body-->
	                                                        <tbody>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
	                                                                        Simmons</a>
	                                                                    <span class="text-muted fw-bold d-block">Successful
	                                                                        Fellas</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$200,500</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-primary fs-7 fw-bolder">+28%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie
	                                                                        Clarcson</a>
	                                                                    <span class="text-muted fw-bold d-block">HTML, CSS
	                                                                        Coding</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$1,200,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-warning fs-7 fw-bolder">+52%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie
	                                                                        Clarcson</a>
	                                                                    <span class="text-muted fw-bold d-block">PHP,
	                                                                        Laravel, VueJS</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$1,200,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-danger fs-7 fw-bolder">+52%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Natali
	                                                                        Trump</a>
	                                                                    <span class="text-muted fw-bold d-block">UI/UX
	                                                                        Designer</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$3,400,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-success fs-7 fw-bolder">-34%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/043-boy-18.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Kevin
	                                                                        Leonard</a>
	                                                                    <span class="text-muted fw-bold d-block">Art
	                                                                        Director</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$35,600,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-info fs-7 fw-bolder">+230%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                        </tbody>
	                                                        <!--end::Table body-->
	                                                    </table>
	                                                </div>
	                                                <!--end::Table-->
	                                            </div>
	                                            <!--end::Tap pane-->
	                                            <!--begin::Tap pane-->
	                                            <div class="tab-pane fade" id="kt_table_widget_6_tab_2">
	                                                <!--begin::Table container-->
	                                                <div class="table-responsive">
	                                                    <!--begin::Table-->
	                                                    <table class="table align-middle gs-0 gy-3">
	                                                        <!--begin::Table head-->
	                                                        <thead>
	                                                            <tr>
	                                                                <th class="p-0 w-50px"></th>
	                                                                <th class="p-0 min-w-150px"></th>
	                                                                <th class="p-0 min-w-140px"></th>
	                                                                <th class="p-0 min-w-120px"></th>
	                                                            </tr>
	                                                        </thead>
	                                                        <!--end::Table head-->
	                                                        <!--begin::Table body-->
	                                                        <tbody>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/018-girl-9.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie
	                                                                        Clarcson</a>
	                                                                    <span class="text-muted fw-bold d-block">HTML, CSS
	                                                                        Coding</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$1,200,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-warning fs-7 fw-bolder">+52%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Natali
	                                                                        Trump</a>
	                                                                    <span class="text-muted fw-bold d-block">UI/UX
	                                                                        Designer</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$3,400,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-success fs-7 fw-bolder">-34%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
	                                                                        Simmons</a>
	                                                                    <span class="text-muted fw-bold d-block">Successful
	                                                                        Fellas</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$200,500</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-primary fs-7 fw-bolder">+28%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                        </tbody>
	                                                        <!--end::Table body-->
	                                                    </table>
	                                                </div>
	                                                <!--end::Table-->
	                                            </div>
	                                            <!--end::Tap pane-->
	                                            <!--begin::Tap pane-->
	                                            <div class="tab-pane fade show active" id="kt_table_widget_6_tab_3">
	                                                <!--begin::Table container-->
	                                                <div class="table-responsive">
	                                                    <!--begin::Table-->
	                                                    <table class="table align-middle gs-0 gy-3">
	                                                        <!--begin::Table head-->
	                                                        <thead>
	                                                            <tr>
	                                                                <th class="p-0 w-50px"></th>
	                                                                <th class="p-0 min-w-150px"></th>
	                                                                <th class="p-0 min-w-140px"></th>
	                                                                <th class="p-0 min-w-120px"></th>
	                                                            </tr>
	                                                        </thead>
	                                                        <!--end::Table head-->
	                                                        <!--begin::Table body-->
	                                                        <tbody>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/047-girl-25.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Jessie
	                                                                        Clarcson</a>
	                                                                    <span class="text-muted fw-bold d-block">HTML, CSS
	                                                                        Coding</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$1,200,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-danger fs-7 fw-bolder">+52%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/014-girl-7.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Natali
	                                                                        Trump</a>
	                                                                    <span class="text-muted fw-bold d-block">UI/UX
	                                                                        Designer</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$3,400,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-success fs-7 fw-bolder">-34%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/043-boy-18.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Kevin
	                                                                        Leonard</a>
	                                                                    <span class="text-muted fw-bold d-block">Art
	                                                                        Director</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$35,600,000</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-info fs-7 fw-bolder">+230%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>
	                                                                    <div class="symbol symbol-50px me-2">
	                                                                        <span class="symbol-label">
	                                                                            <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
	                                                                        </span>
	                                                                    </div>
	                                                                </td>
	                                                                <td>
	                                                                    <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
	                                                                        Simmons</a>
	                                                                    <span class="text-muted fw-bold d-block">Successful
	                                                                        Fellas</span>
	                                                                </td>
	                                                                <td>
	                                                                    <span class="text-muted fw-bold d-block fs-7">Paid</span>
	                                                                    <span class="text-dark fw-bolder d-block fs-5">$200,500</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <span class="text-primary fs-7 fw-bolder">+28%</span>
	                                                                </td>
	                                                                <td class="text-end">
	                                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
	                                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
	                                                                        <span class="svg-icon svg-icon-2">
	                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
	                                                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor"></rect>
	                                                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor"></path>
	                                                                            </svg>
	                                                                        </span>
	                                                                        <!--end::Svg Icon-->
	                                                                    </a>
	                                                                </td>
	                                                            </tr>
	                                                        </tbody>
	                                                        <!--end::Table body-->
	                                                    </table>
	                                                </div>
	                                                <!--end::Table-->
	                                            </div>
	                                            <!--end::Tap pane-->
	                                        </div>
	                                    </div>
	                                    <!--end::Body-->
	                                </div>
	                                <!--end::Tables Widget 6-->
	                            </div>
	                            <!--end::Col-->
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