<?php
$dbFile = 'users.db';

try {
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY,
        username TEXT UNIQUE,
        password TEXT
    )");
} catch (PDOException $e) {
    echo "Error con la base de datos: " . $e->getMessage();
    exit;
}
?>
