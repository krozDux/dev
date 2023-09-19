<!DOCTYPE html>
<?php  if ($session_rol != "invitado" and $session_rol != "cliente" and $session_rol != "proveedor" ) {?>
<html lang="es">
	<?php include_once '../assets/controlador/sesion.php'?>
	<?php include_once '../assets/vista/clientes/head-clientes.php'?>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<?php include_once '../assets/vista/clientes/body-clientes.php'?>
		<script>var hostUrl = "assets/";</script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

		<script>
		$(document).ready(function () {
			
			$('#kt_table_users').DataTable({
			
				dom: 'fBrtip',
				responsive: true,
				columnDefs: [
					{ responsivePriority: 1, targets: 0 },
					{ responsivePriority: 2, targets: -1 },
					{ responsivePriority: 3, targets: 2 },
				],
				buttons: [
					{
						text: '<span class="svg-icon svg-icon-2">'+
							'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">'+
							'<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />'+
							'<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />'+
							'</svg>'+
							'</span>Registrar',
						className: 'btn btn-primary',
						action: function (e, dt, node, config) {
							$('#kt_modal_add_user').modal('show');
						}
					},
					{
						extend: 'excelHtml5',
						text: '<span class="svg-icon svg-icon-2">'+
							'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">'+
							'<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />'+
							'<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />'+
							'<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />'+
							'</svg>'+
							'</span>Exportar</button>',
						className: 'btn btn-primary ',
						exportOptions: {
							columns: [1, 2, 3, 4, 5]
						},
						autoFilter: true,
						sheetName: 'Reporte - Clientes'
					},
				],
				language: {
					search: 'Buscar: ',
					emptyTable: "No hay datos disponibles en la tabla",
					paginate: {
                next: "Siguiente",
                previous: "Anterior", 
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
			infoFiltered: '(filtrado de _MAX_ registros en total)',
			zeroRecords: 'No se encontraron registros coincidentes',
				},
			});
		});
	
		</script>
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<script>
		$('.del-usuario').on('click', function() {
			var id = $(this).data('id');
			var nombres = $(this).data('nombres');
			var apellidos = $(this).data('apellidos');
			var rol = $(this).data('rol');
			const rolM = rol.charAt(0).toUpperCase() + rol.slice(1);
			$('#delId').val(id);
    		$('#delNombres').val(nombres + " " + apellidos);
    		$('#delRol').val(rolM);
			$('#kt_modal_remove_user').modal('show');
		});
		</script>

		<script>
		$('.edit-usuario').on('click', function() {
			var id = $(this).data('id');
			var email = $(this).data('email');
			var nombres = $(this).data('nombres');
			var apellidos = $(this).data('apellidos');
			var direccion = $(this).data('direccion');
			var numero = $(this).data('numero');
			var imagen = $(this).data('imagen');
			$('#editId').val(id);
			$('#resetId').val(id);
			$('#resetNombres').val(nombres + " " + apellidos);
			$('#editEmail').val(email);
    		$('#editNombres').val(nombres + " " + apellidos);
    		$('#editDireccion').val(direccion);
			$('#editNumero').val(numero);
			document.getElementById("editImagen").style.backgroundImage="url(assets/media/avatars/"+imagen+")";
			$('#kt_modal_edit_user').modal('show');
		});
		</script>

		<script>
		$('.modal-close').on('click', function() {
			$('#kt_modal_remove_user').modal('hide');
			$('#kt_modal_add_user').modal('hide');
			$('#kt_modal_edit_user').modal('hide');
		});
		</script>
	</body>
</html>
<?php } else{
header("location: ../panel/index.php");
} ?>