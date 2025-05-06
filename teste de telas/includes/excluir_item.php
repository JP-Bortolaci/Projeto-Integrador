<?php
include 'db_connect.php'; // Inclui a conexão com o banco de dados

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM itens WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Item excluído com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
