<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="style.css">
<h2>¡Bienvenido, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
<p><a href="logout.php">Cerrar sesión</a></p>
