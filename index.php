<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM tarefa");
$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <a href="inserir.php">Criar Nova Tarefa</a>
    <table border="1">
        <tr>
            <th>Matéria</th>
            <th>Descrição</th>
            <th>Data de Entrega</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($tarefa as $tarefas): ?>
        <tr>
            <td><?php echo htmlspecialchars($tarefas['materia']); ?></td>
            <td><?php echo htmlspecialchars($tarefas['descricao']); ?></td>
            <td><?php echo htmlspecialchars($tarefas['data_entrega']); ?></td>
            <td>
                <a href="editar.php?id=<?php echo $tarefas['id']; ?>">Editar</a> |
                <a href="excluir.php?id=<?php echo $tarefas['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
