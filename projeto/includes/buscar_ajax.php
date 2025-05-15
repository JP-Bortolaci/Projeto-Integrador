<?php
// includes/buscar_ajax.php

header('Content-Type: application/json');
require_once 'conexao.php';

$searchTerm = isset($_GET['term']) ? trim($_GET['term']) : '';

if ($searchTerm === '') {
    echo json_encode([]);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT nome, referencia, localizacao FROM itens WHERE nome LIKE :term OR referencia LIKE :term LIMIT 10");
    $likeTerm = "%$searchTerm%";
    $stmt->bindParam(':term', $likeTerm, PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
