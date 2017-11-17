<?php 
	require_once('inc/connect.php'); 
	echo "hello world";

	$sql = ("SELECT * FROM contacts");
 	$stat = $conn->query("$sql");
 	$row = $qDep->fetch();
 	echo "$row[0] $row[1] $row[2]";

 	$conn = NULL;
?>
