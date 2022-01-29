<?php

  // grab the username & password
  $username = $_POST['username'];
  $password = $_POST['password'];


  // make sure they entered something into both blanks
  if ($username && $password) {
    // access the 'teacheraccounts.txt' text file
    $path = getcwd() . '/data';
    
    $data = file_get_contents($path.'/adminaccount.txt');
    
    $admins = explode("\n", $data);
    
    for($i = 0; $i <sizeof($admins); $i++){
    	
    $credentials = explode(" ", $admins[$i]);
    
    // check to make sure the username & password are correct
    if ($username == $credentials[0] && $password == $credentials[1]) {
      
      setcookie('loggedin', 'yes');
      header('Location: admincontrol.php');
      exit();
    }
    }
    
      // send them back to the form
      header('Location: adminlogin.php?error=incorrect');
      exit();
    
  }
  else {
    // send them back to the form
    header('Location: adminlogin.php?error=missinginfo');
    exit();
  }

 ?>