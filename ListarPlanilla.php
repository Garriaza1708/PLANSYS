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
			<body">
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
										<li><a href="#">Lista de Planillas</a></li>
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
									<h1 class="text-center">Planillas registradas</h1>
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
												<th>Nombre del Empleado</th>
												<th>Sueldo Base</th>
												<th>Bonificacion Incentivo</th>
												<th>Horas Extras</th>
												<th>Total Devengado</th>
												<th>Descuento IGSS</th>
												<th>Descuento ISR</th>
												<th>Total Descuento</th>
												<th>Total Liquido</th>
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
													$VerPlanillas= "SELECT * FROM Planilla";
													// Hacemos la consulta
													$resultado = $mysqli->query($VerPlanillas);
														while ($row = mysqli_fetch_array($resultado)){
															?>
															<tr>
															<td><span id="idPlanilla<?php echo $row['idPlanilla'];?>"><?php echo $row['idPlanilla'] ?></span></td>
															<td><span id="Empleado<?php echo $row['idPlanilla'];?>">
																													<?php 
																														$VerNombreEmpleado = "SELECT NombreEmpleado, ApellidoEmpleado FROM empleado WHERE idEmpleado=".$row['idEmpleado'].";";
																														// Hacemos la consulta
																														$ResultadoVerEmpleado = $mysqli->query($VerNombreEmpleado);
																														$FilaResultado = $ResultadoVerEmpleado->fetch_assoc();
																														$NombreEmpleado = $FilaResultado['NombreEmpleado'] . " " . $FilaResultado['ApellidoEmpleado'];
																														echo $NombreEmpleado;
																													?>
																													</span></td>
															<td><span id="SueldoBase<?php echo $row['idPlanilla'];?>"><?php echo "Q. " .  $row['SueldoBase'] ?></span></td>
															<td><span id="BonificacionIncentivo<?php echo $row['idPlanilla'];?>"><?php echo "Q. " .  $row['BonificacionIncentivo'] ?></span></td>
															<td><span id="HorasExtras<?php echo $row['idPlanilla'];?>">
																														<?php 
																															$PrecioHoraExtra = (($row['SueldoBase'] / 30) / 8) * 1.5;
																															$TotalHoraExtra = $PrecioHoraExtra *  $row['HorasExtras'];
																															echo $TotalHoraExtra; ?></span></td>
															<td><span id="TotalDevengado<?php echo $row['idPlanilla'];?>">
																														<?php
																															//$PrecioHoraExtra = (($row['SueldoBase'] / 30) / 8) * 1.5;
																															//$TotalHoraExtra = $PrecioHoraExtra *  $row['HorasExtras'];
																															//echo $PrecioHoraExtra;
																															//echo $TotalHoraExtra;
																															echo "Q. " . (($row['SueldoBase'] + $row['BonificacionIncentivo']) + $TotalHoraExtra);
																														?>
																														</span></td>
															<td><span id="DescuentoIgss<?php echo $row['idPlanilla'];?>">
																														<?php 
																														$DescuentoIgss = ($row['SueldoBase'] / 4.83);
																														setlocale(LC_MONETARY,"es_GT");
																														echo number_format($DescuentoIgss,2);
																														//echo "Q. " . $DescuentoIgss;
																														?></span></td>
															<td><span id="DescuentoISR<?php echo $row['idPlanilla'];?>">
																														<?php 
																														$DescuentoISR = (($row['SueldoBase'] *5)/100);	
																															echo "Q. " . $DescuentoISR; ?></span></td>
															<td><span id="TotalDescuento<?php echo $row['idPlanilla'];?>">
																														<?php 
																														$TotalDescuento = $DescuentoIgss + $DescuentoISR;
																														echo "Q. " . number_format($TotalDescuento,2);
																														//echo "Q. " . $TotalDescuento; 
																														?></span></td>
															<td><span id="Totaltotal<?php echo $row['idPlanilla'];?>">
																														<?php 
																														$TotalTotal = ($row['SueldoBase'] + $row['BonificacionIncentivo'] + $TotalHoraExtra) - $TotalDescuento;
																														echo "Q. " . number_format($TotalTotal,2);
																														//echo "Q. " . $TotalTotal; 
																														?></span></td>
															<td>
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
