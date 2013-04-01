-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2013 at 06:10 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_lnu`
--
CREATE DATABASE `new_lnu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `new_lnu`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accountant`
--

CREATE TABLE IF NOT EXISTS `tbl_accountant` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accountant`
--

INSERT INTO `tbl_accountant` (`id`, `username`, `password`) VALUES
(1, 'accountant', '9ab76963196efd61d76f6d535d1655e9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE IF NOT EXISTS `tbl_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_announcement`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(5000) NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_answer`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer_to_question`
--

CREATE TABLE IF NOT EXISTS `tbl_answer_to_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_answer_to_question`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE IF NOT EXISTS `tbl_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL,
  `author` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `thumb_nail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_article`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_attachment_image`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_attachment_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_banner_attachment_image`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE IF NOT EXISTS `tbl_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `studNum` int(11) NOT NULL,
  `bday` date NOT NULL,
  `placeOfBirth` varchar(255) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `civilStatus` enum('Single','Married','Widowed') NOT NULL,
  `religion` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `spouse` varchar(255) NOT NULL,
  `permanentAddress` text NOT NULL,
  `contactNum` bigint(20) NOT NULL,
  `elem` varchar(255) NOT NULL,
  `elemYr` year(4) NOT NULL,
  `highSchool` varchar(255) NOT NULL,
  `highSchoolYr` year(4) NOT NULL,
  `underGrad` varchar(255) NOT NULL,
  `underGradYr` int(11) NOT NULL,
  `grad` varchar(255) NOT NULL,
  `gradYr` year(4) NOT NULL,
  `course` varchar(255) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `dateOfFirstAttendance` date NOT NULL,
  `dateOfLastAttendance` date NOT NULL,
  `numOf_Sem_Summer` varchar(100) NOT NULL,
  `gradDate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `studNum` (`studNum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `name`, `studNum`, `bday`, `placeOfBirth`, `citizenship`, `civilStatus`, `religion`, `father`, `mother`, `spouse`, `permanentAddress`, `contactNum`, `elem`, `elemYr`, `highSchool`, `highSchoolYr`, `underGrad`, `underGradYr`, `grad`, `gradYr`, `course`, `specification`, `dateOfFirstAttendance`, `dateOfLastAttendance`, `numOf_Sem_Summer`, `gradDate`) VALUES
(1, 'Ruben Bert Pingol', 901912, '1993-05-16', 'Tacloban City', 'Filipino', 'Single', 'Roman Catholic', 'Alberto Pingol', 'Ma. Nilda Pingol', '', 'Brgy. 59-A 1st St. Sampaguita, Tacloban City', 639128465460, 'San Fernando Central School', 2005, 'Cirilo Roy Montejo National School', 2009, 'Leyte Normal University', 2013, '', 0000, 'Bachelor of Science in Information Technology', '', '2009-06-15', '2013-03-18', '8 semesters, 1 summer', '2013-03-18'),
(2, 'John Temoty Homeres Roca', 901293, '1992-12-09', 'Manila', 'Pilipino', 'Single', 'Roman Catholic', 'Daniel Langahid Roca', 'Susan Homeres Roca', 'Angel Locsin', 'Brgy. 104 Salvacion Tacloban City', 9286638253, 'City Central School', 2005, 'Leyte National High School', 2009, 'Leyte Normal University', 2013, '', 0000, 'BSIT', '', '2009-06-15', '2013-03-18', '8 sem- 1summer', '2013-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college`
--

CREATE TABLE IF NOT EXISTS `tbl_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `acro` varchar(10) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_college`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_details`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_contact_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_doc`
--

CREATE TABLE IF NOT EXISTS `tbl_doc` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_doc`
--

INSERT INTO `tbl_doc` (`id`, `doc_name`) VALUES
(1, 'Transcript of Record'),
(2, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp`
--

CREATE TABLE IF NOT EXISTS `tbl_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ln` varchar(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `mn` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_emp`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_forms`
--

CREATE TABLE IF NOT EXISTS `tbl_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_uploaded` date NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_forms`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_function_office`
--

CREATE TABLE IF NOT EXISTS `tbl_function_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `func` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_function_office`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_linkage`
--

CREATE TABLE IF NOT EXISTS `tbl_linkage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_linkage`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_links`
--

CREATE TABLE IF NOT EXISTS `tbl_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_mission_vision`
--

CREATE TABLE IF NOT EXISTS `tbl_mission_vision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(5000) NOT NULL,
  `col_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_mission_vision`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_office`
--

CREATE TABLE IF NOT EXISTS `tbl_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_office`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_pending`
--

CREATE TABLE IF NOT EXISTS `tbl_pending` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_pending`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date_taken` date NOT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_photo`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_photo_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_modified` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_photo_gallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE IF NOT EXISTS `tbl_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_program`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_question`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE IF NOT EXISTS `tbl_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rank_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_rank`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrar`
--

CREATE TABLE IF NOT EXISTS `tbl_registrar` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_registrar`
--

INSERT INTO `tbl_registrar` (`id`, `username`, `password`) VALUES
(1, 'registrar', 'b457e0311886a36bdca94052e5cafcd1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_release`
--

CREATE TABLE IF NOT EXISTS `tbl_release` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_release`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE IF NOT EXISTS `tbl_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `claim_type` enum('For pick-up','For delivery') NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=On process,1=On release',
  `level` enum('Graduate','Undergraduate') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id`, `client_id`, `doc_id`, `claim_type`, `status`, `level`, `date`) VALUES
(1, 1, 1, 'For pick-up', '0', 'Graduate', '2013-03-25'),
(2, 1, 2, 'For pick-up', '0', 'Graduate', '2013-03-25'),
(3, 2, 1, 'For delivery', '1', 'Graduate', '2013-03-21'),
(6, 2, 2, 'For pick-up', '1', 'Graduate', '2013-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_request_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `request_id` (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_request_payment`
--

INSERT INTO `tbl_request_payment` (`id`, `request_id`, `date`) VALUES
(25, 6, '2013-03-27 17:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seals`
--

CREATE TABLE IF NOT EXISTS `tbl_seals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seal_num` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_seals`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_slide_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_slide_banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_unit`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fn` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `mn` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_user`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
