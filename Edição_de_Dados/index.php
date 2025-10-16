<?php
include "conexao.php";

$sql = "SELECT * FROM alunos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
</head>
<body>
    <h2>Alunos Cadastrados</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["curso"] ?></td>
            <td><a href="editar.php?id=<?= $row['id'] ?>">Editar</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
