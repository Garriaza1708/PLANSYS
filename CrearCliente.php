<!--
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
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Incluimos el archivo para la conexión
		include_once "Seguridad/conexion.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1 ){
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
										<li><a href="#">Crear cliente</a></li>
										<li><a href="Cliente.php">Lista de clientes</a></li>
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
				<div class="form-group">
					<form name="CrearEmpleado" action="CrearCliente.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 col-xs-offset-3">
										<h2 class="text-center">Creación de cliente</h2>
										<br>
										</div>
									</div>
								<div class="row">
									<!-- Nombre del Cliente -->
									<div class="col-xs-5 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
											<input type="text" class="form-control" name="NombreCliente" placeholder="Nombres del Cliente" id="NombreCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								
								<!-- Apellidos del Cliente -->
									<div class="col-xs-5 col-xs-offset+1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
											<input type="text" class="form-control" name="ApellidoCliente" placeholder="Apellidos del Cliente" id="ApellidoCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
									</div>
									<br>
									<div class="row">									
									<!-- Numero de Telefono -->
									<div class="col-xs-5 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
											<input type="tel" class="form-control" name="TelefonoCliente" placeholder="Numero de Telefono" id="TelefonoCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
									<!-- Direccion -->
									<div class="col-xs-5 col-xs-offset+1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
											<input type="text" class="form-control" name="DireccionCliente" placeholder="Dirección" id="DireccionCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								</br>
								<div class="row">
									<!-- Fecha de Nacimiento -->
									<div class="row">									
									<div class="col-xs-4 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
											<input type="date" class="form-control" name="FechaNacCliente" placeholder="Fecha de Nacimiento" id="FechaNacCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
									<div class="col-xs-4 col-xs-offset+2">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
											<input type="text" class="form-control" name="NitCliente" placeholder="Nit" id="NitCliente" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								</div>
								</br>
									<!-- Registrar -->
								<div class="row">
									<div class="col-xs-11 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<div clss="btn-group">
												<button type="submit" class="btn btn-primary" id="Crearcliente" name="enviar">Registrar</button>
												<button type="button" class="btn btn-danger">Cancelar</button>
											</div>
										</div>
									</div>
								</div>
								<br>
								</div>
							</div>
						</form>
				</div>
				<?php
				// Registramos un cheque
				if (isset($_POST['enviar'])) {
					// Obtenemos los valores de todos los campos y los almacenamos en variables
					$NombreCliente=$_POST['NombreCliente'];
					$ApellidoCliente=$_POST['ApellidoCliente'];
					$TelefonoCliente=$_POST['TelefonoCliente'];
					$DireccionCliente=$_POST['DireccionCliente'];
					$FechaNacCliente=$_POST['FechaNacCliente'];
					$NitCliente=$_POST['NitCliente'];
										
					// Creamos la consulta para la inserción de los datos
						$query = "INSERT INTO Cliente(NombreCliente, ApellidoCliente, TelefonoCliente, DireccionCliente, FechaNacCliente, NitCliente) 
												 Values('".$NombreCliente."', '".$ApellidoCliente."', '".$TelefonoCliente."', '".$DireccionCliente."', '".$FechaNacCliente."', '".$NitCliente."');";
							
						if(!$resultado = $mysqli->query($query)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $query . "\n";
							echo "Error: " . $mysqli->errno . "\n";
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
														<div class="alert alert-success">Cliente registrado</div>
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