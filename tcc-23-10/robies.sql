-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2023 às 13:30
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
-- Database: `robies`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_post` varchar(200) NOT NULL,
  `texto_post` text,
  `img_post` varchar(200) DEFAULT NULL,
  `path_post` varchar(100) DEFAULT NULL,
  `data_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `id_usuario`, `titulo_post`, `texto_post`, `img_post`, `path_post`, `data_post`) VALUES
(70, 23, 'bliblib', 'hahhhahahahahhahahah', '', '', '2023-10-23 08:23:36'),
(71, 23, 'bobobo', 'lolololololol', 'unnamed.png', 'imagens_post/653658615e6dc.png', '2023-10-23 08:26:25');

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
  `pfp_u` varchar(200) DEFAULT NULL,
  `pfp_path_u` varchar(100) DEFAULT NULL,
  `datanascimento_u` date NOT NULL,
  `datacadastro_u` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nvlacesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_u`, `senha_u`, `email_u`, `endereco_u`, `telefone_u`, `cidade_u`, `cep_u`, `estado_u`, `pfp_u`, `pfp_path_u`, `datanascimento_u`, `datacadastro_u`, `nvlacesso`) VALUES
(23, 'miguel', 'miguel', 'miguel@gmail.com', 'casa do miguel', '23232323', 'miguelÃ³polis', '231212', 'pe', NULL, NULL, '2020-12-12', '2023-10-23 08:17:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
