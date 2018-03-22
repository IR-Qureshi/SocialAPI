<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			insert_like();
			break;
		
	}

function insert_like(){
global $connection;
// $L_id = 0;
// $c_id = $_POST["c_id"];
$p_id = $_POST["p_id"];
$u_id = $_POST["u_id"];
// $like_status = $_POST["like_status"];


$query = "INSERT INTO likes
			 SET
		L_id= 0, p_id={$p_id}, u_id='{$u_id}', like_status= 1";
			
// $query1 = "SET @v1 := (SELECT u_id from post WHERE p_id = {$p_id})
$query1 = "UPDATE user
			SET yk_points= yk_points + 1 WHERE u_id= (SELECT u_id from post WHERE p_id = {$p_id})";
			

			
// $query1 = "UPDATE user
			// SET yk_points= yk_points + 2 WHERE u_id='{$u_id}'";
		
		if(mysqli_query($connection, $query)){
			$response=array(
				'status' => 1,
				'status_message' =>'Like Marked Successfully.'
				
			);
			echo $query;
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Like Mark Failed.'
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