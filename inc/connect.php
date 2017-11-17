<?php 
try {
    $conn = new PDO("sqlsrv:server = tcp:perabot.database.windows.net,1433; Database = perabot", "perabotDev", "per@bot1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = ("SELECT * FROM contacts");
	$stat = $conn->query("$sql");
	$row = $qDep->fetch();
	echo "$row[0] $row[1] $row[2]";

	

	$conn = NULL;
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));

?>