<?php 
require_once 'funcoes.php';
require_once 'conexao.php';

if (form_nao_enviado()) {
    header('location:index.php?code=0');
    exit;
}

if (form_em_branco('usuario', 'senha')) {
    header('location:index.php?code=2');
    exit;
}

$usuario = trim($_POST['usuario']);
$senha = $_POST['senha'];

$conn = conectar_banco();

$sql = "SELECT id, login, senha, email FROM usuarios WHERE login = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    header('location:index.php?code=3');
    exit;
}

mysqli_stmt_bind_param($stmt, 's', $usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) === 0) {
    header('location:index.php?code=1');
    exit;
}

mysqli_stmt_bind_result($stmt, $id, $login, $senha_hash, $email);
mysqli_stmt_fetch($stmt);

if (!senha_verificar($senha, $senha_hash)) {
    header('location:index.php?code=1');
    exit;
}

session_start();
$_SESSION['usuario_id'] = $id;
$_SESSION['usuario_login'] = $login;
$_SESSION['usuario_email'] = $email;

header('location:dashboard.php');
exit;
?>
