-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 09:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intent_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `intente`
--

CREATE TABLE `intente` (
  `Id` int(11) NOT NULL,
  `Grade` varchar(50) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(250) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `gander` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `mId` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `massage` varchar(500) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sendto` varchar(50) DEFAULT NULL,
  `live` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`mId`, `userid`, `massage`, `Email`, `date`, `status`, `sendto`, `live`) VALUES
(2, 7, 'we current working on the project you gave as', 'kimainyi@gmail.com', '20/11/2019', 'cuser', 'message', 0),
(3, 1, '    okay', 'vava123@gmail.com', '2019-11-21T17:02:00+01:00', 'admin', 'massage', 0),
(5, 7, ' we the current  project you gave a was done ', 'kimainyi@gmail.com', '2019-11-22T17:02:00+01:00', 'cuser', 'message', 0),
(6, 7, '  gave a was done ', 'kimainyi@gmail.com', '2019-11-22T17:02:00+01:00', 'cuser', 'message', 0),
(7, 7, '  gave a was done ', 'kimainyi@gmail.com', '2019-11-22T17:02:00+01:00', 'cuser', 'message', 0),
(8, 7, '  gave a was done ', 'kimainyi@gmail.com', '2019-11-22T17:02:00+01:00', 'cuser', 'message', 0),
(9, 1, '    ok i will reach there in 5 minuts', 'vava123@gmail.com', '2019-11-22T18:33:53+01:00', 'admin', 'massage', 0),
(10, 7, '    let me know when you need me', NULL, '2019-11-22T19:16:23+01:00', 'cuser', 'massage', 1),
(11, 7, '    i need that project', NULL, '2019-11-22T19:20:14+01:00', 'cuser', 'massage', 1),
(12, 7, '    i need that project', 'mar@gmail.com', '2019-11-22T19:25:35+01:00', 'cuser', 'massage', 1),
(13, 1, '    is every thing okay', NULL, '2019-11-22T19:27:41+01:00', 'admin', 'massage', 1),
(14, 1, '    is every thing okay', 'mut@gmail.com', '2019-11-22T19:28:25+01:00', 'admin', 'massage', 1),
(15, 1, '    am on my way', 'vava123@gmail.com', '2019-11-22T19:31:59+01:00', 'admin', 'massage', 0),
(16, 7, '    okay', 'kimainyi@gmail.com', '2019-11-22T19:33:40+01:00', 'cuser', 'massage', 0),
(17, 7, '    hello\r\n', 'vava123@gmail.com', '2019-11-22T19:38:31+01:00', 'cuser', 'massage', 1),
(18, 7, '   so intente didnt submit', 'kimainyi@gmail.com', '2019-11-22T20:54:50+01:00', 'cuser', 'massage', 1),
(19, 7, '   so intente didnt submit', 'kimainyi@gmail.com', '2019-11-22T20:57:53+01:00', 'cuser', 'massage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reg` varchar(11) DEFAULT '0',
  `gander` varchar(50) NOT NULL,
  `intid` varchar(50) DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `Email`, `password`, `status`, `reg`, `gander`, `intid`) VALUES
(1, 'Kimenyi', 'Aimable', 'kimainyi@gmail.com', 'admin', 'admin', '1', 'male', 'master'),
(4, 'antoin', 'jean chrisostom', 'mar@gmail.com', '852963', 'intente', '1', 'MALE', 'none'),
(6, 'michael', 'jean', 'micahel@gmain.com', '741258963', 'cuser', '1', 'MALE', 'none'),
(7, 'vava', 'fent', 'vava123@gmail.com', '123456', 'cuser', '1', 'FEMALE', 'cuser'),
(8, 'mutuen', 'jean chrisostom', 'mut@gmail.com', '123456', 'cuser', '1', 'MALE', 'cuser'),
(9, 'mutuen', 'jean chrisostom', 'mut@gmail.com', '123456', 'cuser', '1', 'MALE', 'none'),
(10, 'mutuen2', 'jean chrisostom', 'mutp@gmail.com', '741258963', 'cuser', '1', 'MALE', 'cuser'),
(11, 'sezerano', ' l_m', 'khalidfent123@gmail.com', '123654', 'intente', '1', 'MALE', 'intente'),
(12, 'john', ' l_m', 'fentking@gmail.com', '123456', 'intente', '1', 'MALE', 'intente'),
(13, 'sezerano', 'jean chrisostom', 'chris@gmail.com', '123456', 'intente', '1', 'MALE', ''),
(14, 'immacule', 'turabayo', 'imma@gmail.com', '123456', 'intente', '1', 'FEMALE', ''),
(15, 'mukama', 'dereck', 'dereck@gmail.com', '123456', 'intente', '0', 'MALE', ''),
(16, 'jean', 'marie', 'lolo@gmail.com', '123456', 'intente', '0', 'MALE', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_done`
--

CREATE TABLE `work_done` (
  `tId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `documantation` varchar(500) NOT NULL,
  `live` int(11) DEFAULT '1',
  `task` varchar(220) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_done`
--

INSERT INTO `work_done` (`tId`, `userId`, `documantation`, `live`, `task`, `date`) VALUES
(1, 13, 'we made a site for work company but was not ', 1, 'update and delete for reported work', NULL),
(2, 13, 'today was last day of the program', 1, 'chacking for errors', '2019-11-21T11:05:49+01:00'),
(3, 13, 'we cuaksdjfaisdhfalkdsnf;oishefmn', 1, 'update ', '2019-11-21T13:06:05+01:00'),
(4, 7, 'cuaksdjfaisdhfalkdsnf;oishefmn', 1, 'socket connecting', '12/7/2019'),
(5, 7, 'we finished the work ', 1, 'to allow user share idea and notify each each other ', '2019-11-22T20:53:34+01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intente`
--
ALTER TABLE `intente`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`mId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `work_done`
--
ALTER TABLE `work_done`
  ADD PRIMARY KEY (`tId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `intente`
--
ALTER TABLE `intente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `work_done`
--
ALTER TABLE `work_done`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `work_done`
--
ALTER TABLE `work_done`
  ADD CONSTRAINT `work_done_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
