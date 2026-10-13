<?php

   $db_name = 'localhost';
   $db_user_name = 'root';
   $db_user_pass = '';
   $dbname='home_db';

   $conn1 = mysqli_connect($db_name, $db_user_name, $db_user_pass,$dbname);
   if($conn1){
    //echo "connect";
   }else{
    echo "not connect";
   }
   ?>