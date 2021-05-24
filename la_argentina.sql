-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2021 a las 18:04:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

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
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `cart_qty`, `cart_stock_id`, `user_id`, `cart_uniqid`) VALUES
(121, 5, 1, 36, 1, '6082ad5ec59a0');

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
(5, 'Fideos', 50, 70, 21, NULL, '495859594', 1),
(6, 'Shampoo', 40, 60, 10, NULL, '482928384', 1),
(7, 'Jabon', 20, 53.5, 10.5, NULL, '9876454', 1),
(8, 'Arroz', 20.5, 25.9, 10.5, NULL, '948475758', 2),
(9, 'Yerba', 300, 350, 21, NULL, '8748484585', 2),
(10, 'Detergente', 300, 333, 21, NULL, '583833994', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `estado` varchar(4) NOT NULL,
  `categoria_iva` varchar(40) NOT NULL,
  `cuit` varchar(40) NOT NULL,
  `cbu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `razon_social`, `domicilio`, `localidad`, `provincia`, `telefono`, `email`, `fecha_alta`, `estado`, `categoria_iva`, `cuit`, `cbu`) VALUES
(1, 'PRUEBA', 'SAN MARTIN 444', 'BARADERO', 'BUENOS AIRES', '549838384', 'KKLKL', '2021-04-15 16:55:43', 'ALTA', 'MONOTRIBUTO', '5555', '6666'),
(2, 'PRUEBA 2', 'MITRE 444', 'Baradero', 'BUENOS AIRES', '03329307996', 'mail@mail.com', '2021-04-15 16:57:33', 'BAJA', 'MONOTRIBUTO', '8495959686', '383949595'),
(4, 'prueba 3', 'algun lugar 1928', 'baradero', 'buenos aires', '8575843', 'Mail@mail.com', '2021-04-12 15:07:03', 'Alta', 'Monotributo', '293848595', '383747458585'),
(5, 'prueba 4', 'algun lugar 2982', 'baradero', 'buenos aires', '49595966', 'Mail@mail.com', '2021-04-12 15:14:12', 'Alta', 'Monotributo', '78474955', '89394945'),
(6, 'prueba 4', 'algun lugar 1928', 'baradero', 'buenos aires', '8575843', 'Mail@mail.com', '2021-04-12 15:15:05', 'Alta', 'Monotributo', '293848595', '383747458585'),
(7, 'prueba 5', 'otra', 'baradero', 'buenos aires', '836039394', 'Mail@mail.com', '2021-04-15 16:58:05', 'Alta', 'Monotributo', '938484432', '29848485'),
(8, 'prueba 6', 'cualquiera', 'baradero', 'buenos aires', '34848505', 'Alguno@mail.com', '2021-04-19 15:57:31', 'Alta', 'Monotributo', '38948405', '38384949');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) CHARACTER SET latin1 NOT NULL,
  `generic_name` varchar(35) CHARACTER SET latin1 NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `qty`, `price`, `date_sold`) VALUES
(12, '9876454', 'Jabon', 1, 53.5, '2021-04-23 21:48:23');

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
(24, 8, 50, 20, 50, '2021-04-24 23:00:05', '2021-04-22'),
(25, 10, 50, 30, 50, '2021-04-24 23:00:07', '2021-04-22'),
(36, 5, 44, 40, 60, '2021-04-25 03:36:42', '2021-04-21'),
(38, 9, 50, 40, 50, '2021-04-23 22:47:15', '2021-04-22');

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
-- Indices de la tabla `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_type_id` (`item_type_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
