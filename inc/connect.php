<?php 

$dsn = 'mysql:dbname=localdb;host=127.0.0.1:56116;charset=utf8';
$user = 'azure';
$password = '6#vWHD_$';

try {
    $conn = new PDO($dsn, $user, $password);
    $sql = ("SELECT * FROM contacts");
 	$stat = $conn->query("$sql");
 	$row = $qDep->fetch();
 	echo "$row[0] $row[1] $row[2]";

 	$conn = NULL;

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

?>