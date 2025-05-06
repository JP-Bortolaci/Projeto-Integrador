<?php
include 'db_connect.php'; // Inclui a conexão com o banco de dados

$search = $_GET['search'] ?? ''; // Pega o parâmetro de busca da URL

$sql = "SELECT * FROM itens WHERE nome LIKE '%$search%' OR referencia LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os resultados encontrados
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . $row['nome'] . "</strong> - Localização: " . $row['localizacao'] . "</li>";
    }
} else {
    echo "Nenhum item encontrado.";
}
?>
