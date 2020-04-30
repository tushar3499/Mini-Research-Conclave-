-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 01:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_conclave`
--

-- --------------------------------------------------------

--
-- Table structure for table `abstract`
--

CREATE TABLE `abstract` (
  `Id` int(11) NOT NULL,
  `UploadedItem` varchar(400) NOT NULL,
  `Username` varchar(400) NOT NULL,
  `Title` varchar(400) NOT NULL,
  `Email` varchar(400) NOT NULL,
  `IsApproved` int(1) NOT NULL,
  `PresType` varchar(400) NOT NULL,
  `Reviewer1` varchar(400) NOT NULL,
  `Reviewer2` varchar(400) NOT NULL,
  `Grade1` int(255) NOT NULL,
  `Grade2` int(255) NOT NULL,
  `Fullname` varchar(400) NOT NULL,
  `IsDone` int(11) NOT NULL DEFAULT '0',
  `IsGraded1` int(11) NOT NULL,
  `IsGraded2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abstract`
--

INSERT INTO `abstract` (`Id`, `UploadedItem`, `Username`, `Title`, `Email`, `IsApproved`, `PresType`, `Reviewer1`, `Reviewer2`, `Grade1`, `Grade2`, `Fullname`, `IsDone`, `IsGraded1`, `IsGraded2`) VALUES
(8, 'Oral1.pdf', 'test1', 'Election System', 'chan12@gmail.com', 1, 'Oral', 'svr', 'sbh', 2, 5, 'Chandan', 1, 1, 1),
(9, 'Oral2.pdf', 'User1', 'User1Oral', '123', 1, 'Oral', 'sbh', 'chandan', 9, 4, 'User1', 1, 1, 1),
(10, 'Poster1.pdf', 'User1', 'Election System', '123', 1, 'Poster', 'yash', 'cooldg', 6, 1, 'User1', 1, 1, 1),
(11, 'Oral3.pdf', 'User2', 'User2Oal', '123', 1, 'Oral', 'sbh', 'chandan', 8, 7, 'User2', 1, 1, 1),
(12, 'Poster2.pdf', 'User2', 'user2Poster', '1234', 1, 'Poster', 'test3', 'test4', 0, 0, 'User2', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `StartDate` varchar(400) NOT NULL,
  `EndDate` varchar(400) NOT NULL,
  `ReviewDate` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`StartDate`, `EndDate`, `ReviewDate`) VALUES
('1-4-2019 12:00:00', '2-5-2019 12:00:00', '3-4-2019 12:00:00'),
('1-4-2019 12:00:00', '2-5-2019 12:00:00', '3-4-2019 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `Id` int(11) NOT NULL,
  `Title` varchar(400) NOT NULL,
  `NoticeBody` varchar(400) NOT NULL,
  `AddDate` varchar(400) NOT NULL,
  `Tag` varchar(400) NOT NULL,
  `Author` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`Id`, `Title`, `NoticeBody`, `AddDate`, `Tag`, `Author`) VALUES
(1, 'Holiday', 'For avengers Endgame', '30-04-2019 14:22:46', 'Deadlines', 'sourabh'),
(2, 'deadline', '1234', '01-05-2019 05:24:05', 'Deadlines', 'tushar'),
(3, 'ABC', '1234', '01-05-2019 05:24:19', 'Others', 'tushar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(400) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `Designation` varchar(400) NOT NULL,
  `Fullname` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Designation`, `Fullname`) VALUES
('sourabh', '1234', 'FacConvener', 'Sourabh Jangid'),
('tushar', '1234', 'StudConvener', 'Tushar Bhutada'),
('test1', '1234', 'Participant', ''),
('svr', '1234', 'OralReviewer', 'SV Rao'),
('chandan', '1234', 'OralReviewer', 'Chandan'),
('suppi', '1234', 'OralReviewer', 'supragya'),
('sbh', '1234', 'OralReviewer', 'Samit Bhattacharya'),
('Hursh', '1234', 'PosterReviewer', 'Hursh'),
('yash', '1234', 'PosterReviewer', 'yashraj'),
('Chamba', '1234', 'PosterReviewer', 'Abhinav'),
('Kothari', '1234', 'PosterReviewer', 'Chinmay'),
('cooldg', '1234', 'PosterReviewer', 'Diganta Goswami'),
('test2', '1234', 'PosterReviewer', 'test2'),
('test3', '1234', 'PosterReviewer', 'test3'),
('test4', '1234', 'PosterReviewer', 'test4'),
('User1', '1234', 'Participant', ''),
('User2', '1234', 'Participant', ''),
('User3', '1234', 'Participant', ''),
('User4', '1234', 'Participant', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstract`
--
ALTER TABLE `abstract`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abstract`
--
ALTER TABLE `abstract`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
