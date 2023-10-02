<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios WHERE estado = 1 and rol='cliente'");
$query1 = mysqli_query($con, $sql1);
?>
<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
											<thead>
												<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-120px"> Imagen</th>
													<th class="min-w-125px">Nombres</th>
													<th data-priority="1" class="min-w-125px">Apellidos</th>
													<th class="min-w-125px">Email</th>
													<th class="min-w-125px">Dirección</th>
													<th class="min-w-125px">Número</th>
													<th data-priority="2" class="min-w-125px">Opciones</th>
												</tr>
											</thead>
											<tbody class="text-gray-600 fw-bold">
											<?php 
												$i = 1;
												while ($dataUsuario1 = mysqli_fetch_array($query1)) { ?>
												<tr>
													<td class="d-flex align-items-center">
														<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
															<a>
																<div class="symbol-label">
																	<img src="assets/media/avatars/<?php echo $dataUsuario1['imagen']; ?>" alt="<?php echo $dataUsuario1['nombres']; ?> <?php echo $dataUsuario1['apellidos']; ?>" class="w-100" />
																</div>
															</a>
														</div>
													</td>
													<td><?php echo $dataUsuario1['nombres']; ?></td>
													<td><?php echo $dataUsuario1['apellidos']; ?></td>
													<td><?php echo $dataUsuario1['email']; ?></td>
													<td><?php echo $dataUsuario1['direccion']; ?></td>
													<?php 
													if ($dataUsuario1['numero'] == "-") { ?>
													<td><?php echo $dataUsuario1['numero']; ?></td>
													<?php } else { ?>
														<td><a href="https://wa.me/51<?php echo $dataUsuario1['numero']; ?>"><?php echo $dataUsuario1['numero']; ?></a></td>
													<?php } ?>
													
													
													<td>
																<buttton type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm edit-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-email="<?php echo $dataUsuario1['email']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-direccion="<?php echo $dataUsuario1['direccion']; ?>"
																data-numero="<?php echo $dataUsuario1['numero']; ?>"
																data-imagen="<?php echo $dataUsuario1['imagen']; ?>"><span class="bi bi-pencil-fill fs-7 opacity-75"></buttton>
																<buttton type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm del-usuario" 
																data-id="<?php echo $dataUsuario1['id']; ?>"
																data-nombres="<?php echo $dataUsuario1['nombres']; ?>"
																data-apellidos="<?php echo $dataUsuario1['apellidos']; ?>"
																data-rol="<?php echo $dataUsuario1['rol']; ?>"><span class="bi bi-trash-fill fs-7 opacity-75"></span></buttton>
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>