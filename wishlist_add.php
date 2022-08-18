<?php
  session_start();
  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $stu_id = $_SESSION['id'];
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

  $query1 = "select * from book where isbn = '$isbn'";
  $result1 = mysqli_query($con, $query1);
  $num = mysqli_num_rows($result1);
  printf($num);
  $query2 = "select * from wishlist_book where Student_ID = '$stu_id'";
  $result2 = mysqli_query($con, $query2);
  $wish_id = mysqli_num_rows($result2);
  if ($num == 0)
  {
    $query3 = "insert into wishlist_book values($wish_id, '$stu_id', '$title', '$isbn', 0, 0)";
    mysqli_query($con, $query3);
  } else
  {
    $query4 = "select * from copy where ISBN = '$isbn' and Availability = 1";
    $quantity = mysqli_num_rows(mysqli_query($con, $query4));
    $stock = 0;
    if ($quantity > 0)
    {
      $stock = 1;
    }
    $query3 = "insert into wishlist_book values($wish_id, '$stu_id', '$title', '$isbn', 1, $stock)";
    mysqli_query($con, $query3);
  }
 ?>
