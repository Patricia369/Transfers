<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUSCAR Reserva</title>
    <link rel="stylesheet" href="/Transfers/public/css/buscarReserva.css">
</head>
<body>
    <h2>Reserva por localizador</h2>
    <button class="btn">Actualizar Reserva</button><a href="/Transfers/app/views/panelUsuario.php" class="btnAtras">Volver</a>
    
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

    
</body>
</html>