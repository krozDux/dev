<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios WHERE estado = 1 and rol='cliente'");
$query1 = mysqli_query($con, $sql1);
?>
<div class="row g-6 g-xl-9">
    <div class="col-md-6 col-xl-4" style="border: 2px solid #e9edf1; border-radius: 12px;">
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <div class="card-header border-0 pt-9">
                <div class="card-title m-0">
                    <div class="fs-3 fw-bold text-gray-900">
					Fitnes App
                    </div>
                </div>

                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
            </div>

            <div class="card-body p-9">
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
                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">C</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>

    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/disqus.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light fw-bold me-auto px-4 py-3">Pending</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Leaf CRM </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">May 10, 2021 </div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$36,400.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 30% completed"
                    data-bs-original-title="This project 30% completed" data-kt-initialized="1">
                    <div class="bg-info rounded h-4px" role="progressbar" style="width: 30%" aria-valuenow=" 30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Alan Warden" data-kt-initialized="1">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Brian Cox"
                        data-bs-original-title="Brian Cox" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/figma-1.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Atica Banking </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Mar 14, 2021 </div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$605,100.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 100% completed"
                    data-bs-original-title="This project 100% completed" data-kt-initialized="1">
                    <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow=" 100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Mad Macy"
                        data-bs-original-title="Mad Macy" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Cris Willson"
                        data-bs-original-title="Cris Willson" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Mike Garcie" data-kt-initialized="1">
                        <span class="symbol-label bg-info text-inverse-info fw-bold">M</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/sentry-3.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light fw-bold me-auto px-4 py-3">Pending</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Finance Dispatch </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">May 05, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 60% completed"
                    data-bs-original-title="This project 60% completed" data-kt-initialized="1">
                    <div class="bg-info rounded h-4px" role="progressbar" style="width: 60%" aria-valuenow=" 60"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Nich Warden" data-kt-initialized="1">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">N</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Rob Otto" data-kt-initialized="1">
                        <span class="symbol-label bg-success text-inverse-success fw-bold">R</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/xing-icon.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    9 Degree </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Jul 25, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 40% completed"
                    data-bs-original-title="This project 40% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow=" 40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham"
                        data-bs-original-title="Francis Mitcham" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-20.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston"
                        data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-7.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/tvit.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    GoPro App </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Mar 10, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 70% completed"
                    data-bs-original-title="This project 70% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow=" 70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy"
                        data-bs-original-title="Melody Macy" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Robin Watterman" data-kt-initialized="1">
                        <span class="symbol-label bg-success text-inverse-success fw-bold">R</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/aven.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Buldozer CRM </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Apr 15, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 70% completed"
                    data-bs-original-title="This project 70% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow=" 70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy"
                        data-bs-original-title="Melody Macy" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="John Mixin"
                        data-bs-original-title="John Mixin" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-14.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Emma Smith" data-kt-initialized="1">
                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/treva.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-danger fw-bold me-auto px-4 py-3">Overdue</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Aviasales App </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Nov 10, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 10% completed"
                    data-bs-original-title="This project 10% completed" data-kt-initialized="1">
                    <div class="bg-danger rounded h-4px" role="progressbar" style="width: 10%" aria-valuenow=" 10"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Alan Warden" data-kt-initialized="1">
                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Brian Cox"
                        data-bs-original-title="Brian Cox" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">

        <!--begin::Card-->
        <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-9">
                <!--begin::Card Title-->
                <div class="card-title m-0">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px w-50px bg-light">
                        <img src="/metronic8/demo14/assets/media/svg/brand-logos/kanba.svg" alt="image" class="p-3">
                    </div>
                    <!--end::Avatar-->
                </div>
                <!--end::Car Title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end:: Card header-->

            <!--begin:: Card body-->
            <div class="card-body p-9">
                <!--begin::Name-->
                <div class="fs-3 fw-bold text-gray-900">
                    Oppo CRM </div>
                <!--end::Name-->

                <!--begin::Description-->
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    CRM App application to HR efficiency </p>
                <!--end::Description-->

                <!--begin::Info-->
                <div class="d-flex flex-wrap mb-5">
                    <!--begin::Due-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">Jun 20, 2023</div>
                        <div class="fw-semibold text-gray-500">Due Date</div>
                    </div>
                    <!--end::Due-->

                    <!--begin::Budget-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                        <div class="fw-semibold text-gray-500">Budget</div>
                    </div>
                    <!--end::Budget-->
                </div>
                <!--end::Info-->

                <!--begin::Progress-->
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 100% completed"
                    data-bs-original-title="This project 100% completed" data-kt-initialized="1">
                    <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow=" 100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!--end::Progress-->

                <!--begin::Users-->
                <div class="symbol-group symbol-hover">
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Nick Macy"
                        data-bs-original-title="Nick Macy" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Sean Paul"
                        data-bs-original-title="Sean Paul" data-kt-initialized="1">
                        <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                    </div>
                    <!--begin::User-->
                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        data-bs-original-title="Mike Collin" data-kt-initialized="1">
                        <span class="symbol-label bg-info text-inverse-info fw-bold">M</span>
                    </div>
                    <!--begin::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end:: Card body-->
        </a>
        <!--end::Card-->
    </div>
    <!--end::Col-->
</div>