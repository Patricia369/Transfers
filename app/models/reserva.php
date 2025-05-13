<?php
namespace App\Models;

use Nette\Utils\Random;

class Reserva
{
    // Atributos
    private $pdo;
    private $id_reserva;
    private $localizador;
    private $id_hotel;
    private $id_tipo_reserva;
    private $email_cliente;
    private $fecha_reserva;
    private $fecha_modificacion;
    private $id_destino;
    private $fecha_entrada;
    private $hora_entrada;
    private $numero_vuelo_entrada;
    private $origen_vuelo_entrada;
    private $hora_vuelo_salida;
    private $fecha_vuelo_salida;
    private $num_viajeros;
    private $id_vehiculo;
    private $hora_recogida;

    // Constructor
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // Getters y Setters
    public function getIdReserva()
    {
        return $this->id_reserva;
    }
   /* public function setIdReserva($id_reserva)
    {
        $this->id_reserva = $id_reserva;
    }*/
    public function getLocalizador()
    {
        return $this->localizador;
    }
    
    
    public function getIdHotel()
    {
        return $this->id_hotel;
    }
    public function setIdHotel($id_hotel)
    {
        $this->id_hotel = $id_hotel;
    }
    public function getIdTipoReserva()
    {
        return $this->id_tipo_reserva;
    }
    public function setIdTipoReserva($id_tipo_reserva)
    {
        $this->id_tipo_reserva = $id_tipo_reserva;
    }
    public function getEmailCliente()
    {
        return $this->email_cliente;
    }

    public function setEmailCliente($email_cliente)
    {
        $this->email_cliente = $email_cliente;
    }
    public function getFechaReserva()
    {
        return $this->fecha_reserva;
    }
    public function setFechaReserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;
    }
    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }
    public function setFechaModificacion($fecha_modificacion)
    {
        $this->fecha_modificacion = $fecha_modificacion;
    }
    public function getIdDestino()
    {
        return $this->id_destino;
    }
    public function setIdDestino($id_destino)
    {
        $this->id_destino = $id_destino;
    }
    public function getFechaEntrada()
    {
        return $this->fecha_entrada;
    }
    public function setFechaEntrada($fecha_entrada)
    {
        $this->fecha_entrada = $fecha_entrada;
    }
    public function getHoraEntrada()
    {
        return $this->hora_entrada;
    }
    public function setHoraEntrada($hora_entrada)
    {
        $this->hora_entrada = $hora_entrada;
    }
    public function getNumeroVueloEntrada()
    {
        return $this->numero_vuelo_entrada;
    }
    public function setNumeroVueloEntrada($numero_vuelo_entrada)
    {
        $this->numero_vuelo_entrada = $numero_vuelo_entrada;
    }
    public function getOrigenVueloEntrada()
    {
        return $this->origen_vuelo_entrada;
    }
    public function setOrigenVueloEntrada($origen_vuelo_entrada)
    {
        $this->origen_vuelo_entrada = $origen_vuelo_entrada;
    }
    public function getHoraVueloSalida()
    {
        return $this->hora_vuelo_salida;
    }
    public function setHoraVueloSalida($hora_vuelo_salida)
    {
        $this->hora_vuelo_salida = $hora_vuelo_salida;
    }
    public function getFechaVueloSalida()
    {
        return $this->fecha_vuelo_salida;
    }
    public function setFechaVueloSalida($fecha_vuelo_salida)
    {
        $this->fecha_vuelo_salida = $fecha_vuelo_salida;
    }
    public function getNumViajeros()
    {
        return $this->num_viajeros;
    }
    public function setNumViajeros($num_viajeros)
    {
        $this->num_viajeros = $num_viajeros;
    }
    public function getIdVehiculo()
    {
        return $this->id_vehiculo;
    }
    public function setIdVehiculo($id_vehiculo)
    {
        $this->id_vehiculo = $id_vehiculo;
    }
    public function getHoraRecogida()
    {
        return $this->hora_recogida;
    }
    public function setHoraRecogida($hora_recogida)
    {
        $this->hora_recogida = $hora_recogida;
    }
    // Métodos
    
    public function crearReserva ($reserva){
       
        do{   
            $localizador = substr(uniqid(rand(0,50), true), 0,8);
            $query = $this->pdo->prepare("SELECT COUNT(*) FROM transfer_reservas WHERE localizador = :localizador");
            $query->execute([':localizador' => $localizador]);
            $existe = $query->fetchColumn();
        } while ($existe > 0);
        
        $sql = "INSERT INTO transfer_reservas (localizador,id_hotel, id_tipo_reserva, email_cliente, fecha_reserva, fecha_modificacion, 
                        id_destino, fecha_entrada, hora_entrada, numero_vuelo_entrada, origen_vuelo_entrada, 
                        hora_vuelo_salida, fecha_vuelo_salida, num_viajeros, id_vehiculo, hora_recogida, numero_vuelo_salida) 
                        VALUES (:localizador, :id_hotel, :id_tipo_reserva, :email_cliente, :fecha_reserva, :fecha_modificacion,
                        :id_destino, :fecha_entrada, :hora_entrada, :numero_vuelo_entrada, :origen_vuelo_entrada,
                        :hora_vuelo_salida, :fecha_vuelo_salida, :num_viajeros, :id_vehiculo, :hora_recogida, :numero_vuelo_salida)";
       
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
            ':localizador' => $localizador,
            ':id_hotel' => $reserva['id_hotel'],
            ':id_tipo_reserva' => $reserva['id_tipo_reserva'],
            ':email_cliente' => $reserva['email_cliente'],
            ':fecha_reserva' => $reserva['fecha_reserva']?? null,
            ':fecha_modificacion' => $reserva['fecha_modificacion']?? null,
            ':id_destino' => $reserva['id_destino'],
            ':fecha_entrada' => $reserva['fecha_entrada']?? null,
            ':hora_entrada' => $reserva['hora_entrada']?? null,
            ':numero_vuelo_entrada' => $reserva['numero_vuelo_entrada']?? null,
            ':origen_vuelo_entrada' => $reserva['origen_vuelo_entrada']?? null,
            ':hora_vuelo_salida' => $reserva['hora_vuelo_salida']?? null,
            ':fecha_vuelo_salida' => $reserva['fecha_vuelo_salida']?? null,
            ':num_viajeros' => $reserva['num_viajeros'],
            ':id_vehiculo' => $reserva['id_vehiculo']?? null,
            ':hora_recogida' => $reserva['hora_recogida']?? null,
            ':numero_vuelo_salida' => $reserva['numero_vuelo_salida']?? null
        ]); 
         
        } catch (\PDOException $error) {
            echo $error->getMessage();
            echo "<pre> Error al crear la reserva: " . $error->getMessage();
        }
        
        
        return $localizador;        

    }/*
    public function actualizarReserva($reserva){
        $sql = "UPDATE transfer_reservas SET id_hotel = :id_hotel, id_tipo_reserva = :id_tipo_reserva, email_cliente = :email_cliente, 
                fecha_reserva = :fecha_reserva, fecha_modificacion = :fecha_modificacion, id_destino = :id_destino, 
                fecha_entrada = :fecha_entrada, hora_entrada = :hora_entrada, numero_vuelo_entrada = :numero_vuelo_entrada, 
                origen_vuelo_entrada = :origen_vuelo_entrada, hora_vuelo_salida = :hora_vuelo_salida, 
                fecha_vuelo_salida = :fecha_vuelo_salida, num_viajeros = :num_viajeros, id_vehiculo = :id_vehiculo, 
                hora_recogida = :hora_recogida WHERE id_reserva = :id_reserva";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id_hotel' => $reserva['id_hotel'],
            ':id_tipo_reserva' => $reserva['id_tipo_reserva'],
            ':email_cliente' => $reserva['email_cliente'],
            ':fecha_reserva' => $reserva['fecha_reserva'],
            ':fecha_modificacion' => $reserva['fecha_modificacion'],
            ':id_destino' => $reserva['id_destino'],
            ':fecha_entrada' => $reserva['fecha_entrada'],
            ':hora_entrada' => $reserva['hora_entrada'],
            ':numero_vuelo_entrada' => $reserva['numero_vuelo_entrada'],
            ':origen_vuelo_entrada' => $reserva['origen_vuelo_entrada'],
            ':hora_vuelo_salida' => $reserva['hora_vuelo_salida'],
            ':fecha_vuelo_salida' => $reserva['fecha_vuelo_salida'],
            ':num_viajeros' => $reserva['num_viajeros'],
            ':id_vehiculo' => $reserva['id_vehiculo'],
            ':hora_recogida' => $reserva['hora_recogida'],
            ':id_reserva' => $reserva['id_reserva']
        ]); 
    }
    /*
    public function eliminarReserva($localizador){
        $sql = "SELECT  id_reserva FROM transfer_reservas WHERE localizador = :localizador";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':localizador' => $localizador]);
        $id_reserva = $stmt->fetchColumn();
        if ($id_reserva) {
            $sql = "DELETE FROM transfer_reservas WHERE id_reserva = :id_reserva";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id_reserva' => $id_reserva]);
            return true; // Reserva eliminada
        } else {
            return false; // No se encontró la reserva
        }
    }*/
    public function mostrarReservas($localizador){
        $sql = "SELECT * FROM transfer_reservas WHERE localizador = :localizador";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':localizador' => $localizador]);
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            return null; // No se encontraron reservas
        }
    }

}


?>