/*
SQLyog Ultimate v9.51 
MySQL - 5.5.16-log : Database - gelicious
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gelicious` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `gelicious`;

/*Table structure for table `articulo` */

DROP TABLE IF EXISTS `articulo`;

CREATE TABLE `articulo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Texto` text COLLATE utf8_spanish_ci,
  `Fecha_Publicacion` date DEFAULT NULL,
  `Usuario_Id` int(11) DEFAULT NULL,
  `Visible` tinyint(1) DEFAULT NULL,
  `Slug` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Usuario_Id` (`Usuario_Id`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`Usuario_Id`) REFERENCES `usuario` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `articulo` */

/*Table structure for table `articulo_etiqueta` */

DROP TABLE IF EXISTS `articulo_etiqueta`;

CREATE TABLE `articulo_etiqueta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Articulo_Id` int(11) DEFAULT NULL,
  `Etiqueta_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Articulo_Id` (`Articulo_Id`),
  KEY `Etiqueta_Id` (`Etiqueta_Id`),
  CONSTRAINT `articulo_etiqueta_ibfk_1` FOREIGN KEY (`Articulo_Id`) REFERENCES `articulo` (`Id`),
  CONSTRAINT `articulo_etiqueta_ibfk_2` FOREIGN KEY (`Etiqueta_Id`) REFERENCES `etiqueta` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `articulo_etiqueta` */

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `categoria` */

insert  into `categoria`(`Id`,`Nombre`) values (1,'Gelatinas frutales');

/*Table structure for table `etiqueta` */

DROP TABLE IF EXISTS `etiqueta`;

CREATE TABLE `etiqueta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `etiqueta` */

/*Table structure for table `presentacion` */

DROP TABLE IF EXISTS `presentacion`;

CREATE TABLE `presentacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Visible` tinyint(1) DEFAULT NULL,
  `Producto_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Producto_Id` (`Producto_Id`),
  CONSTRAINT `presentacion_ibfk_1` FOREIGN KEY (`Producto_Id`) REFERENCES `producto` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `presentacion` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci,
  `Slug` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Categoria_Id` int(11) NOT NULL,
  `Visible` tinyint(1) DEFAULT NULL,
  `Novedoso` tinyint(1) DEFAULT NULL,
  `Fecha_Publicacion` date DEFAULT NULL,
  `Clave` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Clave` (`Clave`),
  KEY `Categoria_Id` (`Categoria_Id`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Categoria_Id`) REFERENCES `categoria` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

insert  into `producto`(`Id`,`Nombre`,`Descripcion`,`Slug`,`Categoria_Id`,`Visible`,`Novedoso`,`Fecha_Publicacion`,`Clave`) values (4,'Gelatina de mango','gelatina de mango','gelatina-de-mango',1,1,0,'2012-02-08','a101'),(5,'Gelatina rellena de fresas','rica gelatina rellena de fresas','gelatina-rellena-de-fresas',1,1,0,'2012-02-08','a102');

/*Table structure for table `producto_imagen` */

DROP TABLE IF EXISTS `producto_imagen`;

CREATE TABLE `producto_imagen` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Archivo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Producto_Id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Producto_Id` (`Producto_Id`),
  CONSTRAINT `producto_imagen_ibfk_1` FOREIGN KEY (`Producto_Id`) REFERENCES `producto` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto_imagen` */

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Es_Admin` tinyint(1) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Login` (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
