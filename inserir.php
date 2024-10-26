<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $materia = $_POST['materia'];
    $descricao = $_POST['descricao'];
    $data_entrega = $_POST['data_entrega'];

    $stmt = $pdo->prepare("INSERT INTO tarefa (materia, descricao, data_entrega) VALUES (?, ?, ?)");
    $stmt->execute([$materia, $descricao, $data_entrega]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Criar Tarefa</title>
</head>
<body>
    <h1>Criar Tarefa</h1>
    <form method="POST" action="">
        <label>Matéria:</label><br>
        <input type="text" name="materia" required><br>
        <label>Descrição:</label><br>
        <textarea name="descricao" required></textarea><br>
        <label>Data de Entrega:</label><br>
        <input type="date" name="data_entrega" required><br><br>
        <button type="submit">Salvar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
