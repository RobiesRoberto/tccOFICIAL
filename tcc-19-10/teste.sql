-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/10/2023 às 01:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `ID_categoria` int(11) NOT NULL,
  `NOME_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_post` varchar(200) NOT NULL,
  `texto_post` text DEFAULT NULL,
  `img_post` varchar(200) DEFAULT NULL,
  `path_post` varchar(100) DEFAULT NULL,
  `data_post` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `id_usuario`, `titulo_post`, `texto_post`, `img_post`, `path_post`, `data_post`) VALUES
(1, 16, 'haahhahahahahah', 'hahahahahahahah', NULL, NULL, '2023-10-17'),
(2, 21, 'bibibobo', NULL, 'foto.jpg', 'imagens_post/652f3a0ad6e02.jpg', '2023-10-17'),
(3, 0, 'baba', 'babababababab', NULL, NULL, '2023-10-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `ID_produto` int(11) NOT NULL,
  `DESC_produto` varchar(200) NOT NULL,
  `NOME_anunciante` varchar(200) NOT NULL,
  `CATEGORIA` varchar(200) NOT NULL,
  `ESP_produto` varchar(200) DEFAULT NULL,
  `VALOR_produto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
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
  `datacadastro_u` datetime NOT NULL DEFAULT current_timestamp(),
  `nvlacesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_u`, `senha_u`, `email_u`, `endereco_u`, `telefone_u`, `cidade_u`, `cep_u`, `estado_u`, `pfp_u`, `pfp_path_u`, `datanascimento_u`, `datacadastro_u`, `nvlacesso`) VALUES
(16, 'Kauli', '423234', 'asd@fh.com', '', '984356343425', 'tdgg', '3543425', 'sp', '', 'profile_pics/usuario3.png', '1987-02-04', '2023-10-02 08:57:58', 1),
(18, 'wert', '453', 'sdfsdf@sdf.com', 'dfsdfsdf', '32343242423', 'dfg', '45364', 'rj', '', NULL, '6766-04-05', '2023-10-02 09:05:43', 1),
(19, 'miguel4', '123123', 'miguel@gmail.com', 'casa do estefro', '6969696969', 'Naramdiuba', '26754356', 'pr', NULL, NULL, '2023-10-03', '2023-10-09 07:27:09', 1),
(20, 'jhgjh', '123123', 'fdjsh@gmail.com', 'afdasd', '123123123123', 'das', '12312332', 'rj', NULL, NULL, '2023-10-03', '2023-10-09 08:06:18', 1),
(21, 'miguel5', '696969', 'miguel5@gmail.com', 'casa do estefro', '6969696969', 'Naramdiuba', '26754356', 'pr', NULL, NULL, '2023-10-03', '2023-10-09 08:13:07', 1),
(22, 'rew', '123123', 'eqwe@gmail.com', 'qdasd', '1312312', 'sdfsd', '12313123', 'rn', NULL, NULL, '1212-12-12', '2023-10-17 20:22:35', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Índices de tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_produto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
