create database ControlUsuarios;

use ControlUsuarios;

create table Usuarios (
	email varchar(50) not null primary key,
    nombre varchar(50) not null,
    apellidos varchar(50) not null,
    telefono varchar(10) not null,
    nombreUsuario varchar(50) not null unique,
    fechaNacimiento date not null,
    contrasena varchar(100) not null
);

insert into Usuarios (email, nombre, apellidos, telefono, nombreUsuario, fechaNacimiento, contrasena) 
	values ('juan@gmail.com','juan','Coto','98761234', 'juan', '1994-12-20', '123456Ui');