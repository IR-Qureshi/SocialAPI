<?php
// required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// 
// // include database and object files
// include('../config/database.php');
// include('../object/user.php');
// 
// $database = new Database();
// $db = $database->getConnection();

// $user = new User($db);
// 
// // get posted data
// $data = json_decode(file_get_contents("php://input"));
// 
// //set product property values
// $user->u_id = $data->u_id;
// $user->u_long = $data->u_long;
// $user->u_lat = $data->u_lat;
// $user->u_yakarma = $data->u_yakarma;
// 
// // $user->u_id = json_decode($_POST['u_id']);
// // $user->u_long = json_decode($_POST['u_long']);
// // $user->u_lat = json_decode($_POST['u_lat']);
// // $user->u_yakarma = json_decode($_POST['u_yakarma']);
// 
// 
// // create the product
// if($user->create()){
	// echo '{';
		// echo '"message": "User was created."';
	// echo '}';
// }
// 
// // if unable to create the product, tell the user
// else{
	// echo '{';
		// echo '"message": "Unable to create user."';
	// echo '}';
// }





// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			insert_product();
			break;
		
	}

function insert_product(){
global $connection;
$u_id = $_POST["u_id"];
$u_long = $_POST["u_long"]; 
$u_lat = $_POST["u_lat"];
$yk_points =  $_POST["yk_points"];


$query = "INSERT INTO user
			 SET
				 u_id='{$u_id}', u_long='{$u_long}', u_lat='{$u_lat}', yk_points={$yk_points}
				 ON DUPLICATE KEY UPDATE
u_long = '{$u_long}',
u_lat = '{$u_lat}'";
		
		if(mysqli_query($connection, $query)){
			$response=array(
				'status' => 1,
				'status_message' =>'User Added Successfully.'
				
			);
			echo $query;
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'User Addition Failed.'
			);
			echo $query;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	
}

	
				 
?>