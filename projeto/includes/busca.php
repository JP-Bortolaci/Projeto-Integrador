<?php
require 'conexao.php';

$search = $_GET['search'] ?? '';

if (!$search) {
    echo json_encode([]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, nome, referencia, localizacao FROM itens WHERE nome LIKE ? OR referencia LIKE ?");
    $like = "%$search%";
    $stmt->execute([$like, $like]);
    $result = $stmt->fetchAll();

    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
