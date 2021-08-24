use controlemil;

create table controlemil_table(
	id int(11) not null auto_increment, PRIMARY KEY(id), NomeGuerra varchar(50), DivSecao varchar(50),
	 data date, HrChegada time, SaidaAlmoco time, RetornoAlmoco time, HrSaida time);

create table nomeguerra_post(id int(11) not null, NomeGuerra varchar(50), DivSecao_ID int (11) not null, primary key(DivSecao_ID));

create table divsecao_post(id int(11) not null,  DivSecao varchar(50));

SEÇÕES
INFORMÁTICA
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (1, "TEN OTONIEL", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (2, "SO DOMINGUES", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (3, "SGT JAMERSON", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (4, "SGT DE ASSIS", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (5, "SD PABLO", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (6, "SD ALAN", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (7, "SD VERÍSSIMO", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (8, "SD AGUIAR", 1);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (9, "SD IRINEU", 1);
COMANDO
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (1, "CEL EVANGELISTA", 2);
INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (2, "CEL RONALD", 2);


INSERT INTO divsecao_post(id, DivSecao) VALUES (2, "COMANDO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (5, "CAEX");
INSERT INTO divsecao_post(id, DivSecao) VALUES (6, "DIVISÃO ADMNISTRATIVA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (7, "FISCALIZAÇÃO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (8, "SETOR FINANCEIRO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (9, "AJUDÂNCIA GERAL");
INSERT INTO divsecao_post(id, DivSecao) VALUES (10, "ALMOXARIFADO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (11, "APROVISIONAMENTO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (12, "GARAGEM");
INSERT INTO divsecao_post(id, DivSecao) VALUES (13, "SALC");
INSERT INTO divsecao_post(id, DivSecao) VALUES (14, "SECRETARIA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (15, "SAÚDE");
INSERT INTO divsecao_post(id, DivSecao) VALUES (16, "SERVIÇOS GERAIS");
INSERT INTO divsecao_post(id, DivSecao) VALUES (17, "MEIOS AUXILIARES");
INSERT INTO divsecao_post(id, DivSecao) VALUES (18, "SEÇÃO DE EDUCAÇÃO FÍSICA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (19, "BIBLIOTECA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (20, "SEÇÃO TÉCNICA DE ENSINO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (21, "SUPERVISÃO ESCOLAR");
INSERT INTO divsecao_post(id, DivSecao) VALUES (22, "APOIO PEDAGÓGICO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (23, "LÍNGUAS ESTRANGEIRAS");
INSERT INTO divsecao_post(id, DivSecao) VALUES (24, "BANDA DE MÚSICA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (25, "CORPO DE ALUNO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (26, "3° CIA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (27, "2° CIA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (28, "1° CIA");
INSERT INTO divsecao_post(id, DivSecao) VALUES (29, "CIA ESPECIAL DE ALUNOS");
INSERT INTO divsecao_post(id, DivSecao) VALUES (30, "DIVISÃO DE ENSINO");
INSERT INTO divsecao_post(id, DivSecao) VALUES (31, "COORDENAÇÃO 6° ANOS EF");
INSERT INTO divsecao_post(id, DivSecao) VALUES (32, "COORDENAÇÃO 7° ANOS EF");
INSERT INTO divsecao_post(id, DivSecao) VALUES (33, "COORDENAÇÃO 8° ANOS EF");
INSERT INTO divsecao_post(id, DivSecao) VALUES (34, "COORDENAÇÃO 9° ANO EF");
INSERT INTO divsecao_post(id, DivSecao) VALUES (35, "COORDENAÇÃO 1° E 2° ANOS EM");
INSERT INTO divsecao_post(id, DivSecao) VALUES (36, "COORDENAÇÃO 3° ANO EM");





INSERT INTO nomeguerra_post(id, NomeGuerra, DivSecao_ID) VALUES (2, "CEL EVANGELISTA", 2);











create table controlevtrmil_table(
	id int(11) not null auto_increment, PRIMARY KEY(id), NomeGuerraMotorista varchar(30), NomeGuerraCHVtr varchar(50), Viatura varchar(30),
	 data date, OdometroSaida integer, OdometroEntrada integer, HrSaida time, HrEntrada time, destino varchar(50));

create table motoristas_post(
	id int(11) not null auto_increment, PRIMARY KEY(id), NomeGuerraMotorista varchar(20));	
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB RIRIS");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB JOSÉ");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB DUARTE");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB MOREIRA");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB BARROS");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB ANGELO");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("CB SAMPAIO");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD CARDOSO");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD MARCOS");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD TOMAZ");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD GOUVEIA");	
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD CLEILTON");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD SÉRGIO");
insert into motoristas_post(NomeGuerraMotorista) VALUES ("SD NETO");



// Pessoas Estranhas
	create table controlepessoas_table(
		id int(11) not null auto_increment, PRIMARY KEY(id), nome varchar(50), rg integer, OrgaoExpedidor varchar(15), data date, HrEntrada time, HrSaida time, destino varchar(20), FalarCom varchar(15));


// Viaturas Civis
create table viaturascivis_table (
	id int(11) not null auto_increment, primary key(id), NomeMotorista varchar(50), rg integer, OrgaoExpedidor varchar(10), data date, veiculo varchar(20), placa varchar(20), HrEntrada time, HrSaida time, destino varchar(30));
	)

