<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario");
$query1 = mysqli_query($con, $sql1);
?>
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<thead>
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-120px">
														Imagen
													</th>
													<th class="min-w-125px">Nombres y Apellidos</th>
													<th class="min-w-125px">Rol</th>
													<th class="min-w-125px">Email</th>
													<th class="min-w-125px">Número</th>
													<th class="min-w-125px">Fecha Inicio</th>
													<th class="min-w-125px">Fecha Fin</th>
													<th class="min-w-125px">Opciones</th>
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
																<buttton type="button" class="btn btn-primary edit-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-email="<?php echo $dataUsuario1['email']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-direccion="<?php echo $dataUsuario1['direccion']; ?>"
																data-numero="<?php echo $dataUsuario1['numero']; ?>"
																data-imagen="<?php echo $dataUsuario1['imagen']; ?>"
																><i class="fas fa-edit"></i></buttton>
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