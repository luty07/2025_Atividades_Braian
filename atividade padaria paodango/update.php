<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id_produto = $id";
$result = $conn->query($sql);
$produto = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos SET 
                nome='$nome',
                descricao='$descricao',
                preco='$preco',
                quantidade_estoque='$quantidade'
            WHERE id_produto=$id";

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
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
        Descrição: <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required><br>
        Quantidade: <input type="number" name="quantidade" value="<?php echo $produto['quantidade_estoque']; ?>" required><br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>