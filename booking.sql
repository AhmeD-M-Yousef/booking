-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 07:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `A_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `gender`, `pos_id`, `phone`, `A_date`) VALUES
(1, 'kareem', 'kareem@gmai.com', '202cb962ac59075b964b07152d234b70', 0, 1, 25422132, '2019-08-28 17:39:28'),
(5, 'nabeel1', 'nabeel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 2, 124836745, '2019-08-29 06:08:38'),
(13, 'elking', 'nabeel@gmail.com', '1cc39ffd758234422e1f75beadfc5fb2', 0, 3, 2147483647, '2019-08-26 00:08:00'),
(15, 'kareem3', 'nabeel@gmail.com', '62eee6a173e10f3b826a30bb8051516f', 0, 2, 2147483647, '2019-08-26 06:08:09'),
(18, 'ahmed3333', 'yaseen@gmail.com', '4297f44b13955235245b2497399d7a93', 0, 1, 2147483647, '2019-08-25 08:08:37'),
(20, 'asd', 'yaseen@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 2, 132313123, '2019-08-25 08:08:55'),
(22, 'ahmed', '33@ma.com', '289dff07669d7a23de0ef88d2f7129e7', 1, 3, 2147483647, '2019-08-25 08:08:11'),
(24, 'nabeel11', 'nabeel@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 2147483647, '2019-08-25 08:08:22'),
(25, 'nabeel', '33@ma.com', '202cb962ac59075b964b07152d234b70', 1, 2, 2147483647, '2019-08-25 08:08:03'),
(26, 'kareem34', 'nabeel@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', 0, 1, 2147483647, '2019-08-25 08:08:04'),
(29, 'nabeel', 'yaseen@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 2, 0, '2019-08-26 00:08:53'),
(31, 'menna', 'meena@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, 252233656, '2019-08-28 04:08:26'),
(32, 'nagy', 'nagy@g.com', '202cb962ac59075b964b07152d234b70', 0, 3, 2147483647, '2019-08-28 04:08:58'),
(34, 'amira', 'amira@amira.com', '202cb962ac59075b964b07152d234b70', 1, 3, 123123213, '2019-08-28 04:08:16'),
(35, 'sama222222222', 'sama@li.com', '149815eb972b3c370dee3b89d645ae14', 1, 1, 23123213, '2019-09-04 02:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `C_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `location`, `email`, `phone`, `type_id`, `approve`, `C_date`) VALUES
(1, 'HIGH real estate', 'egypt- Maadi', 'info@high.com', 25422132, 1, 1, '2019-09-03 01:12:48'),
(2, 'Dubai real estate', 'Dubai - khalifa bld.', 'info@dubai.com', 32659854, 3, 1, '2019-09-14 15:03:14'),
(3, 'TM real estate', 'egypt- Madinati', 'info@TM.com', 45689789, 2, 0, '2019-09-08 17:34:55'),
(18, 'sama', '12312', 'sama@li.com', 2147483647, 2, 1, '2019-09-01 02:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `com_type`
--

CREATE TABLE `com_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_type`
--

INSERT INTO `com_type` (`id`, `name`) VALUES
(1, 'Owner'),
(2, 'broker'),
(3, 'Investor');

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`id`, `name`) VALUES
(1, 'Cairo'),
(2, 'Giza'),
(3, 'Dakhlya'),
(4, 'Gharbia'),
(5, 'Alexandria'),
(6, 'Damietta'),
(7, 'Ismailia');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `M_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `M_date`) VALUES
(1, 'sadd', 'asdasd@k.com', 'sadsda', 'dsdsadsa', '2019-09-06 02:09:38'),
(2, 'kareem', 'kareem@m.com', 'about any thing', 'about any thing about any thing about any thing', '2019-09-06 02:09:16'),
(3, 'kareem22', 'ka@k.com', 'about any thing22', 'about any thing about any thing about any thing22', '2019-09-06 02:09:38'),
(4, 'sdsad', 'asdas@ss.com', 'dasd', 'sadsadas', '2019-09-06 16:09:42'),
(5, 'dsad', 'sdasdasd@cc.com', '11', 'sadsadsad', '2019-09-06 16:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `N_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `N_date`) VALUES
(1, 'k@k.com', '2019-09-05 00:09:54'),
(2, 'dd@dd.con2', '2019-09-06 03:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `level`) VALUES
(1, 'owner', 100),
(2, 'admin', 90),
(3, 'moderator', 80);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `prop_type` tinyint(4) NOT NULL,
  `price` float NOT NULL,
  `room_number` int(11) NOT NULL,
  `gov_id` tinyint(4) NOT NULL,
  `com_id` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `P_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `prop_type`, `price`, `room_number`, `gov_id`, `com_id`, `description`, `img`, `P_date`) VALUES
(1, 'Orchard House', 1, 50200, 4, 2, 1, 'nile view with 6 rooms and 52000 monthly', '7.jpg,8.jpg', '2019-09-07 23:53:24'),
(2, 'Meadow View', 2, 51000, 3, 3, 2, 'flat 6th floorflat 6th floorflat 6th floor', '4.jpg,5.jpg', '2019-09-08 16:48:26'),
(4, 'Country Style House with beautiful garden and terrace', 1, 52000, 4, 1, 2, 'facebook facebook facebook facebook facebook facebook facebook facebook facebook', '3.jpg,4.jpg,5.jpg', '2019-09-08 16:48:49'),
(7, 'beautiful garden and terrace', 1, 54000, 5, 7, 3, 'nile view with 6 rooms and 52000 monthly  nile view with 6 rooms and 52000 monthly   nile view with 6 rooms and 52000 monthly  nile view with 6 rooms and 52000 monthly  nile view with 6 rooms and 52000 monthly', '1.jpg,2.jpg', '2019-09-08 16:48:41'),
(10, 'Rose Cottage', 3, 71000, 6, 1, 2, 'facebook facebook facebook facebook facebook facebook facebook facebook facebook', '9.jpg,10.jpg,11.jpg,12.jpg', '2019-09-08 16:48:06'),
(12, 'Oak Barn', 1, 81000, 2, 2, 2, '2qsdsdsa', '2.jpg,4.jpg,10.jpg', '2019-09-08 16:47:57'),
(13, 'Corner House', 3, 91000, 1, 1, 1, '213sdasda', '7.jpg,13.jpg,15.jpg', '2019-09-08 16:48:18'),
(14, 'Oak Barn 2', 1, 52000, 2, 2, 2, '2qsdsdsa', '2.jpg,4.jpg,10.jpg', '2019-09-08 16:49:03'),
(15, 'Birchwood House', 1, 60000, 3, 1, 1, 'Birchwood House , Birchwood House , Birchwood House, Birchwood House, Birchwood House, Birchwood House', '11.jpg,12.jpg', '2019-09-08 00:09:16'),
(16, 'Wheelwright Cottage', 1, 60000, 2, 1, 1, 'Wheelwright Cottage, Wheelwright Cottage ,Wheelwright Cottage, Wheelwright Cottage, Wheelwright Cottage, Wheelwright Cottage, Wheelwright Cottage', '8.jpg,9.jpg,15.jpg', '2019-09-08 01:09:11'),
(17, 'The Old Rectory', 2, 120000, 3, 1, 2, 'The Old Rectory, The Old Rectory, The Old Rectory, The Old Rectory, The Old Rectory, The Old Rectory, ', '3.jpg,4.jpg,5.jpg', '2019-09-08 01:09:47'),
(18, 'Walnut Tree Farm', 2, 55000, 5, 1, 1, 'Walnut Tree Farm, Walnut Tree Farm ,Walnut Tree Farm ,Walnut Tree Farm ,Walnut Tree Farm ,Walnut Tree Farm, Walnut Tree Farm, Walnut Tree Farm', '7.jpg,14.jpg', '2019-09-08 01:09:49'),
(19, 'Beech Tree Cottage', 1, 64000, 5, 3, 3, 'Beech Tree Cottage, Beech Tree Cottage, Beech Tree Cottage, Beech Tree Cottage, Beech Tree Cottage, Beech Tree Cottage', '3.jpg,10.jpg,15.jpg', '2019-09-08 01:09:11'),
(20, 'Fairlawn', 1, 120000, 5, 7, 3, 'Fairlawn , Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn, Fairlawn', '1.jpg,2.jpg,9.jpg', '2019-09-08 01:09:09'),
(21, ' Meadow View', 1, 130000, 5, 4, 1, ' Meadow View	, Meadow View	  Meadow View	, Meadow View	  Meadow View	, Meadow View	  Meadow View	, Meadow View	  Meadow View	, Meadow View	  Meadow View	', '10.jpg,11.jpg,12.jpg', '2019-09-08 01:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `prop_type`
--

CREATE TABLE `prop_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prop_type`
--

INSERT INTO `prop_type` (`id`, `name`) VALUES
(1, 'Villa'),
(2, 'Flat'),
(3, 'Commercial\r\n'),
(4, 'Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `service_price` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `service_price`, `description`) VALUES
(1, 'Pool', 500, 'swimming pool with boiler'),
(2, 'Bar', 600, 'Bar with a lot of drink types'),
(3, '2 Beds', 500, 'Room With 2 beds'),
(4, '3 Beds', 1000, 'Room With 3 beds'),
(11, 'sama', 22, 'sama3333'),
(14, 'sama22', 33333300, 'king');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `U_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `gender`, `U_date`) VALUES
(1, 'mohamed khalifa1', 'mohamed 1', 'khalifa1', '30cd2f99101cdd52cc5fda1e996ee137', 'k11@k.com', 1, '2019-08-29 06:08:19'),
(2, 'kareem mohamed ', 'kareem ', 'mohamed ', '123', 'k@k.com', 0, '2019-08-29 19:05:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `com_type`
--
ALTER TABLE `com_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prop_type`
--
ALTER TABLE `prop_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `com_type`
--
ALTER TABLE `com_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `governorate`
--
ALTER TABLE `governorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prop_type`
--
ALTER TABLE `prop_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
