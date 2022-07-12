

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `test`
--

-- --------------------------------------------------------

--
-- Структура на таблица `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Employees';

--
-- Схема на данните от таблица `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`) VALUES
(1, 'Иван'),
(2, 'Николай'),
(3, 'Димитър'),
(4, 'Анелия'),
(5, 'Борислава'),
(6, 'Петър'),
(7, 'Симона');

-- --------------------------------------------------------

--
-- Структура на таблица `employment`
--

CREATE TABLE `employment` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `appointed` date NOT NULL,
  `released` date DEFAULT NULL,
  `employee_type` varchar(10) NOT NULL,
  `coef` float(5,2) NOT NULL DEFAULT 1.70
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `employment`
--

INSERT INTO `employment` (`id`, `employee_id`, `appointed`, `released`, `employee_type`, `coef`) VALUES
(1, 1, '2018-03-01', NULL, 'dev', 1.70),
(2, 2, '2018-08-01', NULL, 'dev', 1.70),
(3, 3, '2019-06-01', NULL, 'dev', 1.70),
(4, 4, '2019-12-01', NULL, 'acc', 1.70),
(5, 5, '2020-10-01', NULL, 'dsn', 1.70),
(6, 6, '2022-06-19', NULL, 'dev', 1.70),
(7, 7, '2022-03-01', NULL, 'dev', 1.70);

-- --------------------------------------------------------

--
-- Структура на таблица `furlough`
--

CREATE TABLE `furlough` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `used_days` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `furlough`
--

INSERT INTO `furlough` (`id`, `employee_id`, `from_date`, `to_date`, `used_days`) VALUES
(1, 2, '2020-04-13', '2020-04-16', 4),
(2, 2, '2021-01-04', '2021-01-06', 3),
(3, 2, '2021-07-05', '2021-07-09', 5),
(4, 1, '2020-12-31', '2020-12-31', 1),
(5, 4, '2021-02-08', '2021-02-12', 5),
(6, 4, '2021-10-18', '2021-10-22', 5),
(7, 1, '2021-06-01', '2021-06-15', 11),
(8, 4, '2020-12-31', '2020-12-31', 1);

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Индекси за таблица `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Индекси за таблица `furlough`
--
ALTER TABLE `furlough`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `furlough`
--
ALTER TABLE `furlough`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
