<html>
<body>
<head>
  <link rel = "stylesheet" href = "css/main.css">
</head>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "user")
  {

    header("location: http://localhost/Library Management System/signin&signup.php");
  }
  $id = $_SESSION['id'];
  echo "<h1>Your wishlist</h1>";
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $query = "select * from wishlist_book where Student_ID = '$id'";
  $result = mysqli_query($con, $query);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo "<table>
  <tr id = 'table_head'>
    <td>Title</td>
    <td>ISBN</td>
    <td>Availability</td>
    <td>In_stock</td>
  </tr>";
  foreach ($rows as $row)
  {
    $title = $row['Title'];
    $isbn = $row['ISBN'];
    $availability = $row['Availability'];
    $in_stock = $row['In_stock'];
    echo "<tr id = 'table_data'>";
    echo "<td>$title</td>";
    echo "<td>$isbn</td>";
    echo "<td>$availability</td>";
    echo "<td>$in_stock</td>";
    echo "</tr>";
    echo "<br>";
  }
  echo "</table>";
?>
</body>
</html>
