DROP DATABASE if exists hito1;
CREATE DATABASE hito1;
USE hito1;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    correo VARCHAR(100) UNIQUE,
    edad INT,
    plan_base ENUM('Basico', 'Estandar', 'Premium'),
    paquete ENUM('Deporte', 'Cine', 'Infantil', 'Ninguno'),
    duracion ENUM('Mensual', 'Anual')
);
