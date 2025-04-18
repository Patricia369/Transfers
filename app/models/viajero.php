<?php

namespace App\Models;

class Viajero
{
    // Atributos
    private $pdo;
    private $id_viajero;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $direccion;
    private $codigoPostal;
    private $ciudad;
    private $pais;
    private $email;
    private $password;

    // Constructor
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    // Getters y Setters
    public function getIdViajero()
    {
        return $this->id_viajero;
    }

    public function setIdViajero($id_viajero)
    {
        $this->id_viajero = $id_viajero;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido1()
    {
        return $this->apellido1;
    }

    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }

    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function setPais($pais)
    {
        $this->pais = $pais;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Métodos CRUD
    // Crear $data para que srive
    public function create($data)
    {
          // Verificar que el correo electrónico no esté duplicado
    $sql = "SELECT COUNT(*) FROM transfer_viajeros WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':email' => $data['email']]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        throw new \Exception("El correo electrónico ya está registrado.");
    }
        $sql = "INSERT INTO transfer_viajeros(nombre, apellido1, apellido2, direccion, codigoPostal, ciudad, pais, email, password) VALUES (:nombre, :apellido1, :apellido2, :direccion, :codigoPostal, :ciudad, :pais, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $data['nombre'],
            ':apellido1' => $data['apellido1'],
            ':apellido2' => $data['apellido2'],
            ':direccion' => $data['direccion'],
            ':codigoPostal' => $data['codigoPostal'],
            ':ciudad' => $data['ciudad'],
            ':pais' => $data['pais'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT)
        ]);
    }
    // Leer
    public function read($id)
    {
        $sql = "SELECT * FROM viajeros WHERE id_viajero = :id_viajero";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_viajero' => $id]);
        $viajero = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($viajero) {
            $this->id_viajero = $viajero['id_viajero'];
            $this->nombre = $viajero['nombre'];
            $this->apellido1 = $viajero['apellido1'];
            $this->apellido2 = $viajero['apellido2'];
            $this->direccion = $viajero['direccion'];
            $this->codigoPostal = $viajero['codigoPostal'];
            $this->ciudad = $viajero['ciudad'];
            $this->pais = $viajero['pais'];
            $this->email = $viajero['email'];
        }
        // Lógica para obtener un viajero de la base de datos por su ID
    }

    // Actualizar
    public function update($data)
    {
        $sql = "UPDATE viajeros SET nombre = :nombre, apellido1 = :apellido1, apellido2 = :apellido2, direccion = :direccion, codigoPostal = :codigoPostal, ciudad = :ciudad, email = :email WHERE id_viajero = :id_viajero";
        $stmlt = $this->pdo->prepare($sql);
        $stmlt->execute([
            ':id_viajero' => $this->id_viajero,
            ':nombre' => $data['nombre'],
            ':apellido1' => $data['apellido1'],
            ':apellido2' => $data['apellido2'],
            ':direccion' => $data['direccion'],
            ':codigoPostal' => $data['codigoPostal'],
            ':ciudad' => $data['ciudad'],
            ':pais' => $data['pais'],
            ':email' => $data['email']
        ]);
    }

    // Eliminar
    public function delete($id)
    {
        $sql = "DELETE FROM viajeros WHERE id_viajero = :id_viajero";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_viajero' => $id]);
        $this->id_viajero = null;
        $this->nombre = null;
        $this->apellido1 = null;
        $this->apellido2 = null;
        $this->direccion = null;
        $this->codigoPostal = null;
        $this->ciudad = null;
        $this->pais = null;
        $this->email = null;
        $this->password = null;

        // Lógica para eliminar un viajero de la base de datos por su ID
    }
    public function buscarViajero($id_viajero)
    {
        $sql = "SELECT * FROM transfer_viajeros WHERE id_viajero = :id_viajero";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_viajero' => $id_viajero]);
        $viajero = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $viajero;
    }
    public function mostrarViajeros()
    {
        $sql = "SELECT * FROM transfer_viajeros";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $viajeros = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $viajeros;
    }
            //retorna el viajero po su email
    public function autenticarViajero($email){
        $sql = "SELECT * FROM transfer_viajeros WHERE email = :email ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
