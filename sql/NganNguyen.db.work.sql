
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Js
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inputs`;

CREATE TABLE `inputs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `unit_price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `inputs` WRITE;

INSERT INTO `inputs` (`id`, `description`, `quantity`, `unit_price`)
VALUES
	(1,'Cake',2,12.80),
	(2,'Chair',1,300.10);
UNLOCK TABLES;


# Dump of table file_uploads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file_uploads`;

CREATE TABLE `file_uploads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path` text NOT NULL,  
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `file_uploads` WRITE;

INSERT INTO `file_uploads` (`id`, `name`, `path`, `created`)
VALUES
	(1,'FileUpload.csv','../files/FileUpload.csv', '2015-05-28 13:19:49'),
	(2,'migration_sample_1.xlsx','../files/migration_sample_1.xlsx', '2015-05-28 13:19:49');
UNLOCK TABLES;


