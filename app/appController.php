<?php
include_once __DIR__.'/../config/config.php';
include_once ('controllers/viajeroController.php');
include_once ('controllers/reservaController.php');

//echo "Dentro del appCpntroller!";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
   // Obtener el controlador y la acción de la solicitud
$controllerName = $_GET['controller'] ?? 'viajero'; // Controlador por defecto
$action = $_GET['action'] ?? 'appController'; // Acción por defecto appController

switch ($controllerName) {
    case 'viajero':
        $controller = new ViajeroController($pdo);
        break;
    case 'reserva':
        $controller = new ReservaController($pdo);
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
