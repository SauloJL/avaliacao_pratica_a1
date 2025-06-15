<?php
require_once 'cadeado.php';
require_once 'conexao.php';

$conn = conectar_banco();
$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT id, titulo, descricao, data_criacao FROM carros WHERE usuario_id = ? ORDER BY data_criacao DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $usuario_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Meus Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Meus Carros</h1>
    <p><a href="novo_carro.php" class="btn btn-success">Cadastrar Novo Carro</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($carro = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($carro['titulo']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($carro['descricao'])); ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($carro['data_criacao'])); ?></td>
                <td>
                    <a href="editar_carro.php?id=<?php echo $carro['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="deletar_carro.php?id=<?php echo $carro['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirma exclusão?');">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php if (mysqli_num_rows($result) === 0): ?>
            <tr><td colspan="4">Nenhum carro cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <p><a href="dashboard.php" class="btn btn-secondary">Voltar ao Dashboard</a></p>
</body>
</html>
