<?php 

$dsn = 'mysql:dbname=localdb;host=127.0.0.1:56116;charset=utf8';
$user = 'azure';
$password = '6#vWHD_$';

try {
    $conn = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

?>