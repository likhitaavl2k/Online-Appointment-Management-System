-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 11:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Src` ()  NO SQL
SELECT *FROM patient$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `username` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `CID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `DOV` date NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`username`, `Fname`, `gender`, `CID`, `DID`, `DOV`, `Timestamp`, `Status`) VALUES
('likhita_avl', 'Likhita', 'female', 5, 101, '2020-12-18', '2020-12-17 10:02:48', 'Booking Registered.Wait for the update');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `CID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `town` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`CID`, `name`, `address`, `town`, `city`, `contact`) VALUES
(1, 'Care Multi Speciality Clinic', ' 8-3-1101/1, Plot No 105 A,Bes', 'Sri Nagar Colony', 'Hyderabad', '8971754321'),
(5, 'MEDEXPRESS Clinic & Diagnostic', '83/A, Main Road, Vengal Rao Na', 'Vengal Rao Nagar', 'hyderabad', '1234567890'),
(10, 'Dr Agarwals Eye Hospital', 'Mumtaz Complex, Junction, Reth', ' Mehdipatnam', 'Hyderabad', '8899776655'),
(11, 'sample1', 'sample1', 'sample1', 'sample city 1', '123'),
(12, 'sample 2', 'sample 2 ', 'sample 2', 'sample city 2', '456');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_doctors`
--

CREATE TABLE `deleted_doctors` (
  `DID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `experience` varchar(30) NOT NULL COMMENT '(years)',
  `specialisation` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_doctors`
--

INSERT INTO `deleted_doctors` (`DID`, `name`, `gender`, `dob`, `experience`, `specialisation`, `contact`, `address`, `username`, `password`, `region`) VALUES
(0, 'likhita', 'female', '2020-09-16', 'sdas', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc'),
(1, 'Karthik', 'male', '2020-12-11', 'abc', 'abc', '8897976476', 'frrfs', 'as', 'ksdhusidsn', 'hyderabad'),
(2, 'dsd', 'female', '2020-12-10', 'abc', 'abc', '1', 'HNo:50/A, Flat No:G-2, MIGH, Vengalarao ', 'sa', 'abcdefghij', 'abc'),
(4, 'abc', 'f', '2020-12-09', 'abc', 'abc', '8897976476', 'frrfs', 'sa', 'likhitaavl', 'rer'),
(5, 'abc', 'female', '2000-03-10', 'abc', 'abc', '8897976476', 'abc', 'xyz', '1234567890', 'abc'),
(6, 'dsd', 'female', '2000-03-10', 'xyz', 'xyz', '8897976476', 'xyz', 'xyz', 'abcdefghij', 'xyz'),
(50, 'doctor1', 'male', '2020-12-11', 'abc', 'abc', '8897976476', 'abc', 'doctor1', '1234567890', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `experience` varchar(30) NOT NULL COMMENT '(years)',
  `specialisation` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `name`, `gender`, `dob`, `experience`, `specialisation`, `contact`, `address`, `username`, `password`, `region`) VALUES
(8, 'Maan Singh', 'male', '1990-11-03', '4', 'Physician', '8897976476', 'first floor, above united bank of india,', 'maan_singh', 'mannsingh', 'Hyderabad'),
(101, 'B Bhuvaneswara Raju', 'male', '1975-04-04', '20', 'Neurosurgeon', '9876543210', '83/A, Main Road, Vengal Rao Nagar, Venga', 'raju_1234', '1234567890', 'Hyderabad'),
(102, 'Radhika Reddy', 'female', '1987-12-11', '7', 'General Dentistry', '8897976476', 'CARE Hospitals Outpatient Centre, Road N', 'radhika_reddy', 'radhikareddy', 'Bangalore');

--
-- Triggers `doctor`
--
DELIMITER $$
CREATE TRIGGER `deletedDoc` AFTER DELETE ON `doctor` FOR EACH ROW INSERT INTO deleted_doctors(DID,name,gender,dob,experience,specialisation,contact	,address,username,password,region) VALUES (old.DID,old.name,old.gender,old.dob,old.experience,old.specialisation,	old.contact,old.address,old.username,old.password,old.region)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_available`
--

CREATE TABLE `doctor_available` (
  `CID` int(11) NOT NULL,
  `DID` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_available`
--

INSERT INTO `doctor_available` (`CID`, `DID`, `day`, `starttime`, `endtime`) VALUES
(5, 101, 'Wednesday', '08:00:00', '20:00:00'),
(5, 101, 'Friday', '08:00:00', '20:00:00'),
(5, 101, 'Tuesday', '03:28:00', '04:28:00'),
(10, 102, 'Friday', '04:37:00', '05:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `gender`, `dob`, `phone`, `username`, `password`, `email`) VALUES
(7, 'Likhita', 'Female', '2020-12-10', '1234567890', 'likhita_avl', 'likhita', 'avllikhita@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `deleted_doctors`
--
ALTER TABLE `deleted_doctors`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
