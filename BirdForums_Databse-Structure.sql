-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2017 at 08:29 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

--
-- Copyright (c) 2017 Tasman Leach
-- This Database structure is designed to be used with the BirdForums web app that is avaliable on github at https://github.com/AssaultBird2454/IPT-BirdForums
-- The associated copyright licence file can be found in the same github repository at https://github.com/AssaultBird2454/IPT-BirdForums/blob/master/LICENSE
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tleac9_BirdForums`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(60) NOT NULL,
  `Category_Description` text NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Forums`
--

CREATE TABLE IF NOT EXISTS `Forums` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `CID` int(11) NOT NULL,
  `Forum_Name` varchar(60) NOT NULL,
  `Forum_Description` text NOT NULL,
  PRIMARY KEY (`FID`),
  KEY `Categories_Forums_FK1` (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE IF NOT EXISTS `Groups` (
  `GID` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Name` varchar(60) NOT NULL,
  `Group_Description` varchar(60) NOT NULL,
  `Group_Default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`GID`),
  UNIQUE KEY `Groups_AK1` (`Group_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `Group_Membership`
--

CREATE TABLE IF NOT EXISTS `Group_Membership` (
  `UID` int(11) NOT NULL,
  `GID` int(11) NOT NULL,
  `Membership_Expiry` datetime NOT NULL,
  PRIMARY KEY (`UID`,`GID`),
  KEY `Groups_Group_Membership_FK1` (`GID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Group_Permissions`
--

CREATE TABLE IF NOT EXISTS `Group_Permissions` (
  `GID` int(11) NOT NULL,
  `Permission_Node` varchar(60) NOT NULL,
  `Permission_Expiry` datetime NOT NULL,
  PRIMARY KEY (`GID`,`Permission_Node`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Replys`
--

CREATE TABLE IF NOT EXISTS `Replys` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `TID` int(11) NOT NULL,
  `Reply_Content` varchar(60) NOT NULL,
  `Reply_Date` datetime NOT NULL,
  PRIMARY KEY (`RID`),
  KEY `Users_Replys_FK1` (`UID`),
  KEY `Topics_Replys_FK1` (`TID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Topics`
--

CREATE TABLE IF NOT EXISTS `Topics` (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `FID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Topic_Name` text NOT NULL,
  `Topic_Description` text NOT NULL,
  `Topic_Tags` text NOT NULL,
  `Topic_Content` text NOT NULL,
  `Topic_Date` datetime NOT NULL,
  PRIMARY KEY (`TID`),
  KEY `Forums_Topics_FK1` (`FID`),
  KEY `Users_Topics_FK1` (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(60) NOT NULL,
  `Last_Name` varchar(60) NOT NULL,
  `Account_Username` varchar(20) NOT NULL,
  `Account_Password` varchar(1024) NOT NULL,
  `Account_Salt` varchar(1024) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Users_AK1` (`Account_Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Forums`
--
ALTER TABLE `Forums`
  ADD CONSTRAINT `Categories_Forums_FK1` FOREIGN KEY (`CID`) REFERENCES `Categories` (`CID`);

--
-- Constraints for table `Group_Membership`
--
ALTER TABLE `Group_Membership`
  ADD CONSTRAINT `Groups_Group_Membership_FK1` FOREIGN KEY (`GID`) REFERENCES `Groups` (`GID`),
  ADD CONSTRAINT `Users_Group_Membership_FK1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`);

--
-- Constraints for table `Group_Permissions`
--
ALTER TABLE `Group_Permissions`
  ADD CONSTRAINT `Groups_Group_Permissions_FK1` FOREIGN KEY (`GID`) REFERENCES `Groups` (`GID`);

--
-- Constraints for table `Replys`
--
ALTER TABLE `Replys`
  ADD CONSTRAINT `Topics_Replys_FK1` FOREIGN KEY (`TID`) REFERENCES `Topics` (`TID`),
  ADD CONSTRAINT `Users_Replys_FK1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`);

--
-- Constraints for table `Topics`
--
ALTER TABLE `Topics`
  ADD CONSTRAINT `Forums_Topics_FK1` FOREIGN KEY (`FID`) REFERENCES `Forums` (`FID`),
  ADD CONSTRAINT `Users_Topics_FK1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
