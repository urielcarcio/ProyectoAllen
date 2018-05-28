-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-05-2018 a las 20:11:16
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `allen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminsitradores`
--

DROP TABLE IF EXISTS `adminsitradores`;
CREATE TABLE IF NOT EXISTS `adminsitradores` (
  `id_administrador` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adminsitradores`
--

INSERT INTO `adminsitradores` (`id_administrador`, `nombre`, `apellidos`, `password`, `email`) VALUES
(2, 'Cyntia', 'Gonzalez Andrade', 'gato123', 'gato@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `catidad` int(20) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCompra`,`idUsuario`,`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `idUsuario`, `idProducto`, `fecha`, `catidad`, `estado`) VALUES
(96, 1, 100, '2018-05-18', 1, 'Acreditando pago'),
(96, 1, 8, '2018-05-18', 1, 'Acreditando pago'),
(96, 1, 94, '2018-05-18', 2, 'Acreditando pago'),
(95, 1, 8, '2018-05-17', 4, 'Acreditando pago'),
(94, 1, 10, '2018-05-12', 4, 'Acreditando pago'),
(93, 1, 26, '2018-05-12', 3, 'Acreditando pago'),
(92, 1, 26, '2018-05-12', 3, 'Acreditando pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(25) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `talla` varchar(12) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `adminsitradoresid_administrador` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FKproductos107286` (`adminsitradoresid_administrador`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `descripcion`, `precio`, `cantidad`, `tipo`, `genero`, `talla`, `color`, `img`, `adminsitradoresid_administrador`) VALUES
(8, 'Bermuda', 'Bermuda azul Bandonlino', 320, 10, 'Short', 'Mujer', 'Talla 8', 'Azul', '/img/productos/bermuda_azul_bandolino.jpg', 2),
(9, 'Bermuda', 'Bermuda azul', 350, 5, 'Short', 'Hombre', 'Talla 12P', 'Azul Marino', '/img/productos/bermuda_azul_marino.jpg', 2),
(10, 'Pantalon', 'Pantalon Aeropostale Mezclilla Color Azul', 390, 0, 'Pantalon', 'Hombre', '30', 'Azul', '/img/productos/bermuda_gris.jpg', 2),
(13, 'Billetera', 'Billetera TommyHilfiger color vino', 600, 5, 'Billetera', 'Hombre', 'Unitalla', 'Vino', '/img/productos/billetera_tommy_vino.jpg', 2),
(14, 'Bleizer', 'Bleizer color verde Karper', 1100, 3, 'Bleizer', 'Hombre', 'Talla 8', 'Verde', '/img/productos/bleizer_verde.jpg', 2),
(15, 'Blusa', 'Blusa Aeropostale color verde limon', 180, 5, 'Blusa', 'Hombre', 'Talla L', 'Verde Limon', '/img/productos/blusa_aero_verde.jpg', 2),
(16, 'Blusa', 'Blusa Alfred Dunner', 420, 5, 'Blusa', 'Mujer', 'Talla L', 'Verde', '/img/productos/blusa_dunner_verde.jpg', 2),
(17, 'Blusa', 'Blusa Crown amarilla/blanca', 250, 5, 'Blusa', 'Mujer', 'Talla S', 'Amarillo/Blanco', '/img/productos/blusa_crown.jpg', 2),
(18, 'Blusa', 'Blusa American Eagle color verde', 200, 5, 'Blusa', 'Mujer', 'Talla L', 'Verde Limon', '/img/productos/blusa_american_eagle.jpg', 2),
(19, 'Blusa', 'Blusa American Eagle Outfitters', 220, 5, 'Blusa', 'Mujer', 'Talla L', 'Azul Marino', '/img/productos/blusa_outfitters.jpg', 2),
(20, 'Blusa', 'Blusa Jennie Marlis Petite', 320, 5, 'Blusa', 'Mujer', 'Talla PM', 'Azul', '/img/productos/blusa_jennie_petite.jpg', 2),
(21, 'Blusa', 'Blusa Azul Nautica', 150, 5, 'Blusa', 'Mujer', 'Talla 4', 'Azul', '/img/productos/blusa_nautica_azul.jpg', 2),
(22, 'Blusa', 'Blusa Fashion on Earth', 330, 5, 'Blusa', 'Mujer', 'Talla M', 'Azul/Blanco', '/img/productos/blusa_fashion_on_earth.jpg', 2),
(23, 'Blusa', 'Blusa Sunny Leigh Colores', 350, 5, 'Blusa', 'Mujer', 'Talla XS', 'Colores', '/img/productos/blusa_Sunny_leigh.jpg', 2),
(24, 'Blusa', 'Blusa Tommy Hilfiger Manga Larga', 350, 5, 'Blusa', 'Niño', 'Talla M', 'Azul', '/img/productos/blusa_tommy_mlarga.jpg', 2),
(25, 'Bolsa', 'Bolsa Tommy Hilfiger Negra/Beige', 650, 5, 'Bolsa', 'Mujer', 'Unitalla', 'Negro/Beige', '/img/productos/bolsa_tommy_negraB.jpg', 2),
(26, 'Bolsa', 'Bolsa Wilsons Leather Color Negro', 1200, 0, 'Bolsa', 'Mujer', 'Unitalla', 'Negro', '/img/productos/bolsa_wilsons_negraB.jpg', 2),
(27, 'Calcetines', 'Calcetin Robert Talbott', 50, 5, 'Calcetin', 'Hombre', 'Unitalla', 'Negro', '/img/productos/calcetin_robert.jpg', 2),
(28, 'Calcetines', 'Calcetin Tommy Hilfiger', 80, 5, 'Calcetin', 'Hombre', 'Unitalla', 'Blanco', '/img/productos/calcetin_tommy_blanco.jpg', 2),
(29, 'Calcetines', 'Calcetin Polo by Ralph Lauren azul', 50, 5, 'Calcetin', 'Hombre', 'Unitalla', 'Azul', '/img/productos/calcetin_polo_azul.jpg', 2),
(30, 'Calzones', 'Calzones Calvin Klein', 150, 5, 'Calzon', 'Hombre', 'Unitalla', 'Negro', '/img/productos/calzon_calvink_negro.jpg', 2),
(31, 'Calzones', 'Calzones Calvin Klein', 200, 5, 'Calzon', 'Hombre', 'Unitalla', 'Azul', '/img/productos/calzon_calvink_azul.jpg', 2),
(32, 'Camisa', 'Camisa Chaps Color rojo', 150, 5, 'Camisa', 'Hombre', 'Talla M', 'Roja', '/img/productos/camisa_chaps_roja.jpg', 2),
(33, 'Chamarra', 'Chamarra Guess color azul', 980, 5, 'Chamarra', 'Mujer', 'Talla M', 'Azul Marino', '/img/productos/chamarra_color_azul.jpg', 2),
(34, 'Cobija', 'Cobija para bebe', 250, 5, 'Camisas', 'Niño', 'Unitalla', 'Azul Cielo', '/img/productos/cobija.jpg', 2),
(35, 'Falda', 'Falda Aeropostale color azul', 280, 5, 'Falda', 'Mujer', 'Talla M', 'Azul Marino', '/img/productos/Falda_aeroA.jpg', 2),
(36, 'Falda', 'Falda Aeropostale color Verde', 280, 5, 'Falda', 'Mujer', 'Talla M', 'Verde', '/img/productos/Falda_aeroV.jpg', 2),
(37, 'Falda', 'Falda Jones New York color blanco', 320, 5, 'Falda', 'Mujer', 'Talla M', 'Blanco', '/img/productos/Falda_NY_B.jpg', 2),
(38, 'Falda', 'Falda Michael Kors color Cafe', 450, 5, 'Falda', 'Mujer', 'Talla M', 'Cafe', '/img/productos/Falda_MichaelK.jpg', 2),
(39, 'Gorra', 'Gorra Nike color verde', 220, 5, 'Gorra', 'Hombre', 'Unitalla', 'Verde', '/img/productos/Gorra_NikeV.jpg', 2),
(40, 'Gorra', 'Gorra Polo by Ralph Lauren color azul', 250, 5, 'Gorra', 'Hombre', 'Unitalla', 'Azul', '/img/productos/Gorra_PoloA.jpg', 2),
(41, 'Jumper', 'Jumper Indero Negro', 330, 5, 'Jumper', 'Hombre', 'Talla S', 'Negro', '/img/productos/Jumper_InNegro.jpg', 2),
(42, 'Jumper', 'Jumper Nursery Rhyme Niña Color Azul', 180, 5, 'Jumper', 'Niña', 'Talla Chica', 'Azul', '/img/productos/Jumper_RH6m.jpg', 2),
(43, 'Jumper', 'Jumper Nursery Rhyme Niña Color Verde', 180, 5, 'Jumper', 'Niña', 'Talla Chica', 'Verde', '/img/productos/Jumper_RH9m.jpg', 2),
(44, 'Legging', 'Legging Jones New York Sport Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla L', 'Negro', '/img/productos/Legging_NY_N.jpg', 2),
(45, 'Legging', 'Legging 90° Degree By Reflex Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla L', 'Negro', '/img/productos/Legging_90°_N.jpg', 2),
(46, 'Legging', 'Legging Cynthia Rowley Sport Color Azul', 320, 5, 'Legging', 'Mujer', 'Talla L', 'Azul', '/img/productos/Legging_CR_A.jpg', 2),
(47, 'Legging', 'Legging Lukka Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla L', 'Negro', '/img/productos/Legging_Lukka_N_TallaL.jpg', 2),
(48, 'Legging', 'Legging Lukka Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla M', 'Negro', '/img/productos/Legging_Lukka_N_TallaM.jpg', 2),
(49, 'Legging', 'Legging Lukka Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla S', 'Negro', '/img/productos/Legging_Lukka_N_TallaS.jpg', 2),
(50, 'Legging', 'Legging Spalding Color Gris', 320, 5, 'Legging', 'Mujer', 'Talla S', 'Gris', '/img/productos/Legging_Spalding_Gris.jpg', 2),
(51, 'Legging', 'Legging Under Armour Color Azul', 350, 5, 'Legging', 'Mujer', 'Talla XS', 'Azul', '/img/productos/Legging_UnderArmour.jpg', 2),
(52, 'Legging', 'Legging Vogo Athletica Color Negro', 350, 5, 'Legging', 'Mujer', 'Talla S', 'Negro', '/img/productos/Legging_VogoAthl.jpg', 2),
(53, 'Locion', 'Locion Victoria Secret', 150, 5, 'Locion', 'Mujer', 'N/A', 'N/A', '/img/productos/Locion_VS.jpg', 2),
(54, 'Locion', 'Locion Victoria Secret Lace', 150, 5, 'Locion', 'Mujer', 'N/A', 'N/A', '/img/productos/Locion_VS_Lace.jpg', 2),
(55, 'Locion', 'Locion Victoria Secret Kiss', 150, 5, 'Locion', 'Mujer', 'N/A', 'N/A', '/img/productos/Locion_VS_Kiss.jpg', 2),
(56, 'Mallas', 'Mallas Under Armour Color Gris', 300, 5, 'Mallas', 'Mujer', 'Talla G', 'Gris', '/img/productos/Mallas_UnderA_gris.jpg', 2),
(57, 'Mallas', 'Mallas Nursery Rhyme Color Rojo', 320, 5, 'Mallas', 'Mujer', 'Talla M', 'Rojo', '/img/productos/Mallas_Nursey_rojo.jpg', 2),
(58, 'Mallas', 'Mallas Nursery Rhyme Color Negro', 320, 5, 'Mallas', 'Mujer', 'Talla M', 'Rojo', '/img/productos/Mallas_Nursey_Negro.jpg', 2),
(59, 'Pantalon', 'Pantalon Aeropostale Mezclilla Color Azul', 390, 5, 'Pantalon', 'Hombre', '30', 'Azul', '/img/productos/Mezclilla_aeroT30.jpg', 2),
(60, 'Pantalon', 'Pantalon Arizona Jeans Mezclilla Color Azul', 400, 5, 'Pantalon', 'Hombre', '32', 'Azul', '/img/productos/Mezclilla_ArizonaT32.jpg', 2),
(61, 'Pantalon', 'Pantalon Bandolino Mezclilla Color Azul', 360, 5, 'Pantalon', 'Hombre', '34', 'Azul', '/img/productos/Mezclilla_BandolinoT34.jpg', 2),
(62, 'Pantalon', 'Pantalon Bandolino Mezclilla Color Azul', 360, 5, 'Pantalon', 'Hombre', '36', 'Azul', '/img/productos/Mezclilla_BandolinoT36.jpg', 2),
(63, 'Pantalon', 'Pantalon Imperial Mezclilla Color Negro', 300, 5, 'Pantalon', 'Hombre', '30', 'Negro', '/img/productos/Mezclilla_ImperialT30.jpg', 2),
(64, 'Pantalon', 'Pantalon Levis Mezclilla Color Azul', 800, 5, 'Pantalon', 'Hombre', '30', 'Azul', '/img/productos/Mezclilla_LevisT30.jpg', 2),
(65, 'Pantalon', 'Pantalon Levis Mezclilla Color Negro', 800, 5, 'Pantalon', 'Hombre', '32', 'Negro', '/img/productos/Mezclilla_Levis_NeT32.jpg', 2),
(66, 'Pantalon', 'Pantalon Levis Mezclilla Color Cafe', 800, 5, 'Pantalon', 'Hombre', '32', 'Cafe', '/img/productos/Mezclilla_Levis_BeT32.jpg', 2),
(67, 'Pantalon', 'Pantalon Polo By Ralph Lauren Mezclilla Color Cafe', 500, 5, 'Pantalon', 'Hombre', '30', 'Cafe', '/img/productos/Mezclilla_Polo_CafeT30.jpg', 2),
(68, 'Pantalon', 'Pantalon Polo By Ralph Lauren Mezclilla Color Azul', 500, 5, 'Pantalon', 'Hombre', '32', 'Azul', '/img/productos/Mezclilla_Polo_AzulT32.jpg', 2),
(69, 'Pijama', 'Pijama Angry Birds', 150, 5, 'Pijama', 'Niño', 'Talla 8', 'Colores', '/img/productos/Pijama_angryB.jpg', 2),
(70, 'Pijama', 'Pijama Marvel', 150, 5, 'Pijama', 'Niño', 'Talla 8', 'Colores', '/img/productos/Pijama_Marvel.jpg', 2),
(71, 'Pijama', 'Pijama Disney Princesas', 150, 5, 'Pijama', 'Niña', 'Talla 8', 'Colores', '/img/productos/Pijama_Disney.jpg', 2),
(72, 'Pijama', 'Pijama Barbie', 150, 5, 'Pijama', 'Niña', 'Talla 8', 'Rosa', '/img/productos/Pijama_Barbie.jpg', 2),
(73, 'Playera', 'Playera Chaps Color Azul Marino', 250, 5, 'Camisa', 'Hombre', 'Talla M', 'Azul Marino', '/img/productos/Playera_Chaps_AzulM.jpg', 2),
(74, 'Playera', 'Playera Chaps Color Negro', 250, 5, 'Camisa', 'Hombre', 'Talla G', 'Negro', '/img/productos/Playera_Chaps_Negro.jpg', 2),
(75, 'Playera', 'Playera Nike Color Azul', 300, 5, 'Camisa', 'Hombre', 'Talla M', 'Azul', '/img/productos/Playera_Nike_Azul.jpg', 2),
(76, 'Playera', 'Playera Nike Color Verde', 300, 5, 'Camisa', 'Hombre', 'Talla M', 'Verde', '/img/productos/Playera_Nike_Verde.jpg', 2),
(77, 'Playera', 'Playera Tommy Hilfiger Color Negro', 360, 5, 'Camisa', 'Hombre', 'Talla M', 'Negro', '/img/productos/Playera_Tommy_Negra.jpg', 2),
(78, 'Playera', 'Playera Tommy Hilfiger Color Azul', 360, 5, 'Camisa', 'Hombre', 'Talla G', 'Azul', '/img/productos/Playera_Tommy_Azul.jpg', 2),
(79, 'Short', 'Short Crown Ivy Color Blanco', 250, 5, 'Short', 'Mujer', 'Talla 10', 'Blanco', '/img/productos/Short_Crown_blanco.jpg', 2),
(80, 'Short', 'Short Hollister Color Azul', 250, 5, 'Short', 'Mujer', 'Talla 8', 'Azul', '/img/productos/Short_Holis_azul.jpg', 2),
(81, 'Short', 'Short Hollister Color Negro', 250, 5, 'Short', 'Mujer', 'Talla 10', 'Negro', '/img/productos/Short_Holis_Negro.jpg', 2),
(82, 'Short', 'Short Polo By Ralph Lauren Color Negro', 280, 5, 'Short', 'Mujer', 'Talla 10', 'Negro', '/img/productos/Short_Polo_Negro.jpg', 2),
(83, 'Short', 'Short Polo By Ralph Lauren Color Blanco', 280, 5, 'Short', 'Mujer', 'Talla 10', 'Blanco', '/img/productos/Short_Polo_Blanco.jpg', 2),
(84, 'Short', 'Short Polo By Ralph Lauren Color Azul', 280, 5, 'Short', 'Mujer', 'Talla 10', 'Azul', '/img/productos/Short_Polo_Azul.jpg', 2),
(85, 'Short', 'Short Polo By Ralph Lauren Color Naranja', 280, 5, 'Short', 'Mujer', 'Talla 10', 'Naranja', '/img/productos/Short_Polo_Naranja.jpg', 2),
(86, 'Sudadera', 'Sudadera Kim Rogers Color Negro', 300, 5, 'Sudadera', 'Mujer', 'Talla M', 'Negra', '/img/productos/Sudadera_KimNegra.jpg', 2),
(87, 'Sudadera', 'Sudadera Kim Rogers Color Azul', 300, 5, 'Sudadera', 'Mujer', 'Talla M', 'Azul', '/img/productos/Sudadera_KimAzul.jpg', 2),
(88, 'Sudadera', 'Sudadera Nike Sport Color Azul', 320, 5, 'Sudadera', 'Mujer', 'Talla M', 'Azul', '/img/productos/Sudadera_NikeAzul.jpg', 2),
(89, 'Sudadera', 'Sudadera Nike Sport Color Gris', 320, 3, 'Sudadera', 'Mujer', 'Talla M', 'Gris', '/img/productos/Sudadera_NikeGris.jpg', 2),
(90, 'Sweater', 'Sweater Tommy Hilfiger Color Gris', 420, 5, 'Sweater', 'Hombre', 'Talla M', 'Gris', '/img/productos/Sweater_Tommy_Gris.jpg', 2),
(91, 'Sweater', 'Sweater Tommy Hilfiger Color Azul', 420, 5, 'Sweater', 'Hombre', 'Talla G', 'Azul', '/img/productos/Sweater_Tommy_Azul.jpg', 2),
(92, 'Tennis', 'Tennis Adidas Color Negro', 800, 2, 'Tennis', 'Hombre', 'Numero 26', 'Negro', '/img/productos/Tennis_AdidasNegro.jpg', 2),
(93, 'Tennis', 'Tennis Adidas Color Rojo', 800, 2, 'Tennis', 'Hombre', 'Numero 28', 'Rojo', '/img/productos/Tennis_AdidasRj.jpg', 2),
(94, 'Vestido', 'Vestido Just Taylor Color Azul', 550, 2, 'Vestido', 'Mujer', 'Talla 8', 'Azul', '/img/productos/Tennis_Nike_Az.jpg', 2),
(95, 'Tennis', 'Tennis Nike Color Gris', 900, 2, 'Tennis', 'Hombre', 'Numero 26', 'Gris', '/img/productos/Tennis_NikeGris.jpg', 2),
(96, 'Vestido', 'Vestido Bonnie Jean Color Rosa', 500, 3, 'Vestido', 'Niña', 'Talla 5', 'Rosa', '/img/productos/Vestido_BJ_rosa.jpg', 2),
(97, 'Vestido', 'Vestido Bonnie Jean Color Negro', 500, 3, 'Vestido', 'Mujer', 'Talla 7', 'Negro', '/img/productos/Vestido_BJ_Negro.jpg', 2),
(98, 'Vestido', 'Vestido City Triangles Color Blanco', 450, 3, 'Vestido', 'Mujer', 'Talla 9', 'Blanco', '/img/productos/Vestido_City_Blanco.jpg', 2),
(99, 'Vestido', 'Vestido Jennifer Lauren Color Azul', 450, 3, 'Vestido', 'Mujer', 'Talla 8', 'Azul', '/img/productos/Vestido_Jenn_Azul.jpg', 2),
(100, 'Vestido', 'Vestido Just Taylor Color Azul', 550, 3, 'Vestido', 'Mujer', 'Talla 8', 'Azul', '/img/productos/Vestido_JuTa_Azul.jpg', 2),
(101, 'Vestido', 'Vestido Lucca Couture Colores', 550, 3, 'Vestido', 'Mujer', 'Talla 8', 'Colores', '/img/productos/Vestido_Lucca_Colors.jpg', 2),
(102, 'Sweater', 'Sweater United State Color Negro', 450, 5, 'Sweater', 'Hombre', 'Talla M', 'Negro', '/img/productos/Sweater_UE_Negro.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `password` varchar(12) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `cuentapaypal` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `password`, `direccion`, `telefono`, `email`, `fechanacimiento`, `cuentapaypal`) VALUES
(1, 'Joanan', 'Sierra Sanchez', '171296jon', 'AV 5 poniente S/N Zapoapan  Ixtaczoquitlan', 2711270733, 'joanan96@gmail.com', '1996-12-17', 'pelicanoe419@gmail.com'),
(11, 'luz', 'martinez', 'aldeanos', 'avenida 8 ', 2712129688, 'luz_aitanna@hotmail.com', '1996-10-02', 'luz_aitanna@hotmail.com'),
(10, 'Luz del Carmen', 'Martinez Mendez', 'gato123', 'Av. 1 Fortin Ver', 2711285375, 'agumone419@gmail.com', '1996-10-02', 'agumone419@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
