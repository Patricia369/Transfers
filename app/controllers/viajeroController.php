<?php 
include_once __DIR__.'/../../config/config.php';
include_once __DIR__.'/../models/viajero.php';
//echo "PASA A crear viajero";
use App\Models\Viajero;


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
    // Mostrar la vista principal (por ejemplo, login)
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
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
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
public function loginViajero($email, $password) {
    $viajero = $this->viajero->autenticarViajero($email); // Delegar la consulta al modelo
    if ($viajero && password_verify($password, $viajero['password'])) {
        // Autenticación exitosa
        return true;
    } else {
        // Autenticación fallida
        return false;
    }
}
}

?>