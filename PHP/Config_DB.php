<?php

    if(! defined('DB_SERVER')) {
        define('DB_SERVER', 'localhost');
    }

    if(! defined('DB_USERNAME')) {
        define('DB_USERNAME', 'root');
    }

    if(! defined('DB_PASSWORD')) {
        define('DB_PASSWORD', '');
    }
    
    if(! defined('DB_DATABASE')) {
        define('DB_DATABASE', 'online_string_app');
    }

      

    // if(! defined('DB_SERVER')) {
    //     define('DB_SERVER', 'www.sookazan.ir');
    // }

    // if(! defined('DB_USERNAME')) {
    //     define('DB_USERNAME', 'sookazan_AkiB');
    // }

    // if(! defined('DB_PASSWORD')) {
    //     define('DB_PASSWORD', 'G%P44Q0HcL&1bx6$yB');
    // }
    
    // if(! defined('DB_DATABASE')) {
    //     define('DB_DATABASE', 'sookazan_online_string_app');
    // }

   


   

    if( ! defined('merchen')) {
        define('merchen' , '5c9268b6-f7dd-11e8-bf9e-005056a205be');
    }

    if( ! defined('url')) {        
        //define('url' , 'http://sookazan.ir/AddStringForOnlineThem/');
        define('url' , 'localhost//sookazan/');
    }

    if( ! defined('step')) {
        define('step' , '20');
    }

  
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




