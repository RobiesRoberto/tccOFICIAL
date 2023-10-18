-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Out-2023 às 14:33
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `ID_categoria` int(11) NOT NULL,
  `NOME_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo_post` varchar(200) NOT NULL,
  `texto_post` text,
  `img_post` varchar(500) DEFAULT NULL,
  `path_post` varchar(100) DEFAULT NULL,
  `data_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `id_usuario`, `titulo_post`, `texto_post`, `img_post`, `path_post`, `data_post`) VALUES
(0, NULL, '', NULL, '00.jpg', 'imagens_post/652d1486572bb.jpg', '2023-10-16 10:46:30'),
(1, 16, 'Euclides da Cunha', 'Cidade maravilhosa', NULL, NULL, '2023-10-16 10:55:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID_produto` int(11) NOT NULL,
  `DESC_produto` varchar(200) NOT NULL,
  `NOME_anunciante` varchar(200) NOT NULL,
  `CATEGORIA` varchar(200) NOT NULL,
  `ESP_produto` varchar(200) DEFAULT NULL,
  `VALOR_produto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_u` varchar(200) NOT NULL,
  `senha_u` varchar(200) NOT NULL,
  `email_u` varchar(200) NOT NULL,
  `endereco_u` varchar(200) NOT NULL,
  `telefone_u` varchar(15) NOT NULL,
  `cidade_u` varchar(100) NOT NULL,
  `cep_u` char(8) NOT NULL,
  `estado_u` varchar(50) NOT NULL,
  `pfp_u` varchar(100) DEFAULT NULL,
  `datanascimento_u` date NOT NULL,
  `datacadastro_u` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nvlacesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_u`, `senha_u`, `email_u`, `endereco_u`, `telefone_u`, `cidade_u`, `cep_u`, `estado_u`, `pfp_u`, `datanascimento_u`, `datacadastro_u`, `nvlacesso`) VALUES
(16, 'Kauli', '423234', 'asd@fh.com', '', '984356343425', 'tdgg', '3543425', 'sp', 'null', '1987-02-04', '2023-10-02 08:57:58', 1),
(18, 'wert', '453', 'sdfsdf@sdf.com', 'dfsdfsdf', '32343242423', 'dfg', '45364', 'rj', 'null', '6766-04-05', '2023-10-02 09:05:43', 1),
(19, 'miguel4', '123123', 'miguel@gmail.com', 'casa do estefro', '6969696969', 'Naramdiuba', '26754356', 'pr', NULL, '2023-10-03', '2023-10-09 07:27:09', 1),
(20, 'jhgjh', '123123', 'fdjsh@gmail.com', 'afdasd', '123123123123', 'das', '12312332', 'rj', NULL, '2023-10-03', '2023-10-09 08:06:18', 1),
(21, 'miguel5', '696969', 'miguel5@gmail.com', 'casa do estefro', '6969696969', 'Naramdiuba', '26754356', 'pr', NULL, '2023-10-03', '2023-10-09 08:13:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
