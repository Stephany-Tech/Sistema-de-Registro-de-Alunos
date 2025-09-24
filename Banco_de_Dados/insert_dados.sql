use sistema_de_registro_de_alunos;


insert into ALUNO values (null,'145.236.789-20','12.345.678-9','Maria Silva', '(11)95425-5786','Rua das Acácias Douradas',128,'Jardim Primavera', 'São Paulo', 'SP', '01001-000','2007-05-14', '2025-02-01', 'maria.silva@gmail.com', 'Ana Paula Silva', 'Carlos Silva');
insert into ALUNO values (null, '452.368.710-99','23-456-789-0','João Pedro Souza', '(11)95236-9997','Avenida Sol Nascente', 742, 'Vila Esperança', 'São Paulo', 'SP','02020-100','2004-08-22','2024-02-03','joaopedro.souza22@hotmail.com','Fernanda Souza', 'Marcos Souza');
insert into ALUNO values (null, '665.574.221-38','34-567-890-1','Gabriel Araújo', '(11)9985-2111','Travessa Pedra Azul', 56, 'Santo Amaro', 'São Paulo', 'SP', '03030-200', '2005-11-07', '2011-02-07', 'gabriel.araujo05@outlook.com', 'Claúdia Araújo', 'Roberto Araújo');
insert into ALUNO values (null, '235.478.511-00', '45.678.901-2','Juliana Santos', '(11)97554-4332', 'Alameda Jarim dos Ipês', 902, 'Moema', 'São Paulo', 'SP', '01040-300','2002-01-30', '2022-02-04', 'julia.santos99@gmail.com', 'Renata Santos', 'Paulo Santos');
insert into ALUNO values (null, '667.452.100-08', '56-789.012-3', 'Henrique Oliveira', '(11)95632-1146','Estrada do Vale Sereno', 3450, 'itaquera', 'São Paulo', 'SP', '05050-400','2006-07-17', '2025-02-02','henrique.oliveira.dev@yahoo.com','Patricia Oliveira', 'Antônio Oliveira');


insert into CURSO values (121,'Presencial','Ciência de Dados Aplicada', 360, 101);
insert into CURSO values (205,'Online','Desenvolvimento de Jogos Digitais', 480, 202);
insert into CURSO values (412, 'Híbrido', 'Gestão Sustentável de Empresas', 400, 303);
insert into CURSO values (856, 'Híbrido', 'Marketing e Estratégias Digitais', 420, 404);
insert into CURSO values ( 912, 'Presencial','Inteligência Artificial e Robótica', 1800, 505);


insert into ALUNO_CURSO values (1,121,101,'Presencial');
insert into ALUNO_CURSO values (2, 205,202,'Online');
insert into ALUNO_CURSO values (3, 412,303,'Híbrido');
insert into ALUNO_CURSO values (4, 856,404,'Híbrido');
insert into ALUNO_CURSO values (5, 912,505,'Presencial');
