<?php
include 'db_connect.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando os dados do formulário
    $nome = $_POST['nome'];
    $referencia = $_POST['referencia'];
    $localizacao = $_POST['localizacao'];

    // Inserindo no banco de dados
    $sql = "INSERT INTO itens (nome, referencia, localizacao) VALUES ('$nome', '$referencia', '$localizacao')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo item cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>
