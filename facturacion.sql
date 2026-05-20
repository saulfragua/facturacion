-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2026 a las 18:03:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `tipo_persona` enum('NATURAL','JURIDICA') DEFAULT 'NATURAL',
  `numero_documento` varchar(30) NOT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `razon_social` varchar(200) DEFAULT NULL,
  `nit` varchar(30) DEFAULT NULL,
  `dv` varchar(5) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `municipio_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `responsabilidad_fiscal_id` int(11) DEFAULT NULL,
  `regimen_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `empresa_id`, `tipo_persona`, `numero_documento`, `nombres`, `apellidos`, `razon_social`, `nit`, `dv`, `telefono`, `correo`, `direccion`, `estado`, `created_at`, `municipio_id`, `departamento_id`, `responsabilidad_fiscal_id`, `regimen_id`, `tipo_documento_id`) VALUES
(4, 2, 'NATURAL', '1122121271', 'SAUL', 'FRAGUA NOVA', 'FRAGUA TECH', '1122121271', '2', '3209839356', 'saul.fragua1988@gmail.com', 'Av 1 AN # 0A-70', 1, '2026-05-19 21:13:28', 780, 54, 5, 2, 1),
(6, 2, 'NATURAL', '123456789', 'FERNEY', 'FRAGUA NOVA', 'ALFA SYSTEM', '999999', '', '3209839356', '1@gmail.com', 'AV PRINCIPAL', 1, '2026-05-19 21:19:19', 1109, 95, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_empresa`
--

CREATE TABLE `configuracion_empresa` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `moneda` varchar(10) DEFAULT 'COP',
  `simbolo_moneda` varchar(10) DEFAULT '$',
  `impuesto_defecto` decimal(5,2) DEFAULT 19.00,
  `formato_factura` varchar(50) DEFAULT 'A4',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `numero_cotizacion` varchar(50) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `iva` decimal(15,2) DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `estado` enum('PENDIENTE','APROBADA','RECHAZADA') DEFAULT 'PENDIENTE',
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_cobro`
--

CREATE TABLE `cuentas_cobro` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `numero_cuenta` varchar(50) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` text NOT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `retencion` decimal(15,2) DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `estado` enum('PENDIENTE','PAGADA') DEFAULT 'PENDIENTE',
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `codigo`, `nombre`) VALUES
(5, '05', 'ANTIOQUIA'),
(8, '08', 'ATLÁNTICO'),
(11, '11', 'BOGOTÁ D.C.'),
(13, '13', 'BOLÍVAR'),
(15, '15', 'BOYACÁ'),
(17, '17', 'CALDAS'),
(18, '18', 'CAQUETÁ'),
(19, '19', 'CAUCA'),
(20, '20', 'CESAR'),
(23, '23', 'CÓRDOBA'),
(25, '25', 'CUNDINAMARCA'),
(27, '27', 'CHOCÓ'),
(41, '41', 'HUILA'),
(44, '44', 'LA GUAJIRA'),
(47, '47', 'MAGDALENA'),
(50, '50', 'META'),
(52, '52', 'NARIÑO'),
(54, '54', 'NORTE DE SANTANDER'),
(63, '63', 'QUINDÍO'),
(66, '66', 'RISARALDA'),
(68, '68', 'SANTANDER'),
(70, '70', 'SUCRE'),
(73, '73', 'TOLIMA'),
(76, '76', 'VALLE DEL CAUCA'),
(81, '81', 'ARAUCA'),
(85, '85', 'CASANARE'),
(86, '86', 'PUTUMAYO'),
(88, '88', 'SAN ANDRÉS Y PROVIDENCIA'),
(91, '91', 'AMAZONAS'),
(94, '94', 'GUAINÍA'),
(95, '95', 'GUAVIARE'),
(97, '97', 'VAUPÉS'),
(99, '99', 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizaciones`
--

CREATE TABLE `detalle_cotizaciones` (
  `id` int(11) NOT NULL,
  `cotizacion_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio_unitario` decimal(15,2) DEFAULT NULL,
  `iva` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_facturas`
--

CREATE TABLE `detalle_facturas` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio_unitario` decimal(15,2) NOT NULL,
  `iva` decimal(15,2) DEFAULT 0.00,
  `subtotal` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT 1,
  `razon_social` varchar(200) NOT NULL,
  `nit` varchar(30) NOT NULL,
  `dv` varchar(5) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `resolucion_dian` varchar(100) DEFAULT NULL,
  `prefijo_factura` varchar(20) DEFAULT NULL,
  `rango_desde` int(11) DEFAULT NULL,
  `rango_hasta` int(11) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `estado` enum('ACTIVA','SUSPENDIDA','ELIMINADA') DEFAULT 'ACTIVA',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `municipio_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `regimen_id` int(11) DEFAULT NULL,
  `responsabilidad_fiscal_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `plan_id`, `razon_social`, `nit`, `dv`, `direccion`, `telefono`, `correo`, `resolucion_dian`, `prefijo_factura`, `rango_desde`, `rango_hasta`, `fecha_vencimiento`, `logo`, `estado`, `created_at`, `municipio_id`, `departamento_id`, `regimen_id`, `responsabilidad_fiscal_id`, `tipo_documento_id`) VALUES
(2, 1, 'FRAGUA', '1122121271', '2', 'Av 1 AN # 0A-70', '3209839356', 'saul.fragua1988@gmail.com', '', '', 0, 0, '0000-00-00', '1779244494_mapa.png', 'ACTIVA', '2026-05-19 19:00:01', 806, 54, 2, 5, 1),
(3, 1, 'qwerty', '1', '', '', '3209839356', '1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVA', '2026-05-20 02:36:26', NULL, NULL, NULL, NULL, NULL),
(4, 1, 'qwerty', '999999', '', '', '3000000000', 'ss@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVA', '2026-05-20 14:58:02', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `numero_factura` varchar(50) NOT NULL,
  `prefijo` varchar(20) DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `iva` decimal(15,2) DEFAULT 0.00,
  `descuento` decimal(15,2) DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `estado` enum('PENDIENTE','PAGADA','ANULADA') DEFAULT 'PENDIENTE',
  `observaciones` text DEFAULT NULL,
  `cufe` varchar(255) DEFAULT NULL,
  `qr` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `tipo_movimiento` enum('ENTRADA','SALIDA') NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `accion` varchar(255) DEFAULT NULL,
  `tabla` varchar(100) DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `departamento_id`, `codigo`, `nombre`) VALUES
(1, 5, '05001', 'MEDELLÍN'),
(2, 5, '05002', 'ABEJORRAL'),
(3, 5, '05004', 'ABRIAQUÍ'),
(4, 5, '05021', 'ALEJANDRÍA'),
(5, 5, '05030', 'AMAGÁ'),
(6, 5, '05031', 'AMALFI'),
(7, 5, '05034', 'ANDES'),
(8, 5, '05036', 'ANGELÓPOLIS'),
(9, 5, '05038', 'ANGOSTURA'),
(10, 5, '05040', 'ANORÍ'),
(11, 5, '05042', 'SANTA FÉ DE ANTIOQUIA'),
(12, 5, '05044', 'ANZÁ'),
(13, 5, '05045', 'APARTADÓ'),
(14, 5, '05051', 'ARBOLETES'),
(15, 5, '05055', 'ARGELIA'),
(16, 5, '05059', 'ARMENIA'),
(17, 5, '05079', 'BARBOSA'),
(18, 5, '05086', 'BELMIRA'),
(19, 5, '05088', 'BELLO'),
(20, 5, '05091', 'BETANIA'),
(21, 5, '05093', 'BETULIA'),
(22, 5, '05101', 'CIUDAD BOLÍVAR'),
(23, 5, '05107', 'BRICEÑO'),
(24, 5, '05113', 'BURITICÁ'),
(25, 5, '05120', 'CÁCERES'),
(26, 5, '05125', 'CAICEDO'),
(27, 5, '05129', 'CALDAS'),
(28, 5, '05134', 'CAMPAMENTO'),
(29, 5, '05138', 'CAÑASGORDAS'),
(30, 5, '05142', 'CARACOLÍ'),
(31, 5, '05145', 'CARAMANTA'),
(32, 5, '05147', 'CAREPA'),
(33, 5, '05148', 'EL CARMEN DE VIBORAL'),
(34, 5, '05150', 'CAROLINA'),
(35, 5, '05154', 'CAUCASIA'),
(36, 5, '05172', 'CHIGORODÓ'),
(37, 5, '05190', 'CISNEROS'),
(38, 5, '05197', 'COCORNÁ'),
(39, 5, '05206', 'CONCEPCIÓN'),
(40, 5, '05209', 'CONCORDIA'),
(41, 5, '05212', 'COPACABANA'),
(42, 5, '05234', 'DABEIBA'),
(43, 5, '05237', 'DONMATÍAS'),
(44, 5, '05240', 'EBÉJICO'),
(45, 5, '05250', 'EL BAGRE'),
(46, 5, '05264', 'ENTRERRÍOS'),
(47, 5, '05266', 'ENVIGADO'),
(48, 5, '05282', 'FREDONIA'),
(49, 5, '05284', 'FRONTINO'),
(50, 5, '05306', 'GIRALDO'),
(51, 5, '05308', 'GIRARDOTA'),
(52, 5, '05310', 'GÓMEZ PLATA'),
(53, 5, '05313', 'GRANADA'),
(54, 5, '05315', 'GUADALUPE'),
(55, 5, '05318', 'GUARNE'),
(56, 5, '05321', 'GUATAPÉ'),
(57, 5, '05347', 'HELICONIA'),
(58, 5, '05353', 'HISPANIA'),
(59, 5, '05360', 'ITAGÜÍ'),
(60, 5, '05361', 'ITUANGO'),
(61, 5, '05364', 'JARDÍN'),
(62, 5, '05368', 'JERICÓ'),
(63, 5, '05376', 'LA CEJA'),
(64, 5, '05380', 'LA ESTRELLA'),
(65, 5, '05390', 'LA PINTADA'),
(66, 5, '05400', 'LA UNIÓN'),
(67, 5, '05411', 'LIBORINA'),
(68, 5, '05425', 'MACEO'),
(69, 5, '05440', 'MARINILLA'),
(70, 5, '05467', 'MONTEBELLO'),
(71, 5, '05475', 'MURINDÓ'),
(72, 5, '05480', 'MUTATÁ'),
(73, 5, '05483', 'NARIÑO'),
(74, 5, '05490', 'NECOCLÍ'),
(75, 5, '05495', 'NECHÍ'),
(76, 5, '05501', 'OLAYA'),
(77, 5, '05541', 'PEÑOL'),
(78, 5, '05543', 'PEQUE'),
(79, 5, '05576', 'PUEBLORRICO'),
(80, 5, '05579', 'PUERTO BERRÍO'),
(81, 5, '05585', 'PUERTO NARE'),
(82, 5, '05591', 'PUERTO TRIUNFO'),
(83, 5, '05604', 'REMEDIOS'),
(84, 5, '05607', 'RETIRO'),
(85, 5, '05615', 'RIONEGRO'),
(86, 5, '05628', 'SABANALARGA'),
(87, 5, '05631', 'SABANETA'),
(88, 5, '05642', 'SALGAR'),
(89, 5, '05647', 'SAN ANDRÉS DE CUERQUÍA'),
(90, 5, '05649', 'SAN CARLOS'),
(91, 5, '05652', 'SAN FRANCISCO'),
(92, 5, '05656', 'SAN JERÓNIMO'),
(93, 5, '05658', 'SAN JOSÉ DE LA MONTAÑA'),
(94, 5, '05659', 'SAN JUAN DE URABÁ'),
(95, 5, '05660', 'SAN LUIS'),
(96, 5, '05664', 'SAN PEDRO DE LOS MILAGROS'),
(97, 5, '05665', 'SAN PEDRO DE URABÁ'),
(98, 5, '05667', 'SAN RAFAEL'),
(99, 5, '05670', 'SAN ROQUE'),
(100, 5, '05674', 'SAN VICENTE FERRER'),
(101, 5, '05679', 'SANTA BÁRBARA'),
(102, 5, '05686', 'SANTA ROSA DE OSOS'),
(103, 5, '05690', 'SANTO DOMINGO'),
(104, 5, '05697', 'EL SANTUARIO'),
(105, 5, '05736', 'SEGOVIA'),
(106, 5, '05756', 'SONSÓN'),
(107, 5, '05761', 'SOPETRÁN'),
(108, 5, '05789', 'TÁMESIS'),
(109, 5, '05790', 'TARAZÁ'),
(110, 5, '05792', 'TARSO'),
(111, 5, '05809', 'TITIRIBÍ'),
(112, 5, '05819', 'TOLEDO'),
(113, 5, '05837', 'TURBO'),
(114, 5, '05842', 'URAMITA'),
(115, 5, '05847', 'URRAO'),
(116, 5, '05854', 'VALDIVIA'),
(117, 5, '05856', 'VALPARAÍSO'),
(118, 5, '05858', 'VEGACHÍ'),
(119, 5, '05861', 'VENECIA'),
(120, 5, '05873', 'VIGÍA DEL FUERTE'),
(121, 5, '05885', 'YALÍ'),
(122, 5, '05887', 'YARUMAL'),
(123, 5, '05890', 'YOLOMBÓ'),
(124, 5, '05893', 'YONDÓ'),
(125, 5, '05895', 'ZARAGOZA'),
(126, 8, '08001', 'BARRANQUILLA'),
(127, 8, '08078', 'BARANOA'),
(128, 8, '08137', 'CAMPO DE LA CRUZ'),
(129, 8, '08141', 'CANDELARIA'),
(130, 8, '08296', 'GALAPA'),
(131, 8, '08372', 'JUAN DE ACOSTA'),
(132, 8, '08421', 'LURUACO'),
(133, 8, '08433', 'MALAMBO'),
(134, 8, '08436', 'MANATÍ'),
(135, 8, '08520', 'PALMAR DE VARELA'),
(136, 8, '08549', 'PIOJÓ'),
(137, 8, '08558', 'POLONUEVO'),
(138, 8, '08560', 'PONEDERA'),
(139, 8, '08573', 'PUERTO COLOMBIA'),
(140, 8, '08606', 'REPELÓN'),
(141, 8, '08634', 'SABANAGRANDE'),
(142, 8, '08638', 'SABANALARGA'),
(143, 8, '08675', 'SANTA LUCÍA'),
(144, 8, '08685', 'SANTO TOMÁS'),
(145, 8, '08758', 'SOLEDAD'),
(146, 8, '08770', 'SUAN'),
(147, 8, '08832', 'TUBARÁ'),
(148, 8, '08849', 'USIACURÍ'),
(149, 11, '11001', 'BOGOTÁ, D.C.'),
(150, 13, '13001', 'CARTAGENA DE INDIAS'),
(151, 13, '13006', 'ACHÍ'),
(152, 13, '13030', 'ALTOS DEL ROSARIO'),
(153, 13, '13042', 'ARENAL'),
(154, 13, '13052', 'ARJONA'),
(155, 13, '13062', 'ARROYOHONDO'),
(156, 13, '13074', 'BARRANCO DE LOBA'),
(157, 13, '13140', 'CALAMAR'),
(158, 13, '13160', 'CANTAGALLO'),
(159, 13, '13188', 'CICUCO'),
(160, 13, '13212', 'CÓRDOBA'),
(161, 13, '13222', 'CLEMENCIA'),
(162, 13, '13244', 'EL CARMEN DE BOLÍVAR'),
(163, 13, '13248', 'EL GUAMO'),
(164, 13, '13268', 'EL PEÑÓN'),
(165, 13, '13300', 'HATILLO DE LOBA'),
(166, 13, '13430', 'MAGANGUÉ'),
(167, 13, '13433', 'MAHATES'),
(168, 13, '13440', 'MARGARITA'),
(169, 13, '13442', 'MARÍA LA BAJA'),
(170, 13, '13458', 'MONTECRISTO'),
(171, 13, '13468', 'MOMPÓS'),
(172, 13, '13473', 'MORALES'),
(173, 13, '13490', 'NOROSÍ'),
(174, 13, '13549', 'PINILLOS'),
(175, 13, '13580', 'REGIDOR'),
(176, 13, '13600', 'RÍO VIEJO'),
(177, 13, '13620', 'SAN CRISTÓBAL'),
(178, 13, '13647', 'SAN ESTANISLAO'),
(179, 13, '13650', 'SAN FERNANDO'),
(180, 13, '13654', 'SAN JACINTO'),
(181, 13, '13655', 'SAN JACINTO DEL CAUCA'),
(182, 13, '13657', 'SAN JUAN NEPOMUCENO'),
(183, 13, '13667', 'SAN MARTÍN DE LOBA'),
(184, 13, '13670', 'SAN PABLO'),
(185, 13, '13673', 'SANTA CATALINA'),
(186, 13, '13683', 'SANTA ROSA'),
(187, 13, '13688', 'SANTA ROSA DEL SUR'),
(188, 13, '13744', 'SIMITÍ'),
(189, 13, '13760', 'SOPLAVIENTO'),
(190, 13, '13780', 'TALAIGUA NUEVO'),
(191, 13, '13810', 'TIQUISIO'),
(192, 13, '13836', 'TURBACO'),
(193, 13, '13838', 'TURBANÁ'),
(194, 13, '13873', 'VILLANUEVA'),
(195, 13, '13894', 'ZAMBRANO'),
(196, 15, '15001', 'TUNJA'),
(197, 15, '15022', 'ALMEIDA'),
(198, 15, '15047', 'AQUITANIA'),
(199, 15, '15051', 'ARCABUCO'),
(200, 15, '15087', 'BELÉN'),
(201, 15, '15090', 'BERBEO'),
(202, 15, '15092', 'BETÉITIVA'),
(203, 15, '15097', 'BOAVITA'),
(204, 15, '15104', 'BOYACÁ'),
(205, 15, '15106', 'BRICEÑO'),
(206, 15, '15109', 'BUENAVISTA'),
(207, 15, '15114', 'BUSBANZÁ'),
(208, 15, '15131', 'CALDAS'),
(209, 15, '15135', 'CAMPOHERMOSO'),
(210, 15, '15162', 'CERINZA'),
(211, 15, '15172', 'CHINAVITA'),
(212, 15, '15176', 'CHIQUINQUIRÁ'),
(213, 15, '15180', 'CHISCAS'),
(214, 15, '15183', 'CHITA'),
(215, 15, '15185', 'CHITARAQUE'),
(216, 15, '15187', 'CHIVATÁ'),
(217, 15, '15189', 'CIÉNEGA'),
(218, 15, '15204', 'CÓMBITA'),
(219, 15, '15212', 'COPER'),
(220, 15, '15215', 'CORRALES'),
(221, 15, '15218', 'COVARACHÍA'),
(222, 15, '15223', 'CUBARÁ'),
(223, 15, '15224', 'CUCAITA'),
(224, 15, '15226', 'CUÍTIVA'),
(225, 15, '15232', 'CHÍQUIZA'),
(226, 15, '15236', 'CHIVOR'),
(227, 15, '15238', 'DUITAMA'),
(228, 15, '15244', 'EL COCUY'),
(229, 15, '15248', 'EL ESPINO'),
(230, 15, '15272', 'FIRAVITOBA'),
(231, 15, '15276', 'FLORESTA'),
(232, 15, '15293', 'GACHANTIVÁ'),
(233, 15, '15296', 'GÁMEZA'),
(234, 15, '15299', 'GARAGOA'),
(235, 15, '15317', 'GUACAMAYAS'),
(236, 15, '15322', 'GUATEQUE'),
(237, 15, '15325', 'GUAYATÁ'),
(238, 15, '15332', 'GÜICÁN'),
(239, 15, '15362', 'IZA'),
(240, 15, '15367', 'JENESANO'),
(241, 15, '15368', 'JERICÓ'),
(242, 15, '15377', 'LABRANZAGRANDE'),
(243, 15, '15380', 'LA CAPILLA'),
(244, 15, '15401', 'LA VICTORIA'),
(245, 15, '15403', 'LA UVITA'),
(246, 15, '15407', 'VILLA DE LEYVA'),
(247, 15, '15425', 'MACANAL'),
(248, 15, '15442', 'MARIPÍ'),
(249, 15, '15455', 'MIRAFLORES'),
(250, 15, '15464', 'MONGUA'),
(251, 15, '15466', 'MONGUÍ'),
(252, 15, '15469', 'MONIQUIRÁ'),
(253, 15, '15476', 'MOTAVITA'),
(254, 15, '15480', 'MUZO'),
(255, 15, '15491', 'NOBSA'),
(256, 15, '15494', 'NUEVO COLÓN'),
(257, 15, '15500', 'OICATÁ'),
(258, 15, '15507', 'OTANCHE'),
(259, 15, '15511', 'PACHAVITA'),
(260, 15, '15514', 'PÁEZ'),
(261, 15, '15516', 'PAIPA'),
(262, 15, '15518', 'PAJARITO'),
(263, 15, '15522', 'PANQUEBA'),
(264, 15, '15531', 'PAUNA'),
(265, 15, '15533', 'PAYA'),
(266, 15, '15537', 'PAZ DE RÍO'),
(267, 15, '15542', 'PESCA'),
(268, 15, '15550', 'PISBA'),
(269, 15, '15572', 'PUERTO BOYACÁ'),
(270, 15, '15580', 'QUÍPAMA'),
(271, 15, '15599', 'RAMIRIQUÍ'),
(272, 15, '15600', 'RÁQUIRA'),
(273, 15, '15621', 'RONDÓN'),
(274, 15, '15632', 'SABOYÁ'),
(275, 15, '15638', 'SÁCHICA'),
(276, 15, '15646', 'SAMACÁ'),
(277, 15, '15660', 'SAN EDUARDO'),
(278, 15, '15664', 'SAN JOSÉ DE PARE'),
(279, 15, '15667', 'SAN LUIS DE GACENO'),
(280, 15, '15673', 'SAN MATEO'),
(281, 15, '15676', 'SAN MIGUEL DE SEMA'),
(282, 15, '15681', 'SAN PABLO DE BORBUR'),
(283, 15, '15686', 'SANTANA'),
(284, 15, '15690', 'SANTA MARÍA'),
(285, 15, '15693', 'SANTA ROSA DE VITERBO'),
(286, 15, '15696', 'SANTA SOFÍA'),
(287, 15, '15720', 'SATIVANORTE'),
(288, 15, '15723', 'SATIVASUR'),
(289, 15, '15740', 'SIACHOQUE'),
(290, 15, '15753', 'SOATÁ'),
(291, 15, '15755', 'SOCOTÁ'),
(292, 15, '15757', 'SOCHA'),
(293, 15, '15759', 'SOGAMOSO'),
(294, 15, '15761', 'SOMONDOCO'),
(295, 15, '15762', 'SORA'),
(296, 15, '15763', 'SOTAQUIRÁ'),
(297, 15, '15764', 'SORACÁ'),
(298, 15, '15774', 'SUSACÓN'),
(299, 15, '15776', 'SUTAMARCHÁN'),
(300, 15, '15778', 'SUTATENZA'),
(301, 15, '15790', 'TASCO'),
(302, 15, '15798', 'TENZA'),
(303, 15, '15804', 'TIBANÁ'),
(304, 15, '15806', 'TIBASOSA'),
(305, 15, '15808', 'TINJACÁ'),
(306, 15, '15810', 'TIPACOQUE'),
(307, 15, '15814', 'TOCA'),
(308, 15, '15816', 'TOGÜÍ'),
(309, 15, '15820', 'TÓPAGA'),
(310, 15, '15822', 'TOTA'),
(311, 15, '15832', 'TUNUNGUÁ'),
(312, 15, '15835', 'TURMEQUÉ'),
(313, 15, '15837', 'TUTA'),
(314, 15, '15839', 'TUTAZÁ'),
(315, 15, '15842', 'ÚMBITA'),
(316, 15, '15861', 'VENTAQUEMADA'),
(317, 15, '15879', 'VIRACACHÁ'),
(318, 15, '15897', 'ZETAQUIRA'),
(319, 17, '17001', 'MANIZALES'),
(320, 17, '17013', 'AGUADAS'),
(321, 17, '17042', 'ANSERMA'),
(322, 17, '17050', 'ARANZAZU'),
(323, 17, '17088', 'BELALCÁZAR'),
(324, 17, '17174', 'CHINCHINÁ'),
(325, 17, '17272', 'FILADELFIA'),
(326, 17, '17380', 'LA DORADA'),
(327, 17, '17388', 'LA MERCED'),
(328, 17, '17433', 'MANZANARES'),
(329, 17, '17442', 'MARMATO'),
(330, 17, '17444', 'MARQUETALIA'),
(331, 17, '17446', 'MARULANDA'),
(332, 17, '17486', 'NEIRA'),
(333, 17, '17495', 'NORCASIA'),
(334, 17, '17513', 'PÁCORA'),
(335, 17, '17524', 'PALESTINA'),
(336, 17, '17541', 'PENSILVANIA'),
(337, 17, '17614', 'RIOSUCIO'),
(338, 17, '17616', 'RISARALDA'),
(339, 17, '17653', 'SALAMINA'),
(340, 17, '17662', 'SAMANÁ'),
(341, 17, '17665', 'SAN JOSÉ'),
(342, 17, '17777', 'SUPÍA'),
(343, 17, '17867', 'VICTORIA'),
(344, 17, '17873', 'VILLAMARÍA'),
(345, 17, '17877', 'VITERBO'),
(346, 18, '18001', 'FLORENCIA'),
(347, 18, '18029', 'ALBANIA'),
(348, 18, '18094', 'BELÉN DE LOS ANDAQUÍES'),
(349, 18, '18150', 'CARTAGENA DEL CHAIRÁ'),
(350, 18, '18205', 'CURILLO'),
(351, 18, '18247', 'EL DONCELLO'),
(352, 18, '18256', 'EL PAUJÍL'),
(353, 18, '18410', 'LA MONTAÑITA'),
(354, 18, '18460', 'MILÁN'),
(355, 18, '18479', 'MORELIA'),
(356, 18, '18592', 'PUERTO RICO'),
(357, 18, '18610', 'SAN JOSÉ DEL FRAGUA'),
(358, 18, '18753', 'SAN VICENTE DEL CAGUÁN'),
(359, 18, '18756', 'SOLANO'),
(360, 18, '18785', 'SOLITA'),
(361, 18, '18860', 'VALPARAÍSO'),
(362, 19, '19001', 'POPAYÁN'),
(363, 19, '19022', 'ALMAGUER'),
(364, 19, '19050', 'ARGELIA'),
(365, 19, '19075', 'BALBOA'),
(366, 19, '19100', 'BOLÍVAR'),
(367, 19, '19110', 'BUENOS AIRES'),
(368, 19, '19130', 'CAJIBÍO'),
(369, 19, '19137', 'CALDONO'),
(370, 19, '19142', 'CALOTO'),
(371, 19, '19212', 'CORINTO'),
(372, 19, '19256', 'EL TAMBO'),
(373, 19, '19290', 'FLORENCIA'),
(374, 19, '19300', 'GUACHENÉ'),
(375, 19, '19318', 'GUAPÍ'),
(376, 19, '19355', 'INZÁ'),
(377, 19, '19364', 'JAMBALÓ'),
(378, 19, '19392', 'LA SIERRA'),
(379, 19, '19397', 'LA VEGA'),
(380, 19, '19418', 'LÓPEZ DE MICAY'),
(381, 19, '19450', 'MERCADERES'),
(382, 19, '19455', 'MIRANDA'),
(383, 19, '19473', 'MORALES'),
(384, 19, '19513', 'PADILLA'),
(385, 19, '19517', 'PÁEZ'),
(386, 19, '19532', 'PATÍA'),
(387, 19, '19533', 'PIAMONTE'),
(388, 19, '19548', 'PIENDAMÓ'),
(389, 19, '19573', 'PUERTO TEJADA'),
(390, 19, '19585', 'PURACÉ'),
(391, 19, '19622', 'ROSAS'),
(392, 19, '19693', 'SAN SEBASTIÁN'),
(393, 19, '19698', 'SANTANDER DE QUILICHAO'),
(394, 19, '19701', 'SANTA ROSA'),
(395, 19, '19743', 'SILVIA'),
(396, 19, '19760', 'SOTARA'),
(397, 19, '19780', 'SUÁREZ'),
(398, 19, '19785', 'SUCRE'),
(399, 19, '19807', 'TIMBÍO'),
(400, 19, '19809', 'TIMBIQUÍ'),
(401, 19, '19821', 'TORIBÍO'),
(402, 19, '19824', 'TOTORÓ'),
(403, 19, '19845', 'VILLA RICA'),
(404, 20, '20001', 'VALLEDUPAR'),
(405, 20, '20011', 'AGUACHICA'),
(406, 20, '20013', 'AGUSTÍN CODAZZI'),
(407, 20, '20032', 'ASTREA'),
(408, 20, '20045', 'BECERRIL'),
(409, 20, '20060', 'BOSCONIA'),
(410, 20, '20175', 'CHIMICHAGUA'),
(411, 20, '20178', 'CHIRIGUANÁ'),
(412, 20, '20228', 'CURUMANÍ'),
(413, 20, '20238', 'EL COPEY'),
(414, 20, '20250', 'EL PASO'),
(415, 20, '20295', 'GAMARRA'),
(416, 20, '20310', 'GONZÁLEZ'),
(417, 20, '20383', 'LA GLORIA'),
(418, 20, '20400', 'LA JAGUA DE IBIRICO'),
(419, 20, '20443', 'MANAURE BALCÓN DEL CESAR'),
(420, 20, '20517', 'PAILITAS'),
(421, 20, '20550', 'PELAYA'),
(422, 20, '20570', 'PUEBLO BELLO'),
(423, 20, '20614', 'RÍO DE ORO'),
(424, 20, '20621', 'LA PAZ'),
(425, 20, '20710', 'SAN ALBERTO'),
(426, 20, '20750', 'SAN DIEGO'),
(427, 20, '20770', 'SAN MARTÍN'),
(428, 20, '20787', 'TAMALAMEQUE'),
(429, 23, '23001', 'MONTERÍA'),
(430, 23, '23068', 'AYAPEL'),
(431, 23, '23079', 'BUENAVISTA'),
(432, 23, '23090', 'CANALETE'),
(433, 23, '23162', 'CERETÉ'),
(434, 23, '23168', 'CHIMÁ'),
(435, 23, '23182', 'CHINÚ'),
(436, 23, '23189', 'CIÉNAGA DE ORO'),
(437, 23, '23300', 'COTORRA'),
(438, 23, '23350', 'LA APARTADA'),
(439, 23, '23417', 'LORICA'),
(440, 23, '23419', 'LOS CÓRDOBAS'),
(441, 23, '23464', 'MOMIL'),
(442, 23, '23466', 'MONTELÍBANO'),
(443, 23, '23500', 'MOÑITOS'),
(444, 23, '23555', 'PLANETA RICA'),
(445, 23, '23570', 'PUEBLO NUEVO'),
(446, 23, '23574', 'PUERTO ESCONDIDO'),
(447, 23, '23580', 'PUERTO LIBERTADOR'),
(448, 23, '23586', 'PURÍSIMA DE LA CONCEPCIÓN'),
(449, 23, '23660', 'SAHAGÚN'),
(450, 23, '23670', 'SAN ANDRÉS DE SOTAVENTO'),
(451, 23, '23672', 'SAN ANTERO'),
(452, 23, '23675', 'SAN BERNARDO DEL VIENTO'),
(453, 23, '23678', 'SAN CARLOS'),
(454, 23, '23682', 'SAN JOSÉ DE URÉ'),
(455, 23, '23686', 'SAN PELAYO'),
(456, 23, '23807', 'TIERRALTA'),
(457, 23, '23815', 'TUCHÍN'),
(458, 23, '23855', 'VALENCIA'),
(459, 25, '25001', 'AGUA DE DIOS'),
(460, 25, '25019', 'ALBÁN'),
(461, 25, '25035', 'ANAPOIMA'),
(462, 25, '25040', 'ANOLAIMA'),
(463, 25, '25053', 'ARBELÁEZ'),
(464, 25, '25086', 'BELTRÁN'),
(465, 25, '25095', 'BITUIMA'),
(466, 25, '25099', 'BOJACÁ'),
(467, 25, '25120', 'CABRERA'),
(468, 25, '25123', 'CACHIPAY'),
(469, 25, '25126', 'CAJICÁ'),
(470, 25, '25148', 'CAPARRAPÍ'),
(471, 25, '25151', 'CÁQUEZA'),
(472, 25, '25154', 'CARMEN DE CARUPA'),
(473, 25, '25168', 'CHAGUANÍ'),
(474, 25, '25175', 'CHÍA'),
(475, 25, '25178', 'CHIPAQUE'),
(476, 25, '25181', 'CHOACHÍ'),
(477, 25, '25183', 'CHOCONTÁ'),
(478, 25, '25200', 'COGUA'),
(479, 25, '25214', 'COTA'),
(480, 25, '25224', 'CUCUNUBÁ'),
(481, 25, '25245', 'EL COLEGIO'),
(482, 25, '25258', 'EL PEÑÓN'),
(483, 25, '25260', 'EL ROSAL'),
(484, 25, '25269', 'FACATATIVÁ'),
(485, 25, '25279', 'FÓMEQUE'),
(486, 25, '25281', 'FOSCA'),
(487, 25, '25286', 'FUNZA'),
(488, 25, '25288', 'FÚQUENE'),
(489, 25, '25290', 'FUSAGASUGÁ'),
(490, 25, '25293', 'GACHALÁ'),
(491, 25, '25295', 'GACHANCIPÁ'),
(492, 25, '25297', 'GACHETÁ'),
(493, 25, '25299', 'GAMA'),
(494, 25, '25307', 'GIRARDOT'),
(495, 25, '25312', 'GRANADA'),
(496, 25, '25317', 'GUACHETÁ'),
(497, 25, '25320', 'GUADUAS'),
(498, 25, '25322', 'GUASCA'),
(499, 25, '25324', 'GUATAQUÍ'),
(500, 25, '25326', 'GUATAVITA'),
(501, 25, '25328', 'GUAYABAL DE SÍQUIMA'),
(502, 25, '25335', 'GUAYABETAL'),
(503, 25, '25339', 'GUTIÉRREZ'),
(504, 25, '25368', 'JERUSALÉN'),
(505, 25, '25372', 'JUNÍN'),
(506, 25, '25377', 'LA CALERA'),
(507, 25, '25386', 'LA MESA'),
(508, 25, '25394', 'LA PALMA'),
(509, 25, '25398', 'LA PEÑA'),
(510, 25, '25402', 'LA VEGA'),
(511, 25, '25407', 'LENGUAZAQUE'),
(512, 25, '25426', 'MACHETÁ'),
(513, 25, '25430', 'MADRID'),
(514, 25, '25436', 'MANTA'),
(515, 25, '25438', 'MEDINA'),
(516, 25, '25473', 'MOSQUERA'),
(517, 25, '25483', 'NARIÑO'),
(518, 25, '25486', 'NEMOCÓN'),
(519, 25, '25488', 'NILO'),
(520, 25, '25489', 'NIMAIMA'),
(521, 25, '25491', 'NOCAIMA'),
(522, 25, '25506', 'VENECIA'),
(523, 25, '25513', 'PACHO'),
(524, 25, '25518', 'PAIME'),
(525, 25, '25524', 'PANDI'),
(526, 25, '25530', 'PARATEBUENO'),
(527, 25, '25535', 'PASCA'),
(528, 25, '25572', 'PUERTO SALGAR'),
(529, 25, '25580', 'PULÍ'),
(530, 25, '25592', 'QUEBRADANEGRA'),
(531, 25, '25594', 'QUETAME'),
(532, 25, '25596', 'QUIPILE'),
(533, 25, '25599', 'APULO'),
(534, 25, '25612', 'RICAURTE'),
(535, 25, '25645', 'SAN ANTONIO DEL TEQUENDAMA'),
(536, 25, '25649', 'SAN BERNARDO'),
(537, 25, '25653', 'SAN CAYETANO'),
(538, 25, '25658', 'SAN FRANCISCO'),
(539, 25, '25662', 'SAN JUAN DE RIOSECO'),
(540, 25, '25718', 'SASAIMA'),
(541, 25, '25736', 'SESQUILÉ'),
(542, 25, '25740', 'SIBATÉ'),
(543, 25, '25743', 'SILVANIA'),
(544, 25, '25745', 'SIMIJACA'),
(545, 25, '25754', 'SOACHA'),
(546, 25, '25758', 'SOPÓ'),
(547, 25, '25769', 'SUBACHOQUE'),
(548, 25, '25772', 'SUESCA'),
(549, 25, '25777', 'SUPATÁ'),
(550, 25, '25779', 'SUSA'),
(551, 25, '25781', 'SUTATAUSA'),
(552, 25, '25785', 'TABIO'),
(553, 25, '25793', 'TAUSA'),
(554, 25, '25797', 'TENA'),
(555, 25, '25799', 'TENJO'),
(556, 25, '25805', 'TIBACUY'),
(557, 25, '25807', 'TIBIRITA'),
(558, 25, '25815', 'TOCAIMA'),
(559, 25, '25817', 'TOCANCIPÁ'),
(560, 25, '25823', 'TOPAIPÍ'),
(561, 25, '25839', 'UBALÁ'),
(562, 25, '25841', 'UBAQUE'),
(563, 25, '25843', 'VILLA DE SAN DIEGO DE UBATÉ'),
(564, 25, '25845', 'UNE'),
(565, 25, '25851', 'ÚTICA'),
(566, 25, '25862', 'VERGARA'),
(567, 25, '25867', 'VIANÍ'),
(568, 25, '25871', 'VILLAGÓMEZ'),
(569, 25, '25873', 'VILLAPINZÓN'),
(570, 25, '25875', 'VILLETA'),
(571, 25, '25878', 'VIOTÁ'),
(572, 25, '25885', 'YACOPÍ'),
(573, 25, '25898', 'ZIPACÓN'),
(574, 25, '25899', 'ZIPAQUIRÁ'),
(575, 27, '27001', 'QUIBDÓ'),
(576, 27, '27006', 'ACANDÍ'),
(577, 27, '27025', 'ALTO BAUDÓ'),
(578, 27, '27050', 'ATRATO'),
(579, 27, '27073', 'BAGADÓ'),
(580, 27, '27075', 'BAHÍA SOLANO'),
(581, 27, '27077', 'BAJO BAUDÓ'),
(582, 27, '27099', 'BOJAYÁ'),
(583, 27, '27135', 'EL CANTÓN DEL SAN PABLO'),
(584, 27, '27150', 'CARMEN DEL DARIÉN'),
(585, 27, '27160', 'CÉRTEGUI'),
(586, 27, '27205', 'CONDOTO'),
(587, 27, '27245', 'EL CARMEN DE ATRATO'),
(588, 27, '27250', 'EL LITORAL DEL SAN JUAN'),
(589, 27, '27361', 'ISTMINA'),
(590, 27, '27372', 'JURADÓ'),
(591, 27, '27413', 'LLORÓ'),
(592, 27, '27425', 'MEDIO ATRATO'),
(593, 27, '27430', 'MEDIO BAUDÓ'),
(594, 27, '27450', 'MEDIO SAN JUAN'),
(595, 27, '27491', 'NÓVITA'),
(596, 27, '27495', 'NUQUÍ'),
(597, 27, '27580', 'RÍO IRÓ'),
(598, 27, '27600', 'RÍO QUITO'),
(599, 27, '27615', 'RIOSUCIO'),
(600, 27, '27660', 'SAN JOSÉ DEL PALMAR'),
(601, 27, '27745', 'SIPÍ'),
(602, 27, '27787', 'TADÓ'),
(603, 27, '27800', 'UNGUÍA'),
(604, 27, '27810', 'UNIÓN PANAMERICANA'),
(605, 41, '41001', 'NEIVA'),
(606, 41, '41006', 'ACEVEDO'),
(607, 41, '41013', 'AGRADO'),
(608, 41, '41016', 'AIPE'),
(609, 41, '41020', 'ALGECIRAS'),
(610, 41, '41026', 'ALTAMIRA'),
(611, 41, '41078', 'BARAYA'),
(612, 41, '41132', 'CAMPOALEGRE'),
(613, 41, '41206', 'COLOMBIA'),
(614, 41, '41244', 'ELÍAS'),
(615, 41, '41298', 'GARZÓN'),
(616, 41, '41306', 'GIGANTE'),
(617, 41, '41319', 'GUADALUPE'),
(618, 41, '41349', 'HOBO'),
(619, 41, '41357', 'ÍQUIRA'),
(620, 41, '41359', 'ISNOS'),
(621, 41, '41378', 'LA ARGENTINA'),
(622, 41, '41396', 'LA PLATA'),
(623, 41, '41483', 'NÁTAGA'),
(624, 41, '41503', 'OPORAPA'),
(625, 41, '41518', 'PAICOL'),
(626, 41, '41524', 'PALERMO'),
(627, 41, '41530', 'PALESTINA'),
(628, 41, '41548', 'PITAL'),
(629, 41, '41551', 'PITALITO'),
(630, 41, '41615', 'RIVERA'),
(631, 41, '41660', 'SALADOBLANCO'),
(632, 41, '41668', 'SAN AGUSTÍN'),
(633, 41, '41676', 'SANTA MARÍA'),
(634, 41, '41770', 'SUAZA'),
(635, 41, '41791', 'TARQUI'),
(636, 41, '41797', 'TESALIA'),
(637, 41, '41799', 'TELLO'),
(638, 41, '41801', 'TERUEL'),
(639, 41, '41807', 'TIMANÁ'),
(640, 41, '41872', 'VILLAVIEJA'),
(641, 41, '41885', 'YAGUARÁ'),
(642, 44, '44001', 'RIOHACHA'),
(643, 44, '44035', 'ALBANIA'),
(644, 44, '44078', 'BARRANCAS'),
(645, 44, '44090', 'DIBULLA'),
(646, 44, '44098', 'DISTRACCIÓN'),
(647, 44, '44110', 'EL MOLINO'),
(648, 44, '44279', 'FONSECA'),
(649, 44, '44378', 'HATONUEVO'),
(650, 44, '44420', 'LA JAGUA DEL PILAR'),
(651, 44, '44430', 'MAICAO'),
(652, 44, '44560', 'MANAURE'),
(653, 44, '44650', 'SAN JUAN DEL CESAR'),
(654, 44, '44847', 'URIBIA'),
(655, 44, '44855', 'URUMITA'),
(656, 44, '44874', 'VILLANUEVA'),
(657, 47, '47001', 'SANTA MARTA'),
(658, 47, '47030', 'ALGARROBO'),
(659, 47, '47053', 'ARACATACA'),
(660, 47, '47058', 'ARIGUANÍ'),
(661, 47, '47161', 'CERRO DE SAN ANTONIO'),
(662, 47, '47170', 'CHIVOLO'),
(663, 47, '47189', 'CIÉNAGA'),
(664, 47, '47205', 'CONCORDIA'),
(665, 47, '47245', 'EL BANCO'),
(666, 47, '47258', 'EL PIÑÓN'),
(667, 47, '47268', 'EL RETÉN'),
(668, 47, '47288', 'FUNDACIÓN'),
(669, 47, '47318', 'GUAMAL'),
(670, 47, '47460', 'NUEVA GRANADA'),
(671, 47, '47541', 'PEDRAZA'),
(672, 47, '47545', 'PIJIÑO DEL CARMEN'),
(673, 47, '47551', 'PIVIJAY'),
(674, 47, '47555', 'PLATO'),
(675, 47, '47570', 'PUEBLOVIEJO'),
(676, 47, '47605', 'REMOLINO'),
(677, 47, '47660', 'SABANAS DE SAN ÁNGEL'),
(678, 47, '47675', 'SALAMINA'),
(679, 47, '47692', 'SAN SEBASTIÁN DE BUENAVISTA'),
(680, 47, '47703', 'SAN ZENÓN'),
(681, 47, '47707', 'SANTA ANA'),
(682, 47, '47720', 'SANTA BÁRBARA DE PINTO'),
(683, 47, '47745', 'SITIONUEVO'),
(684, 47, '47798', 'TENERIFE'),
(685, 47, '47960', 'ZAPAYÁN'),
(686, 47, '47980', 'ZONA BANANERA'),
(687, 50, '50001', 'VILLAVICENCIO'),
(688, 50, '50006', 'ACACÍAS'),
(689, 50, '50110', 'BARRANCA DE UPÍA'),
(690, 50, '50124', 'CABUYARO'),
(691, 50, '50150', 'CASTILLA LA NUEVA'),
(692, 50, '50223', 'SAN LUIS DE CUBARRAL'),
(693, 50, '50226', 'CUMARAL'),
(694, 50, '50245', 'EL CALVARIO'),
(695, 50, '50251', 'EL CASTILLO'),
(696, 50, '50270', 'EL DORADO'),
(697, 50, '50287', 'FUENTE DE ORO'),
(698, 50, '50313', 'GRANADA'),
(699, 50, '50318', 'GUAMAL'),
(700, 50, '50325', 'MAPIRIPÁN'),
(701, 50, '50330', 'MESETAS'),
(702, 50, '50350', 'LA MACARENA'),
(703, 50, '50370', 'URIBE'),
(704, 50, '50400', 'LEJANÍAS'),
(705, 50, '50450', 'PUERTO CONCORDIA'),
(706, 50, '50568', 'PUERTO GAITÁN'),
(707, 50, '50573', 'PUERTO LÓPEZ'),
(708, 50, '50577', 'PUERTO LLERAS'),
(709, 50, '50590', 'PUERTO RICO'),
(710, 50, '50606', 'RESTREPO'),
(711, 50, '50680', 'SAN CARLOS DE GUAROA'),
(712, 50, '50683', 'SAN JUAN DE ARAMA'),
(713, 50, '50686', 'SAN JUANITO'),
(714, 50, '50689', 'SAN MARTÍN'),
(715, 50, '50711', 'VISTAHERMOSA'),
(716, 52, '52001', 'PASTO'),
(717, 52, '52019', 'ALBÁN'),
(718, 52, '52022', 'ALDANA'),
(719, 52, '52036', 'ANCUYÁ'),
(720, 52, '52051', 'ARBOLEDA'),
(721, 52, '52079', 'BARBACOAS'),
(722, 52, '52083', 'BELÉN'),
(723, 52, '52110', 'BUESACO'),
(724, 52, '52203', 'COLÓN'),
(725, 52, '52207', 'CONSACÁ'),
(726, 52, '52210', 'CONTADERO'),
(727, 52, '52215', 'CÓRDOBA'),
(728, 52, '52224', 'CUASPÚD'),
(729, 52, '52227', 'CUMBAL'),
(730, 52, '52233', 'CUMBITARA'),
(731, 52, '52240', 'CHACHAGÜÍ'),
(732, 52, '52250', 'EL CHARCO'),
(733, 52, '52254', 'EL PEÑOL'),
(734, 52, '52256', 'EL ROSARIO'),
(735, 52, '52258', 'EL TABLÓN DE GÓMEZ'),
(736, 52, '52260', 'EL TAMBO'),
(737, 52, '52287', 'FUNES'),
(738, 52, '52317', 'GUACHUCAL'),
(739, 52, '52320', 'GUAITARILLA'),
(740, 52, '52323', 'GUALMATÁN'),
(741, 52, '52352', 'ILES'),
(742, 52, '52354', 'IMUÉS'),
(743, 52, '52356', 'IPIALES'),
(744, 52, '52378', 'LA CRUZ'),
(745, 52, '52381', 'LA FLORIDA'),
(746, 52, '52385', 'LA LLANADA'),
(747, 52, '52390', 'LA TOLA'),
(748, 52, '52399', 'LA UNIÓN'),
(749, 52, '52405', 'LEIVA'),
(750, 52, '52411', 'LINARES'),
(751, 52, '52418', 'LOS ANDES'),
(752, 52, '52427', 'MAGÜÍ'),
(753, 52, '52435', 'MALLAMA'),
(754, 52, '52473', 'MOSQUERA'),
(755, 52, '52480', 'NARIÑO'),
(756, 52, '52490', 'OLAYA HERRERA'),
(757, 52, '52506', 'OSPINA'),
(758, 52, '52520', 'FRANCISCO PIZARRO'),
(759, 52, '52540', 'POLICARPA'),
(760, 52, '52560', 'POTOSÍ'),
(761, 52, '52565', 'PROVIDENCIA'),
(762, 52, '52573', 'PUERRES'),
(763, 52, '52585', 'PUPIALES'),
(764, 52, '52612', 'RICAURTE'),
(765, 52, '52621', 'ROBERTO PAYÁN'),
(766, 52, '52678', 'SAMANIEGO'),
(767, 52, '52683', 'SANDONÁ'),
(768, 52, '52685', 'SAN BERNARDO'),
(769, 52, '52687', 'SAN LORENZO'),
(770, 52, '52693', 'SAN PABLO'),
(771, 52, '52694', 'SAN PEDRO DE CARTAGO'),
(772, 52, '52696', 'SANTA BÁRBARA'),
(773, 52, '52699', 'SANTACRUZ'),
(774, 52, '52720', 'SAPUYES'),
(775, 52, '52786', 'TAMINANGO'),
(776, 52, '52788', 'TANGUA'),
(777, 52, '52835', 'SAN ANDRÉS DE TUMACO'),
(778, 52, '52838', 'TÚQUERRES'),
(779, 52, '52885', 'YACUANQUER'),
(780, 54, '54001', 'CÚCUTA'),
(781, 54, '54003', 'ÁBREGO'),
(782, 54, '54051', 'ARBOLEDAS'),
(783, 54, '54099', 'BOCHALEMA'),
(784, 54, '54109', 'BUCARASICA'),
(785, 54, '54125', 'CÁCOTA'),
(786, 54, '54128', 'CÁCHIRA'),
(787, 54, '54172', 'CHINÁCOTA'),
(788, 54, '54174', 'CHITAGÁ'),
(789, 54, '54206', 'CONVENCIÓN'),
(790, 54, '54223', 'CUCUTILLA'),
(791, 54, '54239', 'DURANIA'),
(792, 54, '54245', 'EL CARMEN'),
(793, 54, '54250', 'EL TARRA'),
(794, 54, '54261', 'EL ZULIA'),
(795, 54, '54313', 'GRAMALOTE'),
(796, 54, '54344', 'HACARÍ'),
(797, 54, '54347', 'HERRÁN'),
(798, 54, '54377', 'LABATECA'),
(799, 54, '54385', 'LA ESPERANZA'),
(800, 54, '54398', 'LA PLAYA'),
(801, 54, '54405', 'LOS PATIOS'),
(802, 54, '54418', 'LOURDES'),
(803, 54, '54480', 'MUTISCUA'),
(804, 54, '54498', 'OCAÑA'),
(805, 54, '54518', 'PAMPLONA'),
(806, 54, '54520', 'PAMPLONITA'),
(807, 54, '54553', 'PUERTO SANTANDER'),
(808, 54, '54599', 'RAGONVALIA'),
(809, 54, '54660', 'SALAZAR'),
(810, 54, '54670', 'SAN CALIXTO'),
(811, 54, '54673', 'SAN CAYETANO'),
(812, 54, '54680', 'SANTIAGO'),
(813, 54, '54720', 'SARDINATA'),
(814, 54, '54743', 'SILOS'),
(815, 54, '54800', 'TEORAMA'),
(816, 54, '54810', 'TIBÚ'),
(817, 54, '54820', 'TOLEDO'),
(818, 54, '54871', 'VILLA CARO'),
(819, 54, '54874', 'VILLA DEL ROSARIO'),
(820, 63, '63001', 'ARMENIA'),
(821, 63, '63111', 'BUENAVISTA'),
(822, 63, '63130', 'CALARCÁ'),
(823, 63, '63190', 'CIRCASIA'),
(824, 63, '63212', 'CÓRDOBA'),
(825, 63, '63272', 'FILANDIA'),
(826, 63, '63302', 'GÉNOVA'),
(827, 63, '63401', 'LA TEBAIDA'),
(828, 63, '63470', 'MONTENEGRO'),
(829, 63, '63548', 'PIJAO'),
(830, 63, '63594', 'QUIMBAYA'),
(831, 63, '63690', 'SALENTO'),
(832, 66, '66001', 'PEREIRA'),
(833, 66, '66045', 'APÍA'),
(834, 66, '66075', 'BALBOA'),
(835, 66, '66088', 'BELÉN DE UMBRÍA'),
(836, 66, '66170', 'DOSQUEBRADAS'),
(837, 66, '66318', 'GUÁTICA'),
(838, 66, '66383', 'LA CELIA'),
(839, 66, '66400', 'LA VIRGINIA'),
(840, 66, '66440', 'MARSELLA'),
(841, 66, '66456', 'MISTRATÓ'),
(842, 66, '66572', 'PUEBLO RICO'),
(843, 66, '66594', 'QUINCHÍA'),
(844, 66, '66682', 'SANTA ROSA DE CABAL'),
(845, 66, '66687', 'SANTUARIO'),
(846, 68, '68001', 'BUCARAMANGA'),
(847, 68, '68013', 'AGUADA'),
(848, 68, '68020', 'ALBANIA'),
(849, 68, '68051', 'ARATOCA'),
(850, 68, '68077', 'BARBOSA'),
(851, 68, '68079', 'BARICHARA'),
(852, 68, '68081', 'BARRANCABERMEJA'),
(853, 68, '68092', 'BETULIA'),
(854, 68, '68101', 'BOLÍVAR'),
(855, 68, '68121', 'CABRERA'),
(856, 68, '68132', 'CALIFORNIA'),
(857, 68, '68147', 'CAPITANEJO'),
(858, 68, '68152', 'CARCASÍ'),
(859, 68, '68160', 'CEPITÁ'),
(860, 68, '68162', 'CERRITO'),
(861, 68, '68167', 'CHARALÁ'),
(862, 68, '68169', 'CHARTA'),
(863, 68, '68176', 'CHIMA'),
(864, 68, '68179', 'CHIPATÁ'),
(865, 68, '68190', 'CIMITARRA'),
(866, 68, '68207', 'CONCEPCIÓN'),
(867, 68, '68209', 'CONFINES'),
(868, 68, '68211', 'CONTRATACIÓN'),
(869, 68, '68217', 'COROMORO'),
(870, 68, '68229', 'CURITÍ'),
(871, 68, '68235', 'EL CARMEN DE CHUCURÍ'),
(872, 68, '68245', 'EL GUACAMAYO'),
(873, 68, '68250', 'EL PEÑÓN'),
(874, 68, '68255', 'EL PLAYÓN'),
(875, 68, '68264', 'ENCINO'),
(876, 68, '68266', 'ENCISO'),
(877, 68, '68271', 'FLORIÁN'),
(878, 68, '68276', 'FLORIDABLANCA'),
(879, 68, '68296', 'GALÁN'),
(880, 68, '68298', 'GÁMBITA'),
(881, 68, '68307', 'GIRÓN'),
(882, 68, '68318', 'GUACA'),
(883, 68, '68320', 'GUADALUPE'),
(884, 68, '68322', 'GUAPOTÁ'),
(885, 68, '68324', 'GUAVATÁ'),
(886, 68, '68327', 'GÜEPSA'),
(887, 68, '68344', 'HATO'),
(888, 68, '68368', 'JESÚS MARÍA'),
(889, 68, '68370', 'JORDÁN'),
(890, 68, '68377', 'LA BELLEZA'),
(891, 68, '68385', 'LANDÁZURI'),
(892, 68, '68397', 'LA PAZ'),
(893, 68, '68406', 'LEBRIJA'),
(894, 68, '68418', 'LOS SANTOS'),
(895, 68, '68425', 'MACARAVITA'),
(896, 68, '68432', 'MÁLAGA'),
(897, 68, '68444', 'MATANZA'),
(898, 68, '68464', 'MOGOTES'),
(899, 68, '68468', 'MOLAGAVITA'),
(900, 68, '68498', 'OCAMONTE'),
(901, 68, '68500', 'OIBA'),
(902, 68, '68502', 'ONZAGA'),
(903, 68, '68522', 'PALMAR'),
(904, 68, '68524', 'PALMAS DEL SOCORRO'),
(905, 68, '68533', 'PÁRAMO'),
(906, 68, '68547', 'PIEDECUESTA'),
(907, 68, '68549', 'PINCHOTE'),
(908, 68, '68572', 'PUENTE NACIONAL'),
(909, 68, '68573', 'PUERTO PARRA'),
(910, 68, '68575', 'PUERTO WILCHES'),
(911, 68, '68615', 'RIONEGRO'),
(912, 68, '68655', 'SABANA DE TORRES'),
(913, 68, '68669', 'SAN ANDRÉS'),
(914, 68, '68673', 'SAN BENITO'),
(915, 68, '68679', 'SAN GIL'),
(916, 68, '68682', 'SAN JOAQUÍN'),
(917, 68, '68684', 'SAN JOSÉ DE MIRANDA'),
(918, 68, '68686', 'SAN MIGUEL'),
(919, 68, '68689', 'SAN VICENTE DE CHUCURÍ'),
(920, 68, '68705', 'SANTA BÁRBARA'),
(921, 68, '68720', 'SANTA HELENA DEL OPÓN'),
(922, 68, '68745', 'SIMACOTA'),
(923, 68, '68755', 'SOCORRO'),
(924, 68, '68770', 'SUAITA'),
(925, 68, '68773', 'SUCRE'),
(926, 68, '68780', 'SURATÁ'),
(927, 68, '68820', 'TONA'),
(928, 68, '68855', 'VALLE DE SAN JOSÉ'),
(929, 68, '68861', 'VÉLEZ'),
(930, 68, '68867', 'VETAS'),
(931, 68, '68872', 'VILLANUEVA'),
(932, 68, '68895', 'ZAPATOCA'),
(933, 70, '70001', 'SINCELEJO'),
(934, 70, '70110', 'BUENAVISTA'),
(935, 70, '70124', 'CAIMITO'),
(936, 70, '70204', 'COLOSO'),
(937, 70, '70215', 'COROZAL'),
(938, 70, '70221', 'COVEÑAS'),
(939, 70, '70230', 'CHALÁN'),
(940, 70, '70233', 'EL ROBLE'),
(941, 70, '70235', 'GALERAS'),
(942, 70, '70265', 'GUARANDA'),
(943, 70, '70400', 'LA UNIÓN'),
(944, 70, '70418', 'LOS PALMITOS'),
(945, 70, '70429', 'MAJAGUAL'),
(946, 70, '70473', 'MORROA'),
(947, 70, '70508', 'OVEJAS'),
(948, 70, '70523', 'PALMITO'),
(949, 70, '70670', 'SAMPUÉS'),
(950, 70, '70678', 'SAN BENITO ABAD'),
(951, 70, '70702', 'SAN JUAN DE BETULIA'),
(952, 70, '70708', 'SAN MARCOS'),
(953, 70, '70713', 'SAN ONOFRE'),
(954, 70, '70717', 'SAN PEDRO'),
(955, 70, '70742', 'SAN LUIS DE SINCÉ'),
(956, 70, '70771', 'SUCRE'),
(957, 70, '70820', 'SANTIAGO DE TOLÚ'),
(958, 70, '70823', 'TOLÚ VIEJO'),
(959, 73, '73001', 'IBAGUÉ'),
(960, 73, '73024', 'ALPUJARRA'),
(961, 73, '73026', 'ALVARADO'),
(962, 73, '73030', 'AMBALEMA'),
(963, 73, '73043', 'ANZOÁTEGUI'),
(964, 73, '73055', 'ARMERO GUAYABAL'),
(965, 73, '73067', 'ATACO'),
(966, 73, '73124', 'CAJAMARCA'),
(967, 73, '73148', 'CARMEN DE APICALÁ'),
(968, 73, '73152', 'CASABIANCA'),
(969, 73, '73168', 'CHAPARRAL'),
(970, 73, '73200', 'COELLO'),
(971, 73, '73217', 'COYAIMA'),
(972, 73, '73226', 'CUNDAY'),
(973, 73, '73236', 'DOLORES'),
(974, 73, '73268', 'ESPINAL'),
(975, 73, '73270', 'FALAN'),
(976, 73, '73275', 'FLANDES'),
(977, 73, '73283', 'FRESNO'),
(978, 73, '73319', 'GUAMO'),
(979, 73, '73347', 'HERVEO'),
(980, 73, '73349', 'HONDA'),
(981, 73, '73352', 'ICONONZO'),
(982, 73, '73408', 'LÉRIDA'),
(983, 73, '73411', 'LÍBANO'),
(984, 73, '73443', 'SAN SEBASTIÁN DE MARIQUITA'),
(985, 73, '73449', 'MELGAR'),
(986, 73, '73461', 'MURILLO'),
(987, 73, '73483', 'NATAGAIMA'),
(988, 73, '73504', 'ORTEGA'),
(989, 73, '73520', 'PALOCABILDO'),
(990, 73, '73547', 'PIEDRAS'),
(991, 73, '73555', 'PLANADAS'),
(992, 73, '73563', 'PRADO'),
(993, 73, '73585', 'PURIFICACIÓN'),
(994, 73, '73616', 'RIOBLANCO'),
(995, 73, '73622', 'RONCESVALLES'),
(996, 73, '73624', 'ROVIRA'),
(997, 73, '73671', 'SALDAÑA'),
(998, 73, '73675', 'SAN ANTONIO'),
(999, 73, '73678', 'SAN LUIS'),
(1000, 73, '73686', 'SANTA ISABEL'),
(1001, 73, '73770', 'SUÁREZ'),
(1002, 73, '73854', 'VALLE DE SAN JUAN'),
(1003, 73, '73861', 'VENADILLO'),
(1004, 73, '73870', 'VILLAHERMOSA'),
(1005, 73, '73873', 'VILLARRICA'),
(1006, 76, '76001', 'CALI'),
(1007, 76, '76020', 'ALCALÁ'),
(1008, 76, '76036', 'ANDALUCÍA'),
(1009, 76, '76041', 'ANSERMANUEVO'),
(1010, 76, '76054', 'ARGELIA'),
(1011, 76, '76100', 'BOLÍVAR'),
(1012, 76, '76109', 'BUENAVENTURA'),
(1013, 76, '76111', 'GUADALAJARA DE BUGA'),
(1014, 76, '76113', 'BUGALAGRANDE'),
(1015, 76, '76122', 'CAICEDONIA'),
(1016, 76, '76126', 'CALIMA'),
(1017, 76, '76130', 'CANDELARIA'),
(1018, 76, '76147', 'CARTAGO'),
(1019, 76, '76233', 'DAGUA'),
(1020, 76, '76243', 'EL ÁGUILA'),
(1021, 76, '76246', 'EL CAIRO'),
(1022, 76, '76248', 'EL CERRITO'),
(1023, 76, '76250', 'EL DOVIO'),
(1024, 76, '76275', 'FLORIDA'),
(1025, 76, '76306', 'GINEBRA'),
(1026, 76, '76318', 'GUACARÍ'),
(1027, 76, '76364', 'JAMUNDÍ'),
(1028, 76, '76377', 'LA CUMBRE'),
(1029, 76, '76400', 'LA UNIÓN'),
(1030, 76, '76403', 'LA VICTORIA'),
(1031, 76, '76497', 'OBANDO'),
(1032, 76, '76520', 'PALMIRA'),
(1033, 76, '76563', 'PRADERA'),
(1034, 76, '76606', 'RESTREPO'),
(1035, 76, '76616', 'RIOFRÍO'),
(1036, 76, '76622', 'ROLDANILLO'),
(1037, 76, '76670', 'SAN PEDRO'),
(1038, 76, '76736', 'SEVILLA'),
(1039, 76, '76823', 'TORO'),
(1040, 76, '76828', 'TRUJILLO'),
(1041, 76, '76834', 'TULUÁ'),
(1042, 76, '76845', 'ULLOA'),
(1043, 76, '76863', 'VERSALLES'),
(1044, 76, '76869', 'VIJES'),
(1045, 76, '76890', 'YOTOCO'),
(1046, 76, '76892', 'YUMBO'),
(1047, 76, '76895', 'ZARZAL'),
(1048, 81, '81001', 'ARAUCA'),
(1049, 81, '81065', 'ARAUQUITA'),
(1050, 81, '81220', 'CRAVO NORTE'),
(1051, 81, '81300', 'FORTUL'),
(1052, 81, '81591', 'PUERTO RONDÓN'),
(1053, 81, '81736', 'SARAVENA'),
(1054, 81, '81794', 'TAME'),
(1055, 85, '85001', 'YOPAL'),
(1056, 85, '85010', 'AGUAZUL'),
(1057, 85, '85015', 'CHÁMEZA'),
(1058, 85, '85125', 'HATO COROZAL'),
(1059, 85, '85136', 'LA SALINA'),
(1060, 85, '85139', 'MANÍ'),
(1061, 85, '85162', 'MONTERREY'),
(1062, 85, '85225', 'NUNCHÍA'),
(1063, 85, '85230', 'OROCUÉ'),
(1064, 85, '85250', 'PAZ DE ARIPORO'),
(1065, 85, '85263', 'PORE'),
(1066, 85, '85279', 'RECETOR'),
(1067, 85, '85300', 'SABANALARGA'),
(1068, 85, '85315', 'SÁCAMA'),
(1069, 85, '85325', 'SAN LUIS DE PALENQUE'),
(1070, 85, '85400', 'TÁMARA'),
(1071, 85, '85410', 'TAURAMENA'),
(1072, 85, '85430', 'TRINIDAD'),
(1073, 85, '85440', 'VILLANUEVA'),
(1074, 86, '86001', 'MOCOA'),
(1075, 86, '86219', 'COLÓN'),
(1076, 86, '86320', 'ORITO'),
(1077, 86, '86568', 'PUERTO ASÍS'),
(1078, 86, '86569', 'PUERTO CAICEDO'),
(1079, 86, '86571', 'PUERTO GUZMÁN'),
(1080, 86, '86573', 'PUERTO LEGUÍZAMO'),
(1081, 86, '86749', 'SIBUNDOY'),
(1082, 86, '86755', 'SAN FRANCISCO'),
(1083, 86, '86757', 'SAN MIGUEL'),
(1084, 86, '86760', 'SANTIAGO'),
(1085, 86, '86865', 'VALLE DEL GUAMUEZ'),
(1086, 86, '86885', 'VILLAGARZÓN'),
(1087, 88, '88001', 'SAN ANDRÉS'),
(1088, 88, '88564', 'PROVIDENCIA'),
(1089, 91, '91001', 'LETICIA'),
(1090, 91, '91263', 'EL ENCANTO'),
(1091, 91, '91405', 'LA CHORRERA'),
(1092, 91, '91407', 'LA PEDRERA'),
(1093, 91, '91430', 'LA VICTORIA'),
(1094, 91, '91460', 'MIRITÍ - PARANÁ'),
(1095, 91, '91530', 'PUERTO ALEGRÍA'),
(1096, 91, '91536', 'PUERTO ARICA'),
(1097, 91, '91540', 'PUERTO NARIÑO'),
(1098, 91, '91669', 'PUERTO SANTANDER'),
(1099, 91, '91798', 'TARAPACÁ'),
(1100, 94, '94001', 'INÍRIDA'),
(1101, 94, '94343', 'BARRANCO MINAS'),
(1102, 94, '94663', 'MAPIRIPANA'),
(1103, 94, '94883', 'SAN FELIPE'),
(1104, 94, '94884', 'PUERTO COLOMBIA'),
(1105, 94, '94885', 'LA GUADALUPE'),
(1106, 94, '94886', 'CACAHUAL'),
(1107, 94, '94887', 'PANA PANA'),
(1108, 94, '94888', 'MORICHAL'),
(1109, 95, '95001', 'SAN JOSÉ DEL GUAVIARE'),
(1110, 95, '95015', 'CALAMAR'),
(1111, 95, '95025', 'EL RETORNO'),
(1112, 95, '95200', 'MIRAFLORES'),
(1113, 97, '97001', 'MITÚ'),
(1114, 97, '97161', 'CARURÚ'),
(1115, 97, '97511', 'PACOA'),
(1116, 97, '97666', 'TARAIRA'),
(1117, 97, '97777', 'PAPUNAUA'),
(1118, 97, '97889', 'YAVARATÉ'),
(1119, 99, '99001', 'PUERTO CARREÑO'),
(1120, 99, '99524', 'LA PRIMAVERA'),
(1121, 99, '99624', 'SANTA ROSALÍA'),
(1122, 99, '99773', 'CUMARIBO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `referencia` varchar(100) DEFAULT NULL,
  `valor` decimal(15,2) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp(),
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(15,2) DEFAULT 0.00,
  `limite_usuarios` int(11) DEFAULT 1,
  `limite_facturas` int(11) DEFAULT 100,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `precio`, `limite_usuarios`, `limite_facturas`, `estado`, `created_at`) VALUES
(1, 'PLAN GRATIS', 0.00, 1, 100, 1, '2026-05-19 18:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `tipo` enum('PRODUCTO','SERVICIO') NOT NULL DEFAULT 'PRODUCTO',
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(15,2) NOT NULL,
  `iva` decimal(5,2) DEFAULT 0.00,
  `stock` int(11) DEFAULT 0,
  `unidad_medida` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `empresa_id`, `tipo`, `codigo`, `nombre`, `descripcion`, `precio`, `iva`, `stock`, `unidad_medida`, `estado`, `created_at`, `imagen`) VALUES
(2, 2, 'PRODUCTO', '0101', 'Camara', 'camara bala lente 2.3mm dahua', 75000.00, 0.00, 0, 'unidad', 1, '2026-05-20 14:49:59', '1779288743_Captura de pantalla 2026-05-12 091227.png'),
(3, 2, 'SERVICIO', '0202', 'Manteniemiento', 'manteniento preventivo', 15000.00, 0.00, 0, 'unidad', 1, '2026-05-20 14:50:37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimenes`
--

CREATE TABLE `regimenes` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre` varchar(150) NOT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `regimenes`
--

INSERT INTO `regimenes` (`id`, `codigo`, `nombre`, `estado`, `created_at`) VALUES
(1, '48', 'Responsable del IVA', 1, '2026-05-19 20:43:42'),
(2, '49', 'No responsable de IVA', 1, '2026-05-19 20:43:42'),
(3, 'SIMPLE', 'Régimen SIMPLE', 1, '2026-05-19 20:43:42'),
(4, 'COMUN', 'Régimen Ordinario', 1, '2026-05-19 20:43:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsabilidades_fiscales`
--

CREATE TABLE `responsabilidades_fiscales` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `responsabilidades_fiscales`
--

INSERT INTO `responsabilidades_fiscales` (`id`, `codigo`, `nombre`, `estado`, `created_at`) VALUES
(1, 'O-13', 'Gran contribuyente', 1, '2026-05-19 20:42:43'),
(2, 'O-15', 'Autorretenedor', 1, '2026-05-19 20:42:43'),
(3, 'O-23', 'Agente de retención IVA', 1, '2026-05-19 20:42:43'),
(4, 'O-47', 'Régimen simple de tributación', 1, '2026-05-19 20:42:43'),
(5, 'O-49', 'No responsable de IVA', 1, '2026-05-19 20:42:43'),
(6, 'O-50', 'No responsable de INC', 1, '2026-05-19 20:42:43'),
(7, 'O-51', 'Usuario aduanero', 1, '2026-05-19 20:42:43'),
(8, 'O-52', 'Facturador electrónico', 1, '2026-05-19 20:42:43'),
(9, 'O-53', 'Autorretención especial', 1, '2026-05-19 20:42:43'),
(10, 'R-99-PN', 'No aplica - Persona Natural', 1, '2026-05-19 20:42:43'),
(11, 'R-99-PJ', 'No aplica - Persona Jurídica', 1, '2026-05-19 20:42:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

CREATE TABLE `tipos_documento` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `tipo_persona` enum('NATURAL','JURIDICA','AMBAS') DEFAULT 'AMBAS',
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipos_documento`
--

INSERT INTO `tipos_documento` (`id`, `codigo`, `nombre`, `tipo_persona`, `estado`, `created_at`) VALUES
(1, '13', 'Cédula de ciudadanía', 'NATURAL', 1, '2026-05-19 20:42:26'),
(2, '12', 'Tarjeta de identidad', 'NATURAL', 1, '2026-05-19 20:42:26'),
(3, '11', 'Registro civil', 'NATURAL', 1, '2026-05-19 20:42:26'),
(4, '22', 'Cédula de extranjería', 'NATURAL', 1, '2026-05-19 20:42:26'),
(5, '31', 'NIT', 'JURIDICA', 1, '2026-05-19 20:42:26'),
(6, '41', 'Pasaporte', 'NATURAL', 1, '2026-05-19 20:42:26'),
(7, '42', 'Documento extranjero', 'NATURAL', 1, '2026-05-19 20:42:26'),
(8, '50', 'NIT de otro país', 'JURIDICA', 1, '2026-05-19 20:42:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('SUPER_ADMIN','ADMIN','EMPLEADO') DEFAULT 'EMPLEADO',
  `foto` varchar(255) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `empresa_id`, `nombre`, `correo`, `password`, `rol`, `foto`, `ultimo_login`, `estado`, `created_at`) VALUES
(1, 2, 'SAUL FRAGUA NOVA', 'saul.fragua1988@gmail.com', '$2y$10$5HAXSwioYjKw5Z321kbU1O32VCc9JYBwqcHdV440JxqdJ.igeOU0a', 'ADMIN', NULL, '2026-05-20 10:26:22', 1, '2026-05-19 19:00:02'),
(2, 3, 'qwerty', '1@gmail.com', '$2y$10$BBLAo6bfXKxIZJNPxkt8cOlvA/Zm6PUDAGlezR90fHcFK4GG95TbK', 'ADMIN', NULL, '2026-05-19 21:36:32', 1, '2026-05-20 02:36:26'),
(3, 2, 'JUGADOR', 's1@gmail.com', '$2y$10$n9LFA3vn.xh6eL/Qd8cNaelN88TWGFvH8yp04McPd6Tp.ebLjU0DK', 'EMPLEADO', '1779280350_Captura de pantalla 2026-05-12 091415.png', '2026-05-20 07:32:45', 1, '2026-05-20 12:26:07'),
(4, 4, 'pedro', 'ss@gmail.com', '$2y$10$Xvc.8.MyZA3.AlMBq/nVZeyfcqRdbhsEXW2N7U7k8hRcNbc.p7tky', 'ADMIN', NULL, '2026-05-20 09:58:10', 1, '2026-05-20 14:58:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_numero_documento` (`numero_documento`),
  ADD KEY `idx_cliente_empresa` (`empresa_id`),
  ADD KEY `idx_tipo_documento` (`tipo_documento_id`),
  ADD KEY `idx_departamento` (`departamento_id`),
  ADD KEY `idx_municipio` (`municipio_id`),
  ADD KEY `idx_responsabilidad` (`responsabilidad_fiscal_id`),
  ADD KEY `idx_regimen` (`regimen_id`);

--
-- Indices de la tabla `configuracion_empresa`
--
ALTER TABLE `configuracion_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_config_empresa` (`empresa_id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresa_id` (`empresa_id`,`numero_cotizacion`),
  ADD KEY `fk_cotizacion_cliente` (`cliente_id`),
  ADD KEY `fk_cotizacion_usuario` (`usuario_id`),
  ADD KEY `idx_cotizacion_empresa` (`empresa_id`);

--
-- Indices de la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresa_id` (`empresa_id`,`numero_cuenta`),
  ADD KEY `fk_cuenta_cliente` (`cliente_id`),
  ADD KEY `fk_cuenta_usuario` (`usuario_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_cotizaciones`
--
ALTER TABLE `detalle_cotizaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_cotizacion` (`cotizacion_id`),
  ADD KEY `fk_detalle_cotizacion_producto` (`producto_id`);

--
-- Indices de la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_factura` (`factura_id`),
  ADD KEY `fk_detalle_producto` (`producto_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`),
  ADD KEY `fk_empresa_plan` (`plan_id`),
  ADD KEY `idx_empresa_departamento` (`departamento_id`),
  ADD KEY `idx_empresa_municipio` (`municipio_id`),
  ADD KEY `idx_empresa_regimen` (`regimen_id`),
  ADD KEY `idx_empresa_responsabilidad` (`responsabilidad_fiscal_id`),
  ADD KEY `idx_empresa_tipo_documento` (`tipo_documento_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresa_id` (`empresa_id`,`numero_factura`),
  ADD KEY `fk_factura_cliente` (`cliente_id`),
  ADD KEY `fk_factura_usuario` (`usuario_id`),
  ADD KEY `idx_factura_empresa` (`empresa_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventario_producto` (`producto_id`),
  ADD KEY `idx_inventario_empresa` (`empresa_id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pago_factura` (`factura_id`),
  ADD KEY `idx_pago_empresa` (`empresa_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empresa_id` (`empresa_id`,`codigo`),
  ADD KEY `idx_producto_empresa` (`empresa_id`);

--
-- Indices de la tabla `regimenes`
--
ALTER TABLE `regimenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `responsabilidades_fiscales`
--
ALTER TABLE `responsabilidades_fiscales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `idx_usuario_empresa` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `configuracion_empresa`
--
ALTER TABLE `configuracion_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `detalle_cotizaciones`
--
ALTER TABLE `detalle_cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `regimenes`
--
ALTER TABLE `regimenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `responsabilidades_fiscales`
--
ALTER TABLE `responsabilidades_fiscales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cliente_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `fk_cliente_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cliente_regimen` FOREIGN KEY (`regimen_id`) REFERENCES `regimenes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cliente_responsabilidad` FOREIGN KEY (`responsabilidad_fiscal_id`) REFERENCES `responsabilidades_fiscales` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cliente_tipo_documento` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipos_documento` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `configuracion_empresa`
--
ALTER TABLE `configuracion_empresa`
  ADD CONSTRAINT `fk_config_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `fk_cotizacion_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_cotizacion_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cotizacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `cuentas_cobro`
--
ALTER TABLE `cuentas_cobro`
  ADD CONSTRAINT `fk_cuenta_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_cuenta_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cuenta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalle_cotizaciones`
--
ALTER TABLE `detalle_cotizaciones`
  ADD CONSTRAINT `fk_detalle_cotizacion` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detalle_cotizacion_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD CONSTRAINT `fk_detalle_factura` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detalle_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresa_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empresa_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empresa_plan` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`),
  ADD CONSTRAINT `fk_empresa_regimen` FOREIGN KEY (`regimen_id`) REFERENCES `regimenes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empresa_responsabilidad` FOREIGN KEY (`responsabilidad_fiscal_id`) REFERENCES `responsabilidades_fiscales` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_empresa_tipo_documento` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipos_documento` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_factura_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_factura_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_factura_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_inventario_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_municipio_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pago_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pago_factura` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
