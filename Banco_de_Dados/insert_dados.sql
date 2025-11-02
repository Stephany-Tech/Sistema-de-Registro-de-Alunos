use sistema_de_registro_de_alunos;


insert into ALUNO values (null,'145.236.789-20','12.345.678-9','Maria Silva', null, 'Feminino', '(11)95425-5786', null, 'Rua das Acácias Douradas',128,'Jardim Primavera', 'São Paulo', 'SP', '01001-000', 'São Paulo', 'SP', '2007-05-14', '2025-02-01', 101, 'maria.silva@gmail.com', 'Ana Paula Silva', 'Carlos Silva', false);
insert into ALUNO values (null, '452.368.710-99','23-456-789-0','João Pedro Souza', null, 'Masculino', '(11)95236-9997', 123456789, 'Avenida Sol Nascente', 742, 'Vila Esperança', 'São Paulo', 'SP','02020-100', 'Feira de Santana', 'BA', '2004-08-22','2024-02-03', 202, 'joaopedro.souza22@hotmail.com','Fernanda Souza', 'Marcos Souza', false);
insert into ALUNO values (null, '665.574.221-38','34-567-890-1','Gabriel Araújo', null, 'Masculino', '(11)9985-2111', 987654321, 'Travessa Pedra Azul', 56, 'Santo Amaro', 'São Paulo', 'SP', '03030-200', 'Pelotas', 'RS', '2005-11-07', '2011-02-07', 303, 'gabriel.araujo05@outlook.com', 'Claúdia Araújo', 'Roberto Araújo', false);
insert into ALUNO values (null, '235.478.511-00', '45.678.901-2','Juliana Santos', null, 'Feminino', '(11)97554-4332', null, 'Alameda Jarim dos Ipês', 902, 'Moema', 'São Paulo', 'SP', '01040-300', 'Juíz de Fora', 'MG', '2002-01-30', '2022-02-04', 404, 'julia.santos99@gmail.com', 'Renata Santos', 'Paulo Santos', false);
insert into ALUNO values (null, '667.452.100-08', '56-789.012-3', 'Henrique Oliveira', null, 'Masculino',  '(11)95632-1146', 654987321,'Estrada do Vale Sereno', 3450, 'itaquera', 'São Paulo', 'SP', '05050-400', 'Maringá', 'PR', '2006-07-17', '2025-02-02', 505, 'henrique.oliveira.dev@yahoo.com','Patricia Oliveira', 'Antônio Oliveira', false);


insert into CURSO values (121,'Presencial','Ciência de Dados Aplicada', 360);
insert into CURSO values (205,'Online','Desenvolvimento de Jogos Digitais', 480);
insert into CURSO values (412, 'Híbrido', 'Gestão Sustentável de Empresas', 400);
insert into CURSO values (856, 'Híbrido', 'Marketing e Estratégias Digitais', 420);
insert into CURSO values ( 912, 'Presencial','Inteligência Artificial e Robótica', 1800);


insert into ALUNO_CURSO values (1,121,101,'Presencial');
insert into ALUNO_CURSO values (2, 205,202,'Online');
insert into ALUNO_CURSO values (3, 412,303,'Híbrido');
insert into ALUNO_CURSO values (4, 856,404,'Híbrido');
insert into ALUNO_CURSO values (5, 912,505,'Presencial');


insert into DEFICIENCIA values (123, 'Visual');
insert into DEFICIENCIA values (234, 'Auditiva');
insert into DEFICIENCIA values (345, 'Motora');
insert into DEFICIENCIA values (456, 'Intelectual'); 
insert into DEFICIENCIA values (678, null);


insert into ALUNO_DEFICIENCIA values (1, 123);
insert into ALUNO_DEFICIENCIA values (2, 234);
insert into ALUNO_DEFICIENCIA values (3, 345);
insert into ALUNO_DEFICIENCIA values (4, 456);
insert into ALUNO_DEFICIENCIA values (5, 678);
