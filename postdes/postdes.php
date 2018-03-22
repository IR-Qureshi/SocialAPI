<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			get_posts();
			break;
		
	}
	function get_posts(){
		global $connection;
		
		// $query="SELECT * FROM post";
		$id = $_POST['p_id'];
		$query = "SELECT * FROM post WHERE p_id = {$id} ";
		$query1 = "SELECT * FROM comments WHERE p_id = {$id} ";
		
		$response=array();
		$result=mysqli_query($connection, $query);
		
		while($row=mysqli_fetch_array($result)){
			
		$response[]=$row;
		
	}
		$response1=array();
		$result1=mysqli_query($connection, $query1);
		
		while($row1=mysqli_fetch_array($result1)){
			
		$response1[]=$row1;
		
	}
		
		header('Content-Type: application/json');
		$response=array(
				'post' => $response,
				'comments' => $response1,
				'status_message' =>'Successfull.'
				
			);
		echo json_encode($response);
		// echo json_encode($time);
	}
	
?>