<?php
// /includes/busca.php

include('conexao.php');

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Prepara a consulta para buscar os itens que correspondem à pesquisa
$query = "SELECT nome, localizacao FROM itens WHERE nome LIKE :search OR referencia LIKE :search";
$stmt = $pdo->prepare($query);
$stmt->execute(['search' => '%' . $searchQuery . '%']);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Retorna os resultados como JSON
echo json_encode($results);
?>
