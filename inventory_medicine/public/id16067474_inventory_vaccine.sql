-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2023 at 11:59 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16067474_inventory_vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkups`
--

CREATE TABLE `tbl_checkups` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date` date NOT NULL,
  `status` enum('Good Condition','Bad Condition') NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_checkups`
--

INSERT INTO `tbl_checkups` (`id`, `patient_name`, `age`, `gender`, `date`, `status`, `comment`) VALUES
(1, 'Dave A. Lopez', 24, 'Male', '2021-02-05', 'Bad Condition', 'Covid-19 Positive findings sore throat, \r\ndifficulty breathing,\r\n chronic cough'),
(2, 'Anna B. Vedad', 25, 'Female', '2021-01-21', 'Bad Condition', 'High fever, Chronic'),
(3, 'John L. Benedicta', 23, 'Male', '2020-11-04', 'Bad Condition', 'Dog Bite'),
(4, 'Sassy Kim', 35, 'Male', '2020-11-11', 'Bad Condition', 'Positive Covid-19'),
(5, 'Mark Ryan', 4, 'Male', '2020-11-05', 'Good Condition', 'For Polio Vaccine \r\n'),
(6, 'Kim Sto. Tomas', 25, 'Male', '2020-11-17', 'Good Condition', '33.6 Celcius Temperature'),
(7, 'Kim Sto. Tomas', 26, 'Male', '2020-11-17', 'Good Condition', 'Normal '),
(8, 'Anna L. Vidad', 35, 'Female', '2020-11-18', 'Bad Condition', 'sore throat and high fever'),
(9, 'John A. Lopez', 45, 'Male', '2020-11-18', 'Bad Condition', 'Sore Throat and High Fever'),
(10, 'John A. Benedick', 40, 'Male', '2020-11-18', 'Good Condition', 'No symptoms Found '),
(11, 'Jennifer P. Arinton', 36, 'Male', '2020-11-18', 'Bad Condition', 'Has a Sore throat and High Fever'),
(12, 'Abbie F. Flores', 55, 'Male', '2020-11-18', 'Bad Condition', 'Has a High Fever'),
(13, 'Kim Sto. Froland', 34, 'Male', '2020-11-24', 'Good Condition', 'No symptoms Found'),
(14, 'Abbie F. Benedicta', 26, 'Male', '2020-11-20', 'Good Condition', 'No symptoms Found'),
(15, 'Jonner A. Perey', 39, 'Male', '2020-11-20', 'Good Condition', 'Normal Body Temperature no sypmtoms found'),
(16, 'Kim Sto. Tomas', 46, 'Male', '2020-11-25', 'Bad Condition', 'High fever, Difficulty breathing, persitent cough and cold'),
(17, 'sadasd', 50, 'Male', '2020-11-26', 'Bad Condition', 'masakit lalamunan, mataas ang lagnat'),
(18, 'Alexis T. Texas', 28, 'Male', '2020-12-03', 'Good Condition', 'No symptoms Found'),
(19, 'Hannah P. Arinton', 29, 'Male', '2020-12-06', 'Bad Condition', 'difficulty Breathing, chronic cough'),
(20, 'Johannah A. Binag', 30, 'Male', '2020-12-06', 'Good Condition', 'Mild'),
(21, 'John B. Bernard', 28, 'Male', '2020-12-09', 'Bad Condition', 'chronic cough, High fever'),
(22, 'Cedrick Kilay', 20, 'Male', '2021-01-26', 'Bad Condition', 'Dog Bite'),
(23, 'Kim Sto. Tomas', 0, 'Male', '2021-01-21', 'Bad Condition', 'Good ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicines`
--

CREATE TABLE `tbl_medicines` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicines`
--

INSERT INTO `tbl_medicines` (`id`, `image`, `name`, `stocks`, `supplier`, `date_added`, `date_expire`) VALUES
(1, 'upload/3661.jpg', 'AntiBiotics Tablet(Amoxicilin)', 8, 'Mercury', '2021-01-14', '2024-06-19'),
(2, 'upload/biogesic1.jpg', 'Biogesic Captule', 10, 'Unilab', '2021-01-13', '2023-07-20'),
(3, 'upload/22421_1200x630.jpg', 'Solmux Captule', 2, 'Mercury', '2021-02-05', '2023-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_residents`
--

CREATE TABLE `tbl_residents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `vaccinated` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_residents`
--

INSERT INTO `tbl_residents` (`id`, `name`, `gender`, `age`, `address`, `civilstatus`, `citizenship`, `contact_no`, `date`, `vaccinated`) VALUES
(1, 'Cedric A. PauloS', 'Male', 28, 'Lazaro Street Blk 13 Lot 6 Punta', 'Married', 'Filipino', '09084843794', '2021-02-05', 'Yes'),
(2, 'Joselito john M.', 'Male', 20, 'Jeremiah\'s Blk 12 lot 9', 'Single', 'Filipino', '09083834796', '2020-12-08', 'Yes'),
(3, 'Patrick A. Lazaro', 'Female', 41, 'Aldea Real Blk 12 lot 6 Punta', 'Married', 'Filipino', '09084843796', '2021-01-04', 'Yes'),
(4, 'Kim A. Lopez', 'Male', 20, 'Aldea Real Blk 17 Lot 4', 'Single', 'Filipino', '09085854785', '2021-01-09', 'Yes'),
(5, 'Patrick A. Lazaro22', 'Male', 1, 'Lazaro Street Blk 18 lot 6', 'Single', 'Filipino', '09084843794', '2020-12-20', 'Yes'),
(6, 'Atonio Luna', 'Male', 25, 'Cavit Blk 8 Lot 9', 'Married', 'Filipino', '09084843784', '2020-12-20', 'Yes'),
(7, 'Lapaz Jeffrey', 'Male', 27, 'Kawit Lazaro Punta Blk 12 Lot 9', 'Married', 'Filipino', '09084843795', '2021-02-17', 'Yes'),
(8, 'Jayson Montemayor', 'Male', 37, 'Palo Alto Street Blk 12 Lot 4', 'Married', 'Filipino', '0908585468', '2021-01-14', 'Yes'),
(9, 'Jesselle Mabilangan', 'Female', 25, 'Lazaro Street Punta Blk 12 lot 5', 'Single', 'Filipino', '09084843756', '2021-01-14', 'Yes'),
(10, 'Patricia Arinton', 'Female', 25, 'Blk 12 Lot 5 Palo Alto Punta Calamba', 'Single', 'Filipino', '09067702632', '1980-02-18', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suppliers`
--

CREATE TABLE `tbl_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_suppliers`
--

INSERT INTO `tbl_suppliers` (`id`, `name`, `address`, `contact_no`) VALUES
(1, 'Phzerl', 'St jonh blk 17 lot 13 ', '09084843797'),
(2, 'Mercur', 'Calamba Street blk 8 lot 6', '09084843794'),
(3, 'Unilab', 'Jeremiah\'s Street Blk 17 Lot 4 Calamba', '09084843794'),
(4, 'Negative', '655\r\n', '044444'),
(5, 'Phze', 'Blk 17 Lot 13 lazaro Street', '111-222-33'),
(6, 'Unilab', 'Aldea Street Blk 12 lot 6 brgy punta', '44'),
(9, 'Phzdd', 'utyuty', '09084843794'),
(10, 'fgdfg', 'bvgfdg', '09084843794'),
(11, 'Mercury2', 'fgdf', '4234234'),
(15, 'Negativ', 'dsad', '09084843794'),
(17, 'Mercury25', 'GDSGSDG', '09084843794'),
(18, 'Casino', 'Blk 13 lot 5 cambridge street.', '09084845767');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `address`, `contact_no`, `email`, `usertype`, `password`, `status`) VALUES
(1, 'Admin', 'Gabriel', 'Dio', 'Olivares', '2020-12-17', 'Male', 'St. Joseph vill.3 Blk 12 lot 6', '09084843794', 'olivares@gmail.com', 'Administrator', 'Admin', 'Active'),
(2, 'joshua', 'Hoshua', 'May', 'Lakas', '2021-01-23', 'Male', 'Lazaro Street Blk 12 Lot 6 Punta', '09084843793', 'hoshua@gmail.com', 'HealthWorker', 'joshua', 'DeActivate'),
(3, 'mae', 'Maecy', 'Carreon', 'Arinton', '2020-12-25', 'Female', 'Jeremiahs Street Blk 13 lot 8', '09084843745', 'Mae@gmail.com', 'HealthWorker', 'mae', 'Active'),
(4, 'wilson', 'wilson', 'dio', 'palag', '2021-02-08', 'Male', 'Lazaro canlubang Street blk 17 lot 5', '09084843796', 'wilson25@gmail.com', 'Nurse', 'wilson', 'Active'),
(5, 'alma', 'alma', 'palma', 'goyo', '1998-12-08', 'Female', 'Aldea Real Blk 13 Lot 5 Punta', '09085854796', 'alma345@gmail.com', 'HealthWorker', 'alma', 'Active'),
(6, 'Gabriel', 'gabriel', 'Dio', 'olivares', '2020-12-09', 'Male', 'fgfdgdf', '09084843795', 'Gab0@gmail.com', 'Nurse', 'Gabriel', ''),
(7, 'mae1', 'gabriel', 'Dio', 'olivareses', '2020-12-09', 'Male', 'fgfdgdf', '09084843795', 'olivaresgabby25@gmail.com', 'HealthWorker', 'mae1', 'Active'),
(8, 'john', 'john', 'a', 'asa', '2020-12-10', 'Female', 'fgfdgdf', '09084843795', 'john_doe@example.com', 'HealthWorker', 'john', 'DeActivate'),
(9, 'Mark', 'Mark', 'Tanny', 'Dio', '2020-12-31', 'Male', 'Mamatid Street', '09084843744', 'gabby25@gmail.com', 'HealthWorker', 'Mark', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccination`
--

CREATE TABLE `tbl_vaccination` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccination`
--

INSERT INTO `tbl_vaccination` (`id`, `patient_name`, `age`, `gender`, `vaccine_name`, `day`, `date`, `status`, `comment`) VALUES
(1, 'Angie A. Lapaz', 25, 'Female', 'Covid-19 Vacccine CanSino', '5', '2020-12-10', 'Covid-19 Positive', 'sour tough'),
(2, 'John L. Carlo', 23, 'Male', 'Covid-19 Vaccine Moderna', '3', '2020-12-10', 'Good codition', 'He is good condition'),
(3, 'Cedrick L. Payag', 26, 'Male', 'Covid-19 Vaccine Moderna', '3', '2020-12-09', 'Bad Condition', 'dizzy, vomiting and fainting'),
(4, 'Patricia A. Lopez', 46, 'Female', 'Covid-19 Vaccine Biontech', '3', '2020-12-19', 'his condition is not good', 'headache, dizziness and vomiting'),
(5, 'Jhustine Armand', 23, 'Male', 'Covid-19 Vaccine Biontech', '4', '2021-01-15', 'Normal Condition', 'Good\r\n'),
(6, 'Dave A. Lopez', 25, 'Male', 'Rabies Vaccine(Imovax)', '4', '2021-01-15', 'Normal Condition', 'no findings found, good condition'),
(7, 'John L. Benedicta', 34, 'Male', 'Covid-19 Vaccine Moderna', '4', '2021-01-14', 'Normal Condition', 'dsdsd'),
(8, 'Dave A. Lopez', 28, 'Male', 'Covid-19 Vaccine Moderna', '4', '2020-12-30', 'Normal Condition', 'gsdasdasf'),
(9, 'John L. Benedicta', 25, 'Male', 'Covid-19 Vaccine Moderna', '12', '2021-01-22', 'Normal Condition', 'sdsdsdsd'),
(10, 'John L. Benedicta', 56, 'Male', 'Rabies Vaccine(Imovax)', '4', '2021-01-13', 'Bad Condition', 'itching and vomiting'),
(11, 'Anna B. Vedaddd', 45, 'Female', 'Influenza Vaccine', '4', '2021-01-07', 'Normal Condition', 'dfdfdf'),
(12, 'fgdfgdfgdf', 26, 'Female', 'Covid-19 Vaccine Moderna', '12', '2021-01-13', 'Normal Condition', 'sdfsdfsd'),
(13, 'sdsdfhgjhjgh', 27, 'Male', 'Covid-19 Vaccine Moderna', '4', '2021-01-21', 'Normal Condition', 'gfgdfgdfgdf'),
(14, 'Mark Christian', 47, 'Female', 'Rabies Vaccine(Imovax)', '12', '2021-01-21', 'Normal', 'his condition is good'),
(15, 'jonnel Guevarra', 21, 'Male', 'Vaccine Moderna', '1', '2021-03-29', 'Bad Condition', 'Sour Tough');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccines`
--

CREATE TABLE `tbl_vaccines` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `date_expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccines`
--

INSERT INTO `tbl_vaccines` (`id`, `image`, `name`, `stocks`, `supplier`, `date_added`, `date_expire`) VALUES
(1, 'upload/moderna-covid-19-vaccine-640x427.jpg', 'Vaccine Moderna', 9, 'Unilab', '2020-11-20', '2025-06-09'),
(2, 'upload/AstraZeneca-agrees-to-supply-Europe-with-400-million-doses-of-COVID-19-vaccine-Reuters-6-13-20.jpeg', 'Anti Rabies Vaccine(Imovax)', 18, 'Mercury', '2020-11-20', '2025-06-09'),
(3, 'upload/COVID-19-Vaccine-Updates(2).jpg', 'Influenza Vaccine', 11, 'Unilab', '2020-11-20', '2025-06-09'),
(4, 'upload/03aa2131-5ffe-4c02-b5e3-2484275deeec.jpg', 'Covid-19 Vaccine Pfizer', 11, 'Phzer', '2020-11-20', '2025-06-09'),
(5, 'upload/download.jpg', 'SARS-COV-2', 0, 'WHO', '2020-11-20', '2025-06-09'),
(6, 'upload/79239329.jpg', 'Covid-19 Vaccine Sputnik 1', 0, 'Galderma', '2020-11-20', '2025-06-09'),
(7, 'upload/images.jpg', 'Polio Vaccine', 0, 'Phzer', '2020-11-20', '2025-06-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_checkups`
--
ALTER TABLE `tbl_checkups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccination`
--
ALTER TABLE `tbl_vaccination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccines`
--
ALTER TABLE `tbl_vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_checkups`
--
ALTER TABLE `tbl_checkups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_medicines`
--
ALTER TABLE `tbl_medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_suppliers`
--
ALTER TABLE `tbl_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_vaccination`
--
ALTER TABLE `tbl_vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_vaccines`
--
ALTER TABLE `tbl_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
