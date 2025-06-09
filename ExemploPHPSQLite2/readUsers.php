<?php
require_once 'db.php';

$pdo = connectDB();

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) > 0) {
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['id']) . "</td>";
        echo "<td>" . htmlspecialchars($user['name']) . "</td>";
        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
        echo "<td class='actions'>";
        echo "<button class='edit-btn' data-id='" . htmlspecialchars($user['id']) . "'>Editar</button>";
        echo "<button class='delete-btn' data-id='" . htmlspecialchars($user['id']) . "'>Deletar</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum usuário encontrado.</td></tr>";
}
?>