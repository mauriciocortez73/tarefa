<?php
include 'conexao.php';
$result = $conn->query("SELECT * FROM tarefas");
?>

<h2>Lista de Tarefas</h2>
<a href="inserir.php">Nova Tarefa</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Materia</th>
        <th>Descricao</th>
        <th>Data de Entrega</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['materia']; ?></td>
        <td><?php echo $row['descricao']; ?></td>
        <td><?php echo $row['data_entrega']; ?></td>
        <td>
            <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
            <a href="excluir.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
