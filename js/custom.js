// Eliminación de usuario de la pantalla de usuarios
$(document).ready(function(){
	$(document).on('click', '.EliminarUsuario', function(){
		var id=$(this).val();
		var Nombres=$('#NombreUsuario'+id).text();
		var Apellidos=$('#ApellidoUsuario'+id).text();
		var Usuario=$('#idUsuario'+id).text();
	
		$('#frmEliminar').modal('show');
		$('#idUsuarioEliminacion').val(Usuario);
		document.querySelector('#NombresApellidos').innerText = Nombres + " " + Apellidos;
	});
});

// Edición de usuario de la pantalla de usuario
$(document).ready(function(){
	$(document).on('click', '.EditarUsuario', function(){
		var id=$(this).val();
		var PersonaEditar=$('#idUsuario'+id).text();
		var NombreUsuario=$('#NombreUsuario'+id).text();
		var ApellidoUsuario=$('#ApellidoUsuario'+id).text();
		var TelefonoUsuario=$('#TelefonoUsuario'+id).text();
		var DireccionUsuario=$('#DireccionUsuario'+id).text();
		var CorreoUsuario=$('#CorreoUsuario'+id).text();
		var NombreInicioSesionUsuario=$('#NombreInicioSesionUsuario'+id).text();
		var Puesto=$('#Puesto'+id).text();
		var Rol=$('#Rol'+id).text();
	
		$('#frmEditar').modal('show');
		$('#idEditar').val(PersonaEditar);
		$('#NombreEditar').val(NombreUsuario);
		$('#ApellidoEditar').val(ApellidoUsuario);
		$('#TelefonoEditar').val(TelefonoUsuario);
		$('#DireccionEditar').val(DireccionUsuario);
		$('#CorreoEditar').val(CorreoUsuario);
		$('#NombreInicioEditar').val(NombreInicioSesionUsuario);
		$('#PuestoEditar').val(Puesto);
		$('#RolEditar').val(Rol);;
	});
});

// Edición de números de banco de la pantalla de empleados
$(document).ready(function(){
	$(document).on('click', '.EditarEmpleado', function(){
		var id=$(this).val();
		var idEmpleado=$('#idEmpleado'+id).text();
		var CodigoEmpleado=$('#CodigoEmpleado'+id).text();
		var NombreEmpleado=$('#NombreEmpleado'+id).text();
		var ApellidoEmpleado=$('#ApellidoEmpleado'+id).text();
		var FechaNacEmpleado=$('#FechaNacEmpleado'+id).text();
		var TelefonoEmpleado=$('#TelefonoEmpleado'+id).text();
		var DireccionEmpleado=$('#DireccionEmpleado'+id).text();
		var CorreoEmpleado=$('#CorreoEmpleado'+id).text();
					
		$('#frmEditarEmpleado').modal('show');
		$('#idEmpleadoEditar').val(idEmpleado);
		$('#CodigoEmpleadoEditar').val(CodigoEmpleado);
		$('#NombreEmpleadoEditar').val(NombreEmpleado);
		$('#ApellidoEmpleadoEditar').val(ApellidoEmpleado);
		$('#FechaNacEmpleadoEditar').val(FechaNacEmpleado);
		$('#TelefonoEmpleadoEditar').val(TelefonoEmpleado);
		$('#DireccionEmpleadoEditar').val(DireccionEmpleado);
		$('#CorreoEmpleadoEditar').val(CorreoEmpleado);	
	});
});

// Eliminación de empleado de la pantalla de empleados
$(document).ready(function(){
	$(document).on('click', '.EliminarEmpleado', function(){
		var id=$(this).val();
		var NombreEmpleado=$('#NombreEmpleado'+id).text();
		var idEmpleado=$('#idEmpleado'+id).text();
	
		$('#frmEliminarEmpleado').modal('show');
		$('#idEmpleadoAEliminar').val(idEmpleado);
		document.querySelector('#NombreEmpleado').innerText = NombreEmpleado;
	});
});

// Edición de números de banco de la pantalla de clientes
$(document).ready(function(){
	$(document).on('click', '.EditarCliente', function(){
		var id=$(this).val();
		var idCliente=$('#idCliente'+id).text();
		var NombreCliente=$('#NombreEmpleado'+id).text();
		var ApellidoCliente=$('#ApellidoEmpleado'+id).text();
		var TelefonoCliente=$('#TelefonoCliente'+id).text();
		var DireccionCliente=$('#DireccionCliente'+id).text();
		var FechaNacCliente=$('#FechaNacCliente'+id).text();
		var NitCliente=$('#NitCliente'+id).text();
					
		$('#frmEditarCliente').modal('show');
		$('#idClienteEditar').val(idCliente);
		$('#NombreClienteEditar').val(NombreCliente);
		$('#ApellidoClienteEditar').val(ApellidoCliente);
		$('#TelefonoClienteEditar').val(TelefonoCliente);
		$('#DireccionClienteEditar').val(DireccionCliente);
		$('#FechaNacClienteEditar').val(FechaNacCliente);
		$('#NitClienteEditar').val(NitCliente);	
	});
});

// Eliminación de empleado de la pantalla de empleados
$(document).ready(function(){
	$(document).on('click', '.EliminarCliente', function(){
		var id=$(this).val();
		var NombreCliente=$('#NombreCliente'+id).text();
		var idCliente=$('#idCliente'+id).text();
	
		$('#frmEliminarCliente').modal('show');
		$('#idClienteAEliminar').val(idCliente);
		document.querySelector('#NombreCliente').innerText = NombreCliente;
	});
});