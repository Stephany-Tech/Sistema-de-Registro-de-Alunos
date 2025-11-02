create database if not exists sistema_de_registro_de_alunos;
use sistema_de_registro_de_alunos;




create table ALUNO (
  ra int not null primary key auto_increment,
  cpf varchar(14) not null unique,
  rg varchar(12) not null unique,
  nome_aluno varchar(100) not null,
  nome_social varchar (100) null,
  sexo varchar (50) not null,
  telefone char(14) not null,
  numero_reservistas char (9) null,
  nome_rua varchar(150) not null,
  numero int not null,
  bairro varchar(100) not null,
  cidade varchar(100) not null,
  estado varchar(100) not null,
  cep varchar(9) not null,
  cidade_natal varchar (50) not null,
  estado_natal char (2) not null, 
  dt_nascimento date not null,
  dt_matricula date not null,
  turma int not null,
  e_mail varchar (150) not null,
  filiacao_mae varchar(100) not null,
  filiacao_pai varchar(100) not null,
  acompanhamento_especial char (3) null
);


create table CURSO(
  id_curso int not null primary key,
  modalidade varchar (50) not null,
  nome_curso varchar (150) not null,
  carga_horaria int not null
);


create table ALUNO_CURSO(
  ra int not null,
  id_curso int not null,
  turma int not null,
  primary key (ra,id_curso),
  foreign key (ra) references ALUNO(ra),
  foreign key (id_curso) references CURSO(id_curso)
);

create table DEFICIENCIA (
  id_def int not null primary key,
  tipo varchar (50) null
);

create table ALUNO_DEFICIENCIA (
  ra int not null,
  id_def int not null,
  primary key (ra, id_def),
  foreign key (ra) references ALUNO(ra),
  foreign key (id_def) references DEFICIENCIA (id_def)
);
