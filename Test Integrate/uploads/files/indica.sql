-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 02:42 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indica`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `ach_id` int(4) NOT NULL AUTO_INCREMENT,
  `target_id` int(4) NOT NULL,
  `version` int(4) NOT NULL,
  `achieve` varchar(300) NOT NULL,
  PRIMARY KEY (`ach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `actionplan`
--

CREATE TABLE IF NOT EXISTS `actionplan` (
  `actionplan_id` int(4) NOT NULL AUTO_INCREMENT,
  `strategy_id` int(4) NOT NULL,
  `actionplan_desc` varchar(300) NOT NULL,
  PRIMARY KEY (`actionplan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `actionplan`
--

INSERT INTO `actionplan` (`actionplan_id`, `strategy_id`, `actionplan_desc`) VALUES
(1, 1, 'rindu'),
(2, 1, 'datang'),
(3, 2, 'pergi'),
(4, 3, 'abih'),
(5, 4, 'sepah'),
(6, 4, 'madu'),
(7, 5, 'dibuang');

-- --------------------------------------------------------

--
-- Table structure for table `baseline`
--

CREATE TABLE IF NOT EXISTS `baseline` (
  `base_id` int(4) NOT NULL AUTO_INCREMENT,
  `baseline1` varchar(200) NOT NULL,
  `base_year` int(5) NOT NULL,
  `kpi_id` int(4) NOT NULL,
  `baseline2` varchar(200) NOT NULL,
  PRIMARY KEY (`base_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `baseline`
--

INSERT INTO `baseline` (`base_id`, `baseline1`, `base_year`, `kpi_id`, `baseline2`) VALUES
(1, '', 0, 1, ''),
(2, '', 0, 2, ''),
(3, '', 0, 3, ''),
(4, '', 0, 4, ''),
(5, '', 0, 5, ''),
(6, '', 0, 6, ''),
(7, '', 0, 7, ''),
(8, '', 0, 1, ''),
(9, '', 0, 2, ''),
(10, '', 0, 3, ''),
(11, '', 0, 4, ''),
(12, '', 0, 5, ''),
(13, '', 0, 6, ''),
(14, '', 0, 7, ''),
(15, '', 0, 1, ''),
(16, '', 0, 2, ''),
(17, '', 0, 3, ''),
(18, '', 0, 4, ''),
(19, '', 0, 5, ''),
(20, '', 0, 6, ''),
(21, '', 0, 7, ''),
(22, '', 0, 8, ''),
(23, '', 0, 9, ''),
(24, '', 0, 10, ''),
(25, '', 0, 11, ''),
(26, '', 0, 12, ''),
(27, '', 0, 13, ''),
(28, '', 0, 14, '');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE IF NOT EXISTS `goal` (
  `goal_id` int(4) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(3) NOT NULL,
  `module_id` varchar(3) NOT NULL,
  `goal_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`goal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `session_id`, `module_id`, `goal_desc`) VALUES
(1, '', 'M01', 'hancur'),
(2, '', 'M01', 'hancurqq'),
(3, '', 'M01', 'aq');

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE IF NOT EXISTS `kpi` (
  `kpi_id` int(4) NOT NULL AUTO_INCREMENT,
  `actionplan_id` int(4) NOT NULL,
  `kpi_desc` varchar(300) NOT NULL,
  `operation_def` varchar(500) NOT NULL,
  PRIMARY KEY (`kpi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`kpi_id`, `actionplan_id`, `kpi_desc`, `operation_def`) VALUES
(1, 1, 'jaaj', 'gah'),
(2, 2, 'aa', 'ha'),
(3, 3, 'mm', 'j'),
(4, 4, 'mm', 'aa99'),
(5, 5, 'iii', 'hh'),
(6, 6, 'ooo', '55'),
(7, 7, 'uujhu', '90'),
(8, 1, 'hu', '90'),
(9, 2, 's', '90'),
(10, 3, 'e', '9'),
(11, 4, 'd', '9'),
(12, 5, 'f', '9'),
(13, 6, 'e', '8'),
(14, 7, 'd', '9');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `module_id` varchar(3) NOT NULL,
  `module_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`) VALUES
('M01', 'Academic TNC'),
('M02', 'Internalization and Branding TNC'),
('M03', 'Excellent Research TNC'),
('M04', 'Student Life TNC'),
('M05', 'Infrastructure Planning and Development TNC'),
('M06', 'Faculty Staff  Recruitment and Development'),
('M07', 'Financial Stability and Wealth Creation');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `ref_id` int(4) NOT NULL AUTO_INCREMENT,
  `kpi_id` int(4) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `data_source` varchar(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `estimated_cost` varchar(50) NOT NULL,
  `exp_fin_return` varchar(50) NOT NULL,
  PRIMARY KEY (`ref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`ref_id`, `kpi_id`, `ownership`, `data_source`, `notes`, `estimated_cost`, `exp_fin_return`) VALUES
(1, 1, 'AHHah', 'h', '', 'h', 'h'),
(2, 2, 'jj', 'hh', '', 'h', 'h'),
(3, 3, 'h', 'hhjh', '', 'jh', 'jh'),
(4, 4, 'h', 'hhj', '', 'hj', 'hh'),
(5, 5, 'hj', 'hj', '', 'hj', 'hj'),
(6, 6, 'h', 'hh', '', 'jh', 'jh'),
(7, 7, 'h', 'hj', '', 'hj', 'hjh'),
(8, 8, 'jh', 'jh', '', 'h', 'hj'),
(9, 9, 'hj', 'hj', '', 'hh', 'jh'),
(10, 10, 'jh', 'jhj', '', 'h', 'h'),
(11, 11, 'hj', 'hh', '', 'jh', 'jhj'),
(12, 12, 'h', 'jhj', '', 'hj', 'hj'),
(13, 13, 'hjh', 'jhj', '', 'hj', 'h'),
(14, 14, 'hh', 'j', '', 'hjj', 'hhj'),
(15, 1, 'AHHah', 'h', '', 'h', 'h'),
(16, 2, 'jj', 'hh', '', 'h', 'h'),
(17, 3, 'h', 'hhjh', '', 'jh', 'jh'),
(18, 4, 'h', 'hhj', '', 'hj', 'hh'),
(19, 5, 'hj', 'hj', '', 'hj', 'hj'),
(20, 6, 'h', 'hh', '', 'jh', 'jh'),
(21, 7, 'h', 'hj', '', 'hj', 'hjh'),
(22, 8, 'jh', 'jh', '', 'h', 'hj'),
(23, 9, 'hj', 'hj', '', 'hh', 'jh'),
(24, 10, 'jh', 'jhj', '', 'h', 'h'),
(25, 11, 'hj', 'hh', '', 'jh', 'jhj'),
(26, 12, 'h', 'jhj', '', 'hj', 'hj'),
(27, 13, 'hjh', 'jhj', '', 'hj', 'h'),
(28, 14, 'hh', 'j', '', 'hjj', 'hhj');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(3) NOT NULL,
  `session_year` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `strategy`
--

CREATE TABLE IF NOT EXISTS `strategy` (
  `strategy_id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(4) NOT NULL,
  `strategy_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`strategy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `strategy`
--

INSERT INTO `strategy` (`strategy_id`, `goal_id`, `strategy_desc`) VALUES
(1, 1, 'bila'),
(2, 1, 'bila saja'),
(3, 2, 'hancur'),
(4, 2, 'hancur'),
(5, 3, 'aku');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE IF NOT EXISTS `target` (
  `target_id` int(4) NOT NULL AUTO_INCREMENT,
  `kpi_id` int(4) NOT NULL,
  `target_year` int(5) NOT NULL,
  `target1` varchar(100) NOT NULL,
  `target2` varchar(100) NOT NULL,
  `target3` varchar(100) NOT NULL,
  `target4` varchar(100) NOT NULL,
  `target5` varchar(100) NOT NULL,
  PRIMARY KEY (`target_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`target_id`, `kpi_id`, `target_year`, `target1`, `target2`, `target3`, `target4`, `target5`) VALUES
(1, 1, 0, '90', '90', '90', '90', '90'),
(2, 2, 0, '78', '788', '88', '88', '8'),
(3, 3, 0, '7', '8', '9', '0', '8'),
(4, 4, 0, '7', '22', '79', '7', '9'),
(5, 5, 0, '7', '9', '33', '89', '87'),
(6, 6, 0, '33', '55', '33', '7', '5'),
(7, 7, 0, '7', '22', '5', '75', '5'),
(8, 1, 0, '190', '9209', '9208', '02890', '8209'),
(9, 2, 0, '82028', '920202', '093018', '02909', '9'),
(10, 3, 0, '90', '9', '90', '09', '90'),
(11, 4, 0, '90', '89', '8', '7', '33'),
(12, 5, 0, '8', '78', '98', '22', '78'),
(13, 6, 0, '33', '6', '7', '87', '98'),
(14, 7, 0, '89', '9', '9009', '12', '77'),
(15, 8, 0, '66', '7', '7', '87', '8'),
(16, 9, 0, '7', '878', '78', '7', '7'),
(17, 10, 0, '878', '78', '78', '78', '78'),
(18, 11, 0, '787', '8', '787', '87', '87'),
(19, 12, 0, '87', '87', '8787', '878', '78'),
(20, 13, 0, '78', '78', '7', '87', '87'),
(21, 14, 0, '87', '87', '87', '87', '8');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `act_id` int(4) NOT NULL,
  `kpid` int(4) NOT NULL AUTO_INCREMENT,
  `kpidesc` varchar(500) NOT NULL,
  `op_def` varchar(500) NOT NULL,
  `base1` varchar(100) NOT NULL,
  `base2` varchar(100) NOT NULL,
  `tgt1` varchar(100) NOT NULL,
  `tgt2` varchar(100) NOT NULL,
  `tgt3` varchar(100) NOT NULL,
  `tgt4` varchar(100) NOT NULL,
  `tgt5` varchar(100) NOT NULL,
  `own` varchar(100) NOT NULL,
  `datasource` varchar(100) NOT NULL,
  `estcost` varchar(100) NOT NULL,
  `expfinreturn` varchar(100) NOT NULL,
  PRIMARY KEY (`kpid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trail`
--

CREATE TABLE IF NOT EXISTS `trail` (
  `username` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trail`
--

INSERT INTO `trail` (`username`, `login_time`, `logout_time`) VALUES
('admin', '2017-10-07 05:09:28', '2017-10-07 05:09:43'),
('admin', '2017-09-17 04:59:06', '2017-10-07 04:52:23'),
('admin', '2017-09-17 04:59:06', '2017-10-07 04:49:50'),
('admin', '2017-09-17 04:59:06', '2017-10-07 04:45:32'),
('admin', '2017-09-17 04:59:06', '2017-10-07 04:44:10'),
('admin', '2017-09-17 04:59:06', '2017-10-05 06:22:06'),
('admin', '2017-09-17 04:59:06', '2017-10-05 06:11:56'),
('admin', '2017-09-17 04:59:06', '2017-10-05 06:11:04'),
('admin', '2017-09-17 04:59:06', '2017-10-05 05:42:31'),
('admin', '2017-09-17 04:59:06', '2017-10-04 11:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `login_time`, `logout_time`, `role`) VALUES
(1, 'admin', 'admin', '2017-10-07 06:21:48', '2017-10-07 06:22:21', 'admin'),
(2, 'usera', 'usera', '2017-10-07 14:54:41', '2017-10-07 07:36:10', 'DC academic'),
(3, 'userb', 'userb', '2017-05-22 03:50:33', '2017-05-22 03:51:53', 'userb'),
(4, 'tnc', 'tnc', '2017-07-02 04:52:50', '2017-05-21 17:37:11', 'tnc'),
(5, 'usera1', 'usera1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'useracademic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
