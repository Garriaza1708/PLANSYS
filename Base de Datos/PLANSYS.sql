DROP DATABASE PLANSYS;

CREATE OR REPLACE DATABASE PLANSYS;

USE PLANSYS;

CREATE OR REPLACE TABLE Puesto(
	idPuesto			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	CodigoPuesto		VARCHAR(10)		NOT NULL,
	NombrePuesto		VARCHAR(50)		NOT NULL
);

CREATE OR REPLACE TABLE Permiso(
	idPermiso			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	TipoPermiso			VARCHAR(15)		NOT NULL
);

CREATE OR REPLACE TABLE Rol(
	idRol				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreRol			VARCHAR(15)		NOT NULL,
	idPermiso			TINYINT			NOT NULL,
	INDEX (idPermiso),
	FOREIGN	KEY	(idPermiso)
        REFERENCES Permiso(idPermiso)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE OR REPLACE TABLE Usuario(
	idUsuario			TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreUsuario		VARCHAR(50)		NOT NULL,
	ApellidoUsuario		VARCHAR(50)		NOT NULL,
	TelefonoUsuario		VARCHAR(20)		NOT NULL,
	DireccionUsuario	VARCHAR(50) 	NOT NULL,
	CorreoUsuario		VARCHAR(40)		NOT NULL,
	NombreInicioSesionUsuario		VARCHAR(15)			NOT NULL,
	ContraseniaUsuario	TEXT			NOT NULL,
	idPuesto			TINYINT			NOT NULL,
	idRol				TINYINT			NOT NULL,
	idRango				TINYINT			NOT NULL,
	INDEX (idPuesto),
	FOREIGN	KEY	(idPuesto)
        REFERENCES Puesto(idPuesto)
        ON DELETE CASCADE
        ON UPDATE NO ACTION,
	INDEX (idRol),
	FOREIGN	KEY	(idRol)
        REFERENCES Rol(idRol)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE OR REPLACE TABLE Empleado(
	idEmpleado				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	CodigoEmpleado			VARCHAR(15)		NOT NULL,
	NombreEmpleado			VARCHAR(25)		NOT NULL,
	ApellidoEmpleado		VARCHAR(25)		NOT NULL,
    FechaNacEmpleado		DATE			NOT NULL,
    TelefonoEmpleado		VARCHAR(30)		NOT NULL,
    DireccionEmpleado		VARCHAR(50)		NOT NULL,
    CorreoEmpleado			VARCHAR(50)		NOT NULL
);

CREATE OR REPLACE TABLE Planilla(
	idPlanilla				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	idEmpleado				TINYINT			NOT NULL,
	SueldoBase				DECIMAL(10,2)	NOT NULL,
	HorasExtras				INTEGER(10)		NOT NULL,
	BonificacionIncentivo	DECIMAL(10,2)	NOT NULL,
	TotalDevengado			DECIMAL(10,2)	NOT NULL,
	DescuentoIgss			DECIMAL(10,2)	NOT NULL,
	DescuentoISR			DECIMAL(10,2)	NOT NULL,
	TotalDescuento			DECIMAL(10,2)	NOT NULL,
	INDEX (idEmpleado),
	FOREIGN	KEY	(idEmpleado)
        REFERENCES Empleado(idEmpleado)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
		);
	