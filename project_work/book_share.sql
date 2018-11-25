-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 02:08 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
  `account_type` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `profile_image`, `name`, `address`, `email_address`, `phone_number`, `password`, `account_type`, `age`, `location_id`) VALUES
(6, 'Cormac12', NULL, 'Cormac Levins', '', 'cormac@dkit.ie', '323223', 'p@ssw0rd', 1, 21, 10),
(7, 'Patrick89', NULL, 'Patrick Mcdonnell', '', 'paddy123@hotmail.com', '28374', 'hello', 1, 24, 3),
(8, 'donal.m', NULL, 'Donal McNally', '', 'donal@live.ie', '65656565', 'password', 1, 27, 6),
(9, 'Jeffery12', NULL, 'Buckingham', '', 'jeff@dkit.ie', '2576222', 'jnfjsd', 2, 18, 12),
(10, 'jon1223', 'imag', 'John Jones', '34 dublin Road', 'john@gmail.com', '09283049', '123kjndf', 2, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `account_reviews`
--

CREATE TABLE `account_reviews` (
  `account_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `author` varchar(150) NOT NULL,
  `commission` double(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `image`, `description`, `category`, `ISBN`, `author`, `commission`) VALUES
(1, 'Universal Design: Creating Inclusive Environments', 'E:\\UDP\\bookShare_images\\upd.jpg', 'Written by top thinkers at the Center for Inclusive Design and Environmental Access (IDeA), it demonstrates the difference between universal design and accessibility and identifies its relationship to sustainable design and active living. ', 'Design', '978-0-470-39913-2', 'Edward Steinfeld, Jordana Maisel', NULL),
(2, 'Professional C++, 4th Edition', 'E:\\UDP\\bookShare_images\\c++', 'Professional C++ is the advanced manual for C++ programming. Designed to help experienced developers get more out of the latest release, this book skims over the basics and dives right in to exploiting the full capabilities of C++17. ', 'Computing', '978-1-119-42122-1', 'Marc Gregoire', NULL),
(3, 'Engineering: An Illustrated History from Ancient Craft to Modern Technology (100 Ponderables)', 'E:\\UDP\\bookShare_images\\enginerring', 'Combining engaging text with captivating images and helpful diagrams, renowned science writer Tom Jackson guides readers through the history of Engineering in the 7th installment of the groundbreaking PonderablesTM series.', 'Engineering', '0985323094', 'Tom Jackson ', NULL),
(4, 'Fundamental Accounting Principles', 'E:\\UDP\\bookShare_images\\accountingPrinciples', 'Enhancements in technology have changed how we live and learn. Working with learning resources across devices, whether smartphones, tablets, or laptop computers, empowers students to drive their own learning by putting increasingly intelligent technology into their hands. Whether the goal is to become an accountant, a businessperson, or simply an informed consumer of accounting information, Fundamental Accounting Principles has helped generations of students succeed.', 'Accounts', '978-0077862275', 'Kevin Shaw', NULL),
(5, 'College physics', 'E:\\UDP\\bookShare_images\\accountingPrinciples\\physics.jpg', 'This introductory, algebra-based, two-semester college physics book is grounded with real-world examples, illustrations, and explanations to help students grasp key, fundamental physics concepts. College Physics includes learning objectives, concept questions, links to labs and simulations, and ample practice opportunities to solve traditional physics application problems. This book is available for free online by searching for OpenStax College Physics', 'Science', '978-1938168000', 'Paul Peter Urone', NULL),
(6, 'Music: An Appreciation, Brief Edition', 'E:\\UDP\\bookShare_images\\musicBook.jpg', 'Music: An Appreciation remains the time-tested solution for welcoming non-majors to the art of listening to great music. Now, Roger Kamien places a renewed focus on learning the elements of music, fostering each student’s unique path to listening and understanding', 'Music', '978-1259870545', ' Roger Kamien', NULL),
(7, 'Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine', 'E:\\UDP\\bookShare_images\\musicBook.jpg\\heartDisease.jpg', 'Trusted by generations of cardiologists for the latest, most reliable guidance in the field, Braunwald’s Heart Disease, 11th Edition, remains your #1 source of information on rapidly changing clinical science, clinical and translational research, and evidence-based medicine. ', 'nursing', ' 978-0323463423', 'Douglas P. Zipes MD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `account_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `overdue_fees` double(3,2) DEFAULT NULL,
  `overdue_days` int(3) DEFAULT NULL,
  `start_date` date NOT NULL,
  `rent_period` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`account_id`, `book_id`, `overdue_fees`, `overdue_days`, `start_date`, `rent_period`, `due_date`) VALUES
(6, 3, NULL, NULL, '2018-10-26', NULL, NULL),
(9, 4, NULL, NULL, '2018-10-19', NULL, NULL);

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
(1, 'antrim'),
(2, 'armagh'),
(3, 'carlow'),
(4, 'cavan'),
(5, 'clare'),
(6, 'cork'),
(7, 'derry'),
(8, 'donegal'),
(9, 'down'),
(10, 'dublin'),
(11, 'fermanagh'),
(12, 'galway'),
(13, 'kerry'),
(14, 'kildare'),
(15, 'kilkenny'),
(16, 'laois'),
(17, 'leitrim'),
(18, 'limerick'),
(19, 'longford'),
(20, 'louth'),
(21, 'mayo'),
(22, 'meath'),
(23, 'monaghan'),
(24, 'offaly'),
(25, 'roscommon'),
(26, 'sligo'),
(27, 'tipperary'),
(28, 'tyrone'),
(29, 'waterford'),
(30, 'westmeath'),
(31, 'wexford'),
(32, 'Wiklow');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `account_id` int(10) NOT NULL,
  `content` varchar(150) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `account_id`, `content`, `rating`) VALUES
(0, 8, 'great lender', 5),
(1, 8, 'great lender', 5),
(3, 8, 'bad', 2),
(4, 15, 'bad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_books`
--

CREATE TABLE `uploaded_books` (
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

INSERT INTO `uploaded_books` (`account_id`, `book_id`, `price`, `loan_period_available`, `available`, `location_id`, `book_condition`) VALUES
(9, 2, NULL, NULL, 1, 8, 'Excellent'),
(8, 2, NULL, NULL, 0, 16, 'Poor');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `account_reviews`
--
ALTER TABLE `account_reviews`
  ADD KEY `account_id` (`account_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD KEY `account_id` (`account_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `uploaded_books`
--
ALTER TABLE `uploaded_books`
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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `account_reviews`
--
ALTER TABLE `account_reviews`
  ADD CONSTRAINT `account_reviews_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `account_reviews_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`);

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

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
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
