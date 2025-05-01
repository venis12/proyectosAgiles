<?php
require 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $password]);
        $message = "Registro exitoso. <a href='index.php'>Inicia sesión</a>";
    } catch (PDOException $e) {
        $message = "Error: usuario ya existe.";
    }
}
?>
<link rel="stylesheet" href="style.css">
<h2>Registro de Usuario</h2>
<form method="post">
    <input type="text" name="username" placeholder="Usuario" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <input type="submit" value="Registrarse">
</form>
<p><?= $message ?></p>
<a href="index.php">¿Ya tienes cuenta? Inicia sesión</a>
