<html>
<body style="margin:0px; padding: 0px;">
  <?php
    session_start();
    if(!isset($_SESSION['id']))
    {
      $_SESSION["msg"] = "Please login or register to continue";
      header("location: http://localhost/test/signin&signup.php");
    } elseif ($_SESSION['user_type'] != "user")
    {
      $_SESSION["msg"] = "You are not authorized to enter";
      header("location: http://localhost/test/signin&signup.php");
    }
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION["msg"];
    }

    $user = "root";
    $pass = "";
    $db = "library";
    $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

    $name = $_SESSION['name'];
    echo "Hi $name";

    echo "<h1>Explore our books!</h1><br>";

    $book_query = "select * from book limit 5";
    $book_result = mysqli_query($con, $book_query);
    $rows = mysqli_fetch_all($book_result, MYSQLI_ASSOC);
    // print_r(array_keys($rows['0']));
    // printf($rows['0']["Title"]);
    foreach ($rows as $row)
    {
      $title = $row['Title'];
      $isbn = $row['ISBN'];
      $authors = mysqli_fetch_all(mysqli_query($con, "select author_name from author where ISBN = $isbn"), MYSQLI_ASSOC);
      echo "<h2>$title</h2>";
      foreach ($authors as $author)
      {
        $author_name = $author['author_name'];
        echo "<p>$author_name</p>";
        // echo "<form action = 'http://localhost/test/wishlist_add.php'>
        //         <input type = 'submit' name = 'isbn' value = '$isbn' />;
        //         </form>";
      }
      echo "<br>";
    }
    // $user = "root";
    // $pass = "";
    // $db = "project";
    //
    // $db = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
    // echo "Hi '$'<br>";

    // $result = mysqli_query($db, "SELECT * FROM developers");
    // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // foreach ($rows as $row) {
    //   printf("%s", $row["name"]);
    //   echo "<br>";
    // }
   ?>
   <a href = "http://localhost/test/logout.php">Logout</a>
   <form name="search" action="http://localhost/test/search.php" method="post">
     <p>Select Genre</p>
     <input type="radio" id="nonfiction" name="genre" value="Nonfiction">
    <label for="nonfiction">Nonfiction</label>
    <input type="radio" id="comedy" name="genre" value="Comedy">
    <label for="comedy">Comedy</label>
    <input type="radio" id="fantasy" name="genre" value="Fantasy">
    <label for="fantasy">Fantasy</label>

    <p>Select Language</p>
    <input type="radio" id="english" name="language" value="English">
   <label for="english">English</label>
   <input type="radio" id="bangla" name="language" value="Bangla">
   <label for="bangla">Bangla</label>

   <p>Choose author, leave empty if no preference</p>
   <input type = "text" name = "author" id = "author">
   <label for = "author">Author name</label>

   <p>Book Title</p>
   <input type = "text" name = "title" id = "title">
   <label for = "title">Title</label>

   <br><br>

     <button type = "submit" formtarget="_blank">Search</button>

   </form>
   <a href = "http://localhost/test/view_past_orders.php">View your past orders</a>
   <a href = "http://localhost/test/view_wishlist.php">View your wishlist</a>
</body>
</html>
