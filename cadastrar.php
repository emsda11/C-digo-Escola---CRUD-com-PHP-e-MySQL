<?php
    require_once 'conexao.php';
    $erro ='';
    $cursos = [
        'ADS' => 'Análise e Desenvolvimento de Sistemas',
        'Informática' => 'Técnico em Informática',
        'Redes' => 'Redes de computadores',
        'Ciência da Computação' => 'Ciência da Computação',
        'Engenharia da Computação' => 'Engenharia da Computação'
    ];
    $nome = $email = $curso ='';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = trim($_POST['nome']?? '');
        $email = trim($_POST['email']?? '');
        $curso = trim($_POST['curso']?? '');
        if ($nome === '' || $email === '' || $curso === ''){
            $erro = 'Preencha todos os campos';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Digite um e-mail válido';

        }elseif(!array_key_exists($curso, $cursos)){
            $erro = 'Selecione um curso válido';
        }else{
            try{
                $sql = 'INSERT INTO aluno (nome, email, curso) VALUES
                        (:nome, :email, :curso)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':nome' => $nome, ':email' => $email, ':curso' => $curso]);
                header('Location: index.php');
                exit;
            }catch(PDOException $e){
                $erro = 'Não foi possível cadastrar o aluno';
            }
        }
    }
    function e(string $valor): string{
        return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar alunos</title>
    </head>
    <body>
        <h2>Cadastrar aluno</h2>
       
    <form method ="POST" action ="cadastrar.php">
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text" maxlength="100"
        value="<?= e($nome)?>" required>
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" maxlength="100"
        value="<?= e($email)?>" required>
        <label for="curso">Curso</label>
        <select id="curso" name ="curso" required>
            <option value ="">Selecione um curso</option>
            <?php foreach ($cursos as $valor => $rotulo):?>
                <option value="<?= e($valor)?>" 
                    <?= $curso === $valor ? "selected" : "" ?>>
                    <?= e($rotulo)?>
                </option>
            <?php endforeach; ?>
              
        </select>
        <button type="submit">Salvar cadastro</button>
        <a href="index.php">Voltar</a>
    </form>
    </body>
</html>