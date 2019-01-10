-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 22-Dez-2018 às 16:14
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
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `id_pai` int(11) DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `nivel` int(30) DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(33) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `id_pai`, `data_cad`, `nivel`, `nome`, `email`, `senha`) VALUES
(1, NULL, '2018-11-12', 0, 'alonso', 'a.ric.c.assis@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 1, '2018-11-12', 0, 'maria', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 1, '2018-11-12', 0, 'ricardo', 'ricardo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 1, '2018-11-12', 0, 'ivanilce', 'ivanilce@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 4, '2018-11-15', 0, 'ana ilva', 'anailva@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
