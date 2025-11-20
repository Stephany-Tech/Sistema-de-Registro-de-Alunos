<?php

// Checa se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do Banco de dados
    $servername = "localhost";
    $username = "root"; // Altere para seu nome de usuário do MySQL
    $password = ""; // Altere para sua senha do MySQL
    $dbname = "escola";

    // Cria a Conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a Conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Função para lidar com o upload de arquivos
    function handleFileUpload($file, $conn) {
        if (isset($file) && $file['error'] == 0) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }
            $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_name = uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $file_name;
            
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                return $conn->real_escape_string($target_file);
            } else {
                return null;
            }
        }
        return null;
    }

    // Pega dados do formulário e sanitiza
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $data_nascimento = $_POST['data_nascimento'];
    $cep = $conn->real_escape_string($_POST['cep']);
    $rua = $conn->real_escape_string($_POST['rua']);
    $bairro = $conn->real_escape_string($_POST['bairro']);
    $numero = $conn->real_escape_string($_POST['numero']);
    $complemento = $conn->real_escape_string($_POST['complemento']);
    $sexo = $conn->real_escape_string($_POST['sexo']);
    $nome_social = $conn->real_escape_string($_POST['nome_social']);
    $nacionalidade = $conn->real_escape_string($_POST['nacionalidade']);
    $naturalidade_uf = $conn->real_escape_string($_POST['naturalidade_uf']);
    $cidade_natal = $conn->real_escape_string($_POST['cidade_natal']);
    $cpf = $conn->real_escape_string($_POST['cpf']);
    $rg = $conn->real_escape_string($_POST['rg']);
    $reservista_numero = $conn->real_escape_string($_POST['reservista_numero']);
    $possui_deficiencia = $conn->real_escape_string($_POST['possui_deficiencia']);
    $necessita_acompanhamento = $conn->real_escape_string($_POST['necessita_acompanhamento']);

    // Processa os uploads de arquivos
    $cpf_path = handleFileUpload($_FILES['cpf_file'], $conn);
    $rg_path = handleFileUpload($_FILES['rg_file'], $conn);
    $reservista_path = handleFileUpload($_FILES['reservista_file'], $conn);
    $certificado_conclusao_path = handleFileUpload($_FILES['certificado_conclusao_file'], $conn);
    $historico_escolar_path = handleFileUpload($_FILES['historico_escolar_file'], $conn);
    $comprovante_residencia_path = handleFileUpload($_FILES['comprovante_residencia_file'], $conn);


    // Prepara e executa a instrução SQL para inserir dados
    $sql = "INSERT INTO alunos (
        nome, email, data_nascimento, cep, rua, bairro, numero, complemento, sexo, nome_social, nacionalidade, 
        naturalidade_uf, cidade_natal, cpf, cpf_path, rg, rg_path, reservista_numero, reservista_path, 
        certificado_conclusao_path, historico_escolar_path, comprovante_residencia_path,
        possui_deficiencia, necessita_acompanhamento
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssssssssssssssssssss", 
            $nome, $email, $data_nascimento, $cep, $rua, $bairro, $numero, $complemento, $sexo, 
            $nome_social, $nacionalidade, $naturalidade_uf, $cidade_natal, $cpf, $cpf_path, $rg, $rg_path, 
            $reservista_numero, $reservista_path, $certificado_conclusao_path, $historico_escolar_path, 
            $comprovante_residencia_path, $possui_deficiencia, $necessita_acompanhamento
        );

        if ($stmt->execute()) {
            echo "<script>alert('Novo aluno cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Erro na preparação da consulta: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
    <style>
        /* 1) Fundo principal do site (body) */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f5f5f5; /* CINZA CLARO - MUDANÇA */
            color: #333;
        }

        /* Adicionando Cabeçalho e Navegação (Header e Nav) */
        header {
            width: 100%;
            /* 2) Cabeçalho (header): background-color - #007BFF (azul) - MUDANÇA */
            background-color: #007BFF; 
            padding: 1em 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header h1 {
            /* 3) Texto no cabeçalho: color white - MUDANÇA */
            color: white; 
            margin: 0;
        }

        nav {
            width: 100%;
            /* 4) Cor da barra de Navegação (nav): background-color - #333 (cinza escuro) - MUDANÇA */
            background-color: #333; 
            padding: 0.5em 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin: 0 1em;
        }

        nav a {
            text-decoration: none;
            padding: 0.5em 1em;
            display: block;
            /* 5) Link do menu (nav a): color white - MUDANÇA */
            color: white; 
            transition: background-color 0.3s;
        }

        /* 6) Link do menu para passar o mouse (nav a:hover): background-color - #575757 (cinza-médio) - MUDANÇA */
        nav a:hover {
            background-color: #575757; 
            border-radius: 4px;
        }
       

        .container {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            margin: 20px 0; /* Espaçamento após o nav/header */
        }
        
        .container h1 { 
            color: #007BFF; /* Usando a cor azul principal do cabeçalho */
            margin-bottom: 1em;
            text-align: center;
        }
        
        /* 7) Textos dos títulos principais (h2) - Adicionado seções com class="section-title" para simular h2 */
        .section-title {
            /* MUDANÇA (Aplica-se aos títulos das seções) */
            color: #333; 
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            font-size: 1.2em;
            border-bottom: 2px solid #007BFF; /* Linha de destaque com a cor principal */
            padding-bottom: 5px;
            font-weight: bold;
        }
        
        /* 8) Texto dos parágrafos (p) -  */
        label {
            font-weight: bold;
            margin-bottom: 0.25em;
            /* Cor do texto - MUDANÇA */
            color: #555; 
        }

        /* Estilização padrão de elementos */
        form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-row {
            display: flex;
            gap: 1em;
        }
        .form-row > .form-group {
            flex: 1;
        }
        input, select, .file-input {
            padding: 0.8em;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            background-color: #007BFF; 
            color: white;
            padding: 0.8em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            /* Uma tonalidade mais escura de azul para o hover */
            background-color: #0056b3; 
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema Escolar</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Início</a></li>
            <li><a href="#">Cadastrar Aluno</a></li>
            <li><a href="#">Buscar Aluno</a></li>
            <li><a href="#">Sair</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Cadastro de Alunos</h1>
        
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="section-title">Dados Pessoais</div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="nome_social">Nome Social:</label>
                    <input type="text" id="nome_social" name="nome_social">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nacionalidade">Nacionalidade:</label>
                    <input type="text" id="nacionalidade" name="nacionalidade" required>
                </div>
                <div class="form-group">
                    <label for="naturalidade_uf">Naturalidade (UF):</label>
                    <input type="text" id="naturalidade_uf" name="naturalidade_uf" maxlength="2" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="cidade_natal">Cidade natal:</label>
                    <input type="text" id="cidade_natal" name="cidade_natal" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outros">Outros</option>
                </select>
            </div>
            
            <div class="section-title">Endereço</div>
            <div class="form-row">
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" maxlength="9" placeholder="00000-000">
                </div>
                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro">
                </div>
                <div class="form-group">
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="numero">
                </div>
            </div>

            <div class="form-group">
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" name="complemento">
            </div>

            <div class="section-title">Documentos</div>
            <div class="form-row">
                <div class="form-group">
                    <label for="cpf">CPF (apenas números):</label>
                    <input type="text" id="cpf" name="cpf" maxlength="11" placeholder="00000000000">
                </div>
                <div class="form-group">
                    <label for="cpf_file">Anexar CPF:</label>
                    <input type="file" id="cpf_file" name="cpf_file" class="file-input">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="rg">RG:</label>
                    <input type="text" id="rg" name="rg" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="rg_file">Anexar RG:</label>
                    <input type="file" id="rg_file" name="rg_file" class="file-input">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="reservista_numero">Número da Reservista:</label>
                    <input type="text" id="reservista_numero" name="reservista_numero" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="reservista_file">Anexar Reservista:</label>
                    <input type="file" id="reservista_file" name="reservista_file" class="file-input">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="certificado_conclusao_file">Anexar Certificado de Conclusão:</label>
                    <input type="file" id="certificado_conclusao_file" name="certificado_conclusao_file" class="file-input">
                </div>
                <div class="form-group">
                    <label for="historico_escolar_file">Anexar Histórico Escolar:</label>
                    <input type="file" id="historico_escolar_file" name="historico_escolar_file" class="file-input">
                </div>
            </div>
            
            <div class="form-group">
                <label for="comprovante_residencia_file">Anexar Comprovante de Residência:</label>
                <input type="file" id="comprovante_residencia_file" name="comprovante_residencia_file" class="file-input">
            </div>

            <div class="section-title">Informações Adicionais</div>
            <div class="form-row">
                <div class="form-group">
                    <label for="possui_deficiencia">Possui algum tipo de Deficiência?</label>
                    <select id="possui_deficiencia" name="possui_deficiencia">
                        <option value="">Selecione</option>
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="necessita_acompanhamento">Necessita de Acompanhamento Especial?</label>
                    <select id="necessita_acompanhamento" name="necessita_acompanhamento">
                        <option value="">Selecione</option>
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>
            </div>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>

</html>
