<?php

use App\Models\Reserva;

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
        <?php // $this->pdo = $pdo;
      include_once __DIR__ . '/../models/reserva.php';
      include_once __DIR__ . '/../../config/config.php';
       
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass"); 
        $sql = "SELECT * FROM transfer_reservas"; 
         $stmt =$pdo->prepare($sql);
         $stmt->execute();
         $camposReserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
       // print_r($stmt->errorInfo());

            // echo "debajo de camposReserva";
         ?>
        <table border ="1" cellpadding="10" >
        <thead>       
        <tr>
                <th>Localizador</th>
                <th>email</th>
                <th>Fecha de entrada</th>
                <th>Hora de entrada</th>
                <th>Nº de vuelo de entrada</th>
                <th>Origen vuelo de entrada</th>
                <th>Fecha de salida</th>
                <th>Número de vuelo de salida</th>
                <th>Hora recogida</th>
                <th>Número de viajeros</th>
                <th>Vehículo</th>
            </tr>
    </thead>
    <tbody>
        <?php foreach ($camposReserva as $reserva): 
            
          ///  var_dump($camposReserva);
            
            ?>
            <tr>
            <td><?= $reserva['localizador'] ?></td>
            <td><?= $reserva['email_cliente'] ?></td>
            <td><?= $reserva['fecha_entrada'] ?></td>
            <td><?= $reserva['hora_entrada'] ?></td>
            <td><?= $reserva['numero_vuelo_entrada'] ?></td>
            <td><?= $reserva['origen_vuelo_entrada'] ?></td>
            <td><?= $reserva['fecha_vuelo_salida'] ?></td>
            <td><?= $reserva['numero_vuelo_salida'] ?></td>
            <td><?= $reserva['hora_recogida'] ?></td>
            <td><?= $reserva['num_viajeros'] ?></td>
            <td><?= $reserva['id_vehiculo'] ?></td>
            </tr>
            <?php endforeach; ?>

    </tbody>
                  
</table>
        
    </div>


</body>
</html>