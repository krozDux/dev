



<?php
include('../config.php');
$sql1 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto");
$query1 = mysqli_query($con, $sql1);
include('../config.php');
$sql2 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto");
$query2 = mysqli_query($con, $sql2);
?>
<div class="content flex-column-fluid mb-0" id="kt_content">
                        <div class="card">
                            <div class="card-body py-4">
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users" hidden>
											<thead>
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-125px">Nombre</th>
													<th class="min-w-125px">Fecha inicio</th>
													<th class="min-w-125px">Fecha Límite</th>
													<th class="min-w-125px">Descripción</th>
													<th class="min-w-125px">Estado</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-bold">
											<?php 
												$i = 1;
												while ($dataUsuario1 = mysqli_fetch_array($query1)) { ?>
												<tr>
													<td><?php echo strtoupper($dataUsuario1['nombre']);?></td>
													<td><?php echo $dataUsuario1['fechaInicio']; ?></td>
													<td><?php echo $dataUsuario1['fechaFin']; ?></td>
                                                    <?php 
													if ($dataUsuario1['descripcion'] == "") { ?>
													<td>-</td>
													<?php } else { ?>
													<td><?php echo $dataUsuario1['descripcion']; ?></td>
													<?php } ?>
													
													<?php 
													if ($dataUsuario1['estado'] == "1") { ?>
													<td>Activo</td>
													<?php } else { ?>
													<td>Inactivo</td>
													<?php } ?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
                                        </div>
                        </div>
                    </div>
                    <div class="row g-6 g-xl-9 mt-1">
                        
                        <?php 
                        while ($dataUsuario2 = mysqli_fetch_array($query2)) { ?>
                            <div class="col-md-6 col-xl-4 mt-2" style="border-radius: 12px;">
                                <a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary">
                                    <div class="card-header border-0 pt-9 pb-0">
                                        <div class="card-title m-0">
                                            <div class="fs-3 fw-bold text-gray-900">
                                            <?php echo $dataUsuario2['nombre']; ?>
                                            </div>
                                        </div>
                        
                                        <div class="card-toolbar">
                                            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                                        </div>
                                    </div>
                                    <?php 
                                    $fechaInicio = $dataUsuario2['fechaInicio'];
                                    $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                                    $fechaFin = $dataUsuario2['fechaFin'];
                                    $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                                    $idProyecto = $dataUsuario2['id'];
                                    ?>
                                    <div class="card-body pt-1">
                                        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                                            CRM App application to HR efficiency </p>
                                        <div class="d-flex flex-wrap mb-5">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaInicioF?></div>
                                                <div class="fw-semibold text-gray-500">Fecha de Inicio</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                                <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaFinF?></div>
                                                <div class="fw-semibold text-gray-500">Fecha limite</div>
                                            </div>
                                        </div>
                                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed"
                                            data-bs-original-title="This project 50% completed" data-kt-initialized="1">
                                            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow=" 50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="symbol-group symbol-hover">
                                        <?php
                                        include('../config.php');
                                        $sql3 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id WHERE proyectosInfo.idProyecto = '$idProyecto' AND proyectosInfo.estado='1';");
                                        $query3 = mysqli_query($con, $sql3);
                                        ?>
                                        <?php 
                                        while ($dataUsuario3 = mysqli_fetch_array($query3)) { ?>
                                        <?php 
                                        if ($dataUsuario3['imagen'] != "blank.png") { ?>
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                                                data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>" data-kt-initialized="1">
                                                <img alt="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>" src="assets/media/avatars/<?php echo $dataUsuario3['imagen']; ?>">
                                            </div>
                                        <?php } else {?>
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                                                data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>" data-kt-initialized="1">
                                                <span class="symbol-label bg-dark text-inverse-primary fw-bold"><?php echo substr($dataUsuario3['nombres'], 0, 1); ?><?php echo substr($dataUsuario3['apellidos'], 0, 1); ?></span>
                                            </div>
                                            <?php } }?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        