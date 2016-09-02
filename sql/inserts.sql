show databases;
drop database BANCOSUPERVISORIO;

CREATE DATABASE BANCOSUPERVISORIO;

USE BANCOSUPERVISORIO;

INSERT INTO Paciente VALUES(1, '123456', 123, 64.0, 'Rafael Guerra', 'rafael@hot.com', '123', 'M', '05/06/1990');

DROP  TABLE IF EXISTS `Usuario`;

DROP  TABLE IF EXISTS `Paciente`;
CREATE TABLE Paciente
(
	idusuario	  integer		    NOT NULL,
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
  idusuario	  integer		    NOT NULL,
  crm	        varchar(12)   NOT NULL,
  nome      varchar(100) NOT NULL,
  email     varchar(100) NOT NULL,
  senha     varchar(100) NOT NULL,
  sexo      varchar(1)   NOT NULL,
  datanasc  date         NOT NULL,
  PRIMARY KEY (idusuario)
);
