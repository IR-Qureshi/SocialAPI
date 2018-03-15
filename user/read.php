<?php
// // required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// 
// // include database and object files
// include('../config/database.php');
// include('../object/user.php');
// 
// // instantiate database and product object
// $database = new Database();
// $db = $database->getConnection();
// 
// // initialize object
// $user = new User($db);
// 
// // query products
// $stmt = $user->read();
// $num = $stmt->rowCount();
// 
// // check if more than 0 record found
// if($num>0){
// 
	// // products array
	// $products_arr=array();
	// $products_arr["user"]=array();
// 
	// // retrieve our table contents
	// // fetch() is faster than fetchAll()
	// // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
	// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// // extract row
		// // this will make $row['name'] to
		// // just $name only
		// extract($row);
// 
		// $product_item=array(
			// "u_id" => $u_id,
			// "u_long" => $u_long,
			// // "description" => html_entity_decode($description),
			// "u_lat" => $u_lat,
			// "yk_points" => $yk_points
		// );
// 
		// array_push($products_arr["user"], $product_item);
	// }
// 
	// echo json_encode($products_arr);
// }
// 
// else{
    // echo json_encode(
		// array("message" => "No users found.")
	// );
// }



// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'GET':
			// Insert Product
			get_products();
			break;
		
	}
function get_products()
	{
		global $connection;
		$query="SELECT * FROM user";
		
		$response=array();
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
?>