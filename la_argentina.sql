-- phpMyAdmin SQL Dump
-- version 5.1.0-3.fc32
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-05-2021 a las 00:23:35
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_argentina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_precio` float NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_carnes`
--

CREATE TABLE `categoria_carnes` (
  `categoria_id` int(11) NOT NULL,
  `categoria_desc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_carnes`
--

INSERT INTO `categoria_carnes` (`categoria_id`, `categoria_desc`) VALUES
(1, 'Carne vacuna'),
(2, 'Carne cerdo'),
(3, 'Carne pollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_proveedores`
--

CREATE TABLE `compra_proveedores` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty_compra` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `fecha_compra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra_proveedores`
--

INSERT INTO `compra_proveedores` (`id_compra`, `id_proveedor`, `id_item`, `qty_compra`, `id_type`, `fecha_compra`) VALUES
(1, 1, 8, 50, 1, '2021-04-29'),
(2, 8, 8, 50, NULL, '2021-04-30'),
(3, 8, 8, 50, NULL, '2021-04-30'),
(4, 4, 9, 30, NULL, '2021-04-30'),
(5, 7, 6, 20, NULL, '2021-04-30'),
(6, 6, 10, 60, NULL, '2021-04-29'),
(7, 2, 10, 30, NULL, '2021-04-30'),
(8, 1, 25, 50, NULL, '2021-04-30'),
(9, 6, 5, 10, NULL, '2021-04-23'),
(10, 1, 12, 50, NULL, '2021-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) CHARACTER SET latin1 NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_itemMin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `purchase` double NOT NULL,
  `item_price` double NOT NULL,
  `item_iva` float NOT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `item_code` varchar(35) CHARACTER SET latin1 NOT NULL,
  `item_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `purchase`, `item_price`, `item_iva`, `item_type_id`, `item_code`, `item_supplier_id`) VALUES
(5, 'Carne Vacuna', 0, 0, 0, NULL, '001', 2),
(6, 'Carne Cerdo', 0, 0, 0, NULL, '002', 4),
(7, 'Carne Pollo', 0, 0, 0, NULL, '003', 5),
(8, 'Yerba Marolio', 240, 285, 21, NULL, '938482', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Almacen'),
(2, 'Carne');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL,
  `razon_social` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cuit` varchar(40) NOT NULL,
  `cbu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `razon_social`, `domicilio`, `localidad`, `provincia`, `telefono`, `email`, `fecha_alta`, `cuit`, `cbu`) VALUES
(1, 'PRUEBA', 'SAN MARTIN 444', 'BARADERO', 'BUENOS AIRES', '549838384', 'KKLKL', '2021-04-29 02:06:34', '5555', '7777'),
(2, 'PRUEBA 2', 'MITRE 444', 'Baradero', 'BUENOS AIRES', '03329307996', 'mail@mail.com', '2021-04-15 16:57:33', '8495959686', '383949595'),
(4, 'prueba 3', 'algun lugar 1928', 'baradero', 'buenos aires', '8575843', 'Mail@mail.com', '2021-04-12 15:07:03', '293848595', '383747458585'),
(5, 'prueba 4', 'algun lugar 2982', 'baradero', 'buenos aires', '49595966', 'Mail@mail.com', '2021-04-12 15:14:12', '78474955', '89394945'),
(6, 'prueba 4', 'algun lugar 1928', 'baradero', 'buenos aires', '8575843', 'Mail@mail.com', '2021-04-12 15:15:05', '293848595', '383747458585'),
(7, 'prueba 5', 'otra', 'baradero', 'buenos aires', '836039394', 'Mail@mail.com', '2021-04-15 16:58:05', '938484432', '29848485'),
(8, 'prueba 6', 'cualquiera', 'baradero', 'buenos aires', '34848505', 'Alguno@mail.com', '2021-04-19 15:57:31', '38948405', '38384949'),
(9, 'proveedor 7', 'actualizada', 'baradero', 'buenos aires', '84748595', 'Alguno@mail.com', '2021-05-03 00:31:51', '849958585', '848484'),
(10, 'proveedor 8', 'cualquiera', 'baradero', 'buenos aires', '3435464646', 'Alguno@mail.com', '2021-05-03 00:40:56', '343435464', '343434');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) CHARACTER SET latin1 NOT NULL,
  `item_id` int(11) NOT NULL,
  `generic_name` varchar(35) CHARACTER SET latin1 NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `item_id`, `generic_name`, `qty`, `price`, `date_sold`) VALUES
(23, '948475758', 8, 'Arroz', 2, 25.9, '2021-04-27 21:35:35'),
(24, '8748484585', 9, 'Yerba', 2, 350, '2021-04-27 21:35:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `stock_max` int(11) NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_min`, `stock_max`, `stock_added`, `stock_purchased`) VALUES
(42, 8, 50, 30, 50, '2021-05-23 23:55:55', '2021-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_carne`
--

CREATE TABLE `stock_carne` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `costo` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_carne`
--

INSERT INTO `stock_carne` (`stock_id`, `item_id`, `proveedor_id`, `costo`) VALUES
(9, 5, 2, 0),
(10, 6, 4, -6000),
(11, 7, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_carne_detalle`
--

CREATE TABLE `stock_carne_detalle` (
  `detalle_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `costo` float NOT NULL,
  `stock_purchased` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_carne_detalle`
--

INSERT INTO `stock_carne_detalle` (`detalle_id`, `stock_id`, `item_id`, `item_code`, `proveedor_id`, `stock_qty`, `costo`, `stock_purchased`) VALUES
(14, 10, 6, '002', 4, 600, -6000, '2021-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user_pass` varchar(35) CHARACTER SET latin1 NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_pass`, `user_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `categoria_carnes`
--
ALTER TABLE `categoria_carnes`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `compra_proveedores`
--
ALTER TABLE `compra_proveedores`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indices de la tabla `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `stock_carne`
--
ALTER TABLE `stock_carne`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `stock_carne_detalle`
--
ALTER TABLE `stock_carne_detalle`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT de la tabla `categoria_carnes`
--
ALTER TABLE `categoria_carnes`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compra_proveedores`
--
ALTER TABLE `compra_proveedores`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `stock_carne`
--
ALTER TABLE `stock_carne`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `stock_carne_detalle`
--
ALTER TABLE `stock_carne_detalle`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
