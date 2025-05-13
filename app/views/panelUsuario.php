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
    <link rel="stylesheet" href="/Transfers/public/css/panelUsuario.css">
</head>
<body>
    <h2>Bienvenido usuario particular</h2>
    <h1>Bienvenido, <?= htmlspecialchars($nombre) ?></h1>
    <a href="reserva.php" class="btn">Realizar reserva</a>
    <a href="/logout.php" class="btnCerrSesion">Cerrar sesión</a>
    <div class="container">
        <h2>Mis reservas</h2>
        <table border ="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Localizador</th>
                <th>Fecha de entrada</th>
                <th>Hora de entrada</th>
                <th>Número de vuelo de entrada</th>
                <th>Origen vuelo de entrada</th>
                <th>Fecha de salida</th>
                <th>Número de vuelo de salida</th>
                <th>Hora recogida</th>
                <th>Número de viajeros</th>
                <th>Vehículo</th>
            </tr>
                
</table>
            
    
</body>
</html>