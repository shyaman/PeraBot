<?php 
	require_once('inc/connect.php'); //database connect

	$method  = $_SERVER['REQUEST_METHOD'];

	if ($method == "POST") {
		$requestBody = file_get_contents('php://input');
		$json = json_decode($requestBody);

		$intent = $json->result->metadata->intentName;	//extract the intent
		$param = $json->result->parameters;	//extract parameters

		switch ($intent) {
			case 'get_contact_information':
				//include ('features/contacInformation');

				$person =  $param->person;	//extract person name
				$infoType=$param->information->type; // extract information type
				
				$splitName = explode(' ', $person);
				
				//fetch contact details according to information-type
				if($infoType == 'email address'){ // when only the email address is asked
					$query = "SELECT mailAddress FROM contacts WHERE fName = '$splitName[0]' and lName = '$splitName[1]'";
					$result = mysqli_query($connection,$query);
					$mail = mysqli_fetch_assoc($result);
					$speech = "Email address of $person is {$mail['mailAddress']}" ;
				
				}

				//create reponse to the dilogflow and echo it
				$response = new \stdClass();
				$response->speech = $speech;
				$response->displayText = $speech;
				$response->source = "webhook";
				echo json_encode($response);

				break;
			
			default:
				break;
		}
	}

	mysqli_close($connection);	//closing database connection
?>
