-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 07:24 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_name`, `user_last_name`, `user_status`, `user_passwd`) VALUES
(63, 'pierre@martin.fr', 'Pierre', 'Martin', 1, '84675f2baf7140037b8f5afe54eef841'),
(64, 'alice@martin.fr', 'Alice', 'Martin', 1, '84675f2baf7140037b8f5afe54eef841');

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_author_to_rebus`
--
CREATE TABLE IF NOT EXISTS `view_author_to_rebus` (
`user_id` int(11)
,`rebus_id` int(11)
,`sentence` text
,`rebus_date` timestamp
,`is_found` tinyint(1)
,`author` int(11)
,`receiver` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_own_rebus`
--
CREATE TABLE IF NOT EXISTS `view_own_rebus` (
`user_id` int(11)
,`rebus_id` int(11)
,`sentence` text
,`rebus_date` timestamp
,`is_found` tinyint(1)
,`author` int(11)
,`receiver` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_receiver_to_rebus`
--
CREATE TABLE IF NOT EXISTS `view_receiver_to_rebus` (
`user_id` int(11)
,`rebus_id` int(11)
,`sentence` text
,`rebus_date` timestamp
,`is_found` tinyint(1)
,`author` int(11)
,`receiver` int(11)
);
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
-- Structure for view `view_author_to_rebus`
--
DROP TABLE IF EXISTS `view_author_to_rebus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_author_to_rebus` AS select `user`.`user_id` AS `user_id`,`rebus_id` AS `rebus_id`,`sentence` AS `sentence`,`rebus_date` AS `rebus_date`,`is_found` AS `is_found`,`author` AS `author`,`receiver` AS `receiver` from (`rebus` left join `user` on((`user`.`user_id` = `author`)));

-- --------------------------------------------------------

--
-- Structure for view `view_own_rebus`
--
DROP TABLE IF EXISTS `view_own_rebus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_own_rebus` AS select `user`.`user_id` AS `user_id`,`rebus_id` AS `rebus_id`,`sentence` AS `sentence`,`rebus_date` AS `rebus_date`,`is_found` AS `is_found`,`author` AS `author`,`receiver` AS `receiver` from (`rebus` left join `user` on((`user`.`user_id` = `receiver`))) where ((`receiver` = `author`) and (`is_found` = 0));

-- --------------------------------------------------------

--
-- Structure for view `view_receiver_to_rebus`
--
DROP TABLE IF EXISTS `view_receiver_to_rebus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_receiver_to_rebus` AS select `user`.`user_id` AS `user_id`,`rebus_id` AS `rebus_id`,`sentence` AS `sentence`,`rebus_date` AS `rebus_date`,`is_found` AS `is_found`,`author` AS `author`,`receiver` AS `receiver` from (`rebus` left join `user` on((`user`.`user_id` = `receiver`)));

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
