<!doctype html>
<html lang="en-us">
  <head>
    <title>JavaScript Language Usage</title>
    <meta charset="utf-8">
    <style>
    textarea {
  		display: block;
 	    width: 40%;
  		height: 150px;
  		margin: auto;
	}
	 body{background-color: coral;
         font-size: 120%;
         text-align:center;
      }
  </style>
  </head>

  <body>
       
        <?php
           
            // check the cookie - are they logged in?
            if ($_COOKIE['loggedin'] == 'yes') {

              print "<h2>Welcome to Admin Control Website!! </h2>";
              print "<p><a href=\"logout.php\">Logout</a></p>";
              print "<p><a href=\"history.php\">See User using Report</a></p>";
              print "<p><a href=\"index.html\">go back to chat room</a></p>";
             
              if($_GET['confirmation']=='savedtext'){
              	print"<h2>An change to the banned words list has been done!</h2>";
              }
              // give the admin user a form to fill out to change any of the text files
              $path = getcwd() . '/data';
  			  $bannedwords = file_get_contents($path.'/bannedwords.txt');
             

              ?>

              <form method="post" action="savebanned.php">
                Bannedwords Text:
                <textarea name="bannedwords"><?php print $bannedwords; ?></textarea>
                <input type="submit">
              </form>
              
              
             <form method="post" action="deletechat.php">
   					 Choose the chat room you want to delete its contents!!!
    		 <select id="filter" name ="chatroom">
       		 <option value="room1">room 1</option>
        	 <option value="room2">room 2</option>
        	 <option value="room3">room 3</option>
      		 </select>
   			 <input type="submit">
             </form>

              <?php
              
             if($_GET['result']=='deletechat'){
                	print"<h2>The contents in Your choosen chat room has been deleted</h2>";
             }

            } 
            else{
             header('Location: index.html');
             exit();
            }
            
            
            ?>

  </body>
     

</html>