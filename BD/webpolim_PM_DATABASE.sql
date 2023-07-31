-- MySQL dump 10.13  Distrib 5.7.23-23, for Linux (x86_64)
--
-- Host: localhost    Database: webpolim_PM_DATABASE
-- ------------------------------------------------------
-- Server version	5.7.23-23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Current Database: `webpolim_PM_DATABASE`
--


--
-- Table structure for table `TOKENS`
--

DROP TABLE IF EXISTS `TOKENS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TOKENS` (
  `usuario` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `token` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  KEY `usuario` (`usuario`),
  CONSTRAINT `TOKENS_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TOKENS`
--

LOCK TABLES `TOKENS` WRITE;
/*!40000 ALTER TABLE `TOKENS` DISABLE KEYS */;
INSERT INTO `TOKENS` (`usuario`, `token`) VALUES ('Ulises','KEYS/privadaUlises.key'),('mayela','KEYS/privadamayela.key'),('Ulises','KEYS/privadaUlises.key'),('Lomba','KEYS/privadaLomba.key');
/*!40000 ALTER TABLE `TOKENS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `administrador` varchar(16) NOT NULL,
  `nombre_admin` varchar(30) NOT NULL,
  `apellidos_admin` varchar(30) NOT NULL,
  `correo_admin` varchar(40) NOT NULL,
  `telefono_admin` varchar(10) NOT NULL,
  `mes_na_admin` varchar(10) NOT NULL,
  `dia_na_admin` int(2) NOT NULL,
  `anio_admin` int(4) NOT NULL,
  `contrasenia_admin` varchar(16) NOT NULL,
  `funcion_admin` varchar(16) NOT NULL,
  PRIMARY KEY (`administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`administrador`, `nombre_admin`, `apellidos_admin`, `correo_admin`, `telefono_admin`, `mes_na_admin`, `dia_na_admin`, `anio_admin`, `contrasenia_admin`, `funcion_admin`) VALUES ('gerente','Gerente','asdasd','jimenezramirezulises@gmail.com','5615160099','ABRIL',17,2003,'gerente','Gerente general'),('law','admin','admin','jimenezramirezulises@gmail.com','5615160099','ENERO',17,2003,'laws','Gerente general'),('lawss','admin','admin','jimenezramirezulises@gmail.com','5615160099','ENERO',17,2003,'lawss','Gerente general'),('Pedrito','admin','admin','jimenezramirezulises@gmail.com','5615160099','FEBRERO',7,2005,'admin','Propietario');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `usuario` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_carrito`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `usuario_2` (`usuario`),
  KEY `usuario_3` (`usuario`),
  KEY `usuario_4` (`usuario`),
  CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` (`id_carrito`, `usuario`) VALUES (247806,'Changuiti2016'),(9689416,'Ulises'),(3,'wizzy14');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_producto`
--

DROP TABLE IF EXISTS `carrito_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_producto` (
  `id_carrito` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `num_productos` int(11) NOT NULL,
  UNIQUE KEY `id_carrito` (`id_carrito`,`cod_producto`),
  KEY `id_carrito_2` (`id_carrito`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `carrito_producto_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carrito_producto_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_producto`
--

LOCK TABLES `carrito_producto` WRITE;
/*!40000 ALTER TABLE `carrito_producto` DISABLE KEYS */;
INSERT INTO `carrito_producto` (`id_carrito`, `cod_producto`, `num_productos`) VALUES (3,76,7),(3,96,1);
/*!40000 ALTER TABLE `carrito_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES (1,'Matematicas'),(2,'Quimica'),(3,'Regalos'),(4,'Ropa'),(5,'Libros'),(6,'Dibujo Tecnico'),(7,'Fisica'),(8,'Programacion'),(9,'Maquinas'),(10,'Sistemas Digitales'),(11,'Mecatronica'),(12,'Papeleria');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_producto`
--

DROP TABLE IF EXISTS `categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_producto` (
  `cod_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  UNIQUE KEY `cod_producto` (`cod_producto`,`id_categoria`),
  KEY `cod_producto_2` (`cod_producto`,`id_categoria`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `categoria_producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categoria_producto_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_producto`
--

LOCK TABLES `categoria_producto` WRITE;
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
INSERT INTO `categoria_producto` (`cod_producto`, `id_categoria`) VALUES (26,1),(27,1),(51,1),(81,4),(48,7),(76,7),(3,12),(4,12),(39,12),(46,12),(49,12),(52,12),(96,12);
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_producto`
--

DROP TABLE IF EXISTS `cliente_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_producto` (
  `usuario` varchar(16) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  KEY `usuario` (`usuario`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `cliente_producto_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliente_producto_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_producto`
--

LOCK TABLES `cliente_producto` WRITE;
/*!40000 ALTER TABLE `cliente_producto` DISABLE KEYS */;
INSERT INTO `cliente_producto` (`usuario`, `cod_producto`) VALUES ('Lomba',3),('Lomba',26),('Lomba',39),('Lomba',51),('Lomba',76),('mayela',4),('mayela',46),('mayela',52),('mayela',81),('Ulises',62),('wizzy14',48),('wizzy14',49),('wizzy14',76),('wizzy14',96);
/*!40000 ALTER TABLE `cliente_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `usuario` varchar(16) NOT NULL,
  `nombre_user` varchar(30) NOT NULL,
  `apellidos_user` varchar(30) NOT NULL,
  `correo_user` varchar(40) NOT NULL,
  `telefono_user` varchar(12) NOT NULL,
  `mes_na_user` varchar(10) NOT NULL,
  `dia_na_user` int(2) NOT NULL,
  `anio_user` int(4) NOT NULL,
  `contrasenia_user` varchar(16) NOT NULL,
  `num_boleta` varchar(10) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`usuario`, `nombre_user`, `apellidos_user`, `correo_user`, `telefono_user`, `mes_na_user`, `dia_na_user`, `anio_user`, `contrasenia_user`, `num_boleta`, `estado`) VALUES ('Changuiti2016','Marin','Galvan Diaz','mgalvand2000@alumno.ipn.mx','5584424704','ABRIL',6,2005,'n0m3l0','2021090087',1),('Lomba','Gustavo','Lombardini','lombardini@ipn.mx','5532542354','MARZO',1,2005,'Lombardini','2021090599',1),('mayela','Mayela','Rodriguez','mayela@alumno.ipn.mx','5532876589','MARZO',30,2005,'mayela','2021090432',1),('Ulises','Ulises Alejandro','Jimnénez Ramírez','ulisedads@alumno.ipn.mx','5615160099','FEBRERO',7,2005,'similares','2011090438',1),('wizzy14','Abraham','Camacho','camacho@alumno.ipn.mx','5534674657','ENERO',28,2005,'wizzy','2021090578',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `usuario` varchar(16) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `cod_producto` (`cod_producto`,`usuario`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `usuario` (`usuario`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id_compra`, `monto`, `fecha_compra`, `usuario`) VALUES (3195515,386,'2023-05-24 05:07:53','Ulises'),(3254502,1953,'2023-06-01 18:02:57','Ulises'),(3935731,662,'2023-06-01 17:43:54','Ulises'),(5614993,1,'2023-05-16 08:36:14','wizzy14'),(5818247,769,'2023-06-01 18:09:54','Ulises'),(5879487,169,'2023-06-02 08:27:00','Ulises'),(6439114,800,'2023-05-24 05:20:38','Ulises'),(7281956,239,'2023-05-16 08:35:27','wizzy14'),(7640611,699,'2023-05-16 08:37:04','Ulises'),(8395398,239,'2023-05-16 08:38:03','wizzy14'),(9347180,209,'2023-05-24 05:41:53','Ulises');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_producto`
--

DROP TABLE IF EXISTS `compras_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras_producto` (
  `id_compra` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `num_productos` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  UNIQUE KEY `id_compra` (`id_compra`,`cod_producto`),
  KEY `id_compra_2` (`id_compra`,`cod_producto`),
  KEY `cod_producto` (`cod_producto`),
  CONSTRAINT `compras_producto_ibfk_1` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `compras_producto_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_producto`
--

LOCK TABLES `compras_producto` WRITE;
/*!40000 ALTER TABLE `compras_producto` DISABLE KEYS */;
INSERT INTO `compras_producto` (`id_compra`, `cod_producto`, `precio_producto`, `num_productos`, `estado`) VALUES (3195515,46,385,0,'Por enviar'),(3254502,3,169,3,'Por enviar'),(3254502,46,385,0,'Por enviar'),(3254502,49,390,11,'Por enviar'),(3254502,52,209,10,'Por enviar'),(3254502,81,800,0,'Por enviar'),(3935731,4,662,1,'Por enviar'),(5614993,26,1,0,'Por enviar'),(5818247,27,269,1,'Por enviar'),(5818247,51,500,1,'Por enviar'),(5879487,3,169,1,'Por enviar'),(6439114,81,800,1,'Por enviar'),(7281956,62,239,54,'Enviado'),(7640611,39,699,0,'Por enviar'),(8395398,62,239,0,'Enviado'),(9347180,52,209,13,'Por enviar');
/*!40000 ALTER TABLE `compras_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `mensaje` varchar(1000) NOT NULL,
  `fecha_mensaje` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes_usuarios`
--

DROP TABLE IF EXISTS `mensajes_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes_usuarios` (
  `id_mensaje` int(11) NOT NULL,
  `emisor` varchar(16) NOT NULL,
  `receptor` varchar(16) NOT NULL,
  UNIQUE KEY `id_mensaje` (`id_mensaje`),
  KEY `id_mensaje_2` (`id_mensaje`),
  CONSTRAINT `mensajes_usuarios_ibfk_1` FOREIGN KEY (`id_mensaje`) REFERENCES `mensajes` (`id_mensaje`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes_usuarios`
--

LOCK TABLES `mensajes_usuarios` WRITE;
/*!40000 ALTER TABLE `mensajes_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `users` varchar(16) NOT NULL,
  `foto_perfil` varchar(100) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` (`id_perfil`, `users`, `foto_perfil`) VALUES (26296,'FIchero666','img/default.png'),(57345,'wizzyy','img/default.png'),(247806,'Changuiti2016','img/default.png'),(844662,'law','img/default.png'),(2203046,'Nomarchess','img/default.png'),(2539391,'laws','img/default.png'),(2855895,'Iliana','img/default.png'),(2931899,'adminsito','img/default.png'),(3641312,'lawss','img/default.png'),(4502038,'Iliana','img/default.png'),(5820081,'gerente','img/default.png'),(6890058,'law','img/default.png'),(7870387,'asdfasdf','img/default.png'),(8734638,'perra','img/default.png'),(9370492,'asdfdasfas','img/default.png'),(9472017,'carlos','img/default.png'),(9546627,'ahmed','img/default.png'),(9689416,'Ulises','img/default.png');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `cod_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_producto` varchar(60) CHARACTER SET utf8 NOT NULL,
  `precio_producto` double(11,2) NOT NULL,
  `espns_producto` text NOT NULL,
  `descrip_producto` text NOT NULL,
  `foto_producto1` varchar(100) NOT NULL,
  `foto_producto2` varchar(100) NOT NULL,
  `foto_producto3` varchar(100) NOT NULL,
  `num_productos` int(11) NOT NULL,
  PRIMARY KEY (`cod_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`cod_producto`, `nom_producto`, `precio_producto`, `espns_producto`, `descrip_producto`, `foto_producto1`, `foto_producto2`, `foto_producto3`, `num_productos`) VALUES (3,'Sacapuntas Electrico',169.00,'2 MODOS: El sacapuntas manual tiene dos modos, modo eléctrico y modo manual. El modo eléctrico funciona con 2 pilas AA (no incluidas). Cuando pones un lápiz y lo sostienes, el sacapuntas rápido comienza a funcionar. Si no podemos tener las pilas al aire libre o las pilas están bajas, podemos mover fácilmente el botón de APAGADO y cambiar a modo manual. ????AFILADO RÁPIDO Y FÁCIL OPERACIÓN: Afilador de lápices automático se adapta a todos los estándar de 6-8 mm, lápices redondos, triangulares y hexagonales. cuando presiona el lápiz hacia abajo, se afilará automáticamente, la hoja girará después de afilar pero no afilará el lápiz. Puedes sentir que el afilado está hecho y sacar el lápiz. No sigue afilando y evita desperdiciar lápices. El proceso solo toma de 3 a 5 segundos. DISPOSITIVO SEGURO: La parte superior del sacapuntas eléctrico tiene un bloqueo de seguridad cuando se mueve a la derecha, puede bloquearse para que los niños no puedan abrirlo y puede proteger la seguridad de los niños. Todo el mecanismo es fácil de desmontar. Girar a la izquierda puede desbloquear que puede reemplazar fácilmente la cuchilla y limpiar las virutas. PRÁCTICO: El sacapuntas eléctrico de gran capacidad está hecho de material transparente, que es fácil de observar si las virutas de lápiz están llenas y es conveniente limpiarlas a tiempo. hay tres almohadillas antideslizantes en la base del sacapuntas eléctrico para evitar resbalones. protege su escritorio o superficie de trabajo y brinda estabilidad mientras afila su cuchillo. ????PORTÁTIL: El sacapuntas es pequeño y muy portátil, 2,4 pulgadas de largo x 2,4 pulgadas de ancho x 2,8 pulgadas de alto. Sin restricciones de enchufe, no se requieren cables. Seguro y eficiente. fácil de llevar a la escuela y al trabajo y apto para cualquier persona, lo que facilita el dibujo y la escritura. Tenga la confianza de que este producto durará, si alguna vez hay algún problema, contáctenos y lo solucionaremos.','Sacapuntas Eléctrico - Sacapuntas Rápido para Estudiantes, Sacapuntas Rápido con Cuchillas Reemplazables, Sacapuntas Automático con Pilas, para la Escuela, el Hogar, la Oficina, el Aula y Más','img/61PCPQx-pzL._AC_SX679_.jpg','img/71vI+6TyMuL._AC_SX679_.jpg','img/71jCT1aro0L._AC_SX679_.jpg',456),(4,'Boligrafo de Gel',662.00,'El elegante barril le da a la pluma un aspecto moderno y profesional. Tinta superior y agarre de goma suave que hacen que los bolígrafos escriban suavemente y sean duraderos Grandes bolígrafos para colorear, garabatear niños, álbumes de recortes, bocetos, dibujar, garabatear, escribir y ser creativo de una manera divertida y hábil. Con la tinta resistente a la decoloración, no hay necesidad de preocuparse por conseguir tinta en tus manos o escritorio, ya que no se decolora, sangra ni mancha. Incluye 5 bolígrafos de tinta de gel negro. Si hay algún problema, póngase en contacto con nosotros y le ofreceremos una solución satisfactoria como un nuevo juego lo antes posible.','5 bolígrafos de gel de punta fina premium retráctiles, tinta negra','img/51y7ttou3cL._AC_SX679_.jpg','img/61jau+rP3qL._AC_SX679_.jpg','img/71TuS8UF9oL._AC_SX679_.jpg',78),(26,'La Liga del Ligue Werevertumorro',1.00,'no se por que lo comprarias 😂','No lo leas','img/51Qk9LdvxKL.jpg','img/51Qk9LdvxKL.jpg','img/51Qk9LdvxKL.jpg',1),(27,'Calculadora Digital con Panel para escribir',269.00,'Calculadora científica: La calculadora y el bloc de notas están diseñados juntos, puedes escribir mientras calculas, mejora el aprendizaje y la eficiencia del trabajo, operación simple, adecuada para estudiantes principiantes y constructores de ciencias, muy buenos suministros mini de escuela secundaria. Protección del medio ambiente saludable: La pantalla LCD azul mate se utiliza para proteger los ojos. Cuando no estás utilizando una calculadora, también puedes ponerla en la mesa como un bloc de notas. Puede escribir repetidamente, reduce el consumo de papel, protección del medio ambiente, sin polvo ni tinta, pulsa un botón transparente para borrar notas LCD y proteger la privacidad personal. Portátil: Esta calculadora con escritura a mano pesa solo 120 g, es ligera y fácil de llevar. Tamaño del producto: 160 x 78 x 12.8 mm. Puedes ponerla en tu bolsa, bolsillo o incluso cartera. Es una opción perfecta para cálculos de oficina, cálculos de construcción, cálculos financieros, cálculos de contabilidad, cálculos de estudiantes, cálculos de hogar, etc. Pantalla grande: Pantalla LCD de 10 dígitos, 2 baterías de botón, se puede reemplazar en cualquier momento sin instalar tornillos, no tienes que preocuparte por quedarte sin baterías. Contenido de la caja: 1 calculadora bloc de notas, 1 manual de instrucciones detalladas (idioma español no garantizado).','http://webpolimarket.com/AGREGAR_PRODUCTOS.html','img/71FF1tOHcTL._AC_SX679_.jpg','img/71J09DYek5L._AC_SX679_.jpg','img/71NpdjrtAwL._AC_SX679_.jpg',543),(39,'Colores Chingones',699.00,'LÁPICES DE COLORES PARA DIBUJAR PROFESIONAEste set de lápices de arte profesional viene completo con 96 piezas, que incluyen una bolsa de lona, ​​72 lápices de acuarela, 12 bolígrafos de dibujo, 3 lápices de carbón, 1 lápiz de grafito, 1 borrador, 1 sacapuntas, 1 extensor de lápiz, 1 papel de lija y 3 tocones de papel. Se usa madera natural, segura y no tóxica, núcleos de plomo seleccionados de alta calidad, no fáciles de romper, duraderos, de dureza moderada. Diseñado para artistas profesionales y estudiantes de arte. Nuestros lápices de colores afilados contienen una mina de 3mm para una creatividad visual precisa y líneas nítidas. 72 lápices de colores con colores ricos y variados que cubren todo el espectro, desde tonos rojos brillantes hasta morados profundos que pueden satisfacer completamente sus necesidades de pintura. Lápices de colores con colores intensos, difuminados no fáciles de usar y palos de alta calidad para artistas de todos los niveles. Estas lápices de colores profesionales es adecuado para personas de todas las edades: niños, estudiantes, artistas, principiantes, amigos o familiares a los que les gusta pintar o les interesa pintar, etc. Son ideales para colorear, dibujar , dibujo. Contiene un estuche portátil para lápices con ranuras para cinta individuales a juego para cada lápiz y todos los demás accesorios, organiza y protege bien los bolígrafos y las herramientas de dibujo. Un kit de dibujo y dibujo para principiantes, ideal para estudiantes, niños, adolescentes y adultos apasionados por el arte y que también puede ser creado por artistas profesionales y aficionados. Los lápices de colores se pueden usar como regalo de Navidad, regalo de cumpleaños, regalo de Año Nuevo o regalo de regreso a clases.','DASKING 96PCS Lápices de Dibujo, Lápiz de Colores Sketching Kit, Piezas de Beceto y Dibujo de Arte Kit, Suministros de Dibujo y Arte, Lápices de Madera Profesional con Estuche de Viaje, Regalo Ideal para Niños, Artistas, Adultos','img/81AiWI-RmGL._AC_SX679_.jpg','img/71GQZD2j5+L._AC_SX679_.jpg','img/716O1LzcwxL._AC_SX679_.jpg',435),(46,'Organizador Rosa',385.00,' ENVR Rose Gold desktop Container Box through 🙌👍👍🤞especial Cleaning, color, spray and Dry, so that it has a very Fashion, Beautiful Rose Gold color. Si desea a ñadir una decoración elegante y femenina a su espacio de trabajo, este encantador acabado de escritorio cumple con este requisito. Añade un poco de encanto a su escritorio. Este organizador de escritorio multifuncional 6 en 1 tiene 5 compartimentos y 1 cajón grande para satisfacer sus diversas necesidades. Puede almacenar una gran variedad de material de oficina, como documentos, bolígrafos, grapadoras, tijeras, reglas, pegamento, clips, notas y mucho más. Puedes incluir los artículos esenciales para el estudio y el trabajo y evitar el desorden de tu escritorio con cosas que no puedes encontrar. Es la elección perfecta para mejorar su eficiencia diaria y mantener su escritorio ordenado. Nuestro organizador de mesa de malla está hecho de metal de alta calidad, fuerte y duradero, resistente a la rotura y libre de óxido. Y combinado con una tecnología de chapado de alta calidad, el color es duradero y no se desvanece fácilmente. La combinación de malla metálica y oro rosa realza los bordes metálicos y el aspecto elegante para que su escritorio destaque, con bordes redondeados para dar a su espacio de trabajo un aspecto sofisticado y garantizar su seguridad. El organizador de cajones de oficina es ideal para oficinistas, estudiantes, profesores y amas de casa. Adecuado para oficinas, aulas, salas de estudio, estudios, salas de reuniones, también para organizar cosméticos y pequeños artículos del hogar. El bonito color oro rosa es apto para todas las edades. El organizador de escritorio ENVR Rose Gold es un gran regalo para los niños y amigos o colegas, si no está satisfecho con cualquiera de nuestros productos, por favor no dude en ponerse en contacto con nosotros. Le ofrecemos un servicio postventa sin complicaciones.','Organizador de cajones de oficina en oro rosa, organizador de papelería de oficina de malla con 5 compartimentos + 1 cajón grande, 8,6*5,9*5,9 pulgadas, adecuado para oficinas, escuelas y aulas.','img/81u1iO1TaTL._AC_SX679_.jpg','img/81mJbNYZ3xL._AC_SX679_.jpg','img/71oQ99wQCiL._AC_SX679_.jpg',342),(48,'libro de fisica',299.00,'libro para estudiar','libro de fisica para estudiar','img/D_NQ_NP_899145-MLM29767847357_032019-O.jpg','img/D_NQ_NP_899145-MLM29767847357_032019-O.jpg','img/D_NQ_NP_899145-MLM29767847357_032019-O.jpg',12),(49,'Separador de clips',390.00,'Versátil: utiliza en objetos de oficina u hogar, baño, cajones, no pierdas más tus cosas pequeñas, mátenlas organizadas en un almacenamiento transparente y de excelente calidad Diseño: este diseño es elegante y funcional, el material acrílico de la más alta calidad y color transparente da un toque excepcional a tus espacios. CUIDADOS - Pelicula protectora, estas cajas se envían con una fina película protectora en ambos lados. Asegúrate de quitarlos antes de usar Ocasión: estas cajas son perfectas para regalar en bautizos, primeras comunión, bodas, cumpleaños, baby shower, etc. con algún otro objeto adentro dará elegancia y es perfecto regalo, nuestros clientes lo recomiendan Medidas: caja cajita mide 11.5 x 10 x 3 cm altura externo. 11 X 9 X 2.5 INTERNO (4 piezas)','Set de 4 Cajas organizadora de papelería, tarjetas, oficina, joyería, piezas pequeñas para una mayor organización en casa u oficina almacenamiento transparente acrílico','img/71i5LB-QSaL._AC_SX679_.jpg','img/814RPkEOm1L._AC_SX679_.jpg','img/61l4C64boeL._AC_SX679_.jpg',68),(51,'Libro de Habitos Atomicos por James Clear',500.00,' HÁBITOS ATÓMICOS parte de una simple pero poderosa pregunta: ¿Cómo podemos vivir mejor? Sabemos que unos buenos hábitos nos permiten mejorar significativamente nuestra vida, pero con frecuencia nos desviamos del camino: dejamos de hacer ejercicio, comemos mal, dormimos poco, despilfarramos. ¿Por qué es tan fácil caer en los malos hábitos y tan complicado seguir los buenos? James Clear nos brinda fantásticas ideas basadas en investigaciones científicas, que le permiten revelarnos cómo podemos transformar pequeños hábitos cotidianos para cambiar nuestra vida y mejorarla. Esta guía pone al descubierto las fuerzas ocultas que moldean nuestro comportamiento —desde nuestra mentalidad, pasando por el ambiente y hasta la genética— y nos demuestra cómo aplicar cada cambio a nuestra vida y a nuestro trabajo. Después de leer este libro, tendrás un método sencillo para desarrollar un sistema eficaz que te conducirá al éxito. Aprende cómo… Darte tiempo para desarrollar nuevos hábitos Superar la falta de motivación y de fuerza de voluntad Diseñar un ambiente para que el éxito sea fácil de alcanzar Regresar al buen camino cuando te hayas desviado un poco','Libro de superacion personal','img/41rEurRr1uL._SY498_BO1,204,203,200_.jpg','img/71MOpLkdj0L.jpg','img/61L4wLE7XeL.jpg',456),(52,'Archivero grande Gris',209.00,'bolsillos separados,Puede contener unas 300 a 500 hojas,este archivo en expansión hace el trabajo, ayudándole a ordenar y organizar sus tareas de clase, notas, informes y otros trabajos escolares con facilidad. Nuestro organizador de archivos de plástico acordeón hecho de polipropileno súper grueso, resistente al desgarro y al agua, sin olor, no tóxico, respetuoso con el medio ambiente, no es fácil de romper y deformar. Con cuerda y hebilla elástica, asegúrelo para evitar que se caigan los papeles del interior. La moda y el color elegante simple, efecto espejo mate, hacen que la vida de su oficina sea real. File jackets have 13 expandable individual pockets to keep different documents neatly sorted into sections, Comes with tab inserts so you can label each file and find it easily, help you get everything in order without any messes. Nuestro organizador de archivos de plástico acordeón,perfecta para el uso diario de la escuela en la oficina en casa, como llevar un registro de los recibos, mantener los documentos escolares, los archivos de viaje, los documentos, la tarea organizada y la organización de los papeles o cupones. Perfecto como regalo personal, recuerdo, organizador de bodas, etc.','Voyzdx Carpeta De Archivo Ampliable Acordeón Tamaño A4, 13 Bolsillo Carpetas con Fundas de Plastico,Carpeta Clasificadora Para Documentos En Acordeón Para Oficina Escuela Casa (gris)','img/71-orh8drkL._AC_SX679_.jpg','img/71MpiBEquTL._AC_SX679_.jpg','img/71s68e1PC6L._AC_SX679_.jpg',456),(62,'Porta notas Adesivas',239.00,'Tu Porta Notas cuenta con una Pasta resistente la cual la hace perfecta para la protección de tus hojas! Evitando deformaciones o dobleces en tus notas adhesivas y separadores al momento de guardarlo en tu mochila, Bolsa o Portafolio! (550 Piezas entre notas y separadores) Separa, organiza y haz anotaciones, de una manera sencilla y cómoda! Gracias a la gran variedad de separadores y Hojas que cuenta tu Organizador. Además solo mide 12.5x3x10.5 cm! Podrás guardarla fácilmente en tu mochila, portafolio y bolsa! Podrás tomar apuntes, Notas, Dibujar, escribir tus pendientes y tareas en este elegante Organizador de Notas Color Negro con cientos de etiquetas! Perfecto diseño para usarlo en la universidad, oficina, trabajo, Escuela y donde desees! Perfecta para todas tus necesidades! Cuenta con 8 Blocks de separadores de diferente color para una fácil distinción de apuntes y pendientes. 2 Blocks de Notas Adhesivas rectangulares y 2 Cuadrados. Además cuenta con un compartimiento para guardar tus Notas o para adjuntar un calendario para llevar el orden de tus tareas! ¡Estamos seguros que la calidad y uso de este producto te Fascinara! ¿Qué esperas? ¡Haz clic en agregar al carrito, cómpralo ya y recíbelo en un día!','Ofidosel Porta Notas Adhesivas con más de 500 Notas y Separadores. Organizador de Pendientes para Trabajo o Escuela. Notas adheribles con Banderitas Adhesivas. Agenda Personal. Task Notebook (Negro)','img/4.png','img/4.png','img/4.png',454),(76,'El libro de la fisica',630.00,'El libro de la fisica','por dk','img/images (3).jpeg','img/images (4).jpeg','img/images (5).jpeg',200),(81,'Sudadera Politecnica',800.00,'Sudadera del politecnico ','En diferentes tallas, chica, mediana y grande','img/images (2).jpeg','img/images (1).jpeg','img/images.jpeg',30),(96,'Cuaderno de pasta dura',551.00,'Feela - Paquete de 5 cuadernos a granel para la escuela, cuadernos de negocios de tapa dura, diarios clásicos a rayas con soporte para bolígrafo para tomar notas de trabajo, con 5 bolígrafos negros, 120 g/m², 5.1 x 8.3 pulgadas, A5, negro','Feela El paquete de 5 cuadernos clásicos con rayas contiene 5 cuadernos clásicos de cubierta resistente con rayas amarillas y 5 bolígrafos retráctiles negros. Cada uno de los cuadernos mide 8.3 x 5.1 pulgadas, lo que es perfecto para llevar y fácil de sostener por niñas y niños. Estos bonitos bolígrafos negros están personalizados para ser colocados en el soporte para bolígrafos, lo que es muy conveniente. Estos cuadernos clásicos con rayas están todos en blanco en el interior con 128 páginas a rayas (64 hojas), lo que sería conveniente para el uso diario. El diario de tapa dura tiene una cubierta de piel sintética resistente al agua, esquinas redondas y marcadores, que está diseñado para colocarse y abrirse plano. Hay una columna \"fecha/página\" en la parte superior de cada página. Se puede utilizar como un recordatorio para que recuerdes esas fechas importantes y encontrar la página que deseas en muy poco tiempo. Hay 5 bolígrafos retráctiles negros en la caja. Se puede utilizar tan pronto como lo recibas. Estos bolígrafos son perfectos para poner en el soporte para bolígrafos del clásico cuaderno rayado. El tubo grande tiene la capacidad de restaurar más tinta, lo que los hace duraderos. El secado rápido puede evitar manchas y manchas. Feela El juego de 5 cuadernos clásicos con rayas sería perfecto para muchas personas y muchas ocasiones. Los estudiantes de la escuela primaria y clásico pueden usarlo para escribir notas o llevar a mano en los deberes. Los viajeros pueden usarlo para organizar tu horario de trabajo diario y anotar hitos importantes. Tu niña o niño puede usarlo como el comienzo de garabatear y escribir. Rendimiento y satisfacción: te proporcionamos no solo nuestros productos de alta calidad, sino también nuestro servicio de respuesta rápida.','img/81VGDKISmDL._AC_SX679_.jpg','img/81FOX1LW7JL._AC_SX679_.jpg','img/81AyLfjgGdL._AC_SX679_.jpg',49);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_publicacion` text NOT NULL,
  `foto_publicacion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones_usuario`
--

DROP TABLE IF EXISTS `publicaciones_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones_usuario` (
  `id_publicacion` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  UNIQUE KEY `id_publicacion` (`id_publicacion`),
  KEY `id_publicacion_2` (`id_publicacion`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_perfil_2` (`id_perfil`),
  CONSTRAINT `publicaciones_usuario_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id_publicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `publicaciones_usuario_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones_usuario`
--

LOCK TABLES `publicaciones_usuario` WRITE;
/*!40000 ALTER TABLE `publicaciones_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `venta` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`venta`),
  UNIQUE KEY `cod_producto` (`cod_producto`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `cod_producto_2` (`cod_producto`,`usuario`),
  KEY `cod_producto_3` (`cod_producto`,`usuario`),
  KEY `cod_producto_4` (`cod_producto`,`usuario`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`cod_producto`) REFERENCES `productos` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'webpolim_PM_DATABASE'
--

--
-- Dumping routines for database 'webpolim_PM_DATABASE'
--
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-02  2:32:01
