<html>
<head>
  <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
  <nav>
  <ul>
  <li><a href = "http://localhost/test/view_past_orders.php">Past Orders</a></li>
  <li><a href = "http://localhost/test/view_wishlist.php">Wishlist</a></li>
  <li><a href = "contact.asp">Contact</a></li>
  <li><a href = "about.asp">About</a></li>
  <li style = 'float : right;'><a href = "http://localhost/test/logout.php">Logout</a>
  </ul>

<div class="header">
<p id = "tag">Library of Alexandria</p>
<p id = "subtag">Find anything anytime anywhere</p>

</nav>

</div>

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

    $user = "root";
    $pass = "";
    $db = "library";
    $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

    $name = $_SESSION['name'];

    echo "<h1>Hi $name<br>Explore our books!</h1><br>";

    $book_query = "select * from book limit 5";
    $book_result = mysqli_query($con, $book_query);
    $rows = mysqli_fetch_all($book_result, MYSQLI_ASSOC);

    echo "<table>
      <tr id = 'table_head'>
        <td>Book</td>
        <td>Authors</td>
        <td>Country</td>
      </tr>";
    foreach ($rows as $row)
    {
      echo "<tr id = 'table_data'>";
      $title = $row['Title'];
      $isbn = $row['ISBN'];
      $authors = mysqli_fetch_all(mysqli_query($con, "select author_name from author where ISBN = $isbn"), MYSQLI_ASSOC);
      echo "<td>$title</td>
      <td>";
      foreach ($authors as $author)
      {
        $author_name = $author['author_name'];
        echo "<p>$author_name </p>";
      }
      echo "</td>
      </tr>";
    }
    echo "</table>";
   ?>
<section>
   <form name="search" action="http://localhost/test/search.php" method="post">
     <p class = 'option'>Select Genre</p>
     <input type="radio" id="nonfiction" name="genre" value="Nonfiction">
    <label for="nonfiction">Nonfiction</label>
    <input type="radio" id="comedy" name="genre" value="Comedy">
    <label for="comedy">Comedy</label>
    <input type="radio" id="fantasy" name="genre" value="Fantasy">
    <label for="fantasy">Fantasy</label>
    <input type="radio" id="none_auth" name="genre" value="None">
    <label for="none_auth">None</label>

    <p class = 'option'>Select Language</p>
    <input type="radio" id="english" name="language" value="English">
   <label for="english">English</label>
   <input type="radio" id="bangla" name="language" value="Bangla">
   <label for="bangla">Bangla</label>
   <input type="radio" id="none_lang" name="language" value="None">
   <label for="none_lang">None</label>

   <p class = 'option'>Choose author and book title, leave empty if no preference</p>
   <label for = "author" >Author name:</label>
   <br>
   <input type = "text" name = "author" id = "author">

   <br><br>

   <label for = "title">Book Title:</label>
   <br>
   <input type = "text" name = "title" id = "title">

   <br><br>

     <button type = "submit" formtarget="_blank">Search</button>

   </form>


   <form action = "delete_account.php" method="POST">
     <button type = "submit">Delete Account</button>
   </form>
</section>
</body>
</html>
