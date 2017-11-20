
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
				$infoType=$param->information_type; // extract information type
				
				$splitName = explode(' ', $person);
				
				$query = "SELECT * FROM contacts WHERE fName = '$splitName[0]' AND lName = '$splitName[1]'";
				$result = mysqli_query($connection,$query);
				$contactDetail = mysqli_fetch_assoc($result);
				
				//fetch the result according to the information type
				
				if($infoType == 'email address'){
					if($contactDetail['mailAddress'] != ''){
						$speech = "Email address of $person is {$contactDetail['mailAddress']}" ;
					}else{
						$speech = "Sorry ! $person's  email address is not there" ;
					}
				}else if($infoType == ''){
					if($contactDetail['mailAddress'] != '' && $contactDetail['phoneNumber'] != ''){
						$speech = "Email address : {$contactDetail['mailAddress']} \n Telephone number : {$contactDetail['phoneNumber']} " ;
					}else if($contactDetail['mailAddress'] != '' && $contactDetail['phoneNumber'] == ''){
						$speech = "Email address : {$contactDetail['mailAddress']} \n Sorry ! No Telephone number was found" ;
					}else if($contactDetail['mailAddress'] == '' && $contactDetail['phoneNumber'] != ''){
						$speech = "Telephone number : {$contactDetail['phoneNumber']} \n Sorry ! No email address was found" ;
					}
				}else if($infoType == 'telephone number'){
					$speech = "Telephone number of $person is {$contactDetail['phoneNumber']}" ;
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
