-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2025 at 01:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_data`
--

CREATE TABLE `admission_data` (
  `id` int(11) NOT NULL,
  `admission_name` varchar(255) DEFAULT NULL,
  `admission_discription` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `state_name` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admitcard_data`
--

CREATE TABLE `admitcard_data` (
  `id` int(11) NOT NULL,
  `admincard_title` varchar(50) NOT NULL,
  `admitcard_discription` text NOT NULL,
  `category` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answerkey_data`
--

CREATE TABLE `answerkey_data` (
  `id` int(11) NOT NULL,
  `answerkey_title` varchar(255) NOT NULL,
  `answerkey_discription` text NOT NULL,
  `category` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `category_name`, `created_at`) VALUES
(1, 'Admin Card', '2025-10-26 11:46:31'),
(2, 'Latest Jobs', '2025-10-26 11:47:54'),
(3, 'Result', '2025-10-26 11:48:18'),
(4, 'Answer Key', '2025-10-26 11:48:32'),
(5, 'Syllabus', '2025-10-26 11:48:41'),
(6, 'Admission', '2025-10-26 11:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `headline_data`
--

CREATE TABLE `headline_data` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `headline_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latestjob_data`
--

CREATE TABLE `latestjob_data` (
  `id` int(11) NOT NULL,
  `latestjob_title` varchar(255) NOT NULL,
  `latestjob_discription` text NOT NULL,
  `category` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `state_name` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marquee_data`
--

CREATE TABLE `marquee_data` (
  `id` int(11) NOT NULL,
  `marquee_name` varchar(255) DEFAULT NULL,
  `post_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marquee_data`
--

INSERT INTO `marquee_data` (`id`, `marquee_name`, `post_url`) VALUES
(0, 'Bihar Police SI Online Form 2025', 'www.form.com'),
(0, 'NTA USC Online Form 2025', 'www.form.com'),
(0, 'BLW Apprentices Online Form 2025', 'www.form.com'),
(0, 'AU CRET Online Form 2025', 'www.form.com'),
(0, 'JSSC Supervisor Lady Form 2025', 'www.form.com'),
(0, 'UPPSC RO ARO Online Form 2023', 'www.form.com');

-- --------------------------------------------------------

--
-- Table structure for table `newupdate_data`
--

CREATE TABLE `newupdate_data` (
  `id` int(11) NOT NULL,
  `newupdate_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_data`
--

CREATE TABLE `result_data` (
  `id` int(11) NOT NULL,
  `result_title` varchar(255) DEFAULT NULL,
  `result_discription` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_data`
--

CREATE TABLE `scholarship_data` (
  `id` int(11) NOT NULL,
  `scholarship_title` varchar(255) NOT NULL,
  `scholarship_discription` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_name`
--

CREATE TABLE `state_name` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state_related_blog`
--

CREATE TABLE `state_related_blog` (
  `id` int(11) NOT NULL,
  `state_title` varchar(255) DEFAULT NULL,
  `state_discription` text DEFAULT NULL,
  `state_name` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_data`
--

CREATE TABLE `syllabus_data` (
  `id` int(11) NOT NULL,
  `syllabus_title` varchar(255) DEFAULT NULL,
  `syllabus_discription` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upcomingjob_data`
--

CREATE TABLE `upcomingjob_data` (
  `id` int(11) NOT NULL,
  `upcoming_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerkey_data`
--
ALTER TABLE `answerkey_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latestjob_data`
--
ALTER TABLE `latestjob_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
