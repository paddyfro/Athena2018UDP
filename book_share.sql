-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 01:11 AM
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
  `account_type` tinyint(1) NOT NULL DEFAULT '2',
  `age` int(11) NOT NULL,
  `location_id` int(11) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `profile_image`, `name`, `address`, `email_address`, `phone_number`, `password`, `account_type`, `age`, `location_id`) VALUES
(6, 'Cormac12', 'profile4.jpg', 'Cormac Levins', '', 'cormac@dkit.ie', '323223', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 21, 10),
(7, 'Patrick89', 'profile5.jpg', 'Patrick Mcdonnell', '', 'paddy@gmail.com', '28374', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 24, 3),
(8, 'donal.m', 'profile1.png', 'Donal McNally', '', 'donal@live.ie', '65656565', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 1, 27, 6),
(9, 'Jeffery12', 'profile2.jpg', 'Buckingham', '', 'jeff@dkit.ie', '2576222', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 18, 12),
(10, 'jon1223', 'profile3.jpg', 'John Jones', '34 dublin Road', 'john@gmail.com', '09283049', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 19, 2),
(18, 'neir', 'neir.jpg', 'neir', 'dundalk', 'neir@email.com', '123', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 123, 20),
(19, 'tester', 'bruce.jpg', 'tester', 'Dundalk', 'tester@email.com', '04293', '$2y$10$oXj0HLjNg5tlhAvGZrQj/ejMs/FlZ/11IiUtrbbPcNAaW65/EElIW', 2, 29, 20),
(20, 'fagser', '01.jpg', 'Stephen Fagan', 'armagh', 'fagser@hotmail.com', '0871234568', '$2y$10$9Qh4oK40AFKL8cTNhnXm6.xgUXgctL7JC9ekdtEBvyJJ6BzHL.rRC', 2, 30, 2);

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
(1, 'Universal Design: Creating Inclusive Environments', 'upd.jpg', 'Written by top thinkers at the Center for Inclusive Design and Environmental Access (IDeA), it demonstrates the difference between universal design and accessibility and identifies its relationship to sustainable design and active living. ', 'Design', '9780470399132', 'Edward Steinfeld, Jordana Maisel', NULL),
(2, 'Professional C++, 4th Edition', 'c++.jpg', 'Professional C++ is the advanced manual for C++ programming. Designed to help experienced developers get more out of the latest release, this book skims over the basics and dives right in to exploiting the full capabilities of C++17. ', 'Computing', '9781119421221', 'Marc Gregoire', NULL),
(3, 'Engineering: An Illustrated History from Ancient Craft to Modern Technology (100 Ponderables)', 'engineering.jpg', 'Combining engaging text with captivating images and helpful diagrams, renowned science writer Tom Jackson guides readers through the history of Engineering in the 7th installment of the groundbreaking PonderablesTM series.', 'Engineering', '0985323094', 'Tom Jackson ', NULL),
(4, 'Fundamental Accounting Principles', 'accountingPrinciples.jpg', 'Enhancements in technology have changed how we live and learn. Working with learning resources across devices, whether smartphones, tablets, or laptop computers, empowers students to drive their own learning by putting increasingly intelligent technology into their hands. Whether the goal is to become an accountant, a businessperson, or simply an informed consumer of accounting information, Fundamental Accounting Principles has helped generations of students succeed.', 'Accounts', '9780077862275', 'Kevin Shaw', NULL),
(5, 'College physics', 'physics.jpg', 'This introductory, algebra-based, two-semester college physics book is grounded with real-world examples, illustrations, and explanations to help students grasp key, fundamental physics concepts. College Physics includes learning objectives, concept questions, links to labs and simulations, and ample practice opportunities to solve traditional physics application problems. This book is available for free online by searching for OpenStax College Physics', 'Science', '9781938168000', 'Paul Peter Urone', NULL),
(6, 'Music: An Appreciation, Brief Edition', 'musicBook.jpg', 'Music: An Appreciation remains the time-tested solution for welcoming non-majors to the art of listening to great music. Now, Roger Kamien places a renewed focus on learning the elements of music, fostering each student’s unique path to listening and understanding', 'Music', '9781259870545', ' Roger Kamien', NULL),
(7, 'Braunwald\'s Heart Disease: A Textbook of Cardiovascular Medicine', 'heartDisease.jpg', 'Trusted by generations of cardiologists for the latest, most reliable guidance in the field, Braunwald’s Heart Disease, 11th Edition, remains your #1 source of information on rapidly changing clinical science, clinical and translational research, and evidence-based medicine. ', 'nursing', ' 9780323463423', 'Douglas P. Zipes MD', NULL),
(10, 'testing and the kids who love it', 'sd7rlq3xzyx11.png', 'all the testing in the world and you ahve to test on me', 'Computing', '1234567891234', 'tester mc testington', NULL),
(11, 'ZOMBIES AND HOW TO TREAT THEM', 'default_book.png', '....bbbbbbbrrrrrrraaaaaaiiiiiiiinnnnnnnnnnsssssss', 'Hospitality', '1234567891235', 'mr brains', NULL),
(12, 'head first java', 'head first java.jpg', 'Learning a complex new language is no easy task especially when it s an object-oriented computer programming language like Java. You might think the problem is your brain. It seems to have a mind of its own, a mind that doesn\'t always want to take in the dry, technical stuff you\'re forced to study. ', 'Programming', '0596009208', 'o\'reilly', NULL);

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
(10, NULL, NULL, '2018-12-05', NULL, NULL, 3, 0, 5),
(6, 0.00, 0, '2018-11-15', 5, '2018-11-20', 5, 0, 6);

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
(5, 'Computing'),
(6, 'Engineering'),
(7, 'Hospitality'),
(8, 'Music'),
(9, 'Nursing'),
(10, 'Programming'),
(11, 'Science'),
(12, 'Sports Science');

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
(3, 5, 10),
(4, 41, 10),
(5, 2, 8),
(6, 3, 9),
(7, 1, 10),
(8, 3, 9),
(9, 3, 9),
(10, 3, 9),
(11, 2, 9),
(12, 2, 8),
(13, 4, 10),
(14, 3, 10),
(15, 3, 6),
(16, 3, 7),
(17, 3, 18),
(18, 3, 19),
(19, 3, 18),
(20, 3, 19),
(21, 3, 20);

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
(1, 9, 2, NULL, NULL, 1, 8, 'Excellent'),
(2, 8, 2, NULL, NULL, 0, 16, 'Poor'),
(3, 6, 6, NULL, NULL, 1, 17, 'great'),
(4, 7, 6, NULL, NULL, 0, 18, 'very good'),
(5, 8, 4, NULL, NULL, 0, 10, 'great'),
(6, 6, 3, NULL, NULL, 1, 17, 'Excellent'),
(9, 19, 10, NULL, NULL, 1, 20, NULL),
(10, 19, 11, NULL, NULL, 1, 20, NULL),
(11, 19, 12, NULL, NULL, 1, 20, NULL);

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
(9, 12, NULL);

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
  ADD PRIMARY KEY (`book_id`);

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
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrowed_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `uploaded_books`
--
ALTER TABLE `uploaded_books`
  MODIFY `uploaded_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`uploaded_book_id`) REFERENCES `uploaded_books` (`uploaded_book_id`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);

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
