<?php

  

  // security audit - make sure the user is logged in before making changes!
  if ($_COOKIE['loggedin'] == 'yes') {
    // if they are logged in make changes to the text files
    $filter = $_POST['chatroom'];
    
    $path = getcwd() . '/data';
    
  	if($filter == "room1"){
  	file_put_contents($path . '/room1.txt', "");
   
  	// tell the client that we are done
  	
  	}
  	
  	if($filter == "room2"){
  	file_put_contents($path . '/room2.txt', "");
   
  	// tell the client that we are done
  	
  	}
  	
  	if($filter == "room3"){
  	file_put_contents($path . '/room1.txt', "");
   
  	// tell the client that we are done
  	
  	}	  

   

    // send them back to the form
    header('Location: admincontrol.php?result=deletechat&nocache='.rand());
    exit();
  }
  else {
    // send them back to the admin page
    header('Location: admincontrol.php?error=notloggedin&nocache='.rand());
    exit();
  }





 ?>
