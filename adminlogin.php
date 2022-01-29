
<!doctype html>
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
        <?php if($_COOKIE['loggedin']=="yes"){
            header('Location: admincontrol.php');
        }
        else{
        ?>
         <form method="post" action="control.php">
            Username:
            <input type="text" name="username"><br>
            Password:
            <input type="text" name="password">
            <input type="submit">
          </form>

          <?php 
           if($_GET['error']=='incorrect'){
            print "Your Password and Username does not match";
           }
           else if($_GET['error']=='missinginfo'){
            print "Please fill all the blanks";
        }
        }
           
         ?>

  </body>
     

</html>