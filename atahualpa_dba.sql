CREATE DATABASE ATAHUALPA_DBA;
GO
USE ATAHUALPA_DBA;
GO

CREATE TABLE PRODUCTO(
ID_PROD INT IDENTITY(1000,100) NOT NULL,
NOMBRE VARCHAR(150) NOT NULL,
DESCRIPCION VARCHAR(255) DEFAULT '---',
PRECIO_COMP DECIMAL NOT NULL,
PRECIO_VENT DECIMAL NOT NULL,
STOCK INT NOT NULL,
ID_PROV INT NOT NULL,
UNIDAD INT NOT NULL,
FECHA_INGRESO DATE,
ACTIVO BIT DEFAULT 1 NOT NULL,
PRIMARY KEY(ID_PROD)
);
GO

CREATE TABLE TIPO_UNIDAD(
ID_UNI INT IDENTITY(1,1) NOT NULL,
NOMBRE VARCHAR(150) NOT NULL,
PRIMARY KEY(ID_UNI)
);
GO

CREATE TABLE PROVEEDOR(
ID_PROV INT IDENTITY(100,100) NOT NULL,
NOMBRE VARCHAR(255) NOT NULL,
RUC VARCHAR(11) DEFAULT '00000000000',
DIRECCION VARCHAR(255) DEFAULT '---' NOT NULL,
TELEFONO VARCHAR(11) DEFAULT '000000000' NOT NULL,
EMAIL VARCHAR(100) DEFAULT 'EMAIL@DOMINIO.COM' NOT NULL,
DESCRIPCION VARCHAR(255) DEFAULT 'PROVEEDOR GENERAL' NOT NULL,
FECHA_REGISTRO DATE,
ACTIVO BIT DEFAULT 1 NOT NULL,
PRIMARY KEY(ID_PROV)
);
GO

CREATE TABLE CLIENTE(
ID_CLI INT IDENTITY(100,110) NOT NULL,
NOMBRES VARCHAR(150) NOT NULL,
APELLIDOS VARCHAR(150) NOT NULL,
DNI VARCHAR(20) DEFAULT '00000000' NOT NULL,
DIRECCION VARCHAR(255) DEFAULT '---' NOT NULL,
EMAIL VARCHAR(100) DEFAULT 'EMAIL@DOMINIO.COM' NOT NULL,
TELEFONO VARCHAR(11) DEFAULT '000000000' NOT NULL,
FECHA_REGISTRO DATE,
ACTIVO BIT DEFAULT 1 NOT NULL,
PRIMARY KEY(ID_CLI)
);
GO

CREATE TABLE COMPROBANTE(
ID_COMP INT IDENTITY(100000,1) NOT NULL,
TIPO VARCHAR(4) DEFAULT 'BOL' NOT NULL,
EMISION DATETIME NOT NULL,
SUBTOTAL DECIMAL NOT NULL,
TOTAL DECIMAL NOT NULL,
IGV DECIMAL NOT NULL,
PAGADO BIT DEFAULT 1 NOT NULL,
PRIMARY KEY(ID_COMP)
);
GO

CREATE TABLE COMPRA(
ID_COMP INT NOT NULL,
ID_CLI INT NOT NULL,
PRIMARY KEY(ID_COMP,ID_CLI)
);
GO

CREATE TABLE COMPROBANTE_PROD(
ID_COMP INT NOT NULL,
ID_PROD INT NOT NULL,
PRIMARY KEY(ID_COMP,ID_PROD)
);
GO

CREATE TABLE USUARIO(
ID_USR INT IDENTITY(10,10) NOT NULL,
USUARIO VARCHAR(20) NOT NULL,
CONTRASENA VARCHAR(255) NOT NULL,
NOMBRES VARCHAR(150) NOT NULL,
APELLIDOS VARCHAR(150) NOT NULL,
EMAIL VARCHAR(100) DEFAULT 'EMAIL@DOMINIO.COM' NOT NULL,
TELEFONO VARCHAR(11) DEFAULT '000000000' NOT NULL,
FECHA_REGISTRO DATE,
ACTIVO BIT DEFAULT 1 NOT NULL,
PRIMARY KEY(ID_USR)
)
GO
------RELACIONES.
ALTER TABLE PRODUCTO ADD CONSTRAINT FK_PROD_PROV FOREIGN KEY(ID_PROV) REFERENCES PROVEEDOR(ID_PROV);
GO
ALTER TABLE PRODUCTO ADD CONSTRAINT FK_PROD_UNI FOREIGN KEY(UNIDAD) REFERENCES TIPO_UNIDAD(ID_UNI);
GO
ALTER TABLE COMPRA ADD CONSTRAINT FK_COMPRA_COMP FOREIGN KEY(ID_COMP) REFERENCES COMPROBANTE(ID_COMP);
GO
ALTER TABLE COMPRA ADD CONSTRAINT FK_COMPRA_CLI FOREIGN KEY(ID_CLI) REFERENCES CLIENTE(ID_CLI);
GO
ALTER TABLE COMPROBANTE_PROD ADD CONSTRAINT FK_CP_COMP FOREIGN KEY(ID_COMP) REFERENCES COMPROBANTE(ID_COMP);
GO
ALTER TABLE COMPROBANTE_PROD ADD CONSTRAINT FK_CP_PROD FOREIGN KEY(ID_PROD) REFERENCES PRODUCTO(ID_PROD);
GO
ALTER TABLE USUARIO ADD PERMISOS INT DEFAULT 0 NOT NULL;