-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2014 at 02:01 AM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `gcm_regid` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `carname` varchar(30) NOT NULL,
  `carno` varchar(30) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `encrypted_password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `idle` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `gcm_regid`, `firstname`, `phone`, `carname`, `carno`, `unique_id`, `email`, `encrypted_password`, `salt`, `created_at`, `lat`, `lng`, `idle`) VALUES
(1, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Raj', '', 'Mercedes Benz', 'TN 15 AB 9580', '', '', '', '', '', '13.101009', '80.193026', 0),
(2, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Anna Durai', '', 'Lamborghini Aventador', 'TN 15 AB 9580', '', '', '', '', '', '13.084958', '80.193026', 0),
(3, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Sam', '', 'Mercedes Benz', 'TN 15 AB 9582', '', '', '', '', '', '13.0878', '80.212982', 0),
(4, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Somasundaram', '', 'Lamborghini Aventador', 'TN 15 AB 9185', '', '', '', '', '', '13.079942', '80.233152', 0),
(5, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Thomas', '', 'Audi R8', 'TN 15 AB 9587', '', '', '', '', '', '1', '2', 0),
(6, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Kumar', '', 'Lamborghini Aventador', 'TN 15 AB 9582', '', '', '', '', '', '13.072961', '80.208776', 0),
(7, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Vinoth', '', 'Audi R8', 'TN 15 AB 9585', '', '', '', '', '', '13.0727155', '80.223324', 0),
(8, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Zakir', '', 'Mercedes Benz', 'TN 15 AB 9123', '', '', '', '', '', '13.05858', '80.239074', 0),
(10, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Praveen', '', 'Lamborghini Aventador', 'TN 15 AB 1585', '', '', '', '', '', '13.018391', '80.242411', 0),
(11, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Siva', '', 'Lamborghini Aventador', 'TN 15 AB 9585', '', '', '', '', '', '13.077925', '80.24211', 0),
(12, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Shaktivel', '', 'Audi R8', 'TN 15 AB 1515', '', '', '', '', '', '13.100706', '80.251337', 0),
(13, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Ragavendran', '', 'Porsche 911', 'TN 15 AB 1085', '', '', '', '', '', '13.099076', '80.23666', 0),
(14, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Prashanth', '', 'Audi R8', 'TN 15 AB 6580', '', '', '', '', '', '13.088166', '80.253826', 0),
(15, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Rangaraj', '', 'Audi R8', 'TN 15 AB 2585', '', '', '', '', '', '13.107738', '80.204956', 0),
(16, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Dinakaran', '', 'Mercedes Benz', 'TN 15 AB 2525', '', '', '', '', '', '13.002345', '80.251992', 0),
(17, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Jannekar', '', 'Porsche 911', 'TN 15 AB 2123', '', '', '', '', '', '12.999', '80.268729', 0),
(18, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Sekharan', '', 'Audi R8', 'TN 15 AB 2585', '', '', '', '', '', '12.966758', '80.259674', 0),
(19, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Manoj', '', 'Mercedes Benz', 'TN 15 AB 2785', '', '', '', '', '', '12.964625', '80.213711', 0),
(20, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Janardhanan', '', 'Porsche 911', 'TN 15 AB 9570', '', '', '', '', '', '12.958937', '80.19985', 0),
(21, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Rahul', '', 'Rolls Royce Ghost', 'TN 15 AB 2590', '', '', '', '', '', '12.957348', '80.181353', 0),
(22, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Edwin', '', 'Audi R8', 'TN 15 AB 1585', '', '', '', '', '', '12.980433\r\n', '80.260188', 0),
(23, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Tamilselvan', '', 'Ambassador', 'TN 15 AB 1280', '', '', '', '', '', '12.926732', '80.231049\r\n', 0),
(24, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Aamir', '', 'Mercedes Benz', 'TN 15 AB 1585', '', '', '', '', '', '12.899668', '80.228689', 0),
(25, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Udhay', '', 'Porsche 911', 'TN 15 AB 6150', '', '', '', '', '', '12.849715', '80.226285', 0),
(26, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Zaitoon', '', 'Porsche 911', 'TN 15 AB 2685', '', '', '', '', '', '13.050386', '80.095479', 0),
(27, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Saravana', '', 'Porsche 911', 'TN 15 AB 2785', '', '', '', '', '', '13.119776', '80.126035', 0),
(28, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Arun', '', 'Audi R8', 'TN 15 AB 2135', '', '', '', '', '', '12.895987', '80.064924', 0),
(29, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Ganesh', '', 'Mercedes Benz', 'TN 15 AB 3585', '', '', '', '', '', '12.890297', '80.142171', 0),
(30, 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', 'Vikram', '', 'Audi R8', 'TN 15 AB 7855', '', '', '', '', '', '12.833732', '80.207059', 0),
(47, 'hello', 'kevin', '7708504415', 'lambo', '5285', '547dba272bf876.44100991', 'kevin@getbrix.in', 'aGJAWnHkoRGDPg+/zCsJ2UbzR4szMzc3MDE0ZGRm', '3377014ddf', '2014-12-02 08:09:59', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(255) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(200) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `encrypted_password` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `gcm_regid` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `unique_id`, `firstname`, `lastname`, `email`, `phone`, `encrypted_password`, `salt`, `created_at`, `gcm_regid`, `lat`, `lng`) VALUES
(44, '54775a70a0d324.36305062', 'nishanth', 'kl', 'nishanthkl@getbrix.in', '9840674734', 'ZlKFY3Uet2Ky+i4CZP8uRVVQ9ihmNGQ4ZDE3YTcz', 'f4d8d17a73', '2014-11-27 12:08:00', 'APA91bHSJWJf2Mw_7J1fTnlz6g7_PPxmUUIZUNpfpo3eq7j4_5FJySNuV2jaY-BOJB7DA1N0rANWbAPCWLCJZSj2d40d280pEkX2AvtgXG4ilLu9GwCujnIbwbnX3DgTtju9dEF1kccqVS1I6smESkeureEN2Lihew', '13.056995290945402', '80.24535935372114'),
(45, '547787dd874aa0.85158668', 'kevin', 'john', 'kevin@getbrix.in', '7708504415', 'juZUezO1KZ7GrkoKTmPMRQoWbMdmYjE4Y2U0MDc2', 'fb18ce4076', '2014-11-27 15:21:49', 'APA91bHsnLilTcfbd2DPCt2SjkrDGxBlksMdpGGri3Cs7to9alu_lGX9ioyL19L2srPUNelzkDnvT9e1Gu4jToAc2YY83DPSDNoWG81waTAb3RYV6i_KjLwljBLk7Zywm_9Vu3SGebbtyYDRlOY4HvC6Zd43hNoXmA', '13.0878', '80.212982'),
(47, '54784cb4ce3090.62932985', 'Kevin', 'John', 'kvyn.14@gmail.com', '9847646464', 'uuwisuBYFbdCtxFpr9e9LsxTfNAzOTdiMjg2ODgx', '397b286881', '2014-11-28 05:21:40', '', '13.0556848', '80.2445903'),
(48, '547d8d955bd8d9.29843081', 'Shriji', 'Ke', 'shriji@getbrix.in', '9841417790', 'pgffZ2HU9wtaSXbqmJkokUqFZVVlZWIzNzdiYjU5', 'eeb377bb59', '2014-12-02 04:59:49', 'APA91bHvKu7amcCRjARxdWNsICzrBk7eoWc26GTQr1cF_cOzV220VkHVoXtutBxz0Bs2ojYm9fSa7o1giKzyXYwlT5bhiTXDdzTWzNZvDFxKwDmYSG5AdZG9Y8I3o3Tv1yhL7y9B4f_MvHoNbz8JyIACWF1COW6r-g', '13.055583', '80.2439743');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
