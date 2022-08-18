<?php
  session_start();
?>
<html>
  <head>
  </head>

<body>
  <form action = "validate.php" method = "post">
    <label>ID</label>
    <input type = "text" name = "id" required>

    <label>Password</label>
    <input type = "password" name = "password" required>

    <button type = "submit">Login</button>
  </form>

  <form action = "register.php" method = "post">
    <label>Department</label>
    <input type = "text" name = "department" required>

    <label>Student ID</label>
    <input type = "text" name = "ID" required>

    <label>Name</label>
    <input type = "text" name = "name" required>

    <label>Password</label>
    <input type = "password" name = "password" required>


    <button type = "submit">Register</button>
  </form>
<?php
  if(isset($_SESSION['msg']))
  {
      echo $_SESSION["msg"];
  }
?>
</body>

</html>
