<?php

$servername= "localhost";
$username = "muhammed";
$password = "muhammed";
$dbname = "pdo";

try{
    $Connection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $Connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException  $e){
    echo 'Err : '.$e->getMessage();
}

include_once 'UserDB.php';

$Personn = new UserDB($Connection);



