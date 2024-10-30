<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tarefa WHERE id=$id");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['materia'];
    $email = $_POST['descricao'];

    $stmt = $conn->prepare("UPDATE tarefa SET materia=?, descricao=? WHERE id=?");
    $stmt->bind_param("ssi", $materia, $descricao, $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<h2>Editar Tarefa</h2>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label>Nome: <input type="text" name="materia" value="<?php echo $user['materia']; ?>" required></label><br>
    <label>Email: <input type="text" name="descricao" value="<?php echo $user['descricao']; ?>" required></label><br>
    <button type="submit">Atualizar</button>
</form>
