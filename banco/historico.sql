-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22-Dez-2018 às 15:10
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4908839_blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_op` date DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_op`, `ip`) VALUES
(27, 1, 1, 11, '2018-11-20', '187.19.187.65'),
(28, 1, 1, 20, '2018-11-20', '187.19.187.65'),
(29, 1, 0, 15, '2018-11-20', '187.19.187.65'),
(30, 1, 0, 6, '2018-11-20', '187.19.187.65'),
(31, 1, 2, 8, '2018-11-20', '187.19.187.65'),
(32, 2, 1, 100, '2018-11-20', '187.19.187.65'),
(33, 2, 0, 1000, '2018-11-20', '187.19.187.65'),
(34, 2, 0, 1000, '2018-11-20', '187.19.187.65'),
(35, 2, 2, 100, '2018-11-20', '187.19.187.65'),
(36, 2, 2, 100, '2018-11-20', '187.19.187.65'),
(37, 1, 2, 200, '2018-11-20', '187.19.187.65'),
(38, 1, 1, 13, '2018-11-21', '187.19.187.35'),
(39, 1, 1, 12, '2018-11-21', '187.19.187.35'),
(40, 1, 1, 13, '2018-11-21', '187.19.187.35'),
(41, 1, 2, 25, '2018-11-21', '187.19.187.35'),
(42, 2, 1, 25, '2018-11-21', '187.19.187.35'),
(43, 1, 2, 600, '2018-11-21', '187.19.187.35'),
(44, 3, 1, 600, '2018-11-21', '187.19.187.35'),
(45, 1, 1, 200, '2018-11-21', '187.19.187.35'),
(46, 3, 0, 150.3, '2018-11-21', '187.19.187.35'),
(47, 1, 0, 39, '2018-12-18', '187.19.188.188');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_id_conta` (`id_conta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `pk_id_conta` FOREIGN KEY (`id_conta`) REFERENCES `contas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
