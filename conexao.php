<?php
    $host = "localhost";
    $banco = "escola";
    $usuario = "root";
    $senha = "admin";
try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$banco;
                                    charset=utf8mb4",
        $usuario,
        $senha
    );
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );      
}catch(PDOException $erro){
    die("Erro de conexão" . $erro->getMessage());
}

?>