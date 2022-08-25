<?php
   session_start();
   $user = "root";
   $pass = "";
   $db = "library";
   $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

   if(!isset($_SESSION['id']))
   {
     $_SESSION["msg"] = "Please login or register to continue";
     header("location: http://localhost/test/signin&signup.php");
   }

   $id = $_SESSION['id'];
   $query = "delete from student where ID = '$id'";
   mysqli_query($con, $query);
   session_destroy();
   if (mysqli_affected_rows($con) == 0)
   {
     echo 'There was a problem with your query';
   } else
   {
     echo 'Operation successful';
   }
 ?>
