<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM produtos WHERE id_produto = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Erro: " . $conn->error;
}
?>



