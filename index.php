<?php 
	require_once('inc/connect.php'); 
	echo "hello world";

	$query = "SELECT * FROM contacts"; 
    $result = mysqli_query($connection,$query);

	echo "<table>"; 
	echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
	while($row = mysqli_fetch_assoc($result)){  
		echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['mailAddress'] . "</td></tr>";  
	}

	echo "</table>";


	mysqli_close($connection);
?>
