-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 07:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 123);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_idb` int(11) NOT NULL,
  `service_idb` int(11) NOT NULL,
  `company_idb` int(11) NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  `booking_date` date DEFAULT NULL,
  `p_location` varchar(400) NOT NULL,
  `map_location` varchar(1000) NOT NULL,
  `current_location` varchar(1000) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_idb`, `service_idb`, `company_idb`, `booking_status`, `booking_date`, `p_location`, `map_location`, `current_location`, `payment_status`) VALUES
(1, 1, 1, 1, 'cancelled', '2022-08-08', 'jyothi, near mangalore', 'Mangalore', '', 'pending'),
(2, 1, 3, 1, 'reached', '2022-08-08', 'swarna Arcade, Hampanakatte', 'Mangalore, Karnataka, India, 574233', 'mubai', 'paid'),
(3, 1, 6, 3, 'reached', '2022-08-08', 'near mackmall, kankanady', 'Mangalore, Karnataka, India, 574233', 'pune', 'paid'),
(4, 1, 5, 2, 'reached', '2022-08-11', 'jyothi, near mangalore', 'Mangalore, Karnataka, India, 574233', 'Mumbai', 'paid'),
(6, 1, 1, 1, 'reached', '2022-08-22', 'mangalore', 'karnataka', 'kulai', 'pending'),
(7, 1, 5, 2, 'cancelled', '2022-08-23', 'Malpe', 'Mangalore', '', 'pending'),
(8, 1, 1, 1, 'reached', '2022-08-26', 'Malpe', 'karnataka', 'kulai', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `company_imagedb` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `username`, `password`, `company_name`, `phone`, `company_imagedb`, `status`, `location_id`, `email`) VALUES
(1, 'fastline', '67^&GYGYTTG', 'Fastline private limited', '9438384858', '../uploads/3.jpg', 'approved', 10, 'fastline@gmail.com'),
(2, 'cargofly', '43^&GHVF#D#', 'Cargo Fly', '8483858484', '../uploads/1.jpg', 'approved', 10, 'cargofly@gmail.com'),
(3, 'bridgestone', '#32#$DSDc', 'Bridge stone', '7848383834', '../uploads/2.jpg', 'approved', 10, 'bridgestone@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `message` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `message`, `user_id`, `company_id_f`) VALUES
(1, 'Best service provider all india home home fast service and good service', 1, 1),
(2, 'very good interaction with the company', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_imagedb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_imagedb`) VALUES
(5, 'kulai', '../uploads/udupi.jfif'),
(10, 'Mangalore', '../uploads/wideview.jpg'),
(11, 'Hasana ', '../uploads/My project (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `petowner_id` int(11) NOT NULL,
  `card_number` int(19) NOT NULL,
  `expiry` varchar(7) NOT NULL,
  `transaction_id` int(25) NOT NULL,
  `payment_method` varchar(150) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(150) NOT NULL,
  `service_imagedb` varchar(150) NOT NULL,
  `company_ids` int(11) NOT NULL,
  `service_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_imagedb`, `company_ids`, `service_price`) VALUES
(1, 'Courier Services', '../uploads/boxes.jpg', 1, 2999),
(3, 'Parcel Shipping Services', '../uploads/post-img-1.jpg', 1, 4999),
(4, 'Transporters For Bulk Goods', '../uploads/cartransport.PNG', 1, 10000),
(5, 'International package delivery', '../uploads/airo.jpg', 2, 5000),
(6, 'Ocean shipping service', '../uploads/venti-views-1cqIcrWFQBI-unsplash.jpg', 3, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_imagedb` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_name`, `phone`, `user_imagedb`, `status`, `email`) VALUES
(1, 'shreejith', '12!@ABab', 'shreejith', '9333334323', '../uploads/face8.jpg', 'pending', 'shreejith@gmail.com'),
(2, 'gaurav', 'Gg@123456', 'Gaurav', '9874563210', '../uploads/face16.jpg', 'pending', 'gadass@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
