
<?php

$dsn = "mysql: host=localhost; dbname=eraasoft_backend1";
$user = "root";
$password = "";


try {
    
    $cont = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    //throw $th;
    echo "Error: ". $e;
}