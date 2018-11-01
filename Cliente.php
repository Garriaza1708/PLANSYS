<<!--
	Sistema de Pollo Express System
	
	Mario Roberto Hernandez Gonzalez
	Gustavo Rodolfo Arriaza
	Oscar Danilo Perez Juarez
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="imagenes/PES.ico">
<title>PES</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login -->
<link rel="stylesheet" type="text/css" href="css/Modal.css"> 

</head>
	<?php
		include_once "Seguridad/conexion.php";
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1 || $_SESSION["PrivilegioUsuario"] == 2 || $_SESSION["PrivilegioUsuario"] == 3 || $_SESSION["PrivilegioUsuario"] == 4){
			// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
		?>
			<body>
				<nav class="navbar navbar-default">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="principal.php"><img src="imagenes/pes.png" class="img-circle" width="25" height="25"></a></div>
					  <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="defaultNavbar1">
							<ul class="nav navbar-nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Empleados<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearEmpleado.php">Crear empleado</a></li>
										<li><a href="Empleado.php">Lista de empleados</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Clientes<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearCliente.php">Crear cliente</a></li>
										<li><a href="#">Lista de clientes</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Productos<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearProducto.php">Ingresar producto</a></li>
										<li><a href="Producto.php">Lista de productos</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Proveedores<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearProveedor.php">Crear proveedor</a></li>
										<li><a href="Proveedor.php">Lista de proveedores</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Pagos<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="GenerarPlanilla.php">Generar planilla</a></li>
										<li><a href="ListarPlanilla.php">Lista de pagos</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Usuario<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearUsuario.php">Crear usuario</a></li>
										<li><a href="Usuario.php">Lista de usuarios</a></li>	
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<!-- Acá mostramos el nombre del usuario -->
									<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $NombreUsuario; ?></a>
									<!-- <span class="caret"></span> Agrega un indicador de flecha abajo -->
									<ul class="dropdown-menu">
										<li><a href="Seguridad/logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar Sesión</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse --> 
					</div>
				  <!-- /.container-fluid --> 
				</nav>
				<br>
				<br>
				<br>
				<div class="form-group">
					<div class="container">
						<div class="row">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-6 ">
									<h1 class="text-center">Clientes registrados</h1>
									</div>
									<!-- Contenedor del ícono del Usuario -->
									<div class="col-xs-6 Icon">
										<!-- Icono de usuario -->
										<span class="glyphicon glyphicon-pencil"></span>
									</div>
								</div>
								<br>
								<div class="table-responsive">          
									<table class="table table-striped">
										<!-- Título -->
										<thead>
											<!-- Contenido -->
											<tr>
												<th>#</th>
												<th>Nombres</th>
												<th>Apellidos</th>
												<th>Teléfono</th>
												<th>Dirección</th>
												<th>Fecha de Nacimiento</th>
												<th>Nit</th>
											</tr>
										</thead>
										<!-- Cuerpo de la tabla -->
										<tbody>
											<!-- Contenido de la tabla -->
												<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
												<?php
													// Primero hacemos la consulta en la tabla de banco
													include_once "Seguridad/conexion.php";
													// Primero hacemos la consulta en la tabla de Cheque
													$VerClientes= "SELECT * FROM cliente";
													// Hacemos la consulta
													$resultado = $mysqli->query($VerClientes);
														while ($row = mysqli_fetch_array($resultado)){
															?>
															<tr>
															<td><span id="idCliente<?php echo $row['idCliente'];?>"><?php echo $row['idCliente'] ?></span></td>
															<td><span id="NombreCliente<?php echo $row['idCliente'];?>"><?php echo $row['NombreCliente'] ?></span></td>
															<td><span id="ApellidoCliente<?php echo $row['idCliente'];?>"><?php echo $row['ApellidoCliente'] ?></span></td>
															<td><span id="TelefonoCliente<?php echo $row['idCliente'];?>"><?php echo $row['TelefonoCliente'] ?></span></td>
															<td><span id="DireccionCliente<?php echo $row['idCliente'];?>"><?php echo $row['DireccionCliente'] ?></span></td>
															<td><span id="FechaNacCliente<?php echo $row['idCliente'];?>"><?php echo $row['FechaNacCliente'] ?></span></td>
															<td><span id="NitCliente<?php echo $row['idCliente'];?>"><?php echo $row['NitCliente'] ?></span></td>
															<td>
																<!-- Edición -->
																<div>
																	<div class="input-group input-group-lg">
																		<button type="button" class="btn btn-success EditarCliente" value="<?php echo $row['idCliente']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																	</div>
																</div>
															</td>
															<td>
																<!-- Eliminación -->
																<div>
																	<div class="input-group input-group-lg">
																		<button type="button" class="btn btn-danger EliminarCliente" value="<?php echo $row['idCliente']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
																	</div>
																</div>
															</td>
															</tr>
												<?php
														}
												?>
										</tbody>
									</table>
								</div>								
							</div>
						</div>
					</div>
				</div>
				
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEliminarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Eliminar cliente</h1></center>
								</div>
								<form method="post" action="Cliente.php" id="myForm">
								<div class="modal-body">
									<p class="lead">¿Está seguro que desea eliminar el siguiente cliente?</p>
									<div class="form-group input-group">
										<input type="text" name="idClienteAEliminar" style="width:350px; visibility:hidden;" class="form-control" id="idClienteAEliminar">
										<br>
										<label id="NombreCliente"></label>
								</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="EliminarUsuario" class="btn btn-danger" value="Eliminar">
									<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				
				<?php
				// Código que recibe la información de eliminar cliente
					if (isset($_POST['EliminarUsuario'])) {
						// Guardamos el id en una variable
						$idClienteEliminar = $_POST['idClienteAEliminar'];
						// Preparamos la consulta
						$query = "DELETE FROM cliente WHERE idCliente=".$idClienteEliminar.";";
						// Ejecutamos la consulta
						if(!$resultado = $mysqli->query($query)){
    					echo "Error: La ejecución de la consulta falló debido a: \n";
    					echo "Query: " . $query . "\n";
    					echo "Errno: " . $mysqli->errno . "\n";
    					echo "Error: " . $mysqli->error . "\n";
    					exit;
						}
						else{
    						?>
    						<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-warning">Cliente eliminado</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Cliente.php\">"; 
    					}
					}
				// Termina código para eliminar cliente
					// Código para editar un cliente
					if (isset($_POST['EditarCliente'])) {
						// Guardamos La información proveniente del formulario
						$idClienteEditar = $_POST['idClienteEditar'];
						$NombreClienteEditar = $_POST['NombreClienteEditar'];
						$ApellidoClienteEditar = $_POST['ApellidoClienteEditar'];
						$TelefonoClienteEditar = $_POST['TelefonoClienteEditar'];
						$DireccionClienteEditar = $_POST['DireccionClienteEditar'];
						$FechaNacClienteEditar = $_POST['FechaNacClienteEditar'];
						$NitClienteEditar = $_POST['NitClienteEditar'];
												
				// Preparamos las consultas
						$ConsultaEditarCliente = "UPDATE cliente
								  SET NombreCliente = '" .$NombreClienteEditar."',
									  ApellidoCliente = '" .$ApellidoClienteEditar."',
									  TelefonoCliente = '".$TelefonoClienteEditar."',
									  DireccionCliente = '".$DireccionClienteEditar."',
									  FechaNacCliente = '" .$FechaNacClienteEditar."',
									  NitCliente = '".$NitClienteEditar."'									  
									WHERE idCliente=".$idClienteEditar.";";
									
							// Ejecutamos la consulta para la tabla de persona
						if(!$resultado = $mysqli->query($ConsultaEditarCliente)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $ConsultaEditarCliente . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Cliente.php\">"; 
							?>
								<div class="form-group">
									<form name="Alerta">
										<div class="container">
											<div class="row text-center">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-10 col-xs-offset-1">
															<div class="alert alert-success">Cliente actualizado</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
    						<?php
    					}
					}
					
					// Termina código para editar un Cliente
				?>						
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEditarCliente" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar cliente</h4></center>
								</div>
								<form method="post" action="Cliente.php" id="myForm">
									<div class="modal-body">
									<div class="container-fluid">
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">ID</span>
												<input type="text" style="width:350px;" class="form-control" name="idClienteEditar" id="idClienteEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombres del Cliente</span>
												<input type="text" style="width:350px;" class="form-control" name="NombreClienteEditar" id="NombreClienteEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Apellidos del Cliente</span>
												<input type="text" style="width:350px;" class="form-control" name="ApellidoClienteEditar" id="ApellidoClienteEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Telefono del Cliente</span>
												<input type="tel" style="width:350px;" class="form-control" name="TelefonoClienteEditar" id="TelefonoClienteEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Direccion del Cliente</span>
												<input type="text" style="width:350px;" class="form-control" name="DireccionClienteEditar" id="DireccionClienteEditar">
											</div>		
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Fecha Nacimiento del Cliente</span>
												<input type="date" style="width:350px;" class="form-control" name="FechaNacClienteEditar" id="FechaNacClienteEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nit del Cliente</span>
												<input type="text" style="width:350px;" class="form-control" name="NitClienteEditar" id="NitClienteEditar">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<input type="submit" name="EditarCliente" class="btn btn-warning" value="Editar">
									</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
				<!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
				<script src="js/custom.js"></script>
				<!-- Pie de página, se utilizará el mismo para todos. -->
				<footer>
					<hr>
					<div class="row">
						<div class="text-center col-md-6 col-md-offset-3">
							<h4>PES</h4>
							<p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="http://www.umg.edu.gt/" >www.umg.edu.gt</a></p>
						</div>
					</div>
					<hr>
				</footer> 
			</body>
	<?php
		// De lo contrario lo redirigimos al inicio de sesión
			} 
			else{
				echo "usuario no valido";
				header("location:principal.php");
			}
		?>
</html>
