CREATE TABLE Alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    curso VARCHAR(100) NOT NULL
);

INSERT INTO Alunos (nome, email, curso) VALUES
('Maria Eduarda', 'maria@faculdade.com', 'Ciências de Dados'),
('Kemilly Silva', 'kemilly@faculdade.com', 'Engenharia'),
('Stephany', 'stephany@faculdade.com', 'Direito');
