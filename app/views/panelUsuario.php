<?php

use App\Models\Reserva;

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php?controller=login');
    exit;
}
$nombre = $_SESSION['nombre'] ?? 'Usuario'; // Nombre de usuario
$email = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Usuario';
if (isset($_SESSION['localizador'])) {

    $localizador = $_SESSION['localizador'];
    
} else {

    $localizador = null;
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="/Transfers/public/css/panelUsuario.css">
</head>

<body>
    <h2>Bienvenido usuario</h2>
    <h1>Bienvenido, <?= htmlspecialchars($nombre) ?></h1>
    <h3><?
        echo $email ?></h3>
    <a href="reserva.php" class="btn">Realizar reserva</a>
    <a href="logout.php" class="btnCerrSesion">Cerrar sesión</a>
    <div class="container">
        <h2>Mis reservas</h2>
        <div class="container">
            <form action="/Transfers/app/appController.php?controller=reserva&action=buscarxLocalizador?" method="get">
                <input type="hidden" name="controller" value="reserva">
                <input type="hidden" name="action" value="buscarxLocalizador">
                <input type="text" name="localizador" id="localizador" placeholder="Ingresa el localizador">
                <button type="submit" class="btnBuscar">Buscar
                </button>
            </form>
        </div><br>
        <?php


        include_once __DIR__ . '/../models/reserva.php';
        include_once __DIR__ . '/../../config/config.php';


        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
       

        if ($localizador == '') {
           // var_dump($localizador);
            $sql = "SELECT * FROM transfer_reservas WHERE email_cliente = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $camposReserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['localizador'] = '';
        } else {
           // var_dump($localizador);
            $sql = "SELECT * FROM transfer_reservas WHERE email_cliente = :email AND localizador = :localizador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email, ':localizador' => $localizador]);
            $camposReserva = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['localizador'] = '';
        }

        function eliminarReserva($id)
        {
          
            include_once __DIR__ . '/../models/reserva.php';
            include_once __DIR__ . '/../../config/config.php';
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
            $sql = "DELETE FROM transfer_reservas WHERE localizador = :localizador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':localizador' => $id]);
           
        }

        ?>
        <table border="1" cellpadding="10">
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($camposReserva as $reserva):

                   

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
                        <td><button class="btn" onclick="eliminarReserva('<?= $reserva['localizador'] ?>')">Eliminar</button></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <script>
        function eliminarReserva(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta reserva?")) {
                // Llamada a PHP por URL (GET)
                window.location.href = "eliminar.php?localizador=" + encodeURIComponent(id);
            }
        }
    </script>

</body>

</html>