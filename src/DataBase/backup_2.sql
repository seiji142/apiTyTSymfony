/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - prueba2_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba2_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `prueba2_db`;

/*Table structure for table `conexion` */

DROP TABLE IF EXISTS `conexion`;

CREATE TABLE `conexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `origen_id` int(11) NOT NULL,
  `destino_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_847691C193529ECD` (`origen_id`),
  KEY `IDX_847691C1E4360615` (`destino_id`),
  CONSTRAINT `FK_847691C193529ECD` FOREIGN KEY (`origen_id`) REFERENCES `pais` (`id`),
  CONSTRAINT `FK_847691C1E4360615` FOREIGN KEY (`destino_id`) REFERENCES `pais` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `conexion` */

insert  into `conexion`(`id`,`precio`,`origen_id`,`destino_id`) values (1,-100,1,2),(2,100,2,3),(3,-150,3,4),(4,0,4,5),(5,200,5,6),(6,0,6,7),(7,250,7,8),(8,350,8,9);

/*Table structure for table `doctrine_migration_versions` */

DROP TABLE IF EXISTS `doctrine_migration_versions`;

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `doctrine_migration_versions` */

insert  into `doctrine_migration_versions`(`version`,`executed_at`,`execution_time`) values ('DoctrineMigrations\\Version20220731144313','2022-07-31 16:47:25',263),('DoctrineMigrations\\Version20220731151646','2022-07-31 17:17:44',127),('DoctrineMigrations\\Version20220806162237','2022-08-06 18:23:30',318),('DoctrineMigrations\\Version20220807072829','2022-08-07 09:31:38',424),('DoctrineMigrations\\Version20220807075013','2022-08-07 09:50:26',260),('DoctrineMigrations\\Version20220807075624','2022-08-07 09:56:43',57),('DoctrineMigrations\\Version20220809211814','2022-08-09 23:21:20',87);

/*Table structure for table `pais` */

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cant_dias` int(11) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pais` */

insert  into `pais`(`id`,`nombre`,`cant_dias`,`precio`,`imagen`) values (1,'India',8,972,'algo'),(2,'Nepal',8,1000,'algo'),(3,'Tailandia',11,1175,'algo'),(4,'Camboya',3,690,'algo'),(5,'Singapur',3,470,'algo'),(6,'Vietnam',11,1290,'algo'),(7,'Malasia',7,1010,'algo'),(8,'Indonesia',9,935,'algo'),(9,'Filipinas',8,900,'algo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
