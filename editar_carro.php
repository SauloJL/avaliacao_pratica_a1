<?php
require_once 'cadeado.php';
require_once 'conexao.php';
require_once 'funcoes.php';

$conn = conectar_banco();
$usuario_id = $_SESSION['usuario_id'];

if (!isset($_GET['id'])) {
    header('location:carros.php?code=6');
    exit;
}

$id = intval($_GET['id']);

// buscar dados do carro para preencher o form
$sql = "SELECT titulo, descricao FROM carros WHERE id = ? AND usuario_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $id, $usuario_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) === 0) {
    header('location:carros.php?code=6');
    exit;
}

mysqli_stmt_bind_result($stmt, $titulo, $descricao);
mysqli_stmt_fetch($stmt);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (form_em_branco('titulo', 'descricao')) {
        header("location:editar_carro.php?id=$id&code=2");
        exit;
    }

    $novo_titulo = trim($_POST['titulo']);
    $nova_descricao = trim($_POST['descricao']);

    $sql_update = "UPDATE carros SET titulo = ?, descricao = ? WHERE id = ? AND usuario_id = ?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, 'ssii', $novo_titulo, $nova_descricao, $id, $usuario_id);

    if (mysqli_stmt_execute($stmt_update)) {
        header('location:carros.php');
        exit;
    } else {
        header("location:editar_carro.php?id=$id&code=4");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Editar Carro</h1>

    <?php
    tratar_erros();
    ?>

    <form action="editar_carro.php?id=<?php echo $id; ?>" method="post" class="mb-3">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required value="<?php echo htmlspecialchars($titulo); ?>" />
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="5" required><?php echo htmlspecialchars($descricao); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="carros.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
