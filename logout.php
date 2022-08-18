<?php
session_start();
session_destroy();

header("location: http://localhost/test/signin&signup.php");
?>
