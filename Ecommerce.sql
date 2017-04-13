-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2017 a las 02:18:04
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `minegociomx`
--
CREATE DATABASE IF NOT EXISTS `minegociomx` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `minegociomx`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL COMMENT 'Identificador de una Categoria',
  `IdTienda` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL COMMENT 'Nombre de la Categoría',
  `ActivoSN` varchar(1) NOT NULL,
  `Pagina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `IdTienda`, `Nombre`, `ActivoSN`, `Pagina`) VALUES
(13, 0, 'Lavadoras', 'S', 'lavadoras.html'),
(28, 0, 'Salas', 'S', 'salas.html');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `IdTienda` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Paterno` varchar(120) NOT NULL,
  `Materno` varchar(120) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Whatsapp` varchar(1) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Colonia` varchar(150) NOT NULL,
  `Entidad` varchar(150) NOT NULL,
  `Delegacion` varchar(200) NOT NULL,
  `Calle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `IdTienda`, `Nombre`, `Paterno`, `Materno`, `Telefono`, `Whatsapp`, `Correo`, `CP`, `Colonia`, `Entidad`, `Delegacion`, `Calle`) VALUES
(0, 0, 'Ricardo', 'Mateos', '', '5510151888', 'S', 'rmateos@gmail.com', '92901', 'JUVENTINO ROSAS', 'CDMX', 'IZTACALCO', 'SUR 125 A'),
(4, 0, 'Israel', 'Mirelles', 'RESÃ‰NDIZ', '', '', 'atlas_17@hotmail.com', '', '', '', '', ''),
(15, 0, 'Israel', 'Luna', '', '5510151888', 'S', 'israel.luna.001@gmail.com', '08320', 'FRACCIONAMIENTO COYUYA', 'CDMX', '', 'OYAMEYO 23-1'),
(21, 0, 'Ruben', 'Oropeza', '', '5510151888', 'S', 'r.oropeza@gmail.com', '92302', 'LINDAVISTA', 'CDMX', 'GAM', 'HABANA'),
(25, 0, 'Gerardo', 'Montes', '', '49201021010', 'S', 'gmontes@gmail.com', '49220', 'CIPRIAN', 'EDO DE MEX', 'IXTAPALUCA', 'TLAYACAXPAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprascliente`
--

CREATE TABLE `comprascliente` (
  `IdCompra` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `IdTienda` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destacados`
--

INSERT INTO `destacados` (`IdTienda`, `IdProducto`) VALUES
(0, 49),
(0, 60),
(0, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompras`
--

CREATE TABLE `detallecompras` (
  `IdCompra` int(11) NOT NULL,
  `FechaCompra` date NOT NULL,
  `FechaPago` date NOT NULL,
  `Total` float NOT NULL,
  `Estatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `IdDireccion` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdTienda` int(11) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Whatsapp` varchar(1) NOT NULL,
  `Delegacion` varchar(200) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Colonia` varchar(150) NOT NULL,
  `Entidad` varchar(150) NOT NULL,
  `Celular` varchar(20) NOT NULL,
  `Calle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`IdDireccion`, `IdCliente`, `IdTienda`, `Alias`, `Telefono`, `Whatsapp`, `Delegacion`, `CP`, `Colonia`, `Entidad`, `Celular`, `Calle`) VALUES
(6, 15, 0, 'Copal', '', 'N', 'TLALNEPANTLA DE BAZ', '20200', 'SAN JOSÃ‰', 'EDO DE MEX', '', 'ARGENTINA 200'),
(7, 15, 0, 'Centenario', '', 'N', 'GAM', '2237', 'JUAN GONZÃLEZ ROMERO', 'CDMX', '', 'AVENIDA DESFOGUE'),
(9, 21, 0, 'Principal', '5510151888', 'S', 'GAM', '92302', 'LINDAVISTA', 'CDMX', '', 'HABANA'),
(10, 0, 0, 'Principal', '5510151888', 'S', 'IZTACALCO', '92901', 'JUVENTINO ROSAS', 'CDMX', '', 'SUR 125 A'),
(13, 25, 0, 'Principal', '49201021010', 'S', 'IXTAPALUCA', '49220', 'CIPRIAN', 'EDO DE MEX', '', 'TLAYACAXPAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenproducto`
--

CREATE TABLE `imagenproducto` (
  `IdImagen` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `IdTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenproducto`
--

INSERT INTO `imagenproducto` (`IdImagen`, `IdCategoria`, `IdProducto`, `Nombre`, `IdTienda`) VALUES
(23, 3, 35, 'Chrysanthemum.jpg', 0),
(26, 3, 36, 'Penguins.jpg', 0),
(31, 3, 35, 'Desert.jpg', 0),
(32, 3, 35, 'Jellyfish.jpg', 0),
(38, 3, 36, 'Hydrangeas.jpg', 0),
(40, 2, 37, 'Desert.jpg', 0),
(41, 0, 37, 'Chrysanthemum.jpg', 0),
(42, 2, 37, 'Koala.jpg', 0),
(43, 2, 37, 'Lighthouse.jpg', 0),
(45, 3, 36, 'Lighthouse.jpg', 0),
(46, 3, 35, 'Tulips.jpg', 0),
(47, 11, 38, 'Error.png', 0),
(48, 11, 38, 'cmis.png', 0),
(49, 11, 38, 'Sitio.png', 0),
(50, 11, 38, 'Office.png', 0),
(51, 11, 39, 'cmis.png', 0),
(52, 11, 39, 'ConfCMISProtocolo.png', 0),
(55, 11, 39, 'cmis.png', 0),
(57, 11, 40, 'Office.png', 0),
(58, 11, 40, 'TicketMaster.png', 0),
(59, 11, 40, 'Untitled.png', 0),
(60, 11, 40, 'Error.png', 0),
(61, 11, 41, 'cmis.png', 0),
(62, 11, 41, 'Correo.png', 0),
(63, 11, 41, 'docview.gif', 0),
(64, 11, 41, 'Evidencia.png', 0),
(65, 11, 42, 'bootstrap.gif', 0),
(66, 11, 42, 'Evidencia.png', 0),
(67, 11, 42, 'Untitled.png', 0),
(68, 11, 42, 'TicketMaster.png', 0),
(69, 11, 43, 'cmis.png', 0),
(70, 11, 43, 'ConfCMISProtocolo.png', 0),
(71, 11, 43, 'docview.gif', 0),
(72, 11, 43, 'TicketMaster.png', 0),
(73, 11, 44, 'cmis.png', 0),
(74, 11, 44, 'ConfCMISProtocolo.png', 0),
(75, 11, 44, 'docview.gif', 0),
(76, 11, 44, 'TicketMaster.png', 0),
(77, 11, 45, 'cmis.png', 0),
(78, 11, 45, 'Evidencia.png', 0),
(79, 11, 45, 'ConfCMISProtocolo.png', 0),
(80, 11, 45, 'Office.png', 0),
(81, 11, 46, 'cmis.png', 0),
(82, 11, 47, 'Office.png', 0),
(83, 11, 47, 'ConfCMISProtocolo.png', 0),
(84, 11, 47, 'Sitio.png', 0),
(85, 11, 47, 'TicketMaster.png', 0),
(86, 12, 48, '394419-z.jpg', 0),
(87, 12, 48, 'ESCALERA STA 01.jpg', 0),
(88, 12, 48, 'escalera_waku2.jpg', 0),
(89, 12, 48, 'little-giant-classic.jpg', 0),
(90, 13, 49, '1003091160.jpg', 0),
(91, 13, 49, 'ACR-E5120Q.png', 0),
(92, 13, 49, 'sony-bdp-s480.jpg', 0),
(93, 13, 49, '841_2.jpg', 0),
(94, 13, 50, '1020758054.jpg', 0),
(95, 13, 50, '1047029691_1p.jpg', 0),
(96, 13, 50, '1037028165.jpg', 0),
(97, 13, 50, '871511-MLM20553270913_012016-O.jpg', 0),
(98, 13, 51, 'Lavadora-chaca-chaca-20160712074504.jpg', 0),
(99, 13, 51, '7e2883d88815dd606fb559ec1eb0d8b8.jpg', 0),
(100, 13, 51, '2235.jpg', 0),
(101, 13, 51, 'Lavadora Apple.jpg', 0),
(102, 13, 52, 'fileIn_1.jpg', 0),
(103, 13, 52, 'fileIn_2.jpg', 0),
(104, 13, 52, 'fileIn_3.jpg', 0),
(105, 13, 52, 'fileIn_4.jpg', 0),
(106, 13, 53, 'fileIn_1', 0),
(107, 13, 53, 'fileIn_2', 0),
(108, 13, 53, 'fileIn_3', 0),
(109, 13, 53, 'fileIn_4', 0),
(110, 16, 54, 'fileIn_1', 0),
(111, 16, 54, 'fileIn_2', 0),
(112, 16, 54, 'fileIn_3', 0),
(113, 16, 54, 'fileIn_4', 0),
(114, 16, 55, 'fileIn_1', 0),
(115, 16, 55, 'fileIn_2', 0),
(116, 16, 55, 'fileIn_3', 0),
(117, 16, 55, 'fileIn_4', 0),
(118, 16, 56, 'fileIn_1', 0),
(119, 16, 56, 'fileIn_2', 0),
(120, 16, 56, 'fileIn_3', 0),
(121, 16, 56, 'fileIn_4', 0),
(122, 16, 57, 'fileIn_1', 0),
(123, 16, 57, 'fileIn_2', 0),
(124, 16, 57, 'fileIn_3', 0),
(125, 16, 57, 'fileIn_4', 0),
(126, 16, 58, 'fileIn_1', 0),
(127, 16, 58, 'fileIn_2', 0),
(128, 16, 58, 'fileIn_3', 0),
(129, 16, 58, 'fileIn_4', 0),
(130, 16, 59, 'fileIn_1', 0),
(131, 16, 59, 'fileIn_2', 0),
(132, 16, 59, 'fileIn_3', 0),
(133, 16, 59, 'fileIn_4', 0),
(134, 28, 0, 'fileIn_1', 0),
(135, 28, 0, 'fileIn_2', 0),
(136, 28, 0, 'fileIn_3', 0),
(137, 28, 0, 'fileIn_4', 0),
(138, 28, 60, 'fileIn_1', 0),
(139, 28, 60, 'fileIn_2', 0),
(140, 28, 0, 'fileIn_1', 0),
(141, 28, 0, 'fileIn_2', 0),
(142, 28, 0, 'fileIn_3', 0),
(143, 28, 0, 'fileIn_4', 0),
(144, 28, 61, 'fileIn_1', 0),
(145, 28, 0, 'fileIn_1', 0),
(146, 28, 0, 'fileIn_2', 0),
(147, 28, 0, 'fileIn_3', 0),
(148, 28, 0, 'fileIn_4', 0),
(149, 28, 62, 'fileIn_1', 0),
(153, 26, 63, 'fileIn_1', 0),
(155, 26, 63, 'fileIn_3', 0),
(156, 26, 63, 'fileIn_4', 0),
(161, 28, 61, 'fileIn_2', 0),
(163, 28, 61, 'fileIn_4', 0),
(195, 28, 62, 'Imagen_4.jpg', 0),
(201, 26, 63, 'Imagen_2.jpg', 0),
(207, 28, 63, 'Imagen_1.jpg', 0),
(208, 28, 63, 'Imagen_2.jpg', 0),
(209, 28, 63, 'Imagen_3.jpg', 0),
(210, 28, 63, 'Imagen_4.jpg', 0),
(231, 28, 70, 'Imagen_1.jpg', 0),
(232, 28, 70, 'Imagen_2.jpg', 0),
(233, 28, 70, 'Imagen_3.png', 0),
(234, 28, 70, 'Imagen_4.png', 0),
(239, 28, 72, 'Imagen_1.png', 0),
(240, 28, 72, 'Imagen_2.jpg', 0),
(241, 28, 72, 'Imagen_3.gif', 0),
(242, 28, 72, 'Imagen_4.jpg', 0),
(247, 28, 74, 'Imagen_1.jpg', 0),
(248, 28, 74, 'Imagen_2.jpg', 0),
(249, 28, 74, 'Imagen_3.jpg', 0),
(250, 28, 74, 'Imagen_4.jpg', 0),
(251, 28, 597787, 'Imagen_1.jpg', 0),
(252, 28, 597787, 'Imagen_2.png', 0),
(253, 28, 597787, 'Imagen_3.jpg', 0),
(254, 28, 597787, 'Imagen_4.jpg', 0),
(255, 28, 18317, 'Imagen_1.jpg', 0),
(256, 28, 18317, 'Imagen_2.jpg', 0),
(257, 28, 18317, 'Imagen_3.jpg', 0),
(258, 28, 18317, 'Imagen_4.jpg', 0),
(259, 28, 333375, 'Imagen_1.jpg', 0),
(260, 28, 333375, 'Imagen_2.jpg', 0),
(261, 28, 333375, 'Imagen_4.jpg', 0),
(262, 28, 333375, 'Imagen_3.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevos`
--

CREATE TABLE `nuevos` (
  `IdProducto` int(11) NOT NULL,
  `IdTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nuevos`
--

INSERT INTO `nuevos` (`IdProducto`, `IdTienda`) VALUES
(50, 0),
(65, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `IdTienda` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`IdTienda`, `IdProducto`) VALUES
(0, 50),
(0, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL COMMENT 'Identificador de un Producto',
  `IdTienda` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `IdSubcategoria` int(11) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL COMMENT 'Nombre del Producto',
  `Descripcion` varchar(500) DEFAULT NULL COMMENT 'Descripción del Producto',
  `Precio` int(11) DEFAULT NULL,
  `OfertaSN` varchar(1) DEFAULT NULL,
  `Porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `IdTienda`, `IdCategoria`, `IdSubcategoria`, `Nombre`, `Descripcion`, `Precio`, `OfertaSN`, `Porcentaje`) VALUES
(49, 0, 13, 0, 'Lavadora MÃ¡gica', 'Lavadora de 12 KG para varias cargas de ropa y con diferentes ciclos de lavado', 5000, 'N', 0),
(50, 0, 13, 0, 'Centro de Lavado', 'Centro de lavado para 12Kg de Ropa funciona con el gas natural para un secado preciso de la ropa.', 15000, 'N', 0),
(51, 0, 13, 0, 'Lavadora de Rodillo', 'Lavadora Chaca Chaca de rodillo para fÃ¡cil utilizaciÃ³n sin mucho gasto de energÃ­a.', 1000, 'N', 0),
(52, 0, 13, 0, 'Lavadoras Variadas', 'Oferta de Lavadores variadas con pequeÃ±os defectos pero funcionando al 100%', 3400, 'S', 20),
(53, 0, 13, 0, 'Lava Juver', 'Lavadora rendidora de energia y kilogramos de lavado para varias cargas al dÃ­a familias grandes', 5760, 'S', 12),
(62, 0, 28, 0, 'Sala Sencilla', 'Sala sencilla, con dos piezas, loft seat y sillon pequeÃ±o, para casas acogedoras.', 5060, 'N', 0),
(70, 0, 28, 0, 'SALA PLUS', 'SALON', 26999, 'N', 0),
(72, 0, 28, 0, 'Sala Doble', 'Sala para familia polÃ­tica, de entrega inmediata.', 45000, 'N', 0),
(74, 0, 28, 0, 'Sala domino', 'Domino', 45060, 'N', 0),
(77, 0, 28, 0, 'Sala Cantera', 'Sala de piedra', 134565, 'N', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Descripcion`) VALUES
(0, 'Administrador'),
(1, 'Usuario'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slidertienda`
--

CREATE TABLE `slidertienda` (
  `IdSlider` int(11) NOT NULL,
  `IdTienda` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slidertienda`
--

INSERT INTO `slidertienda` (`IdSlider`, `IdTienda`, `Nombre`) VALUES
(23, 0, 'Slider_1.jpg'),
(28, 0, 'Slider_2.jpg'),
(34, 0, 'Slider_3.jpg'),
(36, 0, 'Slider_4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `IdSubcategoria` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `ActivoSN` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`IdSubcategoria`, `IdCategoria`, `Nombre`, `ActivoSN`) VALUES
(1, 22, 'Redondo', 'S'),
(3, 26, 'Madera', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `IdTienda` int(11) NOT NULL,
  `Nombre` varchar(400) NOT NULL,
  `CP` varchar(10) NOT NULL,
  `Calle` varchar(250) NOT NULL,
  `Colonia` varchar(250) NOT NULL,
  `Delegacion` varchar(250) NOT NULL,
  `Entidad` varchar(250) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`IdTienda`, `Nombre`, `CP`, `Calle`, `Colonia`, `Delegacion`, `Entidad`, `Correo`, `Telefono`, `Celular`, `Descripcion`) VALUES
(0, '+ Que Motos', '08320', 'Av. Plutarco ElÃ­as Calles', 'Reforma Iztlacihuatl', 'Benito JuÃ¡rez', 'CDMX', 'masqmotos@gmail.com', '26173016', '55105934930', 'Somos una tienda especializada en la venta de muebles de primera calidad con mas de 10 anos en el mercado con clientes en diferentes estados de la Republica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `IdTienda` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendasocial`
--

CREATE TABLE `tiendasocial` (
  `IdTienda` int(11) NOT NULL,
  `Facebook` varchar(150) NOT NULL,
  `Twitter` varchar(150) NOT NULL,
  `Youtube` varchar(150) NOT NULL,
  `Pinterest` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiendasocial`
--

INSERT INTO `tiendasocial` (`IdTienda`, `Facebook`, `Twitter`, `Youtube`, `Pinterest`) VALUES
(0, 'masqmotosFace', 'masqmotosTwi', 'masqmotosYou', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendatema`
--

CREATE TABLE `tiendatema` (
  `IdTienda` int(11) NOT NULL,
  `FrontColor` varchar(10) NOT NULL,
  `BodyColor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiendatema`
--

INSERT INTO `tiendatema` (`IdTienda`, `FrontColor`, `BodyColor`) VALUES
(0, '000000', 'FFFFFF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `AliasUsuario` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `ActivoSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NombreUsuario`, `AliasUsuario`, `Password`, `IdRol`, `ActivoSN`) VALUES
(1, 'Administrador', 'Administrador', 'admin1234', 0, 0),
(15, 'iluna', 'ISRAEL', 'admin1234', 0, 0),
(21, 'roropeza', 'RUBEN', 'admin1234', 0, 0),
(22, 'rmateos', 'RICARDO', 'admin1234', 0, 0),
(25, 'gmontes', 'GERARDO', 'admin1234', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`,`IdTienda`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`,`IdTienda`);

--
-- Indices de la tabla `comprascliente`
--
ALTER TABLE `comprascliente`
  ADD PRIMARY KEY (`IdCompra`,`IdCliente`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`IdTienda`,`IdProducto`);

--
-- Indices de la tabla `detallecompras`
--
ALTER TABLE `detallecompras`
  ADD PRIMARY KEY (`IdCompra`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`IdDireccion`) USING BTREE;

--
-- Indices de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  ADD PRIMARY KEY (`IdImagen`);

--
-- Indices de la tabla `nuevos`
--
ALTER TABLE `nuevos`
  ADD PRIMARY KEY (`IdProducto`,`IdTienda`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`IdTienda`,`IdProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`,`IdTienda`,`IdCategoria`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `slidertienda`
--
ALTER TABLE `slidertienda`
  ADD PRIMARY KEY (`IdSlider`,`IdTienda`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`IdSubcategoria`,`IdCategoria`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`IdTienda`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`IdTienda`);

--
-- Indices de la tabla `tiendasocial`
--
ALTER TABLE `tiendasocial`
  ADD PRIMARY KEY (`IdTienda`);

--
-- Indices de la tabla `tiendatema`
--
ALTER TABLE `tiendatema`
  ADD PRIMARY KEY (`IdTienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de una Categoria', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `comprascliente`
--
ALTER TABLE `comprascliente`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `IdDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `imagenproducto`
--
ALTER TABLE `imagenproducto`
  MODIFY `IdImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de un Producto', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `slidertienda`
--
ALTER TABLE `slidertienda`
  MODIFY `IdSlider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `IdSubcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `IdTienda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'database', 'miNegocioMX', '{"quick_or_custom":"quick","what":"sql","structure_or_data_forced":"0","table_select[]":["categorias","clientes","destacados","imagenproducto","ofertas","productos","slidertienda","subcategorias","tienda","tiendas","tiendasocial","tiendatema"],"table_structure[]":["categorias","clientes","destacados","imagenproducto","ofertas","productos","slidertienda","subcategorias","tienda","tiendas","tiendasocial","tiendatema"],"table_data[]":["categorias","clientes","destacados","imagenproducto","ofertas","productos","slidertienda","subcategorias","tienda","tiendas","tiendasocial","tiendatema"],"output_format":"sendit","filename_template":"@DATABASE@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Estructura de la tabla @TABLE@","latex_structure_continued_caption":"Estructura de la tabla @TABLE@ (continÃºa)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Contenido de la tabla @TABLE@","latex_data_continued_caption":"Contenido de la tabla @TABLE@ (continÃºa)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"structure_and_data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"structure_and_data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","xml_structure_or_data":"data","xml_export_events":"something","xml_export_functions":"something","xml_export_procedures":"something","xml_export_tables":"something","xml_export_triggers":"something","xml_export_views":"something","xml_export_contents":"something","yaml_structure_or_data":"data","":null,"lock_tables":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_create_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}'),
(2, 'root', 'table', 'DB', '{"quick_or_custom":"quick","what":"sql","allrows":"1","output_format":"sendit","filename_template":"@TABLE@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Estructura de la tabla @TABLE@","latex_structure_continued_caption":"Estructura de la tabla @TABLE@ (continÃºa)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Contenido de la tabla @TABLE@","latex_data_continued_caption":"Contenido de la tabla @TABLE@ (continÃºa)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","xml_structure_or_data":"data","xml_export_events":"something","xml_export_functions":"something","xml_export_procedures":"something","xml_export_tables":"something","xml_export_triggers":"something","xml_export_views":"something","xml_export_contents":"something","yaml_structure_or_data":"data","":null,"lock_tables":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}'),
(3, 'root', 'server', 'Ecommerce', '{"quick_or_custom":"quick","what":"sql","db_select[]":["minegociomx","phpmyadmin","sales","test"],"output_format":"sendit","filename_template":"@SERVER@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Estructura de la tabla @TABLE@","latex_structure_continued_caption":"Estructura de la tabla @TABLE@ (continÃºa)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Contenido de la tabla @TABLE@","latex_data_continued_caption":"Contenido de la tabla @TABLE@ (continÃºa)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","yaml_structure_or_data":"data","":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"minegociomx","table":"ofertas"},{"db":"minegociomx","table":"usuarios"},{"db":"minegociomx","table":"clientes"},{"db":"minegociomx","table":"direcciones"},{"db":"minegociomx","table":"comprascliente"},{"db":"minegociomx","table":"categorias"},{"db":"minegociomx","table":"roles"},{"db":"minegociomx","table":"Roles"},{"db":"minegociomx","table":"productos"},{"db":"minegociomx","table":"detallecompras"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'minegociomx', 'imagenproducto', '{"sorted_col":"`IdProducto`  DESC"}', '2017-02-07 23:18:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-07-14 16:16:23', '{"lang":"es","collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Base de datos: `sales`
--
CREATE DATABASE IF NOT EXISTS `sales` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sales`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(15, 'Israel Luna R', 'Oyameyo 23-1', '5510151888', '50', '', '2016-08-08', 'Nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(58, 'Bimbo', 'Medias Noches', 'Pan ', '', '400', '500', '100', '', 0, 10, 12, '2016-08-23', '2016-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(142, 'RS-33830', 'Admin', '08/08/16', 'cash', '500', '100', '50', 'Israel Luna R', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(315, 'RS-2232243', '58', '1', '500', '100', 'Bimbo', 'Medias Noches', 'Pan ', '500', '', '08/08/16'),
(316, 'RS-33830', '58', '1', '500', '100', 'Bimbo', 'Medias Noches', 'Pan ', '500', '', '08/08/16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(5, 'Bimbo', '', 'Juan Perez', '50001', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'cashier', 'cashier', 'Cashier Pharmacy', 'Cashier'),
(3, 'admin', 'admin123', 'Administrator', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indices de la tabla `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT de la tabla `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT de la tabla `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
