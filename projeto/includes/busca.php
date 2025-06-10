<?php
require_once 'conexao.php';

$search = $_GET['search'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT id, nome, referencia, localizacao FROM item WHERE nome LIKE ? OR referencia LIKE ?");
    $stmt->execute(["%$search%", "%$search%"]);
    $itens = $stmt->fetchAll();

    echo json_encode($itens);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
