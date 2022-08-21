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
?>

<html>
<body>

  <form action = "admin_action.php" method="POST">
    <h1>Book</h1>
    <h2>Add a Book</h2>

    <label>ISBN</label>
    <input type = "text" name = "isbn" required>

    <label>Price</label>
    <input type = "number" name = "price" required>

    <label>Publisher</label>
    <input type = "text" name = "publisher" required>

    <label>Language</label>
    <input type = "text" name = "language" required>

    <label>Title</label>
    <input type = "text" name = "title" required>

    <label>Publish Date</label>
    <input type = "date" name = "publish_date" required>

    <label>Genre</label>
    <input type = "text" name = "genre" required>

    <button name = "submit" value = "add_book" type = "submit">Submit</button>
  </form>

  <form action = "admin_action.php" method="POST">
    <h2>Delete Book</h2>

    <label>ISBN</label>

    <input type = "text" name = "isbn" required>

    <button name = "submit" value = "del_book" type = "submit">Submit</button>
  </form>

  <form action = "admin_action.php" method="POST">
    <h2>Update book price</h2>

    <label>ISBN</label>
    <input type = "text" name = "isbn" required>

    <label>New price</label>
    <input type = "number" name = "new_price" required>

    <button name = "submit" value = "alt_book_price" type = "submit">Submit</button>
  </form>

</body>

</html>
