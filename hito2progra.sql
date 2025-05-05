DROP DATABASE IF EXISTS hito2progra;
CREATE DATABASE hito2progra;
USE hito2progra;
-- Creamos la base de datos 

-- Creamos la tabla de salas
CREATE TABLE salas (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    capacidad INT
);


-- Creamos la tabla de pelicualas
CREATE TABLE peliculas (
    codigo VARCHAR(10) PRIMARY KEY,
    titulo VARCHAR(100),
    duracion INT,
    genero VARCHAR(50),
    nota VARCHAR(10),
    sala_id INT,
    FOREIGN KEY (sala_id) REFERENCES salas(id)
);


-- Insertamos la tabla de salas y le metemos la información
INSERT INTO salas (id, nombre, capacidad) VALUES
(1, 'Sala A', 300),
(2, 'Sala B', 250);

-- Insertamos la tabla de peliculas y le metemos toda la información
INSERT INTO peliculas (codigo, titulo, duracion, genero, nota, sala_id) VALUES
('P001', 'Corredor del laberinto', 91.8, 'Ciencia ficción', '9,7', 1),
('P002', 'Resacon en las vegas', 84, 'Comedia', '10', 2);
