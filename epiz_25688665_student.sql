-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.byetcluster.com
-- Generation Time: Oct 04, 2020 at 03:14 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25688665_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `std_reg` varchar(250) NOT NULL,
  `std_roll` varchar(250) NOT NULL,
  `std_name` varchar(250) NOT NULL,
  `std_father` varchar(250) NOT NULL,
  `std_school` varchar(250) NOT NULL,
  `std_district` varchar(250) NOT NULL,
  `std_dob` varchar(250) NOT NULL,
  `exam_month` varchar(250) NOT NULL,
  `exam_year` varchar(250) NOT NULL,
  `exam_category` varchar(250) NOT NULL,
  `exam_sitting` varchar(250) NOT NULL,
  `std_group` varchar(250) NOT NULL,
  `std_image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `std_reg`, `std_roll`, `std_name`, `std_father`, `std_school`, `std_district`, `std_dob`, `exam_month`, `exam_year`, `exam_category`, `exam_sitting`, `std_group`, `std_image`) VALUES
(14, '20-PLR-122701', '122701', 'ARSAL IFTIKHAR', 'CHAUDHRY IFTIKHAR NABI', 'CITY STAR PUBLIC SCHOOL DIJKOT', 'Faisalabad', '1997-10-29', 'JUNE-JULY', '2017', 'Regular', 'IN ONE SITTING', 'SCIENCE', 'uploadimages/cf2bc5fa3970d16a33af6f5c21cdf702-0af6867a-3840-462f-9ed9-b104706ccd40.jpg'),
(15, '12-PLR-252-G68', '122703', 'JAMAL ANWAR', 'MUHAMMAD ANWAR', 'CITY STAR PUBLIC SCHOOL DIJKOT', 'Faisalabad', '1997-04-23', 'JUNE-JULY', '2014', 'Regular', 'IN ONE SITTING', 'SCIENCE', 'uploadimages/fa4b86dd301f9a1c5e450e0de23b11d1-image1.jpg'),
(16, '12345', '466133', 'HASSAN', 'HAQ NAWAZ', 'HIGH SCHOOL', 'Hafizabad', '2020-05-06', 'APRIL-MAY', '2014', 'Regular', 'IN ONE SITTING', 'SCIENCE', 'uploadimages/6f77cfe46743287c9ea0437d9bdd4ce1-h.jpg'),
(17, '625-3-FB-09', '107422', 'rIZWAN ALI', 'MURATAB ALI', 'GOVT HIGH SCHOOL NO 2', 'Faisalabad', '1989-12-24', 'NOV-DEC', '2007', 'Regular', 'IN ONE SITTING', 'ARTS', 'uploadimages/3f2e76c90e81a9a32626844ee733de53-DSC_0296.JPG'),
(18, '54655lj8ugea', '122626', 'ARSAL', 'IFTIKHAR', 'CITY SCHOOL', 'Faisalabad', '2020-05-12', 'JULY-AUG', '2015', 'Regular', 'IN ONE SITTING', 'SCIENCE', 'uploadimages/1aa1a8c31d6e24ef848d72911bade446-unnamed (1) - Copy.jpg'),
(19, '125456FR', '26750', 'ZAMEER ANJUM', 'MUHAMMAD SHAKEEL', 'GOVT HIGHER SECONDARY SCHOOL', 'Faisalabad', '1987-12-07', 'JULY-AUG', '2005', 'Regular', 'REVISION', 'SCIENCE', 'uploadimages/9c8b86bce946d34031aafff56b7d6ac0-Capture.JPG'),
(20, 'PLR345633', '554412', 'HAIDER', 'RAFIQUE AHMAD', 'GOVT MC HIGH SCHOOL GOJRA', 'Faisalabad', '2020-02-27', 'AUG-SEP', '2003', 'Regular', 'IN ONE SITTING', 'SCIENCE', 'uploadimages/951b0cc3d688b2887c57acc618945196-DSC_5752.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `id` int(11) NOT NULL,
  `std_roll` varchar(250) NOT NULL,
  `urdu` varchar(250) NOT NULL,
  `english` varchar(250) NOT NULL,
  `islamiat` varchar(250) NOT NULL,
  `ps` varchar(250) NOT NULL,
  `math` varchar(250) NOT NULL,
  `physics` varchar(250) NOT NULL,
  `chemistry` varchar(250) NOT NULL,
  `biology` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`id`, `std_roll`, `urdu`, `english`, `islamiat`, `ps`, `math`, `physics`, `chemistry`, `biology`) VALUES
(21, '122701', '130', '140', '59', '65', '140', '130', '134', '129'),
(22, '122703', '122', '98', '60', '50', '130', '134', '100', '116'),
(23, '466133', '140', '145', '60', '50', '149', '70', '80', '120'),
(24, '107422', '110', '90', '80', '85', '68', '60', '90', '80'),
(25, '122626', '120', '45', '52', '60', '78', '55', '80', '64'),
(26, '26750', '120', '110', '55', '65', '85', '90', '96', '105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
