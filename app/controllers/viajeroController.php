<?php 
include_once __DIR__.'/../../config/config.php';
include_once __DIR__.'/../models/viajero.php';
use App\Models\Viajero;

use function Laravel\Prompts\password;

class ViajeroController{ 
private $pdo;
private $viajero;
//pasar el objeto PDO al constructor
public function __construct($pdo){
   // echo ("antes de entrar a crear viajero"); 
    //inicializar el objeto PDO
    $this->viajero = new Viajero($pdo);
    $this->pdo = $pdo;
}
public function index() {
    // Mostrar la vista principal
    include_once __DIR__.'/views/login.php';
}
public function crearViajero(){
  //  echo "dentro de crear viajero";
    if($_SERVER ['REQUEST_METHOD'] === 'POST'){
        $requiredFields = ['nombre', 'apellido1', 'apellido2', 'direccion', 
        'codigoPostal','ciudad', 'pais', 'email', 'password'];
        $errores = [];
        //(verificar si los campos están vacios)
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $errores[$field] = "El campo $field es obligatorio.";
            }
        }
        if(!empty($errores)){
            include_once __DIR__.'/app/views/register.php';
            foreach ($errores as $error) {
                echo "<p class='error'>$error</p>";
            }
            return;
        }
        $data = [
            'nombre' => $_POST['nombre'],
            'apellido1' => $_POST['apellido1'],
            'apellido2' => $_POST['apellido2'],
            'direccion' => $_POST['direccion'],
            'codigoPostal' => $_POST['codigoPostal'],
            'ciudad' => $_POST['ciudad'],
            'pais' => $_POST['pais'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        // crea un nuevo registro
        $this->viajero->create($data); 
        header('Location: /index.php'); // Redirigir a la página de inicio de sesión 
       // echo "Usuario creado con éxito.";
        exit; // termina la ejecución 
    }

}
public function actualizarViajero($id_viajero, $data) {
    $this->viajero->update($id_viajero, $data); 
}
public function eliminarViajero($id_viajero) {
    $this->viajero->delete($id_viajero); // Delegar la eliminación al modelo
}
public function buscarViajero($id_viajero) {
    return $this->viajero->read($id_viajero); // Delegar la consulta al modelo
}
public function mostrarViajeros(){
    $viajeros = $this->viajero->mostrarViajeros(); // Delegar la consulta al modelo
    return $viajeros; // Retornar los viajeros obtenidos


}
public function loginViajero() {
    session_start(); 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $usuario = $this->viajero->autenticarViajero($email);
       if(!$usuario){
            $error = "Sin registro de usuario.";
            $_SESSION['error'] = $error;
            header('Location: /index.php?error='.urlencode($error)); // Mostrar la vista de inicio de sesión con el error
            die();
        
       } else if($usuario){
    if(password_verify($password, $usuario['password'])){ //verificar la contraseña
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header('Location: /Transfers/app/views/panelUsuario.php'); // Redirigir a la página de inicio
            exit; 
        } else {
            $error = "Usuario o contraseña incorrectos.";
            $_SESSION['error'] = $error; 
            header('Location: /Transfers/app/views/login.php'); // Mostrar la vista de inicio de sesión con el error
            die();
            }
        } 
    }   
    
}
}

?>