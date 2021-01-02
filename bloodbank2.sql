-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 07:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`id`, `hospital_name`, `blood_group`) VALUES
(1, 'City Hospital', 'A+'),
(2, 'Somaiya Hospital', 'A+'),
(3, 'MGM Hospital', 'A+'),
(4, 'Shehlar Hospital', 'AB+'),
(5, 'Durga Clinic', 'A+'),
(6, 'Krishna Clinic', 'B+'),
(7, 'MGM Kamothe', 'A+'),
(8, 'ABC', 'A+'),
(9, 'ABC', 'B-'),
(10, 'ABC', 'B+'),
(11, 'Durga Clinic', 'AB+'),
(12, 'Somaiya Hospital', 'A ');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL,
  `frequency` varchar(50) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `allergy` varchar(50) NOT NULL,
  `approved_hospital` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `email`, `dob`, `bloodgroup`, `weight`, `frequency`, `dates`, `allergy`, `approved_hospital`, `status`) VALUES
(1, 'avilb@gmail.com', '06/06/1997', 'O+', 50, 'Yet To Donate', 'Not Specified', 'None', 'City Hospital', 'Waiting'),
(2, 'avilb@gmail.com', '06/06/1997', 'A+', 50, 'Yet To Donate', '2018-01-07', 'None', 'Durga Clinic', 'Waiting'),
(3, 'avilb@gmail.com', '06/06/1997', 'AB+', 50, 'Yet To Donate', 'Not Specified', 'None', 'Durga Clinic', 'Donated'),
(4, 'avilb@gmail.com', '06/06/1997', 'A+', 50, 'Yet To Donate', '2018-01-07', 'None', 'Shehlar Hospital', 'Donated'),
(5, 'ash@gmail.com', '06/06/1997', 'A+', 50, 'Need Basis', 'Not Specified', 'None', '', ''),
(6, 'er@gmail.com', '06/06/1997', 'O+', 50, 'Need Basis', 'Not Specified', 'Pain Killers', 'Somaiya Hospital', 'Waiting'),
(7, 'avilb@gmail.com', '06/06/1997', 'AB+', 50, 'Need Basis', 'Not Specified', 'Dust', '', ''),
(8, 'yashit@gmail.com', '2018-01-07', 'B-', 50, 'Yet To Donate', '2018-01-07', 'None', 'Somaiya Hospital', 'Reject'),
(9, 'ash@gmail.com', '2018-01-07', 'B+', 50, 'Need Basis', '2018-01-07', 'None', '', ''),
(10, 'yashit@gmail.com', 'Not Specified', 'B+', 50, 'Need Basis', 'Not Specified', 'Pain Killers', 'Durga Clinic', 'Waiting'),
(11, 'yashit@gmail.com', '2018-01-04', 'B-', 50, 'Yet To Donate', '2018-01-04', 'None', 'Durga Clinic', 'Donated');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_adminstration`
--

CREATE TABLE `hospital_adminstration` (
  `ids` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `alt_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_adminstration`
--

INSERT INTO `hospital_adminstration` (`ids`, `name`, `email`, `password`, `hospital_name`, `address`, `street`, `city`, `contact_no`, `alt_email`) VALUES
(1, 'City Hospital', 'Anamika@gmail.com', '2311', 'City Hospital', 'Plot No-9 Sec-17', 'Vashi', 'Navi Mumbai', 989257911, 'ana@hotmail.com'),
(2, 'Deopriya', 'Deopriya@gmail.com', '0606', 'Somaiya Hospital', 'Plot No-9 Sec-18', 'Vashi Sec-9', 'Navi Mumbai', 22227456, 'ana@hotmail.com'),
(3, 'Seema', 'Seema@gmail.com', '123455', 'MGM Hospital', 'Plot No-9 Sec-19', 'Vashi', 'Navi Mumbai', 22227853, 'ana@hotmail.com'),
(4, 'Veena', 'Veena@gmail.com', '12345', 'Shehlar Hospital', 'Plot No-9 Sec-20', 'Pimpri', 'Navi Mumbai', 22227853, 'ana@hotmail.com'),
(5, 'Shweta', 'Shweta@gmail.com', '2311', 'Durga Clinic', 'Plot No-9 Sec-17', 'Noida', 'Delhi', 22227853, 'ana@hotmail.com'),
(6, 'Rishi', 'Rishi@gmail.com', '12345', 'Krishna Clinic', 'Plot No-9 Sec-21', 'Pimpri', 'Pune', 22227853, 'ana@hotmail.com'),
(7, 'Dev', 'Dev@gmail.com', '12345', 'MGM Kamothe\n', 'Plot No-9 Sec-22', 'Noida', 'Delhi', 22227853, 'ana@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request_blood`
--

CREATE TABLE `request_blood` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `patience_dieases` varchar(50) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `transfusion_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_blood`
--

INSERT INTO `request_blood` (`id`, `email`, `bloodgroup`, `hospital_name`, `patience_dieases`, `doctor_name`, `transfusion_date`, `status`) VALUES
(1, 'avilb@gmail.com', 'A+', 'Durga Clinic', 'Cold', 'ABC', '2017-12-21', ''),
(5, 'yashit@gmail.com', 'AB+', 'City Hospital', 'Cold', 'PQR', '23/11/2012', ''),
(6, 'avilb@gmail.com', 'B+', 'Durga Clinic', 'Cold', 'LMO', '23/11/2012', 'Accept'),
(7, 'yash@gmail.com', 'B+', 'City Hospital', 'Cold', 'SMT', '23/11/2012', ''),
(8, 'ash@gmail.com', 'A+', 'City Hospital', 'Cold', 'MLM', '23/11/2012', ''),
(9, 'avinash@gmail.com', 'A ', 'Durga Clinic', 'Malaria', 'Aniket', '2018-01-20', 'Reject'),
(10, 'avinash@gmail.com', 'A ', 'Somaiya Hospital', 'Liver Problem', 'Aniket D', '2018-01-21', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `state` varchar(20) NOT NULL,
  `contact_no` bigint(30) NOT NULL,
  `alt_contact_no` bigint(30) NOT NULL,
  `alt_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `sex`, `address`, `street`, `city`, `zipcode`, `state`, `contact_no`, `alt_contact_no`, `alt_email`) VALUES
(1, 'Aniket', 'avilb@gmail.com', '0606', 'male', 'Vrindavan(B) C.H.S Sec-9', 'Sec-99', 'Navi Mumbai', 410206, 'Maharashtra', 808067206, 808067206, 'alternate_emailhnn@jjj'),
(5, 'Yashica', 'yashit@gmail.com', '0606', 'male', 'Silicon Tower Sec-30 Vashi', 'Sec-30', 'Navi Mumbai', 410208, 'Maharashtra', 8080662222, 9892579113, 'yashica@gmail.com'),
(6, 'Ankit', 'aniket@gmail.com', '0606', 'male', 'Silicon Tower Sec-30 Vashi', 'Sec-30', 'Navi Mumbai', 410206, 'Maharashtra', 80806662, 44823692, ''),
(7, 'Yash', 'yash@gmail.com', '0606', 'male', 'Silicon Tower Sec-30 Vashi', 'Sec-30', 'Navi Mumbai', 410206, 'Maharashtra', 80806662, 8080672062, ''),
(8, 'Ash', 'ash@gmail.com', '0606', 'male', 'Silicon Tower Sec-30 Vashi', 'Sec-30', 'Navi Mumbai', 410206, 'Maharashtra', 80806662, 44823692, ''),
(9, 'Deo', 'er@gmail.com', '0606', 'male', 'C-102 Vrindavan (B) C.H.S Plot No.-29/41 Sec-9 Khanda Colony New Panvel West', 'C-102 Vrindavan (B) C.H.S Plot No.-29/41 Sec-9 Kha', 'Navi Mumbai', 410206, 'Maharashtra', 9892576653, 8080672062, ''),
(10, 'Avinash', 'avinash@gmail.com', '1909', 'male', 'Vardha Vinayak Complex', 'Khanda Colony Sec-9', 'Navi Mumbai', 410206, 'Maharashtra', 9224360815, 44823692, ''),
(11, 'Yashica', 'yashithh@gmail.com', '2311', 'male', 'Silicon Tower Sec-30 Vashi', 'Silicon Tower Sec-30 Vashi', 'Navi Mumbai', 410208, 'Maharashtra', 9892579113, 9892579113, 'avilb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `voluntary_event`
--

CREATE TABLE `voluntary_event` (
  `id` int(11) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `Organised` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voluntary_event`
--

INSERT INTO `voluntary_event` (`id`, `image_name`, `headline`, `content`, `dates`, `Organised`) VALUES
(12, 'https://i5.walmartimages.com/asr/149cba03-f389-471b-bf4e-a00235d08b58_1.08ec992f931fa4be05c41bc664fdc6b1.jpeg?odnHeight=180&odnWidth=180&odnBg=FFFFFF', 'Blood Donation Camp 1	\n', 'Blood Donation Camp at D.G. Ruparel College, Mahim 400016 along with Sion Hospital. We appeal all of you to donate blood for a nobel cause.\n', '2017-12-13', 'NSS D.G. Ruparel College'),
(13, 'https://i5.walmartimages.com/asr/149cba03-f389-471b-bf4e-a00235d08b58_1.08ec992f931fa4be05c41bc664fdc6b1.jpeg?odnHeight=180&odnWidth=180&odnBg=FFFFFF', 'Blood Donation Camp 2	\n', 'Blood Donation Camp at Somaiya College, Ghatkopar 400016 along with Sion Hospital. We appeal all of you to donate blood for a nobel cause.\n', '2017-12-09', 'Somaiya College NSS Group'),
(14, 'https://i5.walmartimages.com/asr/149cba03-f389-471b-bf4e-a00235d08b58_1.08ec992f931fa4be05c41bc664fdc6b1.jpeg?odnHeight=180&odnWidth=180&odnBg=FFFFFF', 'Blood Donation Camp 3	\n', 'Blood Donation Camp at Phadke School Panvel 410206 along with City Hospital. We appeal all of you to donate blood for a nobel cause.\n', '2017-12-09', 'City Hospital'),
(15, 'https://i5.walmartimages.com/asr/149cba03-f389-471b-bf4e-a00235d08b58_1.08ec992f931fa4be05c41bc664fdc6b1.jpeg?odnHeight=180&odnWidth=180&odnBg=FFFFFF', 'Blood Donation Camp 4', 'Blood Donation Camp at Mahatma School Panvel 410206 along with City Hospital. We appeal all of you to donate blood for a nobel cause.\n', '2017-12-09', 'Mahatma NSS Group');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_adminstration`
--
ALTER TABLE `hospital_adminstration`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `request_blood`
--
ALTER TABLE `request_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voluntary_event`
--
ALTER TABLE `voluntary_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hospital_adminstration`
--
ALTER TABLE `hospital_adminstration`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `request_blood`
--
ALTER TABLE `request_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `voluntary_event`
--
ALTER TABLE `voluntary_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
