<?php
include 'db_connect.php'; // Inclui a conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $referencia = $_POST['referencia'];
    $localizacao = $_POST['localizacao'];

    // Atualizando no banco de dados
    $sql = "UPDATE itens SET nome='$nome', referencia='$referencia', localizacao='$localizacao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Item atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Pegando o item para editar (exibindo os dados no formulário)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM itens WHERE id=$id";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();
}
?>

<form action="editar_item.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $item['nome']; ?>">

    <label for="referencia">Referência:</label>
    <input type="text" name="referencia" value="<?php echo $item['referencia']; ?>">

    <label for="localizacao">Localização:</label>
    <input type="text" name="localizacao" value="<?php echo $item['localizacao']; ?>">

    <button type="submit">Salvar</button>
</form>
