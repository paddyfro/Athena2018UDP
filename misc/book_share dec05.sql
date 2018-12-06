-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2018 at 03:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` tinyint(1) NOT NULL DEFAULT '2',
  `age` int(11) NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `profile_image`, `name`, `address`, `email_address`, `phone_number`, `password`, `account_type`, `age`, `location_id`) VALUES
(6, 'Cormac12', 'profile4.jpg', 'Cormac Levins', 'Louth', 'cormac@dkit.ie', '323223', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 21, 10),
(7, 'Patrick89', 'profile5.jpg', 'Patrick Mcdonnell', 'Louth', 'paddy@gmail.com', '28374', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 24, 20),
(8, 'donal.m', 'profile1.png', 'Donal McNally', 'Monaghan', 'donal@live.ie', '65656565', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 27, 23),
(9, 'Jeffery12', 'profile2.jpg', 'Jeff Buckingham', 'Dublin', 'jeff@dkit.ie', '2576222', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 18, 12),
(10, 'jon1223', 'profile3.jpg', 'John Jones', 'Louth', 'john@gmail.com', '09283049', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 19, 2),
(18, 'neir', 'neir.jpg', 'nNeir Automata', 'Armagh', 'neir@email.com', '123', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 123, 2),
(19, 'BruceyBoi', 'bruce.jpg', 'Bruce Campbell', 'Louth', 'tester@email.com', '04293', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 29, 20),
(20, 'fagser', '01.jpg', 'Stephen Fagan', 'Armagh', 'fagser@hotmail.com', '0871234568', '$2y$10$9Qh4oK40AFKL8cTNhnXm6.xgUXgctL7JC9ekdtEBvyJJ6BzHL.rRC', 2, 30, 2),
(21, 'mickeyB', '456456464654.jpg', 'Michael Burns', 'dublin', 'mickb@gmail.com', '0125478965', '$2y$10$tM/.9IIjwroO7lzU5fV0q.4heK1MRHxd0.8khWGQpQcfQAHRoEs66', 2, 30, 10),
(22, 'emmsway', 's-l300.jpg', 'Emma Loughran', 'armagh', 'emma@dkit.ie', '0033254178', '$2y$10$k1/CtrR4o6kfCGkCjdlYSuj/Yxj3.E0h3HBPU5s4ihZrqGYQzopXC', 2, 20, 2),
(23, 'bonjo', '78a4ea646e9e566a62121acba8aebe82.jpg', 'Brendan McLaughlin', 'Monaghan', 'bonjo@dkit.ie', '0429358741', '$2y$10$amcEQwEOCJR77JwoNCctw.n4ilKaMkQSr.RfNoa44XMWdUT2wyGdW', 2, 18, 23);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `author` varchar(150) NOT NULL,
  `commission` double(3,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `image`, `description`, `ISBN`, `author`, `commission`, `category_id`) VALUES
(1, 'Universal Design: Creating Inclusive Environments', 'upd.jpg', 'Great for Endas UDP class, fully epalains a lot of the topics he goes over\r\n', '9780470399132', 'Edward Steinfeld, Jordana Maisel', NULL, 3),
(2, 'Professional C++, 4th Edition', 'c++.jpg', 'Great for pointers and inheritance. Has some fantastic examples of operator overloading\r\n', '9781119421221', 'Marc Gregoire', NULL, 3),
(3, 'Engineering: An Illustrated History from Ancient Craft to Modern Technology (100 Ponderables)', 'engineering.jpg', 'Pretty good schematics and timeline of engineering principles\r\n', '0985323094', 'Tom Jackson ', NULL, 4),
(4, 'Fundamental Accounting Principles', 'accountingPrinciples.jpg', 'what everyone should read in first year to hit the ground running with the course. Worked examples too', '9780077862275', 'Kevin Shaw', NULL, 1),
(5, 'College physics', 'physics.jpg', 'worked examples of everything you will need. was a life save coming up the exam and report time', '9781938168000', 'Paul Peter Urone', NULL, 8),
(6, 'Music: An Appreciation, Brief Edition', 'musicBook.jpg', 'Good introduction to the m music course explains the topics in better detail ', '9781259870545', ' Roger Kamien', NULL, 6),
(7, 'Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine', 'heartDisease.jpg', 'have a heart, need to know about it? this is the book for you', ' 9780323463423', 'Douglas P. Zipes MD', NULL, 7),
(10, 'Software Testing', 'sfTest.jpg', 'goes into a good amount fo detail on unit testing and general principles you should follow', '978111866288', 'Ali Mili', NULL, 3),
(11, 'PHP 5 for dummies', 'php5dummies.jpg', 'fantastic for select and inersts and good worked examples of all queries you will need', '9780764541667', 'Janet Valade', NULL, 3),
(12, 'head first java', 'head first java.jpg', 'great and a lifesave, has areally god examples on everything, topics well laid out', '0596009208', 'o\'reilly', NULL, 3),
(15, 'Gold medal physics', '51No9U2NTVL._SX331_BO1,204,203,200_.jpg', 'great book as a primer for the sports sceince year 2 course', '0801893224', 'John Eric Goff', NULL, 9),
(16, 'Heart of Hospitality', '41xc115YzQL._SX331_BO1,204,203,200_.jpg', 'The best book for cultivating your customer service skills. invaluable to me as i went through college', '1590793781', 'Miach Solomon', NULL, 5),
(17, 'Business Adventures', '51ZXbgG0YJL._SX326_BO1,204,203,200_.jpg', 'A great wee read form loads of personal and hilariously insightful tales that will clue you into the big spenders mindset', '1497644895', 'John Brooks', NULL, 2),
(18, 'A brief history of time', 'histTime.jpg', 'It is certinaly not brief but a fantastic read. helped oput with some fundamental issues i was having.', '9780553109535', 'Stephen Hawking', NULL, 8),
(19, 'C++ for dummies', 'c++_.jpg', 'great wee read for those just gettin started with the language, lines out the main features quite well', '0470317264', 'Stephen R. Davis', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `account_id` int(10) NOT NULL,
  `overdue_fees` double(3,2) DEFAULT NULL,
  `overdue_days` int(3) DEFAULT NULL,
  `start_date` date NOT NULL,
  `rent_period` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `uploaded_book_id` int(11) NOT NULL,
  `returned` tinyint(1) DEFAULT NULL,
  `borrowed_book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`account_id`, `overdue_fees`, `overdue_days`, `start_date`, `rent_period`, `due_date`, `uploaded_book_id`, `returned`, `borrowed_book_id`) VALUES
(6, NULL, NULL, '2018-10-26', NULL, '2018-10-19', 1, 1, 1),
(9, NULL, NULL, '2018-10-26', 3, '2018-10-29', 2, 1, 2),
(7, NULL, NULL, '2018-10-26', NULL, '2018-11-24', 5, 0, 3),
(7, NULL, NULL, '2018-11-16', NULL, '2018-12-27', 3, 0, 4),
(10, NULL, NULL, '2018-12-05', NULL, NULL, 3, 1, 5),
(6, 0.00, 0, '2018-11-15', 5, '2018-11-20', 5, 1, 6),
(9, 0.00, 0, '2018-11-20', 15, '0000-00-00', 3, 1, 7),
(19, 0.00, 0, '2018-11-20', 3, '2018-11-23', 1, 1, 8),
(19, 0.00, 0, '2018-11-20', 3, '2018-11-23', 6, 1, 9),
(19, 0.00, 0, '2018-11-20', 1, '2018-11-21', 11, 1, 10),
(19, 0.00, 0, '2018-11-20', 1, '2018-11-21', 11, 1, 11),
(19, 0.00, 0, '2018-11-20', 2, '2018-11-22', 9, 1, 12),
(19, 0.00, 0, '2018-11-20', 0, '2018-11-20', 4, 1, 13),
(19, 0.00, 0, '2018-11-20', 2, '2018-11-22', 5, 1, 14),
(9, 0.00, 0, '2018-11-21', 3, '2018-11-24', 9, 1, 16),
(19, 0.00, 0, '2018-11-22', 3, '2018-11-25', 2, 1, 17),
(19, 0.00, 0, '2018-11-22', 3, '2018-11-25', 13, 1, 18),
(19, 0.00, 0, '2018-11-22', 2, '2018-11-24', 5, 1, 19),
(19, 0.00, 0, '2018-11-22', 2, '2018-11-24', 2, 1, 20),
(10, 0.00, 0, '2018-11-22', 1, '2018-11-23', 13, 1, 21),
(22, 0.00, 0, '2018-11-23', 1, '2018-11-24', 23, 1, 23),
(9, 0.00, 0, '2018-11-23', 2, '2018-11-25', 24, 1, 24),
(9, 0.00, 0, '2018-11-23', 2, '2018-11-25', 24, 1, 25),
(23, 0.00, 0, '2018-11-23', 3, '2018-11-26', 11, 1, 26),
(23, 0.00, 0, '2018-11-23', 1, '2018-11-24', 11, 1, 27),
(6, 0.00, 0, '2018-11-27', 5, '2018-12-02', 2, 0, 28),
(21, 0.00, 0, '2018-11-28', 1, '2018-11-29', 1, 1, 29),
(19, 0.00, 0, '2018-11-28', 2, '2018-11-30', 26, 1, 30),
(19, 0.00, 0, '2018-11-28', 1, '2018-11-29', 1, 0, 31),
(9, 0.00, 0, '2018-11-28', 1, '2018-11-29', 14, 1, 32),
(19, 0.00, 0, '2018-12-03', 1, '2018-12-04', 26, 0, 33),
(0, 0.00, 0, '2018-12-04', 1, '2018-12-05', 11, 0, 34),
(0, 0.00, 0, '2018-12-04', 1, '2018-12-05', 21, 0, 35),
(9, 0.00, 0, '2018-12-04', 1, '2018-12-05', 3, 1, 36),
(0, 0.00, 0, '2018-12-04', 1, '2018-12-05', 5, 0, 37),
(9, 0.00, 0, '2018-12-04', 2, '2018-12-06', 9, 1, 38),
(9, 0.00, 0, '2018-12-04', 2, '2018-12-06', 9, 0, 39),
(9, 0.00, 0, '2018-12-04', 1, '2018-12-05', 23, 0, 40);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Accounting'),
(2, 'Business'),
(3, 'Computing'),
(4, 'Engineering'),
(5, 'Hospitality'),
(6, 'Music'),
(7, 'Nursing'),
(8, 'Science'),
(9, 'Sports Science');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `county` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `county`) VALUES
(1, 'Antrim'),
(2, 'Armagh'),
(3, 'Carlow'),
(4, 'Cavan'),
(5, 'Clare'),
(6, 'Cork'),
(7, 'Derry'),
(8, 'Donegal'),
(9, 'Down'),
(10, 'Dublin'),
(11, 'Fermanagh'),
(12, 'Galway'),
(13, 'Kerry'),
(14, 'Kildare'),
(15, 'Kilkenny'),
(16, 'Laois'),
(17, 'Leitrim'),
(18, 'Limerick'),
(19, 'Longford'),
(20, 'Louth'),
(21, 'Mayo'),
(22, 'Meath'),
(23, 'Monaghan'),
(24, 'Offaly'),
(25, 'Roscommon'),
(26, 'sligo'),
(27, 'tipperary'),
(28, 'tyrone'),
(29, 'waterford'),
(30, 'westmeath'),
(31, 'wexford'),
(32, 'Wiklow');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `notification` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `account_id`, `notification`, `created_on`) VALUES
(114, 9, 'College physics, is due to be returned tomorrow.', '2018-11-21 10:00:14'),
(115, 9, 'College physics,your book is over due, please return to the owner asap.', '2018-11-21 10:00:14'),
(116, 9, 'Universal Design: Creating Inclusive Environments,your book is over due, please return to the owner asap.', '2018-11-21 10:00:14'),
(117, 9, 'Engineering: An Illustrated History from Ancient Craft to Modern Technology (100 Ponderables), is due to be returned tomorrow.', '2018-11-21 10:00:14'),
(118, 9, 'you have borrowed College physics, get in contact with Donal McNally on 65656565. The book will be due back on 2018-11-22', '2018-11-21 10:00:42'),
(119, 8, 'Buckingham, has borrowed College physics, they will be in contact with you shortly', '2018-11-21 10:00:42'),
(122, 9, 'you have borrowed College physics, get in contact with Cormac Levins on 323223. The book will be due back on 2018-11-22', '2018-11-21 10:04:00'),
(124, 6, 'Buckingham, has borrowed College physics, they will be in contact with you shortly', '2018-11-21 10:04:00'),
(130, 9, 'Please get in contact with Emma Loughran on 0033254178  to organise the colection of the book', '2018-11-23 17:12:32'),
(131, 22, 'Your book, A brief history of time has been borrowed by , you will be contacted shortly to arrange collection', '2018-11-23 17:12:32'),
(133, 22, 'Your book, A brief history of time has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-11-23 17:13:20'),
(134, 23, 'Please get in contact with Bruce Campbell on 04293  to organise the colection of the bookhead first java', '2018-11-23 18:10:55'),
(135, 19, 'Your book, head first java, has been borrowed by bonjo, you will be contacted shortly to arrange collection', '2018-11-23 18:10:55'),
(138, 6, 'Please get in contact with Donal McNally on 65656565  to organise the colection of the bookProfessional C++, 4th Edition', '2018-11-27 09:32:25'),
(139, 8, 'Your book, Professional C++, 4th Edition, has been borrowed by Cormac12, you will be contacted shortly to arrange collection', '2018-11-27 09:32:25'),
(141, 9, 'Your book, Professional C++, 4th Edition, has been borrowed by mickeyB, you will be contacted shortly to arrange collection', '2018-11-27 09:36:45'),
(142, 9, 'Please get in contact with nNeir Automata on 123  to organise the colection of the bookBusiness Adventures', '2018-11-27 09:43:33'),
(143, 18, 'Your book, Business Adventures, has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-11-27 09:43:33'),
(146, 7, 'Fundamental Accounting Principles, is over due, please return to the owner asap.', '2018-11-27 09:46:44'),
(147, 9, 'Music: An Appreciation, Brief Edition, is over due, please return to the owner asap.', '2018-11-27 09:46:44'),
(148, 9, 'Business Adventures, is due to be returned tomorrow.', '2018-11-27 09:46:44'),
(149, 23, 'head first java, is over due, please return to the owner asap.', '2018-11-27 09:46:44'),
(168, 21, 'Please get in contact with Jeff Buckingham on 2576222  to organise the colection of the bookProfessional C++, 4th Edition', '2018-11-28 13:03:33'),
(172, 21, 'Professional C++, 4th Edition, is due to be returned tomorrow.', '2018-11-28 13:03:50'),
(173, 19, 'Please get in contact with Cormac Levins on 323223  to organise the colection of the bookC++ for dummies', '2018-11-28 19:28:44'),
(174, 6, 'Your book, C++ for dummies, has been borrowed by BruceyBoi, you will be contacted shortly to arrange collection', '2018-11-28 19:28:44'),
(178, 19, 'Please get in contact with Jeff Buckingham on 2576222  to organise the colection of the bookProfessional C++, 4th Edition', '2018-11-28 19:30:27'),
(179, 9, 'Your book, Professional C++, 4th Edition, has been borrowed by BruceyBoi, you will be contacted shortly to arrange collection', '2018-11-28 19:30:27'),
(180, 9, 'Please get in contact with John Jones on 09283049  to organise the colection of the bookBraunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine', '2018-11-28 19:35:30'),
(181, 10, 'Your book, Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine, has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-11-28 19:35:30'),
(183, 9, 'Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine, is due to be returned tomorrow.', '2018-11-28 19:37:08'),
(184, 19, 'Professional C++, 4th Edition, is due to be returned tomorrow.', '2018-11-28 19:37:08'),
(185, 6, 'Professional C++, 4th Edition, is over due, please return to the owner asap.', '2018-12-03 15:05:44'),
(187, 9, 'Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine, is over due, please return to the owner asap.', '2018-12-03 15:05:44'),
(188, 19, 'Professional C++, 4th Edition, is over due, please return to the owner asap.', '2018-12-03 15:05:44'),
(201, 19, 'C++ for dummies, is due to be returned tomorrow.', '2018-12-03 15:07:42'),
(204, 9, 'Please get in contact with Cormac Levins on 323223  to organise the colection of the bookMusic: An Appreciation, Brief Edition', '2018-12-04 12:09:07'),
(205, 6, 'Your book, Music: An Appreciation, Brief Edition, has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-12-04 12:09:07'),
(206, 8, 'Please get in contact with Donal McNally on 65656565  to organise the colection of the bookFundamental Accounting Principles', '2018-12-04 12:22:54'),
(207, 8, 'Your book, Fundamental Accounting Principles, has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-12-04 12:22:54'),
(211, 9, 'Music: An Appreciation, Brief Edition, is due to be returned tomorrow.', '2018-12-04 12:28:57'),
(213, 19, 'C++ for dummies, is over due, please return to the owner asap.', '2018-12-04 12:28:57'),
(214, 9, 'Please get in contact with Bruce Campbell on 04293  to organise the colection of the bookSoftware Testing', '2018-12-04 12:29:33'),
(215, 19, 'Your book, Software Testing, has been borrowed by Jeffery12, you will be contacted shortly to arrange collection', '2018-12-04 12:29:33'),
(216, 9, 'Your request for  Music: An Appreciation, Brief Edition has been sent, please await confirmation.', '2018-12-05 12:46:56'),
(217, 6, 'Your book, Music: An Appreciation, Brief Edition, has been requested by Jeffery12, please review details in your profile -> pending requests', '2018-12-05 12:46:56'),
(218, 9, 'Your request for  PHP 5 for dummies has been sent, please await confirmation.', '2018-12-05 14:26:23'),
(219, 19, 'Your book, PHP 5 for dummies, has been requested by Jeffery12, please review details in your profile -> pending requests', '2018-12-05 14:26:23'),
(223, 9, 'Software Testing, is due to be returned tomorrow.', '2018-12-05 14:26:45'),
(224, 9, 'Business Adventures, is over due, please return to the owner asap.', '2018-12-05 14:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `uploaded_book_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  `accept` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `uploaded_book_id`, `days`, `borrower_id`, `lender_id`, `accept`) VALUES
(1, 24, 1, 19, 22, 2),
(2, 3, 1, 9, 6, 2),
(3, 10, 3, 9, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `rating`, `account_id`) VALUES
(1, 4, 10),
(2, 4, 9),
(5, 2, 8),
(6, 3, 9),
(8, 3, 9),
(9, 3, 9),
(10, 3, 9),
(11, 2, 9),
(12, 2, 8),
(15, 3, 6),
(16, 3, 7),
(17, 3, 18),
(18, 3, 19),
(19, 3, 18),
(20, 3, 19),
(21, 3, 20),
(22, 3, 21),
(23, 3, 22),
(24, 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_books`
--

CREATE TABLE `uploaded_books` (
  `uploaded_book_id` int(11) NOT NULL,
  `account_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `price` double(3,2) DEFAULT NULL,
  `loan_period_available` int(10) DEFAULT NULL,
  `available` tinyint(1) NOT NULL,
  `location_id` int(11) NOT NULL,
  `book_condition` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_books`
--

INSERT INTO `uploaded_books` (`uploaded_book_id`, `account_id`, `book_id`, `price`, `loan_period_available`, `available`, `location_id`, `book_condition`) VALUES
(1, 9, 2, NULL, NULL, 0, 8, 'Excellent'),
(2, 8, 2, NULL, NULL, 0, 16, 'Poor'),
(3, 6, 6, NULL, NULL, 1, 17, 'great'),
(4, 7, 6, NULL, NULL, 0, 18, 'very good'),
(5, 8, 4, NULL, NULL, 0, 10, 'great'),
(6, 6, 3, NULL, NULL, 0, 17, 'Excellent'),
(9, 19, 10, NULL, NULL, 0, 20, 'Good'),
(10, 19, 11, NULL, NULL, 1, 20, 'Good'),
(11, 19, 12, NULL, NULL, 0, 20, 'Good'),
(12, 6, 2, NULL, NULL, 0, 10, 'Good'),
(14, 10, 7, NULL, NULL, 1, 20, 'Great'),
(16, 10, 12, NULL, NULL, 0, 2, 'New'),
(19, 7, 15, NULL, NULL, 1, 3, 'Good'),
(21, 6, 3, NULL, NULL, 0, 10, 'Great'),
(22, 6, 16, NULL, NULL, 1, 10, 'Good'),
(23, 18, 17, NULL, NULL, 0, 2, 'Poor'),
(24, 22, 18, NULL, NULL, 1, 2, 'Good'),
(25, 18, 11, NULL, NULL, 1, 2, 'New'),
(26, 6, 19, NULL, NULL, 0, 10, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `account_id` int(10) DEFAULT NULL,
  `book_id` int(10) DEFAULT NULL,
  `notifications` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`account_id`, `book_id`, `notifications`) VALUES
(9, 4, NULL),
(9, 6, NULL),
(9, 2, NULL),
(7, 2, NULL),
(7, 6, NULL),
(7, 4, NULL),
(6, 4, NULL),
(9, 12, NULL),
(NULL, 2, NULL),
(9, 11, NULL),
(19, 2, NULL),
(18, 4, NULL),
(22, 10, NULL),
(22, 7, NULL),
(23, 16, NULL),
(21, 6, NULL),
(19, 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`borrowed_book_id`),
  ADD KEY `uploaded_book_id` (`uploaded_book_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `uploaded_book_id` (`uploaded_book_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `uploaded_books`
--
ALTER TABLE `uploaded_books`
  ADD PRIMARY KEY (`uploaded_book_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD KEY `account_id` (`account_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrowed_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `uploaded_books`
--
ALTER TABLE `uploaded_books`
  MODIFY `uploaded_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`uploaded_book_id`) REFERENCES `uploaded_books` (`uploaded_book_id`);

--
-- Constraints for table `uploaded_books`
--
ALTER TABLE `uploaded_books`
  ADD CONSTRAINT `uploaded_books_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `uploaded_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `uploaded_books_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `uploaded_books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
