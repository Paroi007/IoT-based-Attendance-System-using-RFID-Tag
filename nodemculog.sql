SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodemculog`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(6) UNSIGNED NOT NULL,
  `CardNumber` double DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `SerialNumber` double NOT NULL,
  `DateLog` date DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `UserStat` varchar(100) NOT NULL,
  `building_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `CardNumber`, `Name`, `SerialNumber`, `DateLog`, `TimeIn`, `TimeOut`, `UserStat`, `building_number`) VALUES
(8, 24732247227, 'Shovon', 1, '2019-12-04', '02:39:50', '02:39:57', 'Arrived late and Left on time', 0),
(9, 183197126228, 'Sumona', 3, '2019-12-05', '00:38:19', '00:38:42', 'Arrived and Left on time', 0),
(10, 24732247227, 'Shovon', 1, '2019-12-05', '00:39:16', '00:39:20', 'Arrived and Left on time', 0),
(14, 4313412433, 'Shovon', 3, '2019-12-08', '22:49:56', '22:50:49', 'Arrived late and Left early', 0),
(15, 183197126228, 'Utshab', 1, '2019-12-08', '22:50:10', '22:50:44', 'Arrived late and Left early', 0),
(16, 24732247227, 'Sumona', 2, '2019-12-08', '22:50:18', '22:50:36', 'Arrived late and Left early', 0),
(26, 183197126228, 'Utshab', 1, '2019-12-09', '13:36:14', '13:36:40', 'Arrived late and Left on time', 0),
(27, 4313412433, 'Shovon', 3, '2019-12-09', '13:38:03', '13:38:12', 'Arrived late and Left early', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `SerialNumber` double NOT NULL,
  `gender` varchar(100) NOT NULL,
  `CardID` double NOT NULL,
  `CardID_select` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `SerialNumber`, `gender`, `CardID`, `CardID_select`) VALUES
(14, 'Utshab', 1, 'Male', 183197126228, 0),
(15, 'Sumona', 2, 'Female', 24732247227, 0),
(18, 'Shovon', 3, 'Male', 4313412433, 0),
(21, '', 0, '', 20155107162, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
