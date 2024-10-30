<?php
$host = 'localhost';
$db = 'tarefa';
$user = 'user';
$pass = '123';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
