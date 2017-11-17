<?php 
try {
    $conn = new PDO("sqlsrv:server = tcp:perabot.database.windows.net,1433; Database = perabot", "perabotDev", "per@bot1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = ("SELECT * FROM contacts");
	$stat = $conn->query("$sql");
	$row = $qDep->fetch();
	echo "$row[0] $row[1] $row[2]";

	// echo "<table>"; 
	// echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
	// while($row = $qDep->fetch()){  
	// 	echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['email'] . "</td></tr>";  
	// }

	// echo "</table>";

	$conn = NULL;
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>