-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2024 a las 19:40:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `libro_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `anio_publicacion` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libro_id`, `titulo`, `autor`, `genero`, `anio_publicacion`) VALUES
(1, 'Don Quijote', 'Miguel de Cervante', 'Adventure', 0),
(2, 'Cien años de soledad', 'Gabriel García Márquez', 'Magical Realism', 1967),
(3, 'La casa de Bernarda Alba', 'Federico García Lorca', 'Drama', 1936),
(4, 'El amor en los tiempos del cólera', 'Gabriel García Márquez', 'Romance', 1985),
(5, 'La sombra del viento', 'Carlos Ruiz Zafón', 'Mystery', 2001),
(6, 'El laberinto de los espíritus', 'Carlos Ruiz Zafón', 'Thriller', 2016),
(7, 'La colmena', 'Camilo José Cela', 'Fiction', 1951),
(8, 'Crónica de una muerte anunciada', 'Gabriel García Márquez', 'Fiction', 1981),
(9, 'La Regenta', 'Leopoldo Alas \"Clarín\"', 'Fiction', 0),
(10, 'El alquimista', 'Paulo Coelho', 'Adventure', 1988),
(11, 'El ingenioso hidalgo don Quijote de la Mancha', 'Miguel de Cervantes', 'Adventure', 0),
(12, 'Fortunata y Jacinta', 'Benito Pérez Galdós', 'Realism', 0),
(13, 'Los santos inocentes', 'Miguel Delibes', 'Drama', 1981),
(14, 'Rayuela', 'Julio Cortázar', 'Modernism', 1963),
(15, 'El príncipe destronado', 'Miguel Delibes', 'Fiction', 1973),
(16, 'Marianela', 'Benito Pérez Galdós', 'Realism', 0),
(17, 'El túnel', 'Ernesto Sabato', 'Psychological', 1948),
(18, 'Niebla', 'Miguel de Unamuno', 'Existentialism', 1914),
(19, 'La invención de Morel', 'Adolfo Bioy Casares', 'Science Fiction', 1940),
(20, 'Pedro Páramo', 'Juan Rulfo', 'Magical Realism', 1955),
(21, 'Don Quijote', 'Miguel de Cervantes', 'Adventure', 1605),
(22, 'Cien años de soledad', 'Gabriel García Márquez', 'Magical Realism', 1967),
(23, 'La casa de Bernarda Alba', 'Federico García Lorca', 'Drama', 1936),
(24, 'El amor en los tiempos del cólera', 'Gabriel García Márquez', 'Romance', 1985),
(25, 'La sombra del viento', 'Carlos Ruiz Zafón', 'Mystery', 2001),
(26, 'El laberinto de los espíritus', 'Carlos Ruiz Zafón', 'Thriller', 2016),
(27, 'La colmena', 'Camilo José Cela', 'Fiction', 1951),
(28, 'Crónica de una muerte anunciada', 'Gabriel García Márquez', 'Fiction', 1981),
(29, 'La Regenta', 'Leopoldo Alas \"Clarín\"', 'Fiction', 1884),
(30, 'El alquimista', 'Paulo Coelho', 'Adventure', 1988),
(31, 'El ingenioso hidalgo don Quijote de la Mancha', 'Miguel de Cervantes', 'Adventure', 1615),
(32, 'Fortunata y Jacinta', 'Benito Pérez Galdós', 'Realism', 1887),
(33, 'Los santos inocentes', 'Miguel Delibes', 'Drama', 1981),
(34, 'Rayuela', 'Julio Cortázar', 'Modernism', 1963),
(35, 'El príncipe destronado', 'Miguel Delibes', 'Fiction', 1973),
(36, 'Marianela', 'Benito Pérez Galdós', 'Realism', 1878),
(37, 'El túnel', 'Ernesto Sabato', 'Psychological', 1948),
(38, 'Niebla', 'Miguel de Unamuno', 'Existentialism', 1914),
(39, 'La invención de Morel', 'Adolfo Bioy Casares', 'Science Fiction', 1940),
(40, 'Pedro Páramo', 'Juan Rulfo', 'Magical Realism', 1955);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `miembro_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_suscripcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`miembro_id`, `nombre`, `apellido`, `email`, `fecha_suscripcion`) VALUES
(1, 'Carlos', 'Pérez', 'carlosperez@example.com', '2022-01-15'),
(2, 'María', 'González', 'mariagonzalez@example.com', '2022-02-20'),
(3, 'Juan', 'Rodríguez', 'juanrodriguez@example.com', '2022-03-05'),
(4, 'Ana', 'Martínez', 'anamartinez@example.com', '2022-04-10'),
(5, 'Luis', 'Hernández', 'luishernandez@example.com', '2022-05-25'),
(6, 'Sofía', 'López', 'sofialopez@example.com', '2022-06-15'),
(7, 'Miguel', 'García', 'miguelgarcia@example.com', '2022-07-08'),
(8, 'Valentina', 'Sánchez', 'valentinasanchez@example.com', '2022-08-02'),
(9, 'Santiago', 'Ramírez', 'santiagoramirez@example.com', '2022-09-12'),
(10, 'Camila', 'Torres', 'camilatorres@example.com', '2022-10-23'),
(11, 'Mateo', 'Flores', 'mateoflores@example.com', '2022-11-03'),
(12, 'Daniela', 'Castillo', 'danielacastillo@example.com', '2022-12-14'),
(13, 'Alejandro', 'Ortiz', 'alejandroortiz@example.com', '2023-01-20'),
(14, 'Isabella', 'Romero', 'isabellaromero@example.com', '2023-02-28'),
(15, 'Diego', 'Reyes', 'diegoreyes@example.com', '2023-03-15'),
(16, 'Gabriela', 'Morales', 'gabrielamorales@example.com', '2023-04-17'),
(17, 'Andrés', 'Cruz', 'andrescruz@example.com', '2023-05-30'),
(18, 'Lucía', 'Gómez', 'luciagomez@example.com', '2023-06-10'),
(19, 'Javier', 'Mendoza', 'javiermendoza@example.com', '2023-07-25'),
(20, 'Martina', 'Castro', 'martinacastro@example.com', '2023-08-11'),
(22, 'Juan', 'Perez', 'juan.perez@example.com', '2024-08-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libro_id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`miembro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `miembro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
