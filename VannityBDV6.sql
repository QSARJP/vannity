#CODIGO BASE DATOS VANNITY SARA TOVAR

/*
*Una sentencia sql es una línea de código para trabajar la bd
*
*TIPOS DE SENTENCIAS:
*** 1. Sentencias estructurales= permiten crear, modificar o eliminar objetos, usuarios y propiedades de la bd, x ej: create table
*
*** 2. Sentencias de datos: permiten incertar, eliminar, modificar y buscar info en la bd, x ej: insert into
*
*TIPOS DE ENGINE PARA TABLAS
*** 1.MyIsam- para tablas planas, como excel
*** 2.InnoDB- para tablas relacionales, como en access
*
*/


#crear la base de datos, "An error occurs if the database exists and you did not specify IF NOT EXISTS"
CREATE DATABASE   IF NOT EXISTS VannityBDV6;

#usar la base de datos recién creada
use VannityBDV6;

#crear tablas, empezar por las que no dependen de otras
CREATE TABLE IF NOT EXISTS personasEmpresa(
ID_Persona int not null  PRIMARY KEY AUTO_INCREMENT,
nombre varchar(20),
apellido varchar(20),
email varchar(20),
celular varchar(10),
usuarioSesion varchar(20),
contrasenaSesion varchar(20),
rol int(11)
)ENGINE=INNODB ; 


CREATE TABLE IF NOT EXISTS rol(
ID_Rol int not null  PRIMARY KEY AUTO_INCREMENT,
nombreRol varchar(20),
descripcionRol varchar(100)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS productos(
ID_Producto int not null  PRIMARY KEY AUTO_INCREMENT,
nombreProducto varchar(20),
Ref_Producto int not null,
descripcionProducto varchar(80),
estadoProducto varchar(20),
precioProducto numeric(5,0),
costoProducto numeric(5,0),
cantidadProducto int
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS clientes(
ID_Cliente int not null  PRIMARY KEY AUTO_INCREMENT,
nombre varchar(20),
apellido varchar(20),
email varchar(20),
celular varchar(10),
ciudadCliente varchar(20),
usuarioSesion varchar(20),
contrasenaSesion varchar(20)
)ENGINE=INNODB;


#CREAR TABLAS QUE SI DEPENDEN DE OTRAS
CREATE TABLE IF NOT EXISTS usuariosEmpresa(
ID_Persona int not null AUTO_INCREMENT,
ID_CargoEmpresa int not null,
PRIMARY KEY (ID_Persona),
FOREIGN KEY (ID_Persona) REFERENCES personas(ID_Persona), 
#la FK id_personas traida de la tabla personas se vuelve una PK 
FOREIGN KEY (ID_CargoEmpresa) REFERENCES cargoEmpresa(ID_CargoEmpresa)
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS pedidos(
ID_Pedido int not null  PRIMARY KEY AUTO_INCREMENT,
ID_Cliente int not null, 
fechaPedido datetime,
valorTotal numeric(5,0),
estadoPedido varchar(20),
ID_Persona int not null, #este es un FK que representa el empleado que atendio
FOREIGN KEY (ID_Cliente) REFERENCES clientes(ID_Cliente),
FOREIGN KEY (ID_Persona) REFERENCES usuariosEmpresa(ID_Persona)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS detallePedido(
#la PK esta compuesta por dos FK 
ID_Pedido int not null,
nombreProducto varchar(20), 
PRIMARY KEY (ID_Pedido,nombreProducto)
)ENGINE=INNODB;
ALTER TABLE detallePedido
ADD CONSTRAINT
FOREIGN KEY (ID_Pedido) REFERENCES pedidos(ID_Pedido);
ALTER TABLE detallePedido
ADD CONSTRAINT
FOREIGN KEY (nombreProducto) REFERENCES productos(nombreProducto);


# LLENAR ALGUNOS DATOS

INSERT INTO rol (ID_Rol,nombreRol,descripcionRol) VALUES
   (1,"Administrador", "Tiene el máximo control sobre las demás entidades"),
   (2,"Vendedor", "Puede realizar pedidos de un cliente desde la tienda física");
   
