<?php
include "conexao.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM alunos WHERE id=$id";
    $result = $conn->query($sql);
    $aluno = $result->fetch_assoc();
}

if (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    $sql = "UPDATE alunos SET nome='$nome', email='$email', curso='$curso' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
</head>
<body>
    <h2>Editar Aluno</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
        Nome: <input type="text" name="nome" value="<?= $aluno['nome'] ?>"><br><br>
        Email: <input type="email" name="email" value="<?= $aluno['email'] ?>"><br><br>
        Curso: <input type="text" name="curso" value="<?= $aluno['curso'] ?>"><br><br>
        <button type="submit" name="salvar">Salvar</button>
    </form>
</body>
</html>
