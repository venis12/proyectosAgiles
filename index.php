<?php
session_start();
require 'db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<link rel="stylesheet" href="style.css">
<h2>Iniciar Sesión</h2>
<form method="post">
    <input type="text" name="username" placeholder="Usuario" required><br>
    <input type="password" name="password" placeholder="Contraseña" required><br>
    <input type="submit" value="Entrar">
</form>
<p style="color:red;"><?= $error ?></p>
<a href="register.php">¿No tienes cuenta? Regístrate</a>
