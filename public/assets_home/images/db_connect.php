<?php
// Create connection
//global $conn;
try {
	
	$conn = new PDO("mysql:host=localhost;dbname=igslivec_tagncashus", 'tagncashus', '123456aa');

	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	date_default_timezone_set("Asia/Kolkata");

}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}


function showExecuteFailedError(){
	$returned_data['response_code'] = "-2";
	$returned_data['response_message'] = "Server error code -2(failed query)";
	echo json_encode($returned_data);
}

?>