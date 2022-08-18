<?php
  session_start();
  $user = "root";
  $pass = "";
  $db = "library";
  $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
  // $genre = $_POST["genre"];
  // $name = $_POST["name"];
  // $author = $_POST["author"];
  // $language = $_POST["language"];
  $categories = ["Genre", "Title", "author_name", "Language"];
  if (!isset($_POST["genre"]))
  {
    $_POST["genre"] = NULL;
  }
  if (!isset($_POST["title"]))
  {
    $_POST["title"] = NULL;
  }
  if (!isset($_POST["author"]))
  {
    $_POST["author"] = NULL;
  }
  if (!isset($_POST["language"]))
  {
    $_POST["language"] = NULL;
  }
  $features = array(mysqli_real_escape_string($con, $_POST["genre"]), mysqli_real_escape_string($con, $_POST["title"]), mysqli_real_escape_string($con, $_POST["author"]), mysqli_real_escape_string($con, $_POST["language"]));
  // $query = "";
  // if ($_POST["author"] != NULL)
  // {
  //   $query = "select * from book, author where book.ISBN = author.ISBN"
  // }
  // $query = "select * from book";
  $query = "";
  $first = 0;
  for ($i = 0; $i < 4; $i++)
  {
    $cat = $categories[$i];
    $feat = $features[$i];
    if ($first == 0 && $feat != NULL)
    {
      $filter = " where $cat = '$feat'";
      $query = $query.$filter;
      $first = 1;
    } elseif ($feat != NULL)
    {
      $filter = " and $cat = '$feat'";
      $query = $query.$filter;
    }
  }
  if ($_POST["author"] != NULL)
  {
    $query = "select * from book, author ".$query." and book.ISBN = author.ISBN";
  } else
  {
    $query = "select * from book".$query;
  }

  //printf($query);
  $present = array();
  $list = mysqli_fetch_all(mysqli_query($con, $query), MYSQLI_ASSOC);
  foreach ($list as $item)
  {
    if (!in_array($item["ISBN"], $present))
    {
      $res_book = $item['Title'];
      echo "<p>$res_book</p>";
      array_push($present, $item["ISBN"]);
    }
  }

 ?>
