<?php
// Funções utilitárias e validações

function tratar_erros() {
    if (isset($_GET['code'])) {
        $code = intval($_GET['code']);
        $msg = '';
        switch ($code) {
            case 0: $msg = "Acesso inválido."; break;
            case 1: $msg = "Usuário ou senha inválidos."; break;
            case 2: $msg = "Campos obrigatórios não preenchidos."; break;
            case 3: $msg = "Erro ao preparar consulta."; break;
            case 4: $msg = "Erro ao executar consulta."; break;
            case 5: $msg = "Login ou email já cadastrado."; break;
            case 6: $msg = "Carro não encontrado ou acesso negado."; break;
        }
        if ($msg) {
            echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
        }
    }
}

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function form_em_branco(...$campos) {
    foreach ($campos as $campo) {
        if (!isset($_POST[$campo]) || trim($_POST[$campo]) === '') {
            return true;
        }
    }
    return false;
}

function proteger_pagina() {
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header('location:index.php?code=0');
        exit;
    }
}

function senha_hash($senha) {
    return password_hash($senha, PASSWORD_DEFAULT);
}

function senha_verificar($senha, $hash) {
    return password_verify($senha, $hash);
}
?>
