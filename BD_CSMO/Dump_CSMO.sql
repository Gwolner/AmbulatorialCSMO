DROP TABLE IF EXISTS `aluno`;

CREATE TABLE `aluno` (
  `id_paciente` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL auto_increment,
  `matricula` varchar(15) NOT NULL,
  `nome_responsavel` varchar(45) default NULL,
  `modalidade_curso` varchar(20) NOT NULL,
  `curso` varchar(75) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `id_campus` int(11) NOT NULL,
  PRIMARY KEY  (`id_aluno`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `fk_aluno_paciente1` USING BTREE (`id_paciente`),
  KEY `fk_aluno_campus1` USING BTREE (`id_campus`),
  CONSTRAINT `FK_ALUNO_X_CAMPUS` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  CONSTRAINT `FK_ALUNO_X_PACIENTE` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `anotacao`;

CREATE TABLE `anotacao` (
  `id_anotacao` int(11) NOT NULL auto_increment,
  `texto` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `tipo_anotacao` varchar(60) NOT NULL,
  PRIMARY KEY  (`id_anotacao`),
  KEY `FK_usuario_X_anotacao` (`id_usuario`),
  KEY `FK_paciente_X_anotacao` (`id_paciente`),
  CONSTRAINT `FK_paciente_X_anotacao` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `FK_usuario_X_anotacao` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `atendimento`;

CREATE TABLE `atendimento` (
  `id_atendimento` int(11) NOT NULL auto_increment,
  `id_servidor_saude` int(11) NOT NULL,
  `tipo_servico` varchar(45) NOT NULL,
  `procedimento` varchar(150) NOT NULL,
  `tipo_paciente` varchar(45) NOT NULL,
  `data_hora` datetime NOT NULL,
  PRIMARY KEY  (`id_atendimento`),
  KEY `id_servidor_saude` (`id_servidor_saude`),
  CONSTRAINT `atendimento_ibfk_1` FOREIGN KEY (`id_servidor_saude`) REFERENCES `servidor_saude` (`id_servidor_saude`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `campus`;

CREATE TABLE `campus` (
  `id_campus` int(11) NOT NULL,
  `nome_campi` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_campus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `dente`;

CREATE TABLE `dente` (
  `id_dente` int(11) NOT NULL auto_increment,
  `id_paciente` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `id_dentista` int(11) NOT NULL,
  `data_hora` datetime default NULL,
  `extracao` varchar(45) default NULL,
  PRIMARY KEY  (`id_dente`),
  KEY `fk_paciente` (`id_paciente`),
  KEY `fk_dentista` (`id_dentista`),
  CONSTRAINT `fk_dentista` FOREIGN KEY (`id_dentista`) REFERENCES `odontologia` (`id_dentista`),
  CONSTRAINT `fk_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `enfermagem`;

CREATE TABLE `enfermagem` (
  `id_enfermagem` int(11) NOT NULL auto_increment,
  `coren` varchar(45) NOT NULL,
  `id_servidor_saude` int(11) NOT NULL,
  PRIMARY KEY  (`id_enfermagem`),
  UNIQUE KEY `coren` (`coren`),
  UNIQUE KEY `coren_2` (`coren`),
  KEY `fk_enfermagem_servidor_saude1` USING BTREE (`id_servidor_saude`),
  CONSTRAINT `fk_enfermagem_servidor_saude1` FOREIGN KEY (`id_servidor_saude`) REFERENCES `servidor_saude` (`id_servidor_saude`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `face`;

CREATE TABLE `face` (
  `id_face` int(11) NOT NULL auto_increment,
  `num_face` int(11) NOT NULL,
  `id_situacao` int(11) NOT NULL,
  PRIMARY KEY  (`id_face`),
  KEY `id_situacao` (`id_situacao`),
  CONSTRAINT `face_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacao` (`id_situacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `face_x_dente`;

CREATE TABLE `face_x_dente` (
  `id_face` int(11) NOT NULL,
  `id_dente` int(11) NOT NULL,
  PRIMARY KEY  (`id_face`,`id_dente`),
  KEY `id_dente` (`id_dente`),
  CONSTRAINT `face_x_dente_ibfk_1` FOREIGN KEY (`id_face`) REFERENCES `face` (`id_face`),
  CONSTRAINT `face_x_dente_ibfk_2` FOREIGN KEY (`id_dente`) REFERENCES `dente` (`id_dente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `medico`;

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL auto_increment,
  `crm` varchar(45) NOT NULL,
  `id_servidor_saude` int(11) NOT NULL,
  PRIMARY KEY  (`id_medico`),
  UNIQUE KEY `crm` (`crm`),
  UNIQUE KEY `crm_2` (`crm`),
  UNIQUE KEY `crm_3` (`crm`),
  KEY `fk_medico_servidor_saude1` USING BTREE (`id_servidor_saude`),
  CONSTRAINT `fk_medico_X_servidor_saude` FOREIGN KEY (`id_servidor_saude`) REFERENCES `servidor_saude` (`id_servidor_saude`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `observacao`;

CREATE TABLE `observacao` (
  `id_observacao` int(11) NOT NULL auto_increment,
  `texto` varchar(300) NOT NULL,
  `face_dente` int(11) NOT NULL,
  `id_dente` int(11) NOT NULL,
  PRIMARY KEY  (`id_observacao`),
  KEY `id_dente` (`id_dente`),
  CONSTRAINT `observacao_ibfk_1` FOREIGN KEY (`id_dente`) REFERENCES `dente` (`id_dente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `odontologia`;

CREATE TABLE `odontologia` (
  `id_dentista` int(11) NOT NULL auto_increment,
  `cro` varchar(45) NOT NULL,
  `id_servidor_saude` int(11) NOT NULL,
  PRIMARY KEY  (`id_dentista`),
  UNIQUE KEY `cro` (`cro`),
  UNIQUE KEY `cro_2` (`cro`),
  UNIQUE KEY `cro_3` (`cro`),
  KEY `fk_dentista_servidor_saude1` USING BTREE (`id_servidor_saude`),
  CONSTRAINT `fk_dentista_X_servidor_saude` FOREIGN KEY (`id_servidor_saude`) REFERENCES `servidor_saude` (`id_servidor_saude`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL auto_increment,
  `nome_paciente` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(8) default NULL,
  `rua` varchar(60) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `tipo_paciente` varchar(45) NOT NULL,
  `contato_emergencial` varchar(45) default NULL,
  `data_nascimento` date NOT NULL,
  `telefone_contato` varchar(45) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `prescricao`;

CREATE TABLE `prescricao` (
  `id_prescricao` int(11) NOT NULL auto_increment,
  `data_cadastro` datetime NOT NULL,
  `medicamento` varchar(45) NOT NULL,
  `prescritor` varchar(45) default NULL,
  `hora_de_adm` time default NULL,
  `prof_que_adm` varchar(45) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `obs` varchar(200) default NULL,
  PRIMARY KEY  (`id_prescricao`),
  KEY `fk_prescricao_usuario1` USING BTREE (`id_usuario`),
  KEY `fk_prescricao_paciente1` USING BTREE (`id_paciente`),
  CONSTRAINT `fk_prescricao_X_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `fk_prescricao_X_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `servidor`;

CREATE TABLE `servidor` (
  `id_paciente` int(11) NOT NULL,
  `id_campus` int(11) NOT NULL,
  `id_servidor` int(11) NOT NULL auto_increment,
  `siape` varchar(10) NOT NULL,
  `tipo_vinculo` varchar(45) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY  (`id_servidor`),
  UNIQUE KEY `siape` (`siape`),
  KEY `fk_servidor_paciente` USING BTREE (`id_paciente`),
  KEY `fk_servidor_campus1` USING BTREE (`id_campus`),
  CONSTRAINT `fk_servidor_x_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  CONSTRAINT `fk_servidor_x_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `servidor_saude`;

CREATE TABLE `servidor_saude` (
  `id_servidor_saude` int(11) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `siape` varchar(45) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `email` varchar(60) default NULL,
  `token` varchar(10) default NULL,
  PRIMARY KEY  (`id_servidor_saude`),
  UNIQUE KEY `siape` (`siape`),
  UNIQUE KEY `siape_2` (`siape`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `servidor_terceirizado`;

CREATE TABLE `servidor_terceirizado` (
  `id_paciente` int(11) NOT NULL,
  `id_campus` int(11) NOT NULL,
  `id_servidor_terceirizado` int(11) NOT NULL auto_increment,
  `empresa` varchar(45) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `matricula` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_servidor_terceirizado`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `FK_servidor_terceirizado_x_campus` (`id_campus`),
  KEY `FK_servidor_terceirizado_x_paciente` (`id_paciente`),
  CONSTRAINT `FK_servidor_terceirizado_x_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  CONSTRAINT `FK_servidor_terceirizado_x_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `situacao`;

CREATE TABLE `situacao` (
  `id_situacao` int(11) NOT NULL auto_increment,
  `desc_situacao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_situacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `triagem`;

CREATE TABLE `triagem` (
  `id_triagem` int(11) NOT NULL auto_increment,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `pa` varchar(11) default NULL,
  `fc` int(11) default NULL,
  `fr` int(11) default NULL,
  `tc` varchar(10) default NULL,
  `hgt` float default NULL,
  `peso` float default NULL,
  `altura` float default NULL,
  `coren` varchar(25) default NULL,
  `alergia` varchar(45) NOT NULL,
  `tipo_alergia` varchar(120) default NULL,
  `id_usuario` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  PRIMARY KEY  (`id_triagem`),
  KEY `fk_triagem_usuario1` USING BTREE (`id_usuario`),
  KEY `fk_triagem_paciente1` USING BTREE (`id_paciente`),
  CONSTRAINT `fk_triagem_X_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `fk_triagem_X_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `login` varchar(45) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `id_servidor_saude` int(11) NOT NULL,
  PRIMARY KEY  (`id_usuario`),
  UNIQUE KEY `login` (`login`),
  KEY `fk_usuario_servidor_saude1` USING BTREE (`id_servidor_saude`),
  CONSTRAINT `fk_usuario_X_servidor_saude1` FOREIGN KEY (`id_servidor_saude`) REFERENCES `servidor_saude` (`id_servidor_saude`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `visitante`;

CREATE TABLE `visitante` (
  `id_paciente` int(11) NOT NULL,
  `id_visitante` int(11) NOT NULL auto_increment,
  `rg` int(11) default NULL,
  `orgao_expedidor` varchar(45) default NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY  (`id_visitante`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `rg_2` (`rg`),
  KEY `fk_visitante_paciente1` USING BTREE (`id_paciente`),
  CONSTRAINT `fk_visitante_X_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;