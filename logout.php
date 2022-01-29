<?php

  // destory the cookies
  setcookie('loggedin', "", time()-3600);
  

  // send back to the admin form
  header('Location: index.html?nocache='.rand());
  exit();

 ?>