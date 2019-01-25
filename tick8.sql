-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2019 at 01:48 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tick8`
--

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `day_date` date NOT NULL,
  `d_of_w` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day_date`, `d_of_w`) VALUES
('251b81cf-972d-4d21-aa62-1c5f5aa08285', '2019-01-25', '4');

-- --------------------------------------------------------

--
-- Table structure for table `day_word`
--

CREATE TABLE IF NOT EXISTS `day_word` (
  `day_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `word_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`day_id`,`word_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`name`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('word_per_day', '30');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE IF NOT EXISTS `words` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `date_entered` datetime NOT NULL,
  `words` text COLLATE utf8_unicode_ci NOT NULL,
  `synonym` text COLLATE utf8_unicode_ci NOT NULL,
  `trans` text COLLATE utf8_unicode_ci,
  `repeated` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `date_entered`, `words`, `synonym`, `trans`, `repeated`) VALUES
('90aacf29-f8dd-4a84-a4d1-8bc241924bfb', '2019-01-25 12:04:13', 'hire', 'rent', 'noun : اجاره\r\nverb : اجاره کردن', 0),
('c4cf0c14-6187-472d-bf06-5387b4d35d30', '2019-01-25 12:14:45', 'skid', 'slide, typically sideways or obliquely, on slippery ground or as a result of stopping or turning too quickly', 'verb : لغزیدن\r\n', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
