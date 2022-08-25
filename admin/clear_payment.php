<?php
  session_start();
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $isbn = $_POST["isbn"];
  $stu_id = $_POST["stu_id"];
  $cpid = $_POST["cpid"];

  $query1 = "update borrows set Payment_status = 1 where ISBN = '$isbn' and Copy_ID = '$cpid' and Student_ID = '$stu_id'";
  $result1 = mysqli_query($con, $query1);

?>
