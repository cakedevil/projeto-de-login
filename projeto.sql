create database projeto_lo;

use projeto_lo;

create table usuarios(
id_usuarios int AUTO_INCREMENT PRIMARY key,
nome varchar(30),
telefone varchar(30),
email varchar(40),
senha varchar(32)
);