INSERT INTO Puesto (CodigoPuesto, NombrePuesto)
			Values('0001','Administrador');

INSERT INTO Permiso (TipoPermiso)
			Values('Administrador');
			
INSERT INTO Rol(NombreRol, idPermiso)
			VALUES('Administrador', 1);
			
INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Gemis Daniel', 'Guevara Villeda', '1234-5678', 'Ciudad',
                     'admin@site.com', 'gguevara', 'e60c177bc95bb0d56e2f95ac372bde51', 1, 1, 1);

INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Gustavo Rodolfo', 'Arriaza', '1234-5678', 'Ciudad',
                     'admin@site.com', 'garriaza', '0b97363041ab9c0a7e8a8e9a6e1394ac', 1, 1, 1);
					
INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Oscar Danilo', 'Pérez Juárez', '1234-5678', 'Ciudad',
                     'admin@site.com', 'operez', 'ddf300630c30a126a7ac2c759342dd1a', 1, 1, 1);
					 
INSERT INTO Usuario (NombreUsuario, ApellidoUsuario, TelefonoUsuario,
                     DireccionUsuario, CorreoUsuario, NombreInicioSesionUsuario,
					 ContraseniaUsuario, idPuesto, idRol, idRango)
              VALUES('Oseas Eli', 'Lima Juárez', '1234-5678', 'Ciudad',
                     'admin@site.com', 'olima', 'befefca1f3e124665f72f6ec168acfff', 1, 1, 1);