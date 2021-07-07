create database citasimss;
use  citasimss;

create table usuario (
idusuario int primary key not null auto_increment,
nombre varchar(45) not null,
apellidoPaterno varchar (45) not null,
apellidoMaterno varchar (45) not null,
domicilio varchar (45) not null,
ciudad varchar (45) not null,
estado varchar (45) not null,
NSS varchar (45) not null unique,
correo varchar (45) not null,
password varchar (45) not null
);
create table citas (
idcitas int primary key not null auto_increment,
enfermedad varchar(45) not null,
fecha date not null,
hora time not null,
activo int not null,
idUsuario int not null,
idMedico int not null,
idSucursal int not null,
CONSTRAINT fk_idUsuario FOREIGN KEY (idUsuario) REFERENCES usuario (idUsuario),
CONSTRAINT fk_idMedico FOREIGN KEY (idMedico) REFERENCES medico (idMedico),
CONSTRAINT fk_idSucursal FOREIGN KEY (idSucursal) REFERENCES sucursal (idSucursal)
);
create table medico(
idmedico int primary key not null auto_increment,
nombre varchar(45) not null,
especialidad varchar(45) not null
);
create table sucursal(
idsucursal int primary key not null auto_increment,
direccion varchar(45) not null,
telefono varchar (15) not null
);