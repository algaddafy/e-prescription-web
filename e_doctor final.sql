-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 09:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `app_date` date NOT NULL,
  `symptoms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `doctor_id`, `patient_id`, `app_date`, `symptoms`) VALUES
(1, 1, 2, '2022-05-22', 'Test Symptoms.'),
(2, 1, 1, '2022-05-24', 'Test symptoms'),
(3, 2, 1, '2022-04-24', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doctor_degree` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `user_id`, `department`, `doctor_degree`, `age`, `gender`, `dob`, `address`) VALUES
(1, 2, 'Heart specialist', 'MBBS', 25, 'male', '2022-05-03', 'Notun Bazar'),
(2, 7, 'Neurosurgery specialist', 'FCPS', 28, 'male', '2022-05-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `help_line`
--

CREATE TABLE `help_line` (
  `help_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `exact_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help_line`
--

INSERT INTO `help_line` (`help_id`, `name`, `phone`, `email`, `message`, `exact_time`) VALUES
(1, 'Nirob Hasan', '01741158857', 'papon.nirob@gmail.com', 'test', '2022-05-23 05:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `lab_test_id` int(11) NOT NULL,
  `lab_test_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`lab_test_id`, `lab_test_name`) VALUES
(1, 'blood analysis'),
(2, 'kidney function test'),
(3, 'liver function test'),
(4, 'brain scanning'),
(5, 'blood test'),
(6, 'Test Lab');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(250) NOT NULL,
  `group_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `group_name`) VALUES
(1, 'Napa', 'Paracetamol'),
(2, 'Alatrol', 'Cetirizine Hydrochloride'),
(3, 'Monas', 'Montelukast Sodium'),
(4, 'Sergel', 'Esomeprazole'),
(5, 'Nortin', 'Nortriptyline'),
(6, 'Tafnil', 'taffgroup');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blood_group` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `user_id`, `blood_group`, `dob`, `gender`, `age`, `address`) VALUES
(1, 3, 'B+', '2022-05-24', 'male', 16, 'Notun Bazar'),
(2, 4, 'A+', '0000-00-00', 'male', 24, ''),
(3, 5, 'B+', '0000-00-00', 'male', 17, ''),
(4, 6, 'A-', '2022-05-18', 'male', 22, '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmacy_id` int(11) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`pharmacy_id`, `pharmacy_name`) VALUES
(1, 'Larz Pharma'),
(2, 'Farazy Pharma'),
(3, 'Ananta Pharmacy'),
(4, 'Test Pharma'),
(5, 'New Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `pres_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `lab_test_name` varchar(255) NOT NULL,
  `advice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `pres_date`, `patient_id`, `doctor_id`, `pharmacy_name`, `medicine_name`, `lab_test_name`, `advice`) VALUES
(1, '2022-05-23', 3, 1, ' Larz Pharma', ' Napa,  Alatrol,  Monas, ', ' blood analysis,  kidney function test, ', 'You have to take rest for 10 days.'),
(2, '2022-05-24', 4, 1, ' Larz Pharma', ' Alatrol,  Monas, ', ' kidney function test,  liver function test, ', 'Test'),
(3, '2022-05-24', 6, 2, ' Farazy Pharma', ' Sergel,  Nortin, ', ' brain scanning,  blood test, ', 'Test'),
(4, '2022-05-24', 5, 2, ' Larz Pharma', ' Monas,  Sergel, ', ' blood test, ', 'You have to take rest for 20 days.'),
(5, '2022-05-24', 4, 1, ' Larz Pharma', ' Alatrol,  Monas,  Sergel, ', ' brain scanning,  blood test, ', 'Take rest');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('patient','doctor','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `username`, `password`, `first_name`, `last_name`, `phone`, `email`) VALUES
(1, 'admin', 'nirob', 'e10adc3949ba59abbe56e057f20f883e', 'Nirob', 'Hasan', '01632030573', 'nirob@gmail.com'),
(2, 'doctor', 'atik', 'e10adc3949ba59abbe56e057f20f883e', 'Atik', 'Sahriare', '01703390338', 'atik@gmail.com'),
(3, 'patient', 'rashed', 'e10adc3949ba59abbe56e057f20f883e', 'Rashedul', 'Islam', '01780541308', 'rashed@gmail.com'),
(4, 'patient', 'eyamin', 'e10adc3949ba59abbe56e057f20f883e', 'Eyamin', 'Ahmed', '01831437477', 'eyamin@gmail.com'),
(5, 'patient', 'nirob', 'e10adc3949ba59abbe56e057f20f883e', 'Nirob', 'Hasan', '01632030573', 'admin@admin.com'),
(6, 'patient', 'uiuccl', '5e47c20fe80de6544ad787f4adfa1bce', 'HM', 'Ashik', '01741158857', 'admin@admin.com'),
(7, 'doctor', 'mgaddafy', 'e10adc3949ba59abbe56e057f20f883e', 'Md Al', 'Gaddafy', '01741158857', 'mgaddafy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `help_line`
--
ALTER TABLE `help_line`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`lab_test_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `help_line`
--
ALTER TABLE `help_line`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `lab_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
