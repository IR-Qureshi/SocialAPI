<?php
// Connect to database
	$connection=mysqli_connect('localhost','root','','rant');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		
		case 'POST':
			// Insert Product
			get_time();
			break;
		
	}
function get_time()
	{
		global $connection;
		
		$query = "SELECT * FROM post";
			
		$response=array();
		$result=mysqli_query($connection, $query);
		
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		
		foreach($response as $posttime){
			// echo "$posttime <br>";
		date_default_timezone_set("Asia/Karachi");
		$now = new DateTime();
		// $start_date = new DateTime($posttime['created']);
		$start_date1 = $posttime['created'];
		$start_date = new DateTime($posttime['created']);
		
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
		
		}
		
	
				
		header('Content-Type: application/json');
		if($timerange[2] > 0){
			// echo json_encode($calculatedtime[2]);
			$time = $calculatedtime[2];
			echo json_encode($time);
			$query1 = "UPDATE post SET time_cal = '{$time}' WHERE created = '{$start_date1}'";
		mysqli_query($connection, $query1);
		echo $query1;
		}
		if($timerange[3] > 0 && $timerange[2] == 0){
			//echo json_encode($calculatedtime[3]);
			$time = $calculatedtime[3];
			echo json_encode($time);
			$query1 = "UPDATE post SET time_cal = '{$time}' WHERE created = '{$start_date1}'";
		mysqli_query($connection, $query1);
		echo $query1;
		}
		if($timerange[4] > 0 && $timerange[3] == 0){
			//echo json_encode($calculatedtime[4]);
			$time = $calculatedtime[4];
			echo json_encode($time);
			$query1 = "UPDATE post SET time_cal = '{$time}' WHERE created = '{$start_date1}'";
		mysqli_query($connection, $query1);
		echo $query1;
		}
		if($timerange[5] > 0 && $timerange[4] == 0){
			//echo json_encode($calculatedtime[5]);
			$time = $calculatedtime[5];
			echo json_encode($time);
			$query1 = "UPDATE post SET time_cal = '{$time}' WHERE created = '{$start_date1}'";
		mysqli_query($connection, $query1);
		echo $query1;
		}
		if($timerange[5] > 0 && $timerange[5] <= 15){
			//echo json_encode('just now');
			$time = 'just now';
			echo json_encode($time);
			$query1 = "UPDATE post SET time_cal = '{$time}' WHERE created = '{$start_date1}'";
		mysqli_query($connection, $query1);
		echo $query1;
		}
		
		


		
		// if($timerange[4] > 0 && $timerange[3]){
			// echo json_encode($calculatedtime[4]);
		// }
		// if($timerange[5] > 0 && $timerange[4]){
			// echo json_encode($calculatedtime[5]);
		// }
		
		// if($timerange[5] <= 15){
		// echo json_encode('just now');
		// }
		// if($timerange[5] > 15 && $timerange[5] <=60){
		// echo json_encode($calculatedtime[5]);
		// }
		// if($timerange[5] > 59){
		// echo json_encode($calculatedtime[4]);
		// }
		// if($timerange[4] >= 59){
		// echo json_encode($calculatedtime[3]);
		// }
		// if($timerange[3] >= 24 && $timerange[2] <7){
		// echo json_encode($calculatedtime[2]);
		// }
		// if($timerange[2] >= 7 && $timerange[2] < 15){
		// echo json_encode('1 week ago');
		// }
		// if($timerange[2] >= 15 && $timerange[2] < 22){
		// echo json_encode('2 weeks ago');
		// }
		// if($timerange[2] >= 22 && $timerange[2] < 30){
		// echo json_encode('3 weeks ago');
		// }
		// if($timerange[2] >=  30){
		// echo json_encode($calculatedtime[1]);
		// }
		// $check=array(
				// 'status' => 0,
				// 'status_message' =>'Points Addition Failed.',
				// 'startd ate' => $start_date,
				// 'r' =>$calculatedtime
			// );
// 		
		// echo json_encode($check);
	}



?>