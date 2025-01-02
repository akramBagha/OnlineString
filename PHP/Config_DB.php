<?php

    
   




$dbLink = mysqli_connect(DB_SERVER, DB_USERNAME , DB_PASSWORD , DB_DATABASE);
 
if (mysqli_connect_error()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}


   



   //  
   

   if (!$dbLink) {
	        die('Could not connect to db: ' );
	    }
	
    mysqli_set_charset($dbLink , 'utf8');
	date_default_timezone_set('Asia/Tehran');
	$date = date('Y-m-d', time());
	$time = date('h:i', time());
		
?>




