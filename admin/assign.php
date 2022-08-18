<?php
  session_start();
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $isbn = $_POST["isbn"];
  $stu_id = $_POST["id"];
  $title = $_POST["title"];

  $query = "select * from copy where ISBN = '$isbn' and Availability = 1";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $num = mysqli_num_rows($result);

  if ($num == 0)
  {
    echo "Book not available";
  } else
  {
    $copy_id = $rows['0']['Copy_ID'];
    $query2 = "insert into borrows values('$isbn', $copy_id, $stu_id, 0, CURRENT_DATE())";
    mysqli_query($con, $query2);
    $query3 = "update copy set Availability = 0 where ISBN = '$isbn' and Copy_ID = $copy_id";
    mysqli_query($con, $query3);
  }
?>
