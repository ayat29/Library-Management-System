<?php
session_start();
$user = "root";
$pass = "";
$db = "library";
$con = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");
$id = $_POST["id"];
$pass = $_POST["password"];
$query = "select ID, password, name from student where ID = '$id'";

$result = mysqli_query($con, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//$num = mysqli_num_rows($result);
//print_r(array_keys($rows));
if (mysqli_num_rows($result) == 0)
{
  $_SESSION['msg'] = "Please register to continue";
  header("location: http://localhost/test/signin&signup.php");
} elseif ($rows["0"]["password"] != $pass)
{
  $_SESSION['msg'] = "Wrong password";
  header("location: http://localhost/test/signin&signup.php");
} else
{
  $_SESSION['id'] = $id;
  $_SESSION['name'] = $rows["0"]["name"];
  $_SESSION['user_type'] = "user";
  //print_r(array_keys($rows));
  //print_r($rows["0"]);
  // printf($rows["0"]["Name"]);
  header("location: http://localhost/test/home.php");
}
// if ($num == 1)
// {
//   $_SESSION['id'] = $id;
//   $_SESSION['name'] = $rows["0"]["Name"];
//   $_SESSION['user_type'] = "user";
//   // print_r(array_keys($rows));
//   // printf($rows["0"]["Name"]);
//   header("location: http://localhost/test/home.php");
// } else
// {
//   header("location: http://localhost/test/signin&signup.php");
// }
?>
