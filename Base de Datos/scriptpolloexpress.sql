CREATE DATABASE BDPolloExp;

USE BDPolloExp;

CREATE OR REPLACE TABLE Puesto(
	idPuesto				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	CodigoPuesto			VARCHAR(10)		NOT NULL,
	NombrePuesto			VARCHAR(50)		NOT NULL
);

CREATE OR REPLACE TABLE Permiso(
	idPermiso				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	TipoPermiso				VARCHAR(15)		NOT NULL
);

CREATE OR REPLACE TABLE Rol(
	idRol					TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreRol				VARCHAR(15)		NOT NULL,
	idPermiso				TINYINT			NOT NULL,
	INDEX (idPermiso),
	FOREIGN	KEY	(idPermiso)
        REFERENCES Permiso(idPermiso)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE OR REPLACE TABLE Usuario(
	idUsuario				TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	NombreUsuario			VARCHAR(50)		NOT NULL,
	ApellidoUsuario			VARCHAR(50)		NOT NULL,
	TelefonoUsuario			VARCHAR(20)		NOT NULL,
	DireccionUsuario		VARCHAR(50) 	NOT NULL,
	CorreoUsuario			VARCHAR(40)		NOT NULL,
	NombreInicioSesionUsuario		VARCHAR(15)			NOT NULL,
	ContraseniaUsuario		TEXT			NOT NULL,
	idPuesto				TINYINT			NOT NULL,
	idRol					TINYINT			NOT NULL,
	idRango					TINYINT			NOT NULL,
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
	idEmpleado					TINYINT			NOT NULL			PRIMARY KEY			AUTO_INCREMENT,
	CodigoEmpleado				VARCHAR(15)		NOT NULL,
	NombreEmpleado				VARCHAR(25)		NOT NULL,
	ApellidoEmpleado			VARCHAR(25)		NOT NULL,
    FechaNacEmpleado			DATE			NOT NULL,
    TelefonoEmpleado			VARCHAR(30)		NOT NULL,
    DireccionEmpleado			VARCHAR(50)		NOT NULL,
    CorreoEmpleado				VARCHAR(50)		NOT NULL
);

CREATE TABLE Cliente (
    idCliente 					int AUTO_INCREMENT primary KEY,
    NombreCliente 				varchar (30)	not null,
    ApellidoCliente				varchar (30) 	not null,
    TelefonoCliente				varchar	(30)	not null,
    DireccionCliente			varchar (30)	not null,
    FechaNacCliente				varchar (30)	not null,
    NitCliente					varchar (30)	not null
);

CREATE TABLE Proveedor (
    idProveedor 				int AUTO_INCREMENT primary KEY,
    NombreProveedor 			varchar (30)	not null,
    TelefonoProveedor			varchar	(30)	not null,
    DireccionProveedor			varchar (30)	not null
);

CREATE table Producto (
	idProducto	int AUTO_INCREMENT	not null PRIMARY KEY,
    NombreProducto 				varchar (30) not null,
    PrecioProducto				float (30) 	not null,
    FechaVencimientoProducto 	date	not null,
    CategoriaProducto			varchar (30)	not null,
    DescripcionProducto			varchar (30)	not null,
   	idProveedor					int	(3)	not null,
	INDEX (idProveedor),
	FOREIGN	KEY	(idProveedor)
        REFERENCES Proveedor(idProveedor)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE Compras (
    idCompras 					int AUTO_INCREMENT primary KEY,
    FechaCompra 				varchar (30)	not null,
    NumeroDocumentoCompra		varchar	(30)	not null,
    idProveedor					int	(3)	not null,
	INDEX (idProveedor),
	FOREIGN	KEY	(idProveedor)
        REFERENCES Proveedor(idProveedor)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE Factura (
	idFactura 					int AUTO_INCREMENT PRIMARY KEY not null,
	idCliente 					int not null,
	TotalFactura 				decimal(10,2) not null,
	INDEX (idCliente),
	FOREIGN	KEY	(idCliente)
        REFERENCES Cliente(idCliente)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE DetalleFactura (
	idDetalleFac 				int AUTO_INCREMENT primary key,
	idProducto 					int not null,
	idFactura 					int not null,
	Cantidad 					tinyint not null,
	Total decimal(10,0),
	INDEX (idProducto),
	FOREIGN	KEY	(idProducto)
        REFERENCES Producto(idProducto)
        ON DELETE CASCADE
        ON UPDATE NO ACTION,
		INDEX (idFactura),
	FOREIGN	KEY	(idFactura)
        REFERENCES Factura(idFactura)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE DetalleCompra (
	idDetalleCompra 			int AUTO_INCREMENT PRIMARY KEY not null,
	idProducto 					int not null,
	CantidadCompra 				tinyint not null,
	TotalCompra 				decimal(10,0) not null,
	INDEX (idProducto),
	FOREIGN	KEY	(idProducto)
        REFERENCES Producto(idProducto)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);
