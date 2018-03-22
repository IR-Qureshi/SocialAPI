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
		$count = $_POST['count'];
		$query = "SELECT * FROM post ORDER BY p_id DESC LIMIT ".($count);
		
		
		$response=array();
		$result=mysqli_query($connection, $query);
		
		$time = '';
		while($row=mysqli_fetch_array($result)){
			
		$response[]=$row;
		
		//post calculation time
		
			// echo "$posttime <br>";
		date_default_timezone_set("Asia/Karachi");
		$now = new DateTime();
		// $start_date = new DateTime($posttime['created']);
		// $start_date1 = $posttime['created'];
		$start_date = new DateTime($row['created']);
		
		$since_start = $start_date->diff($now);
		
		$calculatedtime[0]  = $since_start->y.' years ago';
		$calculatedtime[1]  = $since_start->m.' months ago';
		$calculatedtime[2]  = $since_start->d.' days ago';
		$calculatedtime[3]  = $since_start->h.' hours ago';
		$calculatedtime[4]  = $since_start->i.' minutes ago';
		$calculatedtime[5]  = $since_start->s.' seconds ago';
		
		$timerange[0] = $since_start->y;
		$timerange[1] = $since_start->m;
		$timerange[2] = $since_start->d;
		$timerange[3] = $since_start->h;
		$timerange[4] = $since_start->i;
		$timerange[5] = $since_start->s;
		
		
		if($timerange[2] > 0){
			$time = $calculatedtime[2];
			
		}
		if($timerange[3] > 0 && $timerange[2] == 0){
			$time = $calculatedtime[3];

			
		}
		if($timerange[4] > 0 && $timerange[3] == 0){
			$time = $calculatedtime[4];
		
		}
		if($timerange[5] > 0 && $timerange[4] == 0){
			$time = $calculatedtime[5];
		
		}
		if($timerange[5] > 0 && $timerange[5] <= 15){
			$time = 'just now';
		
		}
		
	}
		
		header('Content-Type: application/json');
		$response=array(
				'status' => $response,
				'time' => $time,
				'status_message' =>'Successfull.'
				
			);
		echo json_encode($response);
		// echo json_encode($time);
	}
?>