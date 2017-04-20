/*
SQLyog Ultimate v9.50 
MySQL - 5.7.15-log : Database - cripto
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
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

insert  into `categoria`(`idcategoria`,`categoria`) values (1,'Emails'),(2,'Redes sociales'),(3,'Trabajo'),(4,'Bancos'),(11,'otras');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `notas` */

LOCK TABLES `notas` WRITE;

insert  into `notas`(`idnota`,`titulo`,`nota`,`idusuario`) values (1,'test nota','falta encriptar esta nota de prueba',1);

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave principal del usuario',
  `nombre` varchar(20) DEFAULT NULL COMMENT 'Nombre del usuario',
  `apellido` varchar(20) DEFAULT NULL COMMENT 'Apellido del usuario',
  `email` varchar(30) DEFAULT NULL COMMENT 'Email del usuario',
  `pass` varchar(50) DEFAULT NULL COMMENT 'Clave de acceso al sistema',
  `activo` int(1) DEFAULT '0' COMMENT 'Identifica si esta activo o inactivo',
  `intentos` int(1) DEFAULT '0' COMMENT 'Contador de intentos, para bloquear el usuario, max 3.',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`idusuario`,`nombre`,`apellido`,`email`,`pass`,`activo`,`intentos`) values (1,'edwin','campos','ecampos@gmail.com','abcabc',1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `wsite` */

LOCK TABLES `wsite` WRITE;

insert  into `wsite`(`idsite`,`url`,`nom_site`,`nom_user`,`pass_user`,`notas`,`idcategoria`,`idusuario`) values (1,'www.facebbok.com','facebook','correo de hotmail','asdf09a80sdf8a09sdf','test2',1,1),(2,'asdfasdfas','asdfasdfak','asdkfalsk','asdfaksdkfjkja','asdfaskj',1,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
