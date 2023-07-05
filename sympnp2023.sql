-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: sympnp2023
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AdvComm`
--

DROP TABLE IF EXISTS `AdvComm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `AdvComm` (
  `Name` varchar(100) DEFAULT NULL,
  `Affiliation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AdvComm`
--

LOCK TABLES `AdvComm` WRITE;
/*!40000 ALTER TABLE `AdvComm` DISABLE KEYS */;
INSERT INTO `AdvComm` VALUES ('Bhalerao  R. S.','Indian Institute of Science Education and Research, Pune'),('Bhattacharyya  G.','Saha Institute of Nuclear Physics, Kolkata'),('Bhattacharya  S.','Variable Energy Cyclotron Centre, Kolkata'),('Chatterjee A.','Bhabha Atomic Research Centre, Mumbai'),('Chengalur Jayaram N.','Tata Institute of Fundamental Research, Mumbai'),('Choudhury R. K.','Bhabha Atomic Research Centre, Mumbai'),('Datar  V. M.','Institute of Mathematical Sciences, Chennai'),('Jain  A. K.','Amity University, Noida, Uttar Pradesh'),('Joshi Suhas S. ','Indian Institute of Technology, Indore'),('Kailas  S.','Centre for Excellence in Basic Sciences, Mumbai'),('Kanjilal  D.','Inter-University Accelerator Centre, Delhi'),('Kapoor  S. S.','Bhabha Atomic Research Centre, Mumbai'),('Mohanty  A. K.','Bhabha Atomic Research Centre, Mumbai'),('Nayak  B. K.','Bhabha Atomic Research Centre, Mumbai'),('Pandey  A. C.','Inter-University Accelerator Centre, Delhi'),('Pillay  R. G.','Indian Institute of Technology, Ropar'),('Ramamurthy  V. S.','National Institute of Advanced Studies, Bangalore'),('Saxena  A.','Bhabha Atomic Research Centre, Mumbai'),('Som  S.','Variable Energy Cyclotron Centre, Kolkata'),('Sinha  A. K.','UGC-DAE CSR, Kolkata'),('Srivastava  D. K.','National Institute of Advanced Studies, Bangalore'),('Vinod Kumar  P. C.','Sardar Patel University, Anand, Gujarat'),('Yusuf  S. M.','Bhabha Atomic Research Centre, Mumbai'),(' ','');
/*!40000 ALTER TABLE `AdvComm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Biology`
--

DROP TABLE IF EXISTS `Biology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Biology` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Biology`
--

LOCK TABLES `Biology` WRITE;
/*!40000 ALTER TABLE `Biology` DISABLE KEYS */;
INSERT INTO `Biology` VALUES ('admin','Anatomy','a'),('admin','Respiration','b'),('admin','Pathology','c'),('admin','Ortho','d'),('admin','Dental','e'),('admin','Cardiology','f'),('admin','Neurology','g');
/*!40000 ALTER TABLE `Biology` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Chemistry`
--

DROP TABLE IF EXISTS `Chemistry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Chemistry` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Chemistry`
--

LOCK TABLES `Chemistry` WRITE;
/*!40000 ALTER TABLE `Chemistry` DISABLE KEYS */;
INSERT INTO `Chemistry` VALUES ('admin','Organic Chemistry','a'),('admin','Inorganic Chemistry','b'),('admin','Quantum Chemistry','c');
/*!40000 ALTER TABLE `Chemistry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HowToReach`
--

DROP TABLE IF EXISTS `HowToReach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `HowToReach` (
  `id` int DEFAULT NULL,
  `How_To_Reach` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HowToReach`
--

LOCK TABLES `HowToReach` WRITE;
/*!40000 ALTER TABLE `HowToReach` DISABLE KEYS */;
INSERT INTO `HowToReach` VALUES (1,'<h2 class=\"text-danger\"><b>Airports in Mumbai<br/> (15 km from the Venue / Accommodation)</b></h2>'),(11,'<h3 class=\"text-primary\">Chhatrapati Shivaji Maharaj International Airport, Sahar (Terminal 2 : Domestic and International Flights) </h3>'),(12,'<h3 class=\"text-primary\">Mumbai Domestic Airport, Santa Cruz (Terminal 1 : Only Domestic Flights) </h3>'),(NULL,NULL),(NULL,NULL),(2,'<h2 class=\"text-danger\"><b>Main Railway Stations in Mumbai<br/> (from 7 km to 13 km from the Venue/Accommodation) </b></h2>'),(21,'<h3 class=\"text-primary\">Chhatrapati Shivaji Terminus, Station code: CST </h3>'),(22,'<h3 class=\"text-primary\">Dadar Railway Station, Station code: DR, DDR </h3>'),(23,'<h3 class=\"text-primary\">Lokmanya Tilak Terminus, Station code: LTT </h3>'),(24,'<h3 class=\"text-primary\">Mumbai Central Railway Station, Station Code : MMTC </h3>'),(25,'<h3 class=\"text-primary\">Panvel Railway Station, Station Code: PL (suburban)/PNVL (mainline) </h3>'),(10000,''),(10000,''),(3,'<h3 class=\"text-dark\"><b>The nearest local train station to Anushaktinagar is Mankhurd, on the harbour line </b></h3>'),(NULL,NULL),(NULL,NULL);
/*!40000 ALTER TABLE `HowToReach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mathematics`
--

DROP TABLE IF EXISTS `Mathematics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Mathematics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mathematics`
--

LOCK TABLES `Mathematics` WRITE;
/*!40000 ALTER TABLE `Mathematics` DISABLE KEYS */;
INSERT INTO `Mathematics` VALUES ('admin','Geometry','a'),('admin','Trigonometry','b'),('admin','Calculus','c'),('admin','Mensuration','d');
/*!40000 ALTER TABLE `Mathematics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrgComm`
--

DROP TABLE IF EXISTS `OrgComm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `OrgComm` (
  `Name` varchar(100) DEFAULT NULL,
  `Affiliation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrgComm`
--

LOCK TABLES `OrgComm` WRITE;
/*!40000 ALTER TABLE `OrgComm` DISABLE KEYS */;
INSERT INTO `OrgComm` VALUES ('Alam  J.','Variable Energy Cyclotron Centre, Kolkata'),('Athar  M. S.','Aligarh Muslim University, Aligarh, Uttar Pradesh'),('Behera  B. R.','Panjab University, Chandigarh'),('Chatterjee  R.','Indian Institute Of Technology, Roorkee'),('Chattopadhyay  S.','Variable Energy Cyclotron Centre, Kolkata'),('Das  J. J.','Cotton University, Guwahati, Assam'),('Das  P.','Indian Institute of Technology Bombay, Mumbai'),('Datta  U.','Saha Institute of Nuclear Physics, Kolkata'),('Dutta  D.','Bhabha Atomic Research Centre, Mumbai'),('Gore  J. A.','Bhabha Atomic Research Centre, Mumbai'),('Ghugre  S. S.','UGC-DAE CSR, Kolkata'),('Gupta  A. K.','Bhabha Atomic Research Centre, Mumbai (Chairman)'),('Jha  V.','Bhabha Atomic Research Centre, Mumbai'),('Lalremruata  B.','Mizoram University, Aizawl, Mizoram'),('Madhavan  N.','Inter-University Accelerator Centre, Delhi'),('Mahata  K.','Bhabha Atomic Research Centre, Mumbai'),('Mandal  S. K.','University of Delhi, New Delhi'),('Mazumdar  I.','Tata Institute of Fundamental Research, Mumbai'),('Mohanty  B.','National Institute of Science Education and Research, Bhubaneswar, Odisha'),('Muralithar  S.','Inter-University Accelerator Centre, Delhi'),('Mustafa  M. G.','Saha Institute of Nuclear Physics, Kolkata'),('Musthafa M.M.','University of Calicut, Malappuram, Kerala'),('Nanal  V.','Tata Institute of Fundamental Research, Mumbai'),('Palit  R.','Tata Institute of Fundamental Research, Mumbai'),('Pandit  S. K.','Bhabha Atomic Research Centre, Mumbai (Secretary)'),('Pant  L. M.','Bhabha Atomic Research Centre, Mumbai'),('Patra  S. K.','Institute of Physics, Bhubaneswar, Odisha'),('Sahoo  R.','Indian Institute of Technology , Indore'),('Santra  S.','Bhabha Atomic Research Centre, Mumbai'),('Sharma  M. K.','Thapar Institute of Engineering and Technology, Patiala, Punjab'),('Shrivastava  A.','Bhabha Atomic Research Centre, Mumbai (Convener)'),('Shukla  P.','Bhabha Atomic Research Centre, Mumbai'),('Singh  B. K.','Banaras Hindu University, Varanasi, Uttar Pradesh'),('Singh  B. P.','Aligarh Muslim University, Aligarh, Uttar Pradesh'),('Tandel  S. K.','Centre for Excellence in Basic Sciences, Mumbai'),('Rai  A. K.','Sardar Vallabhbhai National Institute of Technology, Surat, Gujarat'),(' ','');
/*!40000 ALTER TABLE `OrgComm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Physics`
--

DROP TABLE IF EXISTS `Physics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Physics` (
  `uname` varchar(100) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Physics`
--

LOCK TABLES `Physics` WRITE;
/*!40000 ALTER TABLE `Physics` DISABLE KEYS */;
INSERT INTO `Physics` VALUES ('admin','Nuclear Physics','a'),('admin','Atomic Physics','b'),('admin','Solid State Physics','c'),('admin','Particle Physics','d');
/*!40000 ALTER TABLE `Physics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accommodation` (
  `uname` varchar(100) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `FunctionName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation`
--

LOCK TABLES `accommodation` WRITE;
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
INSERT INTO `accommodation` VALUES ('admin','DAECC Guest House','DAECC'),('admin','Postgraduate Hostel','PGHostel'),('admin','Hotel : The Regenza by Tunga','Tunga'),('admin','Hotel : The Jewel of Chembur','JewelOfChembur');
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_credentials`
--

DROP TABLE IF EXISTS `admin_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_credentials` (
  `uname` varchar(4) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_credentials`
--

LOCK TABLES `admin_credentials` WRITE;
/*!40000 ALTER TABLE `admin_credentials` DISABLE KEYS */;
INSERT INTO `admin_credentials` VALUES ('ADM','admin@nasi2023','sc.ramansehgal@gmail.com','Raman Sehgal');
/*!40000 ALTER TABLE `admin_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assoc_array`
--

DROP TABLE IF EXISTS `assoc_array`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assoc_array` (
  `id` int NOT NULL AUTO_INCREMENT,
  `array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assoc_array`
--

LOCK TABLES `assoc_array` WRITE;
/*!40000 ALTER TABLE `assoc_array` DISABLE KEYS */;
/*!40000 ALTER TABLE `assoc_array` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `uname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('admin','Nuclear structure','A'),('admin','Nuclear reactions','B'),('admin','Nuclear astrophysics','C'),('admin','Hadron physics','D'),('admin','Relativistic nuclear collisions and QGP','E'),('admin','Electroweak interaction in nuclei','F'),('admin','Nuclear instrumentation, techniques and applications','G');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committees`
--

DROP TABLE IF EXISTS `committees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `committees` (
  `uname` varchar(50) DEFAULT NULL,
  `CounOffName` varchar(100) DEFAULT NULL,
  `CounOffAffil` varchar(255) DEFAULT NULL,
  `CounMemName` varchar(100) DEFAULT NULL,
  `CounMemAffil` varchar(255) DEFAULT NULL,
  `OrgMemName` varchar(100) DEFAULT NULL,
  `OrgMemAffil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committees`
--

LOCK TABLES `committees` WRITE;
/*!40000 ALTER TABLE `committees` DISABLE KEYS */;
INSERT INTO `committees` VALUES ('admin','Prof. Balram Bhargava','New Delhi','Prof. Anil Bhardwaj','Ahmedabad','S. M. Yusuf','BARC, Mumbai'),('admin','Prof. Ajoy Kumar Ghatak','New Delhi','Prof. Dhrubajyoti Chattopadhyay','Kolkata','L. M. Pant','BARC, Mumbai'),('admin','Prof. Manju Sharma ','New Delhi','Prof. Srinivasa Rao Cherukumalli','Telangana','D. V. Udupa','BARC, Mumbai'),('admin','Prof. Madhu Dikshit','Lucknow','Prof. Pramod Kumar Garg','New Delhi','A. K. Gupta','BARC, Mumbai'),('admin','Prof. U.C. Srivastava','Prayagraj','Prof. Anup Kumar Ghosh ','New Delhi','K. K. Yadav','BARC, Mumbai'),('admin','Prof. Vinod Kumar Singh','Kanpur','Prof. Vimal Kumar Jain','Mumbai','T. Sakuntala ','BARC, Mumbai'),('admin','Prof. Jayesh R. Bellare','Mumbai','Prof. Arun Kumar Pandey ','Bhopal','',''),('admin','Prof. Madhoolika Agrawal','Varanasi','Prof. Anirban Pathak','Noida','',''),('admin','','','Prof. Sheo Mohan Prasad','Prayagraj','',''),('admin','','','Prof. Latha Rangan','Guwahati','',''),('admin','','','Prof. Vijayalakshmi Ravindranath','Bangalore','',''),('admin','','','Prof. Rohit Srivastava','Mumbai','',''),('admin','','','Prof. Nikhil Tandon','New Delhi','',''),('admin','','','Prof. S. M. Yusuf','Mumbai','','');
/*!40000 ALTER TABLE `committees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `uname` varchar(20) DEFAULT NULL,
  `Post` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
INSERT INTO `contactus` VALUES ('admin','Convener','S. M. Yusuf','smyusuf@barc.gov.in',''),('admin','Member','L. M. Pant','lmpant@barc.gov.in',''),('admin','Member','D. V. Udupa','dudupa@barc.gov.in',''),('admin','Member','A. K. Gupta','anit@barc.gov.in',''),('admin','Member','K. K. Yadav','kkyadav@barc.gov.in',''),('admin','Member','T Sakuntala','sakuntl@barc.gov.in','');
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributions`
--

DROP TABLE IF EXISTS `contributions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributions`
--

LOCK TABLES `contributions` WRITE;
/*!40000 ALTER TABLE `contributions` DISABLE KEYS */;
INSERT INTO `contributions` VALUES ('admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('rsehgal','C','G','Test paper on category G','rsehgal_paper_C_G_1.pdf','submitted','Raman sehgal','ramansehga@abc.com','',''),('rsehgal','C','E','Test paper on category E','rsehgal_paper_C_E_1.pdf','submitted','Raman Sehga','ramsn.sehgalff@fgs.com','',''),('rsehgal','C','E','Another paper on cat E','rsehgal_paper_C_E_2.pdf','submitted','Ayush Sehgal','ayush.sehgal@abc.com','','');
/*!40000 ALTER TABLE `contributions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordinatorList`
--

DROP TABLE IF EXISTS `coordinatorList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coordinatorList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinatorList`
--

LOCK TABLES `coordinatorList` WRITE;
/*!40000 ALTER TABLE `coordinatorList` DISABLE KEYS */;
INSERT INTO `coordinatorList` VALUES ('RSE','admin@nasi2023','sc.ramansehgal@gmail.com','Raman Sehgal'),('AYH','admin@nasi2023','ayush.sehgal@gmail.com','Ayush Sehgal');
/*!40000 ALTER TABLE `coordinatorList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menuitems`
--

DROP TABLE IF EXISTS `menuitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menuitems` (
  `item` varchar(255) DEFAULT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menuitems`
--

LOCK TABLES `menuitems` WRITE;
/*!40000 ALTER TABLE `menuitems` DISABLE KEYS */;
INSERT INTO `menuitems` VALUES ('Home',1),('About',1),('Committees',1),('Signup',1),('Login',1),('Submissions',0),('Accommodation',1),('Contact',1),('Upload_Contribution',1),('Resubmit_Contribution',0),('View_Contribution',1),('DAECC',1),('Tunga',1),('JewelOfChembur',1),('PGHostel',1),('AuthorLogin',1),('RefereeLogin',1),('Topic',0),('Venue',1),('Poster',1),('ImportantDates',0),('CoordinatorLogin',1),('AdminLogin',1),('Submission_Guidelines',0),('Templates',0),('Register',1),('Finsup_Application',0);
/*!40000 ALTER TABLE `menuitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refereeAllotment`
--

DROP TABLE IF EXISTS `refereeAllotment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refereeAllotment` (
  `Filename` varchar(255) DEFAULT NULL,
  `refereeName` varchar(4) DEFAULT NULL,
  `refnum` varchar(10) DEFAULT NULL,
  `marks` int DEFAULT '0',
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refereeAllotment`
--

LOCK TABLES `refereeAllotment` WRITE;
/*!40000 ALTER TABLE `refereeAllotment` DISABLE KEYS */;
INSERT INTO `refereeAllotment` VALUES ('rsehgal_paper_D_g_1.pdf','SLV','ref1',4,'More work needs to be done. Please resubmit it, otherwise it will be rejected'),('rsehgal_paper_D_g_1.pdf','RSE','ref2',6,'hMMMKM SEE due to non concrete result. Please resubmit it'),('rsehgal_paper_D_g_1.pdf','ASE','ref3',2,'Bad work REJECTED'),('rsehgal_paper_A_b_1.pdf','ASE','ref1',8,'Excellent job, go on doing like this'),('rsehgal_paper_A_b_1.pdf','BRB','ref2',5,'Great, one should work mire'),('rsehgal_paper_A_b_1.pdf','SLV','ref3',9,'Perfect work. Excellent JOB. ORAL'),('rsehgal_paper_D_g_1.pdf','SSE','ref4',0,''),('rsehgal_paper_A_b_1.pdf','SSE','ref4',1,'Dont understand what is he trying to do. REJECTED from my side'),('nwwton_paper_A_c_1.pdf','ASE','ref1',6,'Good Work, POSTER'),('','','',0,NULL),('nwwton_paper_A_c_1.pdf','SSE','ref2',8,'Excellent results, ORAL'),('nwwton_paper_A_c_1.pdf','ABE','ref3',0,NULL);
/*!40000 ALTER TABLE `refereeAllotment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refereeList`
--

DROP TABLE IF EXISTS `refereeList`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refereeList` (
  `uname` varchar(4) DEFAULT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `refereeEmail` varchar(255) DEFAULT NULL,
  `refereeName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refereeList`
--

LOCK TABLES `refereeList` WRITE;
/*!40000 ALTER TABLE `refereeList` DISABLE KEYS */;
INSERT INTO `refereeList` VALUES ('RSE','ramansehgal','sc.ramansehgal@gmail.com','Raman Sehgal'),('ASE','ayushsehgal','ayush.sehgal@gmail.com','Ayush Sehgal'),('SSE','shachisehgal','shachi.sehgal@gmail.com','Shachi Sehgal'),('SLV','admin@nasi2023','slv@nasi2023.in','Sunder Lal'),('BRB','admin@nasi2023','brb@nasi2023.in','Bunder Lal'),('ABE','admin@nasi2023','abe@nasi2023.in','Ander Lal');
/*!40000 ALTER TABLE `refereeList` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES ('admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `symposium`
--

DROP TABLE IF EXISTS `symposium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `symposium` (
  `uname` varchar(50) DEFAULT NULL,
  `volume` int DEFAULT NULL,
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
  `UploadLocation` varchar(254) DEFAULT NULL,
  `contrib_acc_date` date DEFAULT NULL,
  `certificate_issue_date` date DEFAULT NULL,
  `receipt_issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `symposium`
--

LOCK TABLES `symposium` WRITE;
/*!40000 ALTER TABLE `symposium` DISABLE KEYS */;
INSERT INTO `symposium` VALUES ('admin',1,'\'India Secure @75\'<br/>\r\n93<sup>rd</sup> Annual Session of National Academy of Sciences (NASI)<br/>\r\n<small class=\'text-light font-weight-bolder\'><u>An endeavour to celebrate and support \'Atma Nirbhar Bharat\'</u></small><br/>\r\n<h1><small class=\'text-danger font-weight-bolder\'>The National Academy of Sciences (NASI) & <br/> Bhabha Atomic Research Centre (BARC), Mumbai<br/>\r\nDAE Convention Centre, BARC, Mumbai<br/>\r\n3<sup>rd</sup>-5<sup>th</sup> December 2023</small></h1>','DAE Convention Center, Anushaktinagar','2023-12-03','2023-12-05','2023-10-01','2023-10-10','2023-09-01','2023-09-10','2023-09-01','2023-09-10','Mumbai','Maharashtra','India',NULL,'Uploads/','2023-11-05',NULL,NULL),('admin',67,'DAE Symposium on Nuclear Physics','IIT Indore','2023-12-09','2023-12-13','2023-06-30','2023-10-31','0202-06-30','2023-09-08','2023-06-30','2023-10-30','Indore','Madhya Pradesh','India','','Uploads/','2023-11-05','2023-12-14','2023-12-14');
/*!40000 ALTER TABLE `symposium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testuser`
--

DROP TABLE IF EXISTS `testuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testuser` (
  `id` int DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(244) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testuser`
--

LOCK TABLES `testuser` WRITE;
/*!40000 ALTER TABLE `testuser` DISABLE KEYS */;
INSERT INTO `testuser` VALUES (1,'Raman','Sehgal'),(2,'Ayush','Sehgal'),(2,'Shachi','Sehgal');
/*!40000 ALTER TABLE `testuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `uname` varchar(100) DEFAULT NULL,
  `Topic` varchar(255) DEFAULT NULL,
  `code` varchar(2) DEFAULT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES ('admin','Contributory Papers','C'),('admin','Invited Talk','I'),('admin','Thesis Presentation','T');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics_backup`
--

DROP TABLE IF EXISTS `topics_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics_backup` (
  `uname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `code` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics_backup`
--

LOCK TABLES `topics_backup` WRITE;
/*!40000 ALTER TABLE `topics_backup` DISABLE KEYS */;
INSERT INTO `topics_backup` VALUES ('admin','Physics','A'),('admin','Chemistry','B'),('admin','Mathematics','C'),('admin','Biology','D');
/*!40000 ALTER TABLE `topics_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_credentials`
--

DROP TABLE IF EXISTS `user_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_credentials` (
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_credentials`
--

LOCK TABLES `user_credentials` WRITE;
/*!40000 ALTER TABLE `user_credentials` DISABLE KEYS */;
INSERT INTO `user_credentials` VALUES ('ajayaksingh_au@yahoo','Singh@123456789','Ajaya Kumar','Singh','ajayaksingh_au@yahoo.co.in',NULL),('anandp5','science123','Anand ','Pathak','anandp5@yahoo.com',NULL),('Aravindan_Kavitha','aaron3407','Aravindan','V','aronearvind1994@gmail.com',NULL),('arijitsahahri','prathomalo1S$','ARIJIT','SAHA','arijit@iopb.res.in',NULL),('ashishrtanna','ART@80art','Ashish','Tanna','ashish.tanna@rku.ac.in','2023-06-19 11:57:09'),('ashiskrmanna','ashis1111','Ashis Kumar','Manna','ashiskrmanna@gmail.com','2023-06-20 10:43:04'),('athira7rythm@gmail.c','Athi7598','ATHIRA','A','athira7rythm@gmail.com',NULL),('gobinda','Jat735216!','Gobinda','Majumder','gobinda@tifr.res.in','2023-06-21 16:44:49'),('jmondal','jay2tanu377','JAYANTA','MONDAL','jmondal@barc.gov.in','2023-06-19 10:43:37'),('kumartvl88','Selva!1988','Selvakumar','S','kumartvl88@gmail.com','2023-06-16 22:21:35'),('Manju','Manju@1991','Manjunatha ','Mushtagatte','manjuna999@gmail.com',NULL),('mmdnaseer','flower99a','Mohamed Naseer Ali','Mohamed','mmdnaseer@gmail.com',NULL),('nifeeya','Nif123@@@','Nifeeya ','Singh','n_singh@ph.iitr.ac.in','2023-06-25 16:10:53'),('nwwton','maphy@2020','Madhukumar','R','nwwton@gmail.com',NULL),('pandeeswariprabhakar','Rpandeeswari@12345','Dr. Pandeeswari ','R','pandeeswari.r@srec.ac.in',NULL),('PCRout','PCRout~12345','Prakash Chandra ','Rout','pcrout2002@gmail.com',NULL),('Poonkodi ','Mscchemistry*1','Dr K','Poonkodi','poonks.che@gmail.com',NULL),('Rajib','sairambaba2','Rajib','Deb','drrajibdeb@gmail.com','2023-06-20 22:49:46'),('rasehgal','#Gudia123','Raman','Sehgal','rsehgal@barc.gov.in','2023-06-16 09:48:55'),('resanvs','Barc@2023','VELUSAMY','SUNDARESAN','vsundaresan@cimap.res.in','2023-06-19 13:15:59'),('rsehgal','ijklmnop','Raman','Sehgal','sc.ramansehgal@gmail.com','2023-06-15 17:32:38'),('santoshg@barc.gov.in','Sun2*ruma','Santosh K.','Gupta','santoshg@barc.gov.in',NULL),('sawaghuley','[Anandrao123','Sandeep','Waghuley','sandeepwaghuley@sgbau.ac.in','2023-06-18 08:05:30'),('snbramha','orissa','SATYANARAYAN','BRAMHA','snbramha@gmail.com',NULL),('tcsshetty@gmail.com','mymother','CHANDRA SHEKHARA','SHETTY T','tcsshetty@gmail.com',NULL);
/*!40000 ALTER TABLE `user_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`uname`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rsehgal','Hsuya^123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yourtasks`
--

DROP TABLE IF EXISTS `yourtasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yourtasks` (
  `taskname` varchar(150) DEFAULT NULL,
  `logintype` varchar(100) DEFAULT NULL,
  `function_name` varchar(150) DEFAULT NULL,
  `tasktype` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yourtasks`
--

LOCK TABLES `yourtasks` WRITE;
/*!40000 ALTER TABLE `yourtasks` DISABLE KEYS */;
INSERT INTO `yourtasks` VALUES ('Upload Contribution','Author','Upload_Contribution','Upload_Contribution'),('View Contribution','Author','View_Contribution','View_Contribution'),('Apply for Financial Support','Author','Finsup_Application','Finsup_Application'),('Allot Coordinator','Admin','Allot','AllotCoordinator'),('Allot Referee','Coordinator','Allot','AllotReferee'),('View Registration Details','Admin','RegistrationDetails','RegistrationDetails'),('View Papers','Admin','ViewPapers','ViewPapers'),('Download Acceptance Certificate','Author','DownloadAcceptanceCertificate','DownloadAcceptanceCertificate'),('Download Participation Certificate','Author','DownloadParticipationCertificate','DownloadParticipationCertificate'),('Download Registration Receipt','Author','DownloadRegistrationReceipt','DownloadRegistrationReceipt'),('Download Accommodation Receipt','Author','DownloadAccommodationReceipt','DownloadAccommodationReceipt');
/*!40000 ALTER TABLE `yourtasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-05 12:16:48
