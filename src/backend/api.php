<?php

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");

	$server= "localhost";
	$user= "root";
	$password= "";
	$dbname = "curriculum";
	$port= "3308";

	$conn = new mysqli($server,$user,$password,$dbname,$port);

	if($conn->connect_error){
		die("Connection Failed!, " .$conn->connect_error);
	}

	$result = array('error'=>false);
	$action = '';
	$applicant_name = '';
	$applicant_job_title = '';
	

	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}



	// // FETCHING DATA FROM THE DB
	// if($action == "read"){
	// 	$sql = $conn->query("SELECT * FROM applicant_cv ");
	// 	$cv = $sql->fetch_assoc();
	// 	$id = $cv['id'] ;

	// 	$sqll = $conn->query("SELECT * FROM contact WHERE applicant_id='".$id."'");
	// 	$contact =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		array_push($contact, $row);
	// 	}

	// 	$sqll = $conn->query("SELECT * FROM education WHERE applicant_id='".$id."'");
	// 	$education =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		array_push($education, $row);
	// 	}

	// 	$sqll = $conn->query("SELECT * FROM experience WHERE applicant_id='".$id."'");
	// 	$experience =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		$idd = $row['id'];
	// 		$sqlll = $conn->query("SELECT * FROM detailed_experience WHERE experience_id='".$idd."'");
	// 		$details_experience =array();
	// 		while ($roww = $sqlll->fetch_assoc()) {
	// 			array_push($details_experience, $roww);

	// 		}
	// 		$row['details'] = $details_experience;
	// 		array_push($experience, $row);
			
	// 	}

	// 	$sqll = $conn->query("SELECT * FROM languages WHERE applicant_id='".$id."'");
	// 	$language =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		array_push($language, $row);
	// 	}

	// 	$sqll = $conn->query("SELECT * FROM personality WHERE applicant_id='".$id."'");
	// 	$personality =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		array_push($personality, $row);
	// 	}

	// 	$sqll = $conn->query("SELECT * FROM skills WHERE applicant_id='".$id."'");
	// 	$skills =array();
	// 	while ($row = $sqll->fetch_assoc()) {
	// 		array_push($skills, $row);
	// 	}

	// 	$result['applicant_name'] = $applicant_name;
	// 	$result['contacts'] = $contact;
	// 	$result['educations'] = $education;
	// 	$result['experiences'] = $experience;
	// 	$result['languages'] = $language;
	// 	$result['personalities'] = $personality;
	// 	$result['skills'] = $skills;

	// }


	// FETCHING DATA FROM THE DB
	if($action == "read"){
		$sql = $conn->query("SELECT * FROM applicant_cv ");
		$application =array();
		while ($row = $sql->fetch_assoc()) {
			array_push($application, $row);
		}
		$result['applicant_cv'] = $application;
	}



	// ADDING DATA TO THE DB
	if($action == "create"){
		$applicant_name = $_POST['applicant_name'];
		$applicant_job_title = $_POST['applicant_job_title'];

		
		$sql = $conn->query("INSERT INTO applicant_cv (applicant_name,applicant_job_title) 
		VALUES('$applicant_name','$applicant_job_title')");

		if($sql){
			$result['message'] = "CV was added successfully!";
		}
		else{
			$result['error'] = true;
			$result['message'] = "Cannot add CV! Maybe it's already exist";
		}
	}



	// UPDATING DATA
	if($action == "update"){

		$sql = $conn->query("UPDATE  SET ");

		if($sql){
			$result['message'] = "CV was updated successfully!";
		}
		else{
			$result['error'] = true;
			$result['message'] = "Cannot update the Cv !";
		}
	}



	// DELETING DATA
	if($action == "delete"){
		$id = $_POST['id'];

		$sql = $conn->query("DELETE FROM cvs WHERE id='$id'");

		if($sql){
			$result['message'] = "CV was deleted successfully!";
		}
		else{
			$result['error'] = true;
			$result['message'] = "Cannot delete this CV!";
		}
	}


	echo json_encode($result);
	$conn->close();
?>