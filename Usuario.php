,,,,,,<!--
	Módulo de creación de Usuarios
	Gemis Daniel Guevara Villeda
	Gustavo Rodolfo Arriaza
	Oseas Eli Lima Juarez
	Oscar Danilo Perez Juarez
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
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Incluimos el archivo de conexión a la base de datos
		include_once "Seguridad/conexion.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1){
			// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
		?>
			<body">
				<nav class="navbar navbar-default navbar-fixed-top">
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
										<li><a href="Empleado.php">Lista de Empleados</a></li>	
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
										<li><a href="#">Lista de Usuarios</a></li>
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
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 ">
										<h1 class="text-center">Usuarios registrados</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-user"></span>
										</div>
									</div>
									<br>
									<div class="table-responsive">          
										<table class="table">
											<!-- Título -->
											<thead>
												<!-- Contenido -->
												<tr>
													<th>#</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Teléfono</th>
													<th>Dirección</th>
													<th>Correo</th>
													<th>Nombre de Inicio de Sesión</th>
													<th>Puesto</th>
													<th>Rol</th>
													</tr>
											</thead>
											<!-- Cuerpo de la tabla -->
											<tbody>
												<!-- Contenido de la tabla -->
													<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
													<?php
														// Primero hacemos la consulta en la tabla de usuario
														$VerUsuarios = "SELECT * FROM usuario";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerUsuarios);
															while ($row = mysqli_fetch_array($resultado)){
																// Obtendremos el puesto, rol y rango a partir de una consulta desde el id que se encuentra en cada campo
																// Primero haremos la consulta -------------------------------------------------------------------------
																$VerPuesto = "SELECT NombrePuesto FROM puesto WHERE idPuesto='".$row['idPuesto']."'";
																// Ejecutamos la consulta
																$ResultadoPuesto = $mysqli->query($VerPuesto);
																// Guardamos la consulta en un array
																$ResultadoConsultaPuesto = $ResultadoPuesto->fetch_assoc();
																// Nombre de usuario
																$Puesto = $ResultadoConsultaPuesto['NombrePuesto'];
																// Par el rol ------------------------------------------------------------------------------------------
																$VerRol = "SELECT NombreRol FROM Rol WHERE idRol='".$row['idRol']."'";
																// Ejecutamos la consulta
																$ResultadoRol = $mysqli->query($VerRol);
																// Guardamos la consulta en un array
																$ResultadoConsultaRol = $ResultadoRol->fetch_assoc();
																// Nombre de usuario
																$Rol = $ResultadoConsultaRol['NombreRol'];
																?>
																<tr>
																<td><span id="idUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['idUsuario'] ?></span></td>
																<td><span id="NombreUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['NombreUsuario'] ?></span></td>
																<td><span id="ApellidoUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['ApellidoUsuario'] ?></span></td>
																<td><span id="TelefonoUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['TelefonoUsuario'] ?></span></td>
																<td><span id="DireccionUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['DireccionUsuario'] ?></span></td>
																<td><span id="CorreoUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['CorreoUsuario'] ?></span></td>
																<td><span id="NombreInicioSesionUsuario<?php echo $row['idUsuario'];?>"><?php echo $row['NombreInicioSesionUsuario'] ?></span></td>
																<td><span id="Puesto<?php echo $row['idUsuario'];?>"><?php echo $Puesto ?></span></td>
																<td><span id="Rol<?php echo $row['idUsuario'];?>"><?php echo $Rol ?></span></td>
																<td>
																	<!-- Edición -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-success EditarUsuario" value="<?php echo $row['idUsuario']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																		</div>
																	</div>
																</td>
																<td>
																	<!-- Eliminación -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-danger EliminarUsuario" value="<?php echo $row['idUsuario']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
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
				</div>
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Eliminar usuario</h1></center>
								</div>
								<form method="post" action="Usuario.php" id="myForm">
								<div class="modal-body">
									<p class="lead">¿Está seguro que desea eliminar al siguiente usuario?</p>
									<div class="form-group input-group">
										<input type="text" name="idUsuarioEliminacion" style="width:350px; visibility:hidden;" class="form-control" id="idUsuarioEliminacion">
										<br>
										<label id="NombresApellidos"></label>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="EliminarUsuario" class="btn btn-danger" value="Eliminar Usuario">
									<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEditar" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar usuario</h4></center>
								</div>
								<form method="post" action="Usuario.php" id="frmEdit">
									<div class="modal-body">
									<div class="container-fluid">
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">ID</span>
												<input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombre</span>
												<input type="text" style="width:350px;" class="form-control" name="NombreEditar" id="NombreEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Apellido</span>
												<input type="text" style="width:350px;" class="form-control" name="ApellidoEditar" id="ApellidoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Teléfono</span>
												<input type="tel" style="width:350px;" class="form-control" name="TelefonoEditar" id="TelefonoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Dirección</span>
												<input type="text" style="width:350px;" class="form-control" name="DireccionEditar" id="DireccionEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Correo</span>
												<input type="email" style="width:350px;" class="form-control" name="CorreoEditar" id="CorreoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombre de inicio de Sesión</span>
												<input type="text" style="width:300px;" class="form-control" name="NombreInicioEditar" id="NombreInicioEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Puesto</span>
												<select class="form-control" style="width:350px;" name="PuestoEditar" id="PuestoEditar">
													<option value="" disabled selected>Puesto</option>
														<!-- Contenido de la tabla -->
														<!-- Acá mostraremos los puestos que existen en la base de datos -->
														<?php							
															$VerPuestos = "SELECT * FROM puesto";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerPuestos);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idPuesto'];?>"><?php echo $row['NombrePuesto'] ?></option>
														<?php
																}
														?>
												</select>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Rol</span>
												<select class="form-control" style="width:350px;" name="RolEditar" id="RolEditar">
													<option value="" disabled selected>Selecciona el rol del usuario</option>
															<!-- Contenido de la tabla -->
															<!-- Acá mostraremos los roles que están en la base de datos -->
															<?php							
																$VerRoles = "SELECT * FROM rol";
																// Hacemos la consulta
																$resultado = $mysqli->query($VerRoles);			
																	while ($row = mysqli_fetch_array($resultado)){
																		?>
																		<option value="<?php echo $row['idRol'];?>"><?php echo $row['NombreRol'] ?></option>
															<?php
																	}
															?>
												</select>
											</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<input type="submit" name="EditarUsuario" class="btn btn-warning" value="Editar Usuario">
									</div>
								</form>
							</div>
						</div>
					</div>
					</div>
				<!-- /.modal -->
				
				<?php
					if (isset($_POST['EliminarUsuario'])) {
						// Guardamos el id en una variable
						$idUsuarioaEliminar = $_POST['idUsuarioEliminacion'];
						// Preparamos la consulta
						$query = "DELETE FROM usuario WHERE idUsuario=".$idUsuarioaEliminar.";";
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
														<div class="alert alert-warning">Usuario eliminado</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
    					}
					}
					// Termina código para eliminar usuario
					// Código para editar un usuario
					if (isset($_POST['EditarUsuario'])) {
						// Guardamos La información proveniente del formulario
						$idEditar = $_POST['idEditar'];
						$NombreEditar = $_POST['NombreEditar'];
						$ApellidoEditar = $_POST['ApellidoEditar'];
						$TelefonoEditar = $_POST['TelefonoEditar'];
						$DireccionEditar = $_POST['DireccionEditar'];
						$CorreoEditar = $_POST['CorreoEditar'];
						$NombreInicioEditar = $_POST['NombreInicioEditar'];
						$PuestoEditar = $_POST['PuestoEditar'];
						$RolEditar = $_POST['RolEditar'];
												
						// Preparamos las consultas
						$EditarUsuario = "UPDATE usuario
								  SET NombreUsuario = '" .$NombreEditar."',
									  ApellidoUsuario = '" .$ApellidoEditar."',
									  TelefonoUsuario = '".$TelefonoEditar."',
									  DireccionUsuario = '".$DireccionEditar."',
									  CorreoUsuario = '".$CorreoEditar."',
									  idPuesto = ".$PuestoEditar.",
									  idRol = ".$RolEditar."
									WHERE idUsuario=".$idEditar.";";
						
						// Ejecutamos la consulta para la tabla de persona
						if(!$resultado = $mysqli->query($EditarUsuario)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $EditarUsuario . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">Usuario actualizado</div>
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
				?>
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
