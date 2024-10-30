<?php include 'conexao.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $materia = $_POST['materia'];
    $descricao = $_POST['descricao'];

    $stmt = $conn->prepare("INSERT INTO usuarios (materia, descricao) VALUES (?, ?)");
    $stmt->bind_param("sss", $materia, $descricao);
    $stmt->execute();
    header("Location: index.php");
}
?>

<h2>Nova Tarefa</h2>
<form method="post">
    <label>Materia: <input type="text" name="materia" required></label><br>
    <label>Descricao: <input type="text" name="descricao" required></label><br>
    <button type="submit">Cadastrar</button>
</form>
