/*
SQLyog Ultimate v9.50 
MySQL - 5.7.18-0ubuntu0.16.04.1 : Database - cripto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cripto` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cripto`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `FK_categoria` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

UNLOCK TABLES;

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria',
  `idusuario` int(11) DEFAULT NULL COMMENT 'Identificador de usuario',
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Hora y fecha',
  `os` varchar(30) DEFAULT NULL COMMENT 'Nombre del sistema operativo',
  `nombre_host` varchar(30) DEFAULT NULL COMMENT 'Nombre del Host.',
  `tipo_maquina` varchar(30) DEFAULT NULL COMMENT 'Tipo de máquina.',
  `version` varchar(50) DEFAULT NULL COMMENT 'Información de la versión.',
  `ip` varchar(16) DEFAULT NULL COMMENT 'Ip de donde accede',
  PRIMARY KEY (`idlog`),
  KEY `FK_log` (`idusuario`),
  CONSTRAINT `FK_log` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `log` */

LOCK TABLES `log` WRITE;

UNLOCK TABLES;

/*Table structure for table `notas` */

DROP TABLE IF EXISTS `notas`;

CREATE TABLE `notas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `nota` text,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idnota`),
  KEY `FK_notas` (`idusuario`),
  CONSTRAINT `FK_notas` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `notas` */

LOCK TABLES `notas` WRITE;

UNLOCK TABLES;

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `idpreg` int(11) NOT NULL AUTO_INCREMENT,
  `varchar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpreg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `preguntas` */

LOCK TABLES `preguntas` WRITE;

insert  into `preguntas`(`idpreg`,`varchar`) values (1,'Primera mascota'),(2,'Canción preferida'),(3,'Nombre de un familiar'),(4,'Marca preferida de ropa'),(5,'Nombre de un profesor'),(6,'Nombre de un novio/a'),(7,'Equipo deportivo preferido');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave principal del usuario',
  `nombre` varchar(20) DEFAULT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(20) DEFAULT NULL COMMENT 'Apellido del usuario',
  `email` varchar(30) DEFAULT NULL COMMENT 'Email del usuario',
  `pass` varchar(250) DEFAULT NULL COMMENT 'Clave de acceso al sistema',
  `activo` int(1) DEFAULT '0' COMMENT 'Identifica si esta activo o inactivo',
  `intentos` int(1) DEFAULT '0' COMMENT 'Contador de intentos, para bloquear el usuario, max 3.',
  `clave_cifrado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

UNLOCK TABLES;

/*Table structure for table `wsite` */

DROP TABLE IF EXISTS `wsite`;

CREATE TABLE `wsite` (
  `idsite` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `nom_site` varchar(50) DEFAULT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `pass_user` varchar(255) DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsite`),
  KEY `FK_site` (`idcategoria`),
  KEY `FK_site_user` (`idusuario`),
  CONSTRAINT `FK_site` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `FK_site_user` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `wsite` */

LOCK TABLES `wsite` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
