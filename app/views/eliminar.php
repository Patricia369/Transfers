<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Transfers/public/css/panelUsuario.css">
    <title>Document</title>
</head>

<body>
    <?php

    include_once __DIR__ . '/../models/reserva.php';
    include_once __DIR__ . '/../../config/config.php';
    if (isset($_GET['localizador'])) {
        $localizador = $_GET['localizador'];
        $esEliminado = false;
        try {
            // $pdo = new PDO("mysql:host=localhost;dbname=mi_base", "usuario", "clave");
            $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

            $stmt = $conexion->prepare("DELETE FROM transfer_reservas WHERE localizador = :localizador");
            $stmt->bindParam(':localizador', $localizador, PDO::PARAM_STR);
            $stmt->execute();
            $esEliminado = true;
        } catch (PDOException $e) {
            echo "Error al eliminar: " . $e->getMessage();
        }
    } else {
        echo "Localizador no recibido.";
    }
    ?>
    <?php if ($esEliminado): ?>
        <h2>Reserva eliminada con éxito</h2>
        
        <button class="btn" onclick="window.location.href='/Transfers/app/views/panelUsuario.php'">
            Volver al panel de usuario
        </button>

    <?php endif; ?>
</body>

</html>