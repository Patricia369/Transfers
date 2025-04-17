<?php
$host ='database'; // Database host
$dbname ='transfers'; // Database name
$user ='user'; // Database user
$pass ='12345'; // Database password
try{
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected to the database successfully!";
    
}catch(PDOException $error){
    die("Connection failed: " . $error->getMessage());
   // echo "Connection failed: " . $error->getMessage();


}
$conexion = null; // Close the connection
?>