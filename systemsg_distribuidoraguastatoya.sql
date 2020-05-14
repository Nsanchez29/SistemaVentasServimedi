-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-12-2019 a las 05:58:59
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systemsg_distribuidoraguastatoya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id`, `categoria`, `fecha`) VALUES
(1, 'Lubricantes y refrigerantes', '2019-10-16 21:19:47'),
(2, 'Productos de limpieza', '2019-10-16 21:20:21'),
(3, 'Candelas', '2019-10-16 21:23:42'),
(4, 'Neumáticos', '2019-10-16 21:23:57'),
(5, 'Fajas', '2019-10-16 22:09:52'),
(6, 'Filtros', '2019-10-16 23:48:49'),
(7, 'Ambientales', '2019-12-01 03:38:47'),
(8, 'Servicios', '2019-11-19 01:31:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `nit` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `nombre`, `nit`, `email`, `telefono`, `direccion`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'Luis Villeda', '541606-k', 'luis@gmail.com', '5264 8945', 'Ciudad', 50, '2019-10-31 10:17:17', '2019-10-31 16:17:17'),
(2, 'Francisco Ramírez', '2749273-7', 'francisco@gmail.com', '5487 9787', 'Ciudad', 3, '2019-10-17 00:46:22', '2019-10-17 06:46:22'),
(3, 'Consumidor Final', 'C/F', 'n_a@correo.com', '0000 0000', 'Ciudad', 17, '2019-11-30 00:59:22', '2019-11-30 06:59:22'),
(4, 'Olga Girón', '290058-0', 'n_a@correo.com', '2489 6526', 'Ciudad', 10, '2019-10-30 11:15:50', '2019-11-18 01:17:44'),
(5, 'Daniel Ortega', '1231992-9', 'daniel@correo.com', '5789 6512', 'Ciudad', 3, '2019-10-30 01:46:25', '2019-10-30 07:46:25'),
(6, 'David Méndez', '123456-0', 'david@correo.com', '5478 5214', 'Ciudad', 19, '2019-11-30 01:16:09', '2019-11-30 07:16:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`id`, `nombre`, `celular`, `telefono`, `email`, `direccion`, `whatsapp`) VALUES
(1, 'José Ordoñez', '5460 2944', '7945 2273', 'jose@gmail.com', 'Guastatoya', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`id`, `id_categoria`, `id_proveedor`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '1', '101', 'Aceite Kendall 10w30', 'vistas/img/productos/101/137.jpg', 20, 18, 30, 45, '2019-11-30 06:47:01'),
(2, 3, '3', '301', 'Candela NGK', 'vistas/img/productos/301/360.jpg', 12, 15, 20, 23, '2019-10-31 16:18:11'),
(3, 5, '5', '501', 'Faja de tiempo', 'vistas/img/productos/501/761.jpg', 20, 140, 250, 11, '2019-11-30 07:41:04'),
(4, 4, '5', '401', 'Llanta Michellin R16', 'vistas/img/productos/401/842.jpg', 20, 180, 240, 11, '2019-11-30 07:41:18'),
(5, 2, '4', '201', 'Silicón Ebullient', 'vistas/img/productos/201/415.jpg', 17, 18, 34, 19, '2019-11-30 07:16:09'),
(6, 6, '4', '601', 'Filtro de aire Bosch', 'vistas/img/productos/601/580.jpg', 10, 80, 100, 5, '2019-11-18 00:17:51'),
(7, 1, '3', '102', 'Refrigerante Ebullient', 'vistas/img/productos/102/508.jpg', 25, 25, 35, 22, '2019-11-18 01:26:37'),
(8, 7, '3', '701', 'Ambiental Glade', 'vistas/img/productos/701/336.jpg', 15, 15, 36, 0, '2019-12-01 03:41:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono_proveedor` varchar(100) NOT NULL,
  `email_proveedor` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `telefono_empresa` varchar(100) NOT NULL,
  `email_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`id`, `descripcion`, `nombre`, `telefono_proveedor`, `email_proveedor`, `empresa`, `telefono_empresa`, `email_empresa`, `direccion_empresa`) VALUES
(1, 'Lubricantes y refrigerantes', 'Kevin Gonzalez', '5783 6545', 'kevin@gmail.com', 'Kendall', '7942 5894', 'kendall@gmail.com', 'Teculután'),
(2, 'Candelas', 'Daniel Arroyo', '5584 5551', 'daniel@gmail.com', 'NGK', '2489 6157', 'ngk@gmail.com', 'Guatemala'),
(3, 'Ambientales', 'Oscar Calderón', '5699 8977', 'oscar@gmail.com', 'Empornac', '7942 5894', 'kendall@gmail.com', 'Izabal'),
(4, 'Neumáticos', 'Jorge Díaz', '5879 6321', 'jorge@gmail.com', 'Michellin', '7948 7545', 'michellin@gmail.com', 'Puerto Barrios'),
(5, 'Filtros', 'Juan Borrayo', '3245 8947', 'juan@gmail.com', 'Bosch', '7945 8621', 'bosch@gmail.com', 'Guastatoya'),
(6, 'Candelas', 'David Zuleta', '4898 7451', 'david@gmail.com', 'Ebullient', '2486 4557', 'ebullient@gmail.com', 'Guatemala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(84, 'Administrador', 'admin', '$6$rounds=5000$pablogiron$gdN4u2PP10VlQhB2VPCbKt/DB9rqyIUk8aHlmCaV91erm5veoVMxOtnqoTf7o80VgiZ0Shs5YFJUyHStRmtQY1', 'Administrador', 'vistas/img/usuarios/admin/555.png', 1, '2019-12-01 00:22:44', '2019-12-01 06:22:44'),
(85, 'Vendedor', 'vendedor', '$6$rounds=5000$pablogiron$D4re8TYCIS.TdO8kR6DLu8KFKi3rNehcz/2P5Clstb5Y3GN7ahGTuYGfuMymtjBjUp4X14NRjXJoGLKmSV9T/0', 'Vendedor', 'vistas/img/usuarios/vendedor/584.png', 1, '2019-11-30 20:36:45', '2019-12-01 02:36:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_venta`
--

CREATE TABLE `tbl_venta` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `descuento` float NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_venta`
--

INSERT INTO `tbl_venta` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `descuento`, `subtotal`, `total`, `metodo_pago`, `fecha`) VALUES
(1, 10001, 1, 84, '[{\"id\":\"2\",\"descripcion\":\"Candela NGK\",\"cantidad\":\"6\",\"stock\":\"19\",\"precio\":\"20\",\"total\":\"120\"},{\"id\":\"1\",\"descripcion\":\"Aceite Kendall 10w30\",\"cantidad\":\"4\",\"stock\":\"52\",\"precio\":\"30\",\"total\":\"120\"}]', 0, 240, 240, 'Efectivo', '2018-12-01 02:45:21'),
(2, 10002, 2, 85, '[{\"id\":\"3\",\"descripcion\":\"Faja de tiempo\",\"cantidad\":\"4\",\"stock\":\"10\",\"precio\":\"250\",\"total\":\"1000\"},{\"id\":\"2\",\"descripcion\":\"Candela NGK\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"20\",\"total\":\"20\"}]', 0, 1020, 1020, 'Efectivo', '2018-12-31 02:45:45'),
(3, 10003, 3, 84, '[{\"id\":\"1\",\"descripcion\":\"Aceite Kendall 10w30\",\"cantidad\":\"15\",\"stock\":\"37\",\"precio\":\"30\",\"total\":\"450\"}]', -67.5, 450, 382.5, 'Efectivo', '2019-01-31 02:45:57'),
(4, 10004, 3, 85, '[{\"id\":\"1\",\"descripcion\":\"Aceite Kendall 10w30\",\"cantidad\":\"4\",\"stock\":\"33\",\"precio\":\"30\",\"total\":\"120\"}]', 0, 120, 120, 'Efectivo', '2019-03-01 02:46:01'),
(5, 10005, 2, 84, '[{\"id\":\"7\",\"descripcion\":\"Refrigerante Ebullient\",\"cantidad\":\"1\",\"stock\":\"24\",\"precio\":\"35\",\"total\":\"35\"},{\"id\":\"4\",\"descripcion\":\"Llanta Michellin R16\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"240\",\"total\":\"240\"},{\"id\":\"2\",\"descripcion\":\"Candela NGK\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"20\",\"total\":\"20\"}]', 0, 295, 295, 'CQ-321322311', '2019-03-31 02:46:05'),
(6, 10006, 5, 85, '[{\"id\":\"3\",\"descripcion\":\"Faja de tiempo\",\"cantidad\":\"3\",\"stock\":\"9\",\"precio\":\"250\",\"total\":\"750\"}]', 0, 750, 750, 'Efectivo', '2019-05-01 02:46:07'),
(7, 10007, 3, 85, '[{\"id\":\"1\",\"descripcion\":\"Aceite Kendall 10w30\",\"cantidad\":\"12\",\"stock\":\"21\",\"precio\":\"30\",\"total\":\"360\"}]', 0, 360, 360, 'CQ-456789123', '2019-05-31 02:46:17'),
(8, 10008, 4, 85, '[{\"id\":\"5\",\"descripcion\":\"Silicón Ebullient\",\"cantidad\":\"10\",\"stock\":\"4\",\"precio\":\"34\",\"total\":\"340\"}]', 0, 340, 340, 'CQ-456123963', '2019-07-01 02:46:20'),
(9, 10009, 6, 84, '[{\"id\":\"4\",\"descripcion\":\"Llanta Michellin R16\",\"cantidad\":\"4\",\"stock\":\"12\",\"precio\":\"240\",\"total\":\"960\"}]', 0, 960, 960, 'Efectivo', '2019-07-31 02:46:10'),
(10, 10010, 1, 84, '[{\"id\":\"1\",\"descripcion\":\"Aceite Kendall 10w30\",\"cantidad\":\"10\",\"stock\":\"11\",\"precio\":\"30\",\"total\":\"300\"},{\"id\":\"2\",\"descripcion\":\"Candela NGK\",\"cantidad\":\"15\",\"stock\":\"2\",\"precio\":\"20\",\"total\":\"300\"},{\"id\":\"7\",\"descripcion\":\"Refrigerante Ebullient\",\"cantidad\":\"20\",\"stock\":\"4\",\"precio\":\"35\",\"total\":\"700\"},{\"id\":\"6\",\"descripcion\":\"Filtro de aire Bosch\",\"cantidad\":\"5\",\"stock\":\"10\",\"precio\":\"100\",\"total\":\"500\"}]', 0, 1800, 1800, 'Efectivo', '2019-08-31 02:46:29'),
(11, 10011, 6, 85, '[{\"id\":\"7\",\"descripcion\":\"Refrigerante Ebullient\",\"cantidad\":\"1\",\"stock\":\"25\",\"precio\":\"35\",\"total\":\"35\"},{\"id\":\"5\",\"descripcion\":\"Silicón Ebullient\",\"cantidad\":\"1\",\"stock\":\"25\",\"precio\":\"34\",\"total\":\"34\"}]', 0, 69, 69, 'Efectivo', '2019-10-01 02:46:36'),
(12, 10012, 6, 85, '[{\"id\":\"3\",\"descripcion\":\"Faja de tiempo\",\"cantidad\":\"4\",\"stock\":\"15\",\"precio\":\"250\",\"total\":\"1000\"},{\"id\":\"5\",\"descripcion\":\"Silicón Ebullient\",\"cantidad\":\"3\",\"stock\":\"22\",\"precio\":\"34\",\"total\":\"102\"}]', -55.1, 1102, 1046.9, 'Efectivo', '2019-10-31 02:46:14'),
(13, 10013, 3, 85, '[{\"id\":\"4\",\"descripcion\":\"Llanta Michellin R16\",\"cantidad\":\"5\",\"stock\":\"15\",\"precio\":\"240\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2019-12-01 02:46:23'),
(14, 10014, 6, 84, '[{\"id\":\"4\",\"descripcion\":\"Llanta Michellin R16\",\"cantidad\":\"1\",\"stock\":\"24\",\"precio\":\"240\",\"total\":\"240\"},{\"id\":\"5\",\"descripcion\":\"Silicón Ebullient\",\"cantidad\":\"5\",\"stock\":\"17\",\"precio\":\"34\",\"total\":\"170\"}]', 0, 410, 410, 'CQ-545414554', '2019-12-01 02:46:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
