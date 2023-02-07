create database baseJugadores;
use baseJugadores;

create table jugadores(
    codJuagador int primary key auto_increment,
    nombre varchar(40) not null,
    posicion varchar(40) not null,
    sueldo float not null,
    codEquipo varchar(100),
    foreing key references equipo(codEquipo)
);

create table equipos(
    codEquipo int primary key auto_increment,
    nombre varchar(40) not null,
    localidad varchar(40) not null,
);