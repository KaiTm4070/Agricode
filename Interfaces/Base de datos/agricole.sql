-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2024 a las 19:48:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agricole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `cod_pedido` int(11) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `correo_Vendedor` varchar(100) NOT NULL,
  `cod_producto` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `nombre_producto` varchar(200) DEFAULT NULL,
  `precio_p` double DEFAULT NULL,
  `cantidad_producto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `correo_electronico` varchar(100) NOT NULL,
  `id_unique` int(255) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` double DEFAULT NULL,
  `cedula` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tarjeta_C` double DEFAULT NULL,
  `tipo_usuario` varchar(15) DEFAULT NULL,
  `contraseña` varchar(150) DEFAULT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`correo_electronico`, `id_unique`, `nombre`, `apellido`, `telefono`, `cedula`, `fecha`, `tarjeta_C`, `tipo_usuario`, `contraseña`, `foto`) VALUES
('', 1325349294, '', '', 0, 0, '0000-00-00', 0, '', '', '../Imagenes/usuario__.PNG'),
('asd', 0, 'Maria', 'Luz', 132465, 65241, '2023-03-14', 4412351, 'Vendedor', 'qwe123', '../Imagenes/usuario__.png'),
('das', 1622688038, 'Nathalia', 'Zubieta', 333333, 9876532, '2006-07-07', 6432187, 'Vendedor', 'qwe123', '../Imagenes/usuario__.png'),
('dasdas@sddas', 361954429, 'dsda', 'asdasda', 123894, 12556065, '2024-01-09', 1354628, 'Cliente', 'daqwe', '../Imagenes/usuario__.PNG'),
('dfg', 357956319, 'Carlos', 'Montenegro', 34698752, 36541897, '2023-03-06', 65458, 'Cliente', 'qwe123', '../databas_img/Fl6J01XXwAAoTDF xd2.jpg'),
('dsa', 0, 'Carlos', 'Matinez', 3654187, 9632, '2023-03-14', 635148, 'Vendedor', 'qwe123', '../Imagenes/usuario__.png'),
('jkl', 974456342, 'Juan', 'Perez', 325456, 651223, '2023-02-27', 222222, 'Vendedor', 'qwe123', '../Imagenes/usuario__.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago`
--

CREATE TABLE `detalle_pago` (
  `cod_detalle` int(11) NOT NULL,
  `cod_pago` int(11) DEFAULT NULL,
  `correo_electronio` varchar(100) DEFAULT NULL,
  `correo_cliente` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_p` double DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeria`
--

CREATE TABLE `mensajeria` (
  `Cod_Mensajes` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoin_msg_id` int(255) NOT NULL,
  `mensaje` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajeria`
--

INSERT INTO `mensajeria` (`Cod_Mensajes`, `incoming_msg_id`, `outgoin_msg_id`, `mensaje`) VALUES
(1, 0, 357956319, 'Hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeria_detalle`
--

CREATE TABLE `mensajeria_detalle` (
  `id_mensaje` int(11) NOT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `id_unique` int(255) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `cod_pago` int(11) NOT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `metodo_pago` varchar(100) DEFAULT NULL,
  `Barrio` varchar(150) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `total_pago` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(11) NOT NULL,
  `id_unique` int(255) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `nombre_produto` varchar(200) DEFAULT NULL,
  `precio_g` double DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `id_unique`, `correo_electronico`, `nombre_produto`, `precio_g`, `categoria`, `imagen`) VALUES
(40, 0, 'asd', 'Azada', 5600, 'Utencilios del campo', '../databas_img/AZADA.png'),
(41, 0, 'asd', 'Racimo de babanos', 85600, 'Frutas', '../databas_img/BANANOS.png'),
(42, 0, 'asd', 'Fertilizante Scotts', 150000, 'Fertilizantes', '../databas_img/Fertilizante.png'),
(43, 1622688038, 'das', 'Composta', 50600, 'Composta', '../databas_img/Compost.png'),
(44, 1622688038, 'das', 'Costal de papas', 140000, 'Verduras', '../databas_img/PAPAS.png'),
(45, 1622688038, 'das', 'Pala', 50600, 'Utencilios del campo', '../databas_img/PALA.png'),
(46, 0, 'dsa', 'Costal de papa amarilla', 150000, 'Verduras', '../databas_img/PAPA AMARILLA.png'),
(47, 0, 'dsa', 'papaya', 12000, 'Frutas', '../databas_img/PAPAYA.png'),
(48, 0, 'dsa', 'Pera', 2500, 'Frutas', '../databas_img/PERA.png'),
(49, 0, 'jkl', ' tomates', 15400, 'Verduras', '../databas_img/TOMATE.png'),
(50, 0, 'jkl', 'Zanahoria', 2000, 'Verduras', '../databas_img/ZANAHORIA.png'),
(55, 0, 'jkl', 'Manzana', 2000, 'Frutas', '../databas_img/MANZANA.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `cod_reseñas` int(11) NOT NULL,
  `cod_producto` int(11) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `reseña` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`cod_reseñas`, `cod_producto`, `correo_electronico`, `reseña`) VALUES
(25, 40, 'dfg', 'chevere producto'),
(26, 47, 'dfg', 'Hola me gusto tu producto'),
(27, 47, 'dfg', 'que producto tan mierda'),
(30, 44, 'dfg', 'Coso'),
(31, 40, 'dfg', 'XD'),
(34, 44, 'dfg', 'XD'),
(35, 41, 'dfg', 'que asco de producto\r\n'),
(36, 41, 'dfg', 'Pesimo producto\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `cod_supp` int(11) NOT NULL,
  `problema` varchar(500) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_producto` (`cod_producto`),
  ADD KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`correo_electronico`);

--
-- Indices de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD PRIMARY KEY (`cod_detalle`),
  ADD KEY `correo_electronio` (`correo_electronio`);

--
-- Indices de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  ADD PRIMARY KEY (`Cod_Mensajes`);

--
-- Indices de la tabla `mensajeria_detalle`
--
ALTER TABLE `mensajeria_detalle`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`cod_reseñas`),
  ADD KEY `cod_producto` (`cod_producto`),
  ADD KEY `correo_electronico` (`correo_electronico`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`cod_supp`),
  ADD KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  MODIFY `cod_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajeria`
--
ALTER TABLE `mensajeria`
  MODIFY `Cod_Mensajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mensajeria_detalle`
--
ALTER TABLE `mensajeria_detalle`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `cod_reseñas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `cod_supp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`cod_producto`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`correo_electronico`) REFERENCES `clientes` (`correo_electronico`);

--
-- Filtros para la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD CONSTRAINT `detalle_pago_ibfk_1` FOREIGN KEY (`correo_electronio`) REFERENCES `clientes` (`correo_electronico`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`correo_electronico`) REFERENCES `clientes` (`correo_electronico`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`correo_electronico`) REFERENCES `clientes` (`correo_electronico`),
  ADD CONSTRAINT `reseñas_ibfk_3` FOREIGN KEY (`cod_producto`) REFERENCES `producto` (`cod_producto`);

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `soporte_ibfk_1` FOREIGN KEY (`correo_electronico`) REFERENCES `clientes` (`correo_electronico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
