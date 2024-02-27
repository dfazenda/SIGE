-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:37 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sige`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `alunoStamp` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `contactoAlternativo` varchar(15) NOT NULL,
  `tipoDeDocumento` varchar(30) NOT NULL,
  `numeroDeDocumento` varchar(30) NOT NULL,
  `localDeEmissao` varchar(30) NOT NULL,
  `data_emissao_doc` date NOT NULL,
  `anexoDoDocumento` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `nacionalidade` varchar(300) NOT NULL,
  `naturalidade` varchar(300) NOT NULL,
  `morada` varchar(200) NOT NULL,
  `nomeEncarregado` varchar(300) NOT NULL,
  `localDeTrabalho` varchar(300) NOT NULL,
  `funcao` varchar(300) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `estado` varchar(150) NOT NULL DEFAULT 'activo',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`id`, `alunoStamp`, `nome`, `dataDeNascimento`, `contacto`, `contactoAlternativo`, `tipoDeDocumento`, `numeroDeDocumento`, `localDeEmissao`, `data_emissao_doc`, `anexoDoDocumento`, `email`, `sexo`, `nacionalidade`, `naturalidade`, `morada`, `nomeEncarregado`, `localDeTrabalho`, `funcao`, `foto`, `estado`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Carlos Guerra', '2008-11-12', '845623314', '', 'Bilhete de identidade', '5465653231R', 'Matola', '2021-11-11', '', 'colegio2002ilia@gmail.com', 'Femenino', '', '', 'Malhampswene', '', '', '', '../components/assets/uploads/fotos/20240.jpg', 'activo', '2023-10-06 08:25:06', 18, '2023-10-06 08:25:06', 18),
(3, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', 'Agostinho Mandlate', '2008-11-14', '865421326', '', 'Bilhete de identidade', '655555555555M', 'Maputo', '2021-11-11', '', 'agostinho2023@gmail.com', 'Masculino', '', '', 'Magoanine B', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-06 08:32:54', 18, '2023-10-19 13:28:32', 18),
(5, 'd64c331c34bb99731a626c0002467c65.20230730.0', 'Suzana Mboa', '2008-11-14', '875421326', '', 'Bilhete de identidade', '655555255555M', 'Maputo', '2021-11-11', '', 'titos123@gmail.com', 'Femenino', '', '', 'Magoanine B', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-06 08:38:28', 18, '2023-10-06 08:38:28', 18),
(6, '995ca733e3657ff9f5f3c823d73371e1.20230730.0', 'Daniel Fazenda', '2008-11-14', '865421326', '', 'Bilhete de identidade', '655555555555M', 'Maputo', '2021-11-11', '', 'colegioilia2023@gmail.com', 'Masculino', '', '', 'Magoanine B', '', '', '', '../components/assets/uploads/fotos/4548.jpg', 'activo', '2023-10-06 08:59:17', 18, '2023-10-06 08:59:17', 18),
(9, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Batrolomeu Tivane', '2008-11-12', '845623314', '', 'Bilhete de identidade', '5465653231R', 'Matola', '2021-11-11', '', 'batrolomeu@gmail.com', 'Femenino', '', '', 'Malhampswene', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-06 09:49:01', 18, '2023-10-06 09:49:01', 18),
(10, '57ce0427b9e3b1b777b3efcf5684452e.20230814.0', 'Diana Tivane', '2008-11-12', '845623312', '', 'Bilhete de identidade', '5465653231E', 'Matola', '2021-11-11', '', 'eregisto.informaticolvia2023@gmail.com', 'Femenino', '', '', 'Malhampswene', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-06 11:59:10', 18, '2023-10-06 11:59:10', 18),
(41, '7cdace91c487558e27ce54df7cdb299c.20231016.0', 'Pavarote Romeu', '2008-02-11', '874412263', '', 'Bilhete de identidade', '989656566646G', 'Maputo', '2021-05-11', '', 'eregisto.logisticolvia@gmail.com', 'Masculino', '', '', 'Maxaquene ', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-18 12:18:30', 18, '2023-10-18 12:18:30', 18),
(42, '960b52ba79d5328f457eba4bf3716ce0.20231018.18', 'Kenny Mutemba', '2008-06-11', '845632145', '', 'Bilhete de identidade', '655214455665G', 'Maputo', '2021-11-11', '', 'mutemba123@gmail.com', 'Masculino', '', '', 'Bairro de Hulene B', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-18 19:33:16', 18, '2023-10-18 19:33:16', 18),
(43, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', 'Kenny Mutemba', '2008-06-11', '845632145', '', 'Bilhete de identidade', '655214455665G', 'Maputo', '2021-11-11', '', 'mutemba@gmail.com', 'Masculino', '', '', 'Bairro de Hulene B', '', '', '', '../components/assets/uploads/fotos/14586.jpg', 'activo', '2023-10-19 08:31:25', 18, '2023-10-19 08:31:25', 18),
(44, '7427cc88b0300c330f360b2a5a52992a.20231019.18', 'Carla Antonio', '2008-11-12', '845623305', '', 'Bilhete de identidade', '5465653231A', 'Matola', '2021-11-11', '', 'carlosguerra@gmail.com', 'Femenino', '', '', 'Malhampswene', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-19 17:11:07', 18, '2023-10-19 17:11:07', 18),
(45, '510731ac096ebcb3989fb1ed5b7075bb.20231019.18', 'Suzete Mboa', '2008-11-14', '875421326', '', 'Bilhete de identidade', '655555255555M', 'Maputo', '2021-11-11', '', 'suzana@gmail.com', 'Femenino', '', '', 'Magoanine A', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-19 17:18:11', 18, '2023-10-19 17:18:11', 18),
(46, '9b8619251a19057cff70779273e95aa6.20231019.18', 'Ana Agusto Matsinhe', '2008-11-14', '865421026', '', 'Bilhete de identidade', '655555550055M', 'Maputo', '2021-11-11', '', 'ana@gmail.com', 'Femenino', '', '', 'Magoanine B', '', '', '', '../components/assets/images/user.png', 'activo', '2023-10-19 19:09:48', 18, '2023-10-19 19:09:48', 18),
(47, '30082754836bf11b2c31a0fd3cb4b091.20231123.18', 'Laiza da Silva Romeu', '2008-11-11', '845321566', '', 'Bilhete de identidade', '5465653231H', 'Maputo', '2020-11-11', '', 'laizaromeu@gmail.com', 'Femenino', '', '', 'Bairro de Laulane A', '', '', '', '../components/assets/images/user.png', 'activo', '2023-11-23 19:00:03', 18, '2023-11-23 19:00:03', 18);

-- --------------------------------------------------------

--
-- Table structure for table `atribuir_professor`
--

CREATE TABLE `atribuir_professor` (
  `id` int(11) NOT NULL,
  `professorStamp` varchar(300) NOT NULL,
  `professor` varchar(100) NOT NULL,
  `disciplina` varchar(100) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `turma` varchar(100) NOT NULL,
  `sala` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atribuir_professor`
--

INSERT INTO `atribuir_professor` (`id`, `professorStamp`, `professor`, `disciplina`, `classe`, `turma`, `sala`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '', 'Francisco Lino', 'Matematica', '10', 'B', '04', '2023-11-23 12:38:37', 18, '2023-11-23 12:38:37', 18),
(2, '', 'Olina Lino', 'Geografia', '10', 'B', '01', '2023-11-23 12:39:50', 18, '2023-11-23 12:39:50', 18),
(3, '', 'Celsa Matola', 'Biologia', '10', 'A', '03', '2023-11-23 12:41:22', 18, '2023-11-23 12:41:22', 18),
(4, '', 'Francisco Lino', 'Quimica', '10', 'B', '01', '2023-11-23 12:43:43', 18, '2023-11-23 12:43:43', 18),
(5, '', 'Antonio Combula', 'Quimica', '10', 'B', '03', '2023-11-23 12:50:49', 18, '2023-11-23 12:50:49', 18),
(6, '', 'Celsa Matola', 'C.Naturais', '10', 'B', '03', '2023-11-23 12:55:48', 18, '2023-11-23 12:55:48', 18),
(7, '', 'Olina Lino', 'Biologia', '7', 'A', '03', '2023-11-23 13:07:38', 18, '2023-11-23 13:07:38', 18),
(8, '', 'Antonio Combula', 'Portugues', '9', 'A', '01', '2023-11-23 14:09:09', 18, '2023-11-23 14:09:09', 18),
(9, '', 'Olina Lino', 'Matematica', '9', 'A', '02', '2023-11-23 14:09:40', 18, '2023-11-23 14:09:40', 18),
(10, '', 'Celsa Matola', 'Fisca', '9', 'B', '03', '2023-11-23 14:09:59', 18, '2023-11-23 14:09:59', 18),
(11, '', 'Francisco Lino', 'Fisca', '9', 'B', '02', '2023-11-23 14:10:14', 18, '2023-11-23 14:10:14', 18),
(12, '', 'Antonio Combula', 'Portugues', '12', 'A', '05', '2023-11-23 19:00:47', 18, '2023-11-23 19:00:47', 18),
(13, '', 'Antonio Combula', 'Portugues', '3', 'A', '01', '2023-11-24 05:59:37', 18, '2023-11-24 05:59:37', 18),
(14, '', 'Reginaldo Zita', 'Matematica', '3', 'A', '01', '2023-11-24 05:59:48', 18, '2023-11-24 05:59:48', 18);

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id`, `nome`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, '7', '2023-07-23 08:28:50', 18, '2023-09-30 18:37:33', 18),
(6, '8', '2023-07-23 08:29:13', 18, '2023-09-30 18:37:38', 18),
(7, '9', '2023-07-23 08:34:45', 18, '2023-09-30 18:37:41', 18),
(8, '10', '2023-07-26 07:06:36', 18, '2023-09-30 18:37:46', 18),
(9, '11', '2023-11-21 11:50:26', 18, '2023-11-21 11:50:26', 18),
(10, '12', '2023-11-21 12:43:54', 18, '2023-11-21 12:43:54', 18),
(11, '6', '2023-11-21 12:54:18', 18, '2023-11-21 12:54:18', 18),
(14, '5', '2023-11-23 11:10:59', 18, '2023-11-23 11:10:59', 18),
(15, '4', '2023-11-23 19:25:02', 18, '2023-11-23 19:25:02', 18),
(16, '3', '2023-11-24 05:58:43', 18, '2023-11-24 05:58:43', 18);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `classe`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Informatica', '', '2023-07-31 12:19:47', 18, '2023-07-31 12:19:47', 18),
(2, 'Portugues', '', '2023-11-23 09:07:02', 18, '2023-11-23 09:07:02', 18),
(3, 'Matematica', '', '2023-11-23 09:07:12', 18, '2023-11-23 09:07:12', 18),
(4, 'C.Naturais', '', '2023-11-23 09:08:04', 18, '2023-11-23 09:08:04', 18),
(5, 'Fisca', '', '2023-11-23 10:50:55', 18, '2023-11-23 10:50:55', 18),
(6, 'Quimica', '', '2023-11-23 11:00:20', 18, '2023-11-23 11:00:20', 18),
(7, 'Biologia', '', '2023-11-23 11:05:05', 18, '2023-11-23 11:05:05', 18),
(8, 'Geografia', '', '2023-11-23 11:10:00', 18, '2023-11-23 11:10:00', 18);

-- --------------------------------------------------------

--
-- Table structure for table `funcao`
--

CREATE TABLE `funcao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `funcionarioStamp` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `tipoDeDocumento` varchar(30) NOT NULL,
  `numeroDeDocumento` varchar(30) NOT NULL,
  `localDeEmissao` varchar(30) NOT NULL,
  `data_emissao_doc` date NOT NULL,
  `anexoDoDocumento` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(15) NOT NULL DEFAULT '',
  `morada` varchar(200) NOT NULL DEFAULT '',
  `foto` varchar(150) NOT NULL,
  `estado` varchar(150) NOT NULL DEFAULT 'activo',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `funcionarioStamp`, `nome`, `dataDeNascimento`, `contacto`, `tipoDeDocumento`, `numeroDeDocumento`, `localDeEmissao`, `data_emissao_doc`, `anexoDoDocumento`, `email`, `sexo`, `morada`, `foto`, `estado`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(7, 'b87546c7a8c2532d1c07c4399786f5ac.20230304.1', 'Daniel Fazenda', '1988-04-21', '844335488', 'Bilhete de identidade', '132456987M', 'Maputo', '2022-05-12', '', 'danielfazenda18@gmail.com', 'Masculino', 'Magoanine B', '../components/assets/uploads/fotos/14281.jpg', 'inactivo', '2023-03-04 18:13:49', 1, '2023-10-19 08:18:26', 18),
(8, 'e9412ee564384b987d086df32d4ce6b7.20231018.18', 'Alice Uamusse', '1994-06-11', '874523125', 'Bilhete de identidade', '1236544999G', 'Maputo', '2020-02-11', '', 'alice@gmail.com', 'Femenino', 'Bairro de Khongolote', '../components/assets/images/user.png', 'activo', '2023-10-18 19:31:20', 18, '2023-10-18 20:03:25', 124),
(9, '4b0634bf8e6c9d0289c1102ced741317.20231124.18', 'Herminia Madeira', '1984-05-12', '845632145', 'Bilhete de identidade', '655555500555M', 'Maputo', '2020-11-11', '', 'madeira@gmail.com', 'Femenino', 'Malhampswene', '../components/assets/images/user.png', 'activo', '2023-11-24 05:01:26', 18, '2023-11-24 05:01:26', 18),
(10, 'e0eb3d5aa57420ff4d5c3c183ab411c6.20231124.18', 'Celso Matola', '1988-05-12', '845231256', 'Bilhete de identidade', '655514555555M', 'Maputo', '2021-11-11', '', 'matola@gmail.com', 'Masculino', 'Bairro da Malhangalene B', '../components/assets/images/user.png', 'activo', '2023-11-24 05:17:26', 18, '2023-11-24 05:17:26', 18);

-- --------------------------------------------------------

--
-- Table structure for table `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `alunoStamp` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `contactoAlternativo` varchar(300) NOT NULL,
  `tipoDeDocumento` varchar(30) NOT NULL,
  `numeroDeDocumento` varchar(30) NOT NULL,
  `localDeEmissao` varchar(30) NOT NULL,
  `data_emissao_doc` date NOT NULL,
  `anexoDoDocumento` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(15) NOT NULL DEFAULT '',
  `nacionalidade` varchar(300) NOT NULL,
  `naturalidade` varchar(300) NOT NULL,
  `morada` varchar(200) NOT NULL DEFAULT '',
  `nomeEncarregado` varchar(300) NOT NULL,
  `localDeTrabalho` varchar(300) NOT NULL,
  `funcao` varchar(300) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `classe` int(11) NOT NULL,
  `estado` varchar(150) NOT NULL DEFAULT 'activo',
  `interno` bit(1) NOT NULL DEFAULT b'1',
  `notaInformativa` varchar(200) NOT NULL DEFAULT '',
  `anexoDocumento` varchar(200) NOT NULL DEFAULT '',
  `ano` datetime(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4),
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inscricao`
--

INSERT INTO `inscricao` (`id`, `alunoStamp`, `nome`, `dataDeNascimento`, `contacto`, `contactoAlternativo`, `tipoDeDocumento`, `numeroDeDocumento`, `localDeEmissao`, `data_emissao_doc`, `anexoDoDocumento`, `email`, `sexo`, `nacionalidade`, `naturalidade`, `morada`, `nomeEncarregado`, `localDeTrabalho`, `funcao`, `foto`, `classe`, `estado`, `interno`, `notaInformativa`, `anexoDocumento`, `ano`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '9b8619251a19057cff70779273e95aa6.20231019.18', 'Ana Agusto Matsinhe', '2008-11-14', '865421026', '875552222', 'Bilhete de identidade', '655555550055M', 'Maputo', '2021-11-11', '', 'ana@gmail.com', 'Femenino', 'Mocambicana', 'Maputo', 'Magoanine B', 'Eduardo', 'Cidade da Baixa', 'militar sargento', '../components/assets/images/user.png', 8, 'activo', b'1', '', '../components/assets/uploads/docs/12237.doc', '2023-10-19 18:47:50.3934', '2023-10-19 18:47:50', 18, '2023-10-19 19:06:39', 18),
(2, '30082754836bf11b2c31a0fd3cb4b091.20231123.18', 'Laiza da Silva Romeu', '2008-11-11', '845321566', '874552211', 'Bilhete de identidade', '5465653231H', 'Maputo', '2020-11-11', '', 'laizaromeu@gmail.com', 'Femenino', 'Mocambicana', 'Maputo', 'Bairro de Laulane A', 'Silva Romeu', 'Cidade de Maputo', 'Professor', '../components/assets/images/user.png', 10, 'activo', b'1', '../components/assets/uploads/docs/17114.pdf', '../components/assets/uploads/docs/4875.pdf', '2023-11-23 18:59:13.7904', '2023-11-23 18:59:13', 18, '2023-11-23 18:59:13', 18);

-- --------------------------------------------------------

--
-- Table structure for table `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `stampAluno` varchar(300) NOT NULL,
  `turma` varchar(10) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `nRecibo` bigint(20) NOT NULL,
  `url_comprovativo` varchar(300) NOT NULL,
  `ano` year(4) NOT NULL,
  `valorMatricula` decimal(10,0) NOT NULL,
  `valorMensalidade` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  `created_by` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(10) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matricula`
--

INSERT INTO `matricula` (`id`, `stampAluno`, `turma`, `classe`, `nRecibo`, `url_comprovativo`, `ano`, `valorMatricula`, `valorMensalidade`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '', '15', '', 12255, '../components/assets/uploads/docs/9770.pdf', 2023, '123', '5200', '1', '18', '2023-10-06 08:23:07', '18', '2023-10-06 08:23:07'),
(2, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', '15', '8', 1254, '../components/assets/uploads/docs/15154.pdf', 2023, '1600', '5200', '1', '18', '2023-10-06 08:25:06', '18', '2023-10-06 08:25:06'),
(4, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', '17', '7', 2323, '../components/assets/uploads/docs/2964.pdf', 2023, '1300', '4800', '1', '18', '2023-10-06 08:32:54', '18', '2023-10-06 08:32:54'),
(6, 'd64c331c34bb99731a626c0002467c65.20230730.0', '11', '5', 1255, '../components/assets/uploads/docs/13234.pdf', 2023, '1500', '5000', '1', '18', '2023-10-06 08:38:28', '18', '2023-10-06 08:38:28'),
(7, '995ca733e3657ff9f5f3c823d73371e1.20230730.0', '15', '8', 65165, '../components/assets/uploads/docs/9086.pdf', 2023, '1600', '5200', '1', '18', '2023-10-06 08:59:17', '18', '2023-10-06 08:59:17'),
(9, '4f11b55f57612f06fe9638b99f6c66e6.20230814.0', '17', '7', 54656, '../components/assets/uploads/docs/7156.pdf', 2023, '1300', '4000', '1', '18', '2023-10-06 09:03:35', '18', '2023-10-06 09:03:35'),
(10, '1913e525d6acdf2a6196b42b3a749035.20230822.0', '15', '8', 656566, '../components/assets/uploads/docs/22837.pdf', 2023, '1300', '4600', '1', '18', '2023-10-06 09:49:01', '18', '2023-10-06 09:49:01'),
(11, '57ce0427b9e3b1b777b3efcf5684452e.20230814.0', '17', '7', 2216461, '../components/assets/uploads/docs/27172.pdf', 2023, '1600', '4900', '1', '18', '2023-10-06 11:59:10', '18', '2023-10-06 11:59:10'),
(12, 'e778f5c84ed2c8a8dbc05418c90732e3.20230814.0', '17', '7', 56565656, '../components/assets/uploads/docs/23084.pdf', 2023, '1600', '5400', '1', '18', '2023-10-07 14:28:14', '18', '2023-10-07 14:28:14'),
(44, '7cdace91c487558e27ce54df7cdb299c.20231016.0', '13', '6', 56654, '../components/assets/uploads/docs/27118.pdf', 2023, '1300', '6200', '1', '18', '2023-10-18 12:18:30', '18', '2023-10-18 12:18:30'),
(45, '960b52ba79d5328f457eba4bf3716ce0.20231018.18', '17', '7', 656323, '../components/assets/uploads/docs/20389.pdf', 2023, '1500', '6300', '1', '18', '2023-10-18 19:33:16', '18', '2023-10-18 19:33:16'),
(46, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', '16', '8', 4645412, '../components/assets/uploads/docs/25684.pdf', 2023, '1600', '7200', '1', '18', '2023-10-19 08:31:25', '18', '2023-10-19 08:31:25'),
(47, '7427cc88b0300c330f360b2a5a52992a.20231019.18', '11', '5', 546532323, '../components/assets/uploads/docs/5768.pdf', 2023, '1300', '4200', '1', '18', '2023-10-19 17:11:07', '18', '2023-10-19 17:11:07'),
(48, '510731ac096ebcb3989fb1ed5b7075bb.20231019.18', '11', '5', 646523, '../components/assets/uploads/docs/23347.pdf', 2023, '1300', '4200', '1', '18', '2023-10-19 17:18:11', '18', '2023-10-19 17:18:11'),
(49, '9b8619251a19057cff70779273e95aa6.20231019.18', '16', '8', 656421, '../components/assets/uploads/docs/27381.pdf', 2023, '1500', '5300', '1', '18', '2023-10-19 19:09:48', '18', '2023-10-19 19:09:48'),
(50, '30082754836bf11b2c31a0fd3cb4b091.20231123.18', '19', '', 8551122, '../components/assets/uploads/docs/12966.pdf', 2023, '2000', '7500', '1', '18', '2023-11-23 19:00:03', '18', '2023-11-23 19:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `mensalidade`
--

CREATE TABLE `mensalidade` (
  `id` int(11) NOT NULL,
  `stampAluno` varchar(300) NOT NULL,
  `nomeMes` varchar(100) NOT NULL,
  `tipoPagamento` varchar(100) NOT NULL,
  `nrDoRecibo` varchar(100) NOT NULL,
  `dataDeDeposito` date NOT NULL,
  `url_comprovativo` varchar(300) NOT NULL,
  `valorMensalidade` decimal(10,0) NOT NULL,
  `diasDeAtraso` int(100) NOT NULL,
  `multa` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mensalidade`
--

INSERT INTO `mensalidade` (`id`, `stampAluno`, `nomeMes`, `tipoPagamento`, `nrDoRecibo`, `dataDeDeposito`, `url_comprovativo`, `valorMensalidade`, `diasDeAtraso`, `multa`, `created_at`, `created_by`, `updated_by`) VALUES
(1, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Fevereiro', 'deposito', '8888', '2023-09-11', '../components/assets/uploads/docs/25595.pdf', '5200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(2, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Marco', 'deposito', '12546', '2023-09-15', '../components/assets/uploads/docs/1280.pdf', '5200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(3, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Abril', 'numerario', '2021', '2023-10-04', '../components/assets/uploads/docs/26544.pdf', '5200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(4, '995ca733e3657ff9f5f3c823d73371e1.20230730.0', 'Fevereiro', 'deposito', '8888', '2023-09-11', '../components/assets/uploads/docs/173.pdf', '5200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(5, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', 'Fevereiro', 'deposito', '8888', '2023-09-11', '../components/assets/uploads/docs/452.pdf', '4800', 0, '0', '2023-12-04 11:30:53', 0, 0),
(6, 'd64c331c34bb99731a626c0002467c65.20230730.0', 'Fevereiro', 'deposito', '65656', '2023-09-01', '../components/assets/uploads/docs/12258.pdf', '5000', 0, '0', '2023-12-04 11:30:53', 0, 0),
(7, '4f11b55f57612f06fe9638b99f6c66e6.20230814.0', 'Fevereiro', 'deposito', '2021', '2023-09-15', '../components/assets/uploads/docs/10413.pdf', '4000', 0, '0', '2023-12-04 11:30:53', 0, 0),
(8, '4f11b55f57612f06fe9638b99f6c66e6.20230814.0', 'Marco', 'deposito', '5641', '2023-09-14', '../components/assets/uploads/docs/5083.pdf', '4000', 0, '0', '2023-12-04 11:30:53', 0, 0),
(9, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Maio', 'numerario', '65485', '2023-06-12', '../components/assets/uploads/docs/32414.pdf', '5200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(10, 'e778f5c84ed2c8a8dbc05418c90732e3.20230814.0', 'Fevereiro', 'deposito', '545424', '2023-06-14', '../components/assets/uploads/docs/19571.pdf', '5400', 0, '0', '2023-12-04 11:30:53', 0, 0),
(11, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', 'Marco', 'deposito', '98745', '2023-06-11', '../components/assets/uploads/docs/10460.pdf', '4800', 0, '0', '2023-12-04 11:30:53', 0, 0),
(12, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', 'Fevereiro', 'deposito', '65652', '2023-06-11', '../components/assets/uploads/docs/7528.pdf', '7200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(13, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', 'Marco', 'deposito', '6656', '2023-07-11', '../components/assets/uploads/docs/25632.pdf', '7200', 0, '0', '2023-12-04 11:30:53', 0, 0),
(14, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Fevereiro', 'deposito', '65656', '2023-11-01', '../components/assets/uploads/docs/822.pdf', '0', 0, '0', '2023-12-04 16:14:31', 0, 0),
(15, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Fevereiro', 'pos', '874', '2023-11-28', '../components/assets/uploads/docs/21515.pdf', '0', 0, '0', '2023-12-04 16:15:46', 0, 0),
(16, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Fevereiro', 'pos', '9874', '2023-11-29', '../components/assets/uploads/docs/26642.pdf', '0', 0, '0', '2023-12-04 16:16:15', 0, 0),
(17, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Fevereiro', 'deposito', '32145', '2023-11-28', '../components/assets/uploads/docs/25576.pdf', '4600', 0, '0', '2023-12-05 09:59:58', 0, 0),
(18, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Marco', 'numerario', '012354', '2023-11-26', '../components/assets/uploads/docs/32281.pdf', '4600', 0, '0', '2023-12-05 10:01:47', 0, 0),
(19, '57ce0427b9e3b1b777b3efcf5684452e.20230814.0', 'Fevereiro', 'deposito', '0236', '2023-10-30', '../components/assets/uploads/docs/32478.pdf', '4900', 0, '0', '2023-12-05 10:50:03', 0, 0),
(20, 'd64c331c34bb99731a626c0002467c65.20230730.0', 'Marco', 'deposito', '52301', '2023-11-29', '../components/assets/uploads/docs/22719.pdf', '5000', 0, '0', '2023-12-05 13:36:55', 0, 0),
(21, '', 'Fevereiro', 'deposito', '541236', '2023-12-05', '../components/assets/uploads/docs/44.pdf', '5200', 3, '156', '2023-12-05 14:41:56', 0, 0),
(22, '995ca733e3657ff9f5f3c823d73371e1.20230730.0', 'Marco', 'deposito', '85212', '2023-12-06', '../components/assets/uploads/docs/8330.pdf', '5200', 4, '208', '2023-12-05 14:55:20', 0, 0),
(23, '7cdace91c487558e27ce54df7cdb299c.20231016.0', 'Fevereiro', 'deposito', '9466', '2023-12-05', '../components/assets/uploads/docs/31426.pdf', '6200', 3, '186', '2023-12-05 14:56:30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nivel_acesso`
--

CREATE TABLE `nivel_acesso` (
  `idNivelAcesso` int(11) NOT NULL,
  `nomeNivelAcesso` varchar(100) NOT NULL,
  `DataCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`idNivelAcesso`, `nomeNivelAcesso`, `DataCadastro`) VALUES
(1, 'Area administrativa', '2023-02-22 11:38:07'),
(2, 'Area pedagogica', '2023-02-22 11:38:07'),
(3, 'Professor', '2023-02-22 11:39:51'),
(4, 'Aluno', '2023-02-22 11:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `pagar_mensalidade`
--

CREATE TABLE `pagar_mensalidade` (
  `id` int(11) NOT NULL,
  `stampAluno` varchar(300) NOT NULL DEFAULT '0',
  `nomeMes` varchar(100) NOT NULL DEFAULT '0',
  `tipoPagamento` varchar(100) NOT NULL DEFAULT '0',
  `nrDoRecibo` varchar(100) NOT NULL DEFAULT '0',
  `dataDeDeposito` date NOT NULL,
  `url_comprovativo` varchar(300) NOT NULL DEFAULT '0',
  `Fevereiro` decimal(10,0) NOT NULL DEFAULT '0',
  `Marco` decimal(10,0) NOT NULL DEFAULT '0',
  `Abril` decimal(10,0) NOT NULL DEFAULT '0',
  `Maio` decimal(10,0) NOT NULL DEFAULT '0',
  `Junho` decimal(10,0) NOT NULL DEFAULT '0',
  `Julho` decimal(10,0) NOT NULL DEFAULT '0',
  `Agosto` decimal(10,0) NOT NULL DEFAULT '0',
  `Setembro` decimal(10,0) NOT NULL DEFAULT '0',
  `Outubro` decimal(10,0) NOT NULL DEFAULT '0',
  `Novembro` decimal(10,0) NOT NULL DEFAULT '0',
  `Dezembro` decimal(10,0) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagar_mensalidade`
--

INSERT INTO `pagar_mensalidade` (`id`, `stampAluno`, `nomeMes`, `tipoPagamento`, `nrDoRecibo`, `dataDeDeposito`, `url_comprovativo`, `Fevereiro`, `Marco`, `Abril`, `Maio`, `Junho`, `Julho`, `Agosto`, `Setembro`, `Outubro`, `Novembro`, `Dezembro`, `created_by`, `updated_by`) VALUES
(1, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', 'Fevereiro', 'numerario', '65485', '2023-06-12', '../components/assets/uploads/docs/32414.pdf', '5200', '5200', '5200', '5200', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(2, '995ca733e3657ff9f5f3c823d73371e1.20230730.0', 'Fevereiro', 'deposito', '85212', '2023-12-06', '../components/assets/uploads/docs/8330.pdf', '5200', '5200', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(3, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', 'Fevereiro', 'deposito', '98745', '2023-06-11', '../components/assets/uploads/docs/10460.pdf', '4800', '4800', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(4, 'd64c331c34bb99731a626c0002467c65.20230730.0', 'Fevereiro', 'deposito', '52301', '2023-11-29', '../components/assets/uploads/docs/22719.pdf', '5000', '5000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(5, '4f11b55f57612f06fe9638b99f6c66e6.20230814.0', 'Fevereiro', 'deposito', '5641', '2023-09-14', '../components/assets/uploads/docs/5083.pdf', '4000', '4000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(6, 'e778f5c84ed2c8a8dbc05418c90732e3.20230814.0', 'Fevereiro', 'deposito', '545424', '0000-00-00', '../components/assets/uploads/docs/19571.pdf', '5400', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(7, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', 'Fevereiro', 'deposito', '6656', '2023-07-11', '../components/assets/uploads/docs/25632.pdf', '7200', '7200', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(8, '1913e525d6acdf2a6196b42b3a749035.20230822.0', 'Fevereiro', 'numerario', '012354', '2023-11-26', '../components/assets/uploads/docs/32281.pdf', '4600', '4600', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(9, '57ce0427b9e3b1b777b3efcf5684452e.20230814.0', 'Fevereiro', 'deposito', '0236', '0000-00-00', '../components/assets/uploads/docs/32478.pdf', '4900', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(10, '', 'Fevereiro', 'deposito', '541236', '0000-00-00', '../components/assets/uploads/docs/44.pdf', '5200', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18),
(11, '7cdace91c487558e27ce54df7cdb299c.20231016.0', 'Fevereiro', 'deposito', '9466', '0000-00-00', '../components/assets/uploads/docs/31426.pdf', '6200', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 18, 18);

-- --------------------------------------------------------

--
-- Table structure for table `parametros`
--

CREATE TABLE `parametros` (
  `id` int(11) NOT NULL,
  `idadeMinAluno` int(11) NOT NULL,
  `idadeMinFuncionario` int(11) NOT NULL,
  `validadeMaxDocumento` int(11) NOT NULL,
  `nomeDoSistema` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parametros`
--

INSERT INTO `parametros` (`id`, `idadeMinAluno`, `idadeMinFuncionario`, `validadeMaxDocumento`, `nomeDoSistema`) VALUES
(1, 14, 17, 5, 'SIGE');

-- --------------------------------------------------------

--
-- Table structure for table `pedido_reset_senha_usuario`
--

CREATE TABLE `pedido_reset_senha_usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `processo` varchar(200) NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedido_reset_senha_usuario`
--

INSERT INTO `pedido_reset_senha_usuario` (`id`, `usuario`, `processo`, `usado`, `created_at`, `created_by`) VALUES
(0, 'dfazenda18@gmail.com', '13558.20230726', 0, '2023-07-26 13:51:15', 0),
(0, 'colegioilia2021@gmail.com', '11264.20230730', 0, '2023-07-30 13:30:32', 18),
(0, 'danilo@gmail.com', '1128.20230730', 0, '2023-07-30 13:36:00', 18),
(0, 'dfazenda18@gmail.com', '16513.20230730', 0, '2023-07-30 13:36:58', 18),
(0, 'colegioilia2021@gmail.com', '18382.20230730', 0, '2023-07-30 14:58:27', 18),
(0, 'danilo@gmail.com', '29674.20230730', 0, '2023-07-30 19:55:44', 18),
(0, 'dianativane@gmail.com', '22961.20230902', 0, '2023-09-02 07:06:41', 0),
(0, 'dfazenda18@gmail.com', '20118.20230902', 0, '2023-09-02 07:07:39', 0),
(0, 'dfazenda18@gmail.com', '21673.20230919', 0, '2023-09-19 21:30:44', 0),
(0, 'clara@gmail.com', '8253.20230923', 0, '2023-09-23 05:36:09', 18),
(0, 'agostinho@gmail.com', '50.20230923', 0, '2023-09-23 05:36:31', 18),
(0, 'agostinho@gmail.com', '29201.20231018', 0, '2023-10-18 13:06:37', 18),
(0, 'alice@gmail.com', '17509.20231124', 0, '2023-11-24 05:58:09', 18);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `professorStamp` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataDeNascimento` date NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `tipoDeDocumento` varchar(30) NOT NULL,
  `numeroDeDocumento` varchar(30) NOT NULL,
  `localDeEmissao` varchar(30) NOT NULL,
  `data_emissao_doc` date NOT NULL,
  `anexoDoDocumento` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` varchar(15) NOT NULL DEFAULT '',
  `morada` varchar(200) NOT NULL DEFAULT '',
  `foto` varchar(150) NOT NULL,
  `estado` varchar(150) NOT NULL DEFAULT 'activo',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `professorStamp`, `nome`, `dataDeNascimento`, `contacto`, `tipoDeDocumento`, `numeroDeDocumento`, `localDeEmissao`, `data_emissao_doc`, `anexoDoDocumento`, `email`, `sexo`, `morada`, `foto`, `estado`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, '0df840aed5f513a02964d0c27bc4f277.20231018.18', 'Celsa Matola', '1988-11-12', '846523177', 'Bilhete de identidade', '1236544999H', 'Maputo', '2021-11-11', '', 'cesla@gmail.com', 'Femenino', 'Bairro da Malhangalene B', '../components/assets/uploads/fotos/22354.jpg', 'activo', '2023-10-18 12:44:37', 18, '2023-10-18 12:44:37', 18),
(6, '81aa5aa1989ff76f8f8e5f467814c499.20231018.18', 'Francisco Lino', '1980-11-11', '854566541', 'Bilhete de identidade', '965214452233R', 'Maputo', '2020-11-11', '', 'franciscolino@gmail.com', 'Masculino', 'Bairro Chihango', '../components/assets/images/user.png', 'activo', '2023-10-18 12:49:17', 18, '2023-10-18 12:49:17', 18),
(7, '4e55263505ae74fc5d622c9dfe7c4538.20231018.18', 'Olina Lino', '1998-11-11', '854566531', 'Bilhete de identidade', '965214452284U', 'Maputo', '2020-11-12', '', 'olinalino@gmail.com', 'Femenino', 'Bairro Chihango', '../components/assets/images/user.png', 'activo', '2023-10-18 12:53:37', 18, '2023-10-18 12:53:37', 18),
(8, '9d50bcc2d13c9160fcf2a3fd160252a6.20231019.18', 'Antonio Combula', '1965-04-11', '854112233', 'Bilhete de identidade', '5465653231U', 'Inhambane', '2021-03-11', '', 'antonio@gmail.com', 'Masculino', 'Bairro de Magoanine B', '../components/assets/uploads/fotos/18850.jpg', 'activo', '2023-10-19 18:56:52', 18, '2023-10-19 18:56:52', 18),
(9, 'eef7c9b1b1d71701f94d9a90f02adde5.20231123.18', 'Reginaldo Zita', '1982-05-03', '874562332', 'Bilhete de identidade', '5465653231S', 'Maputo', '2020-11-11', '', 'reginaldo@gmail.com', 'Masculino', 'Matola Gare', '../components/assets/images/user.png', 'activo', '2023-11-23 14:14:17', 18, '2023-11-23 14:14:17', 18);

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id`, `nome`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '05', '2023-11-21 12:51:57', 18, '2023-11-21 12:51:57', 18),
(2, '02', '2023-11-21 12:52:10', 18, '2023-11-21 12:52:10', 18),
(3, '03', '2023-11-21 12:53:14', 18, '2023-11-21 12:53:14', 18),
(5, '01', '2023-11-21 13:58:58', 18, '2023-11-21 13:58:58', 18),
(6, '04', '2023-11-21 13:59:08', 18, '2023-11-21 13:59:08', 18),
(8, 'Musica', '2023-11-23 08:07:37', 18, '2023-11-23 08:07:37', 18),
(9, 'Xadrez', '2023-11-23 08:07:46', 18, '2023-11-23 08:07:46', 18);

-- --------------------------------------------------------

--
-- Table structure for table `status_matricula_aluno`
--

CREATE TABLE `status_matricula_aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_matricula_aluno`
--

INSERT INTO `status_matricula_aluno` (`id`, `nome`) VALUES
(1, 'Aberto'),
(2, 'Aprovado'),
(3, 'Reprovado'),
(4, 'Desistente'),
(5, 'Expulso');

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `classe` varchar(30) NOT NULL,
  `nrMinAluno` int(20) NOT NULL,
  `nrMaxAluno` int(20) NOT NULL,
  `ano` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`id`, `nome`, `classe`, `nrMinAluno`, `nrMaxAluno`, `ano`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(11, 'A', '5', 5, 30, 2023, '2023-07-23 08:35:13', 18, '2023-11-23 18:24:41', 18),
(13, 'A', '6', 5, 30, 2023, '2023-07-23 09:27:25', 18, '2023-11-23 18:24:49', 18),
(15, 'A', '8', 5, 30, 2023, '2023-07-26 07:06:49', 18, '2023-11-23 18:24:56', 18),
(16, 'B', '8', 5, 30, 2023, '2023-07-26 07:06:59', 18, '2023-11-23 18:25:04', 18),
(17, 'A', '7', 5, 30, 2023, '2023-07-26 07:07:10', 18, '2023-11-23 18:25:12', 18),
(18, 'B', '5', 5, 30, 2023, '2023-11-21 11:50:53', 18, '2023-11-23 18:25:20', 18),
(19, 'A', '10', 5, 30, 2023, '2023-11-21 12:44:09', 18, '2023-11-23 18:25:28', 18),
(25, 'B', '9', 5, 30, 2023, '2023-11-23 10:53:02', 18, '2023-11-23 18:25:36', 18),
(28, 'B', '7', 5, 30, 2023, '2023-11-23 11:10:45', 18, '2023-11-23 18:25:43', 18),
(29, 'C', '5', 5, 30, 2023, '2023-11-23 17:56:32', 18, '2023-11-23 17:56:32', 18),
(30, 'B', '10', 5, 30, 2023, '2023-11-23 18:55:56', 18, '2023-11-23 18:55:56', 18),
(31, 'A', '15', 5, 30, 2023, '2023-11-23 19:25:25', 18, '2023-11-23 19:25:25', 18),
(32, 'A', '16', 5, 30, 2023, '2023-11-24 05:58:58', 18, '2023-11-24 05:58:58', 18),
(33, 'B', '16', 5, 30, 2023, '2023-11-24 05:59:11', 18, '2023-11-24 05:59:11', 18);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuarioStamp` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(700) NOT NULL,
  `nivelAcesso` int(11) NOT NULL,
  `temaPadrao` tinyint(4) NOT NULL DEFAULT '0',
  `estado` varchar(15) NOT NULL DEFAULT 'Activo',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuarioStamp`, `nome`, `usuario`, `senha`, `nivelAcesso`, `temaPadrao`, `estado`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(18, 'b87546c7a8c2532d1c07c4399786f5ac.20230304.1', '', 'danielfazenda@gmail.com', '$2y$10$caZ9u3wxY9nC3QcUhZiL6OBOKb1woFCmikq12StNaS8BKkY3xG/Su', 1, 0, 'activo', '2023-03-04 18:15:46', 1, '2023-12-05 12:19:35', 1),
(71, '1913e525d6acdf2a6196b42b3a749035.20230822.0', '', 'dianativane@gmail.com', '$2y$10$rs7WkXS51C3nFkHJjaze8.SErit0PthehnyAXrm59rgJ99XVbYakS', 4, 0, 'Activo', '2023-09-19 19:15:28', 18, '2023-09-19 19:15:28', 18),
(78, '65742cafb273e12fc7bb968b5fca065e.20231005.18', '', 'dfazenda18@gmail.com', '$2y$10$rCCVpqLlwOFz3lhkIbbpdu4ufk/ISnLWjkLdjRtK2aWsj0WimxssG', 3, 0, 'Activo', '2023-10-05 15:40:08', 18, '2023-10-05 15:40:08', 18),
(79, 'c879ec4dfeaa4d0f14f8f395a09941c2.20230814.0', '', 'colegio2002ilia@gmail.com', '$2y$10$iNe8aUCBzspZ.llMzpH7UOQ7ZdxQ2uoDfOddqXzu1IbFhOj2jheay', 4, 0, 'Activo', '2023-10-06 08:25:06', 18, '2023-10-06 08:25:06', 18),
(81, '525b8410cc8612283c9ecaf9a319f8ed.20230814.0', '', 'agostinho2023@gmail.com', '$2y$10$HZhBoNMsNqyGi.VcnkJpj.I9iKUoz0v3un4BH3QUgthN/Z0hun.RG', 4, 0, 'activo', '2023-10-06 08:32:54', 18, '2023-10-18 20:09:04', 124),
(127, 'db116b39f7a3ac5366079b1d9fe249a5.20231018.18', '', 'mutemba@gmail.com', '$2y$10$pLESdCZbs7hMDUmrmJg1yeU6gDOntokpKTh/YeGFqz6zFdAvEczRi', 4, 1, 'Activo', '2023-10-19 08:31:26', 18, '2023-10-19 13:22:12', 18),
(132, 'eef7c9b1b1d71701f94d9a90f02adde5.20231123.18', '', 'reginaldo@gmail.com', '$2y$10$8KRucaefnqgtqr/PzHY.neANixiuGSTiiMUkAmY1iWLUVwg1OJKMe', 3, 0, 'Activo', '2023-11-23 14:14:17', 18, '2023-11-23 18:52:26', 18),
(133, '30082754836bf11b2c31a0fd3cb4b091.20231123.18', '', 'laizaromeu@gmail.com', '$2y$10$x/aXa4ga0PaXhksx/e9N5OOLnm0y5iKXOyvBu0q7fA.dxtA77uIE2', 4, 0, 'Activo', '2023-11-23 19:00:03', 18, '2023-11-23 19:00:03', 18),
(139, '4b0634bf8e6c9d0289c1102ced741317.20231124.18', '', 'madeira@gmail.com', '$2y$10$2lP3v4rJs8W0PREpGznmpeytC06fLzxctMspt5ya3Xs81OpAmWKCO', 1, 0, 'Activo', '2023-11-24 05:56:44', 18, '2023-11-24 05:56:44', 18),
(140, 'e9412ee564384b987d086df32d4ce6b7.20231018.18', '', 'alice@gmail.com', '$2y$10$RHe5rbdf6SEgPvEilCChLuC0wxqJC8r1iBBXXi.HGQoPuf5y1F/ZS', 2, 0, 'activo', '2023-11-24 05:57:39', 18, '2023-11-24 05:57:50', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alunoStamp` (`alunoStamp`);

--
-- Indexes for table `atribuir_professor`
--
ALTER TABLE `atribuir_professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  ADD PRIMARY KEY (`idNivelAcesso`);

--
-- Indexes for table `pagar_mensalidade`
--
ALTER TABLE `pagar_mensalidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_matricula_aluno`
--
ALTER TABLE `status_matricula_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `atribuir_professor`
--
ALTER TABLE `atribuir_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mensalidade`
--
ALTER TABLE `mensalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nivel_acesso`
--
ALTER TABLE `nivel_acesso`
  MODIFY `idNivelAcesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pagar_mensalidade`
--
ALTER TABLE `pagar_mensalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `parametros`
--
ALTER TABLE `parametros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_matricula_aluno`
--
ALTER TABLE `status_matricula_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
