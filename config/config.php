<?php
$host ='database'; // Database host
$dbname ='transfers'; // Database name
$suer ='user'; // Database user
$pass ='password'; // Database password

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $suer, $pass);
    echo "Connected to the database successfully!" + $host;
    
}catch(PDOException $error){
    die("Connection failed: " . $error->getMessage());
    echo "Connection failed: " . $error->getMessage();


}
?>