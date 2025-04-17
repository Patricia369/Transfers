<?php
include_once __DIR__.'/../config/config.php';
include_once ('controllers/viajeroController.php');

//echo "Dentro del appCpntroller!";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
   // Obtener el controlador y la acción de la solicitud
$controllerName = $_GET['controller'] ?? 'viajero'; // Controlador por defecto
$action = $_GET['action'] ?? 'app.Controller'; // Acción por defecto

switch ($controllerName) {
    case 'viajero':
        $controller = new ViajeroController($pdo);
        break;
    default:
        die("Controlador no encontrado.");
}

// Llamar a la acción correspondiente
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Acción no encontrada.");
}
    





?>
