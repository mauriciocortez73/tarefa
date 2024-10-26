<?php
$host = 'localhost';
$dbname = 'tarefa_banco';
$user = 'user';
$password = 'toor';

try {
    $pdo = new PDO("mariadb:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage()); 
}
?>
