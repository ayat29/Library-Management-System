<html style = "margin: 0px; padding: 0px;">
<body style = "margin: 0px; padding: 0px;">
<?php
  session_start();
  $id = $_SESSION['id'];
  echo "<h1>Your wishlist</h1>";
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $query = "select * from wishlist_book where Student_ID = '$id'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach ($rows as $row)
  {
    $title = $row['Title'];
    $isbn = $row['ISBN'];
    $availability = $row['Availability'];
    $in_stock = $row['In_stock'];
    echo "<h2>$title</h2>";
    echo "<h2>$isbn</h2>";
    echo "<h2>$availability</h2>";
    echo "<h2>$in_stock</h2>";
    echo "<br>";
  }
?>
</body>
</html>
