<?php

use App\Models\Reserva;

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /index.php?controller=login');
    exit;
}
$nombre = $_SESSION['nombre'] ?? 'Usuario'; // Nombre de usuario
$email = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Usuario'; ?>

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
    <h3><?
        echo $email ?></h3>
    <a href="reserva.php" class="btn">Realizar reserva</a>
    <a href="/logout.php" class="btnCerrSesion">Cerrar sesión</a>
    <div class="container">
        <h2>Mis reservas</h2>
        <?php // $this->pdo = $pdo;


        include_once __DIR__ . '/../models/reserva.php';
        include_once __DIR__ . '/../../config/config.php';

        $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
        // $sql = "SELECT * FROM transfer_reservas"; 
        $sql = "SELECT * FROM transfer_reservas WHERE email_cliente = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $camposReserva = $stmt->fetchAll(PDO::FETCH_ASSOC);

        function eliminarReserva($id)
        {
            var_dump($id);
            include_once __DIR__ . '/../models/reserva.php';
            include_once __DIR__ . '/../../config/config.php';
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
            $sql = "DELETE FROM transfer_reservas WHERE localizador = :localizador";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':localizador' => $id]);
            // header('Location: /Transfers/app/views/panelUsuario.php');
        }
        //     echo "<form method='POST' action='eliminar.php' onsubmit='return confirm(\"¿Estás seguro?\")'>
        //     <input type='hidden' name='id' value='$id'>
        //     <button class='btn' type='submit'>Eliminar</button>
        //   </form>";


        //     echo "<form method='POST' action='eliminar.php' onsubmit='return confirm(\"¿Estás seguro?\")'>
        //     <input type='hidden' name='id' value='$id'>
        //     <button class='btn' type='submit'>Eliminar</button>
        //   </form>";

        // print_r($stmt->errorInfo());

        // echo "debajo de camposReserva";
        
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
<button type="submit" aria-label="Buscar">
    <!-- Ícono lupa SVG -->
    <svg viewBox="0 0 24 24">
      <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14A4.5 4.5 0 119.5 5a4.5 4.5 0 010 9z"/>
    </svg>
  </button>
</body>

</html>