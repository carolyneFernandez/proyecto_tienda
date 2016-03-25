<?php
$connection->query("CREATE TABLE IF NOT EXISTS `colores` (
  `idcolor` int(6) NOT NULL DEFAULT '0',
  `nombrecolor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcolor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

  //$connection->query();

  $connection->query("INSERT INTO `colores` (`idcolor`, `nombrecolor`) VALUES
  (30, 'Negro'),
  (31, 'Rojo'),
  (32, 'Gris'),
  (33, 'Marron'),
  (34, 'Blanco'),
  (35, 'Verde');");

    $connection->query("CREATE TABLE IF NOT EXISTS `colorproducto` (
      `idrelacion` int(6) NOT NULL AUTO_INCREMENT,
      `idcolor` int(6) NOT NULL,
      `codproducto` int(6) NOT NULL,
      PRIMARY KEY (`idrelacion`),
      KEY `fk_colorproducto_1_idx` (`idcolor`),
      KEY `fk_colorproducto_2_idx` (`codproducto`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1078 ;");

    $connection->query("INSERT INTO `colorproducto` (`idrelacion`, `idcolor`, `codproducto`) VALUES
    (958, 31, 103),
    (959, 30, 103),
    (964, 30, 104),
    (965, 34, 104),
    (970, 30, 100),
    (971, 31, 100),
    (973, 30, 103),
    (974, 30, 106),
    (975, 31, 106),
    (976, 32, 106),
    (977, 33, 106),
    (978, 34, 106),
    (979, 35, 106),
    (981, 35, 100),
    (985, 30, 100),
    (986, 30, 100),
    (991, 35, 100),
    (994, 30, 100),
    (995, 30, 100),
    (996, 30, 100),
    (997, 30, 100),
    (998, 30, 100),
    (1001, 31, 100),
    (1003, 35, 100),
    (1006, 30, 100),
    (1013, 33, 100),
    (1014, 34, 100),
    (1015, 32, 100),
    (1016, 33, 103),
    (1019, 33, 103),
    (1020, 32, 103),
    (1021, 31, 104),
    (1022, 33, 108),
    (1023, 34, 108),
    (1024, 30, 108),
    (1025, 34, 112),
    (1026, 35, 131),
    (1027, 30, 131),
    (1028, 30, 130),
    (1029, 35, 130),
    (1030, 30, 120),
    (1031, 32, 120),
    (1032, 34, 116),
    (1033, 30, 116),
    (1034, 32, 116),
    (1035, 33, 116),
    (1036, 35, 104),
    (1037, 34, 103),
    (1039, 30, 111),
    (1040, 34, 111),
    (1041, 33, 120),
    (1042, 34, 120),
    (1043, 31, 120),
    (1044, 31, 111),
    (1045, 31, 130),
    (1046, 34, 142),
    (1047, 33, 142),
    (1048, 35, 142),
    (1049, 32, 142),
    (1050, 31, 142),
    (1051, 30, 142),
    (1052, 33, 143),
    (1053, 35, 143),
    (1054, 32, 143),
    (1055, 34, 143),
    (1056, 33, 137),
    (1057, 34, 137),
    (1058, 30, 137),
    (1059, 33, 137),
    (1060, 35, 138),
    (1061, 31, 138),
    (1062, 32, 138),
    (1063, 33, 139),
    (1064, 33, 139),
    (1065, 32, 139),
    (1066, 34, 139),
    (1067, 34, 139),
    (1068, 30, 139),
    (1069, 35, 140),
    (1070, 32, 140),
    (1071, 33, 140),
    (1072, 30, 140),
    (1073, 31, 140),
    (1074, 34, 141),
    (1075, 33, 141),
    (1076, 30, 141),
    (1077, 31, 141);");



    $connection->query("CREATE TABLE IF NOT EXISTS `distribuidor` (
      `coddistribuidor` int(6) NOT NULL AUTO_INCREMENT,
      `nombre` varchar(35) NOT NULL,
      `localidad` varchar(45) NOT NULL,
      `provincia` varchar(45) NOT NULL,
      `cif` varchar(9) NOT NULL,
      PRIMARY KEY (`coddistribuidor`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=506 ;");

    $connection->query("INSERT INTO `distribuidor` (`coddistribuidor`, `nombre`, `localidad`, `provincia`, `cif`) VALUES
    (500, 'mango', 'sevilla', 'sevilla', '111111153'),
    (501, 'puma', 'madrid', 'madrid', '222222244'),
    (502, 'adidas', 'barcelona', 'barcelona', '333333333'),
    (505, 'Nike', 'sevilla', 'sevilla', '222224255');");



    $connection->query("CREATE TABLE IF NOT EXISTS `incluyen` (
      `codproducto` int(6) NOT NULL,
      `codpedido` int(6) NOT NULL,
      `cantidad` int(9) NOT NULL,
      PRIMARY KEY (`codproducto`,`codpedido`),
      KEY `fk_incluyen_1_idx` (`codpedido`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


    $connection->query("INSERT INTO `incluyen` (`codproducto`, `codpedido`, `cantidad`) VALUES
    (100, 1, 10),
    (100, 3, 10),
    (100, 5, 1),
    (100, 8, 1),
    (103, 7, 2),
    (103, 10, 1),
    (104, 13, 1),
    (104, 14, 1),
    (104, 16, 2),
    (106, 4, 54),
    (107, 6, 1),
    (107, 9, 1),
    (109, 11, 1),
    (111, 15, 1),
    (116, 12, 1);");

    $connection->query("CREATE TABLE IF NOT EXISTS `pedidos` (
      `codpedido` int(6) NOT NULL AUTO_INCREMENT,
      `codusuario` int(6) NOT NULL,
      `fechaemision` date NOT NULL,
      PRIMARY KEY (`codpedido`),
      KEY `fk_pedidos_1_idx` (`codusuario`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;");

    $connection->query("INSERT INTO `pedidos` (`codpedido`, `codusuario`, `fechaemision`) VALUES
    (1, 2, '2016-02-01'),
    (2, 2, '2016-02-02'),
    (3, 4, '2016-02-02'),
    (4, 4, '2016-02-06'),
    (5, 0, '2016-02-24'),
    (6, 0, '2016-02-24'),
    (7, 0, '2016-02-26'),
    (8, 0, '2016-02-26'),
    (9, 0, '2016-02-29'),
    (10, 0, '2016-03-01'),
    (11, 0, '2016-03-02'),
    (12, 0, '2016-03-02'),
    (13, 0, '2016-03-04'),
    (14, 0, '2016-03-04'),
    (15, 0, '2016-03-21'),
    (16, 5, '2016-03-23');");

    $connection->query("CREATE TABLE IF NOT EXISTS `producto` (
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
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;");

    $connection->query("INSERT INTO `producto` (`codproducto`, `coddistribuidor`, `nombre`, `descripcion`, `stock`, `foto`, `categoria`, `precio`, `sexo`) VALUES
    (100, 502, 'AMERICANA ', 'Tejido con textura, manga larga, dos bolsillos de cremallera, forro interior.\r\nï¿½ Largo de costado 34.6 cm\r\nï¿½ Largo de la espalda 56.4 cm\r\nEstas medidas estï¿½n calculadas para una talla M', 0, 'chaqueta1.jpg', 'chaquetas', 52.50, 'mujer'),
    (103, 505, 'AMERICANA SOLAPA CONTRASTE', 'Solapas, ribetes en contraste, cierre de botï¿½n, bolsillos de solapa, forro interior.\r\nï¿½ Largo de costado 38.8 cm\r\nï¿½ Largo de la espalda 59.6 cm\r\nEstas medidas estï¿½n calculadas para una talla 38 espaï¿½ola.', -2, 'chaqueta2.jpg', 'chaquetas', 69.99, 'mujer'),
    (104, 500, 'CAZADORA BIKER CREMALLERAS', 'cuello redondo con botón a presión, bolsillos de cremallera laterales, cierre de cremallera en la parte delantera, manga larga con cremallera.\r\n· Largo de costado 34.1 cm\r\n· Largo de la espalda 55.0 cm\r\nEstas medidas están calculadas para una talla M española.', 56, 'chaqueta3.jpg', 'chaquetas', 85.40, 'mujer'),
    (106, 501, 'TOP DE FELPA FRANCESA', 'No eres una chica común y corriente... y este top tampoco lo es. Con un cuello alto característico y un llamativo estampado vertical de la palabra PUMA, tiene todo lo que necesitas para que tu estilo sea totalmente vistoso. Y está repleto de tecnología absorbente para mantenerte seca y cómoda mientras estés fuera de casa.', 15, 'chaqueta4.jpg', 'chaquetas', 30.00, 'mujer'),
    (107, 501, 'SUDADERA MATTE & SHINE CON CUELLO REDONDO', 'Te gusta sobresalir un poco. Lo entendemos. Y estï¿½bamos pensando en ti cuando diseï¿½amos esta sudadera con cuello redondo. Es elegante, deportiva y lo suficientemente llamativa, ya que estï¿½ engalanada con la marca PUMA y exclusivos detalles de colores combinados.', 24, 'sudadera1.jpg', 'sudaderas', 65.00, 'mujer'),
    (108, 501, 'CHAQUETA CON CAPUCHA CON LOGO N° 1', 'El tema con las chaquetas con capucha es que... nunca son suficientes. Y esta, con sus excelentes colores, sus acabados ideales y una cómoda confección en felpa francesa, es una incorporación obvia a tu conjunto de sudaderas.\r\n\r\nCaracterísticas:\r\n\r\n65% algodón, 35% poliéster, Felpa francesa\r\nPropiedades que absorben la humedad para que estés seco y cómodo', 15, 'chaqueta5.jpg', 'chaquetas', 26.30, 'mujer'),
    (109, 501, 'SUDADERA BLURRED BOMBER', 'PUMA ha sido el mï¿½s rï¿½pido, bueno, desde siempre. Y hacemos uso de nuestra historia buscando en nuestros archivos algunos estilos clï¿½sicos renovados, inspirados en el deporte pero diseï¿½ados para la calle. Esta sudadera con cierre completo hace alarde de un estampado en toda la prenda, destacado por mangas de color en contraste.\r\n\r\nCaracterï¿½sticas\r\n\r\n70% algodï¿½n, 30% poliï¿½ster\r\nCierre completo\r\nImitaciï¿½n de cierre impermeable, invertido\r\nDos bolsillos laterales reforzados', 14, 'sudadera4.jpg', 'sudaderas', 65.00, 'mujer'),
    (110, 500, 'SUDADERA BOMBER CON CIERRE', 'Una chaqueta con capucha ideal para usar a todas partes, con cierre completo y un moderno estampado pixelado en la manga. Excelente para ir al gimnasio, hacer mandados o ir a donde sea que el viento te lleve.\r\n\r\nCaracterï¿½sticas:\r\n\r\nFelpa de piquï¿½ de 82% algodï¿½n, 18% poliï¿½ster\r\nEscote en V con cierre completo\r\nBolsillo tipo canguro con refuerzo de malla en el dobladillo', 48, 'sudadera2.jpg', 'sudaderas', 58.20, 'mujer'),
    (111, 501, 'SUDADERA COASTAL SUMMER', 'Esta maravillosa chaqueta con capucha de PUMA le darï¿½ una dosis potente de comodidad y estilo a tus aventuras diarias deportivas y casuales de este verano.\r\n\r\nCapucha grande con cordï¿½n para ï¿½ptima comodidad.\r\nCon mangas cortas para un estilo genial.\r\nCalce holgado para mayor libertad de movimientos.\r\nBolsillo tipo canguro para tus manos o pequeï¿½os artï¿½culos.\r\nSuave y duradero material de felpa francesa.', 8, 'sudadera5.jpg', 'sudaderas', 45.00, 'mujer'),
    (112, 502, 'Mallas Branded', 'Estas mallas para mujer combinan con todo y estï¿½n diseï¿½adas para adaptarse a cada movimiento del cuerpo. Estï¿½n confeccionadas con tejido elï¿½stico que expulsa el sudor para que puedas concentrarte en tu zona de ritmo cardï¿½aco.', 15, 'pantalon1.jpg', 'pantalones', 15.00, 'mujer'),
    (113, 502, 'Pantalï¿½n capri Branded', 'Fï¿½ciles de combinar, estos pantalones capri para mujer presentan un tiro mï¿½s bajo que le da un toque moderno. Estï¿½n confeccionados con un tejido que aleja el sudor de la piel para mantenerte seca y cï¿½moda.', 15, 'pantalon2.jpg', 'pantalones', 20.50, 'mujer'),
    (114, 502, 'Mallas largas Techfit Printed', 'Estas mallas largas para mujer concentran la energï¿½a del mï¿½sculo para ayudarte a alcanzar tu mï¿½ximo potencial de entrenamiento. Estï¿½n confeccionadas en tejido de punto reciclado con estampado geomï¿½trico que expulsa el sudor para proporcionarte una sensaciï¿½n seca y cï¿½moda mientras entrenas.', 20, 'pantalon3.jpg', 'pantalones', 25.00, 'mujer'),
    (115, 502, 'Mallas 3/4 Ultimate Fit City', 'Estas mallas de training para mujer son mucho mï¿½s que una prenda bï¿½sica de entrenamiento. Opacas y con un original estampado fotogrï¿½fico, estï¿½n pensadas para favorecer, estilizar y moldear la figura mientras practicas deporte. Estï¿½n confeccionadas en un suave tejido elï¿½stico que expulsa la humedad y el sudor para que te sientas cï¿½moda y seca.', 20, 'pantalon4.jpg', 'pantalones', 45.00, 'mujer'),
    (116, 502, 'Mallas THE Shorts Over', 'Las mallas THE Shorts Over de adidas by Stella McCartney son perfectas para llevar bajo otras prendas. Incluyen inserciones de malla a los lados para favorecer la ventilaciï¿½n.\r\nCorte ajustado\r\nTiro de la entrepierna de 65 cm\r\nLa tecnologï¿½a climaliteï¿½ aleja el sudor de la piel\r\nBolsillos traseros; \r\nCintura elï¿½stica con cordï¿½n; Inserciones de malla', 29, 'pantalon5.jpg', 'pantalones', 58.20, 'mujer'),
    (117, 502, 'Mallas Branded', 'Estas mallas para mujer combinan con todo y estï¿½n diseï¿½adas para adaptarse a cada movimiento del cuerpo. Estï¿½n confeccionadas con tejido elï¿½stico que expulsa el sudor para que puedas concentrarte en tu zona de ritmo cardï¿½aco.\r\nTiro de la entrepierna de 68 cm (talla 36)\r\nLa tecnologï¿½a climaliteï¿½ aleja el sudor de la piel\r\nCintura elï¿½stica\r\n', 28, 'pantalon6.jpg', 'pantalones', 60.00, 'mujer'),
    (120, 502, 'Top textura algodï¿½n', 'Top de tirantes finos confeccionado en algodï¿½n con textura, escote redondo y forro interior.\r\nï¿½ Largo de costado 40.7 cm\r\nï¿½ Largo de la espalda 38.7 cm\r\nEstas medidas estï¿½n calculadas para una talla M espaï¿½ola.', 48, 'blusa1.jpg', 'blusas', 25.00, 'mujer'),
    (130, 500, 'Sudadera - multicolor', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nCierre: cremallera\r\nMaterial/composiciÃ³n: tejido de algodÃ³n\r\nModelo, altura: 178 cm, lleva la talla 36\r\nCuello/escote: cuello redondo\r\nEstampado: de flores\r\n', 10, 'sudadera3.jpg', 'sudaderas', 10.00, 'mujer'),
    (131, 501, 'Nike Sportswear RALLY FUNNEL - Sudadera - carbon', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nDetalle capucha: con cordÃ³n\r\nMaterial/composiciÃ³n: tejido de algodÃ³n\r\nModelo, altura: 179 cm, lleva la talla S\r\nEstampado: estampado\r\nLargo de la prenda: 56 cm\r\nCuello: capucha\r\nLargo de la manga: 64 cm\r\nLargo de manga: manga larga\r\nMaterial exterior: 63% algodÃ³n, 19% poliÃ©ster, 18% viscosa\r\nCuidados: lavar a mÃ¡quina a 30Â°C', 20, 'chaqueta6.jpg', 'chaquetas', 10.00, 'mujer'),
    (134, 500, 'ONLTESLA - Blusa - black', 'CaracterÃ­sticas del producto\r\n\r\nLargo: largo\r\nAjuste: loose fit\r\nAncho de la espalda: 44 cm\r\nModelo, altura: 180 cm, lleva la talla 36\r\nCuello/escote: cuello redondo\r\nEstampado: de flores\r\nLargo de la prenda: 76 cm\r\nTransparencia: poco transparente\r\nLargo de manga: media\r\nMaterial exterior: 100% poliÃ©ster\r\nCuidados: no utilizar secadora, lavar a mÃ¡quina a 30Â°C, encoge un 5%, programa delicado', 20, 'blusa2.jpg', 'blusas', 28.00, 'mujer'),
    (136, 500, 'Morgan OBELIN - Top - beige/noir', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: estrecho\r\nCuello/escote: en V pronunciado\r\nCorte: entallado\r\nLargo de manga: sin mangas\r\nMaterial exterior: 100% poliamida\r\nCuidados: lavar a mÃ¡quina a 30Â°C', 46, 'blusa3.jpg', 'blusas', 65.00, 'mujer'),
    (137, 500, 'Camisa slim-fit lino', 'LÃ­nea Smart casual, tejido de lino, cuello abotonado, manga larga con puÃ±os abotonados, cierre de botones en la parte delantera.', 34, 'chaquetah.jpg', 'chaquetas', 10.00, 'hombre'),
    (138, 500, ' Chaqueta de invierno - black melange', 'CaracterÃ­sticas del producto\r\n\r\ncontiene partes no textiles de origen animal\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nCierre: cremallera\r\nMaterial del relleno: 100% poliÃ©ster\r\nRelleno: 100% poliÃ©ster\r\nDetalle capucha: con cordÃ³n, forrada\r\nBolsillos: con cremallera, interiores\r\nAncho de la espalda: 44 cm\r\nModelo, altura: 188 cm, lleva la talla M\r\nGrosor del relleno: relleno cÃ¡lido\r\nEstampado: unicolor\r\nLargo de la prenda: 69 cm\r\nCuello: capucha\r\nLargo de la manga: 70 cm\r\nLargo de manga: manga larga\r\nMaterial exterior: 100% nylon', 64, 'chaquetah2.jpg', 'chaquetas', 99.99, 'hombre'),
    (139, 500, 'Topman', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nDetalle capucha: con cordÃ³n\r\nMaterial/composiciÃ³n: tejido de algodÃ³n\r\nModelo, altura: 189 cm, lleva la talla M\r\nEstampado: unicolor\r\nLargo de la prenda: 72 cm\r\nCuello: capucha\r\nLargo de la manga: 72 cm\r\nLargo de manga: manga larga\r\nMaterial exterior: 100% algodÃ³n\r\nCuidados: lavar a mÃ¡quina a 40 Â°C, no utilizar secadora, programa delicado', 63, 'chaquetah3.jpg', 'chaquetas', 28.00, 'hombre'),
    (140, 501, ' Sudadera - grey melange/blue', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nMaterial/composiciÃ³n: jersey\r\nModelo, altura: 185 cm\r\nCuello/escote: cuello redondo\r\nEstampado: de rayas\r\nLargo de la prenda: 73 cm\r\nLargo de la manga: 71 cm\r\nLargo de manga: manga larga\r\nMaterial exterior: 50% algodÃ³n, 50% poliÃ©ster', 54, 'chaquetah4.jpg', 'chaquetas', 10.00, 'hombre'),
    (141, 501, ' YOUR TURN Sudadera - blue', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: normal\r\nMaterial/composiciÃ³n: tejido de algodÃ³n\r\nModelo, altura: 187 cm, lleva la talla M\r\nEstampado: unicolor\r\nLargo de la prenda: 68 cm\r\nCuello: vuelto\r\nLargo de la manga: 69 cm\r\nLargo de manga: manga larga\r\nMaterial exterior: 80% algodÃ³n, 20% poliÃ©ster\r\nCuidados: no utilizar secadora, lavar a mÃ¡quina a 30Â°C, programa delicado', 45, 'chaquetah5.jpg', 'chaquetas', 43.00, 'hombre'),
    (142, 500, 'HIM SPRAY - Vaqueros slim fit - spray ', 'CaracterÃ­sticas del producto\r\n\r\nLargo: clÃ¡sico\r\nAjuste: pitillo\r\nLargo entrepierna: 75 cm\r\nMaterial/composiciÃ³n: vaquero\r\nModelo, altura: 188 cm, lleva la talla 30-31\r\nLargo exterior de la pierna: 104 cm\r\nGrosor del relleno: sin relleno\r\nCierre: cremallera invisible\r\nBolsillos: traseros, laterales\r\nEstampado: unicolor\r\nCintura: normal\r\nMaterial exterior: 70% algodÃ³n, 28% poliÃ©ster, 2% elastano', 76, 'pantalonh1.jpg', 'pantalones', 46.00, 'hombre'),
    (143, 500, 'Vaqueros slim fit - moon washed', 'CaracterÃ­sticas del producto\r\n\r\nLargo: largo\r\nAjuste: slim fit\r\nLargo entrepierna: 78 cm\r\nMaterial/composiciÃ³n: vaquero\r\nModelo, altura: 188 cm, lleva la talla 32x32\r\nLargo exterior de la pierna: 103 cm\r\nCierre: cremallera invisible\r\nBolsillos: traseros, laterales\r\nEstampado: jaspeado\r\nCintura: normal\r\nMaterial exterior: 98% algodÃ³n, 2% elastano\r\nCuidados: no utilizar secadora, lavar a mÃ¡quina ', 0, 'pantalonh2.jpg', 'pantalones', 64.00, 'hombre');");

    $connection->query("CREATE TABLE IF NOT EXISTS `tallas` (
      `idtalla` int(4) NOT NULL DEFAULT '0',
      `nombretalla` varchar(10) DEFAULT NULL,
      PRIMARY KEY (`idtalla`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

    $connection->query("INSERT INTO `tallas` (`idtalla`, `nombretalla`) VALUES
    (10001, 'XS'),
    (10002, 'S'),
    (10003, 'M'),
    (10004, 'L'),
    (10005, 'XL');");

    $connection->query("CREATE TABLE IF NOT EXISTS `tallasproducto` (
      `idrelacion` int(6) NOT NULL AUTO_INCREMENT,
      `codproducto` int(6) NOT NULL,
      `tallas` int(6) NOT NULL,
      PRIMARY KEY (`idrelacion`),
      KEY `fk_tallasproducto_1_idx` (`codproducto`),
      KEY `fk_tallasproducto_2_idx` (`tallas`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=386 ;");

    $connection->query("INSERT INTO `tallasproducto` (`idrelacion`, `codproducto`, `tallas`) VALUES
    (211, 104, 10004),
    (212, 104, 10002),
    (230, 103, 10001),
    (232, 103, 10003),
    (241, 103, 10004),
    (242, 103, 10005),
    (244, 104, 10003),
    (245, 104, 10005),
    (249, 106, 10001),
    (250, 106, 10002),
    (251, 106, 10003),
    (252, 106, 10004),
    (253, 106, 10005),
    (254, 107, 10001),
    (255, 107, 10002),
    (256, 107, 10003),
    (257, 107, 10004),
    (258, 107, 10005),
    (259, 108, 10001),
    (261, 103, 10004),
    (262, 108, 10002),
    (264, 108, 10001),
    (282, 100, 10002),
    (283, 100, 10004),
    (287, 100, 10004),
    (300, 103, 10001),
    (303, 103, 10003),
    (312, 100, 10002),
    (313, 100, 10001),
    (314, 100, 10005),
    (315, 100, 10003),
    (316, 107, 10001),
    (317, 108, 10005),
    (318, 108, 10004),
    (319, 112, 10002),
    (320, 109, 10003),
    (321, 110, 10003),
    (322, 110, 10002),
    (324, 112, 10003),
    (325, 131, 10005),
    (326, 131, 10004),
    (327, 131, 10002),
    (328, 130, 10003),
    (329, 130, 10005),
    (330, 130, 10001),
    (331, 120, 10002),
    (332, 117, 10002),
    (333, 120, 10005),
    (335, 113, 10005),
    (336, 116, 10003),
    (337, 116, 10004),
    (338, 120, 10005),
    (339, 116, 10002),
    (340, 116, 10005),
    (341, 116, 10005),
    (343, 116, 10005),
    (344, 116, 10001),
    (345, 103, 10002),
    (346, 111, 10004),
    (347, 111, 10004),
    (348, 111, 10005),
    (349, 120, 10001),
    (350, 120, 10003),
    (351, 111, 10003),
    (352, 130, 10004),
    (353, 142, 10004),
    (354, 142, 10005),
    (355, 142, 10001),
    (356, 142, 10003),
    (357, 143, 10005),
    (358, 143, 10004),
    (359, 143, 10002),
    (360, 143, 10003),
    (361, 143, 10003),
    (362, 143, 10001),
    (363, 137, 10004),
    (364, 137, 10004),
    (365, 137, 10002),
    (366, 137, 10005),
    (367, 137, 10001),
    (368, 138, 10003),
    (369, 138, 10005),
    (371, 138, 10002),
    (372, 138, 10001),
    (373, 139, 10004),
    (374, 139, 10005),
    (375, 139, 10001),
    (376, 139, 10002),
    (377, 140, 10005),
    (378, 140, 10004),
    (379, 140, 10001),
    (380, 140, 10003),
    (381, 141, 10005),
    (382, 141, 10004),
    (383, 141, 10003),
    (384, 141, 10002),
    (385, 141, 10001);");

    $connection->query("CREATE TABLE IF NOT EXISTS `usuarios` (
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
      `estilo` int(1) NOT NULL,
      PRIMARY KEY (`codusuario`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;");

    $connection->query("INSERT INTO `usuarios` (`codusuario`, `Nombre`, `apellido`, `dni`, `localidad`, `provincia`, `pais`, `administrador`, `direccion`, `passwd`, `telefono`, `estilo`) VALUES
    (0, 'carolyne', 'fernandez', '20503311F', 'sevilla', 'Sevilla', 'ESPAÃ‘A', 0, 'carretera sevilla-lora 14', '2602fb88a05e5e75ad1f2c35475d2c76', 993240034, 0),
    (2, 'noelia', 'carrasco', '20503313D', 'sevilla', 'sevilla', 'Espaï¿½a', 1, 'calle paruro nï¿½15', '17d7cd52cd18e7bab99bb71de1669d95', 684065028, 2),
    (4, 'rosario', 'lopez', '20658742K', 'lima', 'Lima', 'Peru', 1, 'jr. ancash 1634', '865cc410a1b7c60ae8a38c8761b2b342', 987423541, 0),
    (5, 'jose', 'De las Heras', '20503311Z', 'gerena', 'Sevilla', 'EspaÃ±a', 1, 'carretera sevilla-lora numero ', '662eaa47199461d01a623884080934ab', 98742354, 1),
    (7, 'fe', '', '', 'r', 'd', 'd', 1, 'd', 'a684eceee76fc522773286a895bc8436', 0, 0);");

    $connection->query("ALTER TABLE `colorproducto`
      ADD CONSTRAINT `fk_colorproducto_1` FOREIGN KEY (`idcolor`) REFERENCES `colores` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      ADD CONSTRAINT `fk_colorproducto_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `incluyen`
      ADD CONSTRAINT `fk_incluyen_1` FOREIGN KEY (`codpedido`) REFERENCES `pedidos` (`codpedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      ADD CONSTRAINT `fk_incluyen_2` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `pedidos`
      ADD CONSTRAINT `fk_pedidos_1` FOREIGN KEY (`codusuario`) REFERENCES `usuarios` (`codusuario`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `producto`
      ADD CONSTRAINT `fk_producto_1` FOREIGN KEY (`coddistribuidor`) REFERENCES `distribuidor` (`coddistribuidor`) ON DELETE CASCADE ON UPDATE CASCADE;");

    $connection->query("ALTER TABLE `tallasproducto`
      ADD CONSTRAINT `fk_tallasproducto_1` FOREIGN KEY (`codproducto`) REFERENCES `producto` (`codproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      ADD CONSTRAINT `fk_tallasproducto_2` FOREIGN KEY (`tallas`) REFERENCES `tallas` (`idtalla`) ON DELETE CASCADE ON UPDATE CASCADE;");

    
