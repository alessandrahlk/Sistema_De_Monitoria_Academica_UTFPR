-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: monitoria
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aprovacao`
--

DROP TABLE IF EXISTS `aprovacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aprovacao` (
  `login` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `aprovacao` varchar(10000) DEFAULT NULL,
  `obs` varchar(400) NOT NULL,
  PRIMARY KEY (`tipo`),
  KEY `login` (`login`),
  CONSTRAINT `aprovacao_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aprovacao`
--

LOCK TABLES `aprovacao` WRITE;
/*!40000 ALTER TABLE `aprovacao` DISABLE KEYS */;
INSERT INTO `aprovacao` VALUES ('damasceno','2','0','Não há bolsas suficientes para todas as disciplinas do departamento DACOM.'),('damasceno','3','1','Aprovado.');
/*!40000 ALTER TABLE `aprovacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenacao`
--

DROP TABLE IF EXISTS `coordenacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenacao` (
  `departamento` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `departamento` (`departamento`),
  CONSTRAINT `coordenacao_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenacao`
--

LOCK TABLES `coordenacao` WRITE;
/*!40000 ALTER TABLE `coordenacao` DISABLE KEYS */;
INSERT INTO `coordenacao` VALUES ('DACOM','damasceno');
/*!40000 ALTER TABLE `coordenacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datas`
--

DROP TABLE IF EXISTS `datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datas` (
  `login` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`),
  CONSTRAINT `datas_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datas`
--

LOCK TABLES `datas` WRITE;
/*!40000 ALTER TABLE `datas` DISABLE KEYS */;
INSERT INTO `datas` VALUES ('damasceno',1,'Coordenação','2017-08-19 00:00:00','2019-02-21 00:00:00'),('damasceno',2,'Chefe de departamento','2017-08-19 00:00:00','2019-02-21 00:00:00'),('damasceno',3,'Diretoria de graduação','2017-08-19 00:00:00','2019-02-21 00:00:00'),('damasceno',5,'Alunos - Prazo para inscrições','2017-08-19 00:00:00','2019-02-21 00:00:00'),('damasceno',6,'Alunos - Data do resultado','0000-00-00 00:00:00','2019-02-21 00:00:00'),('damasceno',7,'Alunos - Prazo para recursos','2017-08-19 00:00:00','2019-02-21 00:00:00');
/*!40000 ALTER TABLE `datas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `departamento` varchar(100) NOT NULL,
  PRIMARY KEY (`departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES ('DACHS'),('DACIN'),('DACOM'),('DAELE'),('DAMAT'),('DAMEC'),('nenhum');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina` (
  `codigo` varchar(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `departamento` varchar(10) NOT NULL,
  `login_coordenador` varchar(100) NOT NULL,
  `orientador` varchar(100) NOT NULL,
  `n_bolsistas` int(11) NOT NULL,
  `n_voluntarios` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `departamento` (`departamento`),
  KEY `login_coordenador` (`login_coordenador`),
  CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`departamento`),
  CONSTRAINT `disciplina_ibfk_2` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`departamento`),
  CONSTRAINT `disciplina_ibfk_3` FOREIGN KEY (`login_coordenador`) REFERENCES `coordenacao` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina`
--

LOCK TABLES `disciplina` WRITE;
/*!40000 ALTER TABLE `disciplina` DISABLE KEYS */;
INSERT INTO `disciplina` VALUES ('EC33C','Equações Diferenciais','DACOM','damasceno','Leona Kikuchi',1,2),('EC33E','Programação Orientada a Objetos','DACOM','damasceno','Alessandra Harumi Lopes Kikuchi',3,0),('EC37G','Processamento Digital de Sinais','DACOM','damasceno','Luis José',1,3),('EC38D','Segurança e Auditoria de Sistemas','DACOM','damasceno','Mike Patrick Mercante',2,1),('GHS12','Tópicos de Planejamento Industrial','DAELE','damasceno','Ana Maria ',3,3),('HASH2','Princípios de Resistência dos Materiais','DACIN','damasceno','Julio José',7,1),('HDNS','Engenharia de Manutenção','DAELE','damasceno','Maria da Silva',3,1),('HSGD2','Eficiência Energética 1','DAELE','damasceno','Karina Joaquina da Silva',2,3),('IAHS56','Máquinas Elétricas 1','DACIN','damasceno','Lucas Pereira',2,1),('IGHJ2','Matemática 1','DAMAT','damasceno','José da Silva',4,4),('NAHS2','Probabilidade e Estatística','DACIN','damasceno','José da Silva Pereira Maria José',3,2),('NDJ','Sistemas Térmicos III','DAMEC','damasceno','Jonas L. José',2,3),('NHSM2','Simulação de Sistemas de Produção','DACIN','damasceno','Luana Menezes da Silva',3,4),('NSBD','Tecnologia e Sociedade','DAELE','damasceno','João Soares',3,1),('NSBJ2','Termodinâmica II','DAMEC','damasceno','Mariana Bandeirantes Lopes',2,4),('NSBS2','Gestão Mercadológica','DAELE','damasceno','Alexandre Hideki da Silva',2,4),('OC31F','Tópicos Avançados em Gerenciamento de Projeto Software','DACOM','damasceno','Luana Menezes',2,3),('SBHS1','Mecânica dos Sólidos I','DAMEC','damasceno','Josiane Soares',2,1),('SHBDK','Otimização da Confiabilidade de Sistemas','DAELE','damasceno','Lyana Stark',1,6);
/*!40000 ALTER TABLE `disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplina_equivalente`
--

DROP TABLE IF EXISTS `disciplina_equivalente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplina_equivalente` (
  `disciplina` varchar(10) NOT NULL,
  `codigo_eq` varchar(10) NOT NULL,
  `nome_eq` varchar(100) NOT NULL,
  `cod_pre_eq` varchar(10) NOT NULL,
  `nome_pre_eq` varchar(100) NOT NULL,
  KEY `disciplina` (`disciplina`),
  CONSTRAINT `disciplina_equivalente_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplina_equivalente`
--

LOCK TABLES `disciplina_equivalente` WRITE;
/*!40000 ALTER TABLE `disciplina_equivalente` DISABLE KEYS */;
INSERT INTO `disciplina_equivalente` VALUES ('EC37G','ET65B','Processamento Digital de Sinais','BN76C','Matemática 1'),('EC37G','IF67F','Processamento Digital de Sinais','IJ34D','Cálculo Integral e Diferencial'),('EC37G','ET65B','Processamento Digital de Sinais','BN77C','Eletrônica 3'),('EC37G','IF67F','Processamento Digital de Sinais','IK54V','Eletrônica Digital'),('EC38D','AN36B','Segurança e Auditoria de Sistemas','IKH23B','Redes de Computadores'),('EC38D','IF56B','Segurança e Auditoria de Sistemas','IKH24B','Redes de Computadores'),('EC38D','IF64J','Segurança e Auditoria de Sistemas','IKH25B','Redes de Computadores'),('EC38D','IF68D','Segurança e Auditoria de Sistemas','IKH26B','Redes de Computadores'),('EC33C','MA33C','Matemática 2','JSKH2B','Cálculo Integral e Diferencial'),('EC33C','MA63B','Equações Diferenciais','JH23V','Matemática 1'),('EC33C','MA33C','Matemática 2','JHSKB','Matemática 1'),('EC33C','MA63B','Equações Diferenciais','NSBI23','Cálculo Integral e Diferencial'),('EC33E','AN32A','Programação Orientada a Objetos','ECD32','Redes de Computadores'),('EC33E','IF52E','Programação Orientada a Objetos','EC32D','Algoritmos'),('EC33E','IF63B','Programação Orientada a Objetos','EC32D','Algoritmos'),('EC33E','IF64D','Programação Orientada a Objetos','ECB1B','Algoritmos'),('EC33E','A','a','a',' a'),('IAHS56','AHS','Eletrônica','',''),('HASH2','CBA321','Princípios de Resistência dos Materiais','',''),('HASH2','ABD123','Princípios de Resistência dos Materiais','',''),('HASH2','HJS124','Princípios de Resistência dos Materiais','',''),('HASH2','JKSL2','Princípios de Resistência dos Materiais','',''),('NHSM2','JSHB','Topografia e Georreferenciamento','',''),('NHSM2','HDJK','Técnicas de Alta Tensão','JKS1','Sistemas de Potência 2'),('NHSM2','HDJK','Técnicas de Alta Tensão','JSH1','Sistema de Potência 1'),('NHSM2','NSBB','Planejamento de Sistemas Energéticos','',''),('GHS12','HSBSA','Matemática 2','HSB2','Análise de algoritmos'),('GHS12','NSBS','Matemática 1','JSBS','Análise de algoritmos 2'),('HDNS','AAA','as','blabla','bla'),('NSBS2','BHAJ','Fontes Alternativas de Energia','NABS','Teste'),('NSBS2','HSBS','Linhas de Transmissão','SNSB','Testando'),('NSBS2','BHAJ','Fontes Alternativas de Energia','SBHA','Teste2'),('NDJ','NSB','Lógica de Programação','',''),('NDJ','BVS','Algoritmos','',''),('NDJ','BSN','Matemática Computacional','JSN','Matemática 1'),('NSBJ2','BAB','Bla bla','',''),('SBHS1','JSHS','Eletrônica','',''),('IGHJ2','IGHJ','Matemática I','IJDK','Cálculo 1'),('IGHJ2','IGHJ','Matemática I','KSJD','Equações diferenciais');
/*!40000 ALTER TABLE `disciplina_equivalente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricao`
--

DROP TABLE IF EXISTS `inscricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricao` (
  `login` varchar(100) NOT NULL,
  `disciplina` varchar(100) NOT NULL,
  `equivalente` varchar(100) NOT NULL,
  `nota` float NOT NULL,
  `coeficiente` float NOT NULL,
  `pre_requisitos` varchar(100) NOT NULL,
  `notas_pre` varchar(100) NOT NULL,
  `media` float NOT NULL,
  `verificacao` int(11) NOT NULL,
  KEY `login` (`login`),
  KEY `disciplina` (`disciplina`),
  CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`login`) REFERENCES `usuario_aluno` (`login`),
  CONSTRAINT `inscricao_ibfk_2` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricao`
--

LOCK TABLES `inscricao` WRITE;
/*!40000 ALTER TABLE `inscricao` DISABLE KEYS */;
INSERT INTO `inscricao` VALUES ('a901440','EC33C','MA63B',8.9,7.65,' | NSBI23 | JH23V |',' | 8.3 | 7.3 |',8.01167,0),('a1349643','EC33C','MA33C',9.2,2,' | JHSKB | JSKH2B |',' | 2.3 | 4.6 |',4.35667,0),('a1349643','EC33E','',9.4,4.56,' | OGH67A |',' | 8.5 |',7.633,0);
/*!40000 ALTER TABLE `inscricao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `n_bolsas`
--

DROP TABLE IF EXISTS `n_bolsas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `n_bolsas` (
  `departamento` varchar(30) NOT NULL,
  `n_bol` int(11) NOT NULL,
  `n_vol` int(11) NOT NULL,
  PRIMARY KEY (`departamento`),
  CONSTRAINT `n_bolsas_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `n_bolsas`
--

LOCK TABLES `n_bolsas` WRITE;
/*!40000 ALTER TABLE `n_bolsas` DISABLE KEYS */;
INSERT INTO `n_bolsas` VALUES ('DACIN',1,1),('DACOM',10,20),('DAELE',22,22),('DAMAT',12,43);
/*!40000 ALTER TABLE `n_bolsas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pre_requisito`
--

DROP TABLE IF EXISTS `pre_requisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pre_requisito` (
  `codigo_disciplina` varchar(10) NOT NULL,
  `codigo_pre` varchar(10) NOT NULL,
  `nome_pre` varchar(100) NOT NULL,
  KEY `codigo_disciplina` (`codigo_disciplina`),
  CONSTRAINT `pre_requisito_ibfk_1` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pre_requisito`
--

LOCK TABLES `pre_requisito` WRITE;
/*!40000 ALTER TABLE `pre_requisito` DISABLE KEYS */;
INSERT INTO `pre_requisito` VALUES ('EC37G','EC34B','Métodos de Matemática Aplicada'),('EC37G','EC35E','Eletrônica Digital'),('EC38D','EC37E','Redes de Computadores'),('EC33E','OGH67A','Algoritmos'),('OC31F','ABC','Análise de algoritmos'),('EC33C','ABC','Teste'),('HASH2','IDH23','Física 4'),('HASH2','IKJ23','Física 3'),('HASH2','KSJ34','Física 2'),('HASH2','JSLD4','Física 1'),('NAHS2','KDHD','Cálculo Diferencial e Integral 1'),('NAHS2','JDBJS','Geometria Analítica e Álgebra Linear'),('NHSM2','JBDS','Redes de Distribuição'),('GHS12','JASN','Confiabilidade, Mantenabilidade e Disponibilidade de Sistemas'),('HDNS','HASV','Lógica de programação'),('NDJ','MSN','Sistemas de Qualidade'),('NDJ','MNS','Máquinas de Fluxo'),('NSBJ2','NBSH','Cálculo Numérico'),('NSBJ2','JSG','Matemática Aplicada'),('IGHJ2','IJDM','Cálculo diferencial e integral 1'),('IGHJ2','NCMS','Matemática 2'),('IGHJ2','BSFJ','Equações diferenciais');
/*!40000 ALTER TABLE `pre_requisito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `nome_dep` varchar(10) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`login`),
  KEY `nome_dep` (`nome_dep`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nome_dep`) REFERENCES `departamento` (`departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','admin','DACIN',11,'Ativo'),('EDUARDO  FILGUEIRAS DAMASCENO','damasceno','DACOM',4,'Ativo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_aluno`
--

DROP TABLE IF EXISTS `usuario_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_aluno` (
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_aluno`
--

LOCK TABLES `usuario_aluno` WRITE;
/*!40000 ALTER TABLE `usuario_aluno` DISABLE KEYS */;
INSERT INTO `usuario_aluno` VALUES ('ALESSANDRA HARUMI LOPES KIKUCHI','a1349643','Engenharia de Computação',5,'Ativo'),('MIKE PATRICK MERCANTE','a901440','Engenharia Eletrônica',5,'Ativo');
/*!40000 ALTER TABLE `usuario_aluno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-30  9:15:17
