<?php

  // grab data from the client
  $message = $_POST['message'];
  $nickname = $_POST['nickname'];
  $filter = $_POST['filter'];

  // store this data into a text file
  $path = getcwd() . '/data';
  $bannedwords = file_get_contents($path.'/bannedwords.txt');
  $message = preg_replace("/[^ A-Za-z0-9'!@#$%^&*()\"?.,]/","", $message);
  $wordslists = explode(" ", $bannedwords);
  $ifban = false;
  
    
    for($i = 0; $i <sizeof($wordslists); $i++){
      
     $pos = strpos($message, $wordslists[$i]);
     
        if($pos !== false){
         $ifban = true;
        }
    
    }
    
  if($ifban == true){
   echo "banned";
   exit();
  }
  else if($message && $nickname){
  	if($filter == "room1"){
  	file_put_contents($path . '/room1.txt', "$nickname : $message\n", FILE_APPEND);
   
  	// tell the client that we are done
  	
  	}
  	
  	if($filter == "room2"){
  	file_put_contents($path . '/room2.txt', "$nickname : $message\n", FILE_APPEND);
   
  	// tell the client that we are done
  	
  	}
  	
  	if($filter == "room3"){
  	file_put_contents($path . '/room1.txt', "$nickname : $message\n", FILE_APPEND);
   
  	// tell the client that we are done
  	
  	}
  	echo "ok";
  	exit();
  }
  else{
  	echo "bad";
  	exit();
  }
  
 ?>


