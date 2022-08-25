
<html>
<body>
<head>
  <link rel = "stylesheet" href = "../css/main.css">
</head>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    $_SESSION["msg"] = "Please login or register to continue";
    header("location: http://localhost/test/admin/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "admin")
  {
    $_SESSION["msg"] = "You are not authorized to enter";
    header("location: http://localhost/test/admin/signin&signup.php");
  }

  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  // $isbn = $_POST["isbn"];
  // $stu_id = $_POST["id"];

  $query = "select * from wishlist_book order by Date";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $num = mysqli_num_rows($result);

  echo "<table>
  <tr id = 'table_head'>
    <td>Student ID</td>
    <td>ISBN</td>
    <td>Availability</td>
    <td>In_stock</td>
  </tr>";
  foreach ($rows as $row)
  {
    $id = $row['Student_ID'];
    $isbn = $row['ISBN'];
    $availability = $row['Availability'];
    $in_stock = $row['In_stock'];
    $wishlist_id = $row['Wishlist_ID'];
    echo "<tr id = 'table_data'>";
    echo "<td>$id</td>";
    echo "<td>$isbn</td>";
    echo "<td>$availability</td>";
    echo "<td>$in_stock</td>";
    echo "<td><form action = 'assign.php' method = 'post' target = '_blank'><input type='hidden' name='id' value=$id>
          <input type='hidden' name='isbn' value=$isbn> <input type='hidden' name='wishlist_id' value=$wishlist_id> <button type = 'submit' class='button'>Assign Book</button></form></td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
?>
</body>
</html>
