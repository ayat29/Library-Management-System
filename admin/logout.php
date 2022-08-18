<?php
session_start();
session_destroy();

header("location: http://localhost/test/admin/signin&signup.php");
?>
