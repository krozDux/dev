<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario");
$query1 = mysqli_query($con, $sql1);
?>
<table class="table align-middle table-row-dashed fs-6 gy-5 " id="kt_table_users">
											<thead>
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-120px">
														Imagen
													</th>
													<th data-priority="1" class="min-w-125px">Nombres y Apellidos</th>
													<th data-priority="2" class="min-w-125px">Rol</th>
													<th class="min-w-125px">Email</th>
													<th class="min-w-125px">Número</th>
													<th class="min-w-125px">Fecha Inicio</th>
													<th class="min-w-125px">Fecha Fin</th>
													<th data-priority="3" class="min-w-125px">Opciones</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-bold">
											<?php 
												$i = 1;
												while ($dataUsuario1 = mysqli_fetch_array($query1)) { ?>
												<tr>
													<td class="d-flex align-items-center">
														<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
															<a href="">
																<div class="symbol-label">
																	<img src="assets/media/avatars/<?php echo $dataUsuario1['imagen']; ?>" alt="<?php echo $dataUsuario1['nombres']; ?> <?php echo $dataUsuario1['apellidos']; ?>" class="w-100" />
																</div>
															</a>
														</div>
													</td>
													<td><?php echo $dataUsuario1['nombres']; ?> <?php echo $dataUsuario1['apellidos']; ?></td>
													<?php 
													if ($dataUsuario1['rol'] == "admin") { ?>
													<td><div class="badge badge-light-danger fw-bolder"><?php echo ucfirst($dataUsuario1['rol']); ?></div></td>
													<?php } else if ($dataUsuario1['rol'] == "cliente") { ?>
														<td><div class="badge badge-light-success fw-bolder"><?php echo ucfirst($dataUsuario1['rol']); ?></div></td>
													<?php } else if ($dataUsuario1['rol'] == "proveedor"){ ?>
														<td><div class="badge badge-light-warning fw-bolder"><?php echo ucfirst($dataUsuario1['rol']); ?></div></td>
													<?php } else if ($dataUsuario1['rol'] == "usuario"){ ?>
														<td><div class="badge badge-light-info fw-bolder"><?php echo ucfirst($dataUsuario1['rol']); ?></div></td>
													<?php } else { ?>
														<td><div class="badge badge-light-dark fw-bolder"><?php echo ucfirst($dataUsuario1['rol']); ?></div></td>
													<?php } ?>
													<td><?php echo $dataUsuario1['email']; ?></td>
													<?php 
													if ($dataUsuario1['numero'] == "-") { ?>
													<td><?php echo $dataUsuario1['numero']; ?></td>
													<?php } else { ?>
														<td><a href="https://wa.me/51<?php echo $dataUsuario1['numero']; ?>"><?php echo $dataUsuario1['numero']; ?></a></td>
													<?php } ?>

													<?php if ($dataUsuario1['fechaInicio'] == "") { ?>
														<td> - </td>
													<?php } else { ?>
														<td><?php echo $dataUsuario1['fechaInicio']; ?></td>
													<?php } ?>
													
													<?php if ($dataUsuario1['fechaFin'] == "") { ?>
														<td> - </td>
													<?php } else { ?>
														<td><?php echo $dataUsuario1['fechaFin']; ?></td>
													<?php } ?>

													<td >
																<buttton type="button" title="Asignar contrato" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-email="<?php echo $dataUsuario1['email']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-direccion="<?php echo $dataUsuario1['direccion']; ?>"
																data-numero="<?php echo $dataUsuario1['numero']; ?>"
																data-imagen="<?php echo $dataUsuario1['imagen']; ?>"
																><span class="svg-icon svg-icon-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																		<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																		<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																	</svg>
																</span></buttton>
																<buttton type="button" class="menu-link px-3 del-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-rol="<?php echo $dataUsuario1['rol']; ?>"
																>Eliminar</buttton>
																
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										