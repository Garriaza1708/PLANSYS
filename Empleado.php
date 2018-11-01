<!--
	Módulo de creación de Usuarios
	Miércoles, 16 de mayo del 2018
	11:20 PM
	Gemis Daniel Guevara Villeda
	UMG - Morales Izabal
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="imagenes/plansys.ico">
<title>PLANSYS</title>

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
					  <a class="navbar-brand" href="principal.php"><img src="imagenes/plansys.png" class="img-circle" width="25" height="25"></a></div>
					  <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="defaultNavbar1">
							<ul class="nav navbar-nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Empleados<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearEmpleado.php">Crear Empleado</a></li>
										<li><a href="#">Lista de Empleados</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Pagos<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="GenerarPlanilla.php">Generar Planilla</a></li>
										<li><a href="ListarPlanilla.php">Lista de Planillas</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Usuarios<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearUsuario.php">Crear usuario</a></li>
										<li><a href="Usuario.php">Lista de Usuarios</a></li>
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
									<h1 class="text-center">Empleados registrados</h1>
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
												<th>Código</th>
												<th>Nombre</th>
												<th>Apellidos</th>
												<th>Fecha de Nacimiento</th>
												<th>Telefono</th>
												<th>Dirección</th>
												<th>Correo</th>
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
													$VerEmpleados= "SELECT * FROM empleado";
													// Hacemos la consulta
													$resultado = $mysqli->query($VerEmpleados);
														while ($row = mysqli_fetch_array($resultado)){
															?>
															<tr>
															<td><span id="idEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['idEmpleado'] ?></span></td>
															<td><span id="CodigoEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['CodigoEmpleado'] ?></span></td>
															<td><span id="NombreEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['NombreEmpleado'] ?></span></td>
															<td><span id="ApellidoEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['ApellidoEmpleado'] ?></span></td>
															<td><span id="FechaNacEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['FechaNacEmpleado'] ?></span></td>
															<td><span id="TelefonoEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['TelefonoEmpleado'] ?></span></td>
															<td><span id="DireccionEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['DireccionEmpleado'] ?></span></td>
															<td><span id="CorreoEmpleado<?php echo $row['idEmpleado'];?>"><?php echo $row['CorreoEmpleado'] ?></span></td>
															<td>
																<!-- Edición -->
																<div>
																	<div class="input-group input-group-lg">
																		<button type="button" class="btn btn-success EditarEmpleado" value="<?php echo $row['idEmpleado']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																	</div>
																</div>
															</td>
															<td>
																<!-- Eliminación -->
																<div>
																	<div class="input-group input-group-lg">
																		<button type="button" class="btn btn-danger EliminarEmpleado" value="<?php echo $row['idEmpleado']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
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
					<div class="modal fade" id="frmEliminarEmpleado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Eliminar empleado</h1></center>
								</div>
								<form method="post" action="Empleado.php" id="myForm">
								<div class="modal-body">
									<p class="lead">¿Está seguro que desea eliminar el siguiente empleado?</p>
									<div class="form-group input-group">
										<input type="text" name="idEmpleadoAEliminar" style="width:350px; visibility:hidden;" class="form-control" id="idEmpleadoAEliminar">
										<br>
										<label id="NombreEmpleado"></label>
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
				// Código que recibe la información de eliminar empleado
					if (isset($_POST['EliminarUsuario'])) {
						// Guardamos el id en una variable
						$idEmpleadoEliminar = $_POST['idEmpleadoAEliminar'];
						// Preparamos la consulta
						$query = "DELETE FROM empleado WHERE idEmpleado=".$idEmpleadoEliminar.";";
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
														<div class="alert alert-warning">Empleado eliminado</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Empleado.php\">"; 
    					}
					}
				// Termina código para eliminar empleado
					// Código para editar un empleado
					if (isset($_POST['EditarEmpleado'])) {
						// Guardamos La información proveniente del formulario
						$idEmpleadoEditar = $_POST['idEmpleadoEditar'];
						$CodigoEmpleadoEditar = $_POST['CodigoEmpleadoEditar'];
						$NombreEmpleadoEditar = $_POST['NombreEmpleadoEditar'];
						$ApellidoEmpleadoEditar = $_POST['ApellidoEmpleadoEditar'];
						$FechaNacEmpleadoEditar = $_POST['FechaNacEmpleadoEditar'];
						$TelefonoEmpleadoEditar = $_POST['TelefonoEmpleadoEditar'];
						$DireccionEmpleadoEditar = $_POST['DireccionEmpleadoEditar'];
						$CorreoEmpleadoEditar = $_POST['CorreoEmpleadoEditar'];
												
				// Preparamos las consultas
						$ConsultaEditarEmpleado = "UPDATE empleado
								  SET CodigoEmpleado = '" .$CodigoEmpleadoEditar."',
									  NombreEmpleado = '" .$NombreEmpleadoEditar."',
									  ApellidoEmpleado = '" .$ApellidoEmpleadoEditar."',
									  FechaNacEmpleado = '" .$FechaNacEmpleadoEditar."',
									  TelefonoEmpleado = '".$TelefonoEmpleadoEditar."',
									  DireccionEmpleado = '".$DireccionEmpleadoEditar."',
									  CorreoEmpleado = '".$CorreoEmpleadoEditar."'									  
									WHERE idEmpleado=".$idEmpleadoEditar.";";
									
							// Ejecutamos la consulta para la tabla de persona
						if(!$resultado = $mysqli->query($ConsultaEditarEmpleado)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $ConsultaEditarEmpleado . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Empleado.php\">"; 
							?>
								<div class="form-group">
									<form name="Alerta">
										<div class="container">
											<div class="row text-center">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-10 col-xs-offset-1">
															<div class="alert alert-success">Empleado actualizado</div>
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
					
					// Termina código para editar un Empleado
				?>						
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEditarEmpleado" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar empleado</h4></center>
								</div>
								<form method="post" action="Empleado.php" id="myForm">
									<div class="modal-body">
									<div class="container-fluid">
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">ID</span>
												<input type="text" style="width:350px;" class="form-control" name="idEmpleadoEditar" id="idEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Código de Empleado</span>
												<input type="text" style="width:350px;" class="form-control" name="CodigoEmpleadoEditar" id="CodigoEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombres del Empleado</span>
												<input type="text" style="width:350px;" class="form-control" name="NombreEmpleadoEditar" id="NombreEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Apellidos del Empleado</span>
												<input type="text" style="width:350px;" class="form-control" name="ApellidoEmpleadoEditar" id="ApellidoEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Fecha Nacimiento del Empleado</span>
												<input type="date" style="width:350px;" class="form-control" name="FechaNacEmpleadoEditar" id="FechaNacEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Telefono del Empleado</span>
												<input type="tel" style="width:350px;" class="form-control" name="TelefonoEmpleadoEditar" id="TelefonoEmpleadoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Direccion del Empleado</span>
												<input type="text" style="width:350px;" class="form-control" name="DireccionEmpleadoEditar" id="DireccionEmpleadoEditar">
											</div>			
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Correo del Empleado</span>
												<input type="email" style="width:350px;" class="form-control" name="CorreoEmpleadoEditar" id="CorreoEmpleadoEditar">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<input type="submit" name="EditarEmpleado" class="btn btn-warning" value="Editar">
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
							<h4>PLANSYS</h4>
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
