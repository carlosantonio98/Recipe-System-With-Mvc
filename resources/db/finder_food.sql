/*
Navicat MySQL Data Transfer

Source Server         : LocalConnection
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : finder_food

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-05-18 19:53:23
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
INSERT INTO `cat_categorias` VALUES ('10', 'Papilla');

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
INSERT INTO `cat_paises` VALUES ('2', 'Perto Rico');
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
-- Table structure for fin_platillos
-- ----------------------------
DROP TABLE IF EXISTS `fin_platillos`;
CREATE TABLE `fin_platillos` (
  `IdPlatillo` int(11) NOT NULL AUTO_INCREMENT,
  `Platillo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Ingrediente` text COLLATE utf8_spanish2_ci NOT NULL,
  `Preparacion` text COLLATE utf8_spanish2_ci NOT NULL,
  `ImagenPlatillo` varchar(60) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `FechaRegistro` date NOT NULL,
  `HoraRegistro` time NOT NULL,
  `NumeroVisita` int(11) NOT NULL,
  `NumeroDescarga` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_platillos
-- ----------------------------
INSERT INTO `fin_platillos` VALUES ('3', 'Alfajores', '\r\n    50 gramos de mantequilla\r\n    1/2 taza de azúcar\r\n    1 huevo\r\n    1/2 tazas de harina\r\n    1 cucharadita de vainilla\r\n    1 taza de dulce de leche\r\n', '\r\n    Derrite la mantequilla y haz una mezcla con el azúcar hasta que quede una pasta bien incorporada.\r\n    Añade el huevo y la harina formando una masa que no se pegue en las manos. Deja en reposo la masa por 30 minutos\r\n    Pasado el tiempo, extiende la masa y corta pequeños círculos. Hornéalos por 20 minutos a 200° C Deja enfriar y rellena los alfajores con dulce de leche.\r\n', 'alfajores.jpeg', '2021-03-03', '20:45:09', '3', '0', '2', '1', '3');
INSERT INTO `fin_platillos` VALUES ('4', 'Empanadas de calabaza', '\r\n    1 kilo de calabaza de castilla\r\n    3/4 de kilo de azúcar estándar\r\n    1 cucharada de canela molida.\r\n    5 clavos de olor molidos\r\n    1 kilo de harina\r\n    1/2 kilo de manteca vegetal\r\n    1 pizca de sal\r\n    1/2 litro de cerveza\r\n', '\r\n    Pon a cocer la calabaza pelada y picada en cubos con 1/2 kilo de azúcar, clavo de olor y canela, en una olla a fuego lento, revolver continuamente hasta que se haga un puré semi espeso.\r\n    En un recipiente extendido, pon la harina, el azúcar restante, manteca, sal y amasa hasta integrar los ingredientes, agregar poco a poco la cerveza hasta que quede una pasta uniforme.\r\n    Forma pequeñas tortillas y rellénalas con el puré y séllalas con ayuda de un tenedor. Hornea por 40 minutos a 180° y retira cuando estén doraditas.\r\n', 'empanada.jpeg', '2021-03-04', '16:49:10', '4', '3', '2', '1', '3');
INSERT INTO `fin_platillos` VALUES ('5', 'Pan frances', '\r\n    1 huevo\r\n    1/4 taza de leche\r\n    2 cucharadas de azúcar\r\n    1 cucharada de canela molida\r\n    8 rebanadas de pan blanco\r\n    2 cucharadas de vainilla\r\n    1 plátano\r\n    2 cucharadas de mantequilla\r\n    4 cucharadas de miel\r\n', '\r\n    En un tazón bate el huevo con la leche, canela, vainilla y azúcar.\r\n    Remoja las rebanadas de pan en la mezcla de huevo hasta que estén bien empapadas.\r\n    Engrasa con mantequilla un sartén y calienta a fuego medio alto. Dora las rebanadas de pan por ambos lados.\r\n    Espolvorea con canela, decora con plátano y miel.\r\n', 'panfrances.jpeg', '2021-03-05', '16:01:02', '5', '0', '3', '1', '4');
INSERT INTO `fin_platillos` VALUES ('7', 'Ensalada de camarón', '\r\n    200 gramos de arúgula\r\n    400 gramos de jitomates cherry\r\n    500 gramos de camarón sin cabeza\r\n    1/2 lechuga\r\n    1/4 de taza de aceite de oliva\r\n    1 pizca de sal de grano\r\n    1 pizca de pimienta\r\n    1 aguacate\r\n    4 limones\r\n    2 cucharadas de ajonjolí negro\r\n', '\r\n    En un sartén caliente, agrega aceite de oliva y pon a asar los camarones hasta que tengan un color naranja.\r\n    Mientras tanto, en un tazón agrega hojas de lechuga, arúgula, aguacate en cubos y jitomates cherry en mitades y mezcla.\r\n    En otro recipiente agrega aceite de oliva, jugo de limones, pimienta, sal y ajonjolí.\r\n    Agrega los camarones al tazón y vierte la preparación de aceite de oliva. Sirve.\r\n', 'ensaladacamaron.jpeg', '2021-03-07', '21:06:33', '7', '0', '4', '1', '4');
INSERT INTO `fin_platillos` VALUES ('8', 'Ensalada César', '\r\n    1 lechuga romana\r\n    1 filete de pollo\r\n    1 bolsa de crotones\r\n    40 gramos de queso parmesano\r\n    4 cucharadas de salsa césar\r\n    1 cucharada de aceite de oliva\r\n    1 limón\r\n    1 sal\r\n', '\r\n    Lava tu lechuga y pícala en pequeños trozos, colócala en un recipiente junto con los crotones y revuélvelos muy bien.\r\n    Mientras tanto cocina la pechuga de pollo si aceite para que tenga la menor cantidad de grasa, cuando esté lista pícala en cuadritos.\r\n    Añade a tu lechuga la pechuga, aceite de oliva, queso parmesano, limón y sal, además del aderezo estilo césar y disfruta tu ensalada.\r\n', 'ensaladacesar.jpeg', '2021-03-08', '17:08:50', '8', '0', '4', '1', '3');
INSERT INTO `fin_platillos` VALUES ('10', 'Brochetas de cebolla cambray', '\r\n    20 cebollas cambray\r\n    1/2 kilo de papas\r\n    1 berenjena\r\n    20 jitomates cherry\r\n    1 pizca de sal\r\n    6 cucharadas de aceite de oliva\r\n    4 limones\r\n    1 pizca de pimienta\r\n', '\r\n    Mezcla el jugo de los limones, sal, pimienta y el aceite de oliva.\r\n    Corta los vegetales en trozos pequeños y ensártalos en un palito de brocheta.\r\n    Barnízalos con la preparación del aceite y parríllalos hasta obtener la cocción deseada.\r\n', 'brocheta.jpeg', '2021-03-10', '15:12:24', '1', '0', '5', '1', '3');
INSERT INTO `fin_platillos` VALUES ('12', 'Albóndigas a la boloñesa', '\r\n    6 ajos\r\n    1 kilo de carne molida (puede ser de cerdo o res)\r\n    2 cucharadas de pan molido\r\n    3 huevos\r\n    100 gramos de queso parmesano\r\n    1 cebolla\r\n    1 kilo de jitomate\r\n    1 taza de aceite\r\n    1 cubo sazonador de pollo\r\n    1 sal al gusto\r\n    1 pimienta al gusto\r\n    1 perejil al gusto\r\n    1 albahaca al gusto\r\n    1 taza de agua\r\n', '\r\n    En un tazón mezcla 3 ajos finamente picados, la carne, huevos, el pan molido, la mitad de parmesano, sal, pimienta y perejil hasta obtener una mezcla homogénea. Si lo necesitas agrega un poco de agua.\r\n    Forma pequeñas bolitas y fríelas en un poco de aceite durante unos minutos sin que se doren. Reserva.\r\n    Para la salsa, pica el jitomate y fríelo junto con el restante de los ajos, la cebolla, agrega albahaca, sal y pimienta. Después licua incorporando el queso parmesano restante y el cubo sazonador.\r\n    En una olla agrega la salsa, las albóndigas y cocina por unos minutos para que los sabores se incorporen. Sirve y decora con queso parmesano y albahaca, acompaña con spaghetti.\r\n', 'albondigasbolo.jpeg', '2021-03-12', '21:35:38', '3', '2', '1', '1', '4');
INSERT INTO `fin_platillos` VALUES ('13', 'Camarones a la diabla', '\r\n    600 gramos de camarón sin cabeza\r\n    4 chiles guajillo\r\n    3 chiles chipotle secos\r\n    1 taza de agua\r\n    3 cucharadas de mantequilla\r\n    1 cebolla\r\n    2 jitomates\r\n    3 dientes de ajo\r\n    1 pizca de sal\r\n', '\r\n    Remoja los chiles secos en la taza de agua caliente hasta que estén suaves. Licúa con los jitomates, ajos y sal. Cuela y reserva.\r\n    Pon la mantequilla en una sartén grande. Agrega la cebolla rebanada en juliana, los camarones y cuécelos durante un par de minutos o hasta que cambien de color. Retira y aparta.\r\n    Vierte la salsa en otra sartén caliente con mantequilla, cocina hasta que se haya reducido un poco. Incorpora los camarones y la cebolla; cocina durante un par de minutos.\r\n', 'camaronesdiabla.jpeg', '2021-03-13', '17:37:19', '4', '0', '1', '1', '4');
INSERT INTO `fin_platillos` VALUES ('16', 'test', 'test', 'test', 'imas.png', '2021-05-18', '23:05:24', '0', '0', '1', '1', '2');
INSERT INTO `fin_platillos` VALUES ('17', 'gelatina', 'gel', 'mezclar', 'min.jpg', '2021-05-18', '23:05:54', '0', '0', '1', '1', '2');
INSERT INTO `fin_platillos` VALUES ('18', 'Arroz con leche', 'arro, leche', 'mezclar con alegria', 'minimal1.jpg', '2021-05-18', '23:05:55', '0', '0', '1', '1', '2');
INSERT INTO `fin_platillos` VALUES ('19', 'Mi platillo1', 'test de ingredientes', 'test de preparacion', 'minimal2.jpg', '2021-05-19', '00:05:10', '0', '0', '1', '1', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_usuarios
-- ----------------------------
INSERT INTO `fin_usuarios` VALUES ('1', 'Carlos Antonio', 'Camacho', 'Alvarez', '1998-05-03', 'carlosalvarez9805@gmail.com', '123', '1', '1');
INSERT INTO `fin_usuarios` VALUES ('2', 'Jose Manuel', 'Martinez', 'Moreno', '1996-08-01', 'josem@gmail.com', '1234', '1', '2');
INSERT INTO `fin_usuarios` VALUES ('3', 'Jesus Abelardo ', 'Lopez', 'Perez', '1997-03-09', 'jesusabelardo@gmail.com', '12345', '2', '3');
INSERT INTO `fin_usuarios` VALUES ('4', 'Marlene ', 'Benites', 'Boa', '1995-06-14', 'marlene14@gmail.com', '123456', '4', '3');

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
  KEY `FkUsuario` (`FkUsuario`),
  CONSTRAINT `fin_visitas_ibfk_1` FOREIGN KEY (`FkUsuario`) REFERENCES `fin_usuarios` (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of fin_visitas
-- ----------------------------
INSERT INTO `fin_visitas` VALUES ('1', '2021-05-11', '13:06:40', '1');
INSERT INTO `fin_visitas` VALUES ('3', '2021-05-11', '13:07:04', '4');

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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `vw_usuarios` AS SELECT
fin_usuarios.IdUsuario,
fin_usuarios.NombreUsuario,
fin_usuarios.Paterno,
fin_usuarios.Materno,
fin_usuarios.FkPais,
cat_paises.Pais,
fin_usuarios.FkRol,
cat_roles.Rol
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
