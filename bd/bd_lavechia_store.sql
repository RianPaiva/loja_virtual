-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Nov-2023 às 19:03
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_lavechia_store`
--
CREATE DATABASE IF NOT EXISTS `bd_lavechia_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_lavechia_store`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `genero` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `celular` varchar(13) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nome`, `sobrenome`, `cpf`, `genero`, `celular`, `email`, `senha`, `status`) VALUES
(1, 'RIAN', 'PAIVA DA SILVA', '49043588806', '', '119863183463', 'paiva.dev@outlook.com', '$2y$10$NalUbyPlv.4dYOihhYkjPOc.ece3yjbVuIgWY6WxMEl4SONZ8kts6', 1),
(43, 'Lucas', 'da Rosa', '964.382.015', '', '5511941352560', 'l.rosa@hotmail.com', '', 1),
(44, 'Isabel', 'das Neves', '327.068.951', 'F', '5584939894719', 'isa.neves_23@yahoo.com.br', '1234', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estado_br`
--

DROP TABLE IF EXISTS `tb_estado_br`;
CREATE TABLE IF NOT EXISTS `tb_estado_br` (
  `id_estado` int NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ibge` int DEFAULT NULL,
  `pais` int DEFAULT NULL,
  `ddd` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Unidades Federativas';

--
-- Extraindo dados da tabela `tb_estado_br`
--

INSERT INTO `tb_estado_br` (`id_estado`, `nome`, `uf`, `ibge`, `pais`, `ddd`) VALUES
(1, 'ACRE', 'AC', 12, 1, '68'),
(2, 'ALAGOAS', 'AL', 27, 1, '82'),
(3, 'AMAZONAS', 'AM', 13, 1, '97,92'),
(4, 'AMAPÁ', 'AP', 16, 1, '96'),
(5, 'BAHIA', 'BA', 29, 1, '77,75,73,74,71'),
(6, 'CEARÁ', 'CE', 23, 1, '88,85'),
(7, 'DISTRITO FEDERAL', 'DF', 53, 1, '61'),
(8, 'ESPÍRITO SANTO', 'ES', 32, 1, '28,27'),
(9, 'GOIÁS', 'GO', 52, 1, '62,64,61'),
(10, 'MARANHÃO', 'MA', 21, 1, '99,98'),
(11, 'MINAS GERAIS', 'MG', 31, 1, '34,37,31,33,35,38,32'),
(12, 'MATO GROSSO DO SUL', 'MS', 50, 1, '67'),
(13, 'MATO GROSSO', 'MT', 51, 1, '65,66'),
(14, 'PARÁ', 'PA', 15, 1, '91,94,93'),
(15, 'PARAÍBA', 'PB', 25, 1, '83'),
(16, 'PERNAMBUCO', 'PE', 26, 1, '81,87'),
(17, 'PIAUÍ', 'PI', 22, 1, '89,86'),
(18, 'PARANÁ', 'PR', 41, 1, '43,41,42,44,45,46'),
(19, 'RIO DE JANEIRO', 'RJ', 33, 1, '24,22,21'),
(20, 'RIO GRANDE DO NORTE', 'RN', 24, 1, '84'),
(21, 'RONDÔNIA', 'RO', 11, 1, '69'),
(22, 'RORAIMA', 'RR', 14, 1, '95'),
(23, 'RIO GRANDE DO SUL', 'RS', 43, 1, '53,54,55,51'),
(24, 'SANTA CATARINA', 'SC', 42, 1, '47,48,49'),
(25, 'SERGIPE', 'SE', 28, 1, '79'),
(26, 'SÃO PAULO', 'SP', 35, 1, '11,12,13,14,15,16,17,18,19'),
(27, 'TOCANTINS', 'TO', 17, 1, '63'),
(99, 'EXTERIOR', 'EX', 99, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id_fornecedor` int NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(100) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `email` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `id_pais` int NOT NULL DEFAULT '0',
  `cidade` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logradouro` varchar(80) NOT NULL,
  `id_estado` int NOT NULL,
  `complemento` varchar(80) NOT NULL,
  `num_endereco` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_fornecedor`),
  UNIQUE KEY `cnpj` (`cnpj`),
  KEY `id_estado` (`id_estado`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`id_fornecedor`, `razao_social`, `cnpj`, `email`, `telefone`, `id_pais`, `cidade`, `logradouro`, `id_estado`, `complemento`, `num_endereco`, `status`) VALUES
(15, 'PAIVA', '111', 'paiva2gmail.com', '912345678', 1, 'Fracis Mor', 'Jardim Tristeza', 26, 'Calvo', 123, 1),
(16, 'URUGA', '22.222.222/222', 'uru@ga', '(11) 91234 56', 1, 'FRANCO DA ROCHA', 'RUA 2', 26, 'PRÉDIO', 111, 0),
(17, 'TESTE', '11.111.111/111', 'exemplo@gmail.com', '(11) 91111 11', 1, 'RANDOM', 'RANDOM2', 8, 'RANDOM3', 78, 0),
(18, 'TESTE2', '111.111.111 12', 'exemplo@gmail.com', '(11) 91111 11', 6, 'RANDOM', 'RANDOM2', 99, 'RANDOM3', 78, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

DROP TABLE IF EXISTS `tb_genero`;
CREATE TABLE IF NOT EXISTS `tb_genero` (
  `id_genero` int NOT NULL AUTO_INCREMENT,
  `status_genero` tinyint(1) NOT NULL DEFAULT '1',
  `genero` varchar(25) NOT NULL,
  PRIMARY KEY (`id_genero`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`id_genero`, `status_genero`, `genero`) VALUES
(1, 1, 'MASCULINO'),
(2, 1, 'FEMININO'),
(3, 1, 'OUTROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_estoque`
--

DROP TABLE IF EXISTS `tb_item_estoque`;
CREATE TABLE IF NOT EXISTS `tb_item_estoque` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `valor_compra` double(10,2) NOT NULL,
  `dt_hr_entrada` timestamp NOT NULL,
  `qtd_disponivel` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_pedido`
--

DROP TABLE IF EXISTS `tb_item_pedido`;
CREATE TABLE IF NOT EXISTS `tb_item_pedido` (
  `id_pedido` int NOT NULL,
  `id_produto` int NOT NULL,
  `valor_venda` double(10,2) NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_produto`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pais`
--

DROP TABLE IF EXISTS `tb_pais`;
CREATE TABLE IF NOT EXISTS `tb_pais` (
  `id_pais` int NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nome_pt` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `sigla` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `bacen` int NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Países e Nações';

--
-- Extraindo dados da tabela `tb_pais`
--

INSERT INTO `tb_pais` (`id_pais`, `nome`, `nome_pt`, `sigla`, `bacen`) VALUES
(1, 'BRAZIL', 'BRASIL', 'BR', 1058),
(2, 'AFGHANISTAN', 'AFEGANISTÃO', 'AF', 132),
(3, 'ALBANIA', 'ALBÂNIA, REPUBLICA DA', 'AL', 175),
(4, 'ALGERIA', 'ARGÉLIA', 'DZ', 590),
(5, 'AMERICAN SAMOA', 'SAMOA AMERICANA', 'AS', 6912),
(6, 'ANDORRA', 'ANDORRA', 'AD', 370),
(7, 'ANGOLA', 'ANGOLA', 'AO', 400),
(8, 'ANGUILLA', 'ANGUILLA', 'AI', 418),
(9, 'ANTARCTICA', 'ANTÁRTIDA', 'AQ', 3596),
(10, 'ANTIGUA AND BARBUDA', 'ANTIGUA E BARBUDA', 'AG', 434),
(11, 'ARGENTINA', 'ARGENTINA', 'AR', 639),
(12, 'ARMENIA', 'ARMÊNIA, REPUBLICA DA', 'AM', 647),
(13, 'ARUBA', 'ARUBA', 'AW', 655),
(14, 'AUSTRALIA', 'AUSTRÁLIA', 'AU', 698),
(15, 'AUSTRIA', 'ÁUSTRIA', 'AT', 728),
(16, 'AZERBAIJAN', 'AZERBAIJÃO, REPUBLICA DO', 'AZ', 736),
(17, 'BAHAMAS', 'BAHAMAS, ILHAS', 'BS', 779),
(18, 'BAHRAIN', 'BAHREIN, ILHAS', 'BH', 809),
(19, 'BANGLADESH', 'BANGLADESH', 'BD', 817),
(20, 'BARBADOS', 'BARBADOS', 'BB', 833),
(21, 'BELARUS', 'BELARUS, REPUBLICA DA', 'BY', 850),
(22, 'BELGIUM', 'BÉLGICA', 'BE', 876),
(23, 'BELIZE', 'BELIZE', 'BZ', 884),
(24, 'BENIN', 'BENIN', 'BJ', 2291),
(25, 'BERMUDA', 'BERMUDAS', 'BM', 906),
(26, 'BHUTAN', 'BUTÃO', 'BT', 1198),
(27, 'BOLIVIA', 'BOLÍVIA', 'BO', 973),
(28, 'BOSNIA AND HERZEGOWINA', 'BÓSNIA-HERZEGOVINA (REPUBLICA DA)', 'BA', 981),
(29, 'BOTSWANA', 'BOTSUANA', 'BW', 1015),
(30, 'BOUVET ISLAND', 'BOUVET, ILHA', 'BV', 1023),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'TERRITÓRIO BRITÂNICO DO OCEANO INDICO', 'IO', 7820),
(32, 'BRUNEI DARUSSALAM', 'BRUNEI', 'BN', 1082),
(33, 'BULGARIA', 'BULGÁRIA, REPUBLICA DA', 'BG', 1112),
(34, 'BURKINA FASO', 'BURKINA FASO', 'BF', 310),
(35, 'BURUNDI', 'BURUNDI', 'BI', 1155),
(36, 'CAMBODIA', 'CAMBOJA', 'KH', 1414),
(37, 'CAMEROON', 'CAMARÕES', 'CM', 1457),
(38, 'CANADA', 'CANADA', 'CA', 1490),
(39, 'CAPE VERDE', 'CABO VERDE, REPUBLICA DE', 'CV', 1279),
(40, 'CAYMAN ISLANDS', 'CAYMAN, ILHAS', 'KY', 1376),
(41, 'CENTRAL AFRICAN REPUBLIC', 'REPUBLICA CENTRO-AFRICANA', 'CF', 6408),
(42, 'CHAD', 'CHADE', 'TD', 7889),
(43, 'CHILE', 'CHILE', 'CL', 1589),
(44, 'CHINA', 'CHINA, REPUBLICA POPULAR', 'CN', 1600),
(45, 'CHRISTMAS ISLAND', 'CHRISTMAS, ILHA (NAVIDAD)', 'CX', 5118),
(46, 'COCOS (KEELING) ISLANDS', 'COCOS (KEELING), ILHAS', 'CC', 1651),
(47, 'COLOMBIA', 'COLÔMBIA', 'CO', 1694),
(48, 'COMOROS', 'COMORES, ILHAS', 'KM', 1732),
(49, 'CONGO', 'CONGO', 'CG', 1775),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CONGO, REPUBLICA DEMOCRÁTICA DO', 'CD', 8885),
(51, 'COOK ISLANDS', 'COOK, ILHAS', 'CK', 1830),
(52, 'COSTA RICA', 'COSTA RICA', 'CR', 1961),
(53, 'COTE DIVOIRE', 'COSTA DO MARFIM', 'CI', 1937),
(54, 'CROATIA (HRVATSKA)', 'CROÁCIA (REPUBLICA DA)', 'HR', 1953),
(55, 'CUBA', 'CUBA', 'CU', 1996),
(56, 'CYPRUS', 'CHIPRE', 'CY', 1635),
(57, 'CZECH REPUBLIC', 'TCHECA, REPUBLICA', 'CZ', 7919),
(58, 'DENMARK', 'DINAMARCA', 'DK', 2321),
(59, 'DJIBOUTI', 'DJIBUTI', 'DJ', 7838),
(60, 'DOMINICA', 'DOMINICA, ILHA', 'DM', 2356),
(61, 'DOMINICAN REPUBLIC', 'REPUBLICA DOMINICANA', 'DO', 6475),
(62, 'EAST TIMOR', 'TIMOR LESTE', 'TL', 7951),
(63, 'ECUADOR', 'EQUADOR', 'EC', 2399),
(64, 'EGYPT', 'EGITO', 'EG', 2402),
(65, 'EL SALVADOR', 'EL SALVADOR', 'SV', 6874),
(66, 'EQUATORIAL GUINEA', 'GUINE-EQUATORIAL', 'GQ', 3310),
(67, 'ERITREA', 'ERITREIA', 'ER', 2437),
(68, 'ESTONIA', 'ESTÔNIA, REPUBLICA DA', 'EE', 2518),
(69, 'ETHIOPIA', 'ETIÓPIA', 'ET', 2534),
(70, 'FALKLAND ISLANDS (MALVINAS)', 'FALKLAND (ILHAS MALVINAS)', 'FK', 2550),
(71, 'FAROE ISLANDS', 'FEROE, ILHAS', 'FO', 2593),
(72, 'FIJI', 'FIJI', 'FJ', 8702),
(73, 'FINLAND', 'FINLÂNDIA', 'FI', 2712),
(74, 'FRANCE', 'FRANCA', 'FR', 2755),
(76, 'FRENCH GUIANA', 'GUIANA FRANCESA', 'GF', 3255),
(77, 'FRENCH POLYNESIA', 'POLINÉSIA FRANCESA', 'PF', 5991),
(78, 'FRENCH SOUTHERN TERRITORIES', 'TERRAS AUSTRAIS E ANTÁRTICAS FRANCESAS', 'TF', 3607),
(79, 'GABON', 'GABÃO', 'GA', 2810),
(80, 'GAMBIA', 'GAMBIA', 'GM', 2852),
(81, 'GEORGIA', 'GEORGIA, REPUBLICA DA', 'GE', 2917),
(82, 'GERMANY', 'ALEMANHA', 'DE', 230),
(83, 'GHANA', 'GANA', 'GH', 2895),
(84, 'GIBRALTAR', 'GIBRALTAR', 'GI', 2933),
(85, 'GREECE', 'GRÉCIA', 'GR', 3018),
(86, 'GREENLAND', 'GROENLÂNDIA', 'GL', 3050),
(87, 'GRENADA', 'GRANADA', 'GD', 2976),
(88, 'GUADELOUPE', 'GUADALUPE', 'GP', 3093),
(89, 'GUAM', 'GUAM', 'GU', 3131),
(90, 'GUATEMALA', 'GUATEMALA', 'GT', 3174),
(91, 'GUINEA', 'GUINE', 'GN', 3298),
(92, 'GUINEA-BISSAU', 'GUINE-BISSAU', 'GW', 3344),
(93, 'GUYANA', 'GUIANA', 'GY', 3379),
(94, 'HAITI', 'HAITI', 'HT', 3417),
(95, 'HEARD AND MC DONALD ISLANDS', 'ILHA HEARD E ILHAS MCDONALD', 'HM', 3603),
(96, 'HOLY SEE (VATICAN CITY STATE)', 'VATICANO, ESTADO DA CIDADE DO', 'VA', 8486),
(97, 'HONDURAS', 'HONDURAS', 'HN', 3450),
(98, 'HONG KONG', 'HONG KONG', 'HK', 3514),
(99, 'HUNGARY', 'HUNGRIA, REPUBLICA DA', 'HU', 3557),
(100, 'ICELAND', 'ISLÂNDIA', 'IS', 3794),
(101, 'INDIA', 'ÍNDIA', 'IN', 3611),
(102, 'INDONESIA', 'INDONÉSIA', 'ID', 3654),
(103, 'IRAN (ISLAMIC REPUBLIC OF)', 'IRA, REPUBLICA ISLÂMICA DO', 'IR', 3727),
(104, 'IRAQ', 'IRAQUE', 'IQ', 3697),
(105, 'IRELAND', 'IRLANDA', 'IE', 3751),
(106, 'ISRAEL', 'ISRAEL', 'IL', 3832),
(107, 'ITALY', 'ITÁLIA', 'IT', 3867),
(108, 'JAMAICA', 'JAMAICA', 'JM', 3913),
(109, 'JAPAN', 'JAPÃO', 'JP', 3999),
(110, 'JORDAN', 'JORDÂNIA', 'JO', 4030),
(111, 'KAZAKHSTAN', 'CAZAQUISTÃO, REPUBLICA DO', 'KZ', 1538),
(112, 'KENYA', 'QUÊNIA', 'KE', 6238),
(113, 'KIRIBATI', 'KIRIBATI', 'KI', 4111),
(114, 'KOREA, DEMOCRATIC PEOPLE`S REPUBLIC OF', 'COREIA, REPUBLICA POPULAR DEMOCRÁTICA DA', 'KP', 1872),
(115, 'KOREA, REPUBLIC OF', 'COREIA, REPUBLICA DA', 'KR', 1902),
(116, 'KUWAIT', 'KUWAIT', 'KW', 1988),
(117, 'KYRGYZSTAN', 'QUIRGUIZ, REPUBLICA', 'KG', 6254),
(118, 'LAO PEOPLE`S DEMOCRATIC REPUBLIC', 'LAOS, REPUBLICA POPULAR DEMOCRÁTICA DO', 'LA', 4200),
(119, 'LATVIA', 'LETÔNIA, REPUBLICA DA', 'LV', 4278),
(120, 'LEBANON', 'LÍBANO', 'LB', 4316),
(121, 'LESOTHO', 'LESOTO', 'LS', 4260),
(122, 'LIBERIA', 'LIBÉRIA', 'LR', 4340),
(123, 'LIBYAN ARAB JAMAHIRIYA', 'LÍBIA', 'LY', 4383),
(124, 'LIECHTENSTEIN', 'LIECHTENSTEIN', 'LI', 4405),
(125, 'LITHUANIA', 'LITUÂNIA, REPUBLICA DA', 'LT', 4421),
(126, 'LUXEMBOURG', 'LUXEMBURGO', 'LU', 4456),
(127, 'MACAU', 'MACAU', 'MO', 4472),
(128, 'NORTH MACEDONIA', 'MACEDÔNIA DO NORTE', 'MK', 4499),
(129, 'MADAGASCAR', 'MADAGASCAR', 'MG', 4502),
(130, 'MALAWI', 'MALAVI', 'MW', 4588),
(131, 'MALAYSIA', 'MALÁSIA', 'MY', 4553),
(132, 'MALDIVES', 'MALDIVAS', 'MV', 4618),
(133, 'MALI', 'MALI', 'ML', 4642),
(134, 'MALTA', 'MALTA', 'MT', 4677),
(135, 'MARSHALL ISLANDS', 'MARSHALL, ILHAS', 'MH', 4766),
(136, 'MARTINIQUE', 'MARTINICA', 'MQ', 4774),
(137, 'MAURITANIA', 'MAURITÂNIA', 'MR', 4880),
(138, 'MAURITIUS', 'MAURICIO', 'MU', 4855),
(139, 'MAYOTTE', 'MAYOTTE (ILHAS FRANCESAS)', 'YT', 4885),
(140, 'MEXICO', 'MÉXICO', 'MX', 4936),
(141, 'MICRONESIA, FEDERATED STATES OF', 'MICRONESIA', 'FM', 4995),
(142, 'MOLDOVA, REPUBLIC OF', 'MOLDÁVIA, REPUBLICA DA', 'MD', 4944),
(143, 'MONACO', 'MÔNACO', 'MC', 4952),
(144, 'MONGOLIA', 'MONGÓLIA', 'MN', 4979),
(145, 'MONTSERRAT', 'MONTSERRAT, ILHAS', 'MS', 5010),
(146, 'MOROCCO', 'MARROCOS', 'MA', 4740),
(147, 'MOZAMBIQUE', 'MOÇAMBIQUE', 'MZ', 5053),
(148, 'MYANMAR', 'MIANMAR (BIRMÂNIA)', 'MM', 930),
(149, 'NAMIBIA', 'NAMÍBIA', 'NA', 5070),
(150, 'NAURU', 'NAURU', 'NR', 5088),
(151, 'NEPAL', 'NEPAL', 'NP', 5177),
(152, 'NETHERLANDS', 'PAÍSES BAIXOS (HOLANDA)', 'NL', 5738),
(154, 'NEW CALEDONIA', 'NOVA CALEDONIA', 'NC', 5428),
(155, 'NEW ZEALAND', 'NOVA ZELÂNDIA', 'NZ', 5487),
(156, 'NICARAGUA', 'NICARÁGUA', 'NI', 5215),
(157, 'NIGER', 'NÍGER', 'NE', 5258),
(158, 'NIGERIA', 'NIGÉRIA', 'NG', 5282),
(159, 'NIUE', 'NIUE, ILHA', 'NU', 5312),
(160, 'NORFOLK ISLAND', 'NORFOLK, ILHA', 'NF', 5355),
(161, 'NORTHERN MARIANA ISLANDS', 'MARIANAS DO NORTE', 'MP', 4723),
(162, 'NORWAY', 'NORUEGA', 'NO', 5380),
(163, 'OMAN', 'OMA', 'OM', 5568),
(164, 'PAKISTAN', 'PAQUISTÃO', 'PK', 5762),
(165, 'PALAU', 'PALAU', 'PW', 5754),
(166, 'PANAMA', 'PANAMÁ', 'PA', 5800),
(167, 'PAPUA NEW GUINEA', 'PAPUA NOVA GUINE', 'PG', 5452),
(168, 'PARAGUAY', 'PARAGUAI', 'PY', 5860),
(169, 'PERU', 'PERU', 'PE', 5894),
(170, 'PHILIPPINES', 'FILIPINAS', 'PH', 2674),
(171, 'PITCAIRN', 'PITCAIRN, ILHA', 'PN', 5932),
(172, 'POLAND', 'POLÔNIA, REPUBLICA DA', 'PL', 6033),
(173, 'PORTUGAL', 'PORTUGAL', 'PT', 6076),
(174, 'PUERTO RICO', 'PORTO RICO', 'PR', 6114),
(175, 'QATAR', 'CATAR', 'QA', 1546),
(176, 'REUNION', 'REUNIÃO, ILHA', 'RE', 6602),
(177, 'ROMANIA', 'ROMÊNIA', 'RO', 6700),
(178, 'RUSSIAN FEDERATION', 'RÚSSIA, FEDERAÇÃO DA', 'RU', 6769),
(179, 'RWANDA', 'RUANDA', 'RW', 6750),
(180, 'SAINT KITTS AND NEVIS', 'SÃO CRISTOVÃO E NEVES, ILHAS', 'KN', 6955),
(181, 'SAINT LUCIA', 'SANTA LUCIA', 'LC', 7153),
(182, 'SAINT VINCENT AND THE GRENADINES', 'SÃO VICENTE E GRANADINAS', 'VC', 7056),
(183, 'SAMOA', 'SAMOA', 'WS', 6904),
(184, 'SAN MARINO', 'SAN MARINO', 'SM', 6971),
(185, 'SAO TOME AND PRINCIPE', 'SÃO TOME E PRÍNCIPE, ILHAS', 'ST', 7200),
(186, 'SAUDI ARABIA', 'ARÁBIA SAUDITA', 'SA', 531),
(187, 'SENEGAL', 'SENEGAL', 'SN', 7285),
(188, 'SEYCHELLES', 'SEYCHELLES', 'SC', 7315),
(189, 'SIERRA LEONE', 'SERRA LEOA', 'SL', 7358),
(190, 'SINGAPORE', 'CINGAPURA', 'SG', 7412),
(191, 'SLOVAKIA (SLOVAK REPUBLIC)', 'ESLOVACA, REPUBLICA', 'SK', 2470),
(192, 'SLOVENIA', 'ESLOVÊNIA, REPUBLICA DA', 'SI', 2461),
(193, 'SOLOMON ISLANDS', 'SALOMÃO, ILHAS', 'SB', 6777),
(194, 'SOMALIA', 'SOMALIA', 'SO', 7480),
(195, 'SOUTH AFRICA', 'ÁFRICA DO SUL', 'ZA', 7560),
(196, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL', 'GS', 2925),
(197, 'SPAIN', 'ESPANHA', 'ES', 2453),
(198, 'SRI LANKA', 'SRI LANKA', 'LK', 7501),
(199, 'ST. HELENA', 'SANTA HELENA', 'SH', 7102),
(200, 'ST. PIERRE AND MIQUELON', 'SÃO PEDRO E MIQUELON', 'PM', 7005),
(201, 'SUDAN', 'SUDÃO', 'SD', 7595),
(202, 'SURINAME', 'SURINAME', 'SR', 7706),
(203, 'SVALBARD AND JAN MAYEN ISLANDS', 'SVALBARD E JAN MAYEN', 'SJ', 7552),
(204, 'SWAZILAND', 'ESWATINI', 'SZ', 7544),
(205, 'SWEDEN', 'SUÉCIA', 'SE', 7641),
(206, 'SWITZERLAND', 'SUÍÇA', 'CH', 7676),
(207, 'SYRIAN ARAB REPUBLIC', 'SÍRIA, REPUBLICA ÁRABE DA', 'SY', 7447),
(208, 'TAIWAN, PROVINCE OF CHINA', 'FORMOSA (TAIWAN)', 'TW', 1619),
(209, 'TAJIKISTAN', 'TADJIQUISTAO, REPUBLICA DO', 'TJ', 7722),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'TANZÂNIA, REPUBLICA UNIDA DA', 'TZ', 7803),
(211, 'THAILAND', 'TAILÂNDIA', 'TH', 7765),
(212, 'TOGO', 'TOGO', 'TG', 8001),
(213, 'TOKELAU', 'TOQUELAU, ILHAS', 'TK', 8052),
(214, 'TONGA', 'TONGA', 'TO', 8109),
(215, 'TRINIDAD AND TOBAGO', 'TRINIDAD E TOBAGO', 'TT', 8150),
(216, 'TUNISIA', 'TUNÍSIA', 'TN', 8206),
(217, 'TURKEY', 'TURQUIA', 'TR', 8273),
(218, 'TURKMENISTAN', 'TURCOMENISTÃO, REPUBLICA DO', 'TM', 8249),
(219, 'TURKS AND CAICOS ISLANDS', 'TURCAS E CAICOS, ILHAS', 'TC', 8230),
(220, 'TUVALU', 'TUVALU', 'TV', 8281),
(221, 'UGANDA', 'UGANDA', 'UG', 8338),
(222, 'UKRAINE', 'UCRÂNIA', 'UA', 8311),
(223, 'UNITED ARAB EMIRATES', 'EMIRADOS ÁRABES UNIDOS', 'AE', 2445),
(224, 'UNITED KINGDOM', 'REINO UNIDO', 'GB', 6289),
(225, 'UNITED STATES', 'ESTADOS UNIDOS', 'US', 2496),
(226, 'UNITED STATES MINOR OUTLYING ISLANDS', 'ILHAS MENORES DISTANTES DOS ESTADOS UNIDOS', 'UM', 18664),
(227, 'URUGUAY', 'URUGUAI', 'UY', 8451),
(228, 'UZBEKISTAN', 'UZBEQUISTÃO, REPUBLICA DO', 'UZ', 8478),
(229, 'VANUATU', 'VANUATU', 'VU', 5517),
(230, 'VENEZUELA', 'VENEZUELA', 'VE', 8508),
(231, 'VIET NAM', 'VIETNÃ', 'VN', 8583),
(232, 'VIRGIN ISLANDS (BRITISH)', 'VIRGENS, ILHAS (BRITÂNICAS)', 'VG', 8630),
(233, 'VIRGIN ISLANDS (U.S.)', 'VIRGENS, ILHAS (E.U.A.)', 'VI', 8664),
(234, 'WALLIS AND FUTUNA ISLANDS', 'WALLIS E FUTUNA, ILHAS', 'WF', 8753),
(235, 'WESTERN SAHARA', 'SAARA OCIDENTAL', 'EH', 6858),
(236, 'YEMEN', 'IÉMEN', 'YE', 3573),
(237, 'YUGOSLAVIA', 'IUGOSLÁVIA, REPÚBLICA FED. DA', 'YU', 3883),
(238, 'ZAMBIA', 'ZÂMBIA', 'ZM', 8907),
(239, 'ZIMBABWE', 'ZIMBABUE', 'ZW', 6653),
(240, 'BAILIWICK OF GUERNSEY', 'GUERNSEY, ILHA DO CANAL (INCLUI ALDERNEY E SARK)', 'GG', 1504),
(241, 'BAILIWICK OF JERSEY', 'JERSEY, ILHA DO CANAL', 'JE', 1508),
(243, 'ISLE OF MAN', 'MAN, ILHA DE', 'IM', 3595),
(246, 'CRNA GORA (MONTENEGRO)', 'MONTENEGRO', 'ME', 4985),
(247, 'SÉRVIA', 'REPUBLIKA SRBIJA', 'RS', 7370),
(248, 'REPUBLIC OF SOUTH SUDAN', 'SUDAO DO SUL', 'SS', 7600),
(249, 'ZONA DEL CANAL DE PANAMÁ', 'ZONA DO CANAL DO PANAMÁ', '', 8958),
(252, 'DAWLAT FILASṬĪN', 'PALESTINA', 'PS', 5780),
(253, 'ÅLAND ISLANDS', 'ALAND, ILHAS', 'AX', 153),
(255, 'CURAÇAO', 'CURAÇAO', 'CW', 200),
(256, 'SAINT MARTIN', 'SÃO MARTINHO, ILHA DE (PARTE HOLANDESA)', 'SM', 6998),
(258, 'BONAIRE', 'BONAIRE', 'AN', 990),
(259, 'ANTARTICA', 'ANTARTICA', 'AQ', 420),
(260, 'HEARD ISLAND AND MCDONALD ISLANDS', 'ILHA HERAD E ILHAS MACDONALD', 'AU', 3433),
(261, 'SAINT-BARTHÉLEMY', 'SÃO BARTOLOMEU', 'FR', 6939),
(262, 'SAINT MARTIN', 'SÃO MARTINHO, ILHA DE (PARTE FRANCESA)', 'SM', 6980),
(263, 'TERRES AUSTRALES ET ANTARCTIQUES FRANÇAISES', 'TERRAS AUSTRAIS E ANTÁRCTICAS FRANCESAS', 'TF', 7811);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `preco_total` double(10,2) NOT NULL,
  `data_pedido` timestamp NOT NULL,
  `status_pagamento` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pedido`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(50) NOT NULL DEFAULT '',
  `id_fornecedor` int NOT NULL,
  `categoria` int NOT NULL DEFAULT '0',
  `id_genero` int NOT NULL,
  `local_img` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descricao` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_fornecedor` (`id_fornecedor`),
  KEY `Index 3` (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `id_fornecedor`, `categoria`, `id_genero`, `local_img`, `descricao`) VALUES
(12, 'Nike', 16, 0, 1, '', 'Foto Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sobrenome` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `nivel_acesso` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nome`, `sobrenome`, `email`, `senha`, `status`, `nivel_acesso`) VALUES
(1, 'RIAN', ' PAIVA DA SILVA', 'paiva.dev@outlook.com', '123', 1, 1);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `tb_estado_br` (`id_estado`),
  ADD CONSTRAINT `id_pais` FOREIGN KEY (`id_pais`) REFERENCES `tb_pais` (`id_pais`);

--
-- Limitadores para a tabela `tb_item_pedido`
--
ALTER TABLE `tb_item_pedido`
  ADD CONSTRAINT `tb_item_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `tb_pedido` (`id_pedido`),
  ADD CONSTRAINT `tb_item_pedido_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`);

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`);

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `id_genero` FOREIGN KEY (`id_genero`) REFERENCES `tb_genero` (`id_genero`),
  ADD CONSTRAINT `tb_produto_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `tb_fornecedor` (`id_fornecedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
