<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios");
$query1 = mysqli_query($con, $sql1);
?>
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<thead>
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-120px">
														Imagen
													</th>
													<th class="min-w-125px">Nombres</th>
													<th class="min-w-125px">Apellidos</th>
													<th class="min-w-125px">Email</th>
													<th class="min-w-125px">Rol</th>
													<th class="min-w-125px">Número</th>
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
													<td><?php echo $dataUsuario1['nombres']; ?></td>
													<td><?php echo $dataUsuario1['apellidos']; ?></td>
													<td><?php echo $dataUsuario1['email']; ?></td>
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


													<?php 
													if ($dataUsuario1['numero'] == "-") { ?>
													<td><?php echo $dataUsuario1['numero']; ?></td>
													<?php } else { ?>
														<td><a href="https://wa.me/51<?php echo $dataUsuario1['numero']; ?>"><?php echo $dataUsuario1['numero']; ?></a></td>
													<?php } ?>
													
													
													<td >
														<a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Acciones
														<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon--></a>
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-100px py-4 " data-kt-menu="true">
															<div class="menu-item px-3">
																<buttton type="button" class="menu-link px-3 edit-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-email="<?php echo $dataUsuario1['email']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-rol="<?php echo $dataUsuario1['rol']; ?>"
																data-numero="<?php echo $dataUsuario1['numero']; ?>"
																data-imagen="<?php echo $dataUsuario1['imagen']; ?>"
																>Editar</buttton>
															</div>
															<div class="menu-item px-3">
																<buttton type="button" class="menu-link px-3 del-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-rol="<?php echo $dataUsuario1['rol']; ?>"
																>Eliminar</buttton>
															</div>
														</div>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>