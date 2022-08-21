<?php
  session_start();
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
    if (mysqli_affected_rows($con) == 0)
    {
      echo 'There was a problem with your query';
    } else
    {
      echo 'Operation successful';
    }
  } elseif ($action == "del_book")
  {
    $isbn = $_POST["isbn"];
    $query = "delete from book where ISBN = $isbn";
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 0)
    {
      echo 'There was a problem with your query';
    } else
    {
      echo 'Operation successful';
    }
  } elseif ($action = "alt_book_price")
  {
    $isbn = $_POST["isbn"];
    $new_price = $_POST["new_price"];

    $query = "update book set Price = $new_price where ISBN = $isbn";
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 0)
    {
      echo 'There was a problem with your query';
    } else
    {
      echo 'Operation successful';
    }
  }

?>
