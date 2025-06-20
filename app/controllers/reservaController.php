<?php

include_once __DIR__ . '/../../config/config.php';
include_once __DIR__ . '/../models/reserva.php';

use App\Models\Reserva;

use function Avifinfo\read;

class ReservaController
{
    private $pdo;
    private $reserva;
    public function __construct($pdo)
    {
        //inicializar el objeto PDO
        $this->reserva = new Reserva($pdo);
        $this->pdo = $pdo;
    }

    //Obtener los campos según  el tipo de reserva
    public function validarTrayecto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errores = [];
            $trayecto = $_POST['id_destino'];
            $formEntrada = ['fecha_entrada', 'hora_entrada', 'numero_vuelo_entrada', 'origen_vuelo_entrada'];
            $formSalida = ['fecha_vuelo_salida', 'hora_vuelo_salida', 'numero_vuelo_salida', 'hora_recogida'];
            $campFormOblig = [
                'id_tipo_reserva',
                'fecha_entrada',
                'hora_entrada',
                'numero_vuelo_entrada',
                'origen_vuelo_entrada',
                'fecha_vuelo_salida',
                'hora_vuelo_salida',
                'numero_vuelo_salida',
                'hora_recogida',
                'id_destino',
                'id_hotel',
                'num_viajeros',
                'id_vehiculo',
                'email_cliente'
            ];
            $formCompleto = [];
            if (isset($trayecto)) {
                if ($trayecto == 1) {
                    foreach ($campFormOblig as $campEntrada) {

                        $valorEntrada = $_POST[$campEntrada] ?? null;
                        $valorEntrada = ($valorEntrada == '') ? null : $valorEntrada;

                        $formCompleto[$campEntrada] = $valorEntrada;
                        if (in_array($campEntrada, $formEntrada)) {
                            if (empty($valorEntrada)) {
                                $errores[$campEntrada] = "El campo $campEntrada es obligatorio.";
                            }
                        }
                    }
                } else if ($trayecto == 2) {

                    foreach ($campFormOblig as $campSalida) {
                        $valorSalida = $_POST[$campSalida] ?? null;
                        $valorSalida = ($valorSalida == '') ? null : $valorSalida;
                        $formCompleto[$campSalida] = $valorSalida;
                        
                        if (in_array($campSalida, $formSalida)) {
                            if (empty($valorSalida)) {
                                $errores[$campSalida] = "El campo $campSalida es obligatorio.";
                            }
                        }
                    }
                } else if ($trayecto == 3) {
                    foreach ($campFormOblig as $campos) {
                        $valorCampos = $_POST[$campos] ?? null;
                        $valorCampos = ($valorCampos == '') ? null : $valorCampos;
                        $formCompleto[$campos] = $valorCampos;
                        if (empty($valorCampos)) {
                            $errores[$campos] = "El campo $campos es obligatorio.";
                        }
                    }
                }
            } else {
                $errores['id_destino'] = "El campo id_destino es obligatorio.";
            }
        }
        return [
            'trayecto' => $trayecto,
            'datos' => $formCompleto,
            'errores' => $errores

        ];
    }


    public function crearReserva()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $reserXTrayecto = $this->validarTrayecto();
            $errores = $reserXTrayecto['errores'];
            $valReserva = $reserXTrayecto['datos'];

            $fechaSalida = $_POST['fecha_vuelo_salida'];
            $horaSalida = $_POST['hora_vuelo_salida'];
            $horVuelSalida = $_POST['hora_vuelo_salida'];

            if (!empty($errores)) {

                include_once __DIR__ . '/../views/reserva.php'; //mostrar reserva con errrores
                foreach ($errores as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
                exit;
            }

            $reserva = [
                'id_tipo_reserva' => $valReserva['id_tipo_reserva'],
                'id_destino' => $valReserva['id_destino'],
                'fecha_entrada' => $valReserva['fecha_entrada'],
                'hora_entrada' => $valReserva['hora_entrada'],
                'numero_vuelo_entrada' => $valReserva['numero_vuelo_entrada'],
                'origen_vuelo_entrada' => $valReserva['origen_vuelo_entrada'],
                'fecha_vuelo_salida' => $valReserva['fecha_vuelo_salida'],
                'hora_vuelo_salida' => null,
                'numero_vuelo_salida' => $valReserva['numero_vuelo_salida'],
                'hora_recogida' => null,
                'id_hotel' => $valReserva['id_hotel'],
                'num_viajeros' => $valReserva['num_viajeros'],
                'id_vehiculo' => $valReserva['id_vehiculo'],
                'email_cliente' => $valReserva['email_cliente'],
                'fecha_reserva' => date('Y-m-d H:i:s'), // Fecha y hora actual
                'fecha_modificacion' => date(('Y-m-d H:i:s')),
                //'email_cliente' => $_SESSION['email_cliente'] ?? null, // ID del email
            ];

            if (!empty($horVuelSalida)) {
                $reserva['hora_vuelo_salida'] = $fechaSalida . ' ' . $horVuelSalida . ':00';
            } else {
                $reserva['hora_vuelo_salida'] = null;
            }

            if (!empty($fechaSalida) && !empty($horaSalida)) {
                $reserva['fecha_vuelo_salida'] = $fechaSalida . ' ' . $horaSalida . ':00';

            } else {
                $reserva['fecha_vuelo_salida'] = null;
            }
            if (!empty($fechaSalida) && !empty($_POST['hora_recogida'])) {
                $reserva['hora_recogida'] = $fechaSalida . ' ' . $_POST['hora_recogida'] . ':00';
            }

            // Crear la reserva
            $this->reserva->crearReserva($reserva);
            header("Location: /Transfers/app/views/panelUsuario.php");
            exit; //}     
        }
    }
    public function mostrarReserLocalizador($localizador)
    {
        //$localizador = "35681fac"; 

        if (isset($localizador)) {
            $reserva = $this->reserva->mostrarReserva($localizador);

            include_once __DIR__ . '/Transfers/app/views/panelUsuario.php';
            return $reserva;
        } else {
            echo "<p style='color:red;'>El localizador no es correcto</p>";
        }
    }

    public function buscarxLocalizador(){
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $localizador = $_GET['localizador'] ?? '';
        $_SESSION['localizador'] = $localizador;
        // Redirige según el rol del usuario
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
            header('Location: /Transfers/app/views/panelAdmin.php');
            exit;
        } else if(isset($_SESSION['rol']) && $_SESSION['rol'] === 'usuario'){
             header('Location: /Transfers/app/views/panelUsuario.php');
            exit;

        }else {
            echo "<p style='color:red;'>El localizador no es correcto</p>";
            $_SESSION['localizador'] = '';
            exit;
        }
        
    
    }



    }
   /* {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if (isset($_SESSION['localizador'])) {

                $_SESSION['localizador'] = $_GET['localizador'];
               
                header('Location: /Transfers/app/views/panelUsuario.php');
            } else {
                echo "<p style='color:red;'>El localizador no es correcto</p>";
                $_SESSION['localizador'] = '';
                exit;
            }
        }
    }*/
}
