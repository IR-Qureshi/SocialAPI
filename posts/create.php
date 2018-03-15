<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			insert_post();
			break;
		
	}

function insert_post(){
global $connection;
$p_id = $_POST["p_id"];
$u_id = $_POST["u_id"];
$p_text = $_POST["p_text"];
$p_area = $_POST["p_area"];
$p_long = $_POST["p_long"]; 
$p_lat = $_POST["p_lat"];


$query = "INSERT INTO post
			 SET
				 p_id={$p_id}, u_id='{$u_id}', p_text='{$p_text}', p_area='{$p_area}', p_long='{$p_long}', p_lat='{$p_lat}'";
		
		if(mysqli_query($connection, $query)){
			$response=array(
				'status' => 1,
				'status_message' =>'Post Added Successfully.'
				
			);
			echo $query;
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Post Addition Failed.'
			);
			echo $query;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	
}

	
				 
?>