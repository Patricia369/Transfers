<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php?controller=login');
    exit;
}
$nombre = $_SESSION['nombre'] ?? 'Usuario'; // Nombre de usuario
?>  

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
    <h2>Bienvenido usuario particular</h2>
    <h1>Bienvenido, <?= htmlspecialchars($nombre) ?></h1>
    <a href="/logout.php">Cerrar sesión</a>
    
</body>
</html>