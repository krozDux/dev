<?php
include('../config.php');
$sql1 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto WHERE proyectosInfo.idUsuario = '$session_id'");
$query1 = mysqli_query($con, $sql1);
?>

<div class="row g-6 g-xl-9 pt-3">
<?php 
while ($dataUsuario1 = mysqli_fetch_array($query1)) { ?>
    <div class="col-md-6 col-xl-4" style="border-radius: 12px;">
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary">
            <div class="card-header border-0 pt-9 pb-0">
                <div class="card-title m-0">
                    <div class="fs-3 fw-bold text-gray-900">
					Fitnes App
                    </div>
                </div>

                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
            </div>

            <div class="card-body pt-1">
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Mar 10, 2023</div>
                        <div class="fw-semibold text-gray-500">Fecha de Inicio</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Mar 10, 2023</div>
                        <div class="fw-semibold text-gray-500">Fecha limite</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed"
                    data-bs-original-title="This project 50% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow=" 50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Emma Smith"
                        data-bs-original-title="Emma Smith" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-6.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Rudy Stone"
                        data-bs-original-title="Rudy Stone" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-1.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                        <span class="symbol-label bg-dark text-inverse-primary fw-bold">C</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <?php } ?>
</div>
