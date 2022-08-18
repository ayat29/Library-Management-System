<html>
<body>
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
    if(isset($_SESSION['msg']))
    {
        echo $_SESSION["msg"];
    }
    $name = $_SESSION['name'];
    echo "Hi $name";

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
   <a href = "http://localhost/test/admin/logout.php">Logout</a>
</body>
</html>
