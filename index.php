<?php 
	require_once('inc/connect.php'); 
	echo "hello world heee";

	$sql = ("SELECT * FROM contacts");
	$stat = $conn->query("sql");
	$row = $qDep->fetch();
	echo "$row[0] $row[1] $row[2]";

	// echo "<table>"; 
	// echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
	// while($row = $qDep->fetch()){  
	// 	echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['email'] . "</td></tr>";  
	// }

	// echo "</table>";

	$conn = NULL;
?>
