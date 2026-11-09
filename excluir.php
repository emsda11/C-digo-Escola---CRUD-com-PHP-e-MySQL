<?php

require_once "conexao.php";
$id = filter_input(INPUT_GET, "id", 
                            FILTER_VALIDATE_INT);
if(!$id){
    die("ID inválido");
}
$sql = "DELETE FROM aluno WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);
header("Location: index.php");
?>