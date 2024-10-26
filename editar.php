<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tarefa WHERE id = ?");
    $stmt->execute([$id]);
    $tarefas = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tarefas) {
        die("Tarefa não encontrada!");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $materia = $_POST['materia'];
    $descricao = $_POST['descricao'];
    $data_entrega = $_POST['data_entrega'];

    $stmt = $pdo->prepare("UPDATE tarefa SET materia = ?, descricao = ?, data_entrega = ? WHERE id = ?");
    $stmt->execute([$materia, $descricao, $data_entrega, $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $tarefas['id']; ?>">
        <label>Matéria:</label><br>
        <input type="text" name="materia" value="<?php echo htmlspecialchars($tarefas['materia']); ?>" required><br>
        <label>Descrição:</label><br>
        <textarea name="descricao" required><?php echo htmlspecialchars($tarefas['descricao']); ?></textarea><br>
        <label>Data de Entrega:</label><br>
        <input type="date" name="data_entrega" value="<?php echo htmlspecialchars($tarefas['data_entrega']); ?>" required><br><br>
        <button type="submit">Salvar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
