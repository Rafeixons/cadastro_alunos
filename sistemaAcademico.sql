create database sistemaAcademico;

use sistemaAcademico;

create table matricula(
id_matricula int primary key auto_increment,
nome varchar(150) not null,
curso varchar(150) not null
);