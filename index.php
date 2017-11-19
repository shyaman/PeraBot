<?php 
	require_once('inc/connect.php'); //database connect

	$method  = $_SERVER['REQUEST_METHOD'];

	if ($method == "POST") {
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);

		$intent = $json->result->metadata->intentName;
		$param = $json->result->parameters;

		switch ($intent) {
			case 'get_contact_information':
				//include ('features/contacInformation');

				$person =  $param->person;

				echo $person;

				$query = "SELECT * FROM contacts"; 
			    $result = mysqli_query($connection,$query);

				echo "<table>"; 
				echo '<tr><th>fName</th><th>lName</th><th>email</th></tr>';
				while($row = mysqli_fetch_assoc($result)){  
					echo "<tr><td>" . $row['fName'] . "</td><td>" . $row['lName'] . "</td><td>" . $row['mailAddress'] . "</td></tr>";  
				}

				echo "</table>";

				break;
			
			default:
				break;
		}
	}

	mysqli_close($connection);	//closing database connection
?>
