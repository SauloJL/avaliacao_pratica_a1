<?php
require_once 'cadeado.php';
require_once 'conexao.php';
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (form_em_branco('titulo', 'descricao')) {
        header('location:novo_carro.php?code=2');
        exit;
    }

    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $usuario_id = $_SESSION['usuario_id'];

    $conn = conectar_banco();

    $sql = "INSERT INTO carros (usuario_id, titulo, descricao) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iss', $usuario_id, $titulo, $descricao);

    if (mysqli_stmt_execute($stmt)) {
        header('location:carros.php');
        exit;
    } else {
        header('location:novo_carro.php?code=4');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Novo Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Cadastrar Novo Carro</h1>

    <?php
    tratar_erros();
    ?>

    <form action="novo_carro.php" method="post" class="mb-3">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="carros.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
