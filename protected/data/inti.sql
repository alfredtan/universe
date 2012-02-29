-- phpMyAdmin SQL Dump
-- version 3.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 29, 2012 at 04:38 PM
-- Server version: 5.0.85
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inti`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `word` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `name`, `word`) VALUES
(1, 'INTI International University (INTI IU)', 'in the countryside'),
(2, 'INTI International College Penang (IICP)', 'by the seaside'),
(3, 'INTI College Sabah (ICS)', 'in the mountains'),
(4, 'INTI International College Subang (IICS)', 'in the suburbs'),
(5, 'INTI College Sarawak (ICSK)', 'in the rainforests'),
(6, 'PJ College of Art & Design (PJCAD)', 'in the studio');

-- --------------------------------------------------------

--
-- Table structure for table `campus_course`
--

CREATE TABLE IF NOT EXISTS `campus_course` (
  `campusId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  KEY `campusId` (`campusId`,`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campus_course`
--

INSERT INTO `campus_course` (`campusId`, `courseId`) VALUES
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 10),
(1, 11),
(1, 12),
(2, 6),
(2, 7),
(2, 8),
(2, 12),
(3, 6),
(3, 7),
(3, 9),
(3, 12),
(4, 3),
(4, 6),
(4, 7),
(4, 8),
(4, 11),
(4, 12),
(5, 6),
(5, 9),
(5, 12),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `word` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `word`) VALUES
(2, 'Allied Health & Sciences', 'physiotherapist'),
(3, 'American Degree Transfer Program', 'Ivy League Graduate'),
(4, 'Art & Design', 'creative'),
(5, 'Biotechnology & Life Sciences', 'biotechnologist'),
(6, 'Business', 'entrepreneur'),
(7, 'Computing & IT', 'technologist'),
(8, 'Engineering', 'engineer'),
(9, 'Hospitality', 'hotelier'),
(10, 'Law', 'lawyer'),
(11, 'Mass Communication', 'journalist'),
(12, 'Pre-University Programmes', 'post graduate');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `word` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `name`, `word`) VALUES
(1, 'Adventure Club', ''),
(2, 'Aikido Club', ''),
(3, 'AIESEC', ''),
(4, 'Astronomy Club', ''),
(5, 'Badminton Club', ''),
(6, 'Basketball Club', ''),
(7, 'Bowling Club', ''),
(8, 'Chess Challenge Club', ''),
(9, 'Dance Academy Club', ''),
(10, 'Debate Society', ''),
(11, 'Dragon Lion Dance Club ', ''),
(12, 'Drama Club', ''),
(13, 'Dodgeball Club', ''),
(14, 'Futsal Club', ''),
(15, 'Handball Club', ''),
(16, 'INTI Concert Band', ''),
(17, 'LEO Club', ''),
(18, 'Life Saving & Swimming Club', ''),
(19, 'Manga, Anime, Games Club', ''),
(20, 'Photography Club', ''),
(21, 'Skate Club', ''),
(22, 'Squash Club', ''),
(23, 'Student Action Club', ''),
(24, 'Table Tennis Club', ''),
(25, 'Taekwondo Club', ''),
(26, 'Tennis Club', ''),
(27, 'Ultimate Frisbee Club', ''),
(28, 'Volleyball Club', ''),
(29, 'INTI Movie Making Club', ''),
(30, 'Civil Engineering Club', ''),
(31, 'RECREATIONAL & OUTDOOR CLUB (IROC)', ''),
(32, 'Choir Club', '');

-- --------------------------------------------------------

--
-- Table structure for table `life`
--

CREATE TABLE IF NOT EXISTS `life` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `word` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `life`
--

INSERT INTO `life` (`id`, `name`, `word`) VALUES
(1, 'private Jet', 'jet-setting'),
(2, 'artsy paintings', 'high-rolling'),
(3, 'trophy', 'avant-garde'),
(4, 'employee of the month frame photo', 'first-rate'),
(5, 'lamborghini', 'rockstar'),
(6, 'medal', 'champion'),
(7, 'artsy sculpture', 'artist'),
(8, 'nobel prize', 'genius'),
(9, 'personal assistant with coffee', 'diva'),
(10, 'private helicopter', 'hotshot'),
(11, 'expensive motorbike', 'rogue'),
(12, 'front-page', 'newspaper with user''s face on it'),
(13, 'mansion', 'big-timer'),
(14, 'stretch hummer limo', 'fat cat'),
(15, 'top hat', 'aristrocrat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `fbid` bigint(20) unsigned NOT NULL,
  `campusId` int(11) NOT NULL,
  `name` varchar(150) collate utf8_unicode_ci default NULL,
  `nric` varchar(12) collate utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) collate utf8_unicode_ci NOT NULL,
  `email` varchar(150) collate utf8_unicode_ci default NULL,
  `dateRegistered` datetime default NULL,
  PRIMARY KEY  (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fbid`, `campusId`, `name`, `nric`, `mobile`, `email`, `dateRegistered`) VALUES
(552072128, 3, 'alfred tan', '820101105797', '0122130903', 'alfredtph@gmail.com', '2012-02-29 16:37:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_campus_course`
--
CREATE TABLE IF NOT EXISTS `view_campus_course` (
`campusId` int(11)
,`campusName` varchar(150)
,`courseId` int(11)
,`courseName` varchar(150)
);
-- --------------------------------------------------------

--
-- Table structure for table `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) collate utf8_unicode_ci NOT NULL,
  `expire` int(11) default NULL,
  `data` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('0qonj3p5sk6fo4e3s00hmb1h30', 1330506102, 'time|i:1330504662;fb_211113102317615_code|s:195:"AQB7xUWUf7k-aspwbhekJAp0C-aIPSjXEpBr6x0D5h_kelr6yypwvAWVK6-ZfeaGRYx7wR_otOpVt6LTvBAxmcy5KMTnqe3Cc2wI8kOGgM6WszLxwMLq4JaR5kMDOJGhjVeC5tNSFf2L5RTot0dNZyBLPUo4fHxExCrMCdKeMatjaffAHNMmDaZDyWp_PbnRCaE";fb_211113102317615_access_token|s:110:"AAADAAZAl4mC8BAILqishQtD3zN050bCNALPdly9SMVy7dPZCypixZA9nMsxsWMK0eA2np15llbj2Gss9b6UFRSpcp3Tp4ceAo67QR71TgZDZD";fb_211113102317615_user_id|s:9:"552072128";'),
('ajtcne9f288akmm6pmuloosmc4', 1330503481, 'time|i:1330501268;gii__returnUrl|s:4:"/gii";gii__id|s:5:"yiier";gii__name|s:5:"yiier";gii__states|a:0:{}'),
('ddg2nnkhra0d5u827bjs2ge0o1', 1330249903, 'gii__returnUrl|s:15:"/inti/gii/model";gii__id|s:5:"yiier";gii__name|s:5:"yiier";gii__states|a:0:{}'),
('p75ss8rlp20ol9d2knl1ldf031', 1330248521, 'gii__returnUrl|s:15:"/inti/gii/model";'),
('u11jlo9mhpvpiogdrcgsaa3gs4', 1330236902, ''),
('ubhhaollqm3qcfe5o1o733sld3', 1330502711, 'time|i:1330501268;gii__returnUrl|s:4:"/gii";');

-- --------------------------------------------------------

--
-- Structure for view `view_campus_course`
--
DROP TABLE IF EXISTS `view_campus_course`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_campus_course` AS select `c`.`id` AS `campusId`,`c`.`name` AS `campusName`,`s`.`id` AS `courseId`,`s`.`name` AS `courseName` from (`course` `s` left join (`campus_course` `cc` left join `campus` `c` on((`c`.`id` = `cc`.`campusId`))) on((`s`.`id` = `cc`.`courseId`))) order by `c`.`id`,`s`.`id` limit 0,30;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
