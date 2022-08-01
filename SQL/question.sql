/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - question
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`question` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `question`;

/*Table structure for table `q_q_option` */

DROP TABLE IF EXISTS `q_q_option`;

CREATE TABLE `q_q_option` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_question_id` int(100) unsigned NOT NULL,
  `option` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `q_q_option_questionnaire_question_id` (`questionnaire_question_id`),
  CONSTRAINT `FK_q_q_option_questionnaire_question_id` FOREIGN KEY (`questionnaire_question_id`) REFERENCES `questionnaire_question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `q_q_option` */

insert  into `q_q_option`(`id`,`questionnaire_question_id`,`option`) values 
(1,1,'Yes'),
(2,1,'No'),
(3,2,'Of course'),
(4,2,'No, i\'m a monster'),
(5,6,'Horribly so'),
(6,6,'Meh, i\'m ready to die'),
(7,6,'Nah, we all be fine. Probably'),
(8,10,'Golden Retriever(best dog)'),
(10,10,'Poodle'),
(11,10,'Rottweiler'),
(12,10,'Doberman'),
(13,34,'test11'),
(14,34,'test14'),
(15,10,'Bernese Zennenhund'),
(16,11,'Newborn'),
(17,11,'1 month'),
(18,11,'2 months'),
(19,11,'3 months'),
(22,38,'Males'),
(23,38,'Females'),
(24,38,'A PUPPY IS A PUPPY!'),
(25,39,'Yes, it does'),
(26,39,'It absolutely does'),
(27,40,'Nothing but it'),
(28,40,'Only plain PHP, only hardcore');

/*Table structure for table `questionnaire` */

DROP TABLE IF EXISTS `questionnaire`;

CREATE TABLE `questionnaire` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

/*Data for the table `questionnaire` */

insert  into `questionnaire`(`id`,`name`) values 
(1,'Ukraine'),
(2,'Kittens'),
(3,'Nuclear war'),
(56,'Cute Little Pups'),
(57,'Puppies'),
(60,''),
(61,''),
(62,'test11'),
(63,''),
(64,'Git Stuff');

/*Table structure for table `questionnaire_question` */

DROP TABLE IF EXISTS `questionnaire_question`;

CREATE TABLE `questionnaire_question` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_id` int(100) unsigned NOT NULL,
  `question` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionaire_question_questionnaire_id` (`questionnaire_id`),
  CONSTRAINT `FK_questionaire_question_questionnaire_id` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `questionnaire_question` */

insert  into `questionnaire_question`(`id`,`questionnaire_id`,`question`) values 
(1,1,'Do you approve war in Ukraine?'),
(2,2,'Do you find kittens cute?'),
(6,3,'How worried are you about nuclear war?'),
(10,56,'What breed of puppies is the cutest?'),
(11,56,'At what age are puppies is the cutest?'),
(33,62,'test11'),
(34,62,'Test12'),
(38,56,'Cuteness battle: male or female puppies?'),
(39,64,'Does this project still work?'),
(40,64,'Is it written in plain PHP?');

/*Table structure for table `questionnaire_result` */

DROP TABLE IF EXISTS `questionnaire_result`;

CREATE TABLE `questionnaire_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `questionnaire_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_result_questionnaire_id` (`questionnaire_id`),
  CONSTRAINT `FK_questionnaire_result_questionnaire_id` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaire` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `questionnaire_result` */

insert  into `questionnaire_result`(`id`,`email`,`questionnaire_id`) values 
(1,'test@test.com',56),
(16,'blahblah@gmail.com',56),
(30,'test@test.com',56),
(34,'bleh',56),
(35,'blah',56),
(40,'mde@mail.nl',56),
(41,'aretheregonnabe3@mail.ru',56),
(42,'e@mail.nl',56),
(43,'test@test.com',56),
(44,'test@test.com',56),
(45,'test@test.com',56),
(46,'test@test.com',56),
(47,'test@test.com',56),
(48,'test@test.com',56),
(49,'test@test.com',56),
(50,'test@test.com',56),
(51,'test@test.com',56),
(52,'test@test.com',56),
(53,'test@test.com',56),
(54,'test@test.com',56),
(55,'test@test.com',56),
(56,'test@test.com',56),
(57,'test@test.com',56),
(58,'blah@blah.com',56),
(59,'test@test.com',56),
(60,'test@test.com',64);

/*Table structure for table `questionnaire_result_answer` */

DROP TABLE IF EXISTS `questionnaire_result_answer`;

CREATE TABLE `questionnaire_result_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionnaire_result_id` int(10) unsigned NOT NULL,
  `questionnaire_question_id` int(10) unsigned NOT NULL,
  `q_q_option_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questionnaire_result_answer_questionnaire_result_id` (`questionnaire_result_id`),
  KEY `questionnaire_result_answer_questionnaire_question_id` (`questionnaire_question_id`),
  KEY `questionnaire_result_answer_q_q_option_id` (`q_q_option_id`),
  CONSTRAINT `FK_questionnaire_result_answer_q_q_option_id` FOREIGN KEY (`q_q_option_id`) REFERENCES `q_q_option` (`id`),
  CONSTRAINT `FK_questionnaire_result_answer_questionnaire_question_id` FOREIGN KEY (`questionnaire_question_id`) REFERENCES `questionnaire_question` (`id`),
  CONSTRAINT `FK_questionnaire_result_answer_questionnaire_result_id` FOREIGN KEY (`questionnaire_result_id`) REFERENCES `questionnaire_result` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `questionnaire_result_answer` */

insert  into `questionnaire_result_answer`(`id`,`questionnaire_result_id`,`questionnaire_question_id`,`q_q_option_id`) values 
(2,1,10,8),
(3,16,38,24),
(4,30,10,11),
(5,30,11,18),
(6,30,38,24),
(7,34,10,11),
(8,34,11,19),
(9,34,38,24),
(10,35,10,12),
(11,35,11,19),
(12,35,38,22),
(13,40,10,15),
(14,40,11,17),
(15,40,38,24),
(16,41,10,10),
(17,41,11,17),
(18,41,38,24),
(19,42,10,12),
(20,42,11,19),
(21,42,38,23),
(22,43,10,8),
(23,43,11,16),
(24,43,38,24),
(25,44,10,15),
(26,44,11,19),
(27,44,38,24),
(28,45,10,8),
(29,45,11,17),
(30,45,38,24),
(31,46,10,12),
(32,46,11,17),
(33,46,38,24),
(34,47,10,11),
(35,47,11,19),
(36,47,38,24),
(37,48,10,15),
(38,48,11,19),
(39,48,38,24),
(40,49,10,8),
(41,49,11,17),
(42,49,38,24),
(43,50,10,12),
(44,50,11,19),
(45,50,38,23),
(46,51,10,11),
(47,51,11,19),
(48,51,38,24),
(49,52,10,15),
(50,52,11,18),
(51,52,38,22),
(52,53,10,12),
(53,53,11,19),
(54,53,38,24),
(55,54,10,15),
(56,54,11,19),
(57,54,38,23),
(58,55,10,12),
(59,55,11,19),
(60,55,38,24),
(61,56,10,11),
(62,56,11,18),
(63,56,38,24),
(64,57,10,11),
(65,57,11,19),
(66,57,38,24),
(67,58,10,12),
(68,58,11,18),
(69,58,38,24),
(70,59,10,11),
(71,59,11,19),
(72,59,38,24),
(73,60,39,25),
(74,60,40,28);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
