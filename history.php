<html lang="en-us">
  <head>
    <title>JavaScript Language Usage</title>
    <meta charset="utf-8">
    <style>
   
	 body{background-color: coral;
         font-size: 120%;
         text-align:center;
      }
  </style>
  </head>

  <body>
<?php

  

  // security audit - make sure the user is logged in before making changes!
  if ($_COOKIE['loggedin'] == 'yes') {
    print "<h2>Let's See User Login History </h2>";
    print "<p><a href=\"logout.php\">Logout</a></p>";
    print "<p><a href=\"admincontrol.php\">Go Back to Admin Control Page</a></p>";
    print "<p><a href=\"index.html\">Go Back to Chat room</a></p>";
    $path = getcwd() . '/data';
    // put this into the text file
    $contents = file_get_contents($path.'/userhistory.txt');
    
    $eachHistory = explode("\n", $contents);
    
    print"<table>";
    print"<tr><td>login time</td><td>username</td><td>userip</td></tr>";
    for($i = 0; $i <sizeof($eachHistory); $i++){
    	
    $credentials = explode(" ", $eachHistory[$i]);
    $time = date('Y-m-d H:i:s', $credentials[0]);
    print"<tr><td>".$time."</td><td>".$credentials[1]."</td><td>".$credentials[2]."</td></tr>";
    
    }
    print"</table>";
    

   
    
  }
  else {
    // send them back to the admin page
    header('Location: index.html&nocache='.rand());
    exit();
  }

 ?>
 
  </body>
     

</html>