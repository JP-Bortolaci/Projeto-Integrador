<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método inválido']);
    exit;
}

require_once 'conexao.php';

$nome = trim($_POST['name'] ?? '');
$referencia = trim($_POST['reference'] ?? '');
$localizacao = trim($_POST['location'] ?? '');

if (empty($nome) || empty($referencia) || empty($localizacao)) {
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos']);
    exit;
}

try {
    $sql = "INSERT INTO item (nome, referencia, localizacao) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $referencia, $localizacao]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no banco: ' . $e->getMessage()]);
}
?>
