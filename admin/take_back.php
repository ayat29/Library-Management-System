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
  <form action = "return.php" method = "POST">
    <label>ISBN</label>
    <input type = "text" name = "isbn" required>

    <label>Copy ID</label>
    <input type = "text" name = "cpid" required>

    <label>Student ID:</label>
    <input type = "text" name = "stu_id" required>

    <button type = "submit">Submit</button>
  </form>
</body>
</html>