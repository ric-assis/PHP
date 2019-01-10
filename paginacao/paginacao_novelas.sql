-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: paginacao
-- ------------------------------------------------------
-- Server version	5.7.13-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `novelas`
--

CREATE TABLE `novelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novela` varchar(50) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `capa` varchar(50) DEFAULT NULL,
  `resumo` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;


--
-- Dumping data for table `novelas`
--

/*!40000 ALTER TABLE `novelas` DISABLE KEYS */;
INSERT INTO `novelas` VALUES (1,'A Fábrica',1971,'capas/584e2d66d26595f48df03a430ee6baf0.jpg','A Fábrica foi uma telenovela brasileira que foi produzida pela extinta Rede Tupi e exibida no horário das 19 horas, de 1 de março de 1971 a 11 de março de 1972, teve 288 capítulos. Teve como missão tirar a TV Tupi de sua má fase em telenovelas, na época. Foi prorrogada por três meses devido a problemas na produção da atração seguinte, Na Idade do Lobo.'),(2,'Nossa Filha Gabriela ',1971,'capas/138e9d0d94c29174db2f3af76772b0af.jpg','O teatro mambembe de Giuliano chega a uma pacata cidade e muda o comportamento de todos os habitantes, a estrela do teatro Gabriela, por quem ele está apaixonado, de volta à terra natal de sua mãe, conhece três simpáticos velhinhos: Candinho, Romeu e Napoleão, que disputam entre si a atenção da bela moça.\r\nO que Gabriela não sabe é que no passado os velhinhos haviam se casado com trigêmeas e uma delas era a sua mãe, e um destes três velhinos é seu pai. Quem será seu verdadeiro pai? Cada velhinho passa então a lutar pela paternidade de Gabriela, e esté mistério permanecerá até o final da trama.'),(3,'Signo da Esperança ',1972,'capas/406f1ce389650665106aec3aa071652f.jpg','Uma família de descendentes italianos está à espera de uma herança, que será entregue a quem encontrar um especial par de castiçais, que caminhará de mão em mão por todos os personagens.'),(5,'Hospital',1971,'capas/6507d309b9340925365cecce4a631c10.jpg','As tramas giravam ao redor de pacientes, funcionários, médicos e enfermeiros, no cotidiano dentro de um hospital.\r\nUm mistério era o fio condutor da história: de quem era o corpo do médico morto num acidente de carro - o Dr. Maurício ou o Dr. Fernando? Numa noite, Fernando dá uma carona a Maurício e um acidente na estrada incendeia o carro onde os dois estavam. Um corpo é carbonizado e o outro fica irreconhecível. Acredita-se que Maurício morreu e que Fernando sobreviveu, pois os documentos dele são encontrados em seu paletó. Uma cirurgia plástica refaz o rosto de Fernando, o sobrevivente.\r\nMuito mais do que uma fatalidade, ao final descobria-se que o acidente era uma farsa planejada por uma quadrilha, uma espécie de \\\"máfia branca\\\", para apoderar-se do hospital onde a trama era centralizada. Fernando era noivo da Drª Cristina, herdeira do hospital. O sobrevivente do acidente era Maurício, que se passou por Fernando para casar-se com Cristina e ficar com o hospital. O acidente de carro foi premeditado: Maurício insistiu pela carona e vestiu o paletó de Fernando onde estavam os seus documentos. Ao final, para surpresa de todos, descobre-se que Fernando estava vivo, preso numa cabana, enquanto um corpo carbonizado o substituiu no acidente. Maurício, o falso Fernando, é seguido sem saber, e vai até o cativeiro onde o verdadeiro Fernando era mantido preso. Ao final, Maurício vai preso quando todo o mistério é desvendado.'),(6,'Na idade do lobo',1972,'capas/8d17053a7376a5ad9be193acdabac2d6.jpg','Na idade do lobo é o nome de uma telenovela brasileira produzida pela extinta Rede Tupi e exibida de 13 de março a 12 de setembro de 1972.\r\nEscrita por Sérgio Jockymann e dirigida por Walter Avancini e Carlos Zara.\r\nHomem quarentão se apaixona por jovem do Exército da Salvação.'),(7,'Vitória Bonelli',1973,'capas/92b2346e04d79b4c8b6d269ef76e2fac.jpg','Vitória Bonelli é uma mulher firme, decidida e de grande personalidade. Por uma série de circunstâncias, fica enclausurada durante vinte anos em seu quarto, vivendo fora da realidade, num mundo particular. De repente, sai do seu refúgio para enfrentar um ambiente hostil, vivendo através dos problemas de seus quatro filhos - Tiago, Mateus, Lucas e Verônica.\r\nVitória irá protegê-los usando toda a sua garra na luta para vencer a depressão econômica que se abateu sobre a família. O marido, Jaime Bonelli, homem que enriquecera através de meios duvidosos, morreu durante uma festa em sua mansão quando tentava conseguir mais dinheiro emprestado de seu círculo de amigos para livrar-se das dívidas. Com a derrocada financeira, a família Bonelli perde tudo e Vitória luta para sobreviver e conscientizar os filhos dessa nova realidade. A princípio eles não aceitam a situação e revoltam-se contra a mãe. Para piorar, Verônica aceita-se casar com Wálter, filho dos Moglianni, principais credores dos Bonelli.\r\nApesar da força de sua verdadeira personalidade, Vitória Bonelli é uma mulher tímida que sempre viveu à sombra do marido. Vivendo no conforto, ela ocupava-se apenas de cuidar de seus filhos, levando uma vida tranqüila e burguesa. Com a reviravolta na situação econômica da família, Vitória deixa seu casulo e converte-se numa verdadeira matriarca, tomando para si a responsabilidade de salvar a situação.\r\nPreocupada em manter a família unida, deixa de lado o conforto no qual se criara, abandona os hábitos burgueses e abre uma cantina para dela tirar o sustento de sua prole.'),(8,'Bel-Ami ',1972,'capas/f401bf0137780d376395511723d69698.jpg','Bel-Ami é uma telenovela brasileira, produzida pela extinta Rede Tupi e exibida de 26 de junho a 2 de dezembro de 1972, às 20 horas, em 132 capitulos. \r\nEscrita por Ody Fraga e Teixeira Filho e dirigida por Henrique Martins. Inspirada no livro homônimo de Guy de Maupassant.\r\nBel-Ami contava a história de um pobretão que adquiria prestígio ao ascender socialmente e dominar o mundo dos negócios, por intermédio de astúcia e esperteza. Ele impressionava os homens e as mulheres com o seu charme.\r\n'),(9,'Camomila e Bem-me-quer',1972,'capas/469b3d340a3ccb90d11dd39ec1f1e903.jpg','Camomila e Bem-me-quer foi uma telenovela brasileira produzida e exibida pela extinta Rede Tupi, entre outubro de 1972 e 23 de março de 1973[1].\r\nFoi escrita por Ivani Ribeiro e dirigida por Edson Braga, com supervisão de Carlos Zara.\r\n'),(10,'Tempo de Viver',1973,'capas/599d39e8efc81bea1ff90b9ada942fee.jpg','A TV Tupi São Paulo não aceitou exibir a novela, por divergências com a TV Tupi Rio de Janeiro, que produziu a novela, fazendo com que a produção fosse exibida pela TV Gazeta em São Paulo em novembro daquele ano. O motivo do boicote foi pelo fato de que, oito anos antes, a emissora carioca não quis apresentar a novela O Direito de Nascer, produzida pela emissora paulista.\r\nJuca é um porteiro que trabalha na Zona Norte do Rio de Janeiro. Divide seu tempo entre a amiga fiel Lúcia e a noiva Maria Helena. Juca vive sendo seguido por um misterioso homem chamado Anjo\r\n'),(11,'A Revolta dos Anjos',1972,'capas/70b62d0537718f88f124cb51d7f30003.jpg','A Revolta dos Anjos foi uma telenovela brasileira produzida pela extinta Rede Tupi e exibida de 4 de dezembro de 1972 a 24 de março de 1973 no horário às 20 horas.\nEscrita pela psicóloga Carmen da Silva e dirigida por Henrique Martins e Luiz Gallon.\nO confronto de três gerações de uma família, que se dividem e aproximam num mesmo jogo de frustrações, de sonhos e de alegrias.\nSílvia é uma mulher bem casada, aberta para os problemas do mundo à sua volta, mas que no fundo guarda a tristeza de ter barrado sua vocação de pianista ao se casar. Ricardo Bragança, seu marido, é um bem-sucedido homem de negócios, lugar à que chegou graças à ajuda do sogro.\nO casal tem três filhos: Raul, Silvana e Stela, a mais velha, que se vê diante do mesmo dilema da mãe: casar-se a viver para a família, ou seguir uma carreira profissional. Stela se espelha em Laura, amiga de Sílvia, uma mulher que se caracteriza pela total independência em relação às tradições. Jornalista, escritora e desquitada, Laura se impões pela simpatia e forte personalidade.');
/*!40000 ALTER TABLE `novelas` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-29 10:28:27
