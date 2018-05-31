<!--
	Módulo Principal
	
	Gemis Daniel Guevara Villeda
	Gustavo Rodolfo Arriaza
	Oseas Eli Lima Juarez
	Oscar Danilo Perez Juarez
	
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PLANSYS</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
</head>
	<?php
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 1){
		?>
			<body>
				<nav class="navbar navbar-default">
					<div class="container-fluid"> 
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
						  <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="defaultNavbar1">
							<ul class="nav navbar-nav">
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestion de Usuario<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearUsuario.php">Crear Usuario</a></li>
										<li><a href="Usuario">Lista de Usuarios</a></li>	
									</ul>
								</li>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cerrar Sesión<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="Seguridad/logout.php">Cerrar Sesión</a></li>
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
					  <h1 class="text-center">PLANSYS</h1>
					</div>
				  </div>
				</div>
				<div class="container">
					<div class="row text-center">
						<div class="col-md-10 col-md-offset-1">Página principal de administración del sistema de planillas.</div>
					</div>
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
