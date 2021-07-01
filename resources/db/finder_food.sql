/*
Navicat MySQL Data Transfer

Source Server         : LocalConnection
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : finder_food

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-28 15:02:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cat_categorias
-- ----------------------------
DROP TABLE IF EXISTS `cat_categorias`;
CREATE TABLE `cat_categorias` (
  `IdCategoria` tinyint(2) NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of cat_categorias
-- ----------------------------
INSERT INTO `cat_categorias` VALUES ('1', 'Comida');
INSERT INTO `cat_categorias` VALUES ('2', 'Postre');
INSERT INTO `cat_categorias` VALUES ('3', 'Desayuno');
INSERT INTO `cat_categorias` VALUES ('4', 'Ensalada');
INSERT INTO `cat_categorias` VALUES ('5', 'Botana');
INSERT INTO `cat_categorias` VALUES ('6', 'Entrada');
INSERT INTO `cat_categorias` VALUES ('7', 'Sopa');
INSERT INTO `cat_categorias` VALUES ('8', 'Guarnision');
INSERT INTO `cat_categorias` VALUES ('9', 'Bebida');
INSERT INTO `cat_categorias` VALUES ('21', 'Papilla');

-- ----------------------------
-- Table structure for cat_paises
-- ----------------------------
DROP TABLE IF EXISTS `cat_paises`;
CREATE TABLE `cat_paises` (
  `IdPais` tinyint(2) NOT NULL AUTO_INCREMENT,
  `Pais` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdPais`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of cat_paises
-- ----------------------------
INSERT INTO `cat_paises` VALUES ('1', 'Mexico');
INSERT INTO `cat_paises` VALUES ('2', 'Puerto Rico');
INSERT INTO `cat_paises` VALUES ('3', 'Francia');
INSERT INTO `cat_paises` VALUES ('4', 'Argentina');
INSERT INTO `cat_paises` VALUES ('5', 'Brazil');

-- ----------------------------
-- Table structure for cat_roles
-- ----------------------------
DROP TABLE IF EXISTS `cat_roles`;
CREATE TABLE `cat_roles` (
  `IdRol` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of cat_roles
-- ----------------------------
INSERT INTO `cat_roles` VALUES ('1', 'Admin');
INSERT INTO `cat_roles` VALUES ('2', 'Empleado');
INSERT INTO `cat_roles` VALUES ('3', 'Cliente');

-- ----------------------------
-- Table structure for cat_seguimientos
-- ----------------------------
DROP TABLE IF EXISTS `cat_seguimientos`;
CREATE TABLE `cat_seguimientos` (
  `IdSeguimiento` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Seguimiento` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`IdSeguimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of cat_seguimientos
-- ----------------------------
INSERT INTO `cat_seguimientos` VALUES ('1', 'En espera');
INSERT INTO `cat_seguimientos` VALUES ('2', 'Aceptado');
INSERT INTO `cat_seguimientos` VALUES ('3', 'Rechazado');

-- ----------------------------
-- Table structure for fin_descargasplatillos
-- ----------------------------
DROP TABLE IF EXISTS `fin_descargasplatillos`;
CREATE TABLE `fin_descargasplatillos` (
  `IdDescargaPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `FechaDescarga` date NOT NULL,
  `FkPlatillo` int(11) NOT NULL,
  PRIMARY KEY (`IdDescargaPlatillo`),
  KEY `fin_descargasplatillos_ibfk_1` (`FkPlatillo`),
  CONSTRAINT `fin_descargasplatillos_ibfk_1` FOREIGN KEY (`FkPlatillo`) REFERENCES `fin_platillos` (`IdPlatillo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_descargasplatillos
-- ----------------------------
INSERT INTO `fin_descargasplatillos` VALUES ('1', '2021-06-13', '36');
INSERT INTO `fin_descargasplatillos` VALUES ('2', '2021-06-13', '36');
INSERT INTO `fin_descargasplatillos` VALUES ('3', '2021-06-13', '34');
INSERT INTO `fin_descargasplatillos` VALUES ('4', '2021-06-13', '38');
INSERT INTO `fin_descargasplatillos` VALUES ('5', '2021-06-13', '36');
INSERT INTO `fin_descargasplatillos` VALUES ('6', '2021-06-13', '35');
INSERT INTO `fin_descargasplatillos` VALUES ('7', '2021-06-13', '38');
INSERT INTO `fin_descargasplatillos` VALUES ('8', '2021-06-13', '38');
INSERT INTO `fin_descargasplatillos` VALUES ('9', '2021-06-13', '34');
INSERT INTO `fin_descargasplatillos` VALUES ('10', '2021-06-20', '37');
INSERT INTO `fin_descargasplatillos` VALUES ('11', '2021-06-20', '37');
INSERT INTO `fin_descargasplatillos` VALUES ('12', '2021-06-20', '37');
INSERT INTO `fin_descargasplatillos` VALUES ('14', '2021-06-26', '50');

-- ----------------------------
-- Table structure for fin_platillos
-- ----------------------------
DROP TABLE IF EXISTS `fin_platillos`;
CREATE TABLE `fin_platillos` (
  `IdPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `Platillo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Ingrediente` text COLLATE utf8_spanish2_ci NOT NULL,
  `Preparacion` text COLLATE utf8_spanish2_ci NOT NULL,
  `ImagenPlatillo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `FechaRegistro` date NOT NULL,
  `HoraRegistro` time NOT NULL,
  `FkCategoria` tinyint(2) NOT NULL,
  `FkSeguimiento` tinyint(1) NOT NULL,
  `FkUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdPlatillo`),
  KEY `FkPreparacion` (`Preparacion`(1024)),
  KEY `FkCategoria` (`FkCategoria`) USING BTREE,
  KEY `FkUsuario` (`FkUsuario`),
  KEY `FkSeguimiento` (`FkSeguimiento`),
  CONSTRAINT `fin_platillos_ibfk_3` FOREIGN KEY (`FkCategoria`) REFERENCES `cat_categorias` (`IdCategoria`) ON DELETE CASCADE,
  CONSTRAINT `fin_platillos_ibfk_4` FOREIGN KEY (`FkUsuario`) REFERENCES `fin_usuarios` (`IdUsuario`) ON DELETE CASCADE,
  CONSTRAINT `fin_platillos_ibfk_5` FOREIGN KEY (`FkSeguimiento`) REFERENCES `cat_seguimientos` (`IdSeguimiento`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_platillos
-- ----------------------------
INSERT INTO `fin_platillos` VALUES ('34', 'Tortilla francesa', '1. 2 huevos frescos\r\n2. 15 g de mantequilla\r\n3. Pimienta negra molida\r\n 4. Sal', '1. Rompe los huevos y colócalos en un plato hondo. Salpimienta ligeramente y bate con ayuda de un tenedor o varillas hasta lograr una mezcla homogénea ligada, que no queden rastros de clara separada.\r\n\r\n2. Calienta una sartén antiadherente a temperatura media-alta y añade mantequilla, distribuyéndola por todo el fondo. Baja el fuego y echa la mezcla de huevo batido, y extiende bien.\r\n\r\n3. Cuaja agitando la sartén de arriba hacia abajo y con movimientos circulares, removiendo al mismo tiempo la mezcla de huevo, y raspando los bordes para llevarlos hacia el centro. Deja pasar un minuto y comienza a enrollar la base de la tortilla sobre sí misma.\r\n\r\n4. Engrasa un poco más el fondo de la sartén con mantequilla para que se te haga más fácil.\r\n\r\n5. Retira del fuego y termina de doblar los extremos. Coloca en un plato con cuidado y adereza al gusto.', 'qxK6IpUOmFBwWAot30dNg9fL1G8PXTsylY2JRZ7hDaVESnkzMvj5rCecbuQHi4.jpeg', '2021-05-27', '22:05:55', '3', '2', '2');
INSERT INTO `fin_platillos` VALUES ('35', 'Pay de limón expréss', '1. 1 lata de leche condensada.\r\n2. 1 barra de queso crema.\r\n3. 8 limones, el jugo (verdes o amarillos, los que prefieras).\r\n4. 1 base para pay (las venden ya hechas en el supermercado).', '1. Mezcla todo en la licuadora, luego vierte sobre la base del pay.\r\n\r\n2. Congela hasta que endurezca; puedes decorar con ralladura de limón o chocolate rallado.', 'A10bZdYQ5cUNtWp4oEG29F3gJaksT6IfnSmieOXDlL7xRwBjK8yuzrMCVhHqvP.jpeg', '2021-06-23', '01:06:36', '2', '2', '2');
INSERT INTO `fin_platillos` VALUES ('36', 'Pay de queso', '1. 1 1/2 paquete de galletas María molidas.\r\n2. 1 barra de mantequilla.\r\n3. 1 paquete de queso crema.\r\n4. 5 huevos.\r\n5. 1 lechera.\r\n6. 1 cucharadita de esencia de vainilla.\r\n7. 1/2 taza de crema espesa.', '1. En un recipiente coloca las galletas Marías con la barra de mantequilla y mezcla hasta formar una pasta suave. Colócala en tu molde para pay y espárcela con tus dedos hasta que el fondo y bordes de este queden completamente cubiertos.\r\n\r\n2. En el mismo recipiente donde creaste la base (puede ser otro si así lo prefieres), coloca el queso crema, los huevos, la lechera, la vainilla y la crema y con la batidora mezcla hasta que todo se integre.\r\n\r\n3. Vacía sobre la base de galleta y coloca el recipiente en el horno a 180º por 45 minutos, aproximadamente. Una vez transcurrido el tiempo retira del horno, espera a que se enfríe un poco y sirve.', 'e6KtJiR5qLAclo48rmzHdSv1j3MCZQUsyFXgDk7aWwNn20PBfYOVxb9uThEGIp.jpeg', '2021-05-29', '22:05:19', '2', '2', '3');
INSERT INTO `fin_platillos` VALUES ('37', 'Pastel frío de cookies and cream', '2 tazas de galletas de chocolate\r\n½ taza de mantequilla derretida (para la base)\r\n1 lata de leche evaporada\r\n1 lata de leche condensada\r\n1 cda. de vainilla líquida\r\n1 ½ taza de crema para batir\r\n3 sobres de grenetina hidratada\r\n10 galletas de chocolate troceadas', 'Separa el relleno de las galletas y reserva.\r\nColoca las galletas sin relleno en una bolsa plástica y tritúralas con ayuda de una cuchara o piedra de molcajete hasta obtener un polvo fino. Aparta dos cucharadas del polvo para la decoración final.\r\nMezcla el polvo restante en un bowl con la mantequilla derretida.\r\nVierte la mezcla en un molde para pastel y compacta la mezcla para formar una costra esparciéndola con una cuchara. Deja refrigerar por 10 minutos.\r\nMientras, licua la leche condensada, la evaporada, la vainilla, la grenetina y el relleno de las galletas. Reserva.\r\nBate la crema para batir hasta formar picos suaves. Reserva un poco de la crema para la decoración final.\r\nMezcla la preparación de la leche con la crema para batir de forma envolvente y agrega las galletas troceadas.\r\nVierte la preparación en el molde con la base y refrigera por 1 hora con 30 minutos.\r\nDesmolda y decora con la crema para batir restante y el polvo de galleta.', 'oDMviFA2mT6ZCJq7tukpnLz14NxRyP8rsISBGcaKUlwWeX09dbQYHVg5j3EOhf.jpeg', '2021-06-13', '07:06:34', '2', '2', '2');
INSERT INTO `fin_platillos` VALUES ('38', 'Hamburguesas al carbón clásicas', '4 panes de hamburguesas\r\n½ taza de mayonesa\r\n4 piezas de pechuga de pollo cortadas a la mitad\r\n½ taza de harina\r\n½ taza de leche\r\n1 huevo\r\n1 taza de pan molido\r\n½ cebolla morada fileteada\r\n1 taza de col rallada\r\n1 zanahoria rallada\r\nAceite', 'Salpimenta el pollo. Mezcla la harina con el huevo y leche, agrega una cucharadita de sal, pasa las piezas de pollo por la mezcla y después por el pan molido; vuelve a pasar por la mezcla y una vez más en el pan molido.\r\nColoca en la parrilla hasta que se doren las piezas de pollo.\r\nMientras tanto, combina la col con la zanahoria y cebolla morada, salpimenta. Tuesta el pan, unta un poco de mayonesa y termina con el pollo y ensalada de col.', 'EmI5KlY3QZiVsJan1eL742pjGwrTDUN6FMbCXgyuOcdh0SH9kA8oPBvzxtfqRW.png', '2021-06-13', '07:06:38', '1', '2', '3');
INSERT INTO `fin_platillos` VALUES ('39', 'Huevos motuleños', '6 huevos\r\n6 tortillas de maíz\r\nAceite vegetal suficiente\r\n100 g cebolla morada picada\r\n1 chile habanero\r\n300 g frijoles refritos\r\n4 jitomates\r\n100 g chícharos cocidos\r\n150 g queso fresco\r\n3 plátanos machos fritos\r\n6 rebanadas de jamón picado\r\nSal', 'Sofríe la cebolla con el chile habanero en una sartén con aceite. Cuida que el chile no se reviente y solo esté toreado.\r\nAgrega los tomates cortados en cubitos y cocine durante aproximadamente 7 minutos hasta que los tomates hayan liberado todos sus jugos y formado una salsa espesa. Sazona con sal y deja de lado.\r\nCaliente el resto del aceite en la sartén y comienza a freír las tortillas una a una. Fríe las tortillas hasta que estén un poco crujientes.\r\nEn la misma sartén donde freíste las tortillas, comienza a freír los huevos.\r\nColoca dos tortillas fritas en cada plato y unta un par de cucharadas de frijoles refritos sobre ellas. Añade un huevo frito sobre cada tortilla.\r\nBaña los huevos con la salsa de jitomate, esparce encima un poco de jamón, chícharos y queso desmoronado. ', 'Lfs8bDx3g2NjmyvQEHIoeBPOKiG97kZM610XzVlFJucaRA4TnpWtqh5USrCYdw.jpeg', '2021-06-13', '07:06:40', '3', '2', '3');
INSERT INTO `fin_platillos` VALUES ('42', 'Huevos divorciados', '4 huevos\r\n1 taza de frijoles refritos\r\n1 taza de salsa verde\r\n1 taza de salsa roja\r\n100 g de queso panela\r\n4 tortillas\r\n1 ramita de cilantro\r\nAceite\r\nSal', 'Calienta el aceite en una sartén y fríe las tortillas sin dejarlas tostadas. Retira el exceso de grasa y reserva.\r\nCocina los huevos estrellados hasta que estén bien fritos.\r\nEn un plato, coloca las tortillas como base, coloca los huevos estrellados y sepáralos con una línea de frijoles refritos. Agrega la salsa verde en uno de los huevos y la roja en el otro.\r\nEsparce el queso panela y sirve.', 'bidnSK0r9LFO7kWNyVgstqPGY6JZUD23T5Cch81oRXImBvjeEMwuafQ4xlzHAp.jpeg', '2021-06-26', '06:06:42', '3', '2', '2');
INSERT INTO `fin_platillos` VALUES ('43', 'Ensalada de salmón con dátiles', '500 g de salmón\r\n250 g de miel de maple\r\n2 manzanas en tiras delgadas\r\n1 taza de granada fresca\r\n2 tazas de dátiles deshidratados\r\n1 taza de nuez\r\n1 lechuga\r\n2 tazas de coles de Bruselas deshojadas\r\n2 naranjas en supremas', 'Fríe el tocino en un sartén a fuego alto, cuando suelte su propia grasa agrega el salmón, comenzando por la piel, salpimienta. Cuando esté cocido agrega la miel y retira.\r\nMezcla las lechugas con la manzana, dátiles, nuez, col y supremas de naranja.\r\nSirve ensalada con el salmón y tocino, termina con granada fresca.', 'eTvnlK84BRaAuWqykDIpw9X2Cb0Hj1rSfVgmJsoh7FiU6Z5QOxc3YEdtNGPLMz.jpeg', '2021-06-26', '06:06:54', '4', '2', '3');
INSERT INTO `fin_platillos` VALUES ('44', 'Pasta Alfredo con pollo y brócoli ', '1/2 libra de pasta fetuchini, sin cocer\r\n2 tazas de floretes de brócoli frescos\r\n1/4 taza de aderezo italiano fuerte KRAFT Zesty Italian Dressing\r\n1 libra de pechugas de pollo deshuesadas y sin pellejo, cortadas en trozos tamaño bocado\r\n1-2/3 taza de leche\r\n4 onzas (1/2 pqte. de 8 oz) de queso crema PHILADELPHIA Cream Cheese, cortado en cubitos\r\n1/4 taza de queso parmesano rallado KRAFT Grated Parmesan Cheese\r\n1/2 cucharadita de hojas secas de albahaca', 'Cuece la pasta en una cacerola grande tal como se indica en el paquete omitiendo la sal y agrega el brócoli al agua hirviendo durante los 2 últimos min.\r\nCalienta, mientras tanto, el aderezo en una sartén grande antiadherente a fuego medio-alto. Agrega el pollo; cocínalo 5 min. o hasta que esté cocido, revolviendo de vez en cuando. Incorpora los demás ingredientes. Déjalo hervir, revolviendo constantemente. Cocina y revuelve la salsa de 1 a 2 min. o hasta que se derrita el queso crema y su consistencia esté homogénea.\r\nEscurre la mezcla de pasta y ponla dentro de un tazon grande. Agrega la mezcla de pollo; revuélvela ligeramente.', 'Po3x2fXbRVWGhCgSB8lZF6pvMK1EA7Qz5k0ydqjYIu4NTcrtmDHiOs9LaewnUJ.jpeg', '2021-06-26', '06:06:59', '1', '2', '3');
INSERT INTO `fin_platillos` VALUES ('45', 'Ensalada en capas a la bruschetta ', '4 tomates Roma (plum), picados\r\n2 cucharadas de albahaca fresca picada\r\n1/2 taza de vinagreta balsámica KRAFT Balsamic Vinaigrette Dressing\r\n1 paquete (10 oz) de lechuga romana troceada\r\n1 taza de crutones (cuscurrones)\r\n1 paquete (6 oz) de tiras de pechuga de pollo estilo italiano OSCAR MAYER Deli Fresh Italian Style Chicken Breast\r\n2 cucharadas de queso parmesano rallado KRAFT Grated Parmesan Cheese', 'Combina los tomates, la albahaca y la vinagreta.\r\nColoca la lechuga en un tazón mediano; ponle los crutones, el pollo y la mezcla de tomate.\r\nEspolvorea el queso.\r\n', 'IXDC76AvdHrZNVROhitMz2k5cjmfeFpSlnUsY9x1qoJg4uPWBG03baTwLyKQE8.jpeg', '2021-06-26', '07:06:02', '4', '2', '3');
INSERT INTO `fin_platillos` VALUES ('46', 'Costillas de puerco dulces con piña', '1 cebolla grande\r\n1 trozo de jengibre (2 cm)\r\n1 costillas de 2.5 kg aproximadamente\r\n1 taza de jugo de manzana\r\n3 cdas. de sazonador de pollo\r\n5 cdas. de azúcar morena\r\n1 lata de piña en almíbar', 'Pica finamente la cebolla y el jengibre en rodajas. Colócalos en el fondo de la olla y encima pon las costillas ya cortadas.\r\nCalienta el jugo de manzana y el almíbar de la piña. Agrega el caldo y el azúcar hasta que estén disueltos y vierte sobre las costillas.\r\nCocina en nivel bajo por cinco horas o hasta que el puerco esté tierno. Remueve con pinzas las costillas, agrega los pedazos de piña y deja reposar una hora más.', 'z0qTFDkVSyltHvCELgbfi7dKuOXceRxW6Bjro1nQp5NY4I9JsZGMwAPUm32ha8.jpeg', '2021-06-26', '07:06:04', '1', '2', '2');
INSERT INTO `fin_platillos` VALUES ('47', 'Ensalada fresca de jitomate y mozzarella', '3 tazas de jitomates cherry\r\n300 g de queso mozzarella\r\n½ taza de brotes de cilantro\r\n1 aguacate en rebanadas gruesas\r\n¼ de taza de aceite de oliva\r\n½ taza de brotes de betabe', 'Mezcla los jitomates con el queso y aguacate. Agrega aceite de oliva y salpimienta.\r\nSirve y termina con mezcla de brotes.', 'TdL5M1wWhvfKg2x7VzG9rQOXasuUbq3IS0tYnoZFcjPkeBiElJ4ymNDAp6C8HR.jpeg', '2021-06-26', '07:06:08', '4', '2', '2');
INSERT INTO `fin_platillos` VALUES ('48', 'Helado de vino tinto dulce', '3 tazas de vino tinto (1 botella)\r\n1 taza de leche\r\n4 yemas de huevo\r\n1 ¼ tazas de nata\r\n1 rama de canela\r\n⅔ tazas de azúcar\r\nToppings de diferentes frutas', 'Calienta el vino a fuego medio durante 45 minutos en una cacerola y añade la canela. Retira y quita la rama de canela. Deja enfriar y reserva.\r\nEn un recipiente, incorpora las yemas de huevo y el azúcar y bate hasta que aumenten su volumen.\r\nAparte, ven una cacerola vierte la leche y la nata, calienta a fuego medio hasta que comience a hervir. Retira y agrega la mezcla de las yemas de huevo. Coloca de nuevo alfuego con intensidad media y remueve constantemente con un batidor hasta qe la mezcla espese, No debe hervir. Retira del fuego y vierte la crema en un bowl. Deja enfriar.\r\n    A la mezcla, agrega el vino tinto, vuelve a mezclar y lleva al congelador durante 45 minutos.\r\n    Transcurrido este tiempo, saca del congelador y remueve con un batidor. Lleva al congelador nuevamente por hora y media, retira y vuelve a remover. Congela por tercera vez durante hora y media.\r\nRetira y sirve con los toppings.', 'w1F3qSm7x5iUMaosdHeZtWb9RL4EfuAPk0c2CpGDOrzKn6h8jTQvYBVglXIJNy.jpeg', '2021-06-26', '07:06:13', '2', '2', '2');
INSERT INTO `fin_platillos` VALUES ('49', 'Panqué helado de blueberry, vainilla y durazno', '1 L de helado de vainilla\r\n2 barras que queso crema\r\n1 caja de blueberries\r\n1 taza de duraznos en almíbar\r\n1 taza de mermelada de durazno\r\n1 caja de frambuesas', 'Bate el queso crema e integra con el helado. Mezcla la mitad de la preparación con los blueberries y la otra mitad con las rebanadas de durazno.\r\nEn un refractario de panqué coloca la mezcla de durazno primero, cubre con la mermelada y frambuesas, agrega la mezcla de blueberry y congela durante mínimo 2 horas. Sirve.', 'n39RUhVA7wxszDG1iYCKaEfcJTMmp4bWkHXQ08rON6y5FtvoLjulPqZg2SeBdI.jpeg', '2021-06-26', '07:06:15', '2', '1', '2');
INSERT INTO `fin_platillos` VALUES ('50', 'Mini quesadillas de chicharrón con frijoles', '2 c de chicharrón prensado\r\n1 c de frijoles refritos\r\nkilo de masa de maíz\r\nAceite para freír\r\n1 c de guacamole para servir', 'Mezcla el chicharrón prensado con los frijoles.\r\nAyúdate de un tortillero para aplastar la masa y formar tortillas gruesas. Coloca al centro el relleno de chicharrón y ciérralas en la orilla para que puedas freírlas sin que se desborden.\r\nCon el aceite bien caliente, fríe las quesadillas hasta que doren. Reserva en papel absorbente.\r\nAcompaña con el guacamole. ', 'YTxcAGdIoNg8QOpzERnhFXfPV5ivel02LDBCM71k3Z4yb6r9StamHqjUwuJKsW.jpeg', '2021-06-26', '11:06:02', '3', '2', '15');

-- ----------------------------
-- Table structure for fin_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `fin_usuarios`;
CREATE TABLE `fin_usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Paterno` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Materno` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Nacimiento` date NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `FkPais` tinyint(2) NOT NULL,
  `FkRol` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  KEY `FkPais` (`FkPais`),
  KEY `FkRole` (`FkRol`),
  CONSTRAINT `fin_usuarios_ibfk_1` FOREIGN KEY (`FkPais`) REFERENCES `cat_paises` (`IdPais`) ON UPDATE CASCADE,
  CONSTRAINT `fin_usuarios_ibfk_2` FOREIGN KEY (`FkRol`) REFERENCES `cat_roles` (`IdRol`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_usuarios
-- ----------------------------
INSERT INTO `fin_usuarios` VALUES ('1', 'Carlos Antonio', 'Camacho', 'Alvarez', '1998-05-03', 'carlosalvarez9805@gmail.com', '123', '1', '1');
INSERT INTO `fin_usuarios` VALUES ('2', 'Jose Manuel', 'Martinez', 'Moreno', '1996-08-01', 'josem@gmail.com', '1234', '1', '2');
INSERT INTO `fin_usuarios` VALUES ('3', 'Jesus Abelardo ', 'Lopez', 'Perez', '1997-03-09', 'jesusabelardo@gmail.com', '12345', '2', '3');
INSERT INTO `fin_usuarios` VALUES ('4', 'Marlene ', 'Benites', 'Boa', '1995-06-14', 'marlene14@gmail.com', '123456', '4', '3');
INSERT INTO `fin_usuarios` VALUES ('11', 'Raul Jose', 'Martinez', 'Guimenez', '2000-11-29', 'RJose@gmail.com', '1234', '3', '3');
INSERT INTO `fin_usuarios` VALUES ('14', 'Roberto Arturo', 'Hernandez', 'Lopez', '1999-06-17', 'empleado2@gmail.com', '1234', '1', '2');
INSERT INTO `fin_usuarios` VALUES ('15', 'cliente', 'cliente', 'cliente', '2000-02-22', 'cliente2@gmail.com', '1234', '2', '3');

-- ----------------------------
-- Table structure for fin_visitas
-- ----------------------------
DROP TABLE IF EXISTS `fin_visitas`;
CREATE TABLE `fin_visitas` (
  `IdVisita` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVisita` date NOT NULL,
  `HoraVisita` time NOT NULL,
  `FkUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdVisita`),
  KEY `fin_visitas_ibfk_1` (`FkUsuario`),
  CONSTRAINT `fin_visitas_ibfk_1` FOREIGN KEY (`FkUsuario`) REFERENCES `fin_usuarios` (`IdUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_visitas
-- ----------------------------
INSERT INTO `fin_visitas` VALUES ('1', '2021-06-23', '00:00:03', '1');
INSERT INTO `fin_visitas` VALUES ('2', '2021-06-23', '00:00:03', '3');
INSERT INTO `fin_visitas` VALUES ('3', '2021-06-23', '00:00:03', '1');
INSERT INTO `fin_visitas` VALUES ('4', '2021-06-23', '00:00:03', '3');
INSERT INTO `fin_visitas` VALUES ('5', '2021-06-23', '00:00:03', '1');
INSERT INTO `fin_visitas` VALUES ('6', '2021-06-26', '00:00:05', '1');
INSERT INTO `fin_visitas` VALUES ('7', '2021-06-26', '00:00:05', '2');
INSERT INTO `fin_visitas` VALUES ('8', '2021-06-26', '00:00:05', '3');
INSERT INTO `fin_visitas` VALUES ('9', '2021-06-26', '00:00:05', '2');
INSERT INTO `fin_visitas` VALUES ('10', '2021-06-26', '00:00:05', '3');
INSERT INTO `fin_visitas` VALUES ('11', '2021-06-26', '00:00:06', '2');
INSERT INTO `fin_visitas` VALUES ('12', '2021-06-26', '00:00:06', '3');
INSERT INTO `fin_visitas` VALUES ('13', '2021-06-26', '00:00:07', '2');
INSERT INTO `fin_visitas` VALUES ('14', '2021-06-26', '00:00:07', '1');
INSERT INTO `fin_visitas` VALUES ('15', '2021-06-26', '00:00:07', '2');
INSERT INTO `fin_visitas` VALUES ('16', '2021-06-26', '00:00:07', '1');
INSERT INTO `fin_visitas` VALUES ('17', '2021-06-26', '00:00:07', '2');
INSERT INTO `fin_visitas` VALUES ('18', '2021-06-26', '00:00:07', '1');
INSERT INTO `fin_visitas` VALUES ('19', '2021-06-26', '00:00:08', '3');
INSERT INTO `fin_visitas` VALUES ('20', '2021-06-26', '00:00:08', '2');
INSERT INTO `fin_visitas` VALUES ('21', '2021-06-26', '00:00:10', '1');
INSERT INTO `fin_visitas` VALUES ('22', '2021-06-26', '00:00:10', '1');
INSERT INTO `fin_visitas` VALUES ('23', '2021-06-26', '00:00:10', '15');
INSERT INTO `fin_visitas` VALUES ('24', '2021-06-26', '00:00:11', '14');
INSERT INTO `fin_visitas` VALUES ('25', '2021-06-26', '00:00:11', '15');
INSERT INTO `fin_visitas` VALUES ('26', '2021-06-26', '00:00:11', '1');
INSERT INTO `fin_visitas` VALUES ('27', '2021-06-27', '00:00:02', '1');
INSERT INTO `fin_visitas` VALUES ('28', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('29', '2021-06-28', '00:00:21', '3');
INSERT INTO `fin_visitas` VALUES ('30', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('31', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('32', '2021-06-28', '00:00:21', '11');
INSERT INTO `fin_visitas` VALUES ('33', '2021-06-28', '00:00:21', '3');
INSERT INTO `fin_visitas` VALUES ('34', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('35', '2021-06-28', '00:00:21', '14');
INSERT INTO `fin_visitas` VALUES ('36', '2021-06-28', '00:00:21', '15');
INSERT INTO `fin_visitas` VALUES ('37', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('38', '2021-06-28', '00:00:21', '1');
INSERT INTO `fin_visitas` VALUES ('39', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('40', '2021-06-28', '00:00:21', '14');
INSERT INTO `fin_visitas` VALUES ('41', '2021-06-28', '00:00:21', '3');
INSERT INTO `fin_visitas` VALUES ('42', '2021-06-28', '00:00:21', '1');
INSERT INTO `fin_visitas` VALUES ('43', '2021-06-28', '00:00:21', '2');
INSERT INTO `fin_visitas` VALUES ('44', '2021-06-28', '00:00:21', '3');
INSERT INTO `fin_visitas` VALUES ('45', '2021-06-28', '00:00:21', '3');
INSERT INTO `fin_visitas` VALUES ('46', '2021-06-28', '00:00:22', '1');

-- ----------------------------
-- Table structure for fin_visitasplatillos
-- ----------------------------
DROP TABLE IF EXISTS `fin_visitasplatillos`;
CREATE TABLE `fin_visitasplatillos` (
  `IdVisitaPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `FechaVisita` date NOT NULL,
  `FkPlatillo` int(11) NOT NULL,
  PRIMARY KEY (`IdVisitaPlatillo`),
  KEY `fin_visitasplatillos_ibfk_1` (`FkPlatillo`),
  CONSTRAINT `fin_visitasplatillos_ibfk_1` FOREIGN KEY (`FkPlatillo`) REFERENCES `fin_platillos` (`IdPlatillo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_visitasplatillos
-- ----------------------------
INSERT INTO `fin_visitasplatillos` VALUES ('1', '2021-06-13', '36');
INSERT INTO `fin_visitasplatillos` VALUES ('2', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('3', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('4', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('5', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('6', '2021-06-13', '36');
INSERT INTO `fin_visitasplatillos` VALUES ('7', '2021-06-13', '36');
INSERT INTO `fin_visitasplatillos` VALUES ('8', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('9', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('10', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('11', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('12', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('13', '2021-06-13', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('14', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('15', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('16', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('17', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('18', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('19', '2021-06-13', '34');
INSERT INTO `fin_visitasplatillos` VALUES ('20', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('21', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('22', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('23', '2021-06-13', '35');
INSERT INTO `fin_visitasplatillos` VALUES ('26', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('27', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('28', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('29', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('30', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('31', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('32', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('33', '2021-06-20', '37');
INSERT INTO `fin_visitasplatillos` VALUES ('34', '2021-06-22', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('35', '2021-06-22', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('36', '2021-06-22', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('37', '2021-06-22', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('38', '2021-06-23', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('39', '2021-06-26', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('40', '2021-06-26', '38');
INSERT INTO `fin_visitasplatillos` VALUES ('41', '2021-06-26', '50');
INSERT INTO `fin_visitasplatillos` VALUES ('42', '2021-06-26', '50');
INSERT INTO `fin_visitasplatillos` VALUES ('43', '2021-06-26', '50');
INSERT INTO `fin_visitasplatillos` VALUES ('44', '2021-06-28', '43');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('google','facebook','twitter','linkedin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'google',
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'google', '101931885469599679843', 'Carlos', 'Antonio', 'carlosalvarez9805@gmail.com', '', 'es-419', 'https://lh3.googleusercontent.com/a/AATXAJxev8joePbXJX8SKS_uZOf2YTJ-A-buYc0K4SL_=s96-c', '2021-06-20 06:10:51', '2021-06-20 21:00:33');

-- ----------------------------
-- View structure for vw_platillos
-- ----------------------------
DROP VIEW IF EXISTS `vw_platillos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_platillos` AS SELECT
fin_platillos.IdPlatillo,
fin_platillos.Platillo,
fin_platillos.Ingrediente,
fin_platillos.Preparacion,
fin_platillos.ImagenPlatillo,
fin_platillos.FechaRegistro,
fin_platillos.HoraRegistro,
fin_platillos.FkCategoria,
cat_categorias.Categoria,
fin_platillos.FkUsuario,
fin_usuarios.NombreUsuario,
fin_usuarios.Paterno,
fin_usuarios.Materno,
cat_seguimientos.Seguimiento,
fin_platillos.FkSeguimiento
FROM
fin_platillos
INNER JOIN fin_usuarios ON fin_platillos.FkUsuario = fin_usuarios.IdUsuario
INNER JOIN cat_categorias ON fin_platillos.FkCategoria = cat_categorias.IdCategoria
INNER JOIN cat_seguimientos ON fin_platillos.FkSeguimiento = cat_seguimientos.IdSeguimiento ;

-- ----------------------------
-- View structure for vw_usuarios
-- ----------------------------
DROP VIEW IF EXISTS `vw_usuarios`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_usuarios` AS SELECT
fin_usuarios.IdUsuario,
fin_usuarios.NombreUsuario,
fin_usuarios.Paterno,
fin_usuarios.Materno,
fin_usuarios.FkPais,
cat_paises.Pais,
fin_usuarios.FkRol,
cat_roles.Rol,
fin_usuarios.Correo,
fin_usuarios.Nacimiento,
fin_usuarios.Clave
FROM
fin_usuarios
INNER JOIN cat_paises ON fin_usuarios.FkPais = cat_paises.IdPais
INNER JOIN cat_roles ON fin_usuarios.FkRol = cat_roles.IdRol ;

-- ----------------------------
-- View structure for vw_visitas
-- ----------------------------
DROP VIEW IF EXISTS `vw_visitas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_visitas` AS SELECT
fin_visitas.IdVisita,
fin_visitas.FechaVisita,
fin_visitas.HoraVisita,
fin_visitas.FkUsuario,
fin_usuarios.NombreUsuario,
fin_usuarios.Paterno,
fin_usuarios.Materno,
fin_usuarios.Correo,
fin_usuarios.FkRol,
cat_roles.Rol,
fin_usuarios.FkPais,
cat_paises.Pais

FROM
fin_visitas
INNER JOIN fin_usuarios ON fin_visitas.FkUsuario = fin_usuarios.IdUsuario
INNER JOIN cat_roles ON fin_usuarios.FkRol = cat_roles.IdRol
INNER JOIN cat_paises ON fin_usuarios.FkPais = cat_paises.IdPais ;
