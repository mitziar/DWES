create database alumnos;
create user usuario identified by 'usuario';
use alumnos;

grant all on alumnos.* to usuario;
--
CREATE TABLE notas (
  id INT primary key,
  nombre VARCHAR(75),
  nota numeric(4, 2),
  fecha DATE 
) engine =innodb;
--
INSERT INTO notas VALUES (1,'Antonio',2.20,'2022-10-29');
INSERT INTO notas VALUES (2,'Ana',5.20,'2022-10-29');
INSERT INTO notas VALUES (3,'Pepe',10.00,'2022-10-29');
INSERT INTO notas VALUES (4,'Caren',8.20,'2022-10-29');
INSERT INTO notas VALUES (5,'Cristina',10.00,'2022-10-29');
INSERT INTO notas VALUES (6,'Marina',7.30,'2022-10-29');
INSERT INTO notas VALUES (7,'Luis',6.00,'2022-10-29');
INSERT INTO notas VALUES (8,'Paco',3.25,'2022-10-29');
INSERT INTO notas VALUES (9,'Lola',5.50,'2022-10-29');
INSERT INTO notas VALUES (10,'Ignacio',8.00,'2022-10-29');
--