<?php

$host = 'localhost';        // ou 127.0.0.1
$usuario = 'root';          // padrão do XAMPP
$senha = '';                // senha em branco no XAMPP
$banco = 'estoque';  // substitua pelo nome real do seu banco

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
