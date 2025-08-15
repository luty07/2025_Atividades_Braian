<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produto = $_POST['id_produto'];
    
    $sql = "SELECT quantidade_estoque FROM produtos WHERE id_produto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produto);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
        
        if ($produto['quantidade_estoque'] > 0) {
            $sql_update = "UPDATE produtos SET quantidade_estoque = quantidade_estoque - 1 WHERE id_produto = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("i", $id_produto);
            
            if ($stmt_update->execute()) {
                echo "<script>
                    alert('Compra realizada');
                    window.location.href = 'cliente.php';
                </script>";
            } else {
                echo "<script>
                    alert('Erro ao processar a compra');
                    window.location.href = 'cliente.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Produto sem estoque');
                window.location.href = 'cliente.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Produto não encontrado');
            window.location.href = 'cliente.php';
        </script>";
    }
} else {
    header("Location: cliente.php");
    exit();
}
?>
