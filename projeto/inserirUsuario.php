<?php
include 'conexao.php'; // conecta ao banco

$login = "funcionario1";
$senha = password_hash("4321", PASSWORD_DEFAULT); // senha segura
$tipo = "funcionario"; // ou "funcionario"

$sql = "INSERT INTO usuarios (login, senha, tipo) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $login, $senha, $tipo);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Usuário inserido com sucesso!";
} else {
    echo "Erro ao inserir usuário.";
}

$conn->close();
?>
