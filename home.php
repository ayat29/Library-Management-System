<html>
<head>
  <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
  <nav>
  <ul>
  <li><a href = "http://localhost/Library Management System/view_past_orders.php" target = "_blank">Past Orders</a></li>
  <li><a href = "http://localhost/Library Management System/view_wishlist.php" target = "_blank">Wishlist</a></li>
  <li><a href = "http://localhost/Library Management System/wishlist.php" target = "_blank">Request a Book</a></li>
  <li><a href = "http://localhost/Library Management System/curr_bor.php" target = "_blank">View Borrowed Books</a></li>
  <!-- <li><a href = "contact.asp">Contact</a></li>
  <li><a href = "about.asp">About</a></li> -->
  <li style = 'float : right;'><a href = "http://localhost/Library Management System/logout.php">Logout</a>
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

      header("location: http://localhost/Library Management System/signin&signup.php");
    } elseif ($_SESSION['user_type'] != "user")
    {

      header("location: http://localhost/Library Management System/signin&signup.php");
    }

    $user = "root";
    $pass = "";
    $db = "library";
    $con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

    $name = $_SESSION['name'];

    echo "<h1 style = 'margin-left: 3%;'>Hi $name<br>Explore our books!</h1><br>";

    $book_query = "select * from book limit 5";
    $book_result = mysqli_query($con, $book_query);
    $rows = mysqli_fetch_all($book_result, MYSQLI_ASSOC);

    echo "<table>
      <tr id = 'table_head'>
        <td>Book</td>
        <td>Authors</td>
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
      <td><form action = 'wishlist_add.php' method = 'post' target = '_blank'><input type='hidden' name='isbn' value=$isbn>
            <input type='hidden' name='title' value='$title'> <button class = 'button' type = 'submit'>Request Book</button></form></td>
      </tr>";
    }
    echo "</table>";
   ?>
<section>
   <form name="search" action="http://localhost/Library Management System/search.php" method="post">
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

     <button type = "submit" formtarget="_blank" class = 'button'>Search</button>

   </form>


   <form action = "delete_account.php" method="POST" style = 'margin-left: 42%;'>
     <button type = "submit" class = 'button'>Delete Account</button>
   </form>
</section>
</body>
</html>
