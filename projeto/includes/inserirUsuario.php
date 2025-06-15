<?php
require_once 'conexao.php'; // conecta ao banco via PDO
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$login = $data['login'] ?? '';
$senha = password_hash($data['senha'] ?? '', PASSWORD_DEFAULT);
$tipoUsuario = $data['tipoUsuario'] ?? '';

try {
    // Verifica se o login já existe
    $check = $pdo->prepare("SELECT id FROM usuarios WHERE login = ?");
    $check->execute([$login]);

    if ($check->rowCount() > 0) {
        http_response_code(409); // Conflito
        echo json_encode([
            "status" => "erro",
            "mensagem" => "Este login já está em uso."
        ]);
        exit;
    }

    // Insere novo usuário
    $sql = "INSERT INTO usuarios (login, senha, tipo) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login, $senha, $tipoUsuario]);

    if ($stmt->rowCount() > 0) {
        echo json_encode([
            "status" => "ok",
            "mensagem" => "Usuário inserido com sucesso!"
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "status" => "erro",
            "mensagem" => "Erro ao inserir usuário."
        ]);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Erro no banco: " . $e->getMessage()
    ]);
}
?>
