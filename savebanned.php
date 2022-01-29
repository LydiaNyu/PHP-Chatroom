<?php

  

  // security audit - make sure the user is logged in before making changes!
  if ($_COOKIE['loggedin'] == 'yes') {
    // if they are logged in make changes to the text files
    $bannedwords = $_POST['bannedwords'];
    $path = getcwd() . '/data';
  			 

    // put this into the text file
    file_put_contents($path.'/bannedwords.txt', $bannedwords);
    

    // send them back to the form
    header('Location: admincontrol.php?confirmation=savedtext&nocache='.rand());
    exit();
  }
  else {
    // send them back to the admin page
    header('Location: admincontrol.php?error=notloggedin&nocache='.rand());
    exit();
  }





 ?>
