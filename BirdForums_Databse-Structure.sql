-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2017 at 05:10 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `Forums`
--

CREATE TABLE IF NOT EXISTS `Forums` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `CID` int(11) NOT NULL,
  `Forum_Name` varchar(60) NOT NULL,
  `Forum_Description` text NOT NULL,
  `Forum_Locked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FID`),
  KEY `Categories_Forums_FK1` (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE IF NOT EXISTS `Groups` (
  `GID` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Name` varchar(60) NOT NULL,
  `Group_Description` varchar(100) NOT NULL,
  `Group_Badge_BackColor` varchar(6) NOT NULL DEFAULT '000000',
  `Group_Badge_ForeColor` varchar(6) NOT NULL DEFAULT 'ffffff',
  `Group_Default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`GID`),
  UNIQUE KEY `Groups_AK1` (`Group_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
  `Reply_Content` text NOT NULL,
  `Reply_Date` datetime NOT NULL,
  PRIMARY KEY (`RID`),
  KEY `Users_Replys_FK1` (`UID`),
  KEY `Topics_Replys_FK1` (`TID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- --------------------------------------------------------

--
-- Table structure for table `Reports`
--

CREATE TABLE IF NOT EXISTS `Reports` (
  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL COMMENT 'UID of the user who is warning',
  `Target_UID` int(11) NOT NULL COMMENT 'UID of the user being warned',
  `Report_Date` datetime NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Linked_Topic` int(11) DEFAULT NULL,
  `Linked_Reply` int(11) DEFAULT NULL,
  PRIMARY KEY (`ReportID`),
  UNIQUE KEY `ReportID` (`ReportID`),
  UNIQUE KEY `ReportID_2` (`ReportID`),
  UNIQUE KEY `ReportID_3` (`ReportID`),
  UNIQUE KEY `UID` (`UID`),
  UNIQUE KEY `Target_UID` (`Target_UID`),
  UNIQUE KEY `Linked_Topic` (`Linked_Topic`),
  UNIQUE KEY `Linked_Reply` (`Linked_Reply`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Topic_Date` datetime NOT NULL,
  `Topic_Views` int(11) NOT NULL DEFAULT '0',
  `Topic_Locked` tinyint(1) NOT NULL DEFAULT '0',
  `Topic_Visability` tinyint(1) NOT NULL DEFAULT '1',
  `Topic_Moved` tinyint(1) NOT NULL DEFAULT '0',
  `Topic_Pined` tinyint(1) NOT NULL DEFAULT '0',
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
  `User_Dissabled` tinyint(1) NOT NULL DEFAULT '0',
  `User_Timeout` datetime NOT NULL,
  `Account_Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_LastSeen` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Profile_Pic` text NOT NULL,
  `User_Signature` text,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `Users_AK1` (`Account_Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9157 ;

-- --------------------------------------------------------

--
-- Table structure for table `Warning`
--

CREATE TABLE IF NOT EXISTS `Warning` (
  `WID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL COMMENT 'UID of the user who is warning',
  `Target_UID` int(11) NOT NULL COMMENT 'UID of the user being warned',
  `Warn_Date` datetime NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Linked_Topic` int(11) DEFAULT NULL,
  `Linked_Reply` int(11) DEFAULT NULL,
  PRIMARY KEY (`WID`),
  UNIQUE KEY `UID_2` (`UID`,`Target_UID`),
  UNIQUE KEY `UID_3` (`UID`,`Target_UID`),
  UNIQUE KEY `UID_4` (`UID`,`Target_UID`),
  UNIQUE KEY `WID` (`WID`),
  UNIQUE KEY `Linked_Topic` (`Linked_Topic`),
  UNIQUE KEY `Linked_Reply` (`Linked_Reply`),
  KEY `UID` (`UID`),
  KEY `Target_UID` (`Target_UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Warning_LinkedReports`
--

CREATE TABLE IF NOT EXISTS `Warning_LinkedReports` (
  `WID` int(11) NOT NULL,
  `ReportID` int(11) NOT NULL,
  UNIQUE KEY `WID` (`WID`),
  UNIQUE KEY `ReportID` (`ReportID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Constraints for table `Reports`
--
ALTER TABLE `Reports`
  ADD CONSTRAINT `Reports_ibfk_5` FOREIGN KEY (`ReportID`) REFERENCES `Warning_LinkedReports` (`ReportID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Reports_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Reports_ibfk_2` FOREIGN KEY (`Target_UID`) REFERENCES `Users` (`UID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Reports_ibfk_3` FOREIGN KEY (`Linked_Topic`) REFERENCES `Topics` (`TID`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `Reports_ibfk_4` FOREIGN KEY (`Linked_Reply`) REFERENCES `Replys` (`RID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `Topics`
--
ALTER TABLE `Topics`
  ADD CONSTRAINT `Forums_Topics_FK1` FOREIGN KEY (`FID`) REFERENCES `Forums` (`FID`),
  ADD CONSTRAINT `Users_Topics_FK1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`);

--
-- Constraints for table `Warning`
--
ALTER TABLE `Warning`
  ADD CONSTRAINT `Warning_ibfk_5` FOREIGN KEY (`WID`) REFERENCES `Warning_LinkedReports` (`WID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Warning_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `Users` (`UID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Warning_ibfk_2` FOREIGN KEY (`Target_UID`) REFERENCES `Users` (`UID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Warning_ibfk_3` FOREIGN KEY (`Linked_Reply`) REFERENCES `Replys` (`RID`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `Warning_ibfk_4` FOREIGN KEY (`Linked_Topic`) REFERENCES `Topics` (`TID`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
