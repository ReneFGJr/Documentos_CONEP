-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 09:47 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nep`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
`id_doc` bigint(20) unsigned NOT NULL,
  `doc_descricao` char(100) NOT NULL,
  `doc_folder` char(100) NOT NULL,
  `doc_ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id_doc`, `doc_descricao`, `doc_folder`, `doc_ativo`) VALUES
(1, 'Resoluções CNS/CONEP', '_documentos/Resolucao/', 1),
(2, 'Termo de assentimento', '_documentos/Modelos/', 1),
(3, 'TCLE', '', 1),
(4, 'Carta Circular CONEP', '_documentos/CC_CONEP/', 1),
(5, 'Norma Operacional', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documentos_ged`
--

CREATE TABLE IF NOT EXISTS `documentos_ged` (
`id_dg` bigint(20) unsigned NOT NULL,
  `dg_nrdoc` char(25) NOT NULL,
  `dg_documento` int(5) NOT NULL,
  `dg_descricao` char(200) NOT NULL,
  `dg_ano` char(8) NOT NULL,
  `dg_data` char(80) NOT NULL,
  `dg_local` char(100) NOT NULL,
  `dg_status` int(11) NOT NULL,
  `dg_keyword` char(200) NOT NULL,
  `dg_update` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `documentos_ged`
--

INSERT INTO `documentos_ged` (`id_dg`, `dg_nrdoc`, `dg_documento`, `dg_descricao`, `dg_ano`, `dg_data`, `dg_local`, `dg_status`, `dg_keyword`, `dg_update`) VALUES
(1, '466/12', 1, 'Resolução de Ética em Pesquisa', '2012', '12 de Dezembro', '_documentos/Resolucao/Reso466.pdf', 1, 'Resolução', 20150422),
(2, '441/11', 1, 'Resolução de BioBanco e Biorepositório', '2011', '12 de maio', '_documentos/Resolucao/Reso441.pdf', 1, 'Biobanco; Biorepositório; Resolução', 20150422),
(3, '346/05', 1, 'Projetos multicêntricos', '2005', '13 de Janeiro', '_documentos/Resolucao/Reso346.pdf', 1, 'Resolução; Multicêntricos', 20150422),
(4, '340/04', 1, 'Aprova as Diretrizes para Análise Ética e Tramitação dos Projetos de Pesquisa da Área Temática', '2004', '8 de Julho', '_documentos/Resolucao/Reso340.pdf', 1, '', 0),
(5, '304/00', 1, 'Contempla norma complementar para a Área de Pesquisas em Povos Indê­genas', '2000', '9 de Agosto', '_documentos/Resolucao/Reso304.pdf', 1, '', 0),
(6, '301/00', 1, 'Contempla o posicionamento do CNS e CONEP contário a modificações da Declaração de Helsinque', '2000', '16 de Março', '_documentos/Resolucao/Reso301.pdf', 1, '', 0),
(7, '292/99', 1, 'Regulamentação da Res. CNS 292/99 sobre pesquisas com cooperação estrangeira', '1999', '8 de Julho', '_documentos/Resolucao/Reso292.pdf', 1, '', 0),
(8, '251/97', 1, 'Contempla o posicionamento do CNS e CONEP contário a modificações da Declaração de Helsinque.', '1997', '7 de Agosto', 'http://localhost/projeto/CEP-PUCPR/_documentos/Resolucao/Reso251.doc', 1, '', 0),
(9, '240/97', 1, 'Define representação de usuários nos CEPs e orienta a escolha.', '1997', '5 de Junho', '_documentos/Resolucao/Reso240.pdf', 1, '', 0),
(10, '196/96', 1, 'Resolução de Ética em Pesquisa 196/96', '1996', '10 de Outubro', '_documentos/Resolucao/Reso196.pdf', 2, '', 0),
(11, '421/09', 1, 'Complemento Resolução 196/96', '2009', '18 de Julho', '_documentos/Resolucao/Reso421.pdf', 2, '', 0),
(12, '212/2010', 4, 'Definição de Instituição Sediadora e Vinculada (proponente/co-participante)', '2010', '21 de Outubro', '_documentos/CC_CONEP/OC212.pdf', 1, 'Proponente; Colaborada; Sediado; Vinculada; Coparticipante', 0),
(13, '025/2013', 4, 'Definição da Ídade mínima para cadastro na Plataforma Brasil', '2013', '01 de Fevereiro', '_documentos/CC_CONEP/OC025.pdf', 1, '', 0),
(14, '121/2012', 4, 'Área temática especial errada deve ser convertida em pendência', '2012', '31 de Julho', '_documentos/CC_CONEP/OC212.pdf', 1, '', 0),
(15, '177/2012', 4, 'Cadastramento de Instituicoes na Plataforma', '2012', '28 de Setembro', '_documentos/CC_CONEP/OC177.pdf', 1, '', 0),
(16, '061/2012', 4, 'Comunicado sobre a elaboracao e organização cronograma', '2012', '04 de Maio', '_documentos/CC_CONEP/OC061.pdf', 1, 'Cronograma', 0),
(17, '039/2011', 4, 'Uso de dados de prontuários para fins de Pesquisa', '2011', '30 de Setembro', '_documentos/CC_CONEP/OC039.pdf', 1, '', 0),
(18, '062/2011', 4, 'Inclusão, Exclusão, Alteração de Centro Coordenador e alteração de Investigador principal', '2011', '19 de Julho', '_documentos/CC_CONEP/OC062.pdf', 1, '', 0),
(19, '060/2011', 4, 'Lista de checagem para tramitação de resposta/recurso à CONEP', '2011', '14 de Julho', '_documentos/CC_CONEP/OC060.pdf', 1, 'Checklist; Recurso; Lista de checagem', 0),
(20, 'NO001/2013', 5, 'Norma Operacional CONEP', '2013', 'não definida', '_documentos/NO/NO001.pdf', 1, 'Norma Operacional', 0),
(21, '003/2011', 4, 'Obrigatoriedade de rubrica em todas as páginas do TCLE pelo sujeito de pesquisa ou seu responsável e pelo pesquisador', '2011', '21 de março', '_documentos/CC_CONEP/CC003.pdf', 1, 'rubrica; TCLE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `documentos_status`
--

CREATE TABLE IF NOT EXISTS `documentos_status` (
`id_ds` bigint(20) unsigned NOT NULL,
  `ds_descricao` char(30) NOT NULL,
  `ds_cor` char(7) NOT NULL,
  `ds_ativo` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documentos_status`
--

INSERT INTO `documentos_status` (`id_ds`, `ds_descricao`, `ds_cor`, `ds_ativo`) VALUES
(1, 'Vigente', '#000080', 1),
(2, 'Revogada', '#808000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendencias`
--

CREATE TABLE IF NOT EXISTS `pendencias` (
`id_p` bigint(20) unsigned NOT NULL,
  `p_documento` char(5) NOT NULL,
  `p_descricao` varchar(150) NOT NULL,
  `p_conteudo` text NOT NULL,
  `p_pendencia` text NOT NULL,
  `p_keyword` char(150) NOT NULL,
  `p_update` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `pendencias`
--

INSERT INTO `pendencias` (`id_p`, `p_documento`, `p_descricao`, `p_conteudo`, `p_pendencia`, `p_keyword`, `p_update`) VALUES
(1, '', 'Ausência de critérios de inclusão e exclusão', 'Os critérios de inclusão e exclusão não foram especificados no protocolo ou estão de forma inadequada;', 'Segundo a Norma Operacional CNS nº 001 de 2013, item 3.4.11, todos os protocolos de pesquisa devem conter, obrigatoriamente, os critérios de inclusão e exclusão e estes devem ser apresentados de acordo com as exigências da metodologia a ser estudada. Assim, seria necessário, informar a modalidade de seleção, bem como a idade dos participantes. Não foram apresentados os critérios de inclusão / exclusão dos participantes da pesquisa. Solicita-se\r\ninserir no projeto os referidos critérios.', 'Critério de inclusão; Critério de exclusao', 20150422),
(2, '', 'Ausência do termo de assentimento', 'O termo de assentimento não foi apresentado ou está em linguagem inapropriada', 'Como o estudo envolve crianças, o Termo de Assentimento deve ser elaborado para as crianças, em linguagem clara em consonância com a idade e o nível de conhecimento delas, conforme disposto no item II.24 da Resolução CNS nº 466 de 2012. Visando garantir os direitos dos participantes da pesquisa e seus representantes legais, imprescindível se faz um Termo de Assentimento para crianças e um Termo de Consentimento Livre e Esclarecido para os pais/responsáveis da criança.', 'Termo de assentimento; crianças; menores de 18 anos; adolecentes', 20150422),
(3, '', 'Vincular indenização a comprovação judicial ou extrajudicial', 'Restringir no TCLE a indenização conforme decisão judicial ou extrajudicial.', 'Na página X de N, lê-se "Fica também garantida indenização em casos de danos, COMPROVADAMENTE DECORRENTES DA PARTICIPAÇÃO NA PESQUISA, conforme decisão judicial ou extrajudicial." (destaque nosso). Cabe ressaltar que a responsabilidade pela prestação de cuidados integrais de saúde pelo tempo que for necessário para o tratamento não pode estar vinculada à comprovação de relação direta com a participação no estudo, devido à própria dificuldade prática em comprovar esse vínculo. Assim sendo, danos diretos ou indiretos, imediatos ou tardios sofridos no decorrer da participação devem ser acompanhados e tratados pelo pesquisador e seu patrocinador, mesmo que não seja estabelecido nexo causal.', 'TCLE; Indenização; Comprovação Judicial; Comprovação Extrajudicial', 20150422),
(4, '', 'Falta de espaço para assinatura do menor no termo de assentimento', 'No termo de assentimento deve constar espaço para assinatura do menor e do pesquisador.', 'No Termo de Assentimento não é opcional a assinatura do menor. É obrigatória a assinatura dele, tendo em vista que o termo é direcionado a ele, bem como o espaço para assinatura do pesquisador.', 'Termo de Assentimento; Assinatura do menor; Assintatura', 20150422),
(5, '', 'Descreve quais os procedimento e métodos realizados durante o estudo', 'Não descreve em linguagem simples os procedimentos que os participantes da pesquisa serão submetidos, sua duração e local.', 'Recomenda-se que seja descrito, DE FORMA CLARA E OBJETIVA, quais serão os procedimentos e métodos realizados durante o estudo, isto é, deve-se descrever de forma detalhado todos os procedimentos que serão empregados no estudo, como por exemplo, descrever como será realizada a coleta dos dados específicos, se esses serão pessoalmente contatados, entre outros (Item IV.3.a, da Resolução CNS nº. 466 de 2012). Solicita-se que os procedimentos adotados estejam explicitados de forma menos sintética no TCLE, informando-se, por exemplo, local e momento em que ocorrerão as entrevistas e os tópicos', 'TCLE; procedimentos para o participante', 20150422),
(6, '', 'No TCLE está escrito a palavra CÓPIAS, substituir por VIAS', 'Substituição da palavra "cópia" por "via" no TCLE', 'Recomenda-se informar no TCLE que este deverá ser assinado em duas VIAS, ficando uma retida com o pesquisador responsável/ pessoa por ele delegada e a outra com o participante/ responsável legal. Salienta-se que as páginas de assinaturas devem estar na mesma folha de assinatura.', 'TCLE; Cópias; Vias', 20150422),
(7, '', 'Espaço para rubrica em todas as páginas', 'Deve-se ter espaço somente nas páginas que não contenham assinatura', 'Recomenda-se informar no TCLE que todas as páginas deverão ser rubricadas pelo pesquisador responsável/ pessoa por ele delegada e pelo participante/ responsável legal.', 'TCLE; Rubrica; Paginação', 20150422),
(8, '', 'Falta de contato com o CEP que acompanha o estudo', 'Incluir texto: O Comitê de Ética em Pesquisa em Seres Humanos (CEP) é composto por um grupo de pessoas que estão trabalhando para garantir que seus direitos como participante de pesquisa sejam respeitados. Ele tem a obrigação de avaliar se a pesquisa foi planejada e se está sendo executada de forma ética. Se você achar que a pesquisa não está sendo realizada da forma como você imaginou ou que está sendo prejudicado de alguma forma, você pode entrar em contato com o Comitê de Ética em Pesquisa da PUCPR (CEP) pelo telefone (41) 3271-2292 entre segunda e sexta-feira das 08h00 as 17h30 ou pelo e-mail nep@pucpr.br.', 'Não foi apresentada nenhuma forma de contato com o CEP responsável pelo acompanhamento do estudo. Recomenda-se incluir também uma breve descrição do que é o CEP, qual sua função no estudo, seu endereço, contato telefônico e horário de funcionamento.', 'TCLE; CEP; Contato com o CEP', 20150422),
(9, '', 'O TCLE não apresenta a numeração das páginas. ', 'Todas as páginas do TCLE devem ser numeradas.', 'O TCLE não apresenta a numeração das páginas. Para garantir a integridade do documento, recomenda-se que sejam inseridos os números de cada página, bem com a quantidade total delas, como por exemplo: "1 de 5" e assim sucessivamente até a página "5 de 5".', 'TCLE; Numeração de páginas', 20150422),
(10, '', 'Utilização do termo "sujeito" de pesquisa', '', 'Na página X de N, onde se lê “sujeito de pesquisa”, deve ser substituído por “participante da pesquisa”, conforme preconizado na Resolução CNS nº 466 de 2012 item II.10. Recomenda-se adequação.', 'TCLE; Sujeito de pesquisa', 20150422),
(11, '', 'Utilização do termo "paciente"', '', 'Na página X de N, onde se lê “paciente”, deve ser substituído por “participante da pesquisa”, conforme preconizado na Resolução CNS nº 466 de 2012 item II.10. Recomenda-se adequação.', 'TCLE; Paciente', 20150422),
(12, '', 'Indicação de área temática especial incorretamente', 'Áreas temáticas especiais', 'Diante do exposto, o CEP entende que o protocolo de pesquisa não se enquadra na Área Temática Especial “<<NOME DA TEMÁTICA>>” (considerando as\r\ninformações do item IX.4 da Resolução CNS nº 466/2012), devendo ser desmarcado do projeto.', 'Projeto; Área temática especial', 20150422),
(13, '', 'Folha de rosto assinada e datada', '', 'Quanto a "Folha de rosto": De acordo com a Norma Operacional CNS nº 001 de 2013, item 3.3.a – "Folha de rosto: TODOS os campos devem ser PREENCHIDOS, DATADOS E ASSINADOS, com identificação dos signatários. As informações prestadas devem ser compatíveis com as do protocolo. A identificação das assinaturas DEVE CONTER, com clareza, o NOME COMPLETO E A FUNÇÃO de quem assina, preferencialmente, indicados por carimbo. O título da pesquisa será apresentado em língua portuguesa e será idêntico ao do projeto de pesquisa". (Destaque\r\nnosso). A Folha de Rosto é um documento que dá consistência jurídica ao projeto e, portanto, o compromisso assumido pelo responsável legal em nome da Instituição e do patrocinador deve estar datado, uma vez que em momento futuro aquele poderá não ser mais o responsável e isso dará maior respaldo às partes envolvidas, caso seja necessário. ', 'Folha de rosto; Assinatura', 20150422),
(14, '', 'Cronograma da pesquisa', 'Cronograma inadequado, com indícios de pesquisa já iniciada.', 'Na Norma Operacional CNS nº 001 de 2013, item 3.3.f., lê-se: "Cronograma que descreva a duração total e as diferentes etapas da pesquisa, com compromisso explícito do pesquisador de que a pesquisa somente será iniciada a partir da aprovação pelo Sistema CEP-CONEP". Sendo assim, o cronograma não está adequado, pois informa que o estudo já teve início. Solicita-se esclarecimento e, caso necessário, solicita-se adequação do cronograma com relação à data de início do estudo, dado que o mesmo ainda se\r\nencontra em análise no sistema CONEP/CEP até a presente data e quanto ao detalhamento das fases/etapas.', 'Projeto; Pesquisa já iniciada; Indícios de pesquisa iniciada; Cronograma', 20150422),
(15, '', 'Orçamento da pesquisa', 'Orçamento inadequado', 'Na Norma Operacional nº 001 de 2013, item 3.3.e. lê-se: "Orçamento financeiro: detalhar os recursos, fontes e destinação; forma e valor da remuneração do pesquisador; [...]; apresentar previsão de ressarcimento de despesas do participante e seus acompanhantes, quando necessário, tais como transporte e alimentação e compensação material nos casos ressalvados no item II.10 da Resolução do CNS 466/12". Sendo assim, solicita-se inserir orçamento financeiro detalhado, que especifique TODOS OS RECURSOS, FONTES E DESTINAÇÃO, EM ESPECIAL OS CUSTOS OPERACIONAIS (recursos humanos e materiais), bem como a previsão de ressarcimento tais como transporte e alimentação (mas não restritos unicamente a essas) nos dias em que for necessária sua presença, prevendo ainda os gastos com acompanhantes quando for necessário.', 'Projeto; Orçamento', 20150422),
(16, '', 'TCLE em forma de convite', 'O TCLE deve ser escrito na forma de convite.', 'De acordo com a Resolução CNS nº 466 de 2012, item IV: "Do processo de consentimento livre e esclarecido: Entende-se por Processo de Consentimento Livre e Esclarecido todas as etapas a serem necessariamente observadas para que o CONVIDADO a participar de uma pesquisa possa se manifestar, de forma autônoma, consciente, livre e esclarecida". (Destaque nosso). O Termo de Consentimento Livre e Esclarecido apresentado foi redigido em forma de declaração. O documento de consentimento deve ser apresentado ao participante da pesquisa em forma de convite. Cabe ao pesquisador informar todos os procedimentos do estudo e as garantias do participante da pesquisa para, ao final, solicitar sua anuência. Portanto, solicita-se que o início do TCLE apresente um parágrafo convidando o candidato a participar da\r\npesquisa. ', 'TCLE; Convite ao estudo', 20150422),
(17, '', 'Pesquisa com Métodos terapeticos alternativos - metodologias experimentais', 'Apresentar métodos alternativos quando pertinente.', 'Conforme Resolução CNS nº 466 de 2012, item IV.4.a, o Termo de Consentimento Livre e Esclarecido nas pesquisas que utilizam metodologias experimentais na área biomédica, envolvendo seres humanos deve observar explicitar, quando pertinente, os métodos terapêuticos alternativos existentes.  Solicita-se acrescer esta informação para esclarecer ao participante de pesquisa as alternativas ao tratamento proposto para que sua participação ocorra de maneira autônoma.', 'TCLE; Métodos terapêuticos alternativos; Métodos experimentais', 20150422),
(18, '', 'Assistência ao participante da pesquisa', '', 'Conforme a Resolução CNS nº 466 de 2012, item II: "DOS TERMOS E DEFINIÇÕES - 3 - assistência ao participante da pesquisa: II.3.1 - assistência imediata - é aquela emergencial e sem ônus de qualquer espécie ao participante da pesquisa, em situações em que este dela necessite; e II.3.2 - assistência integral - é aquela prestada para atender complicações e danos decorrentes, direta ou indiretamente, da pesquisa". Dessa forma, solicita-se que seja expresso de modo claro e afirmativo o direito de assistência integral gratuita devido a danos diretos e indiretos, imediatos e tardios pelo tempo que for necessário ao participante da pesquisa, garantido pelo patrocinador. Solicita-se adequação.\r\n\r\nNão consta a garantia de prestação de assistência imediata/tardia, sem ônus de qualquer espécie ao participante da pesquisa, em situações em que este dela necessite. Ressalta-se que é de responsabilidade do pesquisador, do patrocinador do estudo e das instituições participantes, a prestação de assistência imediata/tardia e acompanhamento do participante da pesquisa, conforme item II.3.1 da Resolução CNS nº 466 de 2012.', 'TCLE; Assistência ao participante', 20150422),
(19, '', 'Forma de assistência e acompanhamento ao participante da pesquisa', 'Formas de assistência durante o estudo', 'De acordo com a Resolução CNS nº 466 de 2012, lê-se: "IV.3 - O Termo de Consentimento Livre e Esclarecido deverá conter, obrigatoriamente: c) esclarecimento sobre A FORMA DE ACOMPANHAMENTO E ASSISTÊNCIA A QUE TERÃO DIREITO OS PARTICIPANTES DA PESQUISA, inclusive considerando benefícios e acompanhamentos posteriores ao encerramento e/ ou a interrupção da pesquisa". (Destaque nosso). Logo, solicita-se esclarecimento sobre a forma de acompanhamento e assistência a que terão direito os participantes da pesquisa.', 'TCLE; Assistência ao participante', 20150422),
(20, '', 'Ressarcimento ao participante e seu acompanhante', '', 'De acordo com a Resolução CNS nº 466 de 2012, item IV.3. "O Termo de Consentimento Livre e Esclarecido deverá conter, obrigatoriamente: g) explicitação da garantia de ressarcimento e como serão coberta as despesas tidas pelos participantes de pesquisa e dela decorrentes". Sendo assim, solicita-se incluir no TCLE a garantia de ressarcimento e o modo como deverá ser realizado o ressarcimento das despesas do participante da pesquisa e de seu acompanhante, quando necessário (como exemplo pode-se citar transporte e alimentação, dentre outros).', 'TCLE; Ressarcimento; Acompanhante do participante da pesquisa; Restituição', 20150422),
(21, '', 'Acesso aos resultados da pesquisa ou exames', '', 'De acordo com a Resolução CNS nº 251 de 1997, item III.2, "o pesquisador responsável deverá: i - Dar acesso aos resultados de exames e de tratamento ao médico do paciente e ou ao próprio paciente sempre que solicitado e ou indicado". Logo, solicita-se apresentar no TCLE o direito à garantia de acesso aos resultados dos exames.', 'TCLE; Resultado de exames; Acesso aos resultados dos exames', 20150422),
(22, '', 'Garantias de indenização por eventuais danos', '', 'De acordo com a Resolução CNS nº 466 de 2012, item IV.3: "O Termo de Consentimento Livre e Esclarecido deverá conter, obrigatoriamente: explicitação da garantia de indenização diante de eventuais danos decorrentes da pesquisa". Solicita-se inserir no TCLE a explicitação da garantia de indenização diante de eventuais danos decorrentes da pesquisa.', 'TCLE; Indenização; Eventuais danos ao participante; Garantia de indenização', 20150422),
(23, '', 'Elaboração do TCLE, assinatura e rúbrica', '', 'De acordo com a Resolução CNS nº 466 de 2012, item IV.5, "o Termo de Consentimento Livre e Esclarecido deverá, ainda: ser elaborado em DUAS VIAS, rubricadas em todas as suas páginas e assinadas, ao seu término, pelo convidado a participar da pesquisa, ou por seu representante legal, assim como pelo pesquisador responsável, ou pela (s) pessoa (s) por ele delegada (s), devendo as páginas de assinaturas estar na mesma folha.', 'TCLE; Cópias; Vias; Assinatura; Rubrica', 20150422),
(24, '', 'Formas de contato com o CEP/CONEP', '', 'Não foi apresentada nenhuma forma de contato com o CEP responsável pelo acompanhamento do estudo ou com o pesquisador responsável. Solicita-se que seja incluída no TCLE uma breve descrição do que é o CEP, qual sua função no estudo, seu endereço, contato telefônico e horário de funcionamento.', 'TCLE; CEP; Contato com o CEP', 20150422),
(25, '', 'Armazenamento de material biológico', '', 'Conforme a Resolução CNS nº 441 de 2011, item V.2.II "consentimento do sujeito da pesquisa, autorizando a coleta, o depósito, o armazenamento e a utilização do material biológico humano." Sendo assim, solicita-se incluir no TCLE o pedido de consentimento para coleta, o depósito, o armazenamento e a utilização do material biológico humano no exterior (se pertinente), bem como explicitar o local onde ficarão armazenadas as amostras biológicas (com endereço).', 'TCLE; Biorepositório; Depósito de material biológico; Envio de amostra para o exterior', 20150422),
(26, '', 'Retirada do consentimento de armazenamento de material biológico', '', 'Na Portaria MS nº 2.201 de 2011, art. 6º, lê-se: "A retirada do consentimento de guarda da amostra biológica humana em biorrepositório ou biobanco, pelo sujeito da pesquisa, ou seu representante legal, dar-se-á a qualquer tempo, sem prejuízo ao sujeito, com validade a partir da data da comunicação da decisão. Parágrafo único. A retirada do consentimento será formalizada em documento assinado pelo sujeito da pesquisa ou seu representante legal". De acordo com a Resolução CNS nº 441 de 2011, item 10.I "a\r\nretirada do consentimento será formalizada por manifestação, por escrito e assinada, pelo sujeito da pesquisa ou seu representante legal, cabendo-lhe a devolução das amostras existentes". Solicita-se informar no TCLE que a retirada do consentimento de guarda da amostra biológica humana deverá ser realizada por escrito e que haverá devolução das amostras existentes.', 'TCLE; Biorepositório; Retirada do consentimento;', 20150422),
(27, '', 'Identificação da faixa etária ', '', 'Na página 1 de 3, lê-se: "EU PRECISO PARTICIPAR? Cabe A VOCÊ decidir se quer ou não participar. A sua participação é totalmente voluntária. SE VOCÊ CONCORDAR QUE O SEU FILHO(A) PARTICIPE, vamos então pedir-lhe para assinar este termo de consentimento". E na página X de B, lê-se: "Declaro ainda que recebi todos os esclarecimentos e explicações sobre a referida pesquisa e QUE MINHA DESISTÊNCIA poderá ocorrer em qualquer momento sem que haja qualquer prejuízo do atendimento que estou recebendo ou venha a necessitar. De minha livre e espontânea vontade, assino esta autorização". (Destaque nosso). Não foi possível identificar a faixa etária da população a que a pesquisa se destina. Sendo assim, solicita-se inserir nos critérios de inclusão a faixa etária da população estudada. Caso sejam incluídos menores de idade (crianças e adolescentes) no estudo será necessária a elaboração de dois TCLE, um pedindo autorização para os pais/responsáveis legais do menor e outro para os pacientes com idade igual ou superior a 18, anos, se capazes. Além do TCLE para pais/representantes legais também é necessário apresentar o termo de assentimento (para participantes menores de idade). Assim, solicita-se, se for o caso, anexar na Plataforma Brasil o Termo de Assentimento. Sua elaboração deve atender a Resolução CNS nº 466 de 2012, item II.24 - "documento elaborado em linguagem acessível para os menores ou para os legalmente\r\nincapazes, por meio do qual, após os participantes da pesquisa serem devidamente esclarecidos, explicitarão sua anuência em participar da pesquisa, sem prejuízo do consentimento de seus responsáveis legais".', 'TCLE; Projeto; Termo de assentimento; menores de 18 anos; Critério de inclusão', 20150422),
(28, '', 'Termo de assentimento para diferentes idades', '', 'De acordo com a Resolução CNS nº 466 de 2012, item II.2., "assentimento livre e esclarecido - anuência do participante da pesquisa, criança, adolescente ou legalmente incapaz, livre de vícios (simulação, fraude ou erro), dependência, subordinação ou intimidação. Tais participantes devem ser esclarecidos sobre a natureza da pesquisa, seus objetivos, métodos, benefícios previstos, potenciais riscos e o incômodo que esta possa lhes acarretar, NA MEDIDA DE SUA COMPREENSÃO e respeitados em suas singularidades" e "II.24 - Termo de Assentimento - documento elaborado EM LINGUAGEM ACESSÍVEL para os menores ou para os legalmente incapazes, por meio do qual, após os participantes da pesquisa serem devidamente esclarecidos, explicitarão sua anuência em participar da pesquisa, sem prejuízo do consentimento de seus responsáveis legais". (Destaque nosso). O Termo de Assentimento para menores de idade deve ser elaborado pelo pesquisador em linguagem acessível à compreensão dos sujeitos da pesquisa, EM SUAS DIFERENTES FAIXAS ETÁRIAS, não sendo adequado que seja elaborado somente um Termo de Assentimento para todos os sujeitos menores de 18 anos (tais termos de assentimento ao serem escritos/desenhados deverão seguir as solicitações descritas nos itens em obediência à Resolução CNS nº 466 de 2012). Sendo assim solicita-se, em caso de haver participantes de pesquisa em diferentes faixas etárias (criança e adolescentes), que seja elaborado mais de um Termo de Assentimento com linguagem adequada para cada faixa etária.', 'TCLE; Termo de assentimento; Menores de 18 anos; Adolecentes', 20150422),
(29, '', 'Colaboração de pesquisas envolvendo armazenamento de material biológico', '', 'Na Resolução nº 441 de 2011, lê-se: "No caso de pesquisa envolvendo mais de uma instituição deve haver acordo firmado entre as instituições participantes, contemplando formas de operacionalização, compartilhamento e utilização do material biológico humano armazenado em Biobanco ou Biorrepositório, inclusive a possibilidade de dissolução futura da parceria e a consequente partilha e destinação dos dados e materiais armazenados, conforme previsto no TCLE". De acordo com a Norma Operacional CNS nº 001 de 2013, em seu anexo II, Item 02: "Pesquisa envolvendo mais de uma instituição: Apresentar acordo entre as instituições participantes contemplando operacionalização, compartilhamento, utilização do material biológico humano armazenado em Biorepositório, inclusive a possibilidade de dissolução futura da parceria e a consequente partilha e destinação dos dados e materiais armazenados. (Resolução CNS nº 441 de 2011, item 13; Portaria MS nº 2.201 de 2011, Capítulo IV, seção II, artigo 19)". Logo, solicita-se: 5.1) Apresentar documento de cooperação referente ao acordo firmado entre as instituições. 5.2) Apresentar esclarecimentos sobre o destino das amostras biológicas após o uso.', 'Biobanco; Biorepositório; Cooperação de pesquisa; Termo de cooperação; Destino das amostras biológicas', 20150422),
(30, '', 'Envio de amostra para o exterior, patenteamento e comercialização de material biológico', '', 'Conforme a Norma Operacional CNS nº 001 de 2013, anexo II, item 3.V, "a instituição destinatária no exterior deve comprometer-se a respeitar a legislação brasileira, em especial a vedação do patenteamento e\r\nda utilização comercial de material biológico humano". Solicita-se documentação comprobatória sobre as garantias ao pesquisador do acesso e utilização de material biológico humano depositado no exterior sendo\r\ngarantido no mínimo à proporcionalidade na participação e o compromisso do pesquisador/patrocinador quanto à vedação do patenteamento e da utilização comercial do material biológico humano enviado para o\r\nexterior.', 'Biobanco; Biorepositório; Envio de amostras para o exterior; Patenteamento; Uso comercial de material biológico', 20150422),
(31, '', 'Utilização de material biológicos em outros estudos.', '', 'De acordo com a Resolução CNS nº 292 de 1999, item VII.5. "declaração do uso do material biológico e dos dados e informações coletados exclusivamente para os fins previstos no protocolo, de todos os que vão manipular o material.". Solicita-se inserir uma DECLARAÇÃO sobre o uso do material biológico e dos dados e informações coletados exclusivamente para os fins previstos no protocolo, de todos os que vão manipular o material. Sendo vedada a utilização em outros estudos sem o consentimento por escrito dos participantes.', 'Biobanco; Biorepositório; Use de material biológico', 20150422),
(32, '', 'Destino das amostras biológicas', '', 'Solicitam-se esclarecimentos quanto ao destino das amostras biológicas ao final das análises do estudo, isto é, se as amostras serão ou não destruídas ao final do estudo. Caso as amostras sejam armazenadas com a finalidade de estudos futuros, o pesquisador responsável deverá acrescentar os seguintes documentos (Segundo a Resolução CNS nº 441 de 2011 e Portaria MS nº 2.201 de 2011): Informar o prazo de vigência do biorepositório do estudo, conforme Resolução CNS nº 441 de 2011, itens 2.I e 12.\r\n', 'Biorepositório; Destruição das amostras; Destino das amostras', 20150422),
(33, '', 'Retirada do consentimento de armazenamento de material biológico', '', 'Na Portaria MS nº 2.201 de 2011, art. 6º, lê-se: "A retirada do consentimento de guarda da amostra biológica humana em biorrepositório ou biobanco, pelo sujeito da pesquisa, ou seu representante legal, dar-se-á a qualquer tempo, sem prejuízo ao sujeito, com validade a partir da data da comunicação da decisão. Parágrafo único. A retirada do consentimento será formalizada em documento assinado pelo sujeito da pesquisa ou seu representante legal". De acordo com a Resolução CNS nº 441 de 2011, item 10.I "a\r\nretirada do consentimento será formalizada por manifestação, por escrito e assinada, pelo sujeito da pesquisa ou seu representante legal, cabendo-lhe a devolução das amostras existentes". Solicita-se informar no TCLE que a retirada do consentimento de guarda da amostra biológica humana deverá ser realizada por escrito e que haverá devolução das amostras existentes.', 'TCLE; Biorepositório; Retirada do consentimento', 20150422),
(34, '', 'Utilização de amostras - volume total coletado', '', 'Em relação à coleta das amostras de sangue, solicita-se que seja informado o volume total de sangue a ser retirado.', 'TCLE; Amostra de sangue; Volume total coletado', 20150422),
(35, '', 'Riscos da pesquisa', '', 'Cabe ressaltar que, de acordo com o item V da Resolução CNS nº 466/2012, "considera-se que toda pesquisa envolvendo seres humanos envolve risco. O dano eventual poderá ser imediato ou tardio, comprometendo o indivíduo ou a coletividade". Ressalte-se ainda o item II.22 da mesma resolução que define como "Risco da pesquisa - possibilidade de danos à dimensão física, psíquica, moral, intelectual, social, cultural ou espiritual do ser humano, em qualquer pesquisa e  dela decorrente". Neste sentido, recomenda-se informar no TCLE os riscos decorrentes da pesquisa.\r\n<BR><BR>\r\nA Resolução CNS nº 466 de 2012, no item IV.3.b define que se deve relatar os riscos e possíveis efeitos adversos do tratamento ou da intervenção, tanto os potenciais, individuais ou coletivos, comprometendo-se a informar e utilizar as medidas de urgência e acompanhamento do episódio, no caso de alguma intercorrência. Solicita-se a inserção dessas informações no referido documento.', 'TCLE; Riscos', 20150422),
(36, '', 'Codificação dos instrumentos de coleta de dados', '', 'Considerando que os dados pessoais serão identificados, solicita-se que sejam indicados de modo mais explicativo os procedimentos que garantam o sigilo, confidencialidade e segurança no tratamento dos dados (Item III.2.i e IV.3.e, da Resolução CNS nº 466 de 2012).', 'Coleta de dados; Codificação; Anonimato; garantia do sigilo; confidencialidade; segurança no tratamento dos dados', 20150422),
(37, '', 'Retirada do participante do estudo por gravidez', '', 'Deve ser excluído onde consta que a paciente será retirada do estudo se engravidar, pois se considera que continuarão no estudo pelo fato de terem que ser acompanhadas para avaliação de riscos e eventuais interferências sobre a fertilidade, a gravidez, o embrião ou o feto, o trabalho de parto e o recém-nascido, recebendo assistência quando necessário, assim como o bebê. O que ocorrerá é a descontinuação do tratamento do estudo. Solicita-se adequação (Item III.2.u, da Resolução CNS nº 466 de 2012).', 'TCLE; Retirada do estudo; Gravidez; Assistência; Descontinuação do tratamento do estudo', 20150422),
(38, '', 'Acompanhamento de participantes que engravidadem', '', 'Deve ser assegurado o acompanhamento e a assistência integral e gratuita, pelo tempo que for necessário: (a) das participantes que engravidarem, (b) das parceiras grávidas dos participantes, quando for o caso e (c) e do concepto, se for o caso. Não é suficiente que seja informado que a gravidez "será acompanhada". Solicita-se adequação (Itens III.2.r e V.6, da Resolução CNS nº 466 de 2012).', 'TCLE; Gravidez; Acompanhamento', 20150422),
(39, '', 'Abstinência sexual em função da participação do estudo', '', 'Não é eticamente aceitável que se imponha a mulheres ou homens a abstinência sexual em função da participação em projeto de pesquisa, mas sim, que lhes sejam garantidos, por parte do patrocinador, os meios mais seguros e eficazes para assegurar que esses participantes não engravidem. Ressalta-se que os participantes de pesquisa de um estudo que declararem abstinência sexual por opção pessoal, decorrentes do contexto de vida em que se encontram inseridos, devem ter sua declaração registrada e respeitada, não sendo aceitável que lhes sejam impostos métodos de anticoncepção. Solicita-se adequação (Itens III.2.r, III.2.t e V.6, da Resolução CNS nº 466 de 2012).', 'TCLE; Abstinência sexual; Método anticoncepcional', 20150422),
(40, '', 'Evento adverso e retirada do participante da pesquisa', '', 'Cabe ressaltar que nos casos de ocorrência de reações adversas, o participante de pesquisa não é REMOVIDO da pesquisa, mas sim terá o tratamento descontinuado cabendo ao pesquisador responsável e sua equipe monitorar a condição de saúde do participante da pesquisa e garantir assistência integral à saúde tempo que for necessário. Solicita-se a adequação (Itens III.2.u, V.3 e V.6, da Resolução CNS nº 466 de 2012).', 'Evento adverso; Retirada do estudo', 20150422),
(41, '', 'Publicação dos resultados da pesquisa', '', 'O protocolo de pesquisa não esclarece se haverá a publicação dos resultados levantados pela pesquisa. Conforme o item 3.4.1.15, da Norma Operacional CNS nº 001 de 2013, temos a seguinte exigência para todos os protocolos de pesquisa: "garantia pelo pesquisador de encaminhar os resultados da pesquisa para publicação, com os devidos créditos aos autores". Sendo assim, solicita-se que seja submetido na Plataforma Brasil declaração garantindo que o Pesquisador Responsável encaminhará os resultados da\r\npesquisa para publicação, com os devidos créditos aos autores.', 'Projeto; Publicação dos resultados; Resultados da pesquisa', 20150422),
(42, '', 'Linguagem do TCLE', '', 'Cabe lembrar que o TCLE é o documento onde o pesquisador deve prestar todas as informações pertinentes ao protocolo para os participantes de pesquisa de maneira clara e objetiva. Recomenda-se adequação do TCLE de modo a evitar linguagem técnica fora do alcance da população leiga.', 'TCLE; Linguagem do TCLE', 20150422),
(43, '', 'Garantia do sigilo das informações', '', 'Deve constar no TCLE a garantia ao sigilo, à confidencialidade e à privacidade dos dados que possam identificar pessoas ou grupos, bem como seus dados de saúde. Cabe ao pesquisador responsável prever procedimentos que assegurem a confidencialidade e a privacidade, a proteção da imagem e a não estigmatização dos participantes da pesquisa, garantindo a não utilização das informações em prejuízo das pessoas e/ou das comunidades, inclusive em termos de autoestima, de prestígio e/ou de aspectos    \r\neconômico-financeiros (Resolução CNS n° 466/2012, item III.2.i). Neste sentido, é importante destacar que os dados somente poderão ser passados a terceiros depois de anonimizados. Recomenda-se adequação. ', 'TCLE; Garantia do sigilo; Confidencialidade', 20150422),
(44, '', 'Infraestrutura da proponente para realização da pesquisa', '(quando não está sobre a abrangência de quem assinou a folha de rosto)', 'Não foi anexada declaração comprovando que a instituição proponente possui infraestrutura adequada para o desenvolvimento da pesquisa. Recomenda-se que seja encaminhada uma declaração que demonstre a existência de infraestrutura necessária ao desenvolvimento da pesquisa e para atender eventuais problemas dela resultantes, com documento que expresse a concordância da instituição e/ou organização por meio de seu responsável maior com competência (Norma Operacional CNS nº 001 de 2013 itens 3.3.h e 3.4.5)', 'Declaração de infraestrutura; Infraestrutura', 20150422),
(45, '', 'Utilização da resolução 196/96', '', 'O documento baseia-se na Resolução CNS nº 196 de 1996. Conforme o item XIV (DAS DISPOSIÇÕES FINAIS) da Resolução CNS n° 466 de 2012, "ficam revogadas as Resoluções CNS Nos 196/96, 303/2000 e 404/2008". Sendo assim, uma vez que a Resolução CNS n° 196 de 1996 está revogada, recomenda-se que seja apresentada nova declaração substituindo o termo "Resolução CNS nº 196 de 1996" por "Resolução CNS n° 466 de 2012".', 'Resolução; Resolução 196/96; Resolução 466/12', 20150422),
(46, '', 'Esclarecimentos sobre a faixa etária dos participantes da pesquisa', '', 'Recomenda-se esclarecer ao comitê de ética responsável pela apreciação do protocolo de pesquisa se haverá o recrutamento de participantes de pesquisa com idade inferior a 18 anos. Pois como não estão descritos explicitamente critérios de inclusão/exclusão e haverá entrevista com jovens do ensino médio, pode-se supor a inclusão de participantes de pesquisa com idade inferior a 18 anos. Neste caso é necessário apresentar um termo de assentimento, conforme descrito nos termos da Resolução CNS n° 466 de 2012, item II.24 e um termo de consentimento livre e esclarecido destinado aos pais/responsáveis legais.', 'Projeto; Menores de 18 anos', 20150422),
(47, '', 'Coleta de dados pessoais', '', 'Considerando que os dados pessoais serão identificados, recomenda-se que sejam indicados os procedimentos que garantam o sigilo, a confidencialidade e a segurança no tratamento dos dados, conforme Resolução CNS n° 466 de 2012, item III.2.i.', 'Coleta de dados; Codificação; Anonimato; garantia do sigilo; confidencialidade; segurança no tratamento dos dados', 20150422),
(48, '', 'Comunidades indiginas', '', 'Em comunidades cuja cultura grupal reconheça a autoridade do líder ou do coletivo sobre o indivíduo, a obtenção da autorização para a pesquisa deve respeitar tal particularidade, sem prejuízo do consentimento individual, quando possível e desejável. Além disso, quando a legislação brasileira dispuser sobre competência de órgãos governamentais, a exemplo da Fundação Nacional do Índio – FUNAI, que deve autorizar a entrada em terra indígena, esta autorização deve ser obtida antes do início da\r\npesquisa. Não foi apresentada a autorização da FUNAI conforme estabelece a Instrução Normativa nº 001/PRES/1995 - Funai. Solicita-se a apresentação deste documento, ou, caso seja inviável a sua apresentação no momento, solicita-se a inserção de declaração do(a) pesquisador(a) de que esta será obtida antes do início da pesquisa.', 'Povos indignas; FUNAI', 20150422),
(49, '', 'Termos técnicos no TCLE', '', 'Solicita-se que o TCLE não apresente termos técnicos que sejam incompreensíveis aos participantes da pesquisa como “(especificar o termo)”, devendo ser redigido em linguagem clara e acessível.', 'TCLE; Linguagem do TCLE; Termos tecnicos', 20150422),
(50, '', 'Destruição de amostras analisadas no exterior', '', 'Solicita-se ainda, apresentar o documento no qual o (nome do laboratorio), sob a coordenação do (responsável do laboratório), em (Cidade) (Pais), expressem o compromisso de destruição das amostras (alíquotas residuais, se houver) a ele enviadas após realização dos ensaios previstos no protocolo em tela e a não formação de banco de amostras biológicas humanas no exterior com fins de armazenamento de alíquotas e utilização em novas pesquisas no futuro.', 'Termo de comprimisso de destruição de amostras; Biorepositório; Amostras para o exterior', 20150422),
(51, '', 'Declaração da coparticipante', '', 'O documento intitulado "(nome do documento)", não está carimbado, assinado e datado, o que desta forma não expressa à autorização da instituição coparticipante. Solicita-se apresentar documento devidamente assinado e datado de cada instituição coparticipante.', 'Coparticipante; Declaração da coparticipante', 20150422);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
 ADD UNIQUE KEY `id_doc` (`id_doc`);

--
-- Indexes for table `documentos_ged`
--
ALTER TABLE `documentos_ged`
 ADD UNIQUE KEY `id_dg` (`id_dg`);

--
-- Indexes for table `documentos_status`
--
ALTER TABLE `documentos_status`
 ADD UNIQUE KEY `id_ds` (`id_ds`);

--
-- Indexes for table `pendencias`
--
ALTER TABLE `pendencias`
 ADD UNIQUE KEY `id_p` (`id_p`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
MODIFY `id_doc` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `documentos_ged`
--
ALTER TABLE `documentos_ged`
MODIFY `id_dg` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `documentos_status`
--
ALTER TABLE `documentos_status`
MODIFY `id_ds` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendencias`
--
ALTER TABLE `pendencias`
MODIFY `id_p` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
