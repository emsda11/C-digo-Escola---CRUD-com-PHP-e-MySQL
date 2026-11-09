<?php

require_once "conexao.php";
$sql = "SELECT * FROM aluno ORDER BY id DESC";
$stmt = $pdo->query($sql);
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de alunos</title>
</head>
<body>
    <h1>Sistema de alunos</h1>
    <a href="cadastrar.php">
        <button>Cadastrar aluno</button>
    </a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>
        <?php foreach($alunos as $aluno):?>
            <tr>
                <td>
                    <?=$aluno["id"]?>
                </td>
                <td>
                    <?=$aluno["nome"]?>
                </td>
                <td>
                    <?=$aluno["email"]?>
                </td>
                <td>
                    <?=$aluno["curso"]?>
                </td>
               <td>
                <a href="editar.php?id=<?=$aluno["id"]?>">
                Editar
                </a>
                <a href="excluir.php?id=<?=$aluno["id"]?>">
                Excluir
                </a>
               </td>
            </tr>
            <?php endforeach;?>
    </table>
</body>
</html>
