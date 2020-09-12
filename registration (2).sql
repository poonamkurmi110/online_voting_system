-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2020 at 09:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `desc` varchar(2000) NOT NULL,
  `no_of_votes` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `logo`, `desc`, `no_of_votes`) VALUES
(1, 'BJP\r\n', 'bjp-party.png', '(Bhartiya Janata Party)', 10),
(2, 'INC', 'inc-party.png', '(Indian National Congress)', 6),
(3, 'AAP', 'aap-party.png', '(Aam Aadmi Party)', 1),
(4, 'NOTA', 'nota2.jpg', '(None of the Above)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voters_registration`
--

CREATE TABLE `voters_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `dob` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'voters'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters_registration`
--

INSERT INTO `voters_registration` (`id`, `name`, `contact_no`, `email_id`, `city`, `state`, `gender`, `status`, `dob`, `username`, `password`, `role`) VALUES
(8, 'Poonam kurmi', '8959043556', 'poonamkurmi110@gmail.com', 'sagar', 'Madhya Pradesh', 'Female', 1, '2020-09-11', 'poonamkurmi903', '1234', 'voters');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters_registration`
--
ALTER TABLE `voters_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `voters_registration`
--
ALTER TABLE `voters_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
