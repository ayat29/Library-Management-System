<?php
session_start();
?>

<form action = 'http://localhost/test/wishlist_add.php' method = "POST">
  <label for = "title">Title:</label>
  <input type = "text" name = "title" id = "title">

  <label for = "isbn">ISBN:</label>
  <input type = "text" name = "isbn" id = "isbn">

  <button type = "submit">Submit</button>
</form>
