<?php

function connectDB() {
    $dbFile = './db.sqlite';
    $pdo = new PDO("sqlite:$dbFile");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

if (!file_exists('./db.sqlite')) {
    $pdo = connectDB();
    $sql = "CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT not null,
        email TEXT not null unique
    )";
    $pdo->exec($sql);
}
?>