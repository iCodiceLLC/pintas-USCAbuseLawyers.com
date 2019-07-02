<?php 
	session_start();
	$dataFile = "./db/data.json";
	$dataArray = array();

	
	date_default_timezone_set('America/Chicago');
	$date = date('Y/m/d');
	$time = date("h:i:sa");
	$ip = $_SERVER['REMOTE_ADDR'];
	if(isset($_GET['utm_source'])) {
		$_SESSION['utmSource'] = $_GET['utm_source'];
	} else {
		$_SESSION['utmSource'] = null;
	}
	if(isset($_GET['utm_medium'])) {
		$_SESSION['utmMedium'] = $_GET['utm_medium'];
	} else {
		$_SESSION['utmMedium'] = null;
	}
	if(isset($_GET['utm_campaign'])) {
		$_SESSION['utmCampaign'] = $_GET['utm_campaign'];
	} else {
		$_SESSION['utmCampaign'] = null;
	}
	if(isset($_GET['utm_term'])) {
		$_SESSION['utmTerm'] = $_GET['utm_term'];
	} else {
		$_SESSION['utmTerm'] = null;
	}
	if(isset($_GET['utm_content'])) {
		$_SESSION['utmContent'] = $_GET['utm_content'];
	} else {
		$_SESSION['utmContent'] = null;
	}

	try {
		// get data
		$data = [
			'date' => $date,
			'time' => $time,
			'ip' => $ip,
			'utmSource' => $_SESSION['utmSource'],
			'utmMedium' => $_SESSION['utmMedium'],
			'utmCampaign' => $_SESSION['utmCampaign'],
			'utmTerm' => $_SESSION['utmTerm'],
			'utmContent' => $_SESSION['utmContent']
		]; 

		// Current file contents
		$jsonData = file_get_contents($dataFile);
		if($jsonData != null) {
			$dataArray = json_decode($jsonData, true);
			
		}
		array_push($dataArray, $data);
		// Convert updated array to json
		$jsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
		file_put_contents($dataFile, $jsonData);
	} catch(Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>