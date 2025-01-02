<?php
	//include('ConfigFirstToAllPage.php');
	require_once('Config_DB.php');
	$resultTypeJson =  true ;	

	//___________ get body
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		// Get data
		$data = json_decode(file_get_contents('php://input'), true);
		$Auth = true;
	
		// check data that get by body parameter
		if (isset($data['mobile']) ) {
			$mobile = $data['mobile'];
			//other action			
		}
		if (isset($data['email']) ) {
			$email = $data['email'];
			//other action
		}

		if($Auth ==true) {

        //___________ stringList
			$sql = "SELECT * FROM string_for_online_them ORDER BY id";
			$query = mysqli_query( $dbLink , $sql ) or die(mysqli_error($dbLink->error));
			
			$stringArray = array();
			$a=mysqli_num_rows($query);
			if($a > 0){
				for($i= 0 ;$i < $a ; $i++){
					$row=mysqli_fetch_array($query);

					$str = array();
					$str["id"] = $row["id"];
					$str["name"] = $row["name"];
					$str["value"] =$row["value"];
					
					array_push($stringArray , $str);
				}
			}
		//___________ stringList
		//___________ widgetList
			$sql = "SELECT * FROM widget_for_online_them ORDER BY id";
			$query = mysqli_query( $dbLink , $sql ) or die(mysqli_error($dbLink->error));
			
			$widgetArray = array();
			$a=mysqli_num_rows($query);
			if($a > 0){
				for($i= 0 ;$i < $a ; $i++){
					$row=mysqli_fetch_array($query);

					$str = array();
					$str["id"] = $row["id"];
					$str["nameWidget"] = $row["nameWidget"];
					$str["valueWidget"] = $row["valueWidget"];
					$str["typwWidget"] = $row["typeWidget"];

					if(isset($str["valueWidget"]) && strcasecmp($str["valueWidget"] ,"") != 0){
						$sql_string = "SELECT `value` FROM string_for_online_them WHERE id ='".$str["valueWidget"]."'";
						$query_string = mysqli_query($dbLink , $sql_string ) or die(mysqli_error());
						$row_str=mysqli_fetch_array($query_string);
						$str ["valueWidget"] = $row_str["value"];
					} 
					
					array_push($widgetArray , $str);
				}
			}
			//___________ stringList

		} 
		else {
			//send error
		}
	} else {
		//send error
	}



	$resultJson = Array();

	 
	if($resultTypeJson == true && isset($widgetArray) && isset($stringArray)){
        $resultJson['strings'] = $stringArray ; 
		$resultJson['widget'] = $widgetArray ; 
		$resultJson['result'] = $resultTypeJson ; 	
	
		header('content-type: application/json; charset=utf-8');
		echo json_encode($resultJson);
		
		
		mysqli_close($dbLink);
	 }
	 else {
		 echo 'bad request';
	 }

	
	
	
	

	
	
	

?>