<html>
<body>
  <link rel = "stylesheet" href = "../css/main.css">
  <h1 style = 'text-align: center; padding-top: 20%;'>Successful!</h1>
</body>
</html>
<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  } elseif ($_SESSION['user_type'] != "admin")
  {
    header("location: http://localhost/Library Management System/admin/signin&signup.php");
  }
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  $action = $_POST['submit'];
  if ($action == "add_book")
  {
    $isbn = $_POST["isbn"];
    $price = $_POST["price"];
    $publisher = $_POST["publisher"];
    $language = $_POST["language"];
    $title = $_POST["title"];
    $publish_date = $_POST["publish_date"];
    $genre = $_POST["genre"];
    $query = "insert into book values
  ('$isbn', $price, '$publisher', '$language', '$title', '$publish_date', '$genre')";
    mysqli_query($con, $query);

  } elseif ($action == "del_book")
  {
    $isbn = $_POST["isbn"];
    $query = "delete from book where ISBN = $isbn";
    mysqli_query($con, $query);

  } elseif ($action = "alt_book_price")
  {
    $isbn = $_POST["isbn"];
    $new_price = $_POST["new_price"];

    $query = "update book set Price = $new_price where ISBN = $isbn";
    mysqli_query($con, $query);
  }


?>
