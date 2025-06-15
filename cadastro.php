<?php 
require_once 'conexao.php';
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (form_em_branco('login', 'senha', 'email')) {
        header('location:cadastro.php?code=2');
        exit;
    }

    $login = trim($_POST['login']);
    $senha = $_POST['senha'];
    $email = trim($_POST['email']);

    $conn = conectar_banco();

    // verificar se login ou email já existem
    $sql_check = "SELECT id FROM usuarios WHERE login = ? OR email = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, 'ss', $login, $email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        header('location:cadastro.php?code=5');
        exit;
    }

    // cadastrar usuário
    $senha_hash = senha_hash($senha);

    $sql = "INSERT INTO usuarios (login, senha, email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $login, $senha_hash, $email);
    $executou = mysqli_stmt_execute($stmt);

    if ($executou) {
        header('location:index.php');
        exit;
    } else {
        header('location:cadastro.php?code=4');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro - Sistema Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Cadastro - Sistema Carros</h1>

    <?php
    tratar_erros();
    ?>

    <form action="cadastro.php" method="post" class="mb-3">
        <div class="mb-3">
            <label for="login" class="form-label">Usuário:</label>
            <input type="text" id="login" name="login" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="index.php" class="btn btn-link">Voltar para login</a>
    </form>
</body>
</html>
