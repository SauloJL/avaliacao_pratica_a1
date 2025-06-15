<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Sistema Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="container pt-4">
    <h1>Login - Sistema Carros</h1>

    <?php 
    require_once 'funcoes.php';
    tratar_erros();
    ?>

    <form action="verificar.php" method="post" class="mb-3">

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário:</label>
            <input type="text" id="usuario" name="usuario" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-success">Entrar</button>
        <a href="cadastro.php" class="btn btn-link">Cadastrar novo usuário</a>
    </form>
</body>
</html>