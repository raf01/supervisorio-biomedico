show databases;
drop database BANCOSUPERVISORIO;

CREATE DATABASE BANCOSUPERVISORIO;

USE BANCOSUPERVISORIO;

DROP  TABLE IF EXISTS `Usuario`;
CREATE TABLE Usuario
(
  idusuario   int  NOT NULL   AUTO_INCREMENT,
  nome      varchar(100) NOT NULL,
  email     varchar(100) NOT NULL,
  senha     varchar(100) NOT NULL,
  sexo      varchar(1)   NOT NULL,
  datanasc  date         NOT NULL,
  CONSTRAINT  CK_usu_sexo    CHECK (sexo IN ('F', 'M')),
  PRIMARY  KEY  (idusuario)
);

DROP  TABLE IF EXISTS `Paciente`;
CREATE TABLE Paciente
(
	idusuario	  integer		    NOT NULL,
  cpf	        varchar(12)   NOT NULL,
  altura      integer       NOT NULL,
  peso        real          NOT NULL,
  PRIMARY KEY (idusuario),
  FOREIGN KEY (idusuario)  REFERENCES  Usuario
);

DROP  TABLE IF EXISTS `Medico`;
CREATE TABLE Medico
(
  idusuario	  integer		    NOT NULL,
  crm	        varchar(12)   NOT NULL,
  PRIMARY KEY (idusuario),
  FOREIGN KEY (idusuario)  REFERENCES  Usuario
);
