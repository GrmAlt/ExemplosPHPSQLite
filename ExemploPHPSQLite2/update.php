<?php
require_once 'db.php';

$pdo = connectDB();

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

try {
    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([$name, $email, $id]);

    echo json_encode(['message' => 'Usuário atualizado']);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao atualizar usuário: ' . $e->getMessage()]);
}
?>