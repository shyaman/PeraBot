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
				$infoType=$param->information-type // extract information type
				
				$splitName = explode(' ', $person);
				
				$query = "SELECT * FROM contacts WHERE fName = '$splitName[0]' and lName = '$splitName[1]'";
				$ontactDetail = mysqli_query($connection,$query);
				
				//fetch contact details according to information-type
				if($infoType == 'email address'){
					$speech = "Email address of $person is {$ontactDetail['mailAddress']}" ;
				}else if($infoType ==''){
					$speech = "Email address : {$ontactDetail['mailAddress']}" ;
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
