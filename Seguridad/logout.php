<!--
	Con este archivo destruiremos la sesión
-->
<!DOCTYPE html>
<html>
    <head>
		<title>PES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cerrar sesión</title>
    </head>
    <body>
        <?php
			// Iniciamos y Destruimos la sesión
			session_start(); 
			session_destroy(); 
			// Redirigimos el usuario al indexsv
			header('location:../index.php'); 
		?>
    </body>
</html>