SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laravelpr-2`
--
CREATE DATABASE IF NOT EXISTS `laravelpr-2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laravelpr-2`;

-- --------------------------------------------------------


--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Anuradhapura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ratnapura', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Negambo', '0000-00-00 00:00:00', '2015-09-03 14:25:33'),
(4, 'Colombo', '2015-09-01 18:27:59', '2015-09-02 02:54:49'),
(5, 'Galle', '2015-09-02 02:49:35', '2015-09-02 14:13:48'),
(6, 'Kandy', '2015-09-02 03:49:18', '2015-09-02 03:49:39');

-- --------------------------------------------------------


--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `hotels`:
--   `city_id`
--       `cities` -> `id`
--

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address_1`, `address_2`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Mariot', 'Matara road', 'Ahangama', 5, '0000-00-00 00:00:00', '2015-09-04 04:42:55'),
(2, 'XYZ Hotel', 'No 45', 'Jaffna Road', 1, '0000-00-00 00:00:00', '2015-09-03 02:38:42'),
(3, 'Taj', 'No.234', 'Galle Road', 4, '2015-09-02 15:55:20', '2015-09-02 16:06:14'),
(4, 'Bay Inn', 'Address 1', 'Address 2', 3, '2015-09-03 08:24:24', '2015-09-03 08:24:24'),
(5, 'Orient Tour Inn', 'Address 1', 'Address 2', 2, '2015-09-03 08:25:02', '2015-09-03 08:25:02'),
(6, 'Lakeside', 'Address 1', 'Address 2', 1, '2015-09-03 08:26:17', '2015-09-03 08:26:17');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hotel_city_relation`
--
DROP VIEW IF EXISTS `view_hotel_city_relation`;
CREATE TABLE IF NOT EXISTS `view_hotel_city_relation` (
`id` int(11)
,`hotel_name` varchar(255)
,`address_1` varchar(255)
,`address_2` varchar(255)
,`city_id` int(11)
,`city_name` varchar(100)
);
-- --------------------------------------------------------


--
-- Structure for view `view_hotel_city_relation`
--
DROP TABLE IF EXISTS `view_hotel_city_relation`;

CREATE  VIEW `view_hotel_city_relation` AS (select `htl`.`id` AS `id`,`htl`.`name` AS `hotel_name`,`htl`.`address_1` AS `address_1`,`htl`.`address_2` AS `address_2`,`cty`.`id` AS `city_id`,`cty`.`name` AS `city_name` from (`cities` `cty` join `hotels` `htl` on((`htl`.`city_id` = `cty`.`id`))) order by `cty`.`name`);

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
 ADD PRIMARY KEY (`id`), ADD KEY `city_id` (`city_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
