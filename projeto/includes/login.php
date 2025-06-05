<?php
header('Content-Type: application/json');
require_once 'conexao.php'; // usa $pdo

// Lê e decodifica os dados do corpo da requisição
$data = json_decode(file_get_contents("php://input"), true);
$login = $data['login'] ?? '';
$senha = $data['senha'] ?? '';

try {
    // Prepara e executa a consulta
    $sql = "SELECT senha, tipo FROM usuarios WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        echo json_encode([
            "sucesso" => true,
            "tipoUsuario" => $usuario['tipo']
        ]);
    } else {
        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Usuário ou senha incorretos."
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Erro no banco: " . $e->getMessage()
    ]);
}
?>
