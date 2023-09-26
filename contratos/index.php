
<!DOCTYPE html>
<?php  if ($session_rol != "invitado" and $session_rol != "cliente" and $session_rol != "proveedor" ) {?>
<html lang="es">
	<?php include_once '../assets/controlador/sesion.php'?>
	<?php include_once '../assets/vista/contratos/head-contratos.php'?>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<?php include_once '../assets/vista/contratos/body-contratos.php'?>
		<script>var hostUrl = "assets/";</script>
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>

		<script>
		$(document).ready(function () {
			
			$('#kt_table_users').DataTable({
				dom: 'fBrtip',
    			"sScrollX": "100%",
       			"sScrollXInner": "110%",
        		"bScrollCollapse": true,
				buttons: [
					{
						extend: 'excelHtml5',
						text: '<span class="svg-icon svg-icon-2 opacity-50">'+
							'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">'+
							'  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>'+
							'</svg>'+
							'</span>Exportar</button>',
						className: 'btn btn-primary ',
						exportOptions: {
							columns: [1, 2, 3, 4, 5, 6]
						},
						autoFilter: true,
						sheetName: 'Reporte - Usuarios'
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
		$('.reg-contrato').on('click', function() {
			var id = $(this).data('id');
			var email = $(this).data('email');
			var nombres = $(this).data('nombres');
			var apellidos = $(this).data('apellidos');
			var direccion = $(this).data('direccion');
			var numero = $(this).data('numero');
			var imagen = $(this).data('imagen');
			$('#regId').val(id);
			$('#resetId').val(id);
			$('#resetNombres').val(nombres + " " + apellidos);
			$('#regEmail').val(email);
    		$('#regNombres').val(nombres + " " + apellidos);
    		$('#regDireccion').val(direccion);
			$('#regNumero').val(numero);
			$('#kt_modal_reg_user').modal('show');
		});
		</script>

		<script>
		$('.modal-close').on('click', function() {
			$('#kt_modal_remove_user').modal('hide');
			$('#kt_modal_add_user').modal('hide');
			$('#kt_modal_reg_user').modal('hide');
		});
		</script>
	</body>
</html>
<?php } else{
header("location: ../panel/index.php");
} ?>