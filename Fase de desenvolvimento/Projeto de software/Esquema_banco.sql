CREATE DATABASE PROJETO_APS;
USE PROJETO_APS;

CREATE TABLE PERFIL(
Perfil_ID				INT				NOT NULL,
Descrição				CHAR(15),

PRIMARY KEY (Perfil_ID)
);

CREATE TABLE USUARIO(
Usuario_ID				INT 			NOT NULL		AUTO_INCREMENT,
Nome		 			VARCHAR(50)    	NOT NULL,
Senha					VARCHAR(100)    NOT NULL,
Telefone				CHAR(15) 		NOT NULL,
DataDeNascimento		DATE			NOT NULL,
Sexo 					CHAR(20)		NOT NULL,
Cpf 					CHAR(11)		NOT NULL		UNIQUE, 
Endereço				VARCHAR(50)		NOT NULL,
Email					VARCHAR(50)		NOT NULL,
Perfil_id_fk			INT				NOT NULL,

PRIMARY KEY (Usuario_ID),
FOREIGN KEY (Perfil_id_fk) REFERENCES PERFIL (Perfil_ID)
);

CREATE TABLE ORGANIZADOR(
Organizador_ID			INT 			NOT NULL		AUTO_INCREMENT,
Nome		 			VARCHAR(80)    	NOT NULL,
Telefone				CHAR(15) 		NOT NULL,
Instituição				VARCHAR(50) 	NOT NULL,
CurriculoLattes			VARCHAR(50)		NOT NULL,
DataDeNascimento		DATE			NOT NULL,
Sexo 					CHAR(20)		NOT NULL,
Cpf 					CHAR(11)		NOT NULL  		UNIQUE,

 PRIMARY KEY (Organizador_ID)
);

CREATE TABLE EVENTO(
Evento_ID				INT				NOT NULL		AUTO_INCREMENT,
Nome		 			VARCHAR(80)    	NOT NULL,
Ano 					CHAR(4)         NOT NULL,
Tipo					VARCHAR(50)     NOT NULL,
AreadeEstudo			VARCHAR(50)		NOT NULL,
descricao				VARCHAR(250)	NOT NULL,
linkEvento				VARCHAR(80)		NOT NULL,
Usuario_id_fk			INT 			NOT NULL,

PRIMARY KEY (Evento_ID),
FOREIGN KEY (Usuario_id_fk) REFERENCES USUARIO (Usuario_ID)
);

CREATE TABLE ORGANIZADOR_EVENTO(
Organizador_id_fk			INT 			NOT NULL,
Evento_id_fk				INT				NOT NULL,

FOREIGN KEY (Organizador_id_fk) REFERENCES ORGANIZADOR (Organizador_ID),
FOREIGN KEY (Evento_id_fk) REFERENCES EVENTO (Evento_ID)
);

CREATE TABLE TRILHA(
Trilha_ID				INT 			NOT NULL		AUTO_INCREMENT,
Nome					VARCHAR(50)		NOT NULL,

PRIMARY KEY(Trilha_ID)
);

CREATE TABLE TRILHA_EVENTO(
Trilha_id_fk				INT		NOT NULL,
Evento_id_fk				INT		NOT NULL,

PRIMARY KEY(Trilha_Id_fk, Evento_id_fk),
FOREIGN KEY (Trilha_id_fk) REFERENCES TRILHA (Trilha_ID),
FOREIGN KEY (Evento_id_fk) REFERENCES EVENTO (Evento_ID)
);

CREATE TABLE ARTIGO(
Artigo_ID				INT 			NOT NULL		AUTO_INCREMENT,
Titulo		 			VARCHAR(50)    	NOT NULL,
Abstract		 		VARCHAR(100)    NOT NULL,
Linguagem				VARCHAR(20) 	NOT NULL,
datapublicação          date			NOT NULL,
EmaildeContato			VARCHAR(40)		NOT NULL,
ArquivoPDF 				VARCHAR(40) 	NOT NULL,
Trilha_artigo_fk		INT 			NOT NULL,
Evento_artigo_fk		INT				NOT NULL,

PRIMARY KEY (Artigo_ID),
FOREIGN KEY (Trilha_artigo_fk, Evento_artigo_fk) REFERENCES TRILHA_EVENTO (Trilha_id_fk, Evento_id_fk)
);

CREATE TABLE PALAVRACHAVE(
PalavraChave_ID			INT				NOT NULL		AUTO_INCREMENT,
Nome					CHAR(15)   		NOT NULL,

PRIMARY KEY (PalavraChave_ID)
);

CREATE TABLE PALAVRACHAVE_ARTIGO(
PalavraChave_id_fk			INT				NOT NULL,
Artigo_id_fk				INT 			NOT NULL,

FOREIGN KEY (PalavraChave_id_fk) REFERENCES PALAVRACHAVE (PalavraChave_ID),
FOREIGN KEY (Artigo_id_fk) REFERENCES ARTIGO (Artigo_ID)
);

CREATE TABLE AUTOR(
Autor_ID				INT 			NOT NULL		AUTO_INCREMENT,
Nome		 			VARCHAR(50)    	NOT NULL,
Telefone				CHAR(15) 		NOT NULL,
Instituição				VARCHAR(50) 	NOT NULL,
CurriculoLattes			VARCHAR(50)		NOT NULL,
DataDeNascimento		DATE			NOT NULL,
Sexo 					CHAR(20)		NOT NULL,

PRIMARY KEY (Autor_ID)
);

CREATE TABLE AUTOR_ARTIGOS(
Autor_id_fk				  	INT 			NOT NULL,
Artigo_id_fk				INT 			NOT NULL,

FOREIGN KEY (Autor_id_fk) REFERENCES AUTOR (Autor_ID),
FOREIGN KEY (Artigo_id_fk) REFERENCES ARTIGO (Artigo_ID)
);

