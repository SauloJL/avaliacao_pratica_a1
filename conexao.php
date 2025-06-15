<?php
// conexão com o banco de dados
function conectar_banco() {
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $dbname = 'db_carros';

    $conn = mysqli_connect($host, $usuario, $senha, $dbname);
    if (!$conn) {
        die("Erro ao conectar ao banco: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
}
?>
