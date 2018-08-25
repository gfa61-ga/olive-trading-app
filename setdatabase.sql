-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.46


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema elies2015
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2015;
USE elies2015;

--
-- Table structure for table `elies2015`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2015`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2015`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2015`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2015`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2015`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2015`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2015`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2015`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2016
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2016;
USE elies2016;

--
-- Table structure for table `elies2016`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2016`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2016`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2016`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,95 € / κιλό)',1.95),
 (2,'120 (1,80 € / κιλό)',1.8),
 (3,'130 (1,70 € / κιλό)',1.7),
 (4,'140 (1,60 € / κιλό)',1.6),
 (5,'150 (1,50 € / κιλό)',1.5),
 (6,'160 (1,40 € / κιλό)',1.4),
 (7,'170 (1,30 € / κιλό)',1.3),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,15 € / κιλό)',1.15),
 (10,'220 (1,05 € / κιλό)',1.05),
 (11,'240 (0,95 € / κιλό)',0.95),
 (12,'260 (0,85 € / κιλό)',0.85),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4),
 (18,'Α/Κ (0,50 € / κιλό) ',0.5),
 (19,'200* (1,18 € / κιλό)',1.18);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2016`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2016`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2016`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2016`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2016`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2017
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2017;
USE elies2017;

--
-- Table structure for table `elies2017`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2017`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2017`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2017`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2017`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2017`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2017`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2017`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2017`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2018
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2018;
USE elies2018;

--
-- Table structure for table `elies2018`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2018`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2018`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2018`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2018`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2018`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2018`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2018`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2018`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2019
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2019;
USE elies2019;

--
-- Table structure for table `elies2019`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2019`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2019`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2019`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2019`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2019`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2019`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2019`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2019`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2020
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2020;
USE elies2020;

--
-- Table structure for table `elies2020`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2020`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2020`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2020`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2020`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2020`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2020`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2020`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2020`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2021
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2021;
USE elies2021;

--
-- Table structure for table `elies2021`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2021`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2021`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2021`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2021`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2021`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2021`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2021`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2021`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2022
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2022;
USE elies2022;

--
-- Table structure for table `elies2022`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2022`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2022`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2022`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2022`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2022`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2022`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2022`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2022`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2023
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2023;
USE elies2023;

--
-- Table structure for table `elies2023`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2023`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2023`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2023`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2023`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2023`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2023`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2023`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2023`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2024
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2024;
USE elies2024;

--
-- Table structure for table `elies2024`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2024`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2024`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2024`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2024`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2024`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2024`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2024`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2024`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Create schema elies2025
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ elies2025;
USE elies2025;

--
-- Table structure for table `elies2025`.`anal_paral`
--

DROP TABLE IF EXISTS `anal_paral`;
CREATE TABLE `anal_paral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  `id_katigorias` int(10) unsigned DEFAULT NULL,
  `posotita` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_paral_2` (`id_katigorias`) USING BTREE,
  KEY `FK_anal_paral_1` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2025`.`anal_paral`
--

/*!40000 ALTER TABLE `anal_paral` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_paral` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`anal_timol`
--

DROP TABLE IF EXISTS `anal_timol`;
CREATE TABLE `anal_timol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_timologiou` int(10) unsigned DEFAULT NULL,
  `id_paralabis` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_anal_timol_1` (`id_timologiou`),
  KEY `FK_anal_timol_2` (`id_paralabis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2025`.`anal_timol`
--

/*!40000 ALTER TABLE `anal_timol` DISABLE KEYS */;
/*!40000 ALTER TABLE `anal_timol` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`katigories`
--

DROP TABLE IF EXISTS `katigories`;
CREATE TABLE `katigories` (
  `id_katigorias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perigrafi` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timi` float DEFAULT NULL,
  PRIMARY KEY (`id_katigorias`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `elies2025`.`katigories`
--

/*!40000 ALTER TABLE `katigories` DISABLE KEYS */;
INSERT INTO `katigories` (`id_katigorias`,`perigrafi`,`timi`) VALUES 
 (1,'110 (1,80 € / κιλό)',1.8),
 (2,'120 (1,70 € / κιλό)',1.7),
 (3,'130 (1,65 € / κιλό)',1.65),
 (4,'140 (1,50 € / κιλό)',1.5),
 (5,'150 (1,40 € / κιλό)',1.4),
 (6,'160 (1,35 € / κιλό)',1.35),
 (7,'170 (1,25 € / κιλό)',1.25),
 (8,'180 (1,20 € / κιλό)',1.2),
 (9,'200 (1,10 € / κιλό)',1.1),
 (10,'220 (1,00 € / κιλό)',1),
 (11,'240 (0,90 € / κιλό)',0.9),
 (12,'260 (0,80 € / κιλό)',0.8),
 (13,'280 (0,75 € / κιλό)',0.75),
 (14,'300 (0,70 € / κιλό)',0.7),
 (15,'320 (0,65 € / κιλό)',0.65),
 (16,'350 (0,60 € / κιλό)',0.6),
 (17,'Πρασ (0,40 € / κιλό)',0.4);
/*!40000 ALTER TABLE `katigories` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`paralabes`
--

DROP TABLE IF EXISTS `paralabes`;
CREATE TABLE `paralabes` (
  `id_paralabis` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `eksoflithike` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_paralabis`),
  KEY `FK_paralabes_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2025`.`paralabes`
--

/*!40000 ALTER TABLE `paralabes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paralabes` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`pelates`
--

DROP TABLE IF EXISTS `pelates`;
CREATE TABLE `pelates` (
  `id_pelati` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eponimo` varchar(35) DEFAULT NULL,
  `onoma` varchar(35) DEFAULT NULL,
  `diefthinsi` varchar(45) DEFAULT NULL,
  `afm` varchar(12) DEFAULT NULL,
  `tilefona` varchar(35) DEFAULT NULL,
  `traplog` varchar(30) DEFAULT NULL,
  `eidtim` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2025`.`pelates`
--

/*!40000 ALTER TABLE `pelates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelates` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`timologia`
--

DROP TABLE IF EXISTS `timologia`;
CREATE TABLE `timologia` (
  `id_timologiou` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelati` int(10) unsigned DEFAULT NULL,
  `aa_tim` varchar(15) DEFAULT NULL,
  `imerominia` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_timologiou`),
  KEY `FK_timologia_1` (`id_pelati`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elies2025`.`timologia`
--

/*!40000 ALTER TABLE `timologia` DISABLE KEYS */;
/*!40000 ALTER TABLE `timologia` ENABLE KEYS */;


--
-- Table structure for table `elies2025`.`users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `forename` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elies2025`.`users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`forename`,`surname`,`username`,`password`) VALUES 
 ('Γιάννα','Βαλή','bali','0007e35579c75faf2fab759186feeb52'),
 ('Χρήστο','Τσακινίκας','tsak','0007e35579c75faf2fab759186feeb52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
