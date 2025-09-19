<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padaria Pãodango</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <header>
        <div id="navbar">
            <div class="flex">
                <h1>Bem-vindo - Padaria Pãodango</h1>
            </div>
        </div>
        <div class="title">
            <h1>Produtos da Padaria Pãodango</h1>
            <br>
            <br>
            <a href="create.php" class="button">Adicionar Produto</a>
            <h2>Produtos Disponíveis</h2>
        </div>
    </header>

    <main>
        <section>
            <div class="flex">
                <?php
                $sql = "SELECT * FROM produtos";
                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                        echo "<div class='card'>
                                <h3>{$row['nome']}</h3>
                                <p>{$row['descricao']}</p>
                                <p class='preco'>R$ {$row['preco']}</p>
                                <a href='update.php?id={$row['id_produto']}' class='button'>Editar</a>
                                <a href='delete.php?id={$row['id_produto']}' class='button' onclick=\"return confirm('Tem certeza?');\">Excluir</a>
                              </div>";
                    }
                } else {
                    echo "<p>Nenhum produto cadastrado.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
            Todos os direitos reservados 2025
        </div>
    </footer>
</body>
</html>