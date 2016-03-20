-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2016 a las 09:49:19
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
  `idcolor` int(6) NOT NULL DEFAULT '0',
  `nombrecolor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcolor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`idcolor`, `nombrecolor`) VALUES
(30, 'Negro'),
(31, 'Rojo'),
(32, 'Gris'),
(33, 'Marron'),
(34, 'Blanco'),
(35, 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colorproducto`
--

CREATE TABLE IF NOT EXISTS `colorproducto` (
  `idrelacion` int(6) NOT NULL AUTO_INCREMENT,
  `idcolor` int(6) NOT NULL,
  `codproducto` int(6) NOT NULL,
  PRIMARY KEY (`idrelacion`),
  KEY `fk_colorproducto_1_idx` (`idcolor`),
  KEY `fk_colorproducto_2_idx` (`codproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=985 ;

--
-- Volcado de datos para la tabla `colorproducto`
--

INSERT INTO `colorproducto` (`idrelacion`, `idcolor`, `codproducto`) VALUES
(955, 31, 101),
(957, 32, 102),
(958, 31, 103),
(959, 30, 103),
(964, 30, 104),
(965, 34, 104),
(966, 35, 105),
(967, 34, 105),
(968, 33, 105),
(969, 30, 105),
(970, 30, 100),
(971, 31, 100),
(972, 30, 102),
(973, 30, 103),
(974, 30, 106),
(975, 31, 106),
(976, 32, 106),
(977, 33, 106),
(978, 34, 106),
(979, 35, 106),
(980, 34, 100),
(981, 35, 100),
(982, 33, 101),
(983, 30, 102),
(984, 30, 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE IF NOT EXISTS `distribuidor` (
  `coddistribuidor` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `cif` varchar(9) NOT NULL,
  PRIMARY KEY (`coddistribuidor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=504 ;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`coddistribuidor`, `nombre`, `localidad`, `provincia`, `cif`) VALUES
(500, 'mango', 'sevilla', 'sevilla', '111111152'),
(501, 'puma', 'madrid', 'madrid', '222222244'),
(502, 'adidas', 'barcelona', 'barcelona', '333333333'),
(503, 'exe', 'madrid', 'madrid', '444444444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incluyen`
--

CREATE TABLE IF NOT EXISTS `incluyen` (
  `codproducto` int(6) NOT NULL,
  `codpedido` int(6) NOT NULL,
  `cantidad` int(9) NOT NULL,
  PRIMARY KEY (`codproducto`,`codpedido`),
  KEY `fk_incluyen_1_idx` (`codpedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incluyen`
--

INSERT INTO `incluyen` (`codproducto`, `codpedido`, `cantidad`) VALUES
(100, 1, 10),
(100, 3, 10),
(101, 2, 19),
(106, 4, 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `codpedido` int(6) NOT NULL AUTO_INCREMENT,
  `codusuario` int(6) NOT NULL,
  `fechaemision` date NOT NULL,
  PRIMARY KEY (`codpedido`),
  KEY `fk_pedidos_1_idx` (`codusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`codpedido`, `codusuario`, `fechaemision`) VALUES
(1, 2, '2016-02-01'),
(2, 2, '2016-02-02'),
(3, 4, '2016-02-02'),
(4, 4, '2016-02-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `codproducto` int(6) NOT NULL AUTO_INCREMENT,
  `coddistribuidor` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(3000) NOT NULL,
  `stock` int(6) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `precio` double(4,2) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`codproducto`),
  KEY `fk_producto_1_idx` (`coddistribuidor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `coddistribuidor`, `nombre`, `descripcion`, `stock`, `foto`, `categoria`, `precio`, `sexo`) VALUES
(100, 502, 'AMERICANA ', 'Tejido con textura, manga larga, dos bolsillos de cremallera, forro interior.\r\nï¿½ Largo de costado 34.6 cm\r\nï¿½ Largo de la espalda 56.4 cm\r\nEstas medidas estï¿½n calculadas para una talla M', 50, '1.jpg', 'chaquetas', 52.50, 'mujer'),
(101, 500, 'CAZADORA SERRAJE CREMALLERA', 'Solapas amplias, manga larga, bolsillos de cremallera laterales, cierre de cremallera en la parte delantera.\r\nï¿½ Largo de costado 31.5 cm\r\nï¿½ Largo de la espalda 52.4 cm\r\nEstas medidas estï¿½n calculadas para una talla M espaï¿½ola.', 51, '2.jpg', 'chaquetas', 85.40, 'mujer'),
(102, 500, 'CHAQUETA JASPEADA ALGODÓN', 'Tejido mezcla de algodón, tejido jaspeado, cuello redondo, manga larga, forro interior.\r\n· Largo de costado 34.0 cm\r\n· Largo de la espalda 53.5 cm\r\nEstas medidas están calculadas para una talla M española.', 20, '3.jpg', 'chaquetas', 45.50, 'mujer'),
(103, 500, 'AMERICANA SOLAPA CONTRASTE', 'Solapas, ribetes en contraste, cierre de botón, bolsillos de solapa, forro interior.\r\n· Largo de costado 38.8 cm\r\n· Largo de la espalda 59.6 cm\r\nEstas medidas están calculadas para una talla 38 española.', 60, '4.jpg', 'chaquetas', 69.99, 'mujer'),
(104, 500, 'CAZADORA BIKER CREMALLERAS', 'cuello redondo con botón a presión, bolsillos de cremallera laterales, cierre de cremallera en la parte delantera, manga larga con cremallera.\r\n· Largo de costado 34.1 cm\r\n· Largo de la espalda 55.0 cm\r\nEstas medidas están calculadas para una talla M española.', 60, '5.jpg', 'chaquetas', 85.40, 'mujer'),
(105, 500, 'AMERICANA DOBLE BOTONADURA', 'Diseño doble botonadura, hombros estructurados, solapas con muesca, manga larga abotonada, dos bolsillos de solapa en la parte frontal, detalle de abertura en la parte posterior.\r\n· Largo de costado 36.0 cm\r\n· Largo de la espalda 54.8 cm\r\nEstas medidas están calculadas para una talla M española.', 60, '6.jpg', 'chaquetas', 26.30, 'mujer'),
(106, 501, 'TOP DE FELPA FRANCESA', 'No eres una chica común y corriente... y este top tampoco lo es. Con un cuello alto característico y un llamativo estampado vertical de la palabra PUMA, tiene todo lo que necesitas para que tu estilo sea totalmente vistoso. Y está repleto de tecnología absorbente para mantenerte seca y cómoda mientras estés fuera de casa.', 15, '10.jpg', 'chaquetas', 30.00, 'mujer'),
(107, 501, 'SUDADERA MATTE & SHINE CON CUELLO REDONDO', 'Te gusta sobresalir un poco. Lo entendemos. Y estábamos pensando en ti cuando diseñamos esta sudadera con cuello redondo. Es elegante, deportiva y lo suficientemente llamativa, ya que está engalanada con la marca PUMA y exclusivos detalles de colores combinados.', 26, '11.jpg', 'sudaderas', 65.00, 'mujer'),
(108, 501, 'CHAQUETA CON CAPUCHA CON LOGO N° 1', 'El tema con las chaquetas con capucha es que... nunca son suficientes. Y esta, con sus excelentes colores, sus acabados ideales y una cómoda confección en felpa francesa, es una incorporación obvia a tu conjunto de sudaderas.\r\n\r\nCaracterísticas:\r\n\r\n65% algodón, 35% poliéster, Felpa francesa\r\nPropiedades que absorben la humedad para que estés seco y cómodo', 15, '12.jpg', 'chaquetas', 26.30, 'mujer'),
(109, 501, 'SUDADERA BLURRED BOMBER', 'PUMA ha sido el más rápido, bueno, desde siempre. Y hacemos uso de nuestra historia buscando en nuestros archivos algunos estilos clásicos renovados, inspirados en el deporte pero diseñados para la calle. Esta sudadera con cierre completo hace alarde de un estampado en toda la prenda, destacado por mangas de color en contraste.\r\n\r\nCaracterísticas\r\n\r\n70% algodón, 30% poliéster\r\nCierre completo\r\nImitación de cierre impermeable, invertido\r\nDos bolsillos laterales reforzados', 15, '13.jpg', 'sudaderas', 65.00, 'mujer'),
(110, 500, 'SUDADERA BOMBER CON CIERRE', 'Una chaqueta con capucha ideal para usar a todas partes, con cierre completo y un moderno estampado pixelado en la manga. Excelente para ir al gimnasio, hacer mandados o ir a donde sea que el viento te lleve.\r\n\r\nCaracterísticas:\r\n\r\nFelpa de piqué de 82% algodón, 18% poliéster\r\nEscote en V con cierre completo\r\nBolsillo tipo canguro con refuerzo de malla en el dobladillo', 48, '14.jpg', 'sudaderas', 58.20, 'mujer'),
(111, 501, 'SUDADERA COASTAL SUMMER', 'Esta maravillosa chaqueta con capucha de PUMA le dará una dosis potente de comodidad y estilo a tus aventuras diarias deportivas y casuales de este verano.\r\n\r\nCapucha grande con cordón para óptima comodidad.\r\nCon mangas cortas para un estilo genial.\r\nCalce holgado para mayor libertad de movimientos.\r\nBolsillo tipo canguro para tus manos o pequeños artículos.\r\nSuave y duradero material de felpa francesa.', 45, '15.jpg', 'sudaderas', 45.00, 'mujer'),
(112, 502, 'Mallas Branded', 'Estas mallas para mujer combinan con todo y están diseñadas para adaptarse a cada movimiento del cuerpo. Están confeccionadas con tejido elástico que expulsa el sudor para que puedas concentrarte en tu zona de ritmo cardíaco.', 15, '16.jpg', 'pantalones', 15.00, 'mujer'),
(113, 502, 'Pantalón capri Branded', 'Fáciles de combinar, estos pantalones capri para mujer presentan un tiro más bajo que le da un toque moderno. Están confeccionados con un tejido que aleja el sudor de la piel para mantenerte seca y cómoda.', 15, '17.jpg', 'pantalones', 20.50, 'mujer'),
(114, 502, 'Mallas largas Techfit Printed', 'Estas mallas largas para mujer concentran la energía del músculo para ayudarte a alcanzar tu máximo potencial de entrenamiento. Están confeccionadas en tejido de punto reciclado con estampado geométrico que expulsa el sudor para proporcionarte una sensación seca y cómoda mientras entrenas.', 20, '18.jpg', 'pantalones', 25.00, 'mujer'),
(115, 502, 'Mallas 3/4 Ultimate Fit City', 'Estas mallas de training para mujer son mucho más que una prenda básica de entrenamiento. Opacas y con un original estampado fotográfico, están pensadas para favorecer, estilizar y moldear la figura mientras practicas deporte. Están confeccionadas en un suave tejido elástico que expulsa la humedad y el sudor para que te sientas cómoda y seca.', 20, '19.jpg', 'pantalones', 45.00, 'mujer'),
(116, 502, 'Mallas THE Shorts Over', 'Las mallas THE Shorts Over de adidas by Stella McCartney son perfectas para llevar bajo otras prendas. Incluyen inserciones de malla a los lados para favorecer la ventilación.\r\nCorte ajustado\r\nTiro de la entrepierna de 65 cm\r\nLa tecnología climalite® aleja el sudor de la piel\r\nBolsillos traseros; \r\nCintura elástica con cordón; Inserciones de malla', 30, '20.jpg', 'pantalones', 58.20, 'mujer'),
(117, 502, 'Mallas Branded', 'Estas mallas para mujer combinan con todo y están diseñadas para adaptarse a cada movimiento del cuerpo. Están confeccionadas con tejido elástico que expulsa el sudor para que puedas concentrarte en tu zona de ritmo cardíaco.\r\nTiro de la entrepierna de 68 cm (talla 36)\r\nLa tecnología climalite® aleja el sudor de la piel\r\nCintura elástica\r\n', 28, '21.jpg', 'pantalones', 60.00, 'mujer'),
(120, 502, 'Top textura algodón', 'Top de tirantes finos confeccionado en algodón con textura, escote redondo y forro interior.\r\n· Largo de costado 40.7 cm\r\n· Largo de la espalda 38.7 cm\r\nEstas medidas están calculadas para una talla M española.', 48, '24.jpg', 'blusas', 25.00, 'mujer'),
(121, 502, 'chaqueta de tirantes volante', 'Tejido fluido, con textura, tirantes finos, escote redondo, volante en la parte superior.\r\nï¿½ Largo de costado 38.5 cm\r\nï¿½ Largo de la espalda 37.5 cm\r\nEstas medidas estï¿½n calculadas para una talla M espaï¿½ola.', 45, '25.jpg', 'blusas', 25.00, 'mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE IF NOT EXISTS `tallas` (
  `idtalla` int(4) NOT NULL DEFAULT '0',
  `nombretalla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtalla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`idtalla`, `nombretalla`) VALUES
(10001, 'XS'),
(10002, 'S'),
(10003, 'M'),
(10004, 'L'),
(10005, 'XL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallasproducto`
--

CREATE TABLE IF NOT EXISTS `tallasproducto` (
  `idrelacion` int(6) NOT NULL AUTO_INCREMENT,
  `codproducto` int(6) NOT NULL,
  `tallas` int(6) NOT NULL,
  PRIMARY KEY (`idrelacion`),
  KEY `fk_tallasproducto_1_idx` (`codproducto`),
  KEY `fk_tallasproducto_2_idx` (`tallas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=249 ;

--
-- Volcado de datos para la tabla `tallasproducto`
--

INSERT INTO `tallasproducto` (`idrelacion`, `codproducto`, `tallas`) VALUES
(203, 101, 10001),
(207, 102, 10005),
(211, 104, 10004),
(212, 104, 10002),
(213, 105, 10002),
(214, 105, 10003),
(215, 105, 10005),
(216, 100, 10001),
(221, 101, 10002),
(226, 102, 10001),
(227, 102, 10003),
(228, 102, 10004),
(229, 102, 10002),
(230, 103, 10001),
(231, 103, 10002),
(232, 103, 10003),
(233, 101, 10003),
(234, 101, 10004),
(235, 101, 10005),
(236, 100, 10002),
(238, 100, 10003),
(239, 100, 10004),
(240, 100, 10005),
(241, 103, 10004),
(242, 103, 10005),
(243, 104, 10001),
(244, 104, 10003),
(245, 104, 10005),
(246, 105, 10001),
(247, 105, 10003),
(248, 105, 10004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codusuario` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `administrador` int(2) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  PRIMARY KEY (`codusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codusuario`, `Nombre`, `apellido`, `dni`, `localidad`, `provincia`, `pais`, `administrador`, `direccion`, `passwd`, `telefono`) VALUES
(0, 'carolyne', 'fernandez prada lazo', '20503311F', 'sevilla', 'los rosales', 'EspaÃ±a', 0, 'carretera sevilla-lora nÂº14', '2602fb88a05e5e75ad1f2c35475d2c76', 993240034),
(2, 'noelia', 'carrasco', '20503313D', 'sevilla', 'sevilla', 'Espaï¿½a', 1, 'calle paruro nï¿½15', '17d7cd52cd18e7bab99bb71de1669d95', 684065028),
(4, 'rosario', 'lopez huarcaya', '20503777G', 'lima', 'cajamarca', 'Peru', 1, 'jr. ancash 1634 nï¿½3', '865cc410a1b7c60ae8a38c8761b2b342', 987423556),
(11, 'manoli', 'jimenez Redondo', '54879951L', 'sevilla', 'Los Rosales', 'España', 1, 'jr.De la Union 78 Bloque 2 ', '86b5712ea395cdc377f3a94b1e6a5651', 684065074),
(12, 'francisco', 'Garcia Jimenez', '47559405Z', 'sevilla', 'Los Rosales', 'España', 1, 'carretera sevilla-lora numero ', '117735823fadae51db091c7d63e60eb0', 993244785);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colorproducto`
--
ALTER TABLE `colorproducto`
  ADD CONSTRAINT `fk_colorproducto_1` FOREIGN KEY (`idcolor`) REFERENCES `colores` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_colorproducto_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incluyen`
--
ALTER TABLE `incluyen`
  ADD CONSTRAINT `fk_incluyen_1` FOREIGN KEY (`codpedido`) REFERENCES `pedidos` (`codpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_incluyen_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_1` FOREIGN KEY (`codusuario`) REFERENCES `usuarios` (`codusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_1` FOREIGN KEY (`coddistribuidor`) REFERENCES `distribuidor` (`coddistribuidor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tallasproducto`
--
ALTER TABLE `tallasproducto`
  ADD CONSTRAINT `fk_tallasproducto_1` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tallasproducto_2` FOREIGN KEY (`tallas`) REFERENCES `tallas` (`idtalla`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
