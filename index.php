<?php 
echo 'hello'; die;
$method=$_SERVER['REQUEST_METHOD'];
if($method == "POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);	
	
    $text = $json->result->parameters->text;
	
	switch($text){
	 case 'hi':
	  $speech = "Hi, Nice to meet you";
	  break;
	 case 'bye':
	  $speech = "Bye, Good night";
	  break;
	 case 'anything':
	  $speech = "Yes, You can type anything here. ";
	  break;
	 default:
       $speech = "Sorry, I didnt get that. Please ask me something else"	 
	    break;
	}
	
	$response= new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source ="webhook";
	echo json_encode($response);
	
  
}
 else{
 echo "Method is not allowed"
}
?>