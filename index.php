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
				switch ($infoType){
					case 'email address':
						$query = "SELECT * FROM contacts WHERE fName = '$splitName[0]' AND lName = '$splitName[1]'";
						$result = mysqli_query($connection,$query);
						$contactDetail = mysqli_fetch_assoc($result);
						$speech = "Email address of $person is {$contactDetail['mailAddress']}" ;
						break;
					case '':
						$query = "SELECT * FROM contacts WHERE fName = '$splitName[0]' AND lName = '$splitName[1]'";
						$result = mysqli_query($connection,$query);
						$contactDetail = mysqli_fetch_assoc($result);
						$speech = "Email address : {$contactDetail['mailAddress']} \n Telephone number : {$contactDetail['phoneNumber']} " ;
						break;
					case 'telephone number':
						$query = "SELECT * FROM contacts WHERE fName = '$splitName[0]' AND lName = '$splitName[1]'";
						$result = mysqli_query($connection,$query);
						$contactDetail = mysqli_fetch_assoc($result);
						$speech = "Telephone number of $person is {$contactDetail['phoneNumber']}" ;
						break:
					default:
						break;
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
