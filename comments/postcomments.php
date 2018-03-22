<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			insert_comment();
			break;
		
	}

function insert_comment(){
global $connection;
$p_id = $_POST["p_id"];
$comments = $_POST["comments"];

$query = "INSERT INTO comments
			 SET
			c_id=0, p_id='{$p_id}', comments='{$comments}'";
			
$query1 = "UPDATE user
			SET yk_points= yk_points + 2 WHERE u_id= (SELECT u_id from post WHERE p_id = {$p_id})";
			
		
		if(mysqli_query($connection, $query)){
			$response=array(
				'status' => 1,
				'status_message' =>'New Comment Added Successfully.'
				
			);
			echo $query;
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Comment Addition Failed.'
			);
			echo $query;
		}
		if(mysqli_query($connection, $query1)){
			$response=array(
				'status' => 1,
				'status_message' =>'points added Successfully.'
				
			);
			echo $query;
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'points adding Failed.'
			);
			echo $query;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	
}
		 
?>