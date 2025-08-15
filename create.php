<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id_usuario = 1; 

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuario)
            VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$id_usuario')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
    
</head>
<body>
    <h1>Adicionar Produto</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Descrição: <textarea name="descricao" required></textarea><br>
        Preço: <input type="number" step="0.01" name="preco" required><br>
        Quantidade: <input type="number" name="quantidade" required><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>