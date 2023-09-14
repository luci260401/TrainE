-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 10:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `activityrecord`
--

CREATE TABLE `activityrecord` (
  `ID` int(11) NOT NULL,
  `ACTIVITYID` int(11) NOT NULL,
  `ACTIVITYTYPE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activityrecord`
--

INSERT INTO `activityrecord` (`ID`, `ACTIVITYID`, `ACTIVITYTYPE`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 3),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `activitytypetable`
--

CREATE TABLE `activitytypetable` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitytypetable`
--

INSERT INTO `activitytypetable` (`ID`, `TYPE`) VALUES
(1, 'PI'),
(2, 'TPS'),
(3, 'THEORY_PAPER');

-- --------------------------------------------------------

--
-- Table structure for table `chatrecord`
--

CREATE TABLE `chatrecord` (
  `ID` int(11) NOT NULL,
  `FROMUSER` varchar(70) NOT NULL,
  `TOUSER` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatrecord`
--

INSERT INTO `chatrecord` (`ID`, `FROMUSER`, `TOUSER`) VALUES
(1, 'Kashyap', 'Test'),
(2, 'Test', 'Kashyap'),
(3, 'Kashyap', 'ihduh'),
(4, 'Kashyap', 'kjskjncjnc');

-- --------------------------------------------------------

--
-- Table structure for table `collegetable`
--

CREATE TABLE `collegetable` (
  `ID` int(11) NOT NULL,
  `COLLEGENAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collegetable`
--

INSERT INTO `collegetable` (`ID`, `COLLEGENAME`) VALUES
(1, 'K.J.SOMAIYA POLYTECHNIC'),
(2, 'VIVEKANAND POLYTECHNIC');

-- --------------------------------------------------------

--
-- Table structure for table `coursewiseco`
--

CREATE TABLE `coursewiseco` (
  `ID` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `CO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursewiseco`
--

INSERT INTO `coursewiseco` (`ID`, `COURSE`, `CO`) VALUES
(1, 1, 'CO1'),
(2, 1, 'CO2'),
(3, 2, 'CO1'),
(4, 2, 'CO2'),
(5, 2, 'CO3');

-- --------------------------------------------------------

--
-- Table structure for table `coursewisemarks`
--

CREATE TABLE `coursewisemarks` (
  `ID` int(11) NOT NULL,
  `ENROLLNO` int(11) NOT NULL,
  `SEMISTER` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `ASSIGN1` int(11) NOT NULL,
  `ASSIGN2` int(11) NOT NULL,
  `TEST` int(11) NOT NULL,
  `AVERAGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursewisetopic`
--

CREATE TABLE `coursewisetopic` (
  `ID` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `TOPIC` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursewisetopic`
--

INSERT INTO `coursewisetopic` (`ID`, `COURSE`, `TOPIC`) VALUES
(1, 1, 'MATRICES'),
(2, 2, 'VELOCITY');

-- --------------------------------------------------------

--
-- Table structure for table `disagreementrecord`
--

CREATE TABLE `disagreementrecord` (
  `ID` int(11) NOT NULL,
  `TOCHAT` int(11) NOT NULL,
  `FROMCHAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domainsemcourse`
--

CREATE TABLE `domainsemcourse` (
  `ID` int(11) NOT NULL,
  `DOMAINID` int(11) NOT NULL,
  `SEMID` int(11) NOT NULL,
  `COURSE` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domainsemcourse`
--

INSERT INTO `domainsemcourse` (`ID`, `DOMAINID`, `SEMID`, `COURSE`) VALUES
(1, 1, 1, 'MATHS-1'),
(2, 1, 1, 'PHYSICS');

-- --------------------------------------------------------

--
-- Table structure for table `domaintable`
--

CREATE TABLE `domaintable` (
  `ID` int(11) NOT NULL,
  `DOMAIN` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domaintable`
--

INSERT INTO `domaintable` (`ID`, `DOMAIN`) VALUES
(1, 'COMPUTER ENGINEERING'),
(2, 'MECHANICAL ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `domainwisecourse`
--

CREATE TABLE `domainwisecourse` (
  `ID` int(11) NOT NULL,
  `DOMAIN` varchar(100) NOT NULL,
  `COURSE` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domainwisecourse`
--

INSERT INTO `domainwisecourse` (`ID`, `DOMAIN`, `COURSE`) VALUES
(1, 'COMPUTER ENGINEERING', 'COURSE1'),
(2, 'COMPUTER ENGINEERING', 'COURSE2'),
(3, 'COMPUTER ENGINEERING', 'COURSE3'),
(4, 'COMPUTER ENGINEERING', 'COURSE4'),
(5, 'MECHANICAL ENGINEERING', 'COURSE11'),
(6, 'MECHANICAL ENGINEERING', 'COURSE12'),
(7, 'MECHANICAL ENGINEERING', 'COURSE13');

-- --------------------------------------------------------

--
-- Table structure for table `experiencetable`
--

CREATE TABLE `experiencetable` (
  `ID` int(11) NOT NULL,
  `EXPERIENCE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiencetable`
--

INSERT INTO `experiencetable` (`ID`, `EXPERIENCE`) VALUES
(1, '0-2'),
(2, '2-4'),
(3, '4-6'),
(4, '6-8'),
(5, '8-10'),
(6, '10-15'),
(7, '15-20'),
(8, '>20');

-- --------------------------------------------------------

--
-- Table structure for table `gendertable`
--

CREATE TABLE `gendertable` (
  `ID` int(11) NOT NULL,
  `GENDER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gendertable`
--

INSERT INTO `gendertable` (`ID`, `GENDER`) VALUES
(1, 'MALE'),
(2, 'FEMALE'),
(3, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `givenreviews`
--

CREATE TABLE `givenreviews` (
  `ID` int(11) NOT NULL,
  `DOMAIN` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `TOPIC` int(11) NOT NULL,
  `GIVENBY` varchar(60) NOT NULL,
  `GIVENTO` varchar(60) NOT NULL,
  `ACTIVITY_TYPE` varchar(60) NOT NULL,
  `ACTIVITYID` int(11) NOT NULL,
  `RATING` int(11) NOT NULL,
  `SCORE` double NOT NULL,
  `STATUS` varchar(50) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `givenreviews`
--

INSERT INTO `givenreviews` (`ID`, `DOMAIN`, `COURSE`, `TOPIC`, `GIVENBY`, `GIVENTO`, `ACTIVITY_TYPE`, `ACTIVITYID`, `RATING`, `SCORE`, `STATUS`) VALUES
(1, 1, 2, 2, 'Test', 'Kashyap', 'PI', 2, 3, 0, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `listofstudents`
--

CREATE TABLE `listofstudents` (
  `ID` int(11) NOT NULL,
  `ENROLLNO` varchar(60) NOT NULL,
  `FIRSTNAME` varchar(70) NOT NULL,
  `MIDDLENAME` varchar(70) NOT NULL,
  `LASTNAME` varchar(70) NOT NULL,
  `DEPARTMENT` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SEMISTER` int(11) NOT NULL,
  `NUMBEROFKT` int(11) NOT NULL,
  `AVERAGEOFCODED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `piactivity`
--

CREATE TABLE `piactivity` (
  `ID` int(11) NOT NULL,
  `NAME_OF_PROFESSOR` varchar(70) NOT NULL,
  `DOMAIN` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `TOPIC` int(11) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'PI',
  `CONCEPTBEINGADDRESSED` varchar(120) NOT NULL,
  `CONCEPTQUESTION` varchar(120) NOT NULL,
  `CORRECTANSWER` varchar(120) NOT NULL,
  `PLAUSIBLEDISTRACTORS` varchar(120) NOT NULL,
  `RATING` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piactivity`
--

INSERT INTO `piactivity` (`ID`, `NAME_OF_PROFESSOR`, `DOMAIN`, `COURSE`, `TOPIC`, `TYPE`, `CONCEPTBEINGADDRESSED`, `CONCEPTQUESTION`, `CORRECTANSWER`, `PLAUSIBLEDISTRACTORS`, `RATING`) VALUES
(1, 'Test', 1, 1, 1, 'PI', 'abd', 'why?', 'this is why', 'so this is', 0),
(2, 'Kashyap', 1, 2, 2, 'PI', 'Displacement', 'what is displacement?', 'The shortest distance between 2 end points is known as displacement', 'distance between 2 end points which is shortest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ratingrecord`
--

CREATE TABLE `ratingrecord` (
  `ID` int(11) NOT NULL,
  `ACTIVITYID` int(11) NOT NULL,
  `ACTIVITY_TYPE` int(11) NOT NULL,
  `SCORE` int(11) NOT NULL,
  `NOOFRATERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingrecord`
--

INSERT INTO `ratingrecord` (`ID`, `ACTIVITYID`, `ACTIVITY_TYPE`, `SCORE`, `NOOFRATERS`) VALUES
(1, 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receivedreviews`
--

CREATE TABLE `receivedreviews` (
  `ID` int(11) NOT NULL,
  `GIVENBY` varchar(60) NOT NULL,
  `DOMAIN` varchar(60) NOT NULL,
  `COURSE` varchar(60) NOT NULL,
  `ACTIVITYTYPE` varchar(30) NOT NULL,
  `ACTIVITYID` int(11) NOT NULL,
  `RATING` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semister`
--

CREATE TABLE `semister` (
  `ID` int(11) NOT NULL,
  `SEM` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semister`
--

INSERT INTO `semister` (`ID`, `SEM`) VALUES
(1, 'FIRST'),
(2, 'SECOND'),
(3, 'THIRD'),
(4, 'FOURTH'),
(5, 'FIFTH'),
(6, 'SIXTH');

-- --------------------------------------------------------

--
-- Table structure for table `semwisecourse`
--

CREATE TABLE `semwisecourse` (
  `ID` int(11) NOT NULL,
  `SEMISTER` int(11) NOT NULL,
  `COURSE` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sentmessage`
--

CREATE TABLE `sentmessage` (
  `ID` int(11) NOT NULL,
  `FROMUSER` varchar(70) NOT NULL,
  `TOUSER` varchar(70) NOT NULL,
  `MESSAGE` varchar(100) NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statetable`
--

CREATE TABLE `statetable` (
  `ID` int(11) NOT NULL,
  `STATE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statetable`
--

INSERT INTO `statetable` (`ID`, `STATE`) VALUES
(1, 'MAHARASHTRA'),
(2, 'GUJARAT');

-- --------------------------------------------------------

--
-- Table structure for table `statewisecity`
--

CREATE TABLE `statewisecity` (
  `ID` int(11) NOT NULL,
  `STATE` int(11) NOT NULL,
  `CITY` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statewisecity`
--

INSERT INTO `statewisecity` (`ID`, `STATE`, `CITY`) VALUES
(1, 1, 'MUMBAI'),
(2, 1, 'PUNE'),
(3, 2, 'AHEMDABAD'),
(4, 2, 'VADODRA');

-- --------------------------------------------------------

--
-- Table structure for table `theorypaper`
--

CREATE TABLE `theorypaper` (
  `ID` int(11) NOT NULL,
  `NAME_OF_PROFESSOR` varchar(60) NOT NULL,
  `DOMAIN` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'THEORY_PAPER',
  `NOOFQUEST` int(11) NOT NULL,
  `RATING` int(11) NOT NULL,
  `NOOFRATERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theorypaper`
--

INSERT INTO `theorypaper` (`ID`, `NAME_OF_PROFESSOR`, `DOMAIN`, `COURSE`, `TYPE`, `NOOFQUEST`, `RATING`, `NOOFRATERS`) VALUES
(1, 'test', 1, 1, 'THEORY_PAPER', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theoryquest`
--

CREATE TABLE `theoryquest` (
  `ID` int(11) NOT NULL,
  `PAPERID` int(11) NOT NULL,
  `QUESTS` varchar(80) NOT NULL,
  `ANS` varchar(100) NOT NULL,
  `MARKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theoryquest`
--

INSERT INTO `theoryquest` (`ID`, `PAPERID`, `QUESTS`, `ANS`, `MARKS`) VALUES
(1, 1, 'wdjnajdn', 'asjn', 10),
(2, 1, 'qndand', 'aksjdn', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tpsactivity`
--

CREATE TABLE `tpsactivity` (
  `ID` int(11) NOT NULL,
  `NAME_OF_PROFESSOR` varchar(70) NOT NULL,
  `DOMAIN` varchar(70) NOT NULL,
  `COURSE` varchar(70) NOT NULL,
  `TOPIC` varchar(70) NOT NULL,
  `TYPE` varchar(20) NOT NULL DEFAULT 'TPS',
  `THINKTIME` int(11) NOT NULL,
  `THINKQUEST` varchar(80) NOT NULL,
  `THINKANS` varchar(80) NOT NULL,
  `PAIRTIME` int(11) NOT NULL,
  `PAIRQUEST` varchar(80) NOT NULL,
  `PAIRANS` varchar(80) NOT NULL,
  `SHARETIME` int(11) NOT NULL,
  `SHAREQUEST` varchar(80) NOT NULL,
  `SHAREANS` varchar(80) NOT NULL,
  `RATING` int(11) NOT NULL,
  `NOOFRATERS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tpsactivity`
--

INSERT INTO `tpsactivity` (`ID`, `NAME_OF_PROFESSOR`, `DOMAIN`, `COURSE`, `TOPIC`, `TYPE`, `THINKTIME`, `THINKQUEST`, `THINKANS`, `PAIRTIME`, `PAIRQUEST`, `PAIRANS`, `SHARETIME`, `SHAREQUEST`, `SHAREANS`, `RATING`, `NOOFRATERS`) VALUES
(1, 'test', '1', '1', 'MATRICES', 'TPS', 5, 'jkdbckj', 'lnekjf', 6, 'oinfclk', 'skjdnc', 7, 'lesnfl', 'kjsjdbc', 0, 0),
(2, 'Kashyap', '1', '2', 'VELOCITY', 'TPS', 5, 'njknsnndsc', 'kancjksdncjknc', 6, 'jkajnkjnjn', 'nsckjnscn', 7, 'anskjnasnc', 'nakjsnknc', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(80) NOT NULL,
  `MIDDLE_NAME` varchar(80) NOT NULL,
  `LAST_NAME` varchar(80) NOT NULL,
  `GENDER` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(90) NOT NULL,
  `STATE` int(11) NOT NULL,
  `CITY` int(11) NOT NULL,
  `DOMAIN` int(11) NOT NULL,
  `COURSES_TAUGHT` int(11) NOT NULL,
  `COLLEGEOFTEACHING` int(11) NOT NULL,
  `EXPERIENCE` int(11) NOT NULL,
  `CONTACT` bigint(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`ID`, `FIRST_NAME`, `MIDDLE_NAME`, `LAST_NAME`, `GENDER`, `USERNAME`, `PASSWORD`, `STATE`, `CITY`, `DOMAIN`, `COURSES_TAUGHT`, `COLLEGEOFTEACHING`, `EXPERIENCE`, `CONTACT`, `EMAIL`) VALUES
(1, 'Test', '', '', 1, 'test', 'test123', 1, 1, 1, 1, 1, 3, 9511295112, 'test@gmail.com'),
(2, 'Kashyap', 'Anand', 'Kotak', 1, 'kk0312', 'kk@123', 1, 1, 1, 2, 1, 2, 9820098200, 'kashyap@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activityrecord`
--
ALTER TABLE `activityrecord`
  ADD PRIMARY KEY (`ACTIVITYID`,`ACTIVITYTYPE`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ACTIVITYTYPE` (`ACTIVITYTYPE`);

--
-- Indexes for table `activitytypetable`
--
ALTER TABLE `activitytypetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `collegetable`
--
ALTER TABLE `collegetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coursewiseco`
--
ALTER TABLE `coursewiseco`
  ADD KEY `COURSE` (`COURSE`);

--
-- Indexes for table `coursewisemarks`
--
ALTER TABLE `coursewisemarks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COURSE` (`COURSE`),
  ADD KEY `ENROLLNO` (`ENROLLNO`),
  ADD KEY `SEMISTER` (`SEMISTER`);

--
-- Indexes for table `coursewisetopic`
--
ALTER TABLE `coursewisetopic`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `COURSE` (`COURSE`);

--
-- Indexes for table `disagreementrecord`
--
ALTER TABLE `disagreementrecord`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TOCHAT` (`TOCHAT`),
  ADD KEY `FROMCHAT` (`FROMCHAT`);

--
-- Indexes for table `domainsemcourse`
--
ALTER TABLE `domainsemcourse`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DOMAINID` (`DOMAINID`),
  ADD KEY `SEMID` (`SEMID`);

--
-- Indexes for table `domaintable`
--
ALTER TABLE `domaintable`
  ADD PRIMARY KEY (`ID`,`DOMAIN`);

--
-- Indexes for table `experiencetable`
--
ALTER TABLE `experiencetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gendertable`
--
ALTER TABLE `gendertable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `givenreviews`
--
ALTER TABLE `givenreviews`
  ADD KEY `DOMAIN` (`DOMAIN`),
  ADD KEY `COURSE` (`COURSE`),
  ADD KEY `TOPIC` (`TOPIC`);

--
-- Indexes for table `listofstudents`
--
ALTER TABLE `listofstudents`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DEPARTMENT` (`DEPARTMENT`),
  ADD KEY `SEMISTER` (`SEMISTER`);

--
-- Indexes for table `piactivity`
--
ALTER TABLE `piactivity`
  ADD KEY `DOMAIN` (`DOMAIN`),
  ADD KEY `COURSE` (`COURSE`),
  ADD KEY `TOPIC` (`TOPIC`);

--
-- Indexes for table `ratingrecord`
--
ALTER TABLE `ratingrecord`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ACTIVITY_TYPE` (`ACTIVITY_TYPE`);

--
-- Indexes for table `semister`
--
ALTER TABLE `semister`
  ADD PRIMARY KEY (`ID`,`SEM`);

--
-- Indexes for table `statetable`
--
ALTER TABLE `statetable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `statewisecity`
--
ALTER TABLE `statewisecity`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `STATE` (`STATE`);

--
-- Indexes for table `theorypaper`
--
ALTER TABLE `theorypaper`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DOMAIN` (`DOMAIN`),
  ADD KEY `COURSE` (`COURSE`);

--
-- Indexes for table `theoryquest`
--
ALTER TABLE `theoryquest`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PAPERID` (`PAPERID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DOMAIN` (`DOMAIN`),
  ADD KEY `COLLEGEOFTEACHING` (`COLLEGEOFTEACHING`),
  ADD KEY `COURSES_TAUGHT` (`COURSES_TAUGHT`),
  ADD KEY `EXPERIENCE` (`EXPERIENCE`),
  ADD KEY `GENDER` (`GENDER`),
  ADD KEY `STATE` (`STATE`),
  ADD KEY `CITY` (`CITY`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activityrecord`
--
ALTER TABLE `activityrecord`
  ADD CONSTRAINT `activityrecord_ibfk_1` FOREIGN KEY (`ACTIVITYTYPE`) REFERENCES `activitytypetable` (`ID`);

--
-- Constraints for table `coursewiseco`
--
ALTER TABLE `coursewiseco`
  ADD CONSTRAINT `coursewiseco_ibfk_1` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`);

--
-- Constraints for table `coursewisemarks`
--
ALTER TABLE `coursewisemarks`
  ADD CONSTRAINT `coursewisemarks_ibfk_1` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`),
  ADD CONSTRAINT `coursewisemarks_ibfk_2` FOREIGN KEY (`ENROLLNO`) REFERENCES `listofstudents` (`ID`),
  ADD CONSTRAINT `coursewisemarks_ibfk_3` FOREIGN KEY (`SEMISTER`) REFERENCES `semister` (`ID`);

--
-- Constraints for table `coursewisetopic`
--
ALTER TABLE `coursewisetopic`
  ADD CONSTRAINT `coursewisetopic_ibfk_1` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`);

--
-- Constraints for table `disagreementrecord`
--
ALTER TABLE `disagreementrecord`
  ADD CONSTRAINT `disagreementrecord_ibfk_1` FOREIGN KEY (`TOCHAT`) REFERENCES `userdetails` (`ID`),
  ADD CONSTRAINT `disagreementrecord_ibfk_2` FOREIGN KEY (`FROMCHAT`) REFERENCES `userdetails` (`ID`);

--
-- Constraints for table `domainsemcourse`
--
ALTER TABLE `domainsemcourse`
  ADD CONSTRAINT `domainsemcourse_ibfk_1` FOREIGN KEY (`DOMAINID`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `domainsemcourse_ibfk_2` FOREIGN KEY (`SEMID`) REFERENCES `semister` (`ID`);

--
-- Constraints for table `givenreviews`
--
ALTER TABLE `givenreviews`
  ADD CONSTRAINT `givenreviews_ibfk_1` FOREIGN KEY (`DOMAIN`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `givenreviews_ibfk_2` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`),
  ADD CONSTRAINT `givenreviews_ibfk_3` FOREIGN KEY (`TOPIC`) REFERENCES `coursewisetopic` (`ID`);

--
-- Constraints for table `listofstudents`
--
ALTER TABLE `listofstudents`
  ADD CONSTRAINT `listofstudents_ibfk_1` FOREIGN KEY (`DEPARTMENT`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `listofstudents_ibfk_2` FOREIGN KEY (`SEMISTER`) REFERENCES `semister` (`ID`);

--
-- Constraints for table `piactivity`
--
ALTER TABLE `piactivity`
  ADD CONSTRAINT `piactivity_ibfk_1` FOREIGN KEY (`DOMAIN`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `piactivity_ibfk_2` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`),
  ADD CONSTRAINT `piactivity_ibfk_3` FOREIGN KEY (`TOPIC`) REFERENCES `coursewisetopic` (`ID`);

--
-- Constraints for table `ratingrecord`
--
ALTER TABLE `ratingrecord`
  ADD CONSTRAINT `ratingrecord_ibfk_1` FOREIGN KEY (`ACTIVITY_TYPE`) REFERENCES `activitytypetable` (`ID`);

--
-- Constraints for table `statewisecity`
--
ALTER TABLE `statewisecity`
  ADD CONSTRAINT `statewisecity_ibfk_1` FOREIGN KEY (`STATE`) REFERENCES `statetable` (`ID`);

--
-- Constraints for table `theorypaper`
--
ALTER TABLE `theorypaper`
  ADD CONSTRAINT `theorypaper_ibfk_1` FOREIGN KEY (`DOMAIN`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `theorypaper_ibfk_2` FOREIGN KEY (`COURSE`) REFERENCES `domainsemcourse` (`ID`);

--
-- Constraints for table `theoryquest`
--
ALTER TABLE `theoryquest`
  ADD CONSTRAINT `theoryquest_ibfk_1` FOREIGN KEY (`PAPERID`) REFERENCES `theorypaper` (`ID`),
  ADD CONSTRAINT `theoryquest_ibfk_2` FOREIGN KEY (`PAPERID`) REFERENCES `theorypaper` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_ibfk_1` FOREIGN KEY (`DOMAIN`) REFERENCES `domaintable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_2` FOREIGN KEY (`COLLEGEOFTEACHING`) REFERENCES `collegetable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_3` FOREIGN KEY (`COURSES_TAUGHT`) REFERENCES `domainsemcourse` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_4` FOREIGN KEY (`EXPERIENCE`) REFERENCES `experiencetable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_5` FOREIGN KEY (`GENDER`) REFERENCES `gendertable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_6` FOREIGN KEY (`GENDER`) REFERENCES `gendertable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_7` FOREIGN KEY (`STATE`) REFERENCES `statetable` (`ID`),
  ADD CONSTRAINT `userdetails_ibfk_8` FOREIGN KEY (`CITY`) REFERENCES `statewisecity` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
