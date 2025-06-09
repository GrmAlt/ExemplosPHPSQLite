<?php
require_once 'db.php';

$pdo = connectDB();

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['message' => 'Usuário deletado']);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Erro ao deletar usuário: ' . $e->getMessage()]);
}
?>