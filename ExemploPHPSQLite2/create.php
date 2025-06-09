<?php
require_once 'db.php';

$pdo = connectDB();

$name = $_POST['name'];
$email = $_POST['email'];

try {
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);

    echo json_encode(['message' => 'Usuário cadastrado']);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao cadastrar usuário: ' . $e->getMessage()]);
}
?>