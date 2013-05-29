-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 02:49 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rebus`
--

-- --------------------------------------------------------

--
-- Table structure for table `rebus`
--

CREATE TABLE IF NOT EXISTS `rebus` (
  `rebus_id` int(11) NOT NULL AUTO_INCREMENT,
  `sentence` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rebus_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_found` tinyint(1) NOT NULL DEFAULT '0',
  `author` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  PRIMARY KEY (`rebus_id`),
  KEY `author` (`author`,`receiver`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rebus`
--

INSERT INTO `rebus` (`rebus_id`, `sentence`, `rebus_date`, `is_found`, `author`, `receiver`) VALUES
(2, '', '2013-05-15 16:28:29', 0, 14, 12),
(3, '', '2013-05-22 14:47:53', 0, 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_last_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_passwd` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_name`, `user_last_name`, `user_status`, `user_passwd`) VALUES
(2, 'benoit@marc-anthony.fr', 'Marc-Anthony', 'BENOIT', 1, 'c187cd867a3ed87333f24f7d3514438e'),
(10, 'user_0@gmail.com', 'name_0', 'Last_name_0', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(11, 'user_1@gmail.com', 'name_1', 'Last_name_1', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(12, 'user_2@gmail.com', 'name_2', 'Last_name_2', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(13, 'user_3@gmail.com', 'name_3', 'Last_name_3', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(14, 'user_4@gmail.com', 'name_4', 'Last_name_4', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(15, 'user_5@gmail.com', 'name_5', 'Last_name_5', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(16, 'user_6@gmail.com', 'name_6', 'Last_name_6', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(17, 'user_7@gmail.com', 'name_7', 'Last_name_7', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(18, 'user_8@gmail.com', 'name_8', 'Last_name_8', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(19, 'user_9@gmail.com', 'name_9', 'Last_name_9', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(20, 'user_10@gmail.com', 'name_10', 'Last_name_10', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(21, 'user_11@gmail.com', 'name_11', 'Last_name_11', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(22, 'user_12@gmail.com', 'name_12', 'Last_name_12', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(23, 'user_13@gmail.com', 'name_13', 'Last_name_13', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(24, 'user_14@gmail.com', 'name_14', 'Last_name_14', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(25, 'user_15@gmail.com', 'name_15', 'Last_name_15', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(26, 'user_16@gmail.com', 'name_16', 'Last_name_16', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(27, 'user_17@gmail.com', 'name_17', 'Last_name_17', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(28, 'user_18@gmail.com', 'name_18', 'Last_name_18', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(29, 'user_19@gmail.com', 'name_19', 'Last_name_19', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(30, 'user_20@gmail.com', 'name_20', 'Last_name_20', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(31, 'user_21@gmail.com', 'name_21', 'Last_name_21', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(32, 'user_22@gmail.com', 'name_22', 'Last_name_22', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(33, 'user_23@gmail.com', 'name_23', 'Last_name_23', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(34, 'user_24@gmail.com', 'name_24', 'Last_name_24', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(35, 'user_25@gmail.com', 'name_25', 'Last_name_25', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(36, 'user_26@gmail.com', 'name_26', 'Last_name_26', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(37, 'user_27@gmail.com', 'name_27', 'Last_name_27', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(38, 'user_28@gmail.com', 'name_28', 'Last_name_28', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(39, 'user_29@gmail.com', 'name_29', 'Last_name_29', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(40, 'user_30@gmail.com', 'name_30', 'Last_name_30', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(41, 'user_31@gmail.com', 'name_31', 'Last_name_31', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(42, 'user_32@gmail.com', 'name_32', 'Last_name_32', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(43, 'user_33@gmail.com', 'name_33', 'Last_name_33', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(44, 'user_34@gmail.com', 'name_34', 'Last_name_34', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(45, 'user_35@gmail.com', 'name_35', 'Last_name_35', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(46, 'user_36@gmail.com', 'name_36', 'Last_name_36', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(47, 'user_37@gmail.com', 'name_37', 'Last_name_37', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(48, 'user_38@gmail.com', 'name_38', 'Last_name_38', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(49, 'user_39@gmail.com', 'name_39', 'Last_name_39', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(50, 'user_40@gmail.com', 'name_40', 'Last_name_40', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(51, 'user_41@gmail.com', 'name_41', 'Last_name_41', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(52, 'user_42@gmail.com', 'name_42', 'Last_name_42', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(53, 'user_43@gmail.com', 'name_43', 'Last_name_43', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(54, 'user_44@gmail.com', 'name_44', 'Last_name_44', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(55, 'user_45@gmail.com', 'name_45', 'Last_name_45', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(56, 'user_46@gmail.com', 'name_46', 'Last_name_46', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(57, 'user_47@gmail.com', 'name_47', 'Last_name_47', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(58, 'user_48@gmail.com', 'name_48', 'Last_name_48', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(59, 'user_49@gmail.com', 'name_49', 'Last_name_49', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8'),
(60, 'test@test.com', 'prénom', 'nom', 1, '334c4a4c42fdb79d7ebc3e73b517e6f8');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_user`
--

CREATE TABLE IF NOT EXISTS `user_to_user` (
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `user_id_1_2` (`user_id_1`,`user_id_2`),
  KEY `user_id_2` (`user_id_2`),
  KEY `user_id_1` (`user_id_1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_to_user`
--

INSERT INTO `user_to_user` (`user_id_1`, `user_id_2`, `status`) VALUES
(2, 10, 1),
(2, 11, 1),
(2, 14, 1),
(2, 22, 0),
(2, 24, 1),
(2, 37, 0),
(17, 2, 1),
(60, 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `view_author_to_rebus`
--
-- in use(#1356 - View 'rebus.view_author_to_rebus' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)
-- Error reading data: (#1356 - View 'rebus.view_author_to_rebus' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Table structure for table `view_receiver_to_rebus`
--
-- in use(#1356 - View 'rebus.view_receiver_to_rebus' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)
-- Error reading data: (#1356 - View 'rebus.view_receiver_to_rebus' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_to_user`
--
CREATE TABLE IF NOT EXISTS `view_user_to_user` (
`friend_id` int(11)
,`user_id` int(11)
,`user_mail` varchar(50)
,`user_name` varchar(20)
,`user_last_name` varchar(20)
,`user_status` int(11)
,`user_passwd` varchar(40)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_waiting_invit`
--
CREATE TABLE IF NOT EXISTS `view_waiting_invit` (
`user_id` int(11)
,`sender_id` int(11)
,`user_name` varchar(20)
,`user_last_name` varchar(20)
);
-- --------------------------------------------------------

--
-- Structure for view `view_user_to_user`
--
DROP TABLE IF EXISTS `view_user_to_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_to_user` AS select `u`.`user_id` AS `friend_id`,`v`.`user_id` AS `user_id`,`v`.`user_mail` AS `user_mail`,`v`.`user_name` AS `user_name`,`v`.`user_last_name` AS `user_last_name`,`v`.`user_status` AS `user_status`,`v`.`user_passwd` AS `user_passwd` from ((`user_to_user` `l` left join `user` `u` on((`l`.`user_id_1` = `u`.`user_id`))) left join `user` `v` on((`l`.`user_id_2` = `v`.`user_id`))) where (`l`.`status` = 1) union select `u`.`user_id` AS `friend_id`,`v`.`user_id` AS `user_id`,`v`.`user_mail` AS `user_mail`,`v`.`user_name` AS `user_name`,`v`.`user_last_name` AS `user_last_name`,`v`.`user_status` AS `user_status`,`v`.`user_passwd` AS `user_passwd` from ((`user_to_user` `l` left join `user` `u` on((`l`.`user_id_2` = `u`.`user_id`))) left join `user` `v` on((`l`.`user_id_1` = `v`.`user_id`))) where (`l`.`status` = 1);

-- --------------------------------------------------------

--
-- Structure for view `view_waiting_invit`
--
DROP TABLE IF EXISTS `view_waiting_invit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_waiting_invit` AS select `user_to_user`.`user_id_2` AS `user_id`,`u`.`user_id` AS `sender_id`,`u`.`user_name` AS `user_name`,`u`.`user_last_name` AS `user_last_name` from (`user_to_user` left join `user` `u` on((`u`.`user_id` = `user_to_user`.`user_id_1`))) where (`user_to_user`.`status` = 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rebus`
--
ALTER TABLE `rebus`
  ADD CONSTRAINT `rebus_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rebus_ibfk_3` FOREIGN KEY (`receiver`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_to_user`
--
ALTER TABLE `user_to_user`
  ADD CONSTRAINT `user_to_user_ibfk_1` FOREIGN KEY (`user_id_1`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_to_user_ibfk_2` FOREIGN KEY (`user_id_2`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
