<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$simpleGeoName = simplexml_load_file('countries.xml') or die("Error: Cannot create object");
$countries = array();


foreach($simpleGeoName->Children->SimpleGeoName as $cont){
   
   foreach($cont->Children->SimpleGeoName as $country){

	   	if($country->Name == "United States"){

	   		foreach ($country->Children->SimpleGeoName as $state) {
		   		$state = (string)$state->Name;
		    	array_push($countries, $state);
	   		}
	   	}
	   	else{
	    	$name = (string)$country->Name;
	    	array_push($countries, $name);
	   	}	
   }
}

echo json_encode($countries);

?>