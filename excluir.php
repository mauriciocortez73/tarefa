<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tarefa WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit();
}
?>