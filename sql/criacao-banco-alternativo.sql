-- show databases;
-- drop database BANCOSUPERVISORIO;

CREATE DATABASE BANCOSUPERVISORIO;

USE BANCOSUPERVISORIO;

DROP  TABLE IF EXISTS `Usuario`;

DROP  TABLE IF EXISTS `Paciente`;
CREATE TABLE Paciente
(
	idusuario	  integer		    NOT NULL   AUTO_INCREMENT,
  cpf	        varchar(12)   NOT NULL,
  altura      integer       NOT NULL,
  peso        real          NOT NULL,
  nome      varchar(100) NOT NULL,
  email     varchar(100) NOT NULL,
  senha     varchar(100) NOT NULL,
  sexo      varchar(1)   NOT NULL,
  datanasc  date         NOT NULL,
  PRIMARY KEY (idusuario)
);

DROP  TABLE IF EXISTS `Medico`;
CREATE TABLE Medico
(
  idusuario	  integer		    NOT NULL   AUTO_INCREMENT,
  crm	        varchar(12)   NOT NULL,
  nome      varchar(100) NOT NULL,
  email     varchar(100) NOT NULL,
  senha     varchar(100) NOT NULL,
  PRIMARY KEY (idusuario)
);
