<?php
include('../config.php');
$sql1 = ("SELECT proyectos.id, proyectos.nombre, proyectos.fechaInicio, proyectos.fechaFin, proyectos.descripcion, proyectos.fechaCreacion, proyectos.estado, proyectosInfo.tipo, proyectosInfo.fechaAdd, proyectosInfo.fechaEstado, proyectosInfo.idProyecto, GROUP_CONCAT(proyectosInfo.idUsuario) AS idUsuarios
FROM proyectos
JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto where proyectos.id= '$idProyecto'
GROUP BY proyectos.id");
$query1 = mysqli_query($con, $sql1);
?>
<div class="content flex-column-fluid" id="kt_content">
    <?php 
    $dataUsuario3Array = array(); // Array para almacenar los datos de $query3
    while ($dataUsuario1 = mysqli_fetch_array($query1)) {
        include('../config.php');
        $sql3 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id WHERE proyectosInfo.idProyecto = '$idProyecto' AND proyectosInfo.estado='1';");
        $query3 = mysqli_query($con, $sql3);
        // Almacenar los datos de $query3 en el array
        $dataUsuario3Array[$idProyecto] = array();
        while ($dataUsuario3 = mysqli_fetch_array($query3)) {
            $dataUsuario3Array[$idProyecto][] = $dataUsuario3;
        }
    ?>
    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-1">
                                <a
                                    class="text-gray-800 text-hover-primary fs-2 fw-bold me-3"><?php echo strtoupper($dataUsuario1['nombre']);?></a>
                                <?php 
									if ($dataUsuario1['estado'] == "1") { ?>
                                <span class="badge badge-light-warning me-auto">En progreso</span>
                                <?php } else { ?>
                                <span class="badge badge-light-success me-auto">Finalizado</span>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                <?php 
									if ($dataUsuario1['descripcion'] != "") { ?>
                                <?php echo $dataUsuario1['descripcion']; ?>
                                <?php } else { ?>
                                -
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <button class="btn btn-sm btn-bg-light btn-active-color-primary me-3 modal-trabajo"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_user">Agregar tarea</button>
                            <a class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_user">Agregar usuario</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-start">
                        <div class="d-flex flex-wrap">
                            <?php 
                        $fechaInicio = $dataUsuario1['fechaInicio'];
                        $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                        $fechaFin = $dataUsuario1['fechaFin'];
                        $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                        ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaInicioF?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Fecha inicio</div>
                            </div>

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaFinF?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Fecha límite</div>
                            </div>
                            <?php
                        $totaldocs = 0;
                        $sql15 = "SELECT GROUP_CONCAT(tareasInfo.idUsuario SEPARATOR ',') AS idUsuarios, 
                                        proyectosTareas.id,
                                        proyectosTareas.nombre,
                                        proyectosTareas.estado,
                                        proyectosTareas.fechaFin,
                                        tareasInfo.idTarea, 
                                        proyectosTareas.idProyecto 
                                FROM tareasInfo 
                                JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id 
                                WHERE proyectosTareas.idProyecto = '$idProyecto'
                                GROUP BY proyectosTareas.id;";
                        $query15 = mysqli_query($con, $sql15);
                        if ($query15) {
                            $totaldocs = mysqli_num_rows($query15); // Contamos el total de registros
                        }
                        ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75"
                                        data-kt-initialized="1"><?php echo $totaldocs ?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Documentos adjuntos</div>
                            </div>
                        </div>
                        <div class="symbol-group symbol-hover mb-3">
                            <?php foreach ($dataUsuario3Array[$dataUsuario1['id']] as $dataUsuario3) {
                                if ($dataUsuario3['imagen'] != "blank.png") {
                                    echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                            <img src="assets/media/avatars/' . $dataUsuario3['imagen'] . '" alt="user-image">
                                        </div>';
                                } else {
                                    $iniciales = substr($dataUsuario3['nombres'], 0, 1) . substr($dataUsuario3['apellidos'], 0, 1);
                                    echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                            <span class="symbol-label bg-dark text-inverse-primary fw-bold">' . $iniciales . '</span>
                                        </div>';
                                }
                            }}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/recursos?idProyecto=<?php echo $idProyecto ?>">
                        Información </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 active"
                        href="/../proyectos/tareas?idProyecto=<?php echo $idProyecto ?>">
                        Tareas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/miembros?idProyecto=<?php echo $idProyecto ?>">
                        Miembros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/archivos?idProyecto=<?php echo $idProyecto ?>">
                        Archivos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/actividad?idProyecto=<?php echo $idProyecto ?>">
                        Actividad </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/configuracion?idProyecto=<?php echo $idProyecto ?>">
                        Configuración </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row g-6 g-xl-9">
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<img src="assets/media//avatars/300-2.jpg" alt="image">
															<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Karina Clark</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<span class="symbol-label fs-2x fw-bold text-primary bg-light-primary">S</span>
															<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Sean Bean</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Developer at Loop Inc</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<img src="assets/media//avatars/300-1.jpg" alt="image">
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Alan Johnson</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Web Designer at Nextop Ltd.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<img src="assets/media//avatars/300-14.jpg" alt="image">
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Robert Doe</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Marketing Analytic at Avito Ltd.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<img src="assets/media//avatars/300-6.jpg" alt="image">
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Olivia Wild</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Art Director at Seal Inc.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<span class="symbol-label fs-2x fw-bold text-warning bg-light-warning">A</span>
															<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Adam Williams</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">System Arcitect at Wolto Co.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<span class="symbol-label fs-2x fw-bold text-info bg-light-info">P</span>
															<div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Peter Marcus</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<span class="symbol-label fs-2x fw-bold text-success bg-light-success">N</span>
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Neil Owen</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Accountant at Numbers Co.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 col-xxl-4">
												<!--begin::Card-->
												<div class="card">
													<!--begin::Card body-->
													<div class="card-body d-flex flex-center flex-column pt-12 p-9">
														<!--begin::Avatar-->
														<div class="symbol symbol-65px symbol-circle mb-5">
															<img src="assets/media//avatars/300-12.jpg" alt="image">
														</div>
														<!--end::Avatar-->
														<!--begin::Name-->
														<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">Benjamin Jacob</a>
														<!--end::Name-->
														<!--begin::Position-->
														<div class="fw-bold text-gray-400 mb-6">Art Director at Novica Co.</div>
														<!--end::Position-->
														<!--begin::Info-->
														<div class="d-flex flex-center flex-wrap">
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$14,560</div>
																<div class="fw-bold text-gray-400">Earnings</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">23</div>
																<div class="fw-bold text-gray-400">Tasks</div>
															</div>
															<!--end::Stats-->
															<!--begin::Stats-->
															<div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
																<div class="fs-6 fw-bolder text-gray-700">$236,400</div>
																<div class="fw-bold text-gray-400">Sales</div>
															</div>
															<!--end::Stats-->
														</div>
														<!--end::Info-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end::Col-->
										</div>
</div>