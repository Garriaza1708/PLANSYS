<!--
	Módulo Principal
	
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
<style>
body {
        background-image: url("imagenes/pes.png");
		no-repeat left center;
		background-size: cover;
} 
 
</style>
<body style="background-color:RGB(128, 128, 0);">
</body>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
</head>
	<?php
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1 || $_SESSION["PrivilegioUsuario"] == 2 || $_SESSION["PrivilegioUsuario"] == 3 || $_SESSION["PrivilegioUsuario"] == 4){
			// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
		?>
			<body background="imagenes/pes.png" >
				<nav class="navbar navbar-default">
					<div class="container-fluid"> 
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
						  <a class="navbar-brand" href="#"><img src="imagenes/pes.png" class="img-circle" width="25" height="25"></a></div>
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
				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-6 col-md-offset-3">
					</div>
				  </div>
				</div>
					<!-- Pie de página, se utilizará el mismo para todos. -->
					<footer>
						<hr>
						<div class="row">
							<div class="text-center col-md-6 col-md-offset-3">

							</div>
						</div>
						<hr>
					</footer>
				</div>
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
			</body>
	<?php
		// De lo contrario lo redirigimos al inicio de sesión
			} 
			else{
				header("location:index.php");
			}
		?>
</html>
