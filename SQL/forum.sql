/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - forum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`forum` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `forum`;

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `comment` varchar(500) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_topic_FK` (`topic_id`),
  CONSTRAINT `comment_topic_FK` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

insert  into `comment`(`id`,`topic_id`,`comment`,`timestamp`) values 
(1,1,'Goldens suck!','2022-05-17 14:16:29'),
(2,1,'No, you suck!','2022-05-17 14:16:37'),
(4,2,'A PUPPY IS A PUPPY','2022-05-16 15:16:49'),
(5,2,'How does puppy\'s gender matter? You\'re dumb ','2022-05-16 15:16:56'),
(6,2,'No, you\'re dumb!','0000-00-00 00:00:00'),
(7,1,'Bleh','2022-05-19 15:23:24'),
(8,1,'I, uh, have no opinion, but i feel like i must have one, so here goes: goldens are okay, i guess','2022-05-19 15:26:42'),
(25,4,'Yeah, hire someone better','2022-05-20 11:21:08'),
(26,4,'Come on, don\'t be so mean. I bet their dev is learning','2022-05-20 11:21:22'),
(27,4,'Should learn better','2022-05-20 11:21:43'),
(28,2,'Everyone is dumb, except for me. I\'m on a horse','2022-05-20 11:22:17'),
(29,2,'I mean, if I was a horse...','2022-05-20 11:22:50'),
(30,5,'Way ahead of you','2022-08-01 14:30:24');

/*Table structure for table `topic` */

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creator` varchar(255) DEFAULT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `topic` */

insert  into `topic`(`id`,`name`,`description`,`creator`,`timestamp`) values 
(1,'Golden Retrievers','Let\'s discuss the best dogs (monsters who disagree on Goldens\'status will be punished. ONLY LOVERS IN HERE!)','admin','2022-05-15 14:35:45'),
(2,'Bullshit','These questionnaire results are bullshit! Male puppies are the cutest','admin','2022-05-14 18:35:54'),
(4,'Design','Wow, design of this forum is shit. A monkey in 1999 could write a better site','admin','2022-05-16 16:14:43'),
(5,'Git stuff','Learn symfony, rube!','admin','2022-08-01 14:29:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
