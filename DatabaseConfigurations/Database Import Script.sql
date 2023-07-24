-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 07:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagementsystem`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteById` (`tableName` VARCHAR(500), `id` INT, `isSoftDelete` BIT)
BEGIN

	SET @Query = IF (
                        isSoftDelete = 1, 
                        concat('UPDATE ', tableName , ' SET Deleted = 1 WHERE Id = ', id),
                        concat('DELETE FROM ', tableName, ' WHERE Id = ', id)
                    );
                    
	prepare Q from @query;
    EXECUTE Q;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_employee_by_procedure` ()   BEGIN
select * from employee;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `CNIC` varchar(20) DEFAULT NULL,
  `DateOfBirth` datetime NOT NULL,
  `DateOfJoining` datetime NOT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `RoleId` int(11) NOT NULL DEFAULT 0,
  `CreatedOn` datetime NOT NULL,
  `CreatedBy` int(11) NOT NULL DEFAULT 0,
  `Deleted` bit(1) NOT NULL DEFAULT b'0',
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Id`, `FirstName`, `LastName`, `Email`, `Password`, `CNIC`, `DateOfBirth`, `DateOfJoining`, `Address`, `RoleId`, `CreatedOn`, `CreatedBy`, `Deleted`, `PhoneNumber`) VALUES
(2, 'Muhammad', 'Aslam', 'aslam@gmail.com', NULL, '42101-4141422-9', '2000-08-15 00:00:00', '2022-12-14 00:00:00', NULL, 3, '2023-05-29 10:23:57', 1, b'1', '034548988'),
(4, 'Muhammad', 'Arham', 'arham@gmail.com', '34545', '42101-4144722-9', '2001-11-15 00:00:00', '2021-08-17 00:00:00', '345345345', 1, '2023-05-29 10:23:57', 1, b'1', '4464564'),
(5, 'ar', 'ar', 'ar', 'ar', 'ar', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ar', 0, '0000-00-00 00:00:00', 0, b'1', 'ar'),
(6, 'Ali', 'Akram Sheikh', 'akram@gmail.com', '222', '42101-4546467-9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'House # 112342', 0, '0000-00-00 00:00:00', 0, b'0', '-322273454'),
(7, 'Muhammad', 'Arsalan', 'arsalan@gmail.com', '34324234', '4534098543098', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'house 111', 0, '0000-00-00 00:00:00', 0, b'0', '32542376'),
(8, 'Kamil', 'Khan', 'kmail@gmail.com', '23498', '98279834732', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'adaslkjd', 0, '0000-00-00 00:00:00', 0, b'0', '293484392'),
(9, 'Farooq', 'Ul Haq', 'farooq@gmail.com', '12345', '3284324', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'house 0', 0, '0000-00-00 00:00:00', 0, b'0', 'i843095883490'),
(10, 'delete from employee', 'ahgsd', 'lkjhasd@gmail.com', 'asdjkh', 'askjdh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asdasdjh', 0, '0000-00-00 00:00:00', 0, b'1', 'asdasd'),
(11, 'ahsan', 'masood', 'ahsan@gmail.com', 'ahsan', '4354534', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sdff', 0, '0000-00-00 00:00:00', 0, b'0', '3543534'),
(12, 'Mesum', 'Abbas', 'mesum@gmail.com', 'mesum', '98274982374', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'house # 01', 0, '0000-00-00 00:00:00', 0, b'0', '2430983'),
(13, 'samiya', 'khan', 'samiya@gmail.com', 'samiya', '298478329', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'house # 03', 0, '0000-00-00 00:00:00', 0, b'0', '234324');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `InActive` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `Name`, `InActive`) VALUES
(1, 'Principal', b'0'),
(3, 'Admin', b'0'),
(4, 'Receptionist', b'0'),
(5, 'Teacher', b'0'),
(6, 'Peon', b'0'),
(7, 'Coordinator', b'0'),
(8, 'Cleaner', b'0'),
(9, 'Security', b'0'),
(10, 'CanteenGuy', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE Student 
(
  Id INT AUTO_INCREMENT PRIMARY KEY,
  FullName varchar(200) not null,
  FatherName varchar(200) not null,
  B_From varchar(20) not null UNIQUE
);

CREATE TABLE StudentFee 
( 
  Id INT AUTO_INCREMENT PRIMARY KEY,
  StudentId INT NOT NULL DEFAULT 0,
  Fee DECIMAL(24, 8) NOT NULL DEFAULT 0,
  FeeType varchar(200) not null
);

CREATE TABLE StudentFeePayments
( 
  Id INT AUTO_INCREMENT PRIMARY KEY,
  StudentId INT NOT NULL DEFAULT 0, 
  StudentFeeId INT NOT NULL DEFAULT 0,
  PaidAmount DECIMAL(24, 8) NOT NULL DEFAULT 0, 
  RemainingAmount DECIMAL(24, 8) NOT NULL DEFAULT 0,
  Month INT NOT NULL DEFAULT 0,
  Year_ INT NOT NULL DEFAULT 0 
);