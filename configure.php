<?php
     $host = 'localhost';
     $user = 'root';
     $pass = '';
     $db = 'county';
     
     $conn = new mysqli($host ,$user ,$pass ,$db);
     
     if($conn){
     echo "";
     }
     else{
       die(mysqli_error($conn));
     }
   
?>