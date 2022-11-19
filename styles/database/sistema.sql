DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL
) ;

INSERT INTO `usuario` (`id`, `usuario`, `senha`, `nome`, `celular`, `email`) VALUES
(1,	'vitorgibim',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'vitor',	'44991065805','vitor@gmail.com'),
(2,	'gabriel',	'7c4a8d09ca3762af61e59520943dc26494f8941b',	'vitor',	'00000000000', 'gabriel@gmail.com');

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `codigo` varchar(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `quantidade` int NOT NULL,
  `valor` varchar(14) NOT NULL
) ;
