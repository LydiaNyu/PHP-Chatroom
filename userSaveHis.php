<?php
           $userip = $_POST['ip'];
           $username = $_POST['username'];
           $time = time();
           $record =$time." " . $username . " " . $userip ."\n";
           $path = getcwd().'/data';
           file_put_contents($path.'/userhistory.txt', $record, FILE_APPEND);
           print $record;
           print $ip;
           //exit();
           
           
           
           
?>