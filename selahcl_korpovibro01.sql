-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2018 a las 17:01:05
-- Versión del servidor: 5.6.39-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `selahcl_korpovibro01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_documentos_emision`
--

CREATE TABLE `app_documentos_emision` (
  `id` int(11) NOT NULL,
  `poliza_emision` varchar(45) NOT NULL,
  `cotizacion_emision` varchar(45) NOT NULL,
  `oferta_cotizacion` varchar(45) NOT NULL,
  `emision_cotizacion` varchar(45) NOT NULL,
  `tipo_documento` varchar(45) NOT NULL,
  `url` text NOT NULL,
  `fecha_documento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `app_documentos_emision`
--

INSERT INTO `app_documentos_emision` (`id`, `poliza_emision`, `cotizacion_emision`, `oferta_cotizacion`, `emision_cotizacion`, `tipo_documento`, `url`, `fecha_documento`) VALUES
(1, '798798789', '798789', '9879', '7987', '7897', 'https://estoyseguro.cl/pdf/emision/facturas/factura_poliza_798798789jpeg', '2018-10-02'),
(2, '43erdfgf', '456654564', '12323', 'wqwqw', 'factura111', 'https://estoyseguro.cl/imagenes/factura_poliza_43erdfgfjpeg', '2018-10-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_instructor`
--

CREATE TABLE `clase_instructor` (
  `id` int(11) NOT NULL,
  `nombre_clase` int(11) NOT NULL,
  `nombre_instructor` int(11) NOT NULL,
  `lugar_clase_instructor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `id_contac` int(11) NOT NULL,
  `nombre_contac` varchar(255) NOT NULL,
  `email_contac` varchar(255) NOT NULL,
  `fono_contac` int(11) NOT NULL,
  `tipo_contac` varchar(255) NOT NULL,
  `mensaje_contac` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`id_contac`, `nombre_contac`, `email_contac`, `fono_contac`, `tipo_contac`, `mensaje_contac`) VALUES
(1, 'claudio', 'klaudio.zfr@gmail.com', 2147483647, 'Instructor', 'adfasdasdaddada'),
(2, 'pato', 'patocarlos', 939393939, 'Alumno', 'holi'),
(3, 'hola', 'oddood@fofo.cl', 2147483647, 'Alumno', 'erufjdnucfjnd'),
(4, 'claudio', 'cl', 0, 'Alumno', 'que ase'),
(5, 'claudio', 'patricio.toro@conosurseguros.cl', 34567543, 'Alumno', 'hola'),
(6, 'clccl', 'patricio.toro@conosurseguros.cl', 67890, 'Alumno', 'ghjk'),
(7, 'pato', 'patricio.toro@conosurseguros.cl', 3776543, 'Instructor', 'gogogo'),
(8, 'claudio', 'patricio.toro@conosurseguros.cl', 367654, 'Alumno', 'hola que ase'),
(9, 'clcl', 'patricio.toro@conosurseguros.cl', 567654, 'Alumno', 'fgfjfjhfjf'),
(10, 'hgfds', 'patricio.toro@conosurseguros.cl', 0, 'Alumno', 'ghjkl'),
(11, 'claudio', 'patricio.toro@conosurseguros.cl', 2147483647, 'Alumno', 'm,l.'),
(12, 'claif', 'patricio.toro@conosurseguros.cl', 7654, 'Alumno', 'pene'),
(13, 'gkgkgk', 'patricio.toro@conosurseguros.cl', 65784930, 'Alumno', 'gfdfd'),
(14, 'pene', 'patricio.toro@conosurseguros.cl', 2147483647, 'Alumno', 'gfdhfh'),
(15, 'kaka', 'pene', 8765567, 'Alumno', 'ddjdjdhd'),
(16, 'claudio navarrete', 'claudio.marcelo511@gmail.com', 2147483647, 'Alumno', 'chupalo'),
(17, 'cynthia gonzalez', 'cgonzalez2302@gmail.com', 975256971, 'Instructor', 'holi'),
(18, 'claudio Navarrete', 'claudio.marcelo511@gmail.com', 1312312, 'Instructor', 'adasdsadsadsadsa'),
(19, 'patricio', 'patricio.toro@conosurseguros.cl', 7987987, 'Alumno', 'pene'),
(20, 'asas', 'patricio.toro@conosurseguros.cl', 897987498, 'Alumno', '465465'),
(21, 'uyhui', 'claudio.navarrete@conosurseguros.cl', 4654564, 'Instructor', 'sadsadsa'),
(22, 'ssadasds', 'claudio.marcelo511@gmail.com', 89465456, 'Instructor', 'dasdasd'),
(23, 'pene', 'patricio.toro@conosurseguros.cl', 9212214, 'Instructor', 'pene para ti'),
(24, 'asdsadas', 'claudio.marcelo511@gmail.com', 123213, 'Instructor', 'adasdsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas`
--

CREATE TABLE `coordenadas` (
  `id` int(11) NOT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longitud` float(10,6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coordenadas`
--

INSERT INTO `coordenadas` (`id`, `latitud`, `longitud`) VALUES
(1, 23.000000, 23.000000),
(2, 23.119930, 0.000000),
(3, 23.119930, -70.879326),
(4, 23.119930, -70.879326),
(5, 2121212.000000, 32323.000000),
(6, 2121212.000000, 32323.000000),
(7, 0.000000, 0.000000),
(8, 0.000000, 0.000000),
(9, 0.000000, 0.000000),
(10, 0.000000, 0.000000),
(11, -33.407089, -70.747841),
(12, -33.434509, -70.770805),
(13, -33.434509, -70.770805),
(14, -33.282711, -70.879326),
(15, -33.282711, -70.879326),
(16, 52.133213, -106.670044),
(17, 52.133213, -106.670044),
(18, -34.603683, -58.381557),
(19, -33.431446, -70.609329),
(20, -25.274399, 133.775131),
(21, 10.781682, 106.663445),
(22, 0.000000, 0.000000),
(23, 0.000000, 0.000000),
(24, -33.397209, -70.642815),
(25, -33.384689, -70.680023),
(26, -33.384689, -70.680023),
(27, 0.000000, 0.000000),
(28, 0.000000, 0.000000),
(29, 0.000000, 0.000000),
(30, -33.282711, -70.879326),
(31, -33.282711, -70.879326),
(32, -33.282711, -70.879326),
(33, -33.282711, -70.879326),
(34, -33.282711, -70.879326),
(35, -33.282711, -70.879326),
(36, -33.282711, -70.879326),
(37, -33.282711, -70.879326),
(38, -33.282711, -70.879326),
(39, -33.282711, -70.879326),
(40, -33.282711, -70.879326),
(41, -33.282711, -70.879326),
(42, -33.282711, -70.879326),
(43, -33.282711, -70.879326),
(44, -33.282711, -70.879326),
(45, -33.282711, -70.879326),
(46, -33.397209, -70.642815),
(47, -33.282711, -70.879326),
(48, -33.282711, -70.879326),
(49, -33.288219, -70.869026),
(50, -33.282707, -70.879326),
(51, -33.282707, -70.879326),
(52, -33.282707, -70.879326),
(53, -33.282707, -70.879326),
(54, -33.284760, -70.881798),
(55, -33.403698, -70.757256),
(56, -33.618607, -70.590607),
(57, -33.586380, -70.550133),
(58, -33.284760, -70.881798),
(59, -33.405865, -70.681740),
(60, -33.448891, -70.669266),
(61, -33.423176, -70.622383),
(62, -33.405865, -70.681740),
(63, -33.405865, -70.681740),
(64, -33.375614, -70.716660),
(65, -33.397793, -70.760178),
(66, -33.438492, -70.645584),
(67, -33.405865, -70.681740),
(68, -33.400452, -70.693787),
(69, -33.416039, -70.611961),
(70, -33.397209, -70.642815),
(71, -33.284760, -70.881798),
(72, 0.000000, 0.000000),
(73, 0.000000, 0.000000),
(74, 0.000000, 0.000000),
(75, 0.000000, 0.000000),
(76, 0.000000, 0.000000),
(77, 0.000000, 0.000000),
(78, -33.284760, -70.881798),
(79, -33.526802, -70.529922),
(80, -33.405865, -70.681740),
(81, -33.398979, -70.557312),
(82, -33.437843, -70.650482),
(83, -33.437843, -70.650482),
(84, -33.437843, -70.650482),
(85, 37.590836, -5.731957),
(86, -33.618607, -70.590607),
(87, -33.423157, -70.622375),
(88, -33.400452, -70.693787),
(89, -33.400452, -70.693787),
(90, -33.423611, -70.641235),
(91, -33.405865, -70.681740),
(92, -33.405865, -70.681740),
(93, -33.405865, -70.681740),
(94, -33.405865, -70.681740),
(95, -33.416039, -70.611961),
(96, -33.284840, -70.881241),
(97, -33.405865, -70.681740),
(98, -33.416039, -70.611961),
(99, -33.405865, -70.681740),
(100, -33.416039, -70.611961),
(101, -33.437843, -70.650482),
(102, -33.439240, -70.659767),
(103, -33.611839, -70.519051),
(104, -33.437313, -70.633286),
(105, -33.405865, -70.681740),
(106, -33.405865, -70.681740),
(107, -33.405865, -70.681740),
(108, -33.437832, -70.650452),
(109, -33.405758, -70.681831),
(110, -33.406361, -70.727997),
(111, -33.406361, -70.727997),
(112, -33.406361, -70.727997),
(113, -33.405758, -70.681831),
(114, -33.405758, -70.681831),
(115, -33.406361, -70.727997),
(116, -33.406361, -70.727997),
(117, -33.437843, -70.650482),
(118, -33.398979, -70.557312),
(119, -33.398979, -70.557312),
(120, -33.437843, -70.650482),
(121, -33.437843, -70.650482),
(122, -33.403763, -70.757042),
(123, -33.406097, -70.680016),
(124, -33.437843, -70.650482),
(125, -33.366417, -70.694275),
(126, -33.398979, -70.557312),
(127, -33.405758, -70.681831),
(128, -33.397209, -70.642815),
(129, -33.442112, -70.764061),
(130, -33.397209, -70.642815),
(131, -33.403763, -70.757042),
(132, -33.417755, -70.604836),
(133, -33.437263, -70.633247);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `markers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `lat` int(255) NOT NULL,
  `lng` int(50) NOT NULL,
  `type` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Celke - Matriz', '5550 Avenida Republica Argentina, Curitiba', -25, -49, 0),
(2, 'Celke - Filial 1', '1610 Av. Carlos Gomes, Porto Alegre', -30, -51, 0),
(3, 'Celke - Filial 2', '575 Avenida Paulista, SÃ£o Paulo', -24, -47, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercado_pago`
--

CREATE TABLE `mercado_pago` (
  `mercado_pago_id` int(11) NOT NULL,
  `mercado_pago_token` varchar(25) NOT NULL,
  `mercado_pago_transaccion` varchar(20) NOT NULL,
  `mercado_pago_producto` int(11) NOT NULL,
  `mercado_pago_cotizacion` varchar(25) NOT NULL,
  `mercado_pago_monto` varchar(15) NOT NULL,
  `mercado_pago_estado` varchar(25) NOT NULL,
  `mercado_pago_fecha` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mercado_pago`
--

INSERT INTO `mercado_pago` (`mercado_pago_id`, `mercado_pago_token`, `mercado_pago_transaccion`, `mercado_pago_producto`, `mercado_pago_cotizacion`, `mercado_pago_monto`, `mercado_pago_estado`, `mercado_pago_fecha`) VALUES
(0, '1104', '1104', 0, '', '', 'pendiente', '19-11-2018 15:33:00'),
(0, '11', '11', 0, '', '', 'pendiente', '23-11-2018 19:20:28'),
(0, '11', '11', 0, '', '', 'pendiente', '23-11-2018 19:22:09'),
(0, '1111', '1111', 0, '', '', 'pendiente', '07-12-2018 18:07:32'),
(0, '1111', '1111', 0, '', '', 'pendiente', '07-12-2018 18:07:46'),
(0, '1107', '1107', 0, '', '', 'pendiente', '09-12-2018 17:06:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `misclases_alumnos`
--

CREATE TABLE `misclases_alumnos` (
  `id` int(11) NOT NULL,
  `nombre_de_la_clase` varchar(255) NOT NULL,
  `hora_inicio_de_la_clase` datetime NOT NULL,
  `hora_fin_de_la_clase` datetime NOT NULL,
  `direccion_clase` varchar(255) NOT NULL,
  `tipo_de_clase` varchar(255) NOT NULL,
  `id_alumno_clase` int(11) NOT NULL,
  `id_instructor_de_la_clase` int(11) NOT NULL,
  `id_de_la_clase` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `misclases_alumnos`
--

INSERT INTO `misclases_alumnos` (`id`, `nombre_de_la_clase`, `hora_inicio_de_la_clase`, `hora_fin_de_la_clase`, `direccion_clase`, `tipo_de_clase`, `id_alumno_clase`, `id_instructor_de_la_clase`, `id_de_la_clase`, `estado`) VALUES
(68, 'prueba69', '2018-11-30 19:00:00', '2018-11-30 20:00:00', 'Plaza de Armas, Santiago, Chile', '1', 2, 1, 91, 'eliminada'),
(65, 'prueba69', '2018-11-29 19:00:00', '2018-11-10 20:00:00', 'Plaza de Armas, Santiago, Chile', '1', 2, 1, 91, 'eliminada'),
(57, 'zumbaprueba1', '2018-09-11 21:00:00', '2018-09-11 23:45:00', 'Renca, Chile', '1', 59, 58, 84, ''),
(54, 'zumba inacap', '2018-07-10 22:00:00', '2018-07-10 23:00:00', 'Bravo de Saravia, Renca, Chile', '1', 72, 1, 83, 'eliminada'),
(67, 'prueba69', '2018-11-29 19:00:00', '2018-11-10 20:00:00', 'Plaza de Armas, Santiago, Chile', '1', 2, 1, 91, 'eliminada'),
(66, 'prueba69', '2018-11-10 19:00:00', '2018-11-10 20:00:00', 'Plaza de Armas, Santiago, Chile', '1', 2, 1, 91, 'eliminada'),
(69, 'prueba69', '2018-11-30 19:00:00', '2018-11-30 20:00:00', 'Plaza de Armas, Santiago, Chile', '1', 2, 1, 91, 'eliminada'),
(72, '12', '2018-11-16 23:05:00', '2018-11-17 01:05:00', 'Recoleta, Chile', '1', 2, 58, 102, ''),
(74, 'pruebas', '2018-11-23 23:30:00', '2018-11-24 19:30:00', 'Recoleta, Chile', '1', 104, 105, 104, ''),
(76, 'dasdsad', '2018-11-30 13:00:00', '2018-11-30 14:00:00', 'Pasarela Costanera Center Sur, Providencia, Chile', '1', 2, 1, 106, 'eliminada'),
(80, 'prueba 3/12', '2018-12-11 10:00:00', '2018-12-11 11:00:00', 'Baquedano, Providencia, Chile', '1', 2, 1, 107, 'eliminada'),
(81, 'prueba 3/12/18 aaq', '2018-12-11 10:00:00', '2018-12-11 11:00:00', 'Baquedano, Providencia, Chile', '1', 2, 1, 107, 'eliminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_suscrpcion`
--

CREATE TABLE `pago_suscrpcion` (
  `id` int(11) NOT NULL,
  `estado_pago` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago_suscrpcion`
--

INSERT INTO `pago_suscrpcion` (`id`, `estado_pago`) VALUES
(1, 'Pagado'),
(2, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_clase`
--

CREATE TABLE `registro_clase` (
  `id` int(11) NOT NULL,
  `nombre_clase_instructor` varchar(200) CHARACTER SET latin1 NOT NULL,
  `horar_clase_inicio` datetime NOT NULL,
  `hora_clase_fin` datetime NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_tipo_clases` int(11) DEFAULT NULL,
  `id_instructor_clase` int(11) DEFAULT NULL,
  `id_coordenadas` int(11) NOT NULL,
  `estado` varchar(445) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_clase`
--

INSERT INTO `registro_clase` (`id`, `nombre_clase_instructor`, `horar_clase_inicio`, `hora_clase_fin`, `direccion`, `id_tipo_clases`, `id_instructor_clase`, `id_coordenadas`, `estado`) VALUES
(93, 'adsdasdasdsd', '2018-10-16 21:00:00', '2018-10-16 22:00:00', 'Las Condes, Chile', 4, 1, 119, 'eliminada'),
(92, 'adsdasdasdsd', '2018-10-16 21:00:00', '2018-10-16 22:00:00', 'Las Condes, Chile', 4, 1, 118, 'eliminada'),
(91, 'prueba69', '2018-11-30 19:00:00', '2018-11-30 20:00:00', 'Plaza de Armas, Santiago, Chile', 1, 1, 117, 'eliminada'),
(102, '12', '2018-11-16 23:05:00', '2018-11-17 01:05:00', 'Recoleta, Chile', 1, 58, 128, ''),
(101, 'hola', '2018-11-12 19:45:00', '2018-11-12 22:00:00', 'Bravo de Saravia, Renca, Chile', 4, 58, 127, ''),
(87, 'prueba', '2018-10-17 17:00:00', '2018-10-17 12:00:00', 'Bravo de Saravia, Renca, Chile', 5, 1, 113, 'eliminada'),
(86, 'zumbaprueba', '2018-09-11 21:00:00', '2018-09-11 23:45:00', 'Renca, Chile', 1, 58, 112, 'eliminada'),
(85, 'zumbaprueba', '2018-09-11 21:00:00', '2018-09-11 23:45:00', 'Renca, Chile', 1, 58, 111, 'eliminada'),
(84, 'zumbaprueba1', '2018-09-11 21:00:00', '2018-09-11 23:45:00', 'Renca, Chile', 1, 58, 110, 'eliminada'),
(88, 'prueba', '2018-10-17 11:00:00', '2018-10-17 12:00:00', 'Bravo de Saravia, Renca, Chile', 5, 1, 114, 'eliminada'),
(83, 'zumba inacap2', '2018-07-10 23:00:00', '2018-07-10 00:00:00', 'Bravo de Saravia, Renca, Chile', 1, 1, 109, 'eliminada'),
(82, 'ZUMBA SANTIAGO CENTRO', '2018-10-31 20:00:00', '2018-07-10 21:00:00', 'Santiago, Santiago Centro, Chile', 1, 1, 108, 'eliminada'),
(94, 'aaaa', '2018-10-31 19:00:00', '2018-10-31 20:00:00', 'Plaza de Armas, Santiago, Chile', 1, 1, 120, 'eliminada'),
(100, 'asdasdasd', '2018-11-15 14:50:00', '2018-11-15 15:50:00', 'Las Condes, Chile', 1, 1, 126, 'eliminada'),
(99, 'asdasd', '2018-11-12 15:55:00', '2018-11-14 10:05:00', 'Forestal, Conchalí, Chile', 1, 1, 125, 'eliminada'),
(98, 'PRUEBA123qaaaaaaasdsad1', '2018-11-30 13:00:00', '2018-11-30 14:00:00', 'Plaza de Armas, Santiago, Chile', 2, 1, 124, 'eliminada'),
(103, 'pruebaqlaaaaaba2', '2018-12-25 12:00:00', '2018-01-25 13:00:00', 'Pudahuel, Pudahuel, Chile', 1, 1, 129, 'eliminada'),
(104, 'pruebas', '2018-12-03 10:30:00', '2018-12-05 10:30:00', 'Recoleta, Chile', 1, 105, 130, ''),
(105, 'La hacienda', '2018-11-25 02:10:00', '2018-11-25 02:55:00', 'Los Rosales, Renca, Chile', 1, 106, 131, ''),
(106, 'dasdsadadasd', '2018-11-30 13:00:00', '2018-11-30 14:00:00', 'Pasarela Costanera Center Sur, Providencia, Chile', 1, 1, 132, 'eliminada'),
(107, 'prueba 3/12/18 aaqaaa', '2018-12-11 10:00:00', '2018-12-11 11:00:00', 'Baquedano, Providencia, Chile', 1, 1, 133, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_clases`
--

CREATE TABLE `tipo_clases` (
  `id` int(11) NOT NULL,
  `nombre_clases` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_clases`
--

INSERT INTO `tipo_clases` (`id`, `nombre_clases`) VALUES
(1, 'Zumba'),
(2, 'Zumba Step'),
(3, 'Zumba Kids'),
(5, 'Power Rumba'),
(6, 'Zumba in the Circuit'),
(4, 'Strong');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario`) VALUES
(1, 'INSTRUCTOR'),
(2, 'ALUMNO'),
(3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rut_usuario` varchar(200) NOT NULL,
  `username` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(200) NOT NULL,
  `olvido_pass_iden` varchar(255) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(200) NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `id_suscrip` int(11) NOT NULL,
  `estado_user` varchar(45) NOT NULL,
  `conteo_ingresos` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `temporal_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rut_usuario`, `username`, `password`, `password2`, `olvido_pass_iden`, `nombre`, `apellido`, `sexo`, `correo`, `direccion`, `telefono`, `id_tipo_usuario`, `foto`, `documento`, `id_suscrip`, `estado_user`, `conteo_ingresos`, `created_at`, `temporal_date`) VALUES
(1, '19.025.200-0', 'ClaudioN', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', 'f86a4c2c24f7761dd0afe3c7cf3b191bffcf3b35147e2ecdbc88796565466bd7515764206a3463ade182a62bd9c4070fa4db119194ca3a93b66adf563cf7b54a', 'Claudio Marcelo', 'Navarrete', 'masculino', 'claudio.marcelo511@gmail.com', 'Padre demetrio bravo,632', 123456789, 1, 'http://korpovibro.cl/imagenes/foto-perfil_yo.jpg', '', 1, 'Inactiva ', 10, '0000-00-00 00:00:00', '2018-12-30 00:00:00'),
(2, '', 'claudio', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', 'c97e2e87f83b90593318114bddb072d48780840d37b9c30fb4f028354ddeae6b9aab1cc53507df891ae79fe5d07cdbb14a78fc97adb06dc51bb503b7aaac55cd', 'Marcelo', 'Navarrete', 'masculino', 'klaudio.zfr@gmail.com', '', 123123, 2, 'http://korpovibro.cl/imagenes/foto-perfil_yo.jpg', '', 2, '', 0, '0000-00-00 00:00:00', '2018-12-30 08:00:00'),
(59, '11111111', 'Cynthiaalej', '123', '123', 'ae760c75c9dca9e51bd510cd3f003700bec47dbd142c0decfc7411229aa26e642f676b4c091600ce4b44a79901e200517f33c6182a35c2cea9fc09d99bf88d79', 'Cynthia Alejandra', 'Gonzalez', 'femenino', 'cgonzalez2302@gmail.com', 'Los rosales poniente 1332', 123456, 2, 'http://korpovibro.cl/imagenes/foto-perfil_dasasdsad.jpg', '', 2, '', 0, '0000-00-00 00:00:00', '2018-12-31 00:00:00'),
(95, '19.557.954-7', 'shirohigue12', '4d0fb66daeb3da0ffa80ade8fc385a12', '4d0fb66daeb3da0ffa80ade8fc385a12', '', 'Zarko', 'Escobar', '', 'zarko.escobar@gmail.com', 'Arturo Prat 3429, Arturo Prat 3429', 931935681, 1, '', '', 0, 'Temporal', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '15.361.998-0', 'patricio', 'c8180c19e5a1278cddf5248331ef7fa5', 'c8180c19e5a1278cddf5248331ef7fa5', 'cc1758e42d25147a4ba057ca8f22e37cd23bc017b3152df9ccc22e6fa3626e72bae7c4714860c636bdd57781f437103019021d4b9c4d3e74cd0d3bb6c64b7dbd', 'patricio', 'toro', '', 'patricio.toro@conosurseguros.cl', 'recoleta', 696969, 2, 'http://korpovibro.cl/imagenes/foto-perfil_tony.gif', '', 0, 'Activa', 0, '2018-11-19 12:04:02', '2019-11-29 12:04:02'),
(105, '15.361.998-0', 'pato', 'c8180c19e5a1278cddf5248331ef7fa5', 'c8180c19e5a1278cddf5248331ef7fa5', '', 'pato', 'toro', '', 'patricio.andres21@gmail.comq', 'fkrrk', 0, 1, 'http://korpovibro.cl/imagenes/foto-perfil_Patrick.jpg', '', 0, 'Temporal', 0, '2018-11-22 23:32:16', '2019-11-24 23:32:16'),
(106, '1.111.111-1', 'Alejandra', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', '', 'Alejandra', 'González', 'femenino', 'cynthia.gonzalez@prodata.cl', 'los rosales', 123456, 1, 'http://korpovibro.cl/imagenes/foto-perfil_1.jpg', '', 0, 'Temporal', 0, '2018-11-24 23:50:19', '2018-11-26 23:50:19'),
(107, '111-1', 'Agustín', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', '', 'Agustín', 'eee', '', 'kkk@j.cl', 'sss', 11111, 2, 'http://korpovibro.cl/imagenes/foto-perfil_agu.jpg', '', 0, 'Activa', 0, '2018-11-25 01:36:00', '2018-11-27 01:36:00'),
(108, '21.321.333-3', 'pruebaa', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', '', 'prueba', 'prueba', '', 'prueba@prueba.cl', 'prueba', 23434, 1, '', '', 0, 'Temporal', 0, '2018-11-25 21:04:52', '2018-12-25 21:04:52'),
(109, '19.345.678-1', 'Cynthia', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', '', 'Cynthia Alejandrita', 'Gonzalez', '', 'sdfg@sdfgh', 'g', 1234555, 2, '', '', 0, 'Activa', 0, '2018-12-07 15:47:23', '2019-01-06 15:47:23'),
(110, '1.122.222-2', 'mama', '6116afedcb0bc31083935c1c262ff4c9', '6116afedcb0bc31083935c1c262ff4c9', '', 'mama', 'mama', '', 'mamaam@dxdx.co', 'wwdw', 12334344, 2, '', '', 0, 'Activa', 0, '2018-12-07 15:52:43', '2019-01-06 15:52:43'),
(111, '18.456.734-2', 'Aaa', 'd5d849bdba01233f855b16da071127ae', 'd5d849bdba01233f855b16da071127ae', '', 'Aaa', 'Aaa', '', 'alex7@live.cl', 'Angola0226', 87840909, 2, '', '', 0, 'Activa', 0, '2018-12-07 18:05:01', '2019-01-06 18:05:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_adm`
--

CREATE TABLE `usuario_adm` (
  `id` int(11) NOT NULL,
  `rut_usuario` varchar(200) NOT NULL,
  `username` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(200) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(200) NOT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_suscrip` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_adm`
--

INSERT INTO `usuario_adm` (`id`, `rut_usuario`, `username`, `password`, `password2`, `nombre`, `apellido`, `sexo`, `correo`, `direccion`, `telefono`, `id_tipo_usuario`, `foto`, `id_suscrip`) VALUES
(1, '19.025.200-0', 'ClaudioN', '1234', '1234', 'Claudio Marcelo', 'Navarrete', 'masculino', 'claudio.marcelo511@gmail.com', 'Padre demetrio bravo,632', 123456789, 1, '', 1),
(2, '', 'claudio', '123', '1234', 'Marcelo', '', 'masculino', 'claudio.marcelo511@gmail.com', '', 0, 2, '', 2),
(25, '', 'Ficz', '123', '', 'Felipe', '', '', 'fcz@hotmail.com', 'chile', 12345678, 2, '', 2),
(24, '', 'cynthiaalej', '123', '123', '', '', '', 'cgonzalez2302@gmail.com', '', 0, 1, '', 2),
(58, '18095160-1', 'cynthiaalej', '123456', '1234567', 'CYNTHIA ALEJANDRA', 'gonzalez', 'femenino', 'sai_gls@hotmail.com', 'lll', 123456789, 1, 'C:fakepath99788f951934a272286cf344b0e823ca.jpg', 2),
(59, '11111111', 'Cynthia', '123456', '1234567', 'Cynthia Alejandra', 'Gonzalez', 'femenino', 'cgonzalez2302@gmail.com', 'Los rosales poniente 1332', 123456, 2, '', 2),
(67, '1111', 'prueba2', '123', '123', 'adsasd', 'adasdas', '', 'asdasd', 'asdasdasd', 423423423, 2, '', 2),
(68, '1321', 'pruebaaa', '123', '123', 'asdad', 'adasd', '', 'asdasd', 'adasdasd', 2132132, 1, '', 2),
(69, '111', 'abbey', '123456', '123456', 'abbey', 'kik', '', 'mim', 'okok', 88148, 2, '', 2),
(70, '15.361.998-0', 'pato', '1234', '1234', 'Patricio', 'Toro', 'masculino', 'patricio.toro@conosurseguros.cl', '', 8945645, 1, '', 1),
(71, '188497020', 'sa', 'micuerpovibra', 'micuerpovibra', 'carlos', 'chaparro', 'femenino', 'carlos.chaparro04@gmail.com', 'los asaja', 991112211, 2, '', 2),
(72, '19.557.954-7', 'zarkovdk', 'papamudas041296', 'papamudas041296', 'Zarko Boris', 'Escobar Von Dem Knesebeck', '', 'zarko.escobar@gmail.com', 'arturo pratt 3429', 2147483647, 2, '', 2),
(73, '', 'cm', '123', '123', 'claudio', 'navarrete', '', 'claudio.marcelo511@gmail.com', NULL, 56456456, 3, '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_documentos_emision`
--
ALTER TABLE `app_documentos_emision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase_instructor`
--
ALTER TABLE `clase_instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`id_contac`);

--
-- Indices de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `misclases_alumnos`
--
ALTER TABLE `misclases_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `pago_suscrpcion`
--
ALTER TABLE `pago_suscrpcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_clase`
--
ALTER TABLE `registro_clase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_clases`
--
ALTER TABLE `tipo_clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_adm`
--
ALTER TABLE `usuario_adm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_documentos_emision`
--
ALTER TABLE `app_documentos_emision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clase_instructor`
--
ALTER TABLE `clase_instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `id_contac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `misclases_alumnos`
--
ALTER TABLE `misclases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `pago_suscrpcion`
--
ALTER TABLE `pago_suscrpcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro_clase`
--
ALTER TABLE `registro_clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `tipo_clases`
--
ALTER TABLE `tipo_clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `usuario_adm`
--
ALTER TABLE `usuario_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
