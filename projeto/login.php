<?php
header('Content-Type: application/json');
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);
$login = $data['login'];
$senha = $data['senha'];

$sql = "SELECT senha, tipo FROM usuarios WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($senha, $row['senha'])) {
        echo json_encode([
        "sucesso" => true,
        "tipoUsuario" => $row['tipo']
    ]);
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Senha incorreta."]);
    }
} else {
    echo json_encode(["sucesso" => false, "mensagem" => "Usuário não encontrado."]);
}

$conn->close();
?>
