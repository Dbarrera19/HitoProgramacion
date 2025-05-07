DROP DATABASE IF EXISTS cine_danielbarrera;
CREATE DATABASE cine_danielbarrera;
USE cine_danielbarrera;

-- Tabla de salas
CREATE TABLE salas (
    id INT PRIMARY KEY,
    nombre VARCHAR(50),
    capacidad INT
);

-- Tabla de películas
CREATE TABLE peliculas (
    codigo VARCHAR(10) PRIMARY KEY,
    titulo VARCHAR(100),
    duracion INT,
    genero VARCHAR(50),
    nota VARCHAR(10),  -- O cambia a nota DECIMAL(3,1) si quieres nota como número
    sala_id INT,
    FOREIGN KEY (sala_id) REFERENCES salas(id)
);

-- Insertar salas
INSERT INTO salas (id, nombre, capacidad) VALUES
(1, 'Sala A', 300),
(2, 'Sala B', 250);

-- Insertar películas
INSERT INTO peliculas (codigo, titulo, duracion, genero, nota, sala_id) VALUES
('P001', 'Corredor del laberinto', 92, 'Ciencia ficción', '9.7', 1),
('P002', 'Resacon en las vegas', 84, 'Comedia', '10', 2);
