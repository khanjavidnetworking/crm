-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 01:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(255) NOT NULL,
  `CN` varchar(20) NOT NULL,
  `CNO` int(255) NOT NULL,
  `AM` varchar(255) NOT NULL,
  `TL` varchar(255) NOT NULL,
  `Description` varchar(20) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `CN`, `CNO`, `AM`, `TL`, `Description`, `Date`) VALUES
(14, 'Princy', 12345678, 'Princy', '', 'today', '2006-05-25'),
(18, 'responsive industrie', 2147483647, 'zeeshan', '', 'phir se closed', '2006-05-25'),
(19, 'tbz the original 202', 12345678, 'zeeshan_N', '', 'closed_N', '2025-05-07'),
(20, 'Princy1', 123456780, 'Princyn', '', 'today', '2007-05-25'),
(26, 'sabyasachi ', 2147483647, 'zeeshan', '', 'closed', '2025-05-07'),
(27, 'javid', 1230981, 'Princynew', '', 'today25', '2025-05-07'),
(28, 'fizza', 1234567891, 'fizza', '', 'closed', '2025-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `prequest`
--

CREATE TABLE `prequest` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `wdd` varchar(255) DEFAULT NULL,
  `cms` varchar(255) DEFAULT NULL,
  `seo` varchar(255) DEFAULT NULL,
  `smo` varchar(255) DEFAULT NULL,
  `swd` varchar(255) DEFAULT NULL,
  `dwd` varchar(255) DEFAULT NULL,
  `fwd` varchar(255) DEFAULT NULL,
  `dr` varchar(255) DEFAULT NULL,
  `whs` varchar(255) DEFAULT NULL,
  `wm` varchar(255) DEFAULT NULL,
  `ed` varchar(255) DEFAULT NULL,
  `wta` varchar(255) DEFAULT NULL,
  `opi` varchar(255) DEFAULT NULL,
  `ld` varchar(255) DEFAULT NULL,
  `da` varchar(255) DEFAULT NULL,
  `osc` varchar(255) DEFAULT NULL,
  `nd` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `query` longtext DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `remark` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prequest`
--

INSERT INTO `prequest` (`id`, `name`, `email`, `contactno`, `company`, `wdd`, `cms`, `seo`, `smo`, `swd`, `dwd`, `fwd`, `dr`, `whs`, `wm`, `ed`, `wta`, `opi`, `ld`, `da`, `osc`, `nd`, `others`, `query`, `posting_date`, `remark`, `status`) VALUES
(1, 'Anuj Kumar', 'phpgurukulteam@gmail.com', '1234567890', 'Test', 'Website Design & Development', '', '', '', '', 'Dynamic Website Design', '', '', 'Web Hosting Services', '', 'Ecommerce Development', 'Walk Through Animation', '', '', '', '', '', '', 'This is for testing', '2021-04-22', 'This is for test', NULL),
(2, 'Vivek', 'itsupport@algoritham.in', '9372330282', 'Algoritham Infrastructure Pvt Ltd', '', '', '', '', '', '', '', '', '', 'Website Maintenance', '', '', '', '', '', '', '', '', 'Require Website Maintenance', '2025-01-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(11) DEFAULT NULL,
  `email_id` varchar(300) DEFAULT NULL,
  `subject` varchar(300) DEFAULT NULL,
  `task_type` varchar(300) DEFAULT NULL,
  `prioprity` varchar(300) DEFAULT NULL,
  `ticket` longtext DEFAULT NULL,
  `attachment` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `admin_remark` longtext DEFAULT NULL,
  `posting_date` date DEFAULT NULL,
  `admin_remark_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_id`, `email_id`, `subject`, `task_type`, `prioprity`, `ticket`, `attachment`, `status`, `admin_remark`, `posting_date`, `admin_remark_date`) VALUES
(12, '5', 'phpgurukulteam@gmail.com', 'Test Ticket', 'billing', 'important', 'This ticket for testing purpose.', '', 'closed', 'Ticket resolved.  Solution provided', '2021-04-22', '2021-04-21 18:30:00'),
(13, '6', 'itsupport3@algoritham.in', 'Server Issue', 'ot1', 'important', 'Server Issue', NULL, 'closed', 'Close', '2025-02-10', '2025-02-10 11:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alt_email`, `password`, `mobile`, `gender`, `address`, `status`, `posting_date`) VALUES
(1, 'Vivek', 'itsupport@algoritham.in', 'itsupport3@algoritham.in', 'Demo@123', '9372330282', 'm', 'Mira Road Mumbai', NULL, '2021-04-22 12:25:19'),
(2, 'website', 'itsupport3@algoritham.in', NULL, 'Aipl@2025#', '9372330200', 'm', NULL, NULL, '2025-02-10 11:13:30'),
(3, 'sanjay', 'itsupport2@algoritham.in', NULL, 'Aipl@2025#', '9833760978', 'm', NULL, NULL, '2025-05-03 09:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `usercheck`
--

CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `logindate` varchar(255) DEFAULT '',
  `logintime` varchar(255) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usercheck`
--

INSERT INTO `usercheck` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`, `city`, `country`) VALUES
(1, '2021/04/22', '05:59:18pm', 1, 'Anuj Kumar', 'phpgurukulteam@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(2, '2021/04/22', '10:00:15pm', 1, 'Anuj Kumar', 'phpgurukulteam@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(3, '2025/01/15', '05:28:09pm', 1, 'Anuj Kumar', 'phpgurukulteam@gmail.com', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(4, '2025/01/15', '05:36:12pm', 1, 'Vivek', 'itsupport@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(5, '2025/01/15', '07:00:21pm', 1, 'Vivek', 'itsupport@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(6, '2025/02/10', '04:43:55pm', 2, 'website', 'itsupport3@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(7, '2025/02/10', '04:45:12pm', 1, 'Vivek', 'itsupport@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(8, '2025/05/03', '03:22:01pm', 3, 'sanjay', 'itsupport2@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(9, '2025/05/03', '03:31:40pm', 3, 'sanjay', 'itsupport2@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(10, '2025/05/06', '03:49:31pm', 3, 'sanjay', 'itsupport2@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(11, '2025/05/07', '03:51:45pm', 3, 'sanjay', 'itsupport2@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', ''),
(12, '2025/05/07', '04:11:33pm', 3, 'sanjay', 'itsupport2@algoritham.in', 0x3a3a31, 0x30302d46462d37332d32342d43412d30, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prequest`
--
ALTER TABLE `prequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prequest`
--
ALTER TABLE `prequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
