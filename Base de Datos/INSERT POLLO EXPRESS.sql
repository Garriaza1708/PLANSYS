use BDPolloExp;

INSERT INTO Puesto (CodigoPuesto, NombrePuesto)
			Values('0001','Administrador');

INSERT INTO Permiso (TipoPermiso)
			Values('Administrador');

INSERT INTO Permiso (TipoPermiso)
			Values('Vendedor');
			
INSERT INTO Rol(NombreRol, idPermiso)
			VALUES('Administrador', 1);

INSERT INTO Rol(NombreRol, idPermiso)
			VALUES('Vendedor', 2);

INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Mario Hernandez', 'Hernandez Gonzalez', '1234-5678', 'Ciudad',
                     'mhernandez@site.com', 'mhernandez', '9acd33e5f3c729eeea08bbee68b62605', 1, 1, 1);

INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Gustavo Rodolfo', 'Arriaza', '1234-5678', 'Ciudad',
                     'admin@site.com', 'garriaza', '0b97363041ab9c0a7e8a8e9a6e1394ac', 1, 1, 1);
					
INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Oscar Danilo', 'Pérez Juárez', '1234-5678', 'Ciudad',
                     'admin@site.com', 'operez', 'ddf300630c30a126a7ac2c759342dd1a', 1, 2, 1);
			