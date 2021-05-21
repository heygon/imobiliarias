-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 21, 2021 at 03:23 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `Fotos`
--

CREATE TABLE `Fotos` (
  `id` int(11) NOT NULL,
  `NomeArquivo` tinytext NOT NULL,
  `URLArquivo` tinytext NOT NULL,
  `Principal` tinytext NOT NULL,
  `Alterada` tinytext NOT NULL,
  `Imovel` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `CodigoImovel` tinytext NOT NULL,
  `TipoImovel` tinytext NOT NULL,
  `SubTipoImovel` tinytext NOT NULL,
  `TituloImovel` tinytext NOT NULL,
  `UF` tinytext NOT NULL,
  `Modelo` tinytext NOT NULL,
  `Endereco` tinytext NOT NULL,
  `VisualizarMapa` tinytext NOT NULL,
  `DivulgarEndereco` tinytext NOT NULL,
  `Cidade` tinytext NOT NULL,
  `Bairro` tinytext NOT NULL,
  `Numero` tinytext NOT NULL,
  `Complemento` tinytext NOT NULL,
  `CEP` tinytext NOT NULL,
  `PrecoVenda` tinytext NOT NULL,
  `PrecoLocacao` tinytext NOT NULL,
  `PrecoCondominio` tinytext NOT NULL,
  `ValorIPTU` tinytext NOT NULL,
  `UnidadeMetrica` tinytext NOT NULL,
  `AreaUtil` tinytext NOT NULL,
  `AreaTotal` tinytext NOT NULL,
  `QtdDormitorios` tinytext NOT NULL,
  `QtdSuites` tinytext NOT NULL,
  `QtdBanheiros` tinytext NOT NULL,
  `QtdVagas` tinytext NOT NULL,
  `Observacao` tinytext NOT NULL,
  `Caracteristicas` tinytext NOT NULL,
  `Video` tinytext NOT NULL,
  `Status` tinytext NOT NULL,
  `VendaAluga` tinytext NOT NULL,
  `Mapa` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fotos`
--
ALTER TABLE `Fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Fotos`
--
ALTER TABLE `Fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
