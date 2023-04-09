create database inventario;
use inventario;

CREATE TABLE roles (
  codigo_rol INT primary key auto_increment,
  rol VARCHAR(20),
  activo boolean
) engine =innodb;

CREATE TABLE categorias (
  codigo_categoria INT primary key auto_increment,
  categoria VARCHAR(20),
  activo boolean
) engine =innodb;

CREATE TABLE usuarios (
  codigo_usuario INT primary key auto_increment,
  usuario VARCHAR(75),
  clave VARCHAR(300),
  email VARCHAR(75),
  activo boolean,
  codigo_rol int,
  index (codigo_rol),
  FOREIGN KEY (codigo_rol) REFERENCES roles(codigo_rol)
) engine =innodb;

CREATE TABLE equipos (
  codigo_equipo INT primary key auto_increment,
  equipo VARCHAR(75),
  caracteristicas VARCHAR(500),
  estado VARCHAR(75),
  imagen VARCHAR(100),
  imagen_QR VARCHAR(100),
  activo boolean,
  codigo_categoria int,
  index (codigo_categoria),
  FOREIGN KEY (codigo_categoria) REFERENCES categorias(codigo_categoria)
) engine =innodb;

CREATE TABLE solicitudes (
  codigo_solicitud INT primary key auto_increment,
  fecha DATE,
  estado VARCHAR(75),
  activo boolean,
  codigo_usuario int,
  codigo_equipo int,
  index (codigo_usuario),
  index (codigo_equipo),
  FOREIGN KEY (codigo_usuario) REFERENCES usuarios(codigo_usuario),
  FOREIGN KEY (codigo_equipo) REFERENCES equipos(codigo_equipo)
) engine =innodb;

CREATE TABLE incidencias (
  codigo_incidencia INT primary key auto_increment,
  descripcion VARCHAR(75),
  estado VARCHAR(75),
  activo boolean,
  codigo_usuario int,
  codigo_equipo int,
  index (codigo_usuario),
  index (codigo_equipo),
  FOREIGN KEY (codigo_usuario) REFERENCES usuarios(codigo_usuario),
  FOREIGN KEY (codigo_equipo) REFERENCES equipos(codigo_equipo)
) engine =innodb;

INSERT INTO roles(rol,activo) values ('administrador',1);
INSERT INTO roles(rol,activo) values ('usuario',1);

INSERT INTO categorias(categoria,activo) values ('Pantallas',1);
INSERT INTO categorias(categoria,activo) values ('Teclados',1);
INSERT INTO categorias(categoria,activo) values ('Ratones',1);

INSERT INTO usuarios(usuario,clave,email,activo,codigo_rol) values ('administrador','5e7951aa8f403ff16d0cd453e7d86ee0c99ce5319e01836333b6ba398a20494d7f3e76397e3d99e8fc4702ba7cfd7600d453958c755000cc31ce0150ac819f9e','administrador@email.com',1,1);
INSERT INTO usuarios(usuario,clave,email,activo,codigo_rol) values ('usuario','d9e94fd2b4c5522e5bb7996aa4df48a3f6b8f1b0c3e7fadb5fcc724e3ab6d85dc401b0a2789fe56c209b80e86102b218ff74ff8614f315599a180691846138b6','usuario@email.com',1,2);

-- INSERT INTO equipos(equipo,caracteristicas,estado,imagen,imagen_QR,activo,codigo_categoria) values ();

-- INSERT INTO solicitudes(fecha,estado,activo,codigo_usuario,codigo_equipo) values ();

-- INSERT INTO incidencias(descripcion,estado,activo,codigo_usuario,codigo_equipo) values ();