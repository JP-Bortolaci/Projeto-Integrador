<?php
require_once 'conexao.php'; // conecta ao banco via PDO

$login = "gestor";
$senha = password_hash("4321", PASSWORD_DEFAULT);
$tipo = "gestor";

try {
    $sql = "INSERT INTO usuarios (login, senha, tipo) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login, $senha, $tipo]);

    if ($stmt->rowCount() > 0) {
        echo "Usuário inserido com sucesso!";
    } else {
        echo "Erro ao inserir usuário.";
    }
} catch (PDOException $e) {
    echo "Erro no banco: " . $e->getMessage();
}
?>
