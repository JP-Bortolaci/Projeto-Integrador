<?php
$servername = "localhost";
$username = "root"; // seu nome de usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "estoque_db"; // o nome do seu banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se há erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
