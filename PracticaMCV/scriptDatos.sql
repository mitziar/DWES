create database tienda;
use tienda;

CREATE TABLE roles (
  codigo INT primary key auto_increment,
  rol VARCHAR(20)
) engine =innodb;
--
CREATE TABLE productos (
  codigo INT primary key auto_increment,
  nombre VARCHAR(75),
  descripcion VARCHAR(75),
  precio numeric(6, 2),
  stock int,
  ruta varchar(75) DEFAULT 'imagenPorDefecto.png'
) engine =innodb;
--
CREATE TABLE usuarios (
  usuario VARCHAR(75) primary key,
  contraseña VARCHAR(75),
  email VARCHAR(75),
  fecha DATE,
  codigo int,
  index (codigo),
  FOREIGN KEY (codigo) REFERENCES roles(codigo)
) engine =innodb;
--
CREATE TABLE albaran (
  codigo int primary key auto_increment,
  fecha DATE,
  cantidad int,
  producto int,
  usuario varchar(75),
  index (producto),
  index (usuario),
  FOREIGN KEY (producto) REFERENCES productos(codigo),
  FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
) engine =innodb;
--
CREATE TABLE venta (
  id int primary key auto_increment,
  fecha DATE,
  cantidad int,
  precio numeric(6, 2),
  producto int,
  usuario varchar(75),
  index (producto),
  index (usuario),
  FOREIGN KEY (producto) REFERENCES productos(codigo),
  FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
) engine =innodb;
--
INSERT INTO roles(rol) values ('administrador');
INSERT INTO roles(rol) values ('moderador');
INSERT INTO roles(rol) values ('usuario normal');
--
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Televisor LG', 'Televisión LG SmartTV 65"',525.20,20,'television.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Televisor Samsung', 'Televisión Samsung SmartTV 55"',455.99,25,'television.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Lavadora Balay', 'Lavadora Balay carga frontal 1200 rpm',876.00,10,'lavadora.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Lavadora Bosch',  'Lavadora Bosch carga frontal 1400 rpm',925.99,25,'lavadora.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Lavavajillas Siemens', 'Lavavajillas Siemens 45cm 10 servicios',645.00,16,'lavavajillas.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Lavavajillas Bosch',  'Lavavajillas Bosch 60cm 13 sevicios',725.99,22,'lavavajillas.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Aspirador Cecotec', 'Robot aspirador Cecotec. Modelo Conga',249.00,30,'aspirador.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Aspirador Dyson',  'Aspirador Dyson de escoba',625.99,25,'aspirador.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Telefono Xiaomi', 'Telefono Xiaomi Redmi Note S10',220.30,16,'movil.jfif');
INSERT INTO productos(nombre, descripcion, precio, stock,ruta) values ('Telefono Apple Iphone 12',  'Telefono Apple Iphone 12. Pantalla OLED',888.99,22,'movil.jfif');

--
INSERT INTO usuarios(usuario, contraseña,email,fecha,codigo) VALUES ('admin','2bf03fdcf75352a094a84a24426dc399165ae16b','adminAd1@email.com','2002-10-29',1);
INSERT INTO usuarios(usuario, contraseña,email,fecha,codigo) VALUES ('moderador','02c4a187b574b1d82f6a7570969e18d86ae80161','moderadorMo1@email.com','1993-10-30',2);
INSERT INTO usuarios(usuario, contraseña,email,fecha,codigo) VALUES ('usuario','c64f043687c6f2bfb4739e6b6013d933674e40ce','usuarioUs1@email.com','2001-12-09',3);
--
INSERT INTO albaran(fecha,cantidad,producto,usuario) values ('2001-12-09',20,1,'admin');
INSERT INTO albaran(fecha,cantidad,producto,usuario) values ('2001-02-01',25,8,'admin');
--
INSERT INTO venta(fecha,cantidad,precio,producto,usuario) values ('2022-12-09',1,525.20,1,'admin');
INSERT INTO venta(fecha,cantidad,precio,producto,usuario) values ('2022-02-01',1,625.99,8,'admin');