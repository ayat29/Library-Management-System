<html style = "margin: 0px; padding: 0px;">
<body style = "margin: 0px; padding: 0px;">
<?php
  session_start();
  $id = $_SESSION['id'];
  echo "<h1>Your past orders</h1>";
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $query = "select * from past_order where Student_ID = '$id'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach ($rows as $row)
  {
    $title = $row['Title'];
    $isbn = $row['ISBN'];
    $price = $row['Price'];
    $late_fee = $row['Late_fee_paid'];
    $bor_date = $row['Date_borrowed'];
    $ret_date = $row['Date_returned'];

    echo "<h2>$title</h2>";
    echo "<h2>$isbn</h2>";
    echo "<h2>$price</h2>";
    echo "<h2>$late_fee</h2>";
    echo "<h2>$bor_date</h2>";
    echo "<h2>$ret_date</h2>";
    echo "<br>";
  }
?>
</body>
</html>
