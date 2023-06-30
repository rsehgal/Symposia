-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2023 at 10:44 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symposia`
--
CREATE DATABASE IF NOT EXISTS `sympnp2023` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sympnp2023`;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
CREATE TABLE `accommodation` (
  `uname` varchar(100) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `FunctionName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `accommodation`
--

TRUNCATE TABLE `accommodation`;
--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`uname`, `Name`, `FunctionName`) VALUES
('admin', 'DAECC Guest House', 'DAECC'),
('admin', 'Postgraduate Hostel', 'PGHostel'),
('admin', 'Hotel : The Regenza by Tunga', 'Tunga'),
('admin', 'Hotel : The Jewel of Chembur', 'JewelOfChembur');

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

DROP TABLE IF EXISTS `admin_credentials`;
CREATE TABLE `admin_credentials` (
  `uname` varchar(4) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `admin_credentials`
--

TRUNCATE TABLE `admin_credentials`;
--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`uname`, `passwd`, `email`, `name`) VALUES
('ADM', 'admin@nasi2023', 'sc.ramansehgal@gmail.com', 'Raman Sehgal');

-- --------------------------------------------------------

--
-- Table structure for table `assoc_array`
--

DROP TABLE IF EXISTS `assoc_array`;
CREATE TABLE `assoc_array` (
  `id` int(11) NOT NULL,
  `array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `assoc_array`
--

TRUNCATE TABLE `assoc_array`;
-- --------------------------------------------------------

--
-- Table structure for table `Biology`
--

DROP TABLE IF EXISTS `Biology`;
CREATE TABLE `Biology` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Biology`
--

TRUNCATE TABLE `Biology`;
--
-- Dumping data for table `Biology`
--

INSERT INTO `Biology` (`uname`, `category`, `code`) VALUES
('admin', 'Anatomy', 'a'),
('admin', 'Respiration', 'b'),
('admin', 'Pathology', 'c'),
('admin', 'Ortho', 'd'),
('admin', 'Dental', 'e'),
('admin', 'Cardiology', 'f'),
('admin', 'Neurology', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `Chemistry`
--

DROP TABLE IF EXISTS `Chemistry`;
CREATE TABLE `Chemistry` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Chemistry`
--

TRUNCATE TABLE `Chemistry`;
--
-- Dumping data for table `Chemistry`
--

INSERT INTO `Chemistry` (`uname`, `category`, `code`) VALUES
('admin', 'Organic Chemistry', 'a'),
('admin', 'Inorganic Chemistry', 'b'),
('admin', 'Quantum Chemistry', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

DROP TABLE IF EXISTS `committees`;
CREATE TABLE `committees` (
  `uname` varchar(50) DEFAULT NULL,
  `CounOffName` varchar(100) DEFAULT NULL,
  `CounOffAffil` varchar(255) DEFAULT NULL,
  `CounMemName` varchar(100) DEFAULT NULL,
  `CounMemAffil` varchar(255) DEFAULT NULL,
  `OrgMemName` varchar(100) DEFAULT NULL,
  `OrgMemAffil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `committees`
--

TRUNCATE TABLE `committees`;
--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`uname`, `CounOffName`, `CounOffAffil`, `CounMemName`, `CounMemAffil`, `OrgMemName`, `OrgMemAffil`) VALUES
('admin', 'Prof. Balram Bhargava', 'New Delhi', 'Prof. Anil Bhardwaj', 'Ahmedabad', 'S. M. Yusuf', 'BARC, Mumbai'),
('admin', 'Prof. Ajoy Kumar Ghatak', 'New Delhi', 'Prof. Dhrubajyoti Chattopadhyay', 'Kolkata', 'L. M. Pant', 'BARC, Mumbai'),
('admin', 'Prof. Manju Sharma ', 'New Delhi', 'Prof. Srinivasa Rao Cherukumalli', 'Telangana', 'D. V. Udupa', 'BARC, Mumbai'),
('admin', 'Prof. Madhu Dikshit', 'Lucknow', 'Prof. Pramod Kumar Garg', 'New Delhi', 'A. K. Gupta', 'BARC, Mumbai'),
('admin', 'Prof. U.C. Srivastava', 'Prayagraj', 'Prof. Anup Kumar Ghosh ', 'New Delhi', 'K. K. Yadav', 'BARC, Mumbai'),
('admin', 'Prof. Vinod Kumar Singh', 'Kanpur', 'Prof. Vimal Kumar Jain', 'Mumbai', 'T. Sakuntala ', 'BARC, Mumbai'),
('admin', 'Prof. Jayesh R. Bellare', 'Mumbai', 'Prof. Arun Kumar Pandey ', 'Bhopal', '', ''),
('admin', 'Prof. Madhoolika Agrawal', 'Varanasi', 'Prof. Anirban Pathak', 'Noida', '', ''),
('admin', '', '', 'Prof. Sheo Mohan Prasad', 'Prayagraj', '', ''),
('admin', '', '', 'Prof. Latha Rangan', 'Guwahati', '', ''),
('admin', '', '', 'Prof. Vijayalakshmi Ravindranath', 'Bangalore', '', ''),
('admin', '', '', 'Prof. Rohit Srivastava', 'Mumbai', '', ''),
('admin', '', '', 'Prof. Nikhil Tandon', 'New Delhi', '', ''),
('admin', '', '', 'Prof. S. M. Yusuf', 'Mumbai', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE `contactus` (
  `uname` varchar(20) DEFAULT NULL,
  `Post` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `contactus`
--

TRUNCATE TABLE `contactus`;
--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`uname`, `Post`, `Name`, `Email`, `ContactNumber`) VALUES
('admin', 'Convener', 'S. M. Yusuf', 'smyusuf@barc.gov.in', ''),
('admin', 'Member', 'L. M. Pant', 'lmpant@barc.gov.in', ''),
('admin', 'Member', 'D. V. Udupa', 'dudupa@barc.gov.in', ''),
('admin', 'Member', 'A. K. Gupta', 'anit@barc.gov.in', ''),
('admin', 'Member', 'K. K. Yadav', 'kkyadav@barc.gov.in', ''),
('admin', 'Member', 'T Sakuntala', 'sakuntl@barc.gov.in', '');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

DROP TABLE IF EXISTS `contributions`;
CREATE TABLE `contributions` (
  `uname` varchar(100) DEFAULT NULL,
  `Topic` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Title` varchar(500) DEFAULT NULL,
  `Filename` varchar(255) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `AuthorNamesList` varchar(1000) DEFAULT NULL,
  `AuthorEmailsList` varchar(1000) DEFAULT NULL,
  `refereeName` varchar(4) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `contributions`
--

TRUNCATE TABLE `contributions`;
--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`uname`, `Topic`, `Category`, `Title`, `Filename`, `status`, `AuthorNamesList`, `AuthorEmailsList`, `refereeName`, `remarks`) VALUES
('nwwton', 'A', 'c', 'Influence of Ionizing Radiation on Bio-synthesis of Colloidal SF-AgNPs: Their Characterization ', 'nwwton_paper_A_c_1.pdf', 'submitted', 'R. Madhukumar,Mohan N.R,Yesappa L', 'nwwton@gmail.com,nrmohana@gmail.com,yesugs@gmail.com', 'AYH', '');

-- --------------------------------------------------------

--
-- Table structure for table `coordinatorList`
--

DROP TABLE IF EXISTS `coordinatorList`;
CREATE TABLE `coordinatorList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `coordinatorList`
--

TRUNCATE TABLE `coordinatorList`;
--
-- Dumping data for table `coordinatorList`
--

INSERT INTO `coordinatorList` (`uname`, `passwd`, `email`, `name`) VALUES
('RSE', 'admin@nasi2023', 'sc.ramansehgal@gmail.com', 'Raman Sehgal'),
('AYH', 'admin@nasi2023', 'ayush.sehgal@gmail.com', 'Ayush Sehgal');

-- --------------------------------------------------------

--
-- Table structure for table `HowToReach`
--

DROP TABLE IF EXISTS `HowToReach`;
CREATE TABLE `HowToReach` (
  `id` int(11) DEFAULT NULL,
  `How_To_Reach` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `HowToReach`
--

TRUNCATE TABLE `HowToReach`;
--
-- Dumping data for table `HowToReach`
--

INSERT INTO `HowToReach` (`id`, `How_To_Reach`) VALUES
(1, '<h2 class=\"text-danger\"><b>Airports in Mumbai<br/> (15 km from the Venue / Accommodation)</b></h2>'),
(11, '<h3 class=\"text-primary\">Chhatrapati Shivaji Maharaj International Airport, Sahar (Terminal 2 : Domestic and International Flights) </h3>'),
(12, '<h3 class=\"text-primary\">Mumbai Domestic Airport, Santa Cruz (Terminal 1 : Only Domestic Flights) </h3>'),
(NULL, NULL),
(NULL, NULL),
(2, '<h2 class=\"text-danger\"><b>Main Railway Stations in Mumbai<br/> (from 7 km to 13 km from the Venue/Accommodation) </b></h2>'),
(21, '<h3 class=\"text-primary\">Chhatrapati Shivaji Terminus, Station code: CST </h3>'),
(22, '<h3 class=\"text-primary\">Dadar Railway Station, Station code: DR, DDR </h3>'),
(23, '<h3 class=\"text-primary\">Lokmanya Tilak Terminus, Station code: LTT </h3>'),
(24, '<h3 class=\"text-primary\">Mumbai Central Railway Station, Station Code : MMTC </h3>'),
(25, '<h3 class=\"text-primary\">Panvel Railway Station, Station Code: PL (suburban)/PNVL (mainline) </h3>'),
(10000, ''),
(10000, ''),
(3, '<h3 class=\"text-dark\"><b>The nearest local train station to Anushaktinagar is Mankhurd, on the harbour line </b></h3>'),
(NULL, NULL),
(NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Mathematics`
--

DROP TABLE IF EXISTS `Mathematics`;
CREATE TABLE `Mathematics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Mathematics`
--

TRUNCATE TABLE `Mathematics`;
--
-- Dumping data for table `Mathematics`
--

INSERT INTO `Mathematics` (`uname`, `category`, `code`) VALUES
('admin', 'Geometry', 'a'),
('admin', 'Trigonometry', 'b'),
('admin', 'Calculus', 'c'),
('admin', 'Mensuration', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE `menuitems` (
  `item` varchar(255) DEFAULT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `menuitems`
--

TRUNCATE TABLE `menuitems`;
--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`item`, `value`) VALUES
('Home', 1),
('About', 1),
('Committees', 1),
('Signup', 1),
('Login', 1),
('Submissions', 0),
('Accommodation', 1),
('Contact', 1),
('Upload_Contribution', 0),
('Resubmit_Contribution', 0),
('View_Contribution', 0),
('DAECC', 1),
('Tunga', 1),
('JewelOfChembur', 1),
('PGHostel', 1),
('AuthorLogin', 1),
('RefereeLogin', 1),
('Topic', 0),
('Venue', 1),
('Poster', 1),
('ImportantDates', 0),
('CoordinatorLogin', 1),
('AdminLogin', 1),
('Submission_Guidelines', 0),
('Templates', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Physics`
--

DROP TABLE IF EXISTS `Physics`;
CREATE TABLE `Physics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Physics`
--

TRUNCATE TABLE `Physics`;
--
-- Dumping data for table `Physics`
--

INSERT INTO `Physics` (`uname`, `category`, `code`) VALUES
('admin', 'Nuclear Physics', 'a'),
('admin', 'Atomic Physics', 'b'),
('admin', 'Solid State Physics', 'c'),
('admin', 'Particle Physics', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `refereeAllotment`
--

DROP TABLE IF EXISTS `refereeAllotment`;
CREATE TABLE `refereeAllotment` (
  `Filename` varchar(255) DEFAULT NULL,
  `refereeName` varchar(4) DEFAULT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `marks` int(11) DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `refereeAllotment`
--

TRUNCATE TABLE `refereeAllotment`;
--
-- Dumping data for table `refereeAllotment`
--

INSERT INTO `refereeAllotment` (`Filename`, `refereeName`, `refnum`, `marks`, `remarks`) VALUES
('rsehgal_paper_D_g_1.pdf', 'SLV', 'ref1', 4, 'More work needs to be done. Please resubmit it, otherwise it will be rejected'),
('rsehgal_paper_D_g_1.pdf', 'RSE', 'ref2', 6, 'hMMMKM SEE due to non concrete result. Please resubmit it'),
('rsehgal_paper_D_g_1.pdf', 'ASE', 'ref3', 2, 'Bad work REJECTED'),
('rsehgal_paper_A_b_1.pdf', 'ASE', 'ref1', 8, 'Excellent job, go on doing like this'),
('rsehgal_paper_A_b_1.pdf', 'BRB', 'ref2', 5, 'Great, one should work mire'),
('rsehgal_paper_A_b_1.pdf', 'SLV', 'ref3', 9, 'Perfect work. Excellent JOB. ORAL'),
('rsehgal_paper_D_g_1.pdf', 'SSE', 'ref4', 0, ''),
('rsehgal_paper_A_b_1.pdf', 'SSE', 'ref4', 1, 'Dont understand what is he trying to do. REJECTED from my side'),
('nwwton_paper_A_c_1.pdf', 'RSE', 'ref1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refereeList`
--

DROP TABLE IF EXISTS `refereeList`;
CREATE TABLE `refereeList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `refereeEmail` varchar(255) DEFAULT NULL,
  `refereeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `refereeList`
--

TRUNCATE TABLE `refereeList`;
--
-- Dumping data for table `refereeList`
--

INSERT INTO `refereeList` (`uname`, `passwd`, `refereeEmail`, `refereeName`) VALUES
('RSE', 'ramansehgal', 'sc.ramansehgal@gmail.com', 'Raman Sehgal'),
('ASE', 'ayushsehgal', 'ayush.sehgal@gmail.com', 'Ayush Sehgal'),
('SSE', 'shachisehgal', 'shachi.sehgal@gmail.com', 'Shachi Sehgal'),
('SLV', 'admin@nasi2023', 'slv@nasi2023.in', 'Sunder Lal'),
('BRB', 'admin@nasi2023', 'brb@nasi2023.in', 'Bunder Lal'),
('ABE', 'admin@nasi2023', 'abe@nasi2023.in', 'Ander Lal');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `uname` varchar(255) DEFAULT NULL,
  `Initials` varchar(15) DEFAULT NULL,
  `FirstName` varchar(500) DEFAULT NULL,
  `LastName` varchar(500) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(500) DEFAULT NULL,
  `Affiliation` varchar(1000) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Nationality` varchar(500) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Accommodation_Required` varchar(15) DEFAULT NULL,
  `Accommodation_Preference` varchar(100) DEFAULT NULL,
  `Accommodation_Type` varchar(500) DEFAULT NULL,
  `Arrival_Date` datetime DEFAULT NULL,
  `Departure_Date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `registration`
--

TRUNCATE TABLE `registration`;
-- --------------------------------------------------------

--
-- Table structure for table `symposium`
--

DROP TABLE IF EXISTS `symposium`;
CREATE TABLE `symposium` (
  `uname` varchar(50) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `venue` varchar(500) DEFAULT NULL,
  `datefrom` date DEFAULT NULL,
  `dateto` date DEFAULT NULL,
  `reg_start_date` date DEFAULT NULL,
  `reg_end_date` date DEFAULT NULL,
  `contrib_start_date` date DEFAULT NULL,
  `contrib_end_date` date DEFAULT NULL,
  `finsup_start_date` date DEFAULT NULL,
  `finsup_end_date` date DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `about` longtext,
  `UploadLocation` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `symposium`
--

TRUNCATE TABLE `symposium`;
--
-- Dumping data for table `symposium`
--

INSERT INTO `symposium` (`uname`, `volume`, `title`, `venue`, `datefrom`, `dateto`, `reg_start_date`, `reg_end_date`, `contrib_start_date`, `contrib_end_date`, `finsup_start_date`, `finsup_end_date`, `city`, `state`, `country`, `about`, `UploadLocation`) VALUES
('admin', 1, '\'India Secure @75\'<br/>\r\n93<sup>rd</sup> Annual Session of National Academy of Sciences (NASI)<br/>\r\n<small class=\'text-light font-weight-bolder\'><u>An endeavour to celebrate and support \'Atma Nirbhar Bharat\'</u></small><br/>\r\n<h1><small class=\'text-danger font-weight-bolder\'>The National Academy of Sciences (NASI) & <br/> Bhabha Atomic Research Centre (BARC), Mumbai<br/>\r\nDAE Convention Centre, BARC, Mumbai<br/>\r\n3<sup>rd</sup>-5<sup>th</sup> December 2023</small></h1>', 'DAE Convention Center, Anushaktinagar', '2023-12-03', '2023-12-05', '2023-10-01', '2023-10-10', '2023-09-01', '2023-09-10', '2023-09-01', '2023-09-10', 'Mumbai', 'Maharashtra', 'India', NULL, 'Uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `testuser`
--

DROP TABLE IF EXISTS `testuser`;
CREATE TABLE `testuser` (
  `id` int(11) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `testuser`
--

TRUNCATE TABLE `testuser`;
--
-- Dumping data for table `testuser`
--

INSERT INTO `testuser` (`id`, `FirstName`, `LastName`) VALUES
(1, 'Raman', 'Sehgal'),
(2, 'Ayush', 'Sehgal'),
(2, 'Shachi', 'Sehgal');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `uname` varchar(100) DEFAULT NULL,
  `Topic` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `topics`
--

TRUNCATE TABLE `topics`;
--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`uname`, `Topic`, `code`) VALUES
('admin', 'Physics', 'A'),
('admin', 'Chemistry', 'B'),
('admin', 'Mathematics', 'C'),
('admin', 'Biology', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `passwd`) VALUES
(1, 'rsehgal', 'Hsuya^123');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
CREATE TABLE `user_credentials` (
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `user_credentials`
--

TRUNCATE TABLE `user_credentials`;
--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`uname`, `passwd`, `firstname`, `lastname`, `email`, `creation_date`) VALUES
('ajayaksingh_au@yahoo', 'Singh@123456789', 'Ajaya Kumar', 'Singh', 'ajayaksingh_au@yahoo.co.in', NULL),
('anandp5', 'science123', 'Anand ', 'Pathak', 'anandp5@yahoo.com', NULL),
('Aravindan_Kavitha', 'aaron3407', 'Aravindan', 'V', 'aronearvind1994@gmail.com', NULL),
('arijitsahahri', 'prathomalo1S$', 'ARIJIT', 'SAHA', 'arijit@iopb.res.in', NULL),
('ashishrtanna', 'ART@80art', 'Ashish', 'Tanna', 'ashish.tanna@rku.ac.in', '2023-06-19 11:57:09'),
('ashiskrmanna', 'ashis1111', 'Ashis Kumar', 'Manna', 'ashiskrmanna@gmail.com', '2023-06-20 10:43:04'),
('athira7rythm@gmail.c', 'Athi7598', 'ATHIRA', 'A', 'athira7rythm@gmail.com', NULL),
('gobinda', 'Jat735216!', 'Gobinda', 'Majumder', 'gobinda@tifr.res.in', '2023-06-21 16:44:49'),
('jmondal', 'jay2tanu377', 'JAYANTA', 'MONDAL', 'jmondal@barc.gov.in', '2023-06-19 10:43:37'),
('kumartvl88', 'Selva!1988', 'Selvakumar', 'S', 'kumartvl88@gmail.com', '2023-06-16 22:21:35'),
('Manju', 'Manju@1991', 'Manjunatha ', 'Mushtagatte', 'manjuna999@gmail.com', NULL),
('mmdnaseer', 'flower99a', 'Mohamed Naseer Ali', 'Mohamed', 'mmdnaseer@gmail.com', NULL),
('nifeeya', 'Nif123@@@', 'Nifeeya ', 'Singh', 'n_singh@ph.iitr.ac.in', '2023-06-25 16:10:53'),
('nwwton', 'maphy@2020', 'Madhukumar', 'R', 'nwwton@gmail.com', NULL),
('pandeeswariprabhakar', 'Rpandeeswari@12345', 'Dr. Pandeeswari ', 'R', 'pandeeswari.r@srec.ac.in', NULL),
('PCRout', 'PCRout~12345', 'Prakash Chandra ', 'Rout', 'pcrout2002@gmail.com', NULL),
('Poonkodi ', 'Mscchemistry*1', 'Dr K', 'Poonkodi', 'poonks.che@gmail.com', NULL),
('Rajib', 'sairambaba2', 'Rajib', 'Deb', 'drrajibdeb@gmail.com', '2023-06-20 22:49:46'),
('rasehgal', '#Gudia123', 'Raman', 'Sehgal', 'rsehgal@barc.gov.in', '2023-06-16 09:48:55'),
('resanvs', 'Barc@2023', 'VELUSAMY', 'SUNDARESAN', 'vsundaresan@cimap.res.in', '2023-06-19 13:15:59'),
('rsehgal', 'ijklmnop', 'Raman', 'Sehgal', 'sc.ramansehgal@gmail.com', '2023-06-15 17:32:38'),
('santoshg@barc.gov.in', 'Sun2*ruma', 'Santosh K.', 'Gupta', 'santoshg@barc.gov.in', NULL),
('sawaghuley', '[Anandrao123', 'Sandeep', 'Waghuley', 'sandeepwaghuley@sgbau.ac.in', '2023-06-18 08:05:30'),
('snbramha', 'orissa', 'SATYANARAYAN', 'BRAMHA', 'snbramha@gmail.com', NULL),
('tcsshetty@gmail.com', 'mymother', 'CHANDRA SHEKHARA', 'SHETTY T', 'tcsshetty@gmail.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assoc_array`
--
ALTER TABLE `assoc_array`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Biology`
--
ALTER TABLE `Biology`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `Chemistry`
--
ALTER TABLE `Chemistry`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `Mathematics`
--
ALTER TABLE `Mathematics`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `Physics`
--
ALTER TABLE `Physics`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assoc_array`
--
ALTER TABLE `assoc_array`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
