-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 06:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `book_name` varchar(70) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publication_name` varchar(50) NOT NULL,
  `book_price` varchar(10) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `available_qty` int(5) NOT NULL,
  `librarian_email` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_price`, `book_qty`, `available_qty`, `librarian_email`, `datetime`) VALUES
(16, 'ভাল্লাগেনা', '20201031083022.jpg', 'আয়মান সাদিক', 'দ্ধিমিক প্রকাশনী', '180', 80, 77, 'm@gmail.com', '2020-11-01 01:30:22'),
(17, 'Bangla Kobita diary', '20201101080253.jpg', 'Mahbub Hasan ', 'Jhonkar', '950', 50, 50, '', '2020-11-01 13:02:53'),
(20, 'রুপসী বাংলা', '20201102063350.jpg', 'জীবনানন্দ দাস', 'বাংলা পাবলিকেশন', '270', 40, 39, '', '2020-11-02 23:33:50'),
(21, 'বৃষ্টির সাথে দেখা', '20201104083002.jpg', 'তামিম', 'বাংলা প্রকাশনী', '270', 15, 14, 'm@gmail.com', '2020-11-05 01:30:02'),
(22, 'কবিতার মিথ ', '20201104083156.jpg', 'মোস্তফা কামাল', 'পুথিঘর', '375', 25, 25, 'm@gmail.com', '2020-11-05 01:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(8, 2, 16, '02-11-2020', '04-11-20', '2020-11-02 17:01:42'),
(9, 2, 16, '02-11-2020', '04-11-20', '2020-11-02 17:07:25'),
(10, 2, 17, '02-11-2020', '04-11-20', '2020-11-02 17:07:59'),
(13, 1, 18, '04-11-2020', '04-11-20', '2020-11-04 06:05:19'),
(14, 1, 20, '04-11-2020', '04-11-20', '2020-11-04 06:05:42'),
(15, 1, 17, '04-11-2020', '04-11-20', '2020-11-04 06:20:18'),
(16, 2, 20, '04-11-2020', '04-11-20', '2020-11-04 17:35:58'),
(17, 2, 20, '04-11-2020', '04-11-20', '2020-11-04 17:36:35'),
(18, 1, 18, '04-11-2020', '04-11-20', '2020-11-04 17:37:13'),
(19, 1, 17, '04-11-2020', '04-11-20', '2020-11-04 17:40:18'),
(20, 2, 16, '04-11-2020', '04-11-20', '2020-11-04 17:40:35'),
(21, 2, 20, '04-11-2020', '04-11-20', '2020-11-04 17:41:05'),
(22, 1, 17, '04-11-2020', '04-11-20', '2020-11-04 18:01:51'),
(23, 2, 20, '04-11-2020', '04-11-20', '2020-11-04 18:02:01'),
(24, 1, 18, '04-11-2020', '04-11-20', '2020-11-04 18:02:08'),
(25, 1, 18, '04-11-2020', '04-11-20', '2020-11-04 18:02:38'),
(26, 2, 16, '04-11-2020', '04-11-20', '2020-11-04 18:02:57'),
(27, 2, 18, '04-11-2020', '04-11-20', '2020-11-04 18:17:25'),
(28, 2, 16, '04-11-2020', '', '2020-11-04 18:17:39'),
(29, 2, 22, '04-11-2020', '06-11-20', '2020-11-04 19:33:34'),
(30, 2, 21, '06-11-2020', '', '2020-11-06 05:56:33'),
(31, 3, 20, '06-11-2020', '', '2020-11-06 06:02:50'),
(32, 3, 16, '06-11-2020', '', '2020-11-06 06:24:06'),
(33, 3, 16, '06-11-2020', '', '2020-11-06 06:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(3) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `fname`, `lname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'motaleb', 'hossain', 'm@gmail.com', 'm406', '123456', '2020-10-29 16:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `image`, `status`, `datetime`) VALUES
(1, 'Murad', 'Hossain', 12, 12365, 'murad@gmail.com', 'dsadf', '$2y$10$tsT/tUVyTv5/wGGD3/RZaeLm1uTwFiY4B.LRQBbbgwOgVGfyAVPCS', 1245, NULL, 1, '2020-10-01 17:48:47'),
(2, 'shah ', 'Jalal', 13, 5456456, 'jalal@gmail.com', 'jalal406', '$2y$10$4ZlOW7JWJLGvPGSl5c0OpeQqMQNbVylZybEHdAK.qIqyCIJxFRsLu', 16587, NULL, 1, '2020-10-27 05:58:52'),
(3, 'Zawad ', 'Zawad ', 12, 21365, 'zamil@gmail.com', 'zamil123', '$2y$10$m/GgcnxS0HbL4maV6bc3eeQNUWTXob.HqgGX1G8XAKsD4tnkzZsDi', 1657846987, NULL, 1, '2020-11-06 05:58:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
