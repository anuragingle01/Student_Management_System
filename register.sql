-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:28 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`, `gender`, `address`, `phone`) VALUES
(1, 'R.V', 'Sharma', 'rss@gmail.com', 'Male', 'At Akola, Maharashtra', '8888888888'),
(2, 'Anurag', 'Ingle', 'anurag0003@gmail.com', 'Male', 'pune, Maharashtra ', '7020650282'),
(3, 'SS', 'Verma', 'ssverma@gmail.com', 'female', 'At Pune Maharashtra', '5858585888'),
(4, 'ABC', 'AB', 'abc@gmail.com', 'male', 'At Mumbai, Maharashtra', '4738383822'),
(5, 'XYZ', 'zz', 'zz@gmail.com', 'female', 'At Akola, Maharashtra', '8888888888'),
(6, 'EFG', 'kk', 'kk@gmail.com', 'male', 'At Shegaon, Maharashtra', '7777777777');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `profile_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `phone`, `profile_image`) VALUES
(1, 'Jorge', 'Durgan', 'Male', 'jorge.durgan@gmail.com', 'pass1234', 'At Pune Mh', '444575755', 0x75706c6f6164732f62383033626666336634623934333035333033313936346661636130633736302e706e67),
(2, 'Frank', 'Conn', 'Male', 'frank.conn@gmail.com', 'Pass1234', 'At Pune, Maharashtra', '1414582882', 0x75706c6f6164732f35363134633233356433383731396131303566653937656434303932373433342e6a706567),
(3, 'Garry', 'Carter', 'Female', 'garry.carter@gmail.com', 'pass1234', 'akola maharashtra', '7845126398', 0x75706c6f6164732f64323835366332626534313739386565316564333165633038373539306437362e6a7067),
(4, 'Evert', 'Bednar', 'Male', 'evert.bednar@gmail.com', 'pass1234', 'At Ahmednagar', '7878787878', 0x75706c6f6164732f37626261363666376437396435396431306631316631626433376636366337382e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
