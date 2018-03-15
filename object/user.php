<?php
class User{

	// database connection and table name
	private $conn;
	private $table_name = "user";

	// object properties
	public $u_id;
	public $u_long;
	public $u_lat;
	public $yk_points;

	// constructor with $db as database connection
	public function __construct($db){
		$this->conn = $db;
	}
	
	
// read products
function read(){

	// select all query
	$query = "SELECT * from user";

	// prepare query statement
	$stmt = $this->conn->prepare($query);

	// execute query
	$stmt->execute();

	return $stmt;
	}

// create product
function create(){

// // $uid = $_POST['u_id'];
// // $u_long = $_POST['u_long']; 
// // $u_lat = $_POST['u_lat'];
// // $yk_points =  $_POST['yk_points'];
// 
// // query to insert record
	// $query = "INSERT INTO user
			// SET
				// u_id=:u_id, u_long=:u_long, u_lat=:u_lat, yk_points=:yk_points";
// 
// // $query = "INSERT INTO user
			 // // SET
				 // // u_id=:'{$u_id}', u_long=:'{$u_long}', u_lat=:'{$u_lat}', yk_points=:{$yk_points}";
// // 				
// echo "query:".$query;
// 
	// // prepare query
	// $stmt = $this->conn->prepare($query);
// 	
// 
	// // sanitize
	// $this->u_id=htmlspecialchars(strip_tags($this->u_id));
	// $this->u_long=htmlspecialchars(strip_tags($this->u_long));
	// $this->u_lat=htmlspecialchars(strip_tags($this->u_lat));
	// $this->yk_points=htmlspecialchars(strip_tags($this->yk_points));
// 	
// 	
// 
	// // bind values
	// $stmt->bindParam(":u_id", $this->u_id);
	// $stmt->bindParam(":u_long", $this->u_long);
	// $stmt->bindParam(":u_lat", $this->u_lat);
	// $stmt->bindParam(":yk_points", $this->yk_points);
// 
	// // execute query
	// if($stmt->execute()){
		// return true;
	// }
// 
	// return false;
	$uid = $_POST['u_id'];
$u_long = $_POST['u_long']; 
$u_lat = $_POST['u_lat'];
$yk_points =  $_POST['yk_points'];


$query = "INSERT INTO user
			 SET
				 u_id=:'{$u_id}', u_long=:'{$u_long}', u_lat=:'{$u_lat}', yk_points=:{$yk_points}";
		
		if(mysqli_query($db, $query)){
			$response=array(
				'status' => 1,
				'status_message' =>'Product Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Product Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	
}

}


?>