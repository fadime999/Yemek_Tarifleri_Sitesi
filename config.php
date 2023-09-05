<?php
   $host="localhost";
   $username="root";
   $password="";
   $database="yemek_tarifleri_db";

    //Mysqli
    //PDO

    $connection=mysqli_connect($host,$username,$password,$database);

    if(mysqli_connect_errno() > 0){
         die("error: ".mysqli_connect_error());
    }
?>