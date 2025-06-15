<?php
require_once 'cadeado.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Sistema Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Olá, <?php echo htmlspecialchars($_SESSION['usuario_login']); ?>!</h1>
    <p><a href="carros.php" class="btn btn-primary">Gerenciar meus carros</a></p>
    <p><a href="logout.php" class="btn btn-danger">Sair</a></p>
</body>
</html>
