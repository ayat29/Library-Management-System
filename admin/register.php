<?php
session_start();
$user = "root";
$pass = "";
$db = "library";
$con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
$name = $_POST["name"];
$pass = $_POST["password"];
$id = $_POST["ID"];
$s = "select * from admin where ID = '$id'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1)
{
  $_SESSION['msg'] = "ID has already been registered";
  header("location: http://localhost/test/admin/signin&signup.php");
} else
{
  $reg = "insert into admin values('$id', '$pass', '$name')";
  mysqli_query($con, $reg);
  $_SESSION['msg'] = "Your registration was successful!";
  $_SESSION['id'] = $id;
  $_SESSION['name'] = $name;
  $_SESSION['user_type'] = "admin";
  header("location: http://localhost/test/admin/home.php");
}
?>
