create database apiEquipos;
use apiEquipos;

CREATE TABLE equipo(
    codEquipo INT primary key auto_increment,
    nombre varchar(100),
    localidad varchar(900)
)engine =innodb;

CREATE TABLE jugador(
    codJugador INT primary key auto_increment,
    nombre varchar(100),
    posicion varchar(900),
    sueldo float,
    codEquipo INT,
    index (codEquipo),
  FOREIGN KEY (codEquipo) REFERENCES equipo(codEquipo)
)engine =innodb;

INSERT INTO equipo(nombre,localidad) values ('UDT: Unión Deportiva Toresana','Toro-Zamora');
INSERT INTO equipo(nombre,localidad) values ('AT: Atlético Toresano','Toro-Zamora');

INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Pepe','portero',1000.20,1);
INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Luis','defensa',1100.20,1);
INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Lucas','delantero',1500.20,1);

INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Juan','portero',1000.20,2);
INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Manuel','defensa',1100.20,2);
INSERT INTO jugador(nombre,posicion,sueldo,codEquipo) values ('Antonio','delantero',1500.20,2);