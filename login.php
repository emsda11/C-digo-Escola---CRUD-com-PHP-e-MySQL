
<?php
session_start();
require_once "conexao.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios
            WHERE email = :email AND senha = :senha";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "email" => $email,
        "senha" => $senha
    ]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        session_regenerate_id(true);
        $_SESSION["usuario_id"] = $usuario["id"];

        header("Location: index.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

    <h2>Login do Sistema</h2>

    <form method="POST">

        <label>E-mail:</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <br><br>

        <button type="submit">Entrar</button>

    </form>

    <p><?php echo htmlspecialchars($erro); ?></p>

</body>
</html>
