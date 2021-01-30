-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 07:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donor_seeker2`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_or_village_infos`
--

CREATE TABLE `area_or_village_infos` (
  `id` int(8) NOT NULL,
  `sub_district_id` int(8) NOT NULL,
  `Area_or_Village` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_or_village_infos`
--

INSERT INTO `area_or_village_infos` (`id`, `sub_district_id`, `Area_or_Village`) VALUES
(2, 17, 'Adamdighi'),
(3, 18, 'Char Fasson'),
(4, 15, 'Agailjhara'),
(5, 16, 'Wazipur'),
(6, 20, 'Bayejid Bustami'),
(7, 19, 'Halishahar'),
(8, 22, 'Daudkandi'),
(9, 21, 'Nangalkot'),
(10, 24, 'Merul Badda'),
(11, 23, 'Rampura'),
(12, 23, 'Aftabnagar'),
(13, 23, 'Banasree'),
(14, 26, 'Kaliakair'),
(15, 25, 'Kapasia'),
(16, 28, 'Dumuria'),
(17, 27, 'Koyra'),
(18, 29, 'Assasuni'),
(19, 30, 'Kalaroa'),
(20, 32, 'Gaffargaon'),
(21, 31, 'Ishwarganj');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group_infos`
--

CREATE TABLE `blood_group_infos` (
  `id` int(3) NOT NULL,
  `blood_group` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group_infos`
--

INSERT INTO `blood_group_infos` (`id`, `blood_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'AB+'),
(4, 'AB-'),
(5, 'B+'),
(6, 'B-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `district_infos`
--

CREATE TABLE `district_infos` (
  `id` int(8) NOT NULL,
  `division_id` int(8) NOT NULL,
  `District` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district_infos`
--

INSERT INTO `district_infos` (`id`, `division_id`, `District`) VALUES
(24, 1, 'Borishal'),
(25, 1, 'Barguna'),
(26, 1, 'Bhola'),
(27, 1, 'Jhalokati'),
(28, 1, 'Patuakhali'),
(29, 1, 'Pirojpur'),
(30, 2, 'Chottogram'),
(31, 2, 'Cumilla'),
(32, 3, 'Dhaka'),
(33, 3, 'Ghazipur'),
(34, 3, 'Kishoreganj'),
(35, 4, 'Khulna'),
(36, 4, 'Satkhira'),
(37, 5, 'Moymonsingho'),
(38, 5, 'Netrokona'),
(39, 6, 'Rajshahi'),
(40, 6, 'Natore'),
(41, 8, 'Rangpur'),
(42, 8, 'Dinajpur'),
(43, 7, 'Sylhet'),
(44, 7, 'Maulvibazar ');

-- --------------------------------------------------------

--
-- Table structure for table `division_infos`
--

CREATE TABLE `division_infos` (
  `id` int(8) NOT NULL,
  `Division` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division_infos`
--

INSERT INTO `division_infos` (`id`, `Division`) VALUES
(1, 'Borishal'),
(2, 'Chottogram'),
(3, 'Dhaka'),
(4, 'Khulna'),
(5, 'Moymonsingho'),
(6, 'Rajshahi'),
(8, 'Rangpur'),
(7, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `donation_infos`
--

CREATE TABLE `donation_infos` (
  `id` int(8) NOT NULL,
  `post_id` int(8) NOT NULL,
  `donor_id` int(8) NOT NULL,
  `Last_donate` date NOT NULL,
  `Division` varchar(30) NOT NULL,
  `blood_group` varchar(6) NOT NULL,
  `donee_location` varchar(40) NOT NULL,
  `donee_name` varchar(20) NOT NULL,
  `donee_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_infos`
--

INSERT INTO `donation_infos` (`id`, `post_id`, `donor_id`, `Last_donate`, `Division`, `blood_group`, `donee_location`, `donee_name`, `donee_contact`) VALUES
(1, 83, 63, '2019-10-01', 'Dhaka', 'A+', 'Square Hospital', 'Saiful', '0683073952'),
(2, 89, 64, '2020-05-05', 'Dhaka', 'A+', 'Square Hospital', 'sojol', '0683073952'),
(3, 89, 61, '2020-05-05', 'Dhaka', 'B+', 'Square Hospital', 'sojol', '0683073952'),
(6, 0, 41, '2020-05-02', 'Dhaka', 'AB+', 'MD Hospital', 'Fahad', '01819037065'),
(7, 0, 63, '2020-05-04', 'Khulna', 'AB-', 'MD Hospital', 'Ahsan Habib Mozumder', '01819037065');

-- --------------------------------------------------------

--
-- Table structure for table `donor_confirmation`
--

CREATE TABLE `donor_confirmation` (
  `post_id` int(8) NOT NULL,
  `donor_id` int(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `seeker_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donor_infos`
--

CREATE TABLE `donor_infos` (
  `id` int(8) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Blood_Group` varchar(4) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Weight` int(3) NOT NULL,
  `Division` varchar(20) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Sub_District_or_Police_Station` varchar(22) NOT NULL,
  `Village_or_Area` varchar(25) NOT NULL,
  `Details_of_Your_Area` varchar(30) DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `E_mail` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `status` varchar(8) NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `Last_donate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_infos`
--

INSERT INTO `donor_infos` (`id`, `First_Name`, `Last_Name`, `Blood_Group`, `Gender`, `Date_of_Birth`, `Weight`, `Division`, `District`, `Sub_District_or_Police_Station`, `Village_or_Area`, `Details_of_Your_Area`, `Phone`, `E_mail`, `Role`, `Password`, `status`, `deleted_at`, `Last_donate`) VALUES
(41, 'Mahfuz', 'Fahim', 'B+', 'Male', '1998-01-01', 62, 'Chottogram', 'Cumilla', 'Nangalkot', 'Nangalkot', 'D.I.T Road West Rampura.House:', '01683073952', 'mahfuz8886@gmail.com', 'admin', 'Mf@073952', ' active', '0000-00-00', '2020-05-02'),
(61, 'Mahfuz Mazumder', 'Fahim', 'B-', 'Male', '1998-01-01', 60, 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', 'Block:B.Road:06', '01743484950', 'mahfuzrokomari@hotmail.com', 'admin', 'Mf@073952', 'active', NULL, '2019-11-08'),
(62, 'Mahmud', 'Hasan', 'A+', 'Male', '2003-05-04', 48, 'Dhaka', 'Dhaka', 'Rampura', 'Rampura', '', '01923658886', 'mahfuz8886@yahoo.com', 'user', 'Mf@073952', 'active', NULL, '0000-00-00'),
(63, 'Jalal', 'Ahamed', 'A+', 'Male', '2004-01-01', 67, 'Dhaka', 'Dhaka', 'Rampura', 'Aftabnagar', '', '01819037065', 'jalal@gmail.com', 'user', 'Mf@073952', 'active', NULL, '2020-05-04'),
(64, 'Rafique', 'Biplob', 'A+', 'Male', '1950-07-01', 60, 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', '', '01819037065', 'biplob@gmail.com', 'user', 'Mf@073952', 'active', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `donor_seeker_post`
--

CREATE TABLE `donor_seeker_post` (
  `id` int(8) NOT NULL,
  `seeker_id` int(8) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `division` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `sub_district_or_police_station` varchar(20) NOT NULL,
  `village_or_area` varchar(20) NOT NULL,
  `details_of_your_area` varchar(40) DEFAULT NULL,
  `donee_name` varchar(25) NOT NULL,
  `donee_contact` varchar(20) NOT NULL,
  `donee_mail` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `how_much_needed` int(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `post_at` int(30) NOT NULL,
  `bag` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_seeker_post`
--

INSERT INTO `donor_seeker_post` (`id`, `seeker_id`, `blood_group`, `division`, `district`, `sub_district_or_police_station`, `village_or_area`, `details_of_your_area`, `donee_name`, `donee_contact`, `donee_mail`, `date`, `time`, `how_much_needed`, `status`, `post_at`, `bag`) VALUES
(82, 41, 'B-', 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', 'Al Razi Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-04-16', '12:00:00.000000', 33, 'live', 1588230925, 3),
(83, 41, 'B+', 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-06', '12:00:00.000000', 3, 'live', 1588323604, 3),
(84, 63, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Aftabnagar', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-03', '12:34:00.000000', 3, 'live', 1588415863, 3),
(85, 41, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Aftabnagar', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-03', '12:12:00.000000', 3, 'live', 1588415952, 3),
(86, 41, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-04', '12:00:00.000000', 2, 'live', 1588416588, 2),
(87, 41, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Aftabnagar', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-04', '12:00:00.000000', 2, 'live', 1588416793, 2),
(88, 41, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Aftabnagar', 'Farazy Hospital', 'Sojol', '01819037065', 'jalal@gmail.com', '2020-05-04', '23:09:00.000000', 2, 'live', 1588416871, 2),
(89, 41, 'A+', 'Dhaka', 'Dhaka', 'Rampura', 'Banasree', 'Farazy Hospital', 'Sojol', '01819037065', 'faisalbdc15@gmail.com', '2020-05-06', '12:00:00.000000', 2, 'live', 1588619376, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reset_paasword`
--

CREATE TABLE `reset_paasword` (
  `id` int(11) NOT NULL,
  `request_mail` text NOT NULL,
  `selector` text NOT NULL,
  `token` longtext NOT NULL,
  `reset_expire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_district_infos`
--

CREATE TABLE `sub_district_infos` (
  `id` int(8) NOT NULL,
  `district_id` int(8) NOT NULL,
  `Sub_District_or_Police_Station` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_district_infos`
--

INSERT INTO `sub_district_infos` (`id`, `district_id`, `Sub_District_or_Police_Station`) VALUES
(15, 24, 'Agailjhara'),
(16, 24, 'Wazirpur'),
(17, 26, 'Adamdighi'),
(18, 26, 'Char Fasson '),
(19, 30, 'Halishahar '),
(20, 30, 'Bayejid Bustami'),
(21, 31, 'Nangalkot'),
(22, 31, 'Daudkandi'),
(23, 32, 'Rampura'),
(24, 32, 'Badda'),
(25, 33, 'Kapasia'),
(26, 33, 'Kaliakair'),
(27, 35, 'Koyra'),
(28, 35, 'Dumuria'),
(29, 36, 'Assasuni'),
(30, 36, 'Kalaroa'),
(31, 37, 'Ishwarganj'),
(32, 37, 'Gaffargaon'),
(33, 38, 'Atpara'),
(34, 38, 'Kalmakanda'),
(35, 40, 'Gurudaspur'),
(36, 40, 'Baraigram'),
(37, 39, 'Godagari'),
(38, 39, 'Charghat'),
(39, 42, 'Kaharole'),
(40, 42, 'Fulbari'),
(41, 41, 'Kaunia'),
(42, 41, 'Gangachara'),
(43, 44, 'Kamalganj'),
(44, 44, 'Kulaura'),
(45, 43, 'Bimanbandar '),
(46, 43, 'Jalalabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_or_village_infos`
--
ALTER TABLE `area_or_village_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Area_or_Village` (`Area_or_Village`),
  ADD KEY `sub_district_id` (`sub_district_id`);

--
-- Indexes for table `blood_group_infos`
--
ALTER TABLE `blood_group_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_infos`
--
ALTER TABLE `district_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `District` (`District`),
  ADD UNIQUE KEY `District_2` (`District`),
  ADD KEY `district_infos` (`division_id`);

--
-- Indexes for table `division_infos`
--
ALTER TABLE `division_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Division` (`Division`);

--
-- Indexes for table `donation_infos`
--
ALTER TABLE `donation_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donor_confirmation`
--
ALTER TABLE `donor_confirmation`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `seeker_id` (`seeker_id`);

--
-- Indexes for table `donor_infos`
--
ALTER TABLE `donor_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `E-mail` (`E_mail`);

--
-- Indexes for table `donor_seeker_post`
--
ALTER TABLE `donor_seeker_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seeker_id` (`seeker_id`);

--
-- Indexes for table `reset_paasword`
--
ALTER TABLE `reset_paasword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_district_infos`
--
ALTER TABLE `sub_district_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Sub_District_or_Police_Station` (`Sub_District_or_Police_Station`),
  ADD KEY `district_id` (`district_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_or_village_infos`
--
ALTER TABLE `area_or_village_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blood_group_infos`
--
ALTER TABLE `blood_group_infos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `district_infos`
--
ALTER TABLE `district_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `division_infos`
--
ALTER TABLE `division_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation_infos`
--
ALTER TABLE `donation_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donor_infos`
--
ALTER TABLE `donor_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `donor_seeker_post`
--
ALTER TABLE `donor_seeker_post`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `reset_paasword`
--
ALTER TABLE `reset_paasword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sub_district_infos`
--
ALTER TABLE `sub_district_infos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area_or_village_infos`
--
ALTER TABLE `area_or_village_infos`
  ADD CONSTRAINT `area_or_village_infos_ibfk_1` FOREIGN KEY (`sub_district_id`) REFERENCES `sub_district_infos` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `district_infos`
--
ALTER TABLE `district_infos`
  ADD CONSTRAINT `district_infos_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division_infos` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `donation_infos`
--
ALTER TABLE `donation_infos`
  ADD CONSTRAINT `donation_infos_ibfk_2` FOREIGN KEY (`donor_id`) REFERENCES `donor_infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_confirmation`
--
ALTER TABLE `donor_confirmation`
  ADD CONSTRAINT `donor_confirmation_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `donor_seeker_post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_confirmation_ibfk_2` FOREIGN KEY (`donor_id`) REFERENCES `donor_infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donor_confirmation_ibfk_3` FOREIGN KEY (`seeker_id`) REFERENCES `donor_infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donor_seeker_post`
--
ALTER TABLE `donor_seeker_post`
  ADD CONSTRAINT `donor_seeker_post_ibfk_1` FOREIGN KEY (`seeker_id`) REFERENCES `donor_infos` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `sub_district_infos`
--
ALTER TABLE `sub_district_infos`
  ADD CONSTRAINT `sub_district_infos_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district_infos` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
