<?php
require_once 'cadeado.php';
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    header('location:carros.php?code=6');
    exit;
}

$id = intval($_GET['id']);
$usuario_id = $_SESSION['usuario_id'];

$conn = conectar_banco();

$sql = "DELETE FROM carros WHERE id = ? AND usuario_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $id, $usuario_id);

mysqli_stmt_execute($stmt);

header('location:carros.php');
exit;
?>
