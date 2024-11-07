create database empresa 
use empresa

create table funcionario(
       fun_codigo int primary key auto_increment,
       fun_nome varchar(255),
       fun_cargo varchar(255)
);

create table registro(
       reg_codigo int primary key auto_increment,
       reg_data date,
       reg_hora time,
       reg_fun int,
       foreign key (reg_fun) references funcionario(fun_codigo)
);