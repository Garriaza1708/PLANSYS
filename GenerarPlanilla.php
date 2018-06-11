<!--
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
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Primero hacemos la consulta en la tabla de persona
		include_once "Seguridad/conexion.php";	
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1){
			// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
		?>
			<body>
				<nav class="navbar navbar-default">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					   <a class="navbar-brand" href="Principal.php"><img src="imagenes/plansys.png" class="img-circle" width="25" height="25"></a></div>
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
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Usuarios<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearUsuario.php">Crear usuario</a></li>
										<li><a href="Usuario.php">Lista de Usuarios</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cerrar Sesión<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="Seguridad/logout.php">Cerrar Sesión</a></li>
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
					<form name="CrearUsuario" action="CrearUsuario.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 col-xs-offset-3">
										<h1 class="text-center">Creación de Planilla</h1>
										</div>
									</div>
									<!-- Contenedor del ícono del Usuario -->
									
										<div class="Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-user"></span>
										</div>
										<br>
									<!-- Nombre del empleado -->
									<div class="row">
									<div class="col-xs-6 col-xs-offset+1">
									<div class="input-group input-group-lg">
									<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
									<select class="form-control" name="Empleado" id="Empkeado" onchange="AnEventHasOccurred()">
													<option value="" disabled selected>Seleccione Empleado</option>
													<!-- Contenido de la tabla -->
														<!-- Acá mostraremos los bancos y seleccionaremos el que deseamos eliminar -->
														<?php							
															$VerEmpleado = "SELECT * FROM Empleado";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerEmpleado);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idEmpleado'];?>"><?php echo $row['NombreEmpleado']." ". $row['ApellidoEmpleado'] ?></option>
														<?php
																}
														?>
												</select>	
											</div>
										</div>
									<!-- Ingrese Sueldo Base -->
									<div class="col-xs-6 col-xs-offset+1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
												<input type="text" class="form-control" name="SueldoBase" placeholder="Sueldo Base" id="SueldoBase" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Ingrese Horas Extras -->
									<div class="row">
									<div class="col-xs-6 col-xs-offset+1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-time"></i></span>
												<input type="text" class="form-control" name="HorasExtras" placeholder="Horas Extras" id="HorasExtras" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									
									<!-- Ingrese Bonificacion Incentivo -->
									<div class="col-xs-6 col-xs-offset+1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
												<input type="text" class="form-control" name="BonificacionIncentivo" placeholder="Bonificacion Incentivo" id="BonificacionIncentivo" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>								
									<!-- Registrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset+1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<input type="submit" name="AgregarUsuario" class="btn btn-success" value="Generar Datos">
													<button type="button" class="btn btn-danger">Cancelar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
							
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
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
				header("location:index.php");
			}
		?>
</html>
